document.addEventListener("DOMContentLoaded", function () {
  const searchInput = document.getElementById("searchInput");
  const statusFilter = document.getElementById("statusFilter");
  const rows = document.querySelectorAll(".employee-table tbody tr");

  function filterTable() {
    const searchValue = searchInput.value.toLowerCase();
    const selectedStatus = statusFilter.value;

    rows.forEach((row) => {
      const name = row.children[1].textContent.toLowerCase();
      const email = row.children[2].textContent.toLowerCase();
      const status = row.children[3].textContent.toLowerCase();

      const matchesSearch =
        name.includes(searchValue) || email.includes(searchValue);
      const matchesStatus =
        selectedStatus === "" || status.includes(selectedStatus);

      row.style.display = matchesSearch && matchesStatus ? "" : "none";
    });
  }

  searchInput.addEventListener("input", filterTable);
  statusFilter.addEventListener("change", filterTable);
});

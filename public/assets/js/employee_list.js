// document.addEventListener("DOMContentLoaded", function () {
//   const searchInput = document.getElementById("searchInput");
//   const statusFilter = document.getElementById("statusFilter");
//   const rows = document.querySelectorAll(".employee-table tbody tr");

//   function filterTable() {
//     const searchValue = searchInput.value.toLowerCase();
//     const selectedStatus = statusFilter.value;

//     rows.forEach((row) => {
//       const name = row.children[1].textContent.toLowerCase();
//       const email = row.children[2].textContent.toLowerCase();
//       const status = row.children[3].textContent.toLowerCase();

//       const matchesSearch =
//         name.includes(searchValue) || email.includes(searchValue);
//       const matchesStatus =
//         selectedStatus === "" || status.includes(selectedStatus);

//       row.style.display = matchesSearch && matchesStatus ? "" : "none";
//     });
//   }

//   searchInput.addEventListener("input", filterTable);
//   statusFilter.addEventListener("change", filterTable);
// });

// employee_list.js

document.addEventListener('DOMContentLoaded', () => {
  const searchInput = document.getElementById('searchInput');
  const statusFilter = document.getElementById('statusFilter');
  const table = document.querySelector('.employee-table tbody');
  const rows = Array.from(table.querySelectorAll('tr'));

  function filterTable() {
    const searchTerm = searchInput.value.toLowerCase();
    const statusTerm = statusFilter.value.toLowerCase();

    rows.forEach(row => {
      const cells = row.querySelectorAll('td');
      const userId = cells[0]?.textContent.toLowerCase() || '';
      const department = cells[1]?.textContent.toLowerCase() || '';
      const joined = cells[2]?.textContent.toLowerCase() || '';
      const statusCell = row.querySelector('.status');
      const statusText = statusCell ? statusCell.textContent.toLowerCase() : '';

      // Check search term in userId, department or joined date (you can adjust fields)
      const matchesSearch = userId.includes(searchTerm) || department.includes(searchTerm) || joined.includes(searchTerm);

      // Check status filter
      const matchesStatus = statusTerm === '' || statusText.includes(statusTerm);

      if (matchesSearch && matchesStatus) {
        row.style.display = '';
      } else {
        row.style.display = 'none';
      }
    });
  }

  searchInput.addEventListener('input', filterTable);
  statusFilter.addEventListener('change', filterTable);
});

// Sidebar toggle for mobile
document.addEventListener("DOMContentLoaded", () => {
  const sidebar = document.querySelector(".sidebar");
  const toggleBtn = document.createElement("button");
  toggleBtn.classList.add("sidebar-toggle");
  toggleBtn.setAttribute("aria-label", "Toggle navigation menu");
  toggleBtn.innerHTML = "&#9776;"; // hamburger icon
  document.body.prepend(toggleBtn);

  toggleBtn.addEventListener("click", () => {
    sidebar.classList.toggle("open");
  });

  // Close sidebar when clicking outside on mobile
  document.addEventListener("click", (e) => {
    if (!sidebar.contains(e.target) && !toggleBtn.contains(e.target)) {
      sidebar.classList.remove("open");
    }
  });

  // Search filter for employee/task lists
  const searchInput = document.getElementById("searchInput");
  const statusFilter = document.getElementById("statusFilter");
  const table = document.querySelector(".employee-table, .logbook-table");

  if (searchInput && table) {
    searchInput.addEventListener("input", filterTable);
  }
  if (statusFilter && table) {
    statusFilter.addEventListener("change", filterTable);
  }

  function filterTable() {
    const filterText = searchInput.value.toLowerCase();
    const filterStatus = statusFilter.value.toLowerCase();
    const rows = table.tBodies[0].rows;

    for (let row of rows) {
      const text = row.textContent.toLowerCase();
      const statusCell = row.querySelector(".status, .badge");
      const statusText = statusCell ? statusCell.textContent.toLowerCase() : "";

      const matchesText = text.includes(filterText);
      const matchesStatus = !filterStatus || statusText.includes(filterStatus);

      row.style.display = matchesText && matchesStatus ? "" : "none";
    }
  }

  // Form validation for assign task and registration forms
  const forms = document.querySelectorAll("form");
  forms.forEach((form) => {
    form.addEventListener("submit", (e) => {
      const invalidFields = [];
      form
        .querySelectorAll(
          "input[required], select[required], textarea[required]"
        )
        .forEach((field) => {
          if (!field.value.trim()) {
            invalidFields.push(field);
            field.nextElementSibling?.classList.add("error-message");
            field.nextElementSibling.textContent = "This field is required";
          } else {
            field.nextElementSibling?.classList.remove("error-message");
            field.nextElementSibling.textContent = "";
          }
        });
      if (invalidFields.length) {
        e.preventDefault();
        invalidFields[0].focus();
      }
    });
  });

  // Flash message display
  const flashContainer = document.getElementById("flash-message-container");
  window.showFlashMessage = function (message, type = "info") {
    if (!flashContainer) return;
    flashContainer.textContent = message;
    flashContainer.style.display = "block";
    flashContainer.style.backgroundColor =
      type === "success" ? "#000" : "#d7263d";
    flashContainer.style.color = "#fff";
    setTimeout(() => {
      flashContainer.style.display = "none";
    }, 4000);
  };
});

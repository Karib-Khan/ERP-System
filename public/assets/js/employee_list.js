
document.addEventListener('DOMContentLoaded', () => {
  const searchInput = document.getElementById('searchInput');
  const statusFilter = document.getElementById('statusFilter');
  const tableBody = document.querySelector('table tbody');
  const rows = Array.from(tableBody.querySelectorAll('tr'));

  function filterTable() {
    const searchTerm = searchInput.value.toLowerCase();
    const statusTerm = statusFilter.value.toLowerCase();

    rows.forEach(row => {
      const cells = row.querySelectorAll('td');
      const userId = cells[0]?.textContent.toLowerCase() || '';
      const department = cells[1]?.textContent.toLowerCase() || '';
      const statusText = cells[2]?.textContent.toLowerCase() || '';

      const matchesSearch =
        userId.includes(searchTerm) ||
        department.includes(searchTerm);

      const matchesStatus =
        statusTerm === '' || statusText.includes(statusTerm);

      row.style.display = (matchesSearch && matchesStatus) ? '' : 'none';
    });
  }

  searchInput.addEventListener('input', filterTable);
  statusFilter.addEventListener('change', filterTable);
});


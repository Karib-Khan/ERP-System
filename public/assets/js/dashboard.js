document.addEventListener("DOMContentLoaded", () => {
  const ctx = document.getElementById("myChart").getContext("2d");
  new Chart(ctx, {
    type: "line",
    data: {
      labels: ["Jan", "Feb", "Mar", "Apr", "May"],
      datasets: [
        {
          label: "Dataset 1",
          data: [50, 80, 60, 90, 70],
          borderColor: "orange",
          fill: false,
        },
        {
          label: "Dataset 2",
          data: [30, 50, 40, 70, 60],
          borderColor: "green",
          fill: false,
        },
        {
          label: "Dataset 3",
          data: [20, 40, 30, 50, 40],
          borderColor: "red",
          fill: false,
        },
      ],
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
    },
  });

  const sidebar = document.querySelector(".sidebar");
  sidebar.addEventListener("mouseover", () => {
    sidebar.style.width = "250px";
  });
  sidebar.addEventListener("mouseout", () => {
    if (window.innerWidth <= 768) sidebar.style.width = "60px";
  });
});

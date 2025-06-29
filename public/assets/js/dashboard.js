// dashboard.js

// Example: Simple Chart.js setup for the canvas with id "myChart"
document.addEventListener("DOMContentLoaded", () => {
  const ctx = document.getElementById("myChart").getContext("2d");

  const myChart = new Chart(ctx, {
    type: "line",
    data: {
      labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul"],
      datasets: [
        {
          label: "Visitors",
          data: [120, 190, 300, 250, 320, 400, 450],
          backgroundColor: "rgba(255, 106, 0, 0.3)",
          borderColor: "#ff6a00",
          borderWidth: 3,
          fill: true,
          tension: 0.3,
          pointRadius: 5,
          pointBackgroundColor: "#ff6a00",
        },
      ],
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      scales: {
        y: {
          beginAtZero: true,
          ticks: {
            color: "#ff6a00",
            font: {
              weight: "600",
            },
          },
          grid: {
            color: "rgba(255, 106, 0, 0.15)",
          },
        },
        x: {
          ticks: {
            color: "#ff6a00",
            font: {
              weight: "600",
            },
          },
          grid: {
            display: false,
          },
        },
      },
      plugins: {
        legend: {
          labels: {
            color: "#ff6a00",
            font: {
              weight: "700",
            },
          },
        },
      },
    },
  });
});

// assign_task.js

document.addEventListener("DOMContentLoaded", () => {
  const form = document.getElementById("taskForm");
  const resultSection = document.getElementById("result");

  // Simple client-side validation
  form.addEventListener("submit", (e) => {
    e.preventDefault();

    // Clear previous errors
    form
      .querySelectorAll(".error-message")
      .forEach((el) => (el.textContent = ""));
    resultSection.textContent = "";

    let valid = true;

    // Validate title
    const titleInput = form.title;
    if (!titleInput.value.trim()) {
      showError(titleInput, "Title is required");
      valid = false;
    }

    // Validate description
    const descInput = form.description;
    if (!descInput.value.trim()) {
      showError(descInput, "Description is required");
      valid = false;
    }

    // Validate duration
    const durationInput = form.duration;
    const durationValue = parseFloat(durationInput.value);
    if (!durationInput.value || isNaN(durationValue) || durationValue <= 0) {
      showError(durationInput, "Duration must be a positive number");
      valid = false;
    }

    if (!valid) return;

    // If valid, you can submit form or show success message
    // Here, just simulate success message
    resultSection.textContent = "Task assigned successfully!";
    resultSection.style.color = "#21b573";

    // Optional: reset form except assigned_to (readonly)
    form.title.value = "";
    form.description.value = "";
    form.duration.value = "";
  });

  function showError(input, message) {
    const errorEl = input.parentElement.querySelector(".error-message");
    if (errorEl) {
      errorEl.textContent = message;
    }
  }
});

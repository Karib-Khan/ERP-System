document.addEventListener("DOMContentLoaded", () => {
  const form = document.getElementById("taskForm");
  const result = document.getElementById("result");

  form.addEventListener("submit", (e) => {
    e.preventDefault();
    clearErrors();

    const title = form.title.value.trim();
    const description = form.description.value.trim();
    const duration = form.duration.value.trim();
    const status = form.status.value;

    let valid = true;

    if (!title) {
      showError("title", "Title is required.");
      valid = false;
    }

    if (!description) {
      showError("description", "Description is required.");
      valid = false;
    }

    if (!duration || isNaN(duration) || Number(duration) <= 0) {
      showError("duration", "Please enter a valid duration greater than 0.");
      valid = false;
    }

    if (!status) {
      showError("status", "Please select a status.");
      valid = false;
    }

    if (!valid) {
      showResult("Please fix the errors above and try again.", "error");
      return;
    }

    // Simulate task assignment (e.g., send to server)
    const taskData = {
      title,
      description,
      duration: Number(duration),
      status,
      assignedAt: new Date().toISOString(),
    };

    // For demo, just show success message and clear form
    showResult(`Task "${taskData.title}" assigned successfully!`, "success");
    form.reset();
  });

  function showError(fieldId, message) {
    const input = form[fieldId];
    const errorMessage = input.parentElement.querySelector(".error-message");
    errorMessage.textContent = message;
    input.classList.add("input-error");
  }

  function clearErrors() {
    const errorMessages = form.querySelectorAll(".error-message");
    errorMessages.forEach((em) => (em.textContent = ""));

    const inputs = form.querySelectorAll("input, textarea, select");
    inputs.forEach((input) => input.classList.remove("input-error"));

    result.style.display = "none";
    result.textContent = "";
    result.className = "result";
  }

  function showResult(message, type) {
    result.textContent = message;
    result.className = `result ${type}`;
    result.style.display = "block";
    result.focus();
  }
});

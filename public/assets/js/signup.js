// signup.js

document.addEventListener("DOMContentLoaded", () => {
  const form = document.getElementById("registrationForm");

  form.addEventListener("submit", (e) => {
    // Example simple validation (can be extended)
    // Prevent submission if any required field is empty
    const requiredFields = form.querySelectorAll("[required]");
    let valid = true;

    requiredFields.forEach((field) => {
      if (!field.value.trim()) {
        valid = false;
        field.focus();
        alert(`Please fill in the ${field.name} field.`);
        e.preventDefault();
        return false;
      }
    });

    // Additional validations can be added here

    if (!valid) {
      e.preventDefault();
    }
  });
});

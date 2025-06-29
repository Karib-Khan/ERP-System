// login.js

document.addEventListener("DOMContentLoaded", () => {
  const form = document.getElementById("loginForm");
  const roleRadios = document.querySelectorAll('input[name="role"]');

  form.addEventListener("submit", (e) => {
    // Ensure a role is selected
    const roleSelected = Array.from(roleRadios).some((radio) => radio.checked);
    if (!roleSelected) {
      e.preventDefault();
      alert("Please select a role before logging in.");
      return;
    }

    // Additional validation can be added here if needed
  });
});

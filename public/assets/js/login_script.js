const form = document.getElementById("loginForm");
const inputs = document.querySelectorAll(".input-box input");

inputs.forEach((input) => {
  input.addEventListener("focus", () => {
    input.parentElement.classList.add("focused");
  });

  input.addEventListener("blur", () => {
    if (!input.value) {
      input.parentElement.classList.remove("focused");
    }
  });
});

form.addEventListener("submit", (e) => {
  e.preventDefault();
  const button = form.querySelector("button");
  button.textContent = "Logging in...";
  button.style.background = "#00cc6d";

  setTimeout(() => {
    button.textContent = "Login";
    button.style.background = "#00ff88";
    alert("Login successful! (This is a demo)");
  }, 1500);
});

document.getElementById("loginForm").addEventListener("submit", function (e) {
  e.preventDefault();

  const userId = document.getElementById("userId").value;
  const password = document.getElementById("password").value;

  if (!userId || !password) {
    alert("Please fill in all fields.");
    return;
  }

  // You can replace this with actual AJAX call or form submission
  console.log("Logging in with:", { userId, password });

  // For demo:
  alert("Login attempted for user: " + userId);
});
document.querySelectorAll('input[name="role"]').forEach((input) => {
  input.addEventListener("change", () => {
    console.log("Selected Role:", input.value);
  });
});

document.addEventListener("DOMContentLoaded", () => {
  const goBackBtn = document.querySelector(".go-back");
  const resetPasswordBtn = document.querySelector(".reset-password");
  const editDetailsBtn = document.querySelector(".edit-details");

  goBackBtn.addEventListener("click", () => {
    window.history.back();
  });

  // resetPasswordBtn.addEventListener("click", () => {
  //   alert("Redirecting to Reset Password page...");
  // });

  // editDetailsBtn.addEventListener("click", () => {
  //   alert("Redirecting to Edit Details page...");
  // });
});

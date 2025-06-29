// profile_script.js

// Example: Add a subtle animation on load and button click feedback

document.addEventListener("DOMContentLoaded", function () {
  // Animate profile container on load
  const container = document.querySelector(".profile-container");
  if (container) {
    container.style.opacity = 0;
    container.style.transform = "translateY(40px)";
    setTimeout(() => {
      container.style.transition =
        "opacity 0.7s cubic-bezier(.77,0,.18,1), transform 0.7s cubic-bezier(.77,0,.18,1)";
      container.style.opacity = 1;
      container.style.transform = "translateY(0)";
    }, 120);
  }

  // Button click ripple effect
  const buttons = document.querySelectorAll("button");
  buttons.forEach((btn) => {
    btn.addEventListener("click", function (e) {
      const circle = document.createElement("span");
      circle.className = "ripple";
      circle.style.left = `${e.offsetX}px`;
      circle.style.top = `${e.offsetY}px`;
      this.appendChild(circle);
      setTimeout(() => circle.remove(), 600);
    });
  });
});

// Add ripple effect styles dynamically (if not in CSS)
const rippleStyle = document.createElement("style");
rippleStyle.innerHTML = `
button {
  position: relative;
  overflow: hidden;
}
.ripple {
  position: absolute;
  border-radius: 50%;
  transform: scale(0);
  animation: ripple-effect 0.6s linear;
  background: rgba(255,255,255,0.5);
  pointer-events: none;
  width: 100px;
  height: 100px;
  left: 50%;
  top: 50%;
  translate: -50% -50%;
  z-index: 2;
}
@keyframes ripple-effect {
  to {
      transform: scale(2.5);
      opacity: 0;
  }
}
`;
document.head.appendChild(rippleStyle);
// Disable scroll
document.body.style.overflow = 'hidden';

// Enable scroll
// document.body.style.overflow = 'auto';

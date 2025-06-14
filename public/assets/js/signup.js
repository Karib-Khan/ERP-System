
  setTimeout(() => {
    const msg = document.querySelector('.flash-message');
    if (msg) {
      msg.style.opacity = '0';
      setTimeout(() => msg.remove(), 500); // Remove after fade out
    }
  }, 3000);


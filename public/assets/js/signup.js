const form = document.getElementById('signupForm');
const inputs = document.querySelectorAll('.input-box input');

inputs.forEach(input => {
    input.addEventListener('focus', () => {
        input.parentElement.classList.add('focused');
    });

    input.addEventListener('blur', () => {
        if (!input.value) {
            input.parentElement.classList.remove('focused');
        }
    });
});

form.addEventListener('submit', (e) => {
    e.preventDefault();
    const button = form.querySelector('button');
    button.textContent = 'Signing up...';
    button.style.background = '#00cc6d';
    
    setTimeout(() => {
        button.textContent = 'Sign Up';
        button.style.background = '#00ff88';
        alert('Signup successful! (This is a demo)');
    }, 1500);
});
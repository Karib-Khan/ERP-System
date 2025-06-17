
function showFlashMessage(message, type = 'info') {
    const container = document.getElementById('flash-message-container');
    
    // Set message
    container.textContent = message;

    // Style based on type
    container.style.backgroundColor = 
        type === 'success' ? '#4CAF50' :
        type === 'error' ? '#f44336' :
        '#2196F3'; // info (default)

    container.style.color = '#fff';
    container.style.display = 'block';

    // Hide after 3 seconds
    setTimeout(() => {
        container.style.display = 'none';
    }, 3000);
}


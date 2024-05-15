window.addEventListener('DOMContentLoaded', (event) => {
    const alertBox = document.getElementById('customAlert');
    if (alertBox) {
        setTimeout(() => {
            alertBox.style.opacity = 0; // Start the fade out
            // Wait for the transition to finish before hiding the element completely
            setTimeout(() => {
                alertBox.style.display = 'none';
            }, 2000); // This should match the duration of the CSS transition
        }, 3000); // 3 seconds until fade out starts
    }
});
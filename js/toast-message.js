function showToast(message) {
    const toast = document.getElementById('toast');
    toast.textContent = message;
    toast.classList.add('show');
    setTimeout(() => {
        toast.classList.remove('show');
    }, 3000);
}

// Show the toast if there is a message from PHP
window.onload = function() {
    if (typeof jsAlert !== 'undefined' && jsAlert !== '') {
        showToast(jsAlert);
    }
};
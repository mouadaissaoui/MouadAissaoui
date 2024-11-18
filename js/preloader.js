window.addEventListener('load', function () {
    const preloader = document.querySelector('.preloader');
    preloader.classList.add('preloader-hidden');
    setTimeout(() => {
        preloader.style.display = 'none';
    }, 8000);
});
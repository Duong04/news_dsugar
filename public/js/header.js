const headerMain = document.querySelector('#header');
const goToTop = document.querySelector('.go-to-top');
window.addEventListener('scroll', () => {
    if (window.scrollY > 400) {
        headerMain.classList.add('header-fixed');
        goToTop.style.display = 'flex';
        headerMain.style.top = '0';
    } else if (window.scrollY < 200) {
        headerMain.classList.remove('header-fixed');
        goToTop.style.display = 'none';
        headerMain.style.top = '-100px';
    }
});
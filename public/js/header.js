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

// -----------------------------
document.addEventListener("DOMContentLoaded", () => {
    const dot = document.querySelector(".mouse-trail");
  
    document.addEventListener("mousemove", (e) => {
      dot.style.transform = `translate(${e.clientX}px, ${e.clientY}px) scale(1)`;
    });
});

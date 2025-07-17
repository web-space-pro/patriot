document.querySelectorAll('a[href^="/#"], a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();

        const href = this.getAttribute('href');
        const target = href.split('#')[1];
        const header = document.querySelector('header');
        const headerHeight = header ? header.offsetHeight : 0;
        const targetElement = document.getElementById(target);

        if (targetElement) {
            window.scrollTo({
                top: targetElement.offsetTop - headerHeight,
                behavior: 'smooth'
            });
        } else if (href.startsWith('/#')) {
            window.location.href = window.location.origin + '/#' + target;
        }
    });
});

function toggleHeaderScroll() {
    const header = document.querySelector('header');
    if (window.scrollY > 1) {
        header.classList.add('scroll');
    } else {
        header.classList.remove('scroll');
    }
}

window.addEventListener('scroll', toggleHeaderScroll);
window.addEventListener('load', toggleHeaderScroll);
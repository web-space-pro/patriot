import gsap from "gsap";
import SplitText from "gsap/SplitText";
import ScrollTrigger from "gsap/ScrollTrigger";

// Регистрация плагина
gsap.registerPlugin(ScrollTrigger);
gsap.registerPlugin(SplitText);




gsap.from("h1", {
    textShadow: "0px 0px 0px #000",
    scale: 0.8,
    autoAlpha: 0,
    duration: 1.3,
    ease: "elastic"
});


// Выбираем все элементы с атрибутом data-parallax
document.querySelectorAll('[data-parallax]').forEach(el => {
    // Определяем: мобила или нет
    const isMobile = window.matchMedia('(max-width: 767px)').matches;
    // Берём нужное значение
    let y = el.dataset.parallax;
    if (isMobile) {
        y = el.dataset.parallaxMobile || 100; // Если задано data-parallax-mobile — возьмёт его, иначе 100
    }
    gsap.to(el, {
        y: y,
        ease: 'none',
        scrollTrigger: {
            trigger: el,
            start: 'top bottom',
            end: 'bottom top',
            scrub: true
        }
    });
});





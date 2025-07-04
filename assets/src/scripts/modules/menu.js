document.addEventListener("DOMContentLoaded", function () {
    const burger = document.querySelector(".burger input");
    const mobileMenu = document.querySelector(".mobileMenu");
    const header = document.querySelector(".header");
    const noScroll = document.querySelector("html");
    const dropdowns = mobileMenu.querySelectorAll(".menu-item-has-children");

    // Открытие/закрытие mobileMenu
    burger.addEventListener("change", function () {
        mobileMenu.classList.toggle("active");
        header.classList.toggle("openid");
        noScroll.classList.toggle("t-overflow");
    });

    // Обработка кликов на элементы с sub-menu
    dropdowns.forEach((dropdown) => {
        const link = dropdown.querySelector(".caret");

        link.addEventListener("click", function (e) {
            e.preventDefault();
            dropdown.classList.toggle("active");

            const nextLi = dropdown.nextElementSibling;
            console.log(nextLi)
            if (nextLi) {
                const height = dropdown.querySelector(".sub-menu").offsetHeight;

                if (dropdown.classList.contains("active")) {
                    nextLi.style.marginTop = `${height}px`;
                } else {
                    nextLi.style.marginTop = "0";
                }
            }
        });
    });
});


(function ($, root, undefined) {
    $('a[href^="/#"]').on('click', function(e) {
        e.preventDefault();

        let href = $(this).attr('href');
        let target = href.split('#')[1]; // Извлекаем ID

        if (target && target.length) {
            let location = window.location.origin;
            let headerHeight = $('header').innerHeight();

            if ($('#' + target).length) {
                $('html, body').animate({
                    scrollTop: $('#' + target).offset().top - headerHeight
                }, 'fast');
            } else {
                window.location.href = location + '/#' + target;
            }
        }
    });

    $('a[href^="#"]').on('click', function(e) {
        e.preventDefault();

        let href = $(this).attr('href');
        let target = href.split('#')[1];

        if (target && target.length) {
            let headerH = $('header').innerHeight();

            if ($('#' + target).length) {
                $('html, body').animate({
                    scrollTop: $('#' + target).offset().top - headerH
                }, 'fast');
            }
        }
    });
})(jQuery);

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
document.addEventListener('DOMContentLoaded', function () {
    // Открытие модалки (и закрытие остальных)
    document.querySelectorAll('.btn-modal-open').forEach(btn => {
        btn.addEventListener('click', function (e) {
            e.preventDefault();
            const modalId = btn.getAttribute('data-modal');
            const modal = document.getElementById(modalId);

            // Закрыть все модалки
            document.querySelectorAll('.modal-window.active').forEach(opened => {
                opened.classList.remove('active');
            });
            document.body.classList.remove('no-scroll');

            if (modal) {
                modal.classList.add('active');
                document.body.classList.add('no-scroll');
                history.pushState(null, '', '#' + modalId);
            }

            // останавливаем автоскролл
            window.stopAutoScroll();
            window.modalIsOpen = true;
        });
    });

    // Закрытие модалки
    document.querySelectorAll('.modal-window').forEach(modal => {
        modal.querySelectorAll('.modal-backdrop, .modal-close').forEach(closeBtn => {
            closeBtn.addEventListener('click', function (e) {
                e.preventDefault();
                modal.classList.remove('active');
                document.body.classList.remove('no-scroll');
                history.replaceState(null, '', ' ');
                window.modalIsOpen = false;
                window.startAutoScroll();
            });
        });
    });

    // Закрытие по Escape
    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') {
            document.querySelectorAll('.modal-window.active').forEach(modal => {
                modal.classList.remove('active');
                document.body.classList.remove('no-scroll');
                history.replaceState(null, '', ' ');
                window.modalIsOpen = false;
                window.startAutoScroll();
            });
        }
    });

    // Автооткрытие по hash (если нужно)
    if (window.location.hash) {
        const modal = document.getElementById(window.location.hash.substring(1));
        if (modal) {
            // Закрыть все модалки
            document.querySelectorAll('.modal-window.active').forEach(opened => {
                opened.classList.remove('active');
            });
            document.body.classList.remove('no-scroll');
            setTimeout(() => {
                modal.classList.add('active');
                document.body.classList.add('no-scroll');
            }, 200);
        }
    }

    // Закрытие модалки при смене hash (Назад браузера)
    window.addEventListener('popstate', function () {
        document.querySelectorAll('.modal-window.active').forEach(modal => {
            modal.classList.remove('active');
            document.body.classList.remove('no-scroll');
        });
    });
});


document.querySelectorAll('.open-service').forEach(btn => {
    btn.addEventListener('click', function(e) {
        e.preventDefault();

        // получаем данные
        const title = this.dataset.title;
        const description = this.dataset.description;
        const price = this.dataset.price;

        // открываем модалку
        document.getElementById('services-modal').classList.add('open');

        // подставляем данные
        document.querySelector('#services-modal h3').textContent = title;
        document.querySelector('.services__modal--content').textContent = description;
        document.querySelector('#services-modal .price').textContent = price;
    });
});

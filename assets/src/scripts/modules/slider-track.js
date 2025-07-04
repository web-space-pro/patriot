const slider = document.querySelector('.slider-track');
let isDragging = false;
let startX = 0;
let lastX = 0;
let offset = 0;
let velocity = 0;
let lastMoveTime = 0;
let autoScrolling = true;
let rafId;
window.modalIsOpen = false;
window.stopAutoScroll = stopAutoScroll;
window.startAutoScroll = startAutoScroll;

function setTransform(x) {
    const trackWidth = slider.scrollWidth / 2;
    offset = x;
    // Зацикливаем бесконечно
    if (offset <= -trackWidth) offset += trackWidth;
    if (offset >= 0) offset -= trackWidth;
    slider.style.transform = `translateX(${offset}px)`;
}

function autoScroll() {
    if (window.modalIsOpen) {
        // если открыт модал — вообще не скроллим
        rafId = requestAnimationFrame(autoScroll);
        return;
    }
    if (autoScrolling && !isDragging) {
        setTransform(offset - 0.6);
    } else if (!autoScrolling && Math.abs(velocity) > 0.01) {
        setTransform(offset + velocity);
        velocity *= 0.93;
    } else if (!autoScrolling && !isDragging) {
        velocity = 0;
        autoScrolling = true;
    }
    rafId = requestAnimationFrame(autoScroll);
}
autoScroll();

function stopAutoScroll() {
    autoScrolling = false;
}
function startAutoScroll() {
    if (!autoScrolling) {
        autoScrolling = true;
    }
}

// Mouse events
slider.addEventListener('mousedown', (e) => {
    isDragging = true;
    stopAutoScroll();
    startX = e.pageX - offset;
    lastX = e.pageX;
    lastMoveTime = Date.now();
    velocity = 0;
    slider.style.cursor = 'grabbing';
});
window.addEventListener('mousemove', (e) => {
    if (!isDragging) return;
    e.preventDefault();
    const x = e.pageX - startX;
    const now = Date.now();
    velocity = (e.pageX - lastX) / (now - lastMoveTime) * 20; // скорость в px/frame
    lastX = e.pageX;
    lastMoveTime = now;
    setTransform(x);
});
window.addEventListener('mouseup', () => {
    if (isDragging) {
        isDragging = false;
        // Легкая инерция если быстро бросили
        if (Math.abs(velocity) > 1) {
            autoScrolling = false;
        } else {
            velocity = 0;
            startAutoScroll();
        }
        slider.style.cursor = '';
    }
});

// Touch events
slider.addEventListener('touchstart', (e) => {
    isDragging = true;
    stopAutoScroll();
    startX = e.touches[0].pageX - offset;
    lastX = e.touches[0].pageX;
    lastMoveTime = Date.now();
    velocity = 0;
}, { passive: false });
window.addEventListener('touchmove', (e) => {
    if (!isDragging) return;
    const x = e.touches[0].pageX - startX;
    const now = Date.now();
    velocity = (e.touches[0].pageX - lastX) / (now - lastMoveTime) * 20;
    lastX = e.touches[0].pageX;
    lastMoveTime = now;
    setTransform(x);
}, { passive: false });
window.addEventListener('touchend', () => {
    if (isDragging) {
        isDragging = false;
        if (Math.abs(velocity) > 1) {
            autoScrolling = false;
        } else {
            velocity = 0;
            startAutoScroll();
        }
    }
});

// Блокируем select текста во время drag
document.addEventListener('selectstart', (e) => {
    if (isDragging) e.preventDefault();
});

document.querySelectorAll('.slider-item img').forEach(img => {
    img.setAttribute('draggable', 'false');
    img.addEventListener('dragstart', e => e.preventDefault());
});



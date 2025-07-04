import Swiper from 'swiper';
import {Autoplay, EffectFade, Navigation, Pagination, Manipulation} from 'swiper/modules';
Swiper.use([Navigation, Pagination, Autoplay, EffectFade, Manipulation]);

const swiper = new Swiper('.slider', {
    slidesPerView: 4,
    loop: true,
    spaceBetween: 20,
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    breakpoints: {
        0: {
            slidesPerView: 1,
        },
        768: {
            slidesPerView: 2,
        },
        992: {
            slidesPerView: 3,
        },
        1280: {
            slidesPerView: 4,
        }
    },
    on: {
        transitionStart: function(){

            var videos = document.querySelectorAll('video');

            Array.prototype.forEach.call(videos, function(video){
                video.pause();
            });
        },

        transitionEnd: function(){

            var activeIndex = this.activeIndex;
            var activeSlide = document.getElementsByClassName('swiper-slide')[activeIndex];
            var activeSlideVideo = activeSlide.getElementsByTagName('video')[0];
            activeSlideVideo.play();

        },

    }
});

// document.addEventListener("DOMContentLoaded", function() {
//     const videos = document.querySelectorAll('.video-card video');
//     const wrappers = document.querySelectorAll('.video-card');
//
//     wrappers.forEach(wrapper => {
//         const video = wrapper.querySelector('video');
//
//         // Проверяем, мобильное устройство или нет
//         const isMobile = /iPhone|iPad|iPod|Android/i.test(navigator.userAgent);
//
//         if (!isMobile) {
//             wrapper.addEventListener('click', function(e) {
//                 if (e.target !== video) {
//                     e.preventDefault();
//                     videos.forEach(v => {
//                         if (v !== video) {
//                             v.pause();
//                             v.currentTime = 0;
//                             v.closest('.video-card').classList.remove('playing');
//                         }
//                     });
//
//                     if (video.paused) {
//                         video.play();
//                         wrapper.classList.add('playing');
//                     } else {
//                         video.pause();
//                         wrapper.classList.remove('playing');
//                     }
//                 }
//             });
//         }
//
//         // В любом случае обрабатываем play/pause для самого видео
//         video.addEventListener('play', function() {
//             videos.forEach(v => {
//                 if (v !== video) {
//                     v.pause();
//                     v.currentTime = 0;
//                     v.closest('.video-card').classList.remove('playing');
//                 }
//             });
//             wrapper.classList.add('playing');
//         });
//
//         video.addEventListener('pause', function() {
//             wrapper.classList.remove('playing');
//         });
//     });
// });

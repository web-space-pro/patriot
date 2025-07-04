function ready() {

    ymaps.ready(init);

    function init() {


        var myMap = new ymaps.Map("map", {
                center: [44.606491, 33.520653],
                zoom: 16
            }, {
                searchControlProvider: 'yandex#search'
            }),
            myPlacemark = new ymaps.Placemark([44.606491, 33.520653], {
                    // Чтобы балун и хинт открывались на метке, необходимо задать ей определенные свойства.
                balloonContentHeader: "ЧОП Патриот | Частная охранная организация",
                hintContent: "ЧОП Патриот | Частная охранная организация",

                balloonContentBody: [
                    '<address>',
                    'Адрес:  г. Севастополь, Одесская 27-Б',
                    '</address>'
                    ].join('')
                }, {
                    // Опции
                    iconLayout: 'default#imageWithContent',
                    // Своё изображение иконки метки.
                    iconImageHref: '/wp-content/themes/patriot/map/marker.png',
                    // Размеры метки.
                    iconImageSize: [72, 72],
                    // Смещение левого верхнего угла иконки относительно
                    // её "ножки" (точки привязки).
                    iconImageOffset: [-30, -80],
                    iconCaption: "Диаграмма"
                }
            );

        myMap.geoObjects.add(myPlacemark);

        if (jQuery(window).width() < 960) {
            myMap.behaviors.disable('drag');
        }
        else{
            myMap.behaviors.disable('scrollZoom');
        }


    }

}
document.addEventListener("DOMContentLoaded", ready);
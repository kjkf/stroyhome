
// Функция ymaps.ready() будет вызвана, когда
// загрузятся все компоненты API, а также когда будет готово DOM-дерево.
ymaps.ready(init);
function init(){
    // Создание карты.
    var myMap = new ymaps.Map('map', {
            center: [59.913622729598686,30.279367467945075],
            zoom: 18
        }, {
            searchControlProvider: 'yandex#search'
        }),

        myPlacemark = new ymaps.Placemark([59.913668523561235,30.27648677546307], {
            hintContent: '',
            balloonContent: ''
        }, {
            // Опции.
            // Необходимо указать данный тип макета.
            iconLayout: 'default#image',
            // Своё изображение иконки метки.
            iconImageHref: 'assets/images/icons/baloon.svg',
            //iconImageHref: 'https://sandbox.api.maps.yandex.net/examples/ru/2.1/icon_customImage/images/myIcon.gif',
            // Размеры метки.
            iconImageSize: [92, 133],
            // Смещение левого верхнего угла иконки относительно
            // её "ножки" (точки привязки).
            iconImageOffset: [-5, -38]
        });

    myMap.controls.remove('geolocationControl');
    myMap.controls.remove('trafficControl');
    myMap.controls.remove('rulerControl');
    myMap.controls.remove('zoomControl');
    myMap.controls.remove('searchControl');
    myMap.controls.remove('fullscreenControl');
    myMap.controls.remove('routeButtonControl');
    myMap.controls.remove('typeSelector');

    myMap.behaviors
    // Отключаем часть включенных по умолчанию поведений:
    //  - drag - перемещение карты при нажатой левой кнопки мыши;
    //  - magnifier.rightButton - увеличение области, выделенной правой кнопкой мыши.
        .disable(['', 'rightMouseButtonMagnifier', 'scrollZoom', 'ruler'])
        // Включаем линейку.
        .enable('');

    myMap.geoObjects
        .add(myPlacemark);
}


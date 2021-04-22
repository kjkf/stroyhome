function initMap() {
    if (!document.getElementById("map")) return false;
    const latInput = document.getElementById('lat');
    const lngInput = document.getElementById('lng');
    if (!latInput || !lngInput) return false;

    const lat = parseFloat(latInput.value);
    const lng = parseFloat(lngInput.value);

    const windowInnerWidth = window.innerWidth;
    const markerPos = { lat: lat,  lng: lng }; //{ lat: 59.91389,  lng: 30.27649 }
    console.log(markerPos);
    let latDiff = 0.00343, lngDiff = -0.02316;

    //let mapCenter = { lat: 59.91046,  lng: 30.29965 };
    let iconScale = 1;
    if (windowInnerWidth < 576) {
        //mapCenter = { lat: 59.91262,  lng: 30.27697 };
        iconScale = 0.5;
        latDiff = 0.00127;
        lngDiff = -0.00048;
    } else if (windowInnerWidth < 769) {
        //mapCenter = { lat: 59.910899,  lng: 30.28576 };
        iconScale = 0.75;
        latDiff = 0.00300;
        lngDiff = -0.00927;
    }
    const newLat = parseFloat((markerPos.lat - latDiff).toFixed(6));
    const newLng = parseFloat((markerPos.lng - lngDiff).toFixed(6));
    let mapCenter = { lat: newLat, lng: newLng };

    console.log(mapCenter, iconScale);
    let map = new google.maps.Map(document.getElementById("map"), {
        center: mapCenter,
        zoom: 15,
        mapId: '4bdebe2aef94632b'
    });
    const svgMarker = {
        path:
            "M153.827 97.2386C153.351 95.457 152.386 93.5586 151.672 91.8966C143.126 71.3599 124.455 64 109.379 64C89.1962 64 66.9677 77.5331 64 105.428V111.127C64 111.365 64.082 113.502 64.1984 114.57C65.862 127.864 76.352 141.993 84.1864 155.287C92.615 169.53 101.361 183.542 110.026 197.547C115.369 188.407 120.693 179.148 125.914 170.244C127.337 167.632 128.989 165.02 130.413 162.527C131.363 160.866 133.177 159.206 134.005 157.661C142.434 142.229 156 126.679 156 111.365V105.074C156 103.413 153.942 97.5966 153.827 97.2386ZM109.748 125.848C103.815 125.848 97.3218 122.882 94.1166 114.689C93.639 113.385 93.6775 110.772 93.6775 110.532V106.852C93.6775 96.4086 102.545 91.6593 110.26 91.6593C119.757 91.6593 127.102 99.2577 127.102 108.755C127.102 118.252 119.245 125.848 109.748 125.848Z",
        fillColor: "#BBA182",
        fillOpacity: 0.6,
        strokeWeight: 0,
        rotation: 0,
        scale: iconScale,
        anchor: new google.maps.Point(15, 30)
    };

    new google.maps.Marker({
        position: markerPos,
        icon: svgMarker,
        map: map
    });

    calcContactBlockHeight();
}

function calcContactBlockHeight() {
    const contactsBlock = document.querySelector('.contacts-block');
    const h2 = contactsBlock.querySelector('h2');
    const content = contactsBlock.querySelector('.content');
    const mapin = contactsBlock.querySelector('.map-in');
    const mapinStyle = getComputedStyle(mapin);
    //console.log(h2.getBoundingClientRect().height);
    //console.log(content.getBoundingClientRect().height);
    //console.log(mapinStyle.paddingTop);

    let height = h2.getBoundingClientRect().height + content.getBoundingClientRect().height + parseFloat(mapinStyle.paddingTop);
    contactsBlock.style.height = `${height}px`;
}

function init_slider() {
    const windowInnerWidth = window.innerWidth;
    const slider = document.querySelector('.slider-container');
    if (!slider) return;
    const nextBtn = slider.querySelector('.btn--next');
    const prevBtn = slider.querySelector('.btn--prev');

    const items = slider.querySelector('.slider-items');
    const sliderMarginLeft =  windowInnerWidth <= 576 ? -5 : 15;
    const step = items.firstElementChild.getBoundingClientRect().width - sliderMarginLeft;
    const slideInView = windowInnerWidth <= 576 ? 2 : 4;

    const maxRight = (items.children.length - slideInView) * step;
    const minRight = 0;
    let currentRight = 0;

    nextBtn.addEventListener('click', function (e) {
        e.preventDefault();

        if (currentRight >= maxRight) return;
        currentRight += step;
        //console.log(currentRight, step);
        items.style.right = `${currentRight}px`;
    });

    prevBtn.addEventListener('click', function (e) {
        e.preventDefault();
        if (currentRight <= minRight) return;
        currentRight -= step;
        items.style.right = `${currentRight}px`;
    });

    //=====================swipe=====================================

    items.addEventListener('touchstart', handleTouchStart, false);
    items.addEventListener('touchmove', handleTouchMove, false);
    items.addEventListener('touchend', handleTouchEnd, false);

    const logBlock = document.querySelector('.log-block');

    let x1 = null;
    let y1 = null;

    let direction = "";

    function handleTouchStart(event) {
        const firstTouch = event.touches[0];
        //console.log('touch start');
        x1 = firstTouch.clientX;
        y1 = firstTouch.clientY;
    }

    function handleTouchMove(event) {
        //console.log('touch move');
        if(!x1 || !y1) return false;

        let x2 = event.touches[0].clientX;
        let y2 = event.touches[0].clientY;

        let xDiff = x2 - x1;
        let yDiff = y2 - y1;

        if (Math.abs(xDiff) > Math.abs(yDiff)) {
            //r - l
            if (xDiff > 0) direction = "right";
            else direction = "left";
        }
    }

    function handleTouchEnd(e) {
        //console.log('direction = ', direction);
        if (direction === 'right') {
            if (currentRight <= minRight) return;
            currentRight -= step;
            items.style.right = `${currentRight}px`;
        } else if (direction === 'left') {
            if (currentRight >= maxRight) return;
            currentRight += step;
            //console.log(currentRight, step);
            items.style.right = `${currentRight}px`;
        }
    }
}

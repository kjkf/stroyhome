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
    })
}
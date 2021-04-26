
function init_titles_anim() {
   const titles = document.querySelectorAll('.title-anim');
    if (titles.length == 0) return;
    let bannerTitle = document.querySelector('.banner .title-anim');

    /*titles.forEach(function (title) {
        anime(title);
    })*/
    window.addEventListener('scroll', animOnScroll);
    animOnScroll();
};

function anime(elem){
    let elemOffset = elem.getBoundingClientRect().top;
    let offsetTop = elemOffset - window.innerHeight;

    window.addEventListener('scroll', function (ev) {
        if (pageYOffset > offsetTop) {
            elem.classList.add('fade_in')
        }
    });
}

function animOnScroll() {
    const animItems = document.querySelectorAll('.title-anim');
    for (let index = 0; index < animItems.length; index++) {
        const animItem = animItems[index];
        const animItemHeight = animItem.offsetHeight;
        const animItemOffset = offset(animItem).top;
        const animStart = 4;

        let animItemPoint = window.innerHeight - animItemHeight / animStart;
        if (animItemHeight > window.innerHeight) {
            animItemPoint = window.innerHeight - window.innerHeight / animStart;
        }

        if ((pageYOffset > animItemOffset - animItemPoint) && pageYOffset < (animItemOffset + animItemHeight)) {
            animItem.classList.add('fade_in')
        }
    };
}

function offset(el) {
    const  rect = el.getBoundingClientRect(),
        scrollLeft = window.pageXOffset || document.documentElement.scrollLeft,
        scrollTop = window.pageYOffset || document.documentElement.scrollTop;

    return {
        top: rect.top + scrollTop,
        left: rect.left + scrollLeft
    }
}
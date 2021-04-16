
function init_titles_anim() {
   const titles = document.querySelectorAll('.title-anim');
    if (!titles) return;
    let bannerTitle = document.querySelector('.banner .title-anim');

    titles.forEach(function (title) {
        anime(title);
    })
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
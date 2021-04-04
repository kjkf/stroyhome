function init_menu(){
    const menuWrap = document.querySelector('.menu-main-wrap');
    const menuBtn = document.querySelector('.btn-menu');

    menuBtn.addEventListener('click', function (evt) {
        menuBtn.classList.toggle('open');
        menuWrap.classList.toggle('active');
    })
}
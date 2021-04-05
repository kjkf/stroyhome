function init_menu(){
    const menuWrap = document.querySelector('.menu-main-wrap');
    const menuBtn = document.querySelector('.btn-menu');
    const menuLinks = menuWrap.querySelectorAll('.menu-main a');

    menuBtn.addEventListener('click', function (evt) {
        evt.preventDefault();
        menuBtn.classList.toggle('open');
        menuWrap.classList.toggle('active');
    });

    menuLinks.forEach(function (link) {
       link.addEventListener('click', function(e) {
           menuBtn.classList.toggle('open');
           menuWrap.classList.toggle('active');
       });
    });
}
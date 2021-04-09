function init_menu(){
    const menuWrap = document.querySelector('.menu-main-wrap');
    const menuBtn = document.querySelector('.btn-menu');
    const header = document.querySelector('.header');
    const rect = header.getBoundingClientRect();
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

    setMenuBtnPosClass();
    window.addEventListener('scroll', function() {
        setMenuBtnPosClass();
    });

    function setMenuBtnPosClass() {
        if (pageYOffset > rect.height) {
            menuBtn.classList.add('fixed');
        } else {
            menuBtn.classList.remove('fixed');
        }
    }

    setTopBlockPadding();
    function setTopBlockPadding() {
        const header = document.querySelector('header');
        const rect = header.getBoundingClientRect();
        const topBlock = document.querySelector('.top.fullscreen');
        const topIn = document.querySelector('.top.fullscreen .top-in');
        topBlock.style.paddingTop = `${rect.height}px`;
        //100vh - header.height
        topIn.style.height = `calc(100vh - ${rect.height}px)`;
    };
}
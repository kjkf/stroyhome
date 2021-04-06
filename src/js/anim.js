$(document).ready(function($) {
    $(".section-title").not('.title-first').each(anime);
    $(".test-item__desc").not('.subtitle-first').each(anime);
});
function anime(){
    var offsetTop = $(this).offset().top - $(window).height();
    var thisTitle = $(this);
    $(window).scroll(function(event) {
        if($(document).scrollTop() > offsetTop ){
            thisTitle.addClass('fade_in');
        }
    });
}

function init_titles_anima(elem) {
   const titles = document.querySelectorAll('.title-anim');
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

document.addEventListener('DOMContentLoaded', function (evt) {
    init_menu();
    initTabs();
    initModal();
    init_titles_anim();
    initQuiz();
    initSchemasDescr();
    init_slider();

    const btnMore = document.querySelector('.btn--more');
    const text = document.querySelector('.build .build-text');

    btnMore.addEventListener('click', function (e) {
        text.classList.toggle('excerpt');
    });


});

function calcBgWrapperHeight() {
    const bgWrapper = document.querySelector('.background-outer-wrapper');

}
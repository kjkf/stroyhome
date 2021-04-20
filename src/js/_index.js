
document.addEventListener('DOMContentLoaded', function (evt) {
    init_menu();
    initTabs();
    initModal();
    init_titles_anim();
    initQuiz();
    initSchemasDescr();
    init_slider();
    initSendToEmailHandlers();
    formInputFocusEventHandler();
    createTooltips();
    initModalVideo();

    const btnMore = document.querySelector('.btn--more');
    const text = document.querySelector('.build .build-text');

    if (!btnMore) return;
    
    btnMore.addEventListener('click', function (e) {
        text.classList.toggle('excerpt');
    });
});

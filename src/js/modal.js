function initModal() {
    initCallbackModal();

    initPrivateModal();
}

function createModal(template, addClass) { //addClass - дополнительный класс для обертки модального окна, например, чтобы можно было скроллить политику конфед.
    let modalWrapper = document.createElement('div');
    modalWrapper.classList.add('modal-wrap-fixed');
    modalWrapper.innerHTML = template;
    if (addClass) modalWrapper.classList.add('scrolled');

    const closeBtn = modalWrapper.querySelector('.btn-close');
    closeBtn.addEventListener('click', function (evt) {
        const inputsWithErrors = modalWrapper.querySelectorAll('.error');
        inputsWithErrors.forEach(input => {
            input.classList.remove('error');
        });
        closeModal(modalWrapper);
    });
    return modalWrapper;
}

function showModal(modal, isDownload) {
    document.body.append(modal);
    modal.classList.add('active');

    /*var a = modal.getElementsByClassName('masked-phone'),
        b = [];

    for (var c = 0; c < a.length; c++) {
        b.push(new PhoneField(a[c], a[c].dataset.phonemask, a[c].dataset.placeholder));
    }*/
}

function closeModal(modal) {
    modal.remove();
    //modal.classList.remove('active');
}

function createModalCallback(template) {
    const modalWrapper = createModal(template);

    const submitBtn = modalWrapper.querySelector('.btn-submit');
    const phone = modalWrapper.querySelector('.phone-num');
    const agreeCheckbox = modalWrapper.querySelector('#agree_cond');
    const label = agreeCheckbox.closest('label');
    const isDownload = modalWrapper.querySelector('#isDownload');

    submitBtn.addEventListener('click', function (evt) {
        /*if (!phone || !phone.value) {
            evt.preventDefault();
            phone.classList.add('error');
            phone.focus();
            return;
        }

        if (!agreeCheckbox || !agreeCheckbox.checked) {
            evt.preventDefault();
            label.classList.add('error');
            agreeCheckbox.focus();
            return;
        }


        phone.classList.remove('error');
        label.classList.remove('error');
        phone.value = '';
        agreeCheckbox.checked = false;
        closeModal(modalWrapper);*/

        if (isDownload && isDownload.value === '1') {
            const downloadLink = modalWrapper.querySelector('#downloadLink');
            //console.log(downloadLink);
            downloadLink.click();
        };
    });

    /*phone.addEventListener('keydown', function (e) {
        let key = e.key;

        if ( !( (key >= '0' && key <= '9') || key == '+' || key == '(' || key == ')' || key == '-' || key == 'Backspace' || key == 'Delete' )  ) {
            e.preventDefault();
            return false;
        }
        phone.classList.remove('error');
    });

    agreeCheckbox.addEventListener('change', function (evt) {
       if (agreeCheckbox.checked) {
           label.classList.remove('error');
       }
    });*/

    document.addEventListener('keydown', function (e) {
        if (e.key == 'Escape') {
            closeBtn.click();
        }
    });

    return modalWrapper;
}

function initPrivateModal() {
    const templ = document.querySelector('#modalPrivacy').innerHTML;
    if (!templ) return false;
    const modal = createModal(templ, 'scrolled');

    const showPrivacyBtns = document.querySelectorAll('.private-privacy');
    showPrivacyBtns.forEach(function (btn) {
        btn.addEventListener('click', function (e) {
            e.preventDefault();
            showModal(modal);
        })
    });

};
function showCallbackModal(modal) {
    modal.classList.add('active');

}

function closeFormModal() {
    const modal = document.querySelector('#modalTemplate');
    const isDownload = modal.querySelector('#isDownload');
    if (isDownload && isDownload.value === '1') {
        const downloadLink = modal.querySelector('#downloadLink');
        //console.log(downloadLink);
        downloadLink.click();
    };

    modal.classList.remove('active')
}

function initCallbackModal() {
    const modal = document.querySelector('#modalTemplate');//.innerHTML;
    if (!modal) return false;
    //const modal = createModalCallback(templ);
    //console.log(modal);

    const closeBtn = modal.querySelector('.btn-close');
    closeBtn.addEventListener('click', function (evt) {

        modal.classList.remove('active');
    });

    const isDownload = modal.querySelector('#isDownload');

    const callback = document.querySelector('.callback.fixed');

    const phoneBtn = callback.querySelector('.phone-btn');
    //console.log(phoneBtn);
    phoneBtn.addEventListener('click', function (evt) {
        evt.preventDefault();
        isDownload.value = 0;
        showModal(modal);
    });

    const downloadBtn = callback.querySelector('.download-btn');
    downloadBtn.addEventListener('click', function (evt) {
        evt.preventDefault();
        isDownload.value = 1;
        showModal(modal);
    });

    const calcBlock = document.getElementById('calculate');
    const calcBtn = callback.querySelector('.calc-btn');
    calcBtn.addEventListener('click', function (ev) {
        ev.preventDefault();
        calcBlock.scrollIntoView();
    });

    //=============================================================
    const principlesModalBtn = document.querySelector('.principle .btn-submit');
    if (!principlesModalBtn) return false;
    principlesModalBtn.addEventListener('click', function (evt) {
        evt.preventDefault();
        isDownload.value = 0;
        showModal(modal);
    });

    //=============================================================
    const contactModalBtn = document.querySelector('.contacts-block .btn-submit');
    if (!contactModalBtn) return false;
    contactModalBtn.addEventListener('click', function (evt) {
        evt.preventDefault();
        isDownload.value = 0;
        showModal(modal);
    });

    //============================================
    const typesDownloadBtn = document.getElementById('typesDownload');
    typesDownloadBtn.addEventListener('click', function (ev) {
        ev.preventDefault();
        isDownload.value = 1;
        showModal(modal);
    });

}
function createModal(template) {
    let modalWrapper = document.createElement('div');
    modalWrapper.classList.add('modal-wrap-fixed');
    modalWrapper.innerHTML = template;

    const closeBtn = modalWrapper.querySelector('.btn-close');
    closeBtn.addEventListener('click', function (evt) {
        phone.classList.remove('error');
        label.classList.remove('error');
        closeModal(modalWrapper);
    });

    const submitBtn = modalWrapper.querySelector('.btn-submit');
    const phone = modalWrapper.querySelector('.phone-num');
    const agreeCheckbox = modalWrapper.querySelector('#agree_cond');
    const label = agreeCheckbox.closest('label');
    submitBtn.addEventListener('click', function (evt) {
        if (!phone || !phone.value) {
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
        closeModal(modalWrapper);
    });

    phone.addEventListener('keydown', function (e) {
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
    });

    document.addEventListener('keydown', function (e) {
        if (e.key == 'Escape') {
            closeBtn.click();
        }
    });

    return modalWrapper;
}

function showModal(modal) {
    document.body.append(modal);
    modal.classList.add('active');
}

function closeModal(modal) {
    modal.remove();
    //modal.classList.remove('active');
}

function initModal() {
    const templ = document.querySelector('#modalTemplate').innerHTML;
    const modal = createModal(templ);

    const phoneBtn = document.querySelector('.phone-btn');
    phoneBtn.addEventListener('click', function (evt) {
        showModal(modal);
    });

}
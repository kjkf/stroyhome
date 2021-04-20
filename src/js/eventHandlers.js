function initSendToEmailHandlers() {
    const sendToEmailBtns = document.querySelectorAll('.sendToEmail');

    sendToEmailBtns.forEach(function (btn) {
        btn.addEventListener('click', function (e) {
            const form = this.closest('form');

            const phone = form.querySelector('input[type=tel]');
            const checkbox = form.querySelector('input[type=checkbox]');

            if (!checkbox.checked) {
                e.preventDefault();
            }

            if (phone.value.trim().indexOf('_') > 0) {
                e.preventDefault();
            }
        })
    })
}

function formInputFocusEventHandler() {
    const phoneInputs = document.querySelectorAll('form .masked-phone');
    console.log(phoneInputs);
    phoneInputs.forEach(function (input) {
        input.addEventListener('focus', function (e) {
            console.log('focus ====', input.value);
            setTimeout(function() {
                input.setSelectionRange(3, 3);
            }, 0);
        })
    })
};
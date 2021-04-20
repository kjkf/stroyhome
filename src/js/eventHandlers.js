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
    //console.log(phoneInputs);
    phoneInputs.forEach(function (input) {
        input.addEventListener('focus', function (e) {
           //console.log('focus ====', input.value);
            setTimeout(function() {
                input.setSelectionRange(3, 3);
            }, 0);
        })
    })

};

function createTooltips() {
    const lis = document.querySelectorAll('li[data-tooltip]');

    const tooltip = document.createElement('span');
    tooltip.classList.add('tooltip');

    lis.forEach(function (li) {
        li.addEventListener('mouseenter', handler);
        li.addEventListener('mouseleave', handler);

        function handler(event) {
            if (event.type == 'mouseenter') {
                const text = event.target.dataset.tooltip;
                tooltip.textContent = text;
                event.target.insertAdjacentElement('afterbegin', tooltip);
            }
            if (event.type == 'mouseleave') {
                tooltip.remove();
            }
        }
    });
}
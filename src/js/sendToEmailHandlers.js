function initsendToEmailHandlers() {
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
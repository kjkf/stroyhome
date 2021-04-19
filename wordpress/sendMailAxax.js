jQuery(function($){
    //E-mail Ajax Send

    $("form").submit(function() { //Change
        var th = $(this);
        console.log(th);
        $.ajax({
            type: "POST",
            url: "mailform.php", //Change
            data: th.serialize()
        }).done(function() {
            //alert("Thank you!");
            showSuccessModal();
            setTimeout(function() {
                // Done Functions
                th.trigger("reset");
            }, 1000);
        });
        return false;
    });

});

function createSuccessModal() {
    console.log('createSuccessModal');
    const template = document.getElementById('successModal').innerHTML;
    let modal = document.createElement('div');
    modal.classList.add('modal-wrap-fixed');
    modal.innerHTML = template;

    const closeBtn = modal.querySelector('.btn-close');
    closeBtn.addEventListener('click', function (evt) {

        closeSuccessModal(modal);
    });
    console.log(modal);
    return modal;
}
function showSuccessModal() {
    console.log('showSuccessModal');
    const modal = createSuccessModal();
    document.body.append(modal);
    modal.classList.add('active');
}

function closeSuccessModal(modal) {
    modal.remove();
}
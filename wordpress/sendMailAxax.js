jQuery(function($){
    //E-mail Ajax Send

    $("#quiz-form").submit(function() { //Change
        var th = $(this);
        $.ajax({
            type: "POST",
            url: "wp-content/themes/stroydom/mail.php", //Change
            data: th.serialize()
        }).done(function() {
            alert("Thank you!");
            setTimeout(function() {
                // Done Functions
                th.trigger("reset");
            }, 1000);
        });
        return false;
    });

});
$(document).ready(function () {

    $('.loginForm').submit(function(e){
        e.preventDefault();
        $('.submitBtn').attr('disabled', true);
        var formData = $(this).serialize();
        $.ajax({
            type: 'POST',
            url: formAction,
            data: formData,
            dataType: 'json',
            success: function (res) {
                if(res.errors === true){
                    errorMsg = res.msg;
                    $('.errorDiv').text(errorMsg).removeClass('d-none');
                    $('.submitBtn').attr('disabled', false);
                }
                else{
                    //user is logged In
                    redirectUrl = res.redirect;
                    console.log(redirectUrl);
                    window.location.href = redirectUrl;
                }
            },
            error: function(error) {
                console.log(error);
                console.log('Error found in json response');
            }
        });
    });

});
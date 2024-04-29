$(document).ready(function () {

    $('.createAccountForm').submit(function(e){
        e.preventDefault();
        // console.log( formAction );
        var submitBtnText = $('.submitBtn').text();
        $('.submitBtn').text('Please Wait...').attr('disabled', true);
        $('.createAccountForm input').removeClass('is-invalid is-valid');
        $('.createAccountForm select').removeClass('is-invalid is-valid');
        $('.invalid-feedback').css('display','none');
        $('.errorDiv').html('').addClass('d-none');
        var formData = $(this).serialize();
        $.ajax({
            type: 'POST',
            url: formAction,
            data: formData,
            dataType: 'json',
            success: function (res) {
                console.log(res);
                $('.createAccountForm').trigger('reset');
                $('.createAccountForm input').removeClass('is-invalid is-valid');
                $('.createAccountForm select').removeClass('is-invalid is-valid');
                $('#password').removeClass('password-error');
                $('.submitBtn').text(submitBtnText).attr('disabled', false);
                msg = res.message;
                console.log(msg);
                $('.successMsg').text(msg);
                $('#successToast').toast('show');
            },
            error: function(xhr, status, error) {
                if (xhr.status === 422) {
                    var errors = xhr.responseJSON.errors;
                    // console.log(errors);
                    var successField = xhr.responseJSON.successField;
                    // console.log(errors);
                    $.each(errors, function(field, error) {
                        // console.log('.' + field + '-error');
                        // console.log(error[0]);
                        $('#' + field).addClass('is-invalid');
                        $('.' + field + '-error').text(error[0]);
                        $('.' + field + '-error').css('display','block');
                    });
                    $.each(successField, function(field, val) {
                        $('#' + val).addClass('is-valid');
                    });
                }
                //It means the data is already exist in our DB
                if (xhr.status === 423) {
                    var error = xhr.responseJSON.errors;
                    console.log(error);
                    var errorField = xhr.responseJSON.errorField;
                    console.log(errorField);
                    if(errorField=='emailAddress'){
                        $('#' + errorField).addClass('is-invalid');
                        $('.' + errorField + '-error').text(error);
                        $('.' + errorField + '-error').css('display','block');
                    }
                    if(errorField=='errorDiv'){
                        $('.errorDiv').removeClass('d-none');
                        $('.errorDiv').html('<h5>Oops! Something went wrong.</h5><p>We are experiencing technical difficulties. Please try again later.</p>');
                    }
                }
                $('.submitBtn').text(submitBtnText).attr('disabled', false);
            }
        });
    });

});
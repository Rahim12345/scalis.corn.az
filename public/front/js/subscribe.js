$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#subscibeBtn').click(function (){
        $(this).attr('disabled', true);
        $('#email-error').html('');
        let email = $('#email').val();
        // if(email == ''){
        //     $('#email').focus();
        //     $(this).attr('disabled', false);
        //     return false;
        // }

        grecaptcha.ready(function () {
            grecaptcha.execute($('#site_key').val(), { action: 'subscribe' }).then(function (token) {
                var recaptchaResponse = document.getElementById('recaptchaResponse');
                recaptchaResponse.value = token;
                $.ajax({
                    'url': '/subscribe',
                    'type': 'POST',
                    'data': {
                        'email': email,
                        'token': token
                    },
                    'success': function (data) {
                        $('#email').val('');
                        $('#email-error').html(data.message);
                        $('#subscibeBtn').attr('disabled', false);
                    },
                    'error': function (myErrors) {
                        $.each(myErrors.responseJSON.errors, function (key, value) {
                            if (key === 'bot')
                            {
                                toastr.error(value);
                                return;
                            }
                            $('#email-error').html(value);
                        });
                        $('#subscibeBtn').attr('disabled', false);
                    }
                });
            });
        });
    });
});

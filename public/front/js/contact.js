$(document).ready(function () {
    $('#contactBtn').click(function () {
        grecaptcha.ready(function () {
            grecaptcha.execute($('#site_key').val(), { action: 'contact' }).then(function (token) {
                var recaptchaResponse = document.getElementById('recaptchaResponse');
                recaptchaResponse.value = token;
                let name = $('#name').val();
                let email = $('#email2').val();
                let telno = $('#telno').val();
                let message = $('#message').val();
                $.ajax({
                    url: '/contact',
                    type: 'POST',
                    data: {
                        name: name,
                        email: email,
                        telno: telno,
                        message: message,
                        token: token
                    },
                    success: function (data) {
                        toastr.success(data.message);
                        $('#contactForm').trigger("reset");
                    },
                    error: function (data) {
                        var errors = data.responseJSON.errors;
                        if (errors) {
                            $.each(errors, function (key, value) {
                                toastr.error(value);
                            });
                        }
                    }
                });
            });
        });
    });
});

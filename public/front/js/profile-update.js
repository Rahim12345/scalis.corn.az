$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#updateProfileBtn').click(function () {
        $('#name-error').html('');
        $('#password-error').html('');
        $('#ypassword-error').html('');
        let url         = $('#profil-update-form').attr('action');
        let name        = $('#name').val();
        let password    = $('#password').val();
        let ypassword   = $('#ypassword').val();
        $.ajax({
            data : {
                name,
                password,
                ypassword
            },
            type : 'POST',
            url : url,
            success : function () {
                $('#top-name').html('').html(name.split(' ')[0].substring(0,16));
                $('#sidebar-name').html('').html(name);
                toastr.success('Profile uğurla yeniəndi');
            },
            error : function (myErrors) {
                $.each(myErrors.responseJSON.errors, function (key, item) {
                    $('#'+key+'-error').html(item);
                });
            }
        });
    });
});

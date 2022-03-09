$(document).ready(function () {
    $('#getFileCv').change(function () {
        var fileName = $(this).val().replace(/.*(\/|\\)/, '');
        $('#getFileCvBtn').html('').html(fileName);
    });

    $('#getFileCharacteristics').change(function () {
        var fileName = $(this).val().replace(/.*(\/|\\)/, '');
        $('#getFileCharacteristicsBtn').html('').html(fileName);
    });

    $('#careerBtn').click(function () {
        var property = document.getElementById('careerForm');
        var form_data = new FormData(property);
        $.ajax({
            url: '/career',
            type: 'POST',
            data: form_data,
            processData: false,
            contentType: false,
            success: function (data) {
                $('#careerForm').trigger("reset");
                $('#getFileCvBtn').html('').html($('#getFileCvBtn').attr('data-name'));
                $('#getFileCharacteristicsBtn').html('').html($('#getFileCharacteristicsBtn').attr('data-name'));
                toastr.success(data.message);
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

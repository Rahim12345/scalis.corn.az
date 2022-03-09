$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.image-change').click(function () {
        $('#video_banner').click();
    });

    $( '#video_banner' ).change( function ( event ) {
        $('#imageProgress').css('display','flex');

        var property = document.getElementById('home-form');
        var form_data = new FormData(property);
        form_data.append('action', 'upload_video_banner');
        $.ajax({
            type : 'POST',
            data : form_data,
            url  : $('#home-form').attr('action'),
            cache: false,
            processData: false,
            contentType: false,
            success : function (response) {
                toastr.success(response.message);
                var video = document.getElementById('videoBanner');
                video.src = response.src;
                video.load();
                video.play();
            },
            error : function (myErrors) {
                $.each(myErrors.responseJSON.errors, function (key, error) {
                    toastr.error(error);
                });
            }
        });
        $('#imageProgress').css('display','none');
    } );

    $('#add').click(function () {
        $('#title_az-error').html('');   // clear error message
        $('#title_en-error').html('');   // clear error message
        $('#title_ru-error').html('');   // clear error message
        $('#about_us_az-error').html('');   // clear error message
        $('#about_us_en-error').html('');   // clear error message
        $('#about_us_ru-error').html('');   // clear error message

        var property = document.getElementById('home-form');
        var form_data = new FormData(property);
        form_data.append('about_us_az', CKEDITOR.instances["about_us_az"].getData()); // get data from textarea
        form_data.append('about_us_en', CKEDITOR.instances["about_us_en"].getData()); // get data from textarea
        form_data.append('about_us_ru', CKEDITOR.instances["about_us_ru"].getData()); // get data from textarea
        form_data.append('action', 'home_about_text'); // set action for form
        $.ajax({
            type : 'POST',
            data : form_data,
            url  : $('#home-form').attr('action'),
            cache: false,
            processData: false,
            contentType: false,
            success : function (response) {
                toastr.success(response.message);
            },
            error : function (myErrors) {
                $.each(myErrors.responseJSON.errors, function (key, error) {
                    $('#'+key+'-error').html('').html(error);
                });
            }
        });
    });
});

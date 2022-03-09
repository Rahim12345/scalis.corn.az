$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.image-change').click(function () {
        $('#image').click();
    });

    $( '#image' ).change( function ( event ) {
        $('#imageProgress').css('display','flex');

        var property = document.getElementById('about-form');
        var form_data = new FormData(property);
        form_data.append('action', 'upload_image');
        $.ajax({
            type : 'POST',
            data : form_data,
            url  : $('#about-form').attr('action'),
            cache: false,
            processData: false,
            contentType: false,
            success : function (response) {
                toastr.success(response.message);
                let reader = new FileReader();
                reader.onload = function () {
                    $("#image-change").css({
                        "background-image"  : "url(" + reader.result + ")",
                        "background-size"   : "100%",
                    });
                };

                let img = new Image()
                img.src = window.URL.createObjectURL(event.target.files[0])
                img.onload = () => {
                    reader.readAsDataURL( event.target.files[ 0 ] );
                }
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
        $('#about_us_az-error').html('');   // clear error message
        $('#about_us_en-error').html('');   // clear error message
        $('#about_us_ru-error').html('');   // clear error message

        var property = document.getElementById('about-form');
        var form_data = new FormData(property);
        form_data.append('about_us_az', CKEDITOR.instances["about_us_az"].getData()); // get data from textarea
        form_data.append('about_us_en', CKEDITOR.instances["about_us_en"].getData()); // get data from textarea
        form_data.append('about_us_ru', CKEDITOR.instances["about_us_ru"].getData()); // get data from textarea
        $.ajax({
            type : 'POST',
            data : form_data,
            url  : $('#about-form').attr('action'),
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

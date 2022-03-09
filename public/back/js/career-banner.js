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

        var property = document.getElementById('career-form');
        var form_data = new FormData(property);
        form_data.append('action', 'career_banner');
        $.ajax({
            type : 'POST',
            data : form_data,
            url  : $('#career-form').attr('action'),
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
        $('#career_az-error').html('');   // clear error message
        $('#career_en-error').html('');   // clear error message
        $('#career_ru-error').html('');   // clear error message

        var property = document.getElementById('career-form');
        var form_data = new FormData(property);
        form_data.append('career_az', CKEDITOR.instances["career_az"].getData()); // get data from textarea
        form_data.append('career_en', CKEDITOR.instances["career_en"].getData()); // get data from textarea
        form_data.append('career_ru', CKEDITOR.instances["career_ru"].getData()); // get data from textarea
        $.ajax({
            type : 'POST',
            data : form_data,
            url  : $('#career-form').attr('action'),
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

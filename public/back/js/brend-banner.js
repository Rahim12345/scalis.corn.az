$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.image-change1').click(function () {
        $('#brend_banner').click();
    });

    $( '#brend_banner' ).change( function ( event ) {
        $('#imageProgress1').css('display','flex');

        var property = document.getElementById('brend-form');
        var form_data = new FormData(property);
        form_data.append('action', 'brend_banner');
        $.ajax({
            type : 'POST',
            data : form_data,
            url  : $('#brend-form').attr('action'),
            cache: false,
            processData: false,
            contentType: false,
            success : function (response) {
                toastr.success(response.message);
                let reader = new FileReader();
                reader.onload = function () {
                    $("#image-change1").css({
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
        $('#imageProgress1').css('display','none');
    } );

});

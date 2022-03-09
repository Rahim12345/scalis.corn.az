$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    brendLoader();

    $('.image-change2').click(function () {
        $('#brend_image').click();
    });

    $( '#brend_image' ).change( function ( event ) {
        $('#imageProgress2').css('display','flex');

        var property = document.getElementById('brend-form');
        var form_data = new FormData(property);
        form_data.append('action', 'brend_image');
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
                    $("#image-change2").css({
                        "background-image"  : "url(" + reader.result + ")",
                        "background-size"   : "100%",
                    });
                };

                let img = new Image()
                img.src = window.URL.createObjectURL(event.target.files[0])
                img.onload = () => {
                    reader.readAsDataURL( event.target.files[ 0 ] );
                }
                brendLoader();
            },
            error : function (myErrors) {
                $.each(myErrors.responseJSON.errors, function (key, error) {
                    toastr.error(error);
                });
            }
        });
        $('#imageProgress2').css('display','none');
    } );

    function brendLoader() {
        $('#brends').html('');
        let token = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            'url' : '/admin/brend-loader',
            'type' : 'POST',
            success : function (response) {
                let output = '';

                $.each(response, function (key, brend) {
                    output += '<tr data-id="'+brend.id+'">\n' +
                        '                            <td><img src="/files/brends/'+brend.src+'" alt=""></td>\n' +
                        '                            <td>\n' +
                        '                                <div class="btn-list flex-nowrap">\n' +
                        '                                    <div class="dropdown">\n' +
                        '                                        <button class="btn btn-danger delete-brend" type="button" data-id="'+brend.id+'"><i class="fa fa-trash"></i>\n' +
                        '                                    </div>\n' +
                        '                                </div>\n' +
                        '                            </td>\n' +
                        '                        </tr>';
                });
                $('#brends').html(output);
            }
        });
    }

    function brendDelete(id) {
        $.ajax({
            'url' : '/admin/brend/'+id,
            'type' : 'DELETE',
            'data' : {
                '_token' : $('meta[name="csrf-token"]').attr('content'),
                '_method' : 'DELETE'
            },
            success : function (response) {
                toastr.success(response.message);
                // brendLoader();
                $('tr[data-id="'+id+'"]').remove();
            }
        });
    }


    $(document).on('click', '.delete-brend', function () {
        let id = $(this).data('id');
        brendDelete(id);
    });
});

$(document).ready(function () {
    $('#change-avatar').click(function () {
        $('#profile-avatar').click();
    });

    $( 'input[type=file]' ).change( function ( event ) {
        $('#avatarProgress').css('display','flex');
        let val = $( this ).val().toLowerCase(),
            regex = new RegExp( '(.*?)\.(png|jpeg|jpg)$' );

        if ( $( this )[ 0 ].files.length !== 1 )
        {
            $( this ).val( '' );
            toastr.error( 'Yalnız png, jpeg, jpg formatda şəkillər əlavə edə bilərsiniz' );
            $( '#profile-image' ).attr( 'src', '/assets/avatars/avatar.png' );
            $( '#top-profile-image' ).attr( 'src', '/assets/avatars/avatar.png' );


            $( '#sidebar-profile-preview' ).attr( 'src', '/assets/avatars/avatar.png' );
            $('#avatarProgress').css('display','none');
        }
        else if ( ! ( regex.test( val ) ) )
        {
            $( this ).val( '' );
            toastr.error( 'Yalnız png, jpeg, jpg formatda şəkillər əlavə edə bilərsiniz' );
            $( '#profile-image' ).attr( 'src', '/assets/avatars/avatar.png' );
            $( '#top-profile-image' ).attr( 'src', '/assets/avatars/avatar.png' );


            $( '#sidebar-profile-preview' ).attr( 'src', '/assets/avatars/avatar.png' );
            $('#avatarProgress').css('display','none');
        }
        else
        {
            $( '#profile-image' ).attr( 'src' );
            $( '#top-profile-image' ).attr( 'src' );

            var property = document.getElementById('profile-avatar').files[0];
            var form_data = new FormData();
            form_data.append('file', property);

            let url         = $('#profile_avatar_upload').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type : 'POST',
                data : form_data,
                url  : url,
                cache: false,
                processData: false,
                contentType: false,
                success : function () {

                    let reader = new FileReader();
                    reader.onload = function () {
                        $("#nav-avatar").css("background-image", "url(" + reader.result + ")");
                        $("#profile-image").css("background-image", "url(" + reader.result + ")");
                    };

                    let img = new Image()
                    img.src = window.URL.createObjectURL(event.target.files[0])
                    img.onload = () => {
                        reader.readAsDataURL( event.target.files[ 0 ] );
                    }
                    $('#avatarProgress').css('display','none');
                    toastr.success('Profil şəkili uğurla əlavə edildi');
                },
                error : function (myErrors) {
                    $.each(myErrors.responseJSON.errors,function (key, value) {
                        toastr.error(value,'Xəta');
                    });
                    $('#avatarProgress').css('display','none');
                }
            });

        }
    } );
});

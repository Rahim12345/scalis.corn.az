$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    setValues();

    $('#capri').click(function () {
        activeTyping('capri','block');
    });
    $('#agt').click(function () {
        activeTyping('agt','block');
    });
    $('#brend').click(function () {
        activeTyping('brend','inline');
    });
    $('#seth').click(function () {
        activeTyping('seth','block');
    });
    $('#reng').click(function () {
        activeTyping('reng','block');
    });
    $('#en').click(function () {
        activeTyping('en','inline');
    });
    $('#boy').click(function () {
        activeTyping('boy','inline');
    });
    $('#qalinliq').click(function () {
        activeTyping('qalinliq','inline');
    });
    $('#palet').click(function () {
        activeTyping('palet','inline');
    });

    $('#draft').click(function () {
        addProduct('draft',0);
    });

    $('#add').click(function () {
        addProduct('add',1);
    });

    $('#center_image').click(function () {
        $('#center_image_file').click();
    });

    $('#center_image_file').change(function () {
        uploadFile('center_image','upload_image');
    });

    $('#right_side_image_1').click(function () {
        $('#right_side_image_1_file').click();
    });

    $('#right_side_image_1_file').change(function () {
        uploadFile('right_side_image_1','upload_image');
    });

    $('#right_side_image_2').click(function () {
        $('#right_side_image_2_file').click();
    });

    $('#right_side_image_2_file').change(function () {
        uploadFile('right_side_image_2','upload_image');
    });

    $('#right_side_video').click(function () {
        $('#right_side_video_file').click();
    });

    $('#right_side_video_file').change(function () {
        uploadFile('right_side_video','upload_video');
    });


    function activeTyping(id, display) {
        $('#'+id).click(function () {
            $(this).css('display', 'none');
            $('#'+id+'Input').css('display', display).focus();
        });

        $('#'+id+'Input').focusout(function () {
            if ($(this).val() == '') {
                toastr.error('Bu xana boş olmaz');
                $(this).css('display', 'none');
                $('#'+id+'Input').css('display', display).focus();
                return;
            }

            if (localStorage.getItem(id) != $(this).val()) {
                toastr.success('Xana dəyişdirildi');
            }
            localStorage.setItem(id, $(this).val());
            $(this).css('display', 'none');
            $('#'+id).css('display', display).html($(this).val());
        });
    }

    function setValues() {
        let capri                       = localStorage.getItem('capri');
        let agt                         = localStorage.getItem('agt');
        let brend                       = localStorage.getItem('brend');
        let seth                        = localStorage.getItem('seth');
        let reng                        = localStorage.getItem('reng');
        let en                          = localStorage.getItem('en');
        let boy                         = localStorage.getItem('boy');
        let qalinliq                    = localStorage.getItem('qalinliq');
        let palet                       = localStorage.getItem('palet');
        let center_image                = localStorage.getItem('center_image');
        let right_side_image_1          = localStorage.getItem('right_side_image_1');
        let right_side_image_2          = localStorage.getItem('right_side_image_2');
        let right_side_video            = localStorage.getItem('right_side_video');

        if (capri == null) {
            capri = 'Capri';
        }

        if (agt == null) {
            agt = 'AGT MDF-Lam Serilerinin favori dekorlarını sunan Dreamlam ile her mekanda trend tasarımlar yaratın!';
        }

        if (brend == null) {
            brend = 'AGT';
        }

        if (seth == null) {
            seth = 'Mat Lake Hissi';
        }

        if (reng == null) {
            reng = '20';
        }

        if (en == null) {
            en = '1220';
        }

        if (boy == null) {
            boy = '1220';
        }

        if (qalinliq == null) {
            qalinliq = '1220';
        }

        if (palet == null) {
            palet = '20';
        }

        if (center_image == null) {
            center_image = '/scalis/img/products/details/detail/2.png';
        }

        if (right_side_image_1 == null) {
            right_side_image_1 = '/scalis/img/products/details/detail/3.png';
        }

        if (right_side_image_2 == null) {
            right_side_image_2 = '/scalis/img/products/details/detail/1.png';
        }

        if (right_side_video == null) {
            right_side_video = '/scalis/video/home-video.mp4';
        }

        $('#capri').html(capri);
        $('#capriInput').val(capri);
        $('#agt').html(agt);
        $('#agtInput').val(agt);
        $('#brend').html(brend);
        $('#brendInput').val(brend);
        $('#seth').html(seth);
        $('#sethInput').val(seth);
        $('#reng').html(reng);
        $('#rengInput').val(reng);
        $('#en').html(en);
        $('#enInput').val(en);
        $('#boy').html(boy);
        $('#boyInput').val(boy);
        $('#qalinliq').html(qalinliq);
        $('#qalinliqInput').val(qalinliq);
        $('#palet').html(palet);
        $('#paletInput').val(palet);

        $('#center_image').attr('src', center_image);
        $('#right_side_image_1').attr('src', right_side_image_1);
        $('#right_side_image_2').attr('src', right_side_image_2);

        var video = document.getElementById('right_side_video');
        video.src = right_side_video;
        video.load();
        video.play();
    }

    function addProduct(id, action) {
        $('#'+id).prop('disabled', true);
        let capri                       = localStorage.getItem('capri');
        let agt                         = localStorage.getItem('agt');
        let brend                       = localStorage.getItem('brend');
        let seth                        = localStorage.getItem('seth');
        let reng                        = localStorage.getItem('reng');
        let en                          = localStorage.getItem('en');
        let boy                         = localStorage.getItem('boy');
        let qalinliq                    = localStorage.getItem('qalinliq');
        let palet                       = localStorage.getItem('palet');
        let center_image                = localStorage.getItem('center_image');
        let right_side_image_1          = localStorage.getItem('right_side_image_1');
        let right_side_image_2          = localStorage.getItem('right_side_image_2');
        let right_side_video            = localStorage.getItem('right_side_video');
        $.ajax({
            type : 'POST',
            data : {
                sub_menu_2 : $('#sub_menu_2').select().val(),
                capri,
                agt,
                brend,
                seth,
                reng,
                en,
                boy,
                qalinliq,
                palet,
                center_image,
                right_side_image_1,
                right_side_image_2,
                right_side_video,
                action
            },
            url : '/admin/mehsullar/product',
            success : function (response) {
                if (action == 0)
                {
                    toastr.success('Qaralama kimi əlavə edildi');
                }
                else
                {
                    localStorage.removeItem('sub_two_menu_id');
                    localStorage.removeItem('capri');
                    localStorage.removeItem('agt');
                    localStorage.removeItem('brend');
                    localStorage.removeItem('seth');
                    localStorage.removeItem('reng');
                    localStorage.removeItem('en');
                    localStorage.removeItem('boy');
                    localStorage.removeItem('qalinliq');
                    localStorage.removeItem('palet');
                    localStorage.removeItem('center_image');
                    localStorage.removeItem('right_side_image_1');
                    localStorage.removeItem('right_side_image_2');
                    localStorage.removeItem('right_side_video');
                    window.location.href = '/admin/mehsullar/product';
                }
                $('#'+id).prop('disabled', false);
            },
            error : function (myErrors) {
                $.each(myErrors.responseJSON.errors, function (key, value) {
                    toastr.error(value);
                });
                $('#'+id).prop('disabled', false);
            }
        });
    }

    function uploadFile(id,action) {
        var property = document.getElementById(id+'-form');
        var form_data = new FormData(property);
        form_data.append('action', action);
        form_data.append('old_file', localStorage.getItem(id));
        $.ajax({
            type : 'POST',
            data : form_data,
            url  : $('#'+id+'-form').attr('action'),
            cache: false,
            processData: false,
            contentType: false,
            success : function (response) {
                toastr.success('Əlavə edildi');

                if (action == 'upload_video')
                {
                    var video = document.getElementById(id);
                    video.src = '/files/products/videos/'+response;
                    video.load();
                    video.play();
                    localStorage.setItem(id, '/files/products/videos/'+response);
                }
                else
                {
                    $("#"+id).attr({
                        "src"  : "/files/products/"+response
                    })
                    localStorage.setItem(id, '/files/products/'+response);
                }
            },
            error : function (myErrors) {
                $.each(myErrors.responseJSON.errors, function (key, error) {
                    toastr.error(error);
                });
            }
        });
    }
});

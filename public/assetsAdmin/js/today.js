$(document).ready(function() {
    var error=0;
    var error2=0;
    var error3=0;
    var error4=0;
    var error5=0;
    var error6=0;

    $(document).on('change', '.btn-file :file', function () {
        var input = $(this),
            label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
        input.trigger('fileselect', [label]);
    });

    $('.btn-file :file').on('fileselect', function (event, label) {

        var input = $(this).parents('.input-group').find(':text'),
            log = label;

        if (input.length) {
            input.val(log);
        } else {
            if (log) alert(log);
        }

    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#img-upload').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#fileUpload").change(function () {
        readURL(this);
    });


   function readURL2(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#img-upload2').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#fileUpload2").change(function () {
        readURL2(this);
    });

function readURL3(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#img-upload3').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#fileUpload3").change(function () {
        readURL3(this);
    });


function readURL4(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#img-upload4').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#fileUpload4").change(function () {
        readURL4(this);
    });




    function readURL5(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#img-upload5').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#fileUpload5").change(function () {
        readURL5(this);
    });


    function readURL6(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#img-upload6').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#fileUpload6").change(function () {
        readURL6(this);
    });

    $('input[type=radio][name=num]').change(function() {
        var num=$("input[name='num']:checked").val()
        if(num==6){
            $('#all').removeClass('hidden');
            $('#nameGr4').attr('required','');
            $('#nameAr4').attr('required','');
            $('#price4').attr('required','');
             $('#nameGr5').attr('required','');
            $('#nameAr5').attr('required','');
            $('#price5').attr('required','');
             $('#nameGr6').attr('required','');
            $('#nameAr6').attr('required','');
            $('#price6').attr('required','');


        }else if(num==3){
            $('#all').addClass('hidden');
            $('#nameGr4').removeAttr('required');
            $('#nameAr4').removeAttr('required');
            $('#price4').removeAttr('required');
            $('#nameGr5').removeAttr('required');
            $('#nameAr5').removeAttr('required');
            $('#price5').removeAttr('required');
            $('#nameGr6').removeAttr('required');
            $('#nameAr6').removeAttr('required');
            $('#price6').removeAttr('required');
        }
    });

    $(document).on("change","#fileUpload",function (e) {
        var fileUpload = $("#fileUpload")[0];
        // console.log(fileUpload.files[0]);
        var reader = new FileReader();
        //Read the contents of Image File.
        if(fileUpload.files[0]!=undefined){
            reader.readAsDataURL(fileUpload.files[0]);
            reader.onload = function (e) {
                var image = new Image();
                //                    var image = new Image();
                //Set the Base64 string return from FileReader as source.
                image.src = e.target.result;
                image.onload = function () {

                    //Determine the Height and Width.
                    var height = this.height;
                    var width = this.width;
                    if (height < 300 || width < 1000) {
                        $('#dimension').removeClass("hidden");
                        $('#nophoto').addClass("hidden");

                     error=1
                    }else {
                        $('#dimension').addClass("hidden");
                       error=0;
                    }
                }}}
    });
    $(document).on("change","#fileUpload2",function (e) {
        var fileUpload = $("#fileUpload2")[0];
        // console.log(fileUpload.files[0]);
        var reader = new FileReader();
        //Read the contents of Image File.
        if(fileUpload.files[0]!=undefined){
            reader.readAsDataURL(fileUpload.files[0]);
            reader.onload = function (e) {
                var image = new Image();
                //                    var image = new Image();
                //Set the Base64 string return from FileReader as source.
                image.src = e.target.result;
                image.onload = function () {

                    //Determine the Height and Width.
                    var height = this.height;
                    var width = this.width;
                    if (height < 300 || width < 1000) {
                        $('#dimension2').removeClass("hidden");
                        $('#nophoto2').addClass("hidden");

                       error2=1;
                    }else {
                        $('#dimension2').addClass("hidden");
                       error2=0;
                    }
                }}}
    });
    $(document).on("change","#fileUpload3",function (e) {
        var fileUpload = $("#fileUpload3")[0];
        // console.log(fileUpload.files[0]);
        var reader = new FileReader();
        //Read the contents of Image File.
        if(fileUpload.files[0]!=undefined){
            reader.readAsDataURL(fileUpload.files[0]);
            reader.onload = function (e) {
                var image = new Image();
                //                    var image = new Image();
                //Set the Base64 string return from FileReader as source.
                image.src = e.target.result;
                image.onload = function () {

                    //Determine the Height and Width.
                    var height = this.height;
                    var width = this.width;
                    if (height < 300 || width < 1000) {
                        $('#dimension3').removeClass("hidden");
                        $('#nophoto3').addClass("hidden");

                     error3=1;
                    }else {
                        $('#dimension3').addClass("hidden");
                        error3=0;
                    }
                }}}
    });

    $(document).on("change","#fileUpload4",function (e) {
        var fileUpload = $("#fileUpload4")[0];
        // console.log(fileUpload.files[0]);
        var reader = new FileReader();
        //Read the contents of Image File.
        if(fileUpload.files[0]!=undefined){
            reader.readAsDataURL(fileUpload.files[0]);
            reader.onload = function (e) {
                var image = new Image();
                //                    var image = new Image();
                //Set the Base64 string return from FileReader as source.
                image.src = e.target.result;
                image.onload = function () {

                    //Determine the Height and Width.
                    var height = this.height;
                    var width = this.width;
                    if (height < 300 || width < 1000) {
                        $('#dimension4').removeClass("hidden");
                        $('#nophoto4').addClass("hidden");

                        error4=1;
                    }else {
                        $('#dimension4').addClass("hidden");
                        error4=0;
                    }
                }}}
    });

    $(document).on("change","#fileUpload5",function (e) {
        var fileUpload = $("#fileUpload5")[0];
        // console.log(fileUpload.files[0]);
        var reader = new FileReader();
        //Read the contents of Image File.
        if(fileUpload.files[0]!=undefined){
            reader.readAsDataURL(fileUpload.files[0]);
            reader.onload = function (e) {
                var image = new Image();
                //                    var image = new Image();
                //Set the Base64 string return from FileReader as source.
                image.src = e.target.result;
                image.onload = function () {

                    //Determine the Height and Width.
                    var height = this.height;
                    var width = this.width;
                    if (height < 300 || width < 1000) {
                        $('#dimension5').removeClass("hidden");
                        $('#nophoto5').addClass("hidden");

                        error5=1;
                    }else {
                        $('#dimension5').addClass("hidden");
                        error5=0;
                    }
                }}}
    });

    $(document).on("change","#fileUpload6",function (e) {
        var fileUpload = $("#fileUpload6")[0];
        // console.log(fileUpload.files[0]);
        var reader = new FileReader();
        //Read the contents of Image File.
        if(fileUpload.files[0]!=undefined){
            reader.readAsDataURL(fileUpload.files[0]);
            reader.onload = function (e) {
                var image = new Image();
                //                    var image = new Image();
                //Set the Base64 string return from FileReader as source.
                image.src = e.target.result;
                image.onload = function () {

                    //Determine the Height and Width.
                    var height = this.height;
                    var width = this.width;
                    if (height < 300 || width < 1000) {
                        $('#dimension6').removeClass("hidden");
                        $('#nophoto6').addClass("hidden");

                        error6=1;
                    }else {
                        $('#dimension6').addClass("hidden");
                        error6=0;
                    }
                }}}
    });




    $(document).on("submit",".day", function (e) {
        e.preventDefault();


                                if($('.day').parsley()) {
                            // console.log(error);
                                    if (error == 0 && error2==0 && error3==0 && error4==0 && error5==0 && error6==0 ) {
                                        $('#submit_day').attr('disabled', "disabled");
                                        $('.load').removeClass('hidden');

                                        var num=$("input[name='num']:checked").val()
                                        var nameGr = $('#nameGr').val()
                                        var nameAr = $('#nameAr').val()
                                        var price = $('#price').val()
                                      var nameGr2 = $('#nameGr2').val()
                                        var nameAr2 = $('#nameAr2').val()
                                        var price2 = $('#price2').val()
                                    var nameGr3 = $('#nameGr3').val()
                                        var nameAr3 = $('#nameAr3').val()
                                        var price3 = $('#price3').val()
                                    var nameGr4 = $('#nameGr4').val()
                                        var nameAr4 = $('#nameAr4').val()
                                        var price4 = $('#price4').val()
                                    var nameGr5 = $('#nameGr5').val()
                                        var nameAr5 = $('#nameAr5').val()
                                        var price5 = $('#price5').val()
                                    var nameGr6 = $('#nameGr6').val()
                                        var nameAr6 = $('#nameAr6').val()
                                        var price6 = $('#price6').val()

                                        var img = $('input#fileUpload')[0].files[0];
                                        var img2 = $('input#fileUpload2')[0].files[0];
                                        var img3 = $('input#fileUpload3')[0].files[0];
                                        var img4 = $('input#fileUpload4')[0].files[0];
                                        var img5 = $('input#fileUpload5')[0].files[0];
                                        var img6 = $('input#fileUpload6')[0].files[0];
                                        var oldimg=$('#oldimg').val()
                                        var oldimg2=$('#oldimg2').val()
                                        var oldimg3=$('#oldimg3').val()
                                        var oldimg4=$('#oldimg4').val()
                                        var oldimg5=$('#oldimg5').val()
                                        var oldimg6=$('#oldimg6').val()
                                        // console.log(file);
                                        // alert(fileUpload);
                                        var form_data = new FormData();
                                        form_data.append('num', num);
                                        form_data.append('nameGr', nameGr);
                                        form_data.append('nameAr', nameAr);
                                        form_data.append('price', price);
                                        form_data.append('nameGr2', nameGr2);
                                        form_data.append('nameAr2', nameAr2);
                                        form_data.append('price2', price2);
                                        form_data.append('nameGr3', nameGr3);
                                        form_data.append('nameAr3', nameAr3);
                                        form_data.append('price3', price3);
                                        form_data.append('nameGr4', nameGr4);
                                        form_data.append('nameAr4', nameAr4);
                                        form_data.append('price4', price4);
                                        form_data.append('nameGr5', nameGr5);
                                        form_data.append('nameAr5', nameAr5);
                                        form_data.append('price5', price5);
                                        form_data.append('nameGr6', nameGr6);
                                        form_data.append('nameAr6', nameAr6);
                                        form_data.append('price6', price6);
                                        form_data.append('img', img);
                                        form_data.append('img2', img2);
                                        form_data.append('img4', img4);
                                        form_data.append('img3', img3);
                                        form_data.append('img5', img5);
                                        form_data.append('img6', img6);
                                        form_data.append('oldimg', oldimg);
                                        form_data.append('oldimg2', oldimg2);
                                        form_data.append('oldimg3', oldimg3);
                                        form_data.append('oldimg4', oldimg4);
                                        form_data.append('oldimg5', oldimg5);
                                        form_data.append('oldimg6', oldimg6);




                                        $.ajax({
                                            url: 'request/today.php',
                                            type: 'Post',
                                            processData: false,
                                            contentType: false,
                                            data: form_data,
                                            success: function (respose) {
                                                $('#submit_day').removeAttr('disabled');
                                                $('.load').addClass('hidden');
                                                if (respose.code == 1) {
                                                    notification(respose.msg, 'success');

                                                    setTimeout(function(){ window.location.reload(); }, 3000);


                                                } else {
                                                    notification(respose.msg, 'danger');
                                                }
                                            }, error: function () {
                                                $('#submit_day').removeAttr('disabled');
                                                $('.load').addClass('hidden');
                                                notification(404, 'danger');
                                            }
                                        });
                                    }
                                }




    });
});
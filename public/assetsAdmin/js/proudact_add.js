$(document).ready(function() {

    $(document).on('change', '.btn-file :file', function() {
        var input = $(this),
            label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
        input.trigger('fileselect', [label]);
    });

    $('.btn-file :file').on('fileselect', function(event, label) {

        var input = $(this).parents('.input-group').find(':text'),
            log = label;

        if( input.length ) {
            input.val(log);
        } else {
            if( log ) alert(log);
        }

    });
    function readURL(input) {
        if (input.files) {
            $('#imgs-upload').html();
            for (var i = 0 ; i < input.files.length ; i++){
                var reader = new FileReader();
                reader.onload = function (e) {
                    var html = '<div class="divDelete"><span class="fa fa-trash deleteImage" data-id="'+i+'"></span>'+'<img class="img-upload" src="'+e.target.result+'"/></div>';
                    $('#imgs-upload').append(html);
                    // $('#img-upload').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[i]);
            }
        }
    }

    $("#fileUpload").change(function(){
        readURL(this);
    });



        // $(document).on("submit",".add_pro", function (e) {
        //
        //     //Get reference of FileUpload.
        //     var fileUpload = $("#fileUpload")[0];
        //     //Check whether the file is valid Image.
        //     var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(.jpg)$");
        //     if (regex.test(fileUpload.value.toLowerCase())) {
        //         //Check whether HTML5 is supported.
        //         if (typeof (fileUpload.files) != "undefined") {
        //             //Initiate the FileReader object.
        //             var reader = new FileReader();
        //             //Read the contents of Image File.
        //             reader.readAsDataURL(fileUpload.files[0]);
        //             reader.onload = function (e) {
        //                 //Initiate the JavaScript Image object.
        //                 var image = new Image();
        //                 //Set the Base64 string return from FileReader as source.
        //                 image.src = e.target.result;
        //                 image.onload = function () {
        //                     //Determine the Height and Width.
        //                     var height = this.height;
        //                     var width = this.width;
        //                     if (height < 300 || width < 1000) {
        //                         $('.dimension').removeClass("hidden");
        //                         $('.nophoto').addClass("hidden");
        //
        //                         return false;
        //                     }
        //
        //                     if($('.add_pro').parsley()){
        //
        //                         $('#submit_pro').attr('disabled',"disabled");
        //                         $('.load').removeClass('hidden');
        //
        //
        //                         var nameEn=$('#nameEn').val()
        //                         var nameGr=$('#nameGr').val()
        //                         var nameAr=$('#nameAr').val()
        //                         var IngEn=$('#IngEn').val()
        //                         var IngGr=$('#IngGr').val()
        //                         var IngAr=$('#IngAr').val()
        //                         var descEn=$('#descEn').val()
        //                         var descGr=$('#descGr').val()
        //                         var descAr=$('#descAr').val()
        //                         var cat=$('#cat').val()
        //                         var pricre=$('#pricre').val()
        //                         var link=$('#link').val()
        //                         var img =$('input#fileUpload')[0].files[0];
        //                         // console.log(file);
        //                         // alert(fileUpload);
        //                         var form_data = new FormData();
        //                         form_data.append('action','add');
        //                         form_data.append('nameEn',nameEn);
        //                         form_data.append('nameGr',nameGr);
        //                         form_data.append('nameAr',nameAr);
        //                         form_data.append('IngEn',IngEn);
        //                         form_data.append('IngGr',IngGr);
        //                         form_data.append('IngAr',IngAr);
        //                         form_data.append('descEn',descEn);
        //                         form_data.append('descGr',descGr);
        //                         form_data.append('descAr',descAr);
        //                         form_data.append('cat',cat);
        //                         form_data.append('pricre',pricre);
        //                         form_data.append('link',link);
        //                         form_data.append('img',img);
        //
        //                         $.ajax({
        //                             url: 'request/proudacts.php',
        //                             type: 'Post',
        //                             processData: false,
        //                             contentType: false,
        //                             data: form_data,
        //                             success: function(respose) {
        //                                 $('#submit_pro').removeAttr('disabled');
        //                                 $('.load').addClass('hidden');
        //                                 if(respose.code==1) {
        //                                     notification(respose.msg, 'success');
        //                                     window.location="proudacts_list.php?page=4"
        //                                 }else {
        //                                     notification(respose.msg,'danger');
        //                                 }
        //                             }, error: function() {
        //                                 $('#submit_pro').removeAttr('disabled');
        //                                 $('.load').addClass('hidden');
        //                                 notification(404,'danger');
        //                             }
        //                         });
        //                     }
        //
        //
        //                 };
        //             }
        //         } else {
        //             alert("This browser does not support HTML5.");
        //             return false;
        //         }
        //     } else {
        //         $('.dimension').addClass("hidden");
        //         $('.nophoto').removeClass("hidden");
        //         return false;
        //     }
        // });

});
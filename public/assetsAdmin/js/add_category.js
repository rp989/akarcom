$(document).ready(function() {

    $(document).on('submit','.add_cat',function (e) {
        e.preventDefault();
        if($(this).parsley()){
            $('#submit_cat').attr('disabled',"disabled");
            $('.load').removeClass('hidden');

            var catEn=$('#catEn').val();
            var catAr=$('#catAr').val();
            var catGr=$('#catGr').val();


            $.ajax({
                url: 'request/add_category.php',
                type: 'Post',
                data: {
                    action:"add",
                    catEn:catEn,
                    catGr:catGr,
                    catAr:catAr

                },
                success: function(respose) {
                    $('#submit_cat').removeAttr('disabled');
                    $('.load').addClass('hidden');
                    if(respose.code==1) {
                        notification(respose.msg, 'success');
                        window.location="categories_list.php?page=1";
                    }else {
                        notification(respose.msg,'danger');
                    }
                }, error: function() {
                    $('#submit_cat').removeAttr('disabled');
                    $('.load').addClass('hidden');
                    notification(404,'danger');
                }
            });
        }

    })

});
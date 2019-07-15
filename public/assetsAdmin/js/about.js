$(document).ready(function() {

$(document).on('submit','.about',function (e) {
    e.preventDefault();
    if($(this).parsley()){
        $('#submit_about').attr('disabled',"disabled");
        $('.load').removeClass('hidden');

        var address=$('#address').val()
        var email=$('#email').val();
        var mobile=$('#mobile').val();
        var tel=$('#tel').val();
        var fax=$('#fax').val();
        var fb=$('#fb').val();
        var yt=$('#yt').val();
        var tw=$('#tw').val();
        var other=$('#other').val();

        $.ajax({
            url: 'request/about.php',
            type: 'Post',
            data: {
                address:address,
                email:email,
                mobile:mobile,
                tel:tel,
                fax:fax,
                fb:fb,
                yt:yt,
                tw:tw,
                other:other,

            },
            success: function(respose) {
                $('#submit_about').removeAttr('disabled');
                $('.load').addClass('hidden');
                if(respose.code==1) {
                    notification(respose.msg, 'success');
                }else {
                    notification(respose.msg,'danger');
                }
            }, error: function() {
                $('#submit_about').removeAttr('disabled');
                $('.load').addClass('hidden');
                notification(404,'danger');
            }
        });
    }

})

});
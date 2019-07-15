$(document).ready(function () {
    /*==================================================================
  [ Focus input ]*/
    $('.input100').each(function(){
        $(this).on('blur', function(){
            if($(this).val().trim() != "") {
                $(this).addClass('has-val');
            }
            else {
                $(this).removeClass('has-val');
            }
        })
    })


    /*==================================================================
    [ Validate ]*/
    var input = $('.validate-input .input100');
    var input2 = $('.validate-input .input1002');

    $('.validate-form').on('submit',function(){
        var check = true;

        for(var i=0; i<input.length; i++) {
            if(validate(input[i]) == false){
                showValidate(input[i]);
                check=false;
            }
        }

        return check;
    });


    $('.validate-form .input100').each(function(){
        $(this).focus(function(){
            hideValidate(this);
        });
    });
    $('.validate-form2').on('submit',function(){
        var check = true;

        for(var i=0; i<input2.length; i++) {
            if(validate(input2[i]) == false){
                showValidate(input2[i]);
                check=false;
            }
        }

        return check;
    });


    $('.validate-form2 .input1002').each(function(){
        $(this).focus(function(){
            hideValidate(this);
        });
    });

    function validate (input) {
        if($(input).attr('type') == 'email' || $(input).attr('name') == 'email') {
            if($(input).val().trim().match(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/) == null) {
                return false;
            }
        }
        else {
            if($(input).val().trim() == ''){
                return false;
            }
        }
    }

    function showValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).addClass('alert-validate');
    }

    function hideValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).removeClass('alert-validate');
    }
    function showValidate(input2) {
        var thisAlert = $(input2).parent();

        $(thisAlert).addClass('alert-validate');
    }

    function hideValidate(input2) {
        var thisAlert = $(input2).parent();

        $(thisAlert).removeClass('alert-validate');
    }

$(document).on('submit','#log',function (e) {
    e.preventDefault();
    $('#sub').attr('disabled',"disabled");
    $('.load').removeClass('hidden');

    var name=$('#username').val()
    var pass=$('#pass').val();
    $.ajax({
        url: 'admin/logIn',
        type: 'Post',
        data: {
            action:'log',
            name: name,
            pass:pass
        },
        success: function(respose) {
            $('#sub').removeAttr('disabled');
            $('.load').addClass('hidden');
            if(respose.code==1) {
                notification(respose.msg, 'success');
                window.location="about.php";
            }else {
                notification(respose.msg,'danger');
            }
        }, error: function() {
            $('#sub').removeAttr('disabled');
            $('.load').addClass('hidden');
            notification(404,'danger');
        }
    });
});
    $(document).on('submit','#change',function (e) {
        e.preventDefault();
    $('#save').attr('disabled',"disabled");
    $('.load').removeClass('hidden');

    var oldPass=$('#oldPass').val()
    var newpass=$('#newPass').val();
    var repass=$('#reNewPass').val();
    var reName=$('#reName').val();
    $.ajax({
        url: 'admin/logIn',
        type: 'Post',
        data: {
            action:'rePass',
            oldPass: oldPass,
            newpass:newpass,
            reName:reName,
            repass:repass
        },
        success: function(respose) {
            $('#save').removeAttr('disabled');
            $('.load').addClass('hidden');
            console.log(respose);
            if(respose.code==1) {
                notification(respose.msg, 'success');
                $('#close').click();
            }else {
                notification(respose.msg,'danger');
            }
        }, error: function() {
            $('#save').removeAttr('disabled');
            $('.load').addClass('hidden');
            notification(404,'danger');
        }
    });
})


});
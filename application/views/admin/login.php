<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>عقاركم</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.4 -->
    <link rel="stylesheet" href="<?=base_url('user')?>/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?=base_url('user')?>/dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?=base_url('user')?>/plugins/iCheck/square/blue.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?php
        if (isset($_SESSION['meta'])){
            foreach ($_SESSION['meta'] as $meta) {
                echo $meta;
            }
        }

    ?>
</head>
<body class="login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="<?=base_url()?>"><b>akarcom</b>.app</a>
    </div><!-- /.login-logo -->
    <div class="login-box-body">

        <form  action="#" method="post" style="direction: rtl">
            <div class="form-group has-feedback">
                <input type="text" name="name" id="username" class="form-control" placeholder="<?php echo _phoneNumber ?>">
                <span class="glyphicon glyphicon-phone form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" name="pass" id="pass" class="form-control" placeholder="<?php echo _pass?>">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="form-group text-danger">
           <b>     <?php if (isset($error) && $error) {?>
                   <?php echo $error;?>
               <?php   } ?>
           </b>
            </div>
            <div class="row">
                <div class="col-xs-8">

                </div><!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                </div><!-- /.col -->
            </div>

        </form>



    </div><!-- /.login-box-body -->

    <div class="box-footer">
        <div class="row">



                <div class="col-md-4 col-sm-4">        <a href="<?php echo base_url();?>Forgot">  <?php echo _forgot_password?></a><br></div>
                <div class="col-md-4 col-sm-4">  <a href="<?php echo base_url();?>Register" class="text-center"> <?php echo _register?></a><br></div>
                <div class="col-md-4 col-sm-4">     <a href="<?php echo base_url();?>Activation" class="text-center"><?=_ActivationAccount?></a></div>


        </div>
    </div>
</div><!-- /.login-box -->

<!-- jQuery 2.1.4 -->
<script src="<?=base_url('user')?>/plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.4 -->
<script src="<?=base_url('user')?>/bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?=base_url('user')?>/plugins/iCheck/icheck.min.js"></script>
<div class="load hidden">
    <div class="pageload-overlay"><?php echo _loading?></div>
</div>
<script type="text/javascript" src="<?php echo base_url();?>public/assetsAdmin/js/jquery-3.2.1.min.js"></script>
<script src="<?php echo base_url();?>public/assetsAdmin/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>public/assetsAdmin/js/function.js"></script>
<script src="<?php echo base_url();?>public/assetsAdmin/js/logIn.js"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>
</body>
</html>

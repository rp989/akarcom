<?php
/**
 * Created by PhpStorm.
 * User: riadsasila
 * Date: 1/18/19
 * Time: 11:31 AM
 */
?>
<html>
<head>
    <title><?php echo _ActivationAccount?></title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="<?php echo base_url();?>public/assetsAdmin/css/bootstrap.min.css" rel="stylesheet"/>
<link href="<?php echo base_url();?>public/assetsAdmin/css/font-awesome.min.css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assetsAdmin/fonts/material-design-iconic-font.css">
<link href="<?php echo base_url();?>public/assetsAdmin/css/style/them.css" rel="stylesheet"/>
<link rel="shortcut icon" href="<?php echo base_url();?>public/assetsAdmin/img/iconTitle.png" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assetsAdmin/css/style/util.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assetsAdmin/css/style/main.css">
<!--    --><?php //if(isset($_SESSION['lang'])&&$_SESSION['lang']=="Ar"){ ?>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assetsAdmin/css/style/rtl.css">
<!--    --><?php // }?>
</head>
<body class="bgBlue">
<div class="limiter" style="background-image: url('<?php echo base_url();?>public/assetsAdmin/img/bg.png');background-size: cover">
    <div class="container-login100" >
        <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
            <form class="login100-form validate-form" action="#" method="post">
                <div class="wrap-input100 validate-input m-b-23" data-validate = "<?php echo _EnterPhoneNumber?>">
                    <span class="label-input100"><?php echo _phoneNumber ?></span>
                    <input class="input100" type="text" name="name" id="username" placeholder="<?php echo _phoneNumber ?>">
                    <span class="focus-input100" data-symbol="&#xf206;"></span>
                </div>
                <div class="wrap-input100 validate-input" data-validate="<?php echo _ActivationCodeEnter?>">
                    <span class="label-input100"><?php echo _ActivationCode?></span>
                    <input class="input100" type="password" name="pass" id="pass" placeholder="<?php echo _ActivationCode?>">
                    <span class="focus-input100" data-symbol="&#xf190;"></span>
                </div>
                <div class="text-left p-t-8 p-b-31">
                    <a href="<?php echo base_url();?>SignIn" style="    float: right;cursor: pointer;">
                        <?php echo _logIn?>
                    </a>
                </div>
                <div class="container-login100-form-btn">
                    <div class="wrap-login100-form-btn">
                        <div class="login100-form-bgbtn"></div>
                        <button class="login100-form-btn " id="sub" >
                            <?php echo _ActivationAccount?>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="load hidden">
    <div class="pageload-overlay"><?php echo _loading?></div>
</div>
<script type="text/javascript" src="<?php echo base_url();?>public/assetsAdmin/js/jquery-3.2.1.min.js"></script>
<script src="<?php echo base_url();?>public/assetsAdmin/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>public/assetsAdmin/js/function.js"></script>
<script src="<?php echo base_url();?>public/assetsAdmin/js/logIn.js"></script>
</body>
</html>
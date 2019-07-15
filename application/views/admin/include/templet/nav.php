<head>
    <title>new</title>
    <link href="<?php echo base_url();?>public/assetsAdmin/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="<?php echo base_url();?>public/assetsAdmin/css/dataTables.bootstrap.min.css" rel="stylesheet"/>
    <link href="<?php echo base_url();?>public/assetsAdmin/css/font-awesome.min.css" rel="stylesheet"/>
    <link href="<?php echo base_url();?>public/assetsAdmin/css/style/them.css" rel="stylesheet"/>
    <link href="<?php echo base_url();?>public/assetsAdmin/css/style/main.css" rel="stylesheet"/>
    <link rel="shortcut icon" href="<?php echo base_url();?>public/assetsAdmin/img/iconTitle.png" />
    <?php if (!$this->session->userdata('lang')){ ?>
        <link href="<?php echo base_url();?>public/assetsAdmin/css/style/rtl.css" rel="stylesheet"/>
    <?php }?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<nav class="navbar bgBlue">
    <div class="container-fluid">
        <div id="mySidenav" class="sidenav">
            <span id="open" style="font-size:30px;cursor:pointer;color: white;margin-left: 13px"  onclick="openNav()">&#9776;</span>
            <img src="<?php echo base_url();?>public/assetsAdmin/img/logo.png"  class="logo" id="logo">
            <a href="javascript:void(0)" id="closebtn" class="closebtn" style="display: none;" onclick="closeNav()">&times;</a>
            <a  class="drop"  data-id="1"   onclick="openNav()"><i class="fa fa-empire"></i>المستخدمين<i class="fa fa-caret-down margen ro"></i></a>
            <div class="droped droped1">
                <a href="<?php echo base_url();?>MemberArea/users">قائمة المستخدمين</a>
            </div>
            <a href="#" class="drop" data-id="2"   onclick="openNav()"><i class="fa fa-plus" style="font-size: 30px"></i><?php echo _products?><i class="fa fa-caret-down margen ro"></i></a>
            <div class="droped droped2">
                <a href="<?php echo base_url();?>MemberArea/pendingPost">المنشورات الجديدة</a>
                <a href="<?php echo base_url();?>MemberArea/Posts"><?php echo _productsList;?></a>
                <a href="<?php echo base_url();?>MemberArea/addProduct"><?php echo _productAdd;?></a>
            </div>
            <a href="#" class="drop" data-id="3"   onclick="openNav()"><i class="fa fa-plus" style="font-size: 30px"></i>المفضلة<i class="fa fa-caret-down margen ro"></i></a>
            <div class="droped droped3">
                <a href="<?php echo base_url();?>MemberArea/pendingPost">المنشورات المفضلة</a>
            </div>
        </div>
    <img src="<?php echo base_url();?>public/assetsAdmin/img/logo.png" class="mainLogo">
        <div class="nav  navbar-right dropdown">
            <img src="<?php echo base_url();?>public/assetsAdmin/img/avatar.jpg" class="avatar"><span class="avatarSpan"><?php echo $this->session->userdata('name');?></span>
            <div class="dropdown-content bgBlue">
                <a  style="font-size: 20px;cursor: pointer" href="<?php echo base_url(); ?>MemberArea/profile">الملف الشخصي</a>
                <a style="font-size: 20px;cursor: pointer" href="<?php echo base_url();?>"><?php echo _webSite?></a>
                <a style="font-size: 20px;cursor: pointer" href="<?php echo base_url();?>LogOut"><?php echo _logOut?></a>
            </div>
        </div>

    </div><!-- /.container-fluid -->
</nav>
<script type="text/javascript" src="<?php echo base_url();?>public/assetsAdmin/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>public/assetsAdmin/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>public/assetsAdmin/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>public/assetsAdmin/js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url();?>public/assetsAdmin/js/parsley.min.js"></script>
<script src="<?php echo base_url();?>public/assetsAdmin/js/function.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>public/assetsAdmin/js/admin.js"></script>
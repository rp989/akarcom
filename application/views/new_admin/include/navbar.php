<body class="skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="#" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>A</b>ka</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>akarcom</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">


                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="<?php echo base_url(); ?>public/assetsAdmin/img/avatar.jpg" class="user-image"
                                 alt="User Image">
                            <span class="hidden-xs"><?php echo $this->session->userdata('name'); ?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="<?php echo base_url(); ?>public/assetsAdmin/img/avatar.jpg" class="img-circle"
                                     alt="User Image">

                                <p>
                                    <?php echo $this->session->userdata('name'); ?>

                                </p>
                            </li>
                            <!-- Menu Body -->

                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="<?= base_url() ?>"
                                       class="btn btn-default btn-flat"><?php echo _webSite ?></a>
                                </div>
                                <div class="pull-right">
                                    <a href="<?php echo base_url(); ?>LogOut"
                                       class="btn btn-default btn-flat"><?php echo _logOut ?></a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <!-- Control Sidebar Toggle Button -->

                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <ul class="sidebar-menu" data-widget="tree">

                <?php
                if (isset($_SESSION['admin']) && $_SESSION['admin'] == 1) {
                    ?>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-user-o"></i>
                            <span> المستدمين</span>
                            <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?= base_url('MemberArea/users') ?>"><i class="fa fa-circle-o"></i> قائمة
                                    مستخدمين</a></li>
                            <li><a href="<?= base_url('MemberArea/user_active') ?>"><i class="fa fa-circle-o"></i> تفعيل
                                    منشورات المستخدمين</a></li>
                        </ul>
                    </li>
                    <?php
                }
                ?>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-map-marker"></i>
                        <span> العقارات</span>
                        <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
                    </a>
                    <ul class="treeview-menu">
                        <?php if ($_SESSION['admin'] == 1) { ?>
                            <li><a href="<?= base_url('MemberArea/pendingPost') ?>"><i class="fa fa-circle-o"></i>منشورات
                                    الجديدة</a></li>
                            <li><a href="<?= base_url('MemberArea/Posts') ?>"><i class="fa fa-circle-o"></i>قائمة
                                    العقارات</a></li>
                        <?php } else {
                            ?>
                            <li><a href="<?= base_url('MemberArea/Posts') ?>"><i class="fa fa-circle-o"></i>منشوراتي</a>
                            </li>

                            <?php

                        } ?>
                        <li><a href="<?= base_url('MemberArea/addProduct') ?>"><i class="fa fa-circle-o"></i>أضافة
                                عقارات</a></li>
                    </ul>
                </li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
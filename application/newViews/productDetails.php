<!DOCTYPE html>
<html lang="en">


<head>
    <!-- META -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- PAGE TITLE -->
    <title>Akarcom</title>
    <!-- FAVI ICON -->
    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>public/assets/images/favi.png" sizes="32x32">
    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/dist/css/bootstrap.css">
    <!-- ALL GOOGLE FONTS -->
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700|Lato:300,400,700,900' rel='stylesheet'
          type='text/css'>
    <!-- FONT AWESOME CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/fonts/linear-fonts.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/fonts/font-awesome.css">
    <!-- OWL CAROSEL CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/owlcarousel/css/owl.carousel.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/owlcarousel/css/owl.theme.css">
    <!-- LIGHTBOX CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/css/lightbox.min.css">
    <!-- MAGNIFIC CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/css/magnific-popup.css">
    <!-- ANIMATE CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/css/animate.min.css">
    <!-- MAIN STYLE CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/css/style.css">
    <!-- RESPONSIVE CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/css/responsive.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/css/custom.css">
    <link href="<?php echo base_url(); ?>public/examples/carousel/carousel.css" rel="stylesheet">

        <!-- rtl CSS -->
        <link rel="stylesheet" href="<?php echo base_url();?>public/assetsFile/css/rtl.css">



    <!-- bin/jquery.slider.min.css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/plugins/jslider/css/jslider.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/plugins/jslider/css/jslider.round-blue.css"
          type="text/css">

    <!-- jQuery-->
    <script src="<?php echo base_url(); ?>public/assets/js/jquery.v2.0.3.js"></script>
    <script src="<?php echo base_url(); ?>public/assets/js/jquery-ui.js"></script>

    <!-- bin/jquery.slider.min.js -->
    <script type="text/javascript"
            src="<?php echo base_url(); ?>public/plugins/jslider/js/jshashtable-2.1_src.js"></script>
    <script type="text/javascript"
            src="<?php echo base_url(); ?>public/plugins/jslider/js/jquery.numberformatter-1.2.3.js"></script>
    <script type="text/javascript"
            src="<?php echo base_url(); ?>public/plugins/jslider/js/tmpl.js"></script>
    <script type="text/javascript"
            src="<?php echo base_url(); ?>public/plugins/jslider/js/jquery.dependClass-0.1.js"></script>

    <script type="text/javascript" src="<?php echo base_url(); ?>public/plugins/jslider/js/draggable-0.1.js"></script>

    <script type="text/javascript" src="<?php echo base_url(); ?>public/plugins/jslider/js/jquery.slider.js"></script>
    <!-- end -->


</head>

<body>
<!-- START PRELOADER -->
<div class="preloader">
    <div class="status">
        <div class="status-mes"></div>
    </div>
</div>
<!-- / END PRELOADER -->

<!-- START HOMEPAGE DESIGN AREA -->
<header class="single-blog-area">
    <div class="header-top-area">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <!-- START LOGO DESIGN AREA -->
                    <div class="logo">
                        <a href="<?php echo base_url();?>">
                            <img src="<?php echo base_url();?>public/assetsFile/images/akarkom.svg" style="width: 75px;padding-bottom: 8px;" width="75px" alt="akarkom">
                        </a>
                    </div>
                </div>
                <!-- END LOGO DESIGN AREA -->
                <div class="col-md-9">
                    <!-- START MENU DESIGN AREA -->
                    <div class="mainmenu">
                        <div class="navbar navbar-nobg">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle abss" data-toggle="collapse" data-target=".navbar-collapse">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                            <div class="navbar-collapse collapse paddL">
                                <ul class="nav navbar-nav navbar-right">
                                    <li class="active"><a class="smoth-scroll" href="<?php echo base_url();?>"><?php echo $this->lang->line('Home'); ?> <div class="ripple-wrapper"></div></a></li>
                                    <li><a class="smoth-scroll" href="#contact"><?php echo $this->lang->line('contact'); ?></a></li>
                                    <li><a class="smoth-scroll" href="<?php echo base_url(); ?>SignIn"><?php echo $this->lang->line('Sign_in'); ?></a></li>
                                </ul>
                            </div>

                        </div>
                    </div>
                    <!-- END MENU DESIGN AREA -->
                </div>
                <!-- START LOGO DESIGN AREA -->

                <!-- END LOGO DESIGN AREA -->
            </div>
        </div>

        </div>
    </div>
    <div class="single-blog-heading">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center mgTop">
                    <h2><?php echo $this->lang->line('ProductDetails');?></h2>
                    <span class="title-divider">
                            <i class="fa fa-home" aria-hidden="true"></i>
                        </span>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- / END HOMEPAGE DESIGN AREA -->

<!-- START SINGLE BLOG POST DESIGN AREA -->
<div class="single-blogarea section-padding">
    <div class="container">
        <div class="row">
            <div class="product-box col-md-8 col-xs-12">
                <div class="inner-box">
                    <div class="">
                        <!--start-->

                        <div class="details-slider">

                            <div id="c-carousel">
                                <div id="wrapper">
                                    <div id="inner">
                                        <div id="caroufredsel_wrapper2">
                                            <div id="carousel">
                                                <?php
                                                $images = $post1[0]['images'];
                                                foreach ($images as $image){
                                                    echo '<img src="'.$image.'" alt="image"/>';
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <div id="pager-wrapper">
                                            <div id="pager">
                                                <?php
                                                $images = $post1[0]['images'];
                                                foreach ($images as $image){
                                                    echo '<img src="'.$image.'" width="120" height="68" alt="image"/>';
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div> <!-- /c-carousel -->
                        </div>
                        <!--end-->
                    </div>
                    <div class="lower-content2">
                        <div class="pagecontainer3 offset-0">
                            <div class="cstyle10"></div>
                            <ul class="nav nav-tabs" id="myTab">
                                <li onclick="mySelectUpdate()" class="active"><a data-toggle="tab" href="#summary"><span
                                                class="summary"></span><span class="hidetext"><?php echo $this->lang->line('information');?></span>&nbsp;</a>
                                </li>
                                <li onclick="loadScript()" class=""><a data-toggle="tab" href="#maps"><span
                                                class="maps"></span><span class="hidetext"><?php echo $this->lang->line('Maps');?></span>&nbsp;</a></li>
                            </ul>
                            <div class="tab-content4">
                                <!-- TAB 1 -->
                                <div id="summary" class="tab-pane active fade in">
                                    <div class="product-title text-center">
                                        <?php foreach ($post1 as $key => $post) {?>
                                        <h3 class="pt"><?php echo $post['description'];?></h3>
                                        <div class="location"><span class="fa fa-map-marker"></span>&nbsp;<?php echo $post['address'];?>
                                        </div>
                                        <!-- START Property Attributes DESIGN AREA -->
                                        <div class="col-md-12">
                                            <div class="overview">
                                                <h3><?php echo $this->lang->line('Specifications');?>:</h3>
                                                <ul>
                                                    <li><b><?php echo $this->lang->line('price');?></b><b><?php echo $post['priceOfMeter'];?></b></li>
                                                    <li><b><?php echo $this->lang->line('properties');?></b><span><?php echo $post['typeOfProperty']['name'];?></span></li>
                                                    <li><b><?php echo $this->lang->line('type');?></b><span><?php echo $post['type']['name'];?></span></li>
                                                    <li><b><?php echo $this->lang->line('cladding');?></b><span><?php echo $post['typeOfCladding']['name'];?></span></li>
                                                    <li><b><?php echo $this->lang->line('numbrsOfRooms');?></b><span><?php echo $post['numOfRooms'];?></span></li>
                                                    <li><b><?php echo $this->lang->line('BATHROOMS');?></b><span><?php echo $post['numOfBathRooms'];?></span></li>
                                                    <li><b><?php echo $this->lang->line('floor');?></b><span><?php echo $post['floor'];?></span></li>
                                                    <li><b><?php echo $this->lang->line('parking');?></b><span><?php echo $post['parking'] ? 'يوجد' : 'لا يوجد';?></span></li>
                                                    <li><b><?php echo $this->lang->line('interphone');?></b><span><?php echo $post['interphone'] ? 'يوجد' : 'لا يوجد';?></span></li>
                                                    <li><b><?php echo $this->lang->line('elevator');?></b><span><?php echo $post['elevator'] ? 'يوجد' : 'لا يوجد';?></span></li>
                                                    <li><b><?php echo $this->lang->line('AREA');?></b><span><?php echo $post['areaSpace'];?></span></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- /END Property Attributes DESIGN AREA -->
                                        <!-- START Others Attributes DESIGN AREA -->
                                        <div class="col-md-12">
                                            <div class="overview">
                                                <h3><?php echo $this->lang->line('OTHERATTRIBUTES');?>:</h3>
                                                <ul>
                                                    <li><b><?php echo $this->lang->line('winter');?></b><span><?php echo $post['winter'];?></span></li>
                                                    <li><b><?php echo $this->lang->line('summer');?></b><span><?php echo $post['summer'];?></span></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- /END Others Attributes DESIGN AREA -->
                                        <!-- START Others Info DESIGN AREA -->
                                        <div class="col-md-12">
                                            <div class="overview">
                                                <h3><?php echo $this->lang->line('PersonalInfo');?>:</h3>
                                                <ul>
                                                    <li><b><?php echo $this->lang->line('Name');?></b><span><?php echo $post['name'];?></span></li>
                                                    <li><b><?php echo $this->lang->line('GSM');?></b><span><?php echo $post['gsm'];?></span></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- /END Others Info DESIGN AREA -->
                                        <h3><?php echo $this->lang->line('PROPERTYDESCRIPTION');?>:</h3>
                                        <p style="color: #333;font-palette: 16px"><?php echo $post['description'];?></p>
                                    </div>
                                    <?php } ?>
                                </div>
                                <!-- TAB 2 -->
                                <!-- TAB 4 -->
                                <div id="maps" class="tab-pane fade">
                                    <div class="hpadding20">
                                        <div id="map-canvas" style="display: block; position: relative; overflow: hidden;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- START SIDEBAR DESIGN AREA -->
            <div class="col-md-4 wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.1s" data-wow-offset="0">
                <div class="recent-post single-sidebar">
                    <h4>
                        <?php echo $this->lang->line('NEWPROPERTIES');?>
                        <span class="title-divider">
                                <i class="fa fa-home" aria-hidden="true"></i>
                            </span>
                    </h4>
                    <?php foreach ($posts as $key => $post) {
                         ?>
                        <!-- START SINGLE PRODUCT ITEM -->
                        <div class="product-box col-md-12 col-sm-12 col-xs-12">
                            <div class="inner-box">
                                <div class="image-box">
                                    <figure class="image"><a href="<?php echo base_url();?>Details/<?php echo $post['id'];?>"><img src="<?php echo base_url();?>public/assetsFile/images/products/product1.jpg" alt=""></a></figure>
                                    <div class="product-category"><?php echo $post['description'];?></div>
                                    <div class="product-price"><?php echo $post['priceOfMeter'].' ('.$post['areaSpace'].') ';?></div>
                                </div>
                                <div class="lower-content">

                                    <div class="home-brief">
                                        <div class="info"><h5>نوع العقار : </h5><span> <?php echo $post['type']['name'].' '.$post['typeOfProperty']['name'];?></span></div>
                                        <div class="info"><h5>عدد الغرف : </h5><span> <?php echo $post['numOfRooms']; ?></span></div>
                                        <div class="info"><h5>المساحة : </h5><span> <?php echo  $post['areaSpace']; ?></span></div>
                                        <div class="info"><h5>السعر : </h5><span> <?php echo  $post['priceOfMeter']; ?></span></div>

                                    </div>

                                    <div class="view-etails-btn clearfix">
                                        <div class="link-box"><a href="<?php echo base_url();?>Details/<?php echo $post['id'];?>" class="theme-btn"><?php echo $this->lang->line('View_Details');?> <span class="fa fa-angle-right"></span></a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- / END SINGLE PRODUCT ITEM -->
                    <?php } ?>
                </div>
            </div>
            <!-- / END START SIDEBAR DESIGN AREA -->
        </div>
    </div>
</div>
<!-- / END SINGLE BLOG POST DESIGN AREA -->

<!-- START FOOTER DESIGN AREA -->
<footer class="footer-area wow fadeInUp" data-wow-delay="1s" id="contact">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <div class="footer-short-desc">
                    <p class="text-center"></p>
                </div>
                <div class="footer-social-link text-center">
                    <ul>
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>

                    </ul>
                </div>
                <span class="title-divider">
							<i class="fa fa-home" aria-hidden="true"></i>
						</span>
                <div class="footer-text">
                    <h6> حقوق النشر | نايوتكس تكنلوجي
                        ©</h6>
                </div>

            </div>
        </div>
    </div>
</footer>
<!-- / END CONTACT DETAILS DESIGN AREA -->

<!-- START SCROOL UP DESIGN AREA -->
<div class="scroll-to-up">
    <div class="scrollup">
        <span class="lnr lnr-chevron-up"></span>
    </div>
</div>
<!-- / END SCROOL UP DESIGN AREA -->

<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- LOCAL COPY OF LATEST JQUERY -->
<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/jquery.min.js"></script>
<!-- BOOTSTRAP JS -->
<script src="<?php echo base_url(); ?>public/assets/bootstrap/js/bootstrap.min.js"></script>
<!-- PROGRESS JS  -->
<script src="<?php echo base_url(); ?>public/assets/js/jquery.appear.js"></script>
<!-- OWL CAROUSEL JS  -->
<script src="<?php echo base_url(); ?>public/assets/owlcarousel/js/owl.carousel.min.js"></script>
<!-- MIXITUP JS -->
<script src="<?php echo base_url(); ?>public/assets/js/jquery.mixitup.js"></script>
<!-- MAGNIFICANT JS -->
<script src="<?php echo base_url(); ?>public/assets/js/jquery.magnific-popup.min.js"></script>
<!-- STEALLER JS -->
<script src="<?php echo base_url(); ?>public/assets/js/jquery.stellar.min.js"></script>
<!-- YOUTUBE JS -->
<script src="<?php echo base_url(); ?>public/assets/js/jquery.mb.YTPlayer.min.js"></script>
<script type="text/javascript">
    $('.player').mb_YTPlayer();
</script>
<!-- COUNTER UP JS -->
<script src="<?php echo base_url(); ?>public/assets/js/jquery.waypoints.min.js"></script>
<script src="<?php echo base_url(); ?>public/assets/js/jquery.counterup.min.js"></script>
<!-- LIGHTBOX JS -->
<script src="<?php echo base_url(); ?>public/assets/js/lightbox.min.js"></script>
<!-- WOW JS -->
<script src="<?php echo base_url(); ?>public/assets/js/wow.min.js"></script>
<!-- scripts js -->
<script src="<?php echo base_url(); ?>public/assets/js/scripts.js"></script>

<!-- jQuery KenBurn Slider  -->
<script type="text/javascript"
        src="<?php echo base_url(); ?>public/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>

<!-- CarouFredSel -->
<script src="<?php echo base_url(); ?>public/assets/js/jquery.carouFredSel-6.2.1-packed.js"></script>

<script src="<?php echo base_url(); ?>public/assets/js/helper-plugins/jquery.touchSwipe.min.js"></script>

<script type="text/javascript"
        src="<?php echo base_url(); ?>public/assets/js/helper-plugins/jquery.mousewheel.min.js"></script>
<script type="text/javascript"
        src="<?php echo base_url(); ?>public/assets/js/helper-plugins/jquery.transit.min.js"></script>
<script type="text/javascript"
        src="<?php echo base_url(); ?>public/assets/js/helper-plugins/jquery.ba-throttle-debounce.min.js"></script>

<!-- Counter -->
<script src="<?php echo base_url(); ?>public/assets/js/counter.js"></script>

<script src="<?php echo base_url(); ?>public/assets/js/initialize-google-map.js"></script>

<!-- Carousel-->
<script src="<?php echo base_url(); ?>public/assets/js/initialize-carousel-detailspage.js"></script>

<!-- Js Easing-->
<script src="<?php echo base_url(); ?>public/assets/js/jquery.easing.js"></script>


<!-- Bootstrap-->
<script src="<?php echo base_url(); ?>public/dist/js/bootstrap.min.js"></script>
</body>


<!-- Mirrored from demo.dueza.com/property-html/property/black-color/product-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 29 Oct 2018 17:43:20 GMT -->
</html>
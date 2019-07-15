<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from demo.duezaaaa.com/property-html/property/black-color/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 29 Oct 2018 17:37:29 GMT -->
<head>
    <!-- META -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- PAGE TITLE -->
    <title>Akarcom</title>
    <!-- FAVI ICON -->
    <link rel="icon" type="image/png" href="<?php echo base_url();?>public/assetsFile/images/favi.png" sizes="32x32">
    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>public/assetsFile/bootstrap/css/bootstrap.min.css">
    <!-- ALL GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700|Lato:300,400,700,900" rel="stylesheet">
    <!-- FONT AWESOME CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>public/assetsFile/fonts/linear-fonts.css">
    <link rel="stylesheet" href="<?php echo base_url();?>public/assetsFile/fonts/font-awesome.css">
    <!-- OWL CAROSEL CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>public/assetsFile/owlcarousel/css/owl.carousel.css">
    <link rel="stylesheet" href="<?php echo base_url();?>public/assetsFile/owlcarousel/css/owl.theme.css">
    <!-- LIGHTBOX CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>public/assetsFile/css/lightbox.min.css">
    <!-- MAGNIFIC CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>public/assetsFile/css/magnific-popup.css">
    <!-- ANIMATE CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>public/assetsFile/css/animate.min.css">
    <!-- MAIN STYLE CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>public/assetsFile/css/style.css">
    <!-- RESPONSIVE CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>public/assetsFile/css/responsive.css">
    <!-- rtl CSS -->
    <?php if (!$this->session->userdata('lang')){ ?>
        <link rel="stylesheet" href="<?php echo base_url();?>public/assetsFile/css/rtl.css">
    <?php }?>
</head>

<body >
<!-- START PRELOADER -->
<div class="preloader">
    <div class="status">
        <div class="status-mes"></div>
    </div>
</div>
<!-- / END PRELOADER -->

<!-- START HOMEPAGE DESIGN AREA -->
<header id="home" class="welcome-area">
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
                            <div class="navbar-collapse collapse">
                                <ul class="nav navbar-nav navbar-right">
                                    <li class="active"><a class="smoth-scroll" href="#home"><?php echo $this->lang->line('Home'); ?> <div class="ripple-wrapper"></div></a></li>
                                    <li><a class="smoth-scroll" href="#products"><?php echo $this->lang->line('Properties'); ?></a></li>
                                    <li><a class="smoth-scroll" href="#why-us"><?php echo $this->lang->line('Why_Us'); ?></a></li>
                                    <li><a class="smoth-scroll" href="#contact"><?php echo $this->lang->line('contact'); ?></a></li>
                                    <li><a class="smoth-scroll" href="<?php echo base_url(); ?>SignIn"><?php echo $this->lang->line('Sign_in'); ?></a></li>
                                </ul>
                            </div>

                        </div>
                    </div>
                    <!-- END MENU DESIGN AREA -->
                </div>
            </div>
        </div>
    </div>

    <div class="welcome-image-area" data-stellar-background-ratio="0.6">
        <div class="display-table">
            <div class="display-table-cell">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <div class="header-text">
                                <h2><?php echo $this->lang->line('PROPERTY_SELL'); ?></h2>
                                <p><?php echo $this->lang->line('We_are_making_your_dream'); ?></p>
                                <a class="slide-btn smoth-scroll" href="#products"><?php echo $this->lang->line('View_Our_Properties'); ?></a>
                                <a class="smoth-scroll hire-us-slide-btn" href="#contact"><?php echo $this->lang->line('Contact_us'); ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>



		
		<!-- START PRODUCTS SECTION DESIGN AREA -->
		<section id="products" class="products-area section-padding">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<div class="section-title">
							<h2><?php echo $this->lang->line('our_properties'); ?></h2>
							<span class="title-divider">
								<i class="fa fa-home" aria-hidden="true"></i>
							</span>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="product-menu">
						<!-- START PRODUCT NAV FILTER -->
						<!-- / END PRODUCT NAV FILTER -->
						<!-- START PRODUCT DETAILS-->
                        <div class="col-md-12">
                            <ul class="product-nav" role="tablist">
                                <!--                                <li role="presentation" class="active"><a href="#all" aria-controls="all" data-toggle="tab" aria-expanded="true">--><?php //echo $this->lang->line('Any_Type'); ?><!--</a></li>-->
                                <li role="presentation"><a href="<?php echo base_url();?>AllPosts"><?php echo $this->lang->line('VIEWALL'); ?></a></li>
                                <!--                                <li role="presentation"><a href="#appartment-sell" aria-controls="appartment-sell" data-toggle="tab" aria-expanded="false">--><?php //echo $this->lang->line('Appartment_Sell_type'); ?><!--</a></li>-->
                                <!--                                <li role="presentation"><a href="#land-sell" aria-controls="land-sell" data-toggle="tab" aria-expanded="false">--><?php //echo $this->lang->line('Land_Sell_type'); ?><!--</a></li>-->
                            </ul>
                        </div>
						<div class="product-menu-details">
							<div class="col-md-12">
								<div class="tab-content">
                                    <?php foreach ($posts as $key => $post) {
                                        if (($key % 4) == 0) { ?>
									        <div role="tabpanel" class="tab-pane active" id="all">
										        <div class="row">
                                        <?php } ?>
                                                    <!-- START SINGLE PRODUCT ITEM -->
                                                    <div class="product-box col-md-4 col-sm-12 col-xs-12">
                                                        <div class="inner-box">
                                                            <div class="image-box">
                                                                <figure class="image"><a href="<?php echo base_url();?>Details/<?php echo $post['id'];?>"><img src="<?php echo base_url();?>public/assetsFile/images/products/product1.jpg" alt=""></a></figure>
                                                                <div class="product-category"><?php echo $post['governorate'];?></div>
                                                                <div class="product-price">55</div>
                                                            </div>
                                                            <div class="lower-content">


                                                                <div class="home-brief">
                                                                    <div class="info"><h5>نوع العقار : </h5><span> <?php echo $post['type']['name'].' '.$post['typeOfProperty']['name'];?></span></div>
                                                                    <div class="info"><h5>عدد الغرف : </h5><span> <?php echo $post['numOfRooms']; ?></span></div>
                                                                    <div class="info"><h5>المساحة : </h5><span> <?php echo  $post['areaSpace']; ?></span></div>
                                                                    <div class="info"><h5>السعر : </h5><span> <?php echo  $post['priceOfMeter']; ?></span></div>

                                                                </div>


                                                                <div class="view-etails-btn clearfix">
                                                                    <div class="link-box"><a href="<?php echo base_url();?>Details/<?php echo $post['id'];?>" class="theme-btn"><?php echo $this->lang->line('View_Details'); ?> <span class="fa fa-angle-right"></span></a></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- / END SINGLE PRODUCT ITEM -->
                                        <?php  if (($key % 3) == 0 && ($key != 0 || !isset($posts[( ((int)$key) +1 )])) ) {  ?>
										        </div>
                                                <!-- / END ROW -->
									        </div>
                                        <?php } ?>
                                    <?php } ?>
								</div>
							</div>
						</div>
						<!-- / END PRODUCT DETAILS -->

					</div>
				</div>
			<!--</div>-->
			</div>
		</section>
		<!-- / END PRODUCTS SECTION DESIGN AREA -->

		<!-- START SERVICES DESIGN AREA -->
       <section id="why-us" class="why-us-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="section-title">
                    <h2>لماذا نحن</h2>
                    <span class="title-divider">
								<i class="fa fa-home" aria-hidden="true"></i>
							</span>
                </div>
            </div>
        </div>

        <!-- START WHY US DESIGN AREA -->
        <div class="row">
            <!-- START SINGLE WHY US DESIGN AREA -->
            <div class="col-lg-4 col-md-4">
                <div class="intro-item shadow-hover">
                    <i class="fa fa-rocket"></i>
                    <h4>خدمة سريعة</h4>
                    <p class="text-center">هل تريد شراء عقار بسعر مناسب و مواصفات معينه, هل ترغب بيع عقارك دون الحاجة لمكاتب العقارات نحن نقدم لك هذه الخدمات وبسرعة قياسية.</p>
                </div>
            </div>
            <!-- / END SINGLE WHY US DESIGN AREA -->
            <!-- START SINGLE WHY US DESIGN AREA -->
            <div class="col-lg-4 col-md-4">
                <div class="intro-item shadow-hover">
                    <i class="fa fa-group"></i>
                    <h4>فريق محترف</h4>
                    <p class="text-center">نحن فريق ابداعي متكامل اختير جميع افراده بعناية, لنقدم لكم افضل الخدمات.
                    </p>
                </div>
            </div>
            <!-- / END SINGLE WHY US DESIGN AREA -->
            <!-- START SINGLE WHY US DESIGN AREA -->
            <div class="col-lg-4 col-md-4">
                <div class="intro-item shadow-hover">
                    <i class="fa fa-money"></i>
                    <h4>وفر نقودك وخدمة سريعة</h4>
                    <p class="text-center">نحن فريق يستطيع تقديم تسويق الكتروني بطريقة حرفية لتأمين جميع متطلباتك وتأمين ما تحتاج دون الذهاب للمكاتب العقارات دون ان تدفع تكاليف إضافيه.</p>
                </div>
            </div>
            <!-- / END SINGLE WHY US DESIGN AREA -->

            <!-- / END SINGLE WHY US DESIGN AREA -->
        </div>
        <!-- / END WHY US DESIGN AREA -->
    </div>
</section>
		<!-- / END WHY US SECTION DESIGN AREA -->

		<!-- START CONTACT DESIGN AREA -->
        <section id="contact" class="contact-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="section-title">
                    <h2>اتصل بنا</h2>
                    <span class="title-divider">
								<i class="fa fa-home" aria-hidden="true"></i>
							</span>
                </div>
            </div>
        </div>
        <div class="row contact-form-design-area wow fadeInUp">

            <div class="col-md-12">
                <!-- START CONTACT DETAILS DESIGN AREA -->
                <div class="contact-details-area wow fadeInUp" data-wow-delay=".2s">
                    <div class="col-lg-4 col-md-4">
                        <div class="single-contact-details shadow-hover">
                            <i class="fa fa-phone"></i>
                            <h4>رقم الهاتف</h4>
                            <p class="text-muted">0941500448 - 0112228873</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4">
                        <div class="single-contact-details shadow-hover">
                            <i class="fa fa-envelope"></i>
                            <h4>البريد الالكتروني</h4>
                            <p class="text-muted">support@akarcom.net</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4">
                        <div class="single-contact-details shadow-hover">
                            <i class="fa fa-thumb-tack"></i>
                            <h4>العنوان</h4>
                            <p class="text-muted">سوريا - دمشق</p>
                        </div>
                    </div>
                </div>
                <!-- / END CONTACT DETAILS DESIGN AREA -->
            </div>
        </div>
    </div>
</section>
		<!-- / END CONTACT DESIGN AREA -->

		<!-- START FOOTER DESIGN AREA -->
        <footer class="footer-area wow fadeInUp" data-wow-delay="1s">
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
		<script type="text/javascript" src="<?php echo base_url();?>public/assetsFile/js/jquery.min.js"></script>
		<!-- BOOTSTRAP JS -->
		<script src="<?php echo base_url();?>public/assetsFile/bootstrap/js/bootstrap.min.js"></script>
		<!-- PROGRESS JS  -->
		<script src="<?php echo base_url();?>public/assetsFile/js/jquery.appear.js"></script>
		<!-- OWL CAROUSEL JS  -->
		<script src="<?php echo base_url();?>public/assetsFile/owlcarousel/js/owl.carousel.min.js"></script>
		<!-- MIXITUP JS -->
		<script src="<?php echo base_url();?>public/assetsFile/js/jquery.mixitup.js"></script>
		<!-- MAGNIFICANT JS -->
		<script src="<?php echo base_url();?>public/assetsFile/js/jquery.magnific-popup.min.js"></script>
		<!-- STEALLER JS -->
		<script src="<?php echo base_url();?>public/assetsFile/js/jquery.stellar.min.js"></script>
		<!-- YOUTUBE JS -->
		<script src="<?php echo base_url();?>public/assetsFile/js/jquery.mb.YTPlayer.min.js"></script>
		<script type="text/javascript">
			$('.player').mb_YTPlayer();
		</script>
		<!-- COUNTER UP JS -->
		<script src="<?php echo base_url();?>public/assetsFile/js/jquery.waypoints.min.js"></script>
		<script src="<?php echo base_url();?>public/assetsFile/js/jquery.counterup.min.js"></script>
		<!-- LIGHTBOX JS -->
		<script src="<?php echo base_url();?>public/assetsFile/js/lightbox.min.js"></script>
		<!-- WOW JS -->
		<script src="<?php echo base_url();?>public/assetsFile/js/wow.min.js"></script>
		<!-- scripts js -->
		<script src="<?php echo base_url();?>public/assetsFile/js/scripts.js"></script>
	</body>
</html>
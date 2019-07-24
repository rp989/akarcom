<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from demo.dueza.com/property-html/property/black-color/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 29 Oct 2018 17:37:29 GMT -->
<head>
		<!-- META -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- PAGE TITLE -->
		<title>PROPERTY &#8211; Real Estate Company, Real Estate Agency, Single Property Template</title>
		<!-- FAVI ICON -->
		<link rel="icon" type="image/png" href="<?php echo base_url();?>public/assets/images/favi.png" sizes="32x32">
		<!-- BOOTSTRAP CSS -->
		<link rel="stylesheet" href="<?php echo base_url();?>public/assets/bootstrap/css/bootstrap.min.css">
		<!-- ALL GOOGLE FONTS -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700|Lato:300,400,700,900" rel="stylesheet">
		<!-- FONT AWESOME CSS -->
		<link rel="stylesheet" href="<?php echo base_url();?>public/assets/fonts/linear-fonts.css">
		<link rel="stylesheet" href="<?php echo base_url();?>public/assets/fonts/font-awesome.css">
		<!-- OWL CAROSEL CSS -->
		<link rel="stylesheet" href="<?php echo base_url();?>public/assets/owlcarousel/css/owl.carousel.css">
		<link rel="stylesheet" href="<?php echo base_url();?>public/assets/owlcarousel/css/owl.theme.css">
		<!-- LIGHTBOX CSS -->
		<link rel="stylesheet" href="<?php echo base_url();?>public/assets/css/lightbox.min.css">
		<!-- MAGNIFIC CSS -->
		<link rel="stylesheet" href="<?php echo base_url();?>public/assets/css/magnific-popup.css">
		<!-- ANIMATE CSS -->
		<link rel="stylesheet" href="<?php echo base_url();?>public/assets/css/animate.min.css">
		<!-- MAIN STYLE CSS -->
		<link rel="stylesheet" href="<?php echo base_url();?>public/assets/css/style.css">
		<!-- RESPONSIVE CSS -->
		<link rel="stylesheet" href="<?php echo base_url();?>public/assets/css/responsive.css">
    <?php if (!$this->session->userdata('lang')){ ?>
        <!-- rtl CSS -->
        <link rel="stylesheet" href="<?php echo base_url();?>public/assetsFile/css/rtl.css">
    <?php }?>
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
		<header id="home" class="welcome-area">
			<div class="header-top-area">
				<div class="container">
					<div class="row">
						<div class="col-md-3">
							<!-- START LOGO DESIGN AREA -->
							<div class="logo">
								<a href="<?php echo base_url();?>">
									<p>PROPERTY</p>
								</a>
							</div>
							<!-- END LOGO DESIGN AREA -->
						</div>
						<div class="col-md-9">
							<!-- START MENU DESIGN AREA -->
							<div class="mainmenu">
								<div class="navbar navbar-nobg">
									<div class="navbar-header">
										<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
											<span class="sr-only">Toggle navigation</span>
											<span class="icon-bar"></span>
											<span class="icon-bar"></span>
											<span class="icon-bar"></span>
										</button>
									</div>
									<div class="navbar-collapse collapse">
										<ul class="nav navbar-nav navbar-right">
											<li class="active"><a class="smoth-scroll" href="#home">Home <div class="ripple-wrapper"></div></a></li>
											<li><a class="smoth-scroll" href="#products">Properties</a></li>
											<li><a class="smoth-scroll" href="#why-us">Why Us</a></li>
                                            <li><a class="smoth-scroll" href="<?php echo base_url(); ?>SignIn">Sign in</a></li>
											<li><a class="smoth-scroll" href="#contact">contact</a></li>
                                            <?php if ($this->session->userdata('lang')){ ?>
                                                    <li><a href="<?php echo base_url(); ?>?lang=ar">AR</a></li>
                                            <?php }else{ ?>
                                                    <li><a href="<?php echo base_url(); ?>?lang=en">En</a></li>
                                            <?php } ?>
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
										<h2>PROPERTY SELL!</h2>
										<p>We are making your dream true on the basis of Creativity is simply dummy the printing and typesetting industry.</p>
										<a class="slide-btn smoth-scroll" href="#products">View Our Properties</a>
										<a class="smoth-scroll hire-us-slide-btn" href="#contact">Contact us</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>
		<!-- / END HOMEPAGE DESIGN AREA -->

		<!-- START INTRO DESIGN AREA -->
		<section id="intro" class="intro-area section-padding">
			<div class="container">
				<div class="row">
					<div class="col-lg-4 col-md-4">
						<div class="intro-item shadow-hover">
							<i class="fa fa-home"></i>
							<h4>HOUSE SELL</h4>
							<p class="text-center">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since.</p>
						</div>
					</div>
					<div class="col-lg-4 col-md-4">
						<div class="intro-item shadow-hover">
							<i class="fa fa-building"></i>
							<h4>APPARTMENT SELL</h4>
							<p class="text-center">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since.</p>
						</div>
					</div>
					<div class="col-lg-4 col-md-4">
						<div class="intro-item shadow-hover">
							<i class="fa fa-map"></i>
							<h4>LAND SELL</h4>
							<p class="text-center">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since.</p>
						</div>
					</div>
				</div><!-- / END ROW -->
			</div><!-- / END CONTAINER -->
		</section>
		<!-- / END INTRO DESIGN AREA -->

		<!-- START PRODUCTS SECTION DESIGN AREA -->
		<section id="products" class="products-area section-padding">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<div class="section-title">
							<h2>our properties</h2>
							<span class="title-divider">
								<i class="fa fa-home" aria-hidden="true"></i>
							</span>
						</div>
					</div>
				</div>


				<div class="row">
					<div class="product-menu">
						<!-- START PRODUCT NAV FILTER -->
						<div class="col-md-12">
							<ul class="product-nav" role="tablist">
								<li role="presentation" class="active"><a href="#all" aria-controls="all" data-toggle="tab" aria-expanded="true">Any Type</a></li>
								<li role="presentation"><a href="#house-sell" aria-controls="house-sell" data-toggle="tab" aria-expanded="false">House Sell</a></li>
								<li role="presentation"><a href="#appartment-sell" aria-controls="appartment-sell" data-toggle="tab" aria-expanded="false">Appartment Sell</a></li>
								<li role="presentation"><a href="#land-sell" aria-controls="land-sell" data-toggle="tab" aria-expanded="false">Land Sell</a></li>
							</ul>
						</div>
						<!-- / END PRODUCT NAV FILTER -->

						<!-- START PRODUCT DETAILS-->
						<div class="product-menu-details">
							<div class="col-md-12">
								<div class="tab-content">
									<div role="tabpanel" class="tab-pane active" id="all">
										<div class="row">
											<!-- START SINGLE PRODUCT ITEM -->
											<div class="product-box col-md-4 col-sm-12 col-xs-12">
												<div class="inner-box">
													<div class="image-box">
														<figure class="image"><a href="<?php echo base_url();?>productDetails"><img src="<?php echo base_url();?>public/assets/images/products/product1.jpg" alt=""></a></figure>
														<div class="product-category">House</div>
														<div class="product-price">$1,00,000</div>
													</div>
													<div class="lower-content">
														<div class="rating-review text-center">
															<div class="ratings"><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span></div>
															<div class="rev">(135 reviews)</div>
														</div>
														<div class="product-title text-center">
															<h3><a href="<?php echo base_url();?>productDetails">PRODUCT NAME HERE</a></h3>
															<div class="location"><span class="fa fa-map-marker"></span>&nbsp; 10/A, Product Address Here.</div>
														</div>
														<div class="view-etails-btn clearfix">
															<div class="link-box"><a href="<?php echo base_url();?>productDetails" class="theme-btn">View Details <span class="fa fa-angle-right"></span></a></div>
														</div>
													</div>
												</div>
											</div>
											<!-- / END SINGLE PRODUCT ITEM -->
											<!-- START SINGLE PRODUCT ITEM -->
											<div class="product-box col-md-4 col-sm-12 col-xs-12">
												<div class="inner-box">
													<div class="image-box">
														<figure class="image"><a href="<?php echo base_url();?>productDetails"><img src="<?php echo base_url();?>public/assets/images/products/product2.jpg" alt=""></a></figure>
														<div class="product-category">House</div>
														<div class="product-price">$1,00,000</div>
													</div>
													<div class="lower-content">
														<div class="rating-review text-center">
															<div class="ratings"><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span></div>
															<div class="rev">(135 reviews)</div>
														</div>
														<div class="product-title text-center">
															<h3><a href="<?php echo base_url();?>productDetails">PRODUCT NAME HERE</a></h3>
															<div class="location"><span class="fa fa-map-marker"></span>&nbsp; 10/A, Product Address Here.</div>
														</div>
														<div class="view-etails-btn clearfix">
															<div class="link-box"><a href="<?php echo base_url();?>productDetails" class="theme-btn">View Details <span class="fa fa-angle-right"></span></a></div>
														</div>
													</div>
												</div>
											</div>
											<!-- / END SINGLE PRODUCT ITEM -->
											<!-- START SINGLE PRODUCT ITEM -->
											<div class="product-box col-md-4 col-sm-12 col-xs-12">
												<div class="inner-box">
													<div class="image-box">
														<figure class="image"><a href="<?php echo base_url();?>productDetails"><img src="<?php echo base_url();?>public/assets/images/products/product3.jpg" alt=""></a></figure>
														<div class="product-category">House</div>
														<div class="product-price">$1,00,000</div>
													</div>
													<div class="lower-content">
														<div class="rating-review text-center">
															<div class="ratings"><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span></div>
															<div class="rev">(135 reviews)</div>
														</div>
														<div class="product-title text-center">
															<h3><a href="<?php echo base_url();?>productDetails">PRODUCT NAME HERE</a></h3>
															<div class="location"><span class="fa fa-map-marker"></span>&nbsp; 10/A, Product Address Here.</div>
														</div>
														<div class="view-etails-btn clearfix">
															<div class="link-box"><a href="<?php echo base_url();?>productDetails" class="theme-btn">View Details <span class="fa fa-angle-right"></span></a></div>
														</div>
													</div>
												</div>
											</div>
											<!-- / END SINGLE PRODUCT ITEM -->
											<!-- START SINGLE PRODUCT ITEM -->
											<div class="product-box col-md-4 col-sm-12 col-xs-12">
												<div class="inner-box">
													<div class="image-box">
														<figure class="image"><a href="<?php echo base_url();?>productDetails"><img src="<?php echo base_url();?>public/assets/images/products/product4.jpg" alt=""></a></figure>
														<div class="product-category">Appartment</div>
														<div class="product-price">$1,00,000</div>
													</div>
													<div class="lower-content">
														<div class="rating-review text-center">
															<div class="ratings"><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span></div>
															<div class="rev">(135 reviews)</div>
														</div>
														<div class="product-title text-center">
															<h3><a href="<?php echo base_url();?>productDetails">PRODUCT NAME HERE</a></h3>
															<div class="location"><span class="fa fa-map-marker"></span>&nbsp; 10/A, Product Address Here.</div>
														</div>
														<div class="view-etails-btn clearfix">
															<div class="link-box"><a href="<?php echo base_url();?>productDetails" class="theme-btn">View Details <span class="fa fa-angle-right"></span></a></div>
														</div>
													</div>
												</div>
											</div>
											<!-- / END SINGLE PRODUCT ITEM -->
											<!-- START SINGLE PRODUCT ITEM -->
											<div class="product-box col-md-4 col-sm-12 col-xs-12">
												<div class="inner-box">
													<div class="image-box">
														<figure class="image"><a href="<?php echo base_url();?>productDetails"><img src="<?php echo base_url();?>public/assets/images/products/product5.jpg" alt=""></a></figure>
														<div class="product-category">Appartment</div>
														<div class="product-price">$1,00,000</div>
													</div>
													<div class="lower-content">
														<div class="rating-review text-center">
															<div class="ratings"><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span></div>
															<div class="rev">(135 reviews)</div>
														</div>
														<div class="product-title text-center">
															<h3><a href="<?php echo base_url();?>productDetails">PRODUCT NAME HERE</a></h3>
															<div class="location"><span class="fa fa-map-marker"></span>&nbsp; 10/A, Product Address Here.</div>
														</div>
														<div class="view-etails-btn clearfix">
															<div class="link-box"><a href="<?php echo base_url();?>productDetails" class="theme-btn">View Details <span class="fa fa-angle-right"></span></a></div>
														</div>
													</div>
												</div>
											</div>
											<!-- / END SINGLE PRODUCT ITEM -->
											<!-- START SINGLE PRODUCT ITEM -->
											<div class="product-box col-md-4 col-sm-12 col-xs-12">
												<div class="inner-box">
													<div class="image-box">
														<figure class="image"><a href="<?php echo base_url();?>productDetails"><img src="<?php echo base_url();?>public/assets/images/products/product6.jpg" alt=""></a></figure>
														<div class="product-category">Land</div>
														<div class="product-price">$1,00,000</div>
													</div>
													<div class="lower-content">
														<div class="rating-review text-center">
															<div class="ratings"><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span></div>
															<div class="rev">(135 reviews)</div>
														</div>
														<div class="product-title text-center">
															<h3><a href="<?php echo base_url();?>productDetails">PRODUCT NAME HERE</a></h3>
															<div class="location"><span class="fa fa-map-marker"></span>&nbsp; 10/A, Product Address Here.</div>
														</div>
														<div class="view-etails-btn clearfix">
															<div class="link-box"><a href="<?php echo base_url();?>productDetails" class="theme-btn">View Details <span class="fa fa-angle-right"></span></a></div>
														</div>
													</div>
												</div>
											</div>
											<!-- / END SINGLE PRODUCT ITEM -->
										</div>
										<!-- / END ROW -->
									</div>
									<div role="tabpanel" class="tab-pane" id="house-sell">
										<div class="row">
											<!-- START SINGLE PRODUCT ITEM -->
											<div class="product-box col-md-4 col-sm-12 col-xs-12">
												<div class="inner-box">
													<div class="image-box">
														<figure class="image"><a href="<?php echo base_url();?>productDetails"><img src="<?php echo base_url();?>public/assets/images/products/product1.jpg" alt=""></a></figure>
														<div class="product-category">House</div>
														<div class="product-price">$1,00,000</div>
													</div>
													<div class="lower-content">
														<div class="rating-review text-center">
															<div class="ratings"><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span></div>
															<div class="rev">(135 reviews)</div>
														</div>
														<div class="product-title text-center">
															<h3><a href="<?php echo base_url();?>productDetails">PRODUCT NAME HERE</a></h3>
															<div class="location"><span class="fa fa-map-marker"></span>&nbsp; 10/A, Product Address Here.</div>
														</div>
														<div class="view-etails-btn clearfix">
															<div class="link-box"><a href="<?php echo base_url();?>productDetails" class="theme-btn">View Details <span class="fa fa-angle-right"></span></a></div>
														</div>
													</div>
												</div>
											</div>
											<!-- / END SINGLE PRODUCT ITEM -->
											<!-- START SINGLE PRODUCT ITEM -->
											<div class="product-box col-md-4 col-sm-12 col-xs-12">
												<div class="inner-box">
													<div class="image-box">
														<figure class="image"><a href="<?php echo base_url();?>productDetails"><img src="<?php echo base_url();?>public/assets/images/products/product2.jpg" alt=""></a></figure>
														<div class="product-category">House</div>
														<div class="product-price">$1,00,000</div>
													</div>
													<div class="lower-content">
														<div class="rating-review text-center">
															<div class="ratings"><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span></div>
															<div class="rev">(135 reviews)</div>
														</div>
														<div class="product-title text-center">
															<h3><a href="<?php echo base_url();?>productDetails">PRODUCT NAME HERE</a></h3>
															<div class="location"><span class="fa fa-map-marker"></span>&nbsp; 10/A, Product Address Here.</div>
														</div>
														<div class="view-etails-btn clearfix">
															<div class="link-box"><a href="<?php echo base_url();?>productDetails" class="theme-btn">View Details <span class="fa fa-angle-right"></span></a></div>
														</div>
													</div>
												</div>
											</div>
											<!-- / END SINGLE PRODUCT ITEM -->
											<!-- START SINGLE PRODUCT ITEM -->
											<div class="product-box col-md-4 col-sm-12 col-xs-12">
												<div class="inner-box">
													<div class="image-box">
														<figure class="image"><a href="<?php echo base_url();?>productDetails"><img src="<?php echo base_url();?>public/assets/images/products/product3.jpg" alt=""></a></figure>
														<div class="product-category">House</div>
														<div class="product-price">$1,00,000</div>
													</div>
													<div class="lower-content">
														<div class="rating-review text-center">
															<div class="ratings"><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span></div>
															<div class="rev">(135 reviews)</div>
														</div>
														<div class="product-title text-center">
															<h3><a href="<?php echo base_url();?>productDetails">PRODUCT NAME HERE</a></h3>
															<div class="location"><span class="fa fa-map-marker"></span>&nbsp; 10/A, Product Address Here.</div>
														</div>
														<div class="view-etails-btn clearfix">
															<div class="link-box"><a href="<?php echo base_url();?>productDetails" class="theme-btn">View Details <span class="fa fa-angle-right"></span></a></div>
														</div>
													</div>
												</div>
											</div>
											<!-- / END SINGLE PRODUCT ITEM -->
										</div>
										<!-- / END ROW -->
									</div>
									<div role="tabpanel" class="tab-pane" id="appartment-sell">
										<div class="row">
											<!-- START SINGLE PRODUCT ITEM -->
											<div class="product-box col-md-4 col-sm-12 col-xs-12">
												<div class="inner-box">
													<div class="image-box">
														<figure class="image"><a href="<?php echo base_url();?>productDetails"><img src="<?php echo base_url();?>public/assets/images/products/product4.jpg" alt=""></a></figure>
														<div class="product-category">Appartment</div>
														<div class="product-price">$1,00,000</div>
													</div>
													<div class="lower-content">
														<div class="rating-review text-center">
															<div class="ratings"><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span></div>
															<div class="rev">(135 reviews)</div>
														</div>
														<div class="product-title text-center">
															<h3><a href="<?php echo base_url();?>productDetails">PRODUCT NAME HERE</a></h3>
															<div class="location"><span class="fa fa-map-marker"></span>&nbsp; 10/A, Product Address Here.</div>
														</div>
														<div class="view-etails-btn clearfix">
															<div class="link-box"><a href="<?php echo base_url();?>productDetails" class="theme-btn">View Details <span class="fa fa-angle-right"></span></a></div>
														</div>
													</div>
												</div>
											</div>
											<!-- / END SINGLE PRODUCT ITEM -->
											<!-- START SINGLE PRODUCT ITEM -->
											<div class="product-box col-md-4 col-sm-12 col-xs-12">
												<div class="inner-box">
													<div class="image-box">
														<figure class="image"><a href="<?php echo base_url();?>productDetails"><img src="<?php echo base_url();?>public/assets/images/products/product5.jpg" alt=""></a></figure>
														<div class="product-category">Appartment</div>
														<div class="product-price">$1,00,000</div>
													</div>
													<div class="lower-content">
														<div class="rating-review text-center">
															<div class="ratings"><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span></div>
															<div class="rev">(135 reviews)</div>
														</div>
														<div class="product-title text-center">
															<h3><a href="<?php echo base_url();?>productDetails">PRODUCT NAME HERE</a></h3>
															<div class="location"><span class="fa fa-map-marker"></span>&nbsp; 10/A, Product Address Here.</div>
														</div>
														<div class="view-etails-btn clearfix">
															<div class="link-box"><a href="<?php echo base_url();?>productDetails" class="theme-btn">View Details <span class="fa fa-angle-right"></span></a></div>
														</div>
													</div>
												</div>
											</div>
											<!-- / END SINGLE PRODUCT ITEM -->
										</div>
										<!-- / END ROW -->
									</div>
									<div role="tabpanel" class="tab-pane" id="land-sell">
										<div class="row">
											<!-- START SINGLE PRODUCT ITEM -->
											<div class="product-box col-md-4 col-sm-12 col-xs-12">
												<div class="inner-box">
													<div class="image-box">
														<figure class="image"><a href="<?php echo base_url();?>productDetails"><img src="<?php echo base_url();?>public/assets/images/products/product6.jpg" alt=""></a></figure>
														<div class="product-category">Land</div>
														<div class="product-price">$1,00,000</div>
													</div>
													<div class="lower-content">
														<div class="rating-review text-center">
															<div class="ratings"><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span></div>
															<div class="rev">(135 reviews)</div>
														</div>
														<div class="product-title text-center">
															<h3><a href="<?php echo base_url();?>productDetails">PRODUCT NAME HERE</a></h3>
															<div class="location"><span class="fa fa-map-marker"></span>&nbsp; 10/A, Product Address Here.</div>
														</div>
														<div class="view-etails-btn clearfix">
															<div class="link-box"><a href="<?php echo base_url();?>productDetails" class="theme-btn">View Details <span class="fa fa-angle-right"></span></a></div>
														</div>
													</div>
												</div>
											</div>
											<!-- / END SINGLE PRODUCT ITEM -->
										</div>
										<!-- / END ROW -->
									</div>

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

		<!-- START CALL TO ACTION AREA -->
		<section class="call-to-action-area" data-stellar-background-ratio="0.6">
			<div class="container">
				<div class="row">
					<div class="col-md-12 text-center">
						<h2>Do you want to Advertise with us?</h2>
						<p>now you can Advertise your real estate on akar website.</p>

					</div>
				</div>
			</div>
		</section>
		<!-- / END CALL TO ACTION AREA -->

		<!-- START SERVICES DESIGN AREA -->
		<section id="why-us" class="why-us-area section-padding">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<div class="section-title">
							<h2>Why us</h2>
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
							<h4>QUICK SERVICES</h4>
							<p class="text-center">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since.</p>
						</div>
					</div>
					<!-- / END SINGLE WHY US DESIGN AREA -->
					<!-- START SINGLE WHY US DESIGN AREA -->
					<div class="col-lg-4 col-md-4">
						<div class="intro-item shadow-hover">
							<i class="fa fa-group"></i>
							<h4>EXPERT TEAM</h4>
							<p class="text-center">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since.</p>
						</div>
					</div>
					<!-- / END SINGLE WHY US DESIGN AREA -->
					<!-- START SINGLE WHY US DESIGN AREA -->
					<div class="col-lg-4 col-md-4">
						<div class="intro-item shadow-hover">
							<i class="fa fa-university"></i>
							<h4>LUXURIOUS PROPERTIES</h4>
							<p class="text-center">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since.</p>
						</div>
					</div>
					<!-- / END SINGLE WHY US DESIGN AREA -->
					<!-- START SINGLE WHY US DESIGN AREA -->
					<div class="col-lg-4 col-md-4">
						<div class="intro-item shadow-hover">
							<i class="fa fa-calculator"></i>
							<h4>EMI FACILITY</h4>
							<p class="text-center">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since.</p>
						</div>
					</div>
					<!-- / END SINGLE WHY US DESIGN AREA -->
					<!-- START SINGLE WHY US DESIGN AREA -->
					<div class="col-lg-4 col-md-4">
						<div class="intro-item shadow-hover">
							<i class="fa fa-diamond"></i>
							<h4>MODERN FITTINGS</h4>
							<p class="text-center">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since.</p>
						</div>
					</div>
					<!-- / END SINGLE WHY US DESIGN AREA -->
					<!-- START SINGLE WHY US DESIGN AREA -->
					<div class="col-lg-4 col-md-4">
						<div class="intro-item shadow-hover">
							<i class="fa fa-map-marker"></i>
							<h4>AWESOME LOCATION</h4>
							<p class="text-center">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since.</p>
						</div>
					</div>
					<!-- / END SINGLE WHY US DESIGN AREA -->
				</div>
				<!-- / END WHY US DESIGN AREA -->
			</div>
		</section>
		<!-- / END WHY US SECTION DESIGN AREA -->



		<!-- START FUN FACTS SECTION DESIGN AREA -->
		<section id="fun-facts" class="fun-facts-area section-padding">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<div class="section-title">
							<h2>FUN FACTS</h2>
							<span class="title-divider">
								<i class="fa fa-home" aria-hidden="true"></i>
							</span>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-3 col-sm-6">
						<div class="single-project-complete">
							<span class="fa fa-thumbs-o-up"></span>
							<h2 class="counter-num">1200</h2>
							<h6 class="text-muted">Project Completed</h6>
						</div>
					</div>
					<div class="col-md-3 col-sm-6">
						<div class="single-project-complete">
							<span class="fa fa-smile-o"></span>
							<h2 class="counter-num">1000</h2>
							<h6 class="text-muted">Happy Clients</h6>
						</div>
					</div>
					<div class="col-md-3 col-sm-6">
						<div class="single-project-complete">
							<span class="fa fa-life-ring"></span>
							<h2 class="counter-num">590</h2>
							<h6 class="text-muted">Support Provided</h6>
						</div>
					</div>
					<div class="col-md-3 col-sm-6">
						<div class="single-project-complete">
							<span class="fa fa-trophy"></span>
							<h2 class="counter-num">31</h2>
							<h6 class="text-muted">Awards Won</h6>
						</div>
					</div>
				</div>
				<!-- /END FUN FACTS DESIGN AREA -->
			</div>
		</section>
		<!-- /END FUN FACTS SECTION DESIGN AREA -->



		<!-- START CONTACT DESIGN AREA -->
		<section id="contact" class="contact-area section-padding">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<div class="section-title">
							<h2>contact us</h2>
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
									<h4>PHONE</h4>
									<p class="text-muted">+1 111 222 3333</p>
								</div>
							</div>

							<div class="col-lg-4 col-md-4">
								<div class="single-contact-details shadow-hover">
									<i class="fa fa-envelope"></i>
									<h4>E-MAIL</h4>
									<p class="text-muted">support@dueza.com</p>
								</div>
							</div>

							<div class="col-lg-4 col-md-4">
								<div class="single-contact-details shadow-hover">
									<i class="fa fa-thumb-tack"></i>
									<h4>ADDRESS</h4>
									<p class="text-muted">New York, United States</p>
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
							<p class="text-center">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since. Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
						</div>
						<div class="footer-social-link text-center">
							<ul>
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
								<li><a href="#"><i class="fa fa-instagram"></i></a></li>
								<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
							</ul>
						</div>
						<span class="title-divider">
							<i class="fa fa-home" aria-hidden="true"></i>
						</span>
						<div class="footer-text">
							<h6>&copy;copyright | PROPERTY 2017.Developed by DuezaThemes</h6>
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
		<script type="text/javascript" src="<?php echo base_url();?>public/assets/js/jquery.min.js"></script>
		<!-- BOOTSTRAP JS -->
		<script src="<?php echo base_url();?>public/assets/bootstrap/js/bootstrap.min.js"></script>
		<!-- PROGRESS JS  -->
		<script src="<?php echo base_url();?>public/assets/js/jquery.appear.js"></script>
		<!-- OWL CAROUSEL JS  -->
		<script src="<?php echo base_url();?>public/assets/owlcarousel/js/owl.carousel.min.js"></script>
		<!-- MIXITUP JS -->
		<script src="<?php echo base_url();?>public/assets/js/jquery.mixitup.js"></script>
		<!-- MAGNIFICANT JS -->
		<script src="<?php echo base_url();?>public/assets/js/jquery.magnific-popup.min.js"></script>
		<!-- STEALLER JS -->
		<script src="<?php echo base_url();?>public/assets/js/jquery.stellar.min.js"></script>
		<!-- YOUTUBE JS -->
		<script src="<?php echo base_url();?>public/assets/js/jquery.mb.YTPlayer.min.js"></script>
		<script type="text/javascript">
			$('.player').mb_YTPlayer();
		</script>
		<!-- COUNTER UP JS -->
		<script src="<?php echo base_url();?>public/assets/js/jquery.waypoints.min.js"></script>
		<script src="<?php echo base_url();?>public/assets/js/jquery.counterup.min.js"></script>
		<!-- LIGHTBOX JS -->
		<script src="<?php echo base_url();?>public/assets/js/lightbox.min.js"></script>
		<!-- WOW JS -->
		<script src="<?php echo base_url();?>public/assets/js/wow.min.js"></script>
		<!-- scripts js -->
		<script src="<?php echo base_url();?>public/assets/js/scripts.js"></script>
	</body>


<!-- Mirrored from demo.dueza.com/property-html/property/black-color/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 29 Oct 2018 17:40:40 GMT -->
</html>
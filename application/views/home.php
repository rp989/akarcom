<?php
//echo json_encode($ids);exit;
?>
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
    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>public/assetsFile/images/favi.png" sizes="32x32">
    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/assetsFile/bootstrap/css/bootstrap.min.css">
    <!-- ALL GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700|Lato:300,400,700,900" rel="stylesheet">
    <!-- FONT AWESOME CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/assetsFile/fonts/linear-fonts.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/assetsFile/fonts/font-awesome.css">
    <!-- OWL CAROSEL CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/assetsFile/owlcarousel/css/owl.carousel.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/assetsFile/owlcarousel/css/owl.theme.css">
    <!-- LIGHTBOX CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/assetsFile/css/lightbox.min.css">
    <!-- MAGNIFIC CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/assetsFile/css/magnific-popup.css">
    <!-- ANIMATE CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/assetsFile/css/animate.min.css">
    <!-- MAIN STYLE CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/assetsFile/css/style.css">
    <!-- RESPONSIVE CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/assetsFile/css/responsive.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>public/assetsFile/css/custom.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>public/assetsFile/css/ion.rangeSlider.css">
    <!-- rtl CSS -->
    <?php if (!$this->session->userdata('lang')) { ?>
        <link rel="stylesheet" href="<?php echo base_url(); ?>public/assetsFile/css/rtl.css">
    <?php } ?>

    <!-- bin/jquery.slider.min.css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/plugins/jslider/css/jslider.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/plugins/jslider/css/jslider.round-blue.css"
          type="text/css">

    <!-- jQuery-->
    <script src="<?php echo base_url(); ?>public/assetsFile/js/jquery.v2.0.3.js"></script>
    <script src="<?php echo base_url(); ?>public/assetsFile/js/jquery-ui.js"></script>

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

    <script type="text/javascript" src="<?php echo base_url(); ?>public/assetsFile/js/ion.rangeSlider.js"></script>
    <!-- end -->
    <style>
        .irs {
            direction: ltr;
        }
    </style>
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
                        <a href="<?php echo base_url(); ?>">
                            <img src="<?php echo base_url(); ?>public/assetsFile/images/akarkom.svg"
                                 style="width: 75px;padding-bottom: 8px;" width="75px" alt="akarkom">
                        </a>
                    </div>
                </div>
                <!-- END LOGO DESIGN AREA -->
                <div class="col-md-9">
                    <!-- START MENU DESIGN AREA -->
                    <div class="mainmenu">
                        <div class="navbar navbar-nobg">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle abss" data-toggle="collapse"
                                        data-target=".navbar-collapse">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                            <div class="navbar-collapse collapse">
                                <ul class="nav navbar-nav navbar-right">
                                    <li><a class="smoth-scroll" href="#products">العروض</a></li>
                                    <li><a class="smoth-scroll" href="#why-us"><?php echo $this->lang->line('Why_Us'); ?></a></li>
                                    <li><a class="smoth-scroll" href="#contact"><?php echo $this->lang->line('contact'); ?></a></li>
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
                                <h2>عقارك للبيع ؟ </h2>
                                <p>شارك في تصفح الاف الاعلانات !</p>
                                <?php if ($this->session->userdata('userId')){ ?>
                                    <a class="slide-btn smoth-scroll" href="<?php echo base_url();?>MemberArea/addProduct">اضافة اعلان</a>
                                <?php } else { ?>
                                    <a class="slide-btn smoth-scroll" href="<?php echo base_url();?>SignIn">تسجيل الدخول</a>
                                <?php }?>
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

    <div class="row">
        <div class="col-sm-12">
            <div class="section-title">
                <h2>عروضنا</h2>
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
            <div class="single-blogarea section-padding" style="    padding-top: 20px;">
                <div class="container-fluid">
                    <div class="row" style="margin-right: 0;">

                        <!-- START SIDEBAR DESIGN AREA -->
                        <div class="col-md-10 col-xs-12 wow fadeInUp" style="padding-right: 30px;" data-wow-duration="2s"
                             data-wow-delay="0.1s" data-wow-offset="0">
                            <div class="recent-post single-sidebar">

                                <?php
                                if (is_array($posts)) {
                                    foreach ($posts as $key => $post) { ?>
                                        <!-- START SINGLE PRODUCT ITEM -->
                                        <div class="product-box col-sm-12 col-md-4 col-sm-12 col-xs-12"
                                             style="    float: right;">
                                            <div class="inner-box">
                                                <div class="image-box">
                                                    <figure class="image"><a
                                                                href="<?php echo base_url(); ?>Details/<?php echo $post['id']; ?>">
                                                            <img style="height: 285px;"
                                                                    src="<?php echo $post['images']; ?>"
                                                                    alt=""></a>
                                                        <img class="cardLogo" src="./public/assetsFile/images/akarkom.svg">
                                                    </figure>
                                                    <div class="product-category"><?php echo $post['governorate'];?></div>
                                                    <div class="product-price"><?php echo $post['numOfView'];?></div>
                                                </div>
                                                <div class="lower-content">
                                                    <div class="home-brief">
                                                        <div class="info"><h5>نوع العقار : </h5>
                                                            <span> <?php echo $post['type']['name'] . ' - ' . $post['typeOfProperty']['name']. ' - ' . $post['ownership']; ?></span>
                                                        </div>
                                                        <div class="info"><h5>عدد الغرف : </h5>
                                                            <span> <?php echo $post['numOfRooms']; ?></span></div>
                                                        <div class="info"><h5>المساحة : </h5>
                                                            <span> <?php echo $post['areaSpace']; ?></span></div>
                                                        <div class="info"><h5>السعر : </h5>
                                                            <span> <?php echo $post['priceOfMeter']; ?></span></div>
                                                        <div class="info"><h5>وقت الاعلان : </h5>
                                                            <span> <?php echo $post['timestamp']; ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="view-etails-btn clearfix">
                                                        <div class="link-box"><a
                                                                    href="<?php echo base_url(); ?>Details/<?php echo $post['id']; ?>"
                                                                    class="theme-btn">عرض التفاصيل<span
                                                                        class="fa fa-angle-right"></span></a></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- / END SINGLE PRODUCT ITEM -->
                                    <?php }
                                } else {
                                    ?>
                                    <div class="label label-danger"
                                         style="text-align: center;font-size: 24px;padding: 15px 60px;"><?php echo $posts; ?></div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col-md-2 col-xs-12 filters offset-0">
                            <?php foreach ($data as $key => $parts) { ?>
                            <div class="row" style="background: #24519d;margin-top: 1px;">
                                <button type="button" class="collapsebtn last" data-toggle="collapse"
                                        data-target="#<?php echo $key; ?>">
                                    <?php echo $this->lang->line($key); ?>: <span class="collapsearrow"></span>
                                </button>
                                <div id="<?php echo $key; ?>" class="collapse in">

                                    <?php
                                    if ($key == 'governorates') {
                                        $type = 'select';
                                        echo '<div class="hpadding20" style="padding: 5px 50px;">
                                                <div class="checkbox" style="text-align: center;color: #333333">
                                                    <select class="' . $key . '" name="' . $key . '[]" style="width: 150px;text-align-last: center;height: 35px;">';
                                        echo '<option value="">الجميع</option>';
                                    } else if ($key == 'ownership') {
                                        $type = 'radio';
                                        echo '<div class="hpadding20" style="display: flex;padding: 5px 50px;">';
                                    } else {
                                        $type = 'check';
                                        echo '<div class="hpadding20" style="padding: 5px 50px;">';
                                    }
                                    foreach ($parts as $part) {
                                        if ($type == 'check') {
                                            ?>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" class="<?php echo $key; ?>" name="<?php echo $key; ?>[]" value="<?php echo $part['id']; ?>"
                                                        <?php echo is_array($ids) ? in_array($part['id'], $ids) ? 'checked' : '' : ''; ?>>
                                                    <span style="padding-right: 25px;"><?php echo $part['text']; ?></span>
                                                </label>
                                            </div>
                                        <?php } elseif ($type == 'radio') {
                                            ?>
                                            <div class="checkbox" style="margin-top: 10px;padding-left: 0;">
                                                <label>
                                                    <input type="radio" class="<?php echo $key; ?>"
                                                           name="<?php echo $key; ?>"
                                                           value="<?php echo $part['id']; ?>"
                                                        <?php echo is_array($ids) ? in_array($part['id'], $ids) ? 'checked' : '' : ''; ?>>
                                                    <span style="padding-right: 25px;"><?php echo $part['text']; ?></span>
                                                </label>
                                            </div>
                                        <?php } elseif ($type == 'select') {
                                            ?>
                                            <option value="<?php echo $part['id']; ?>" <?php echo is_array($ids) ? in_array($part['id'], $ids) ? 'selected' : '' : ''; ?>> <?php echo $part['text']; ?> </option>
                                        <?php }
                                    }
                                    if ($type == 'select'){ ?>
                                    </select>
                                </div>
                                <?php } ?>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <?php } ?>
                    <div class="row" style="background: whitesmoke;margin-top: 1px;">
                        <button type="button" class="collapsebtn last" data-toggle="collapse" data-target="#price">
                            السعر: <span class="collapsearrow"></span>
                        </button>
                        <div id="price" class="collapse in">

                            <div class="hpadding20" style="padding: 5px 40px 5px 0px;">
                                <div class="checkbox">
                                    <input type="text" name="price-rang" id="price-rang">
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="row" style="background: #24519d;margin-top: 1px;">
                        <button type="button" class="collapsebtn last" data-toggle="collapse"
                        >
                            الصور: <span class="collapsearrow"></span>
                        </button>
                        <div class="collapse in">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" class="isPhotos" style="right: 35px;" name="isPhotos" value="2" <?php echo is_array($ids) ? in_array('2', $ids) ? 'checked' : '' : ''; ?>>
                                    <span style="padding-right: 65px;">المنشورات المصورة</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <ul class="product-nav" role="tablist">
                <?php if ($this->session->userdata('all')){?>
                    <li role="presentation"><a href="<?php echo base_url();?>?all=false">مشاهدة البعض</a></li>
                <?php }else { ?>
                    <li role="presentation"><a href="<?php echo base_url();?>?all=true"><?php echo $this->lang->line('VIEWALL'); ?></a></li>
                <?php } ?>
            </ul>
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
                    <p class="text-center">هل تريد شراء عقار بسعر مناسب و مواصفات معينه, هل ترغب بيع عقارك دون الحاجة
                        لمكاتب العقارات نحن نقدم لك هذه الخدمات وبسرعة قياسية.</p>
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
                    <p class="text-center">نحن فريق يستطيع تقديم تسويق الكتروني بطريقة حرفية لتأمين جميع متطلباتك وتأمين
                        ما تحتاج دون الذهاب للمكاتب العقارات دون ان تدفع تكاليف إضافيه.</p>
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
<!--		<script type="text/javascript" src="-->
<?php //echo base_url();?><!--public/assetsFile/js/jquery.min.js"></script>-->
<!-- BOOTSTRAP JS -->
<script src="<?php echo base_url(); ?>public/assetsFile/bootstrap/js/bootstrap.min.js"></script>
<!-- PROGRESS JS  -->
<script src="<?php echo base_url(); ?>public/assetsFile/js/jquery.appear.js"></script>
<!-- OWL CAROUSEL JS  -->
<script src="<?php echo base_url(); ?>public/assetsFile/owlcarousel/js/owl.carousel.min.js"></script>
<!-- MIXITUP JS -->
<script src="<?php echo base_url(); ?>public/assetsFile/js/jquery.mixitup.js"></script>
<!-- MAGNIFICANT JS -->
<script src="<?php echo base_url(); ?>public/assetsFile/js/jquery.magnific-popup.min.js"></script>
<!-- STEALLER JS -->
<script src="<?php echo base_url(); ?>public/assetsFile/js/jquery.stellar.min.js"></script>
<!-- YOUTUBE JS -->
<script src="<?php echo base_url(); ?>public/assetsFile/js/jquery.mb.YTPlayer.min.js"></script>
<script type="text/javascript">
    $('.player').mb_YTPlayer();
</script>
<!-- COUNTER UP JS -->
<script src="<?php echo base_url(); ?>public/assetsFile/js/jquery.waypoints.min.js"></script>
<script src="<?php echo base_url(); ?>public/assetsFile/js/jquery.counterup.min.js"></script>
<!-- LIGHTBOX JS -->
<script src="<?php echo base_url(); ?>public/assetsFile/js/lightbox.min.js"></script>
<!-- WOW JS -->
<script src="<?php echo base_url(); ?>public/assetsFile/js/wow.min.js"></script>
<!-- scripts js -->
<script src="<?php echo base_url(); ?>public/assetsFile/js/scripts.js"></script>


<script>
    function GetNewPost(){

    }
    $(document).ready(function () {

        $(document).on('change', '.filters select', function (e) {
            var searchIDs = {};
            var newForm = $('<form>', {
                'action': '<?php echo base_url();?>#products',
                'method': 'POST',
                'id': 'getFilter'
            });
            $(".filters input:checkbox:checked").each(function () {
                if (searchIDs[$(this).attr('class')] == undefined) {
                    searchIDs[$(this).attr('class')] = [];
                }
                searchIDs[$(this).attr('class')].push($(this).val());
                newForm.append($('<input>', {
                    'name': $(this).attr('name'),
                    'value': $(this).val(),
                    'type': 'hidden'
                }));
            });
            $(".filters input:radio:checked").each(function () {
                if (searchIDs[$(this).attr('class')] == undefined) {
                    searchIDs[$(this).attr('class')] = [];
                }
                searchIDs[$(this).attr('class')].push($(this).val());
                newForm.append($('<input>', {
                    'name': $(this).attr('name'),
                    'value': $(this).val(),
                    'type': 'hidden'
                }));
            });
            newForm.append($('<input>', {
                'name': $('#price-rang').attr('name'),
                'value': $('#price-rang').val(),
                'type': 'hidden',
                'id': 'formPriceRang'
            }));
            if ($('.governorates').val() != ''){
                newForm.append($('<input>', {
                    'name': 'governorates',
                    'value': $('.governorates').val(),
                    'type': 'hidden',
                    'id': 'formPriceRang'
                }));
            }


            $('#getFilter').remove();
            $('body').append(newForm);
            $('#getFilter').submit();


        });

        $(document).on('click', '.filters input', function (e) {
            var searchIDs = {};
            var input = '';
            var newForm = $('<form>', {
                'action': '<?php echo base_url();?>#products',
                'method': 'POST',
                'id': 'getFilter'
            });
            $(".filters input:checkbox:checked").each(function () {
                if (searchIDs[$(this).attr('class')] == undefined) {
                    searchIDs[$(this).attr('class')] = [];
                }
                searchIDs[$(this).attr('class')].push($(this).val());
                newForm.append($('<input>', {
                    'name': $(this).attr('name'),
                    'value': $(this).val(),
                    'type': 'hidden'
                }));
            });

            $(".filters input:radio:checked").each(function () {
                if (searchIDs[$(this).attr('class')] == undefined) {
                    searchIDs[$(this).attr('class')] = [];
                }
                searchIDs[$(this).attr('class')].push($(this).val());
                newForm.append($('<input>', {
                    'name': $(this).attr('name'),
                    'value': $(this).val(),
                    'type': 'hidden'
                }));
            });

            newForm.append($('<input>', {
                'name': $('#price-rang').attr('name'),
                'value': $('#price-rang').val(),
                'type': 'hidden',
                'id': 'formPriceRang'
            }));
            if ($('.governorates').val() != ''){
                newForm.append($('<input>', {
                    'name': 'governorates',
                    'value': $('.governorates').val(),
                    'type': 'hidden',
                    'id': 'formPriceRang'
                }));
            }
            $('#getFilter').remove();
            $('body').append(newForm);
            $('#getFilter').submit();
            // newForm.submit();
        });





        var startPrice= "<?php echo $startPrice?>";
        var endPrice = "<?php echo $endPrice?>";
        if (startPrice != '∞'){
            startPrice = parseInt(startPrice);
        }
        if (endPrice != '∞'){
            endPrice = parseInt(endPrice);
        }
        var start = 0;
        var end = 425;
        var values = [
            5000, 6000, 7000, 8000, 9000, 10000, 11000, 12000, 13000, 14000, 15000, 16000, 17000, 18000, 19000, 20000, 21000, 22000, 23000, 24000, 25000, 26000, 27000, 28000, 29000,
            30000, 31000, 32000, 33000, 34000, 35000, 36000, 37000, 38000, 39000, 40000, 41000, 42000, 43000, 44000, 45000, 46000, 47000, 48000, 49000, 50000, 55000, 60000, 65000,
            70000, 75000, 80000, 85000, 90000, 95000, 100000, 110000, 120000, 130000, 140000, 150000, 160000, 170000, 180000, 190000, 200000, 225000, 250000, 275000, 300000,
            325000, 350000, 375000, 400000, 425000, 450000, 475000, 500000, 550000, 600000, 650000, 700000, 750000, 800000, 850000, 900000, 950000, 1000000, 1100000, 1200000, 1300000,
            1400000, 1500000, 1600000, 1700000, 1800000, 1900000, 2000000, 2100000, 2200000, 2300000, 2400000, 2500000, 2600000, 2700000, 2800000, 2900000, 3000000, 3100000, 3200000,
            3300000, 3400000, 3500000, 3600000, 3700000, 3800000, 3900000, 4000000, 4100000, 4200000, 4300000, 4400000, 4500000, 4600000, 4700000, 4800000, 4900000, 5000000, 5100000,
            5200000, 5300000, 5400000, 5500000, 5600000, 5700000, 5800000, 5900000, 6000000, 6100000, 6200000, 6300000, 6400000, 6500000, 6600000, 6700000, 6800000, 6900000, 7000000,
            7100000, 7200000, 7300000, 7400000, 7500000, 7600000, 7700000, 7800000, 7900000, 8000000, 8100000, 8200000, 8300000, 8400000, 8500000, 8600000, 8700000, 8800000, 8900000,
            9000000, 9100000, 9200000, 9300000, 9400000, 9500000, 9600000, 9700000, 9800000, 9900000, 10000000, 11000000, 12000000, 13000000, 14000000, 15000000, 16000000, 17000000,
            18000000, 19000000, 20000000, 21000000, 22000000, 23000000, 24000000, 25000000, 26000000, 27000000, 28000000, 29000000, 30000000, 31000000, 32000000, 33000000, 34000000,
            35000000, 36000000, 37000000, 38000000, 39000000, 40000000, 41000000, 42000000, 43000000, 44000000, 45000000, 46000000, 47000000, 48000000, 49000000, 50000000, 55000000,
            60000000, 65000000, 70000000, 75000000, 80000000, 85000000, 90000000, 95000000, 100000000, 105000000, 110000000, 115000000, 120000000, 125000000, 130000000, 135000000,
            140000000, 145000000, 150000000, 160000000, 161000000, 162000000, 163000000, 164000000, 165000000, 166000000, 167000000, 168000000, 169000000, 170000000, 171000000, 172000000,
            173000000, 174000000, 175000000, 176000000, 177000000, 178000000, 179000000, 180000000, 181000000, 182000000, 183000000, 184000000, 185000000, 186000000, 187000000, 188000000,
            189000000, 190000000, 191000000, 192000000, 193000000, 194000000, 195000000, 196000000, 197000000, 198000000, 199000000, 200000000, 201000000, 202000000, 203000000, 204000000,
            205000000, 206000000, 207000000, 208000000, 209000000, 210000000, 211000000, 212000000, 213000000, 214000000, 215000000, 216000000, 217000000, 218000000, 219000000, 220000000,
            221000000, 222000000, 223000000, 224000000, 225000000, 226000000, 227000000, 228000000, 229000000, 230000000, 231000000, 232000000, 233000000, 234000000, 235000000, 236000000,
            237000000, 238000000, 239000000, 240000000, 241000000, 242000000, 243000000, 244000000, 245000000, 246000000, 247000000, 248000000, 249000000, 250000000, "∞"
        ];
        if (startPrice &&  endPrice){
            $.each(values, function(key, value) {
                if (value == startPrice){
                    start = key;
                }
                if (value == endPrice){
                    end = key;
                }
            });
        }
        $("#Slider1").slider({
            from: 100,
            to: 5000,
            step: 5,
            smooth: true,
            round: 0,
            dimension: "&nbsp;$",
            skin: "round"
        });
        $('#price-rang').ionRangeSlider({
            type: "double",
            skin: "big",
            values: values,
            from: start,
            to: end,
            onStart: function (data) {
                // fired then range slider is ready
            },
            onChange: function (data) {
                // fired on every range slider update
            },
            onFinish: function (data) {
                // fired on pointer release
                console.log($('#formPriceRang').length);
                if  ($('#formPriceRang').length > 0){
                    $('#formPriceRang').remove();
                }
                if ($('#getFilter').length > 0){
                    $('#getFilter').append($('<input>', {
                        'name': $('#price-rang').attr('name'),
                        'value': $('#price-rang').val(),
                        'type': 'hidden',
                        'id': 'formPriceRang'
                    }));
                    $('#getFilter').submit();
                }else {
                    var newForm = $('<form>', {
                        'action': '<?php echo base_url();?>#products',
                        'method': 'POST',
                        'id': 'getFilter'
                    });
                    newForm.append($('<input>', {
                        'name': $('#price-rang').attr('name'),
                        'value': $('#price-rang').val(),
                        'type': 'hidden',
                        'id': 'formPriceRang'
                    }));
                    $('body').append(newForm);
                    $('#getFilter').submit();
                }
            },
            onUpdate: function (data) {
                // fired on changing slider with Update method
            }
        });
    });
</script>
</body>
</html>
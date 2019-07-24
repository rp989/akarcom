<?php
$post1 = $post1[0];
$type = $post1['type']['id'];
$isHome = true;
if ($type == "F03BA431-43A6-40C7-BD10-4FB9B0995A68" || $type == "CE1E1A5D-E4DA-48B1-A6F7-691B5207475F" || $type == "1EDBFAD2-6D05-4BDA-8FD6-AEA14B6B1BF8" || $type == "25600C82-BBC2-486C-926D-5AF03BC3FF68") {
    $isHome = false;
}
?><!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=no">
    <link rel="pingback" href="<?= base_url(); ?>new_public/xmlrpc.php"/>
    <link rel="shortcut icon" href="<?= base_url(); ?>/akarkom.svg"
          type="image/x-icon"/>
    <title>akarcom | عقاركم </title>
    <meta name="description"
          content="
      <?= @$post1['address'] . " " . @$post1['description']; ?>
      التطبيق الأول في سوريا لبيع وشراء العقارات في جميع المحافظات السورية، تعرف على أسعار العقارات من حولك، لتتمكن من معرفة سعر عقارك.
">
    <meta name="keywords"
          content="     <?= @$post1['address'] . " " . @$post1['description']; ?>,سوريا, سورية,عقاركم,عقارات, بيع, شراء, بيوت, منازل, دمشق, حلب, حماه, قامشلي, حمص, ريف دمشق, إدلب، حسكة, قنيطرة, إجار, أجار, اجار, مكاتب, مكاتب عقارية, مكتب, مكتب عقاري, ايداع, محل, شركة, استثمار عقاري, استثمار تجاري, منزل, بيت, فيلات, فيلة, مزرعة, تقسيط, فروغ, بيع وشراء, أرض زراعية, معمل, مصنع, كسوة, كسوة ديلوكس, ملكية, ملّكية, طابو أخضر, طابو, عشوائيات, بيت, استديو, غرفة, اكتتاب, سكن شبابي, هنكار, صناعي, صالة, صالة أفراح, حكم محكمة, كاتب عدل, فروغ, أملاك دولة, زراعي, تجاري, صناعي, سكني, كسوة عادية, على العضم, كسوة جيدة, عقار قديم, عقار جديد, طروطوس اللاذقية, بانياس, مصياف, شاليحات, سياحة, تصييف, أسعار, سعر, متر مربع, صعد, كراج سيارات, حمامات, غرف نوم, صالونات, غرف, دنوم, مشتل, سويدا, درعا, دير الزور, عقارات مشابهة, عقارات للبيع, عقارات للشراء, إعلانات عقارية, مكتب عقاري, شركة هندسية, أملاك عامة,">
    <meta name="author" content="akarcom">
    <meta property="og:image" content="<?= $post1['images'][0] ?>">
    <meta property="og:url" content="<?= base_url('posts/'.$post1['number'])?>">
    <meta property="og:title" content="akarcom | عقاركم <?=$post1['description']?>" />
    <meta property="og:type" content="article" />

    <title>akarcom | عقاركم </title>
    <link rel="stylesheet" href="<?= base_url(); ?>new_public/css/googleapis.css"/>
    <meta name='robots' content='noindex,follow'/>
    <link rel='dns-prefetch' href='//maps-api-ssl.google.com'/>
    <link rel='dns-prefetch' href='//fonts.googleapis.com'/>
    <link rel='stylesheet' id='font-awesome.min-css' href='<?= base_url(); ?>new_public/css/font-awesome.min.css'
          type='text/css' media='all'/>
    <link rel='stylesheet' id='fontello-css' href='<?= base_url(); ?>new_public/css/fontello.min.css' type='text/css'
          media='all'/>
    <link rel='stylesheet' id='wp-block-library-css' href='<?= base_url(); ?>new_public/css/style.min.css'
          type='text/css' media='all'/>
    <link rel='stylesheet' id='rs-plugin-settings-css' href='<?= base_url(); ?>new_public/css/settings-5.4.8.3.css'
          type='text/css' media='all'/>
    <style id='rs-plugin-settings-inline-css' type='text/css'></style>
    <link rel='stylesheet' id='bootstrap.min-css' href='<?= base_url(); ?>new_public/css/bootstrap.min-1.0.css'
          type='text/css' media='all'/>
    <link rel='stylesheet' id='bootstrap-theme.min-css'
          href='<?= base_url(); ?>new_public/css/bootstrap-theme.min-1.0.css' type='text/css' media='all'/>
    <link rel='stylesheet' id='wpestate_style-css' href='<?= base_url(); ?>new_public/css/style-1.0.css' type='text/css'
          media='all'/>
    <link rel='stylesheet' id='wpestate_media-css' href='<?= base_url(); ?>new_public/css/my_media-1.0.css'
          type='text/css' media='all'/>
    <link rel='stylesheet' id='jquery.ui.theme-css' href='<?= base_url(); ?>new_public/css/jquery-ui.min.css'
          type='text/css' media='all'/>
    <link rel='stylesheet' id='js_composer_front-css'
          href='<?= base_url(); ?>new_public/css/js_composer_front_custom-5.7.css' type='text/css' media='all'/>
    <link rel='stylesheet' id='bsf-Defaults-css' href='<?= base_url(); ?>new_public/css/Defaults.css' type='text/css'
          media='all'/>
    <link rel='stylesheet' id='ultimate-style-min-css' href='<?= base_url(); ?>new_public/css/ultimate.min-3.18.0.css'
          type='text/css' media='all'/>
    <script type='text/javascript' src='<?= base_url(); ?>new_public/js/jquery-1.12.4.js'></script>
    <script type='text/javascript' src='<?= base_url(); ?>new_public/js/jquery-migrate.min-1.4.1.js'></script>
    <script type='text/javascript'
            src='<?= base_url(); ?>new_public/js/jquery.themepunch.tools.min-5.4.8.3.js'></script>
    <script type='text/javascript'
            src='<?= base_url(); ?>new_public/js/jquery.themepunch.revolution.min-5.4.8.3.js'></script>
    <script type='text/javascript' src='<?= base_url(); ?>new_public/js/core.min-1.11.4.js'></script>
    <script type='text/javascript' src='<?= base_url(); ?>new_public/js/modernizr.custom.62456-1.0.js'></script>
    <script type='text/javascript' src='<?= base_url(); ?>new_public/js/ultimate.min-3.18.0.js'></script>
    <script type='text/javascript' src='<?= base_url(); ?>new_public/js/ultimate_bg.min.js'></script>


    <link rel="canonical" href="<?= base_url(); ?>new_public/"/>
    <link rel='shortlink' href='<?= base_url(); ?>new_public/'/>
    <link rel='stylesheet' href='<?= base_url(); ?>new_public/css/bootstrapSelect.min.css' type='text/css' media='all'/>

    <link rel="stylesheet" href="<?= base_url('new_public/icheck/skins/all.css') ?>">


</head>
<body class="home page-template-default page page-id-18066 wpb-js-composer js-comp-ver-5.7 vc_responsive">
<div class="mobilewrapper">
    <div class="snap-drawers">
        <div class="snap-drawer snap-drawer-left">
            <div class="mobilemenu-close"><i class="fa fa-times"></i></div>
            <ul id="menu-main-menu" class="mobilex-menu">
                <li id="menu-item-18108"
                    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-home menu-item-18108"><a
                            href="<?= base_url() ?>">صفحة الرئسية</a></li>
                <li id="menu-item-18108"
                    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-home menu-item-18108"><a
                            href="#colophon">تواصل معنا</a></li>

            </ul>
        </div>
    </div>
</div>

<div class="website-wrapper" id="all_wrapper">
    <div class="container   wide has_header_type1 contentheader_center cheader_center " style="margin: 0px">
        <div class="master_header  wide   ">
            <div class="mobile_header">
                <a href="<?= base_url('SignIn') ?>" class="mobile-trigger-user">
                    <?php if (isset($_SESSION['username'])) {
                        ?>
                        <b>أضافة عقار</b>

                        <i class=" fa fa-plus" style="    margin-left: 5px;"></i>

                        <?php
                    } else { ?>
                        <i class=" fa fa-cogs"></i>
                    <?php } ?>


                </a>
                <div class="mobile-trigger"><i class=" fa fa-bars"></i></div>
                <div class="mobile-logo"><a href="<?= base_url() ?>"> <img
                                class="img-responsive retina_ready"
                                src="<?= base_url('akarkom.svg') ?>"
                                alt="image"/> </a></div>
            </div>
            <div class="header_wrapper  header_type1 header_center hover_type_2 header_alignment_text_left ">
                <div class="header_wrapper_inside "
                     data-logo="<?= base_url() ?>"
                     data-sticky-logo="">
                    <div class="logo"><a href="<?= base_url() ?>">
                            <img id="logo_image"
                                 style="margin-top:0px;"
                                 src="<?= base_url('akarkom.svg') ?>"
                                 class="img-responsive retina_ready"
                                 alt="company logo"/> </a>
                    </div>
                    <div class="user_menu user_not_loged" id="user_menu_u"><a class="menu_user_tools dropdown"
                                                                              id="user_menu_trigger"
                                                                              data-toggle="dropdown"> <a
                                    class="navicon-button nav-notlog x">
                                <div class="navicon"></div>
                            </a>
                            <?php
                            if (isset($_SESSION['userId'])) {
                                ?>
                                <a href="<?= base_url('MemberArea') ?>" class=" submit_listing ">
                                    <div class="submit_action"></div>
                                    اضافة منتج</a>
                                <?php
                            } else {
                                ?>
                            <a href="<?= base_url('SignIn') ?>" class=" submit_listing ">
                                    <div class="submit_action"></div>
                                    تسجيل الدخول</a><?php } ?>

                    </div>
                    <nav id="access">
                        <div class="menu-main-menu-container">
                            <ul id="menu-main-menu" class="menu">
                                <li id="menu-item-18108"
                                    class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home no-megamenu   ">
                                    <a class="menu-item-link" href="<?= base_url() ?>">الصفحة الرئيسية</a>
                                </li>
                                <li id="menu-item-18108"
                                    class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home no-megamenu   ">
                                    <a class="menu-item-link" href="#colophon">تواصل معنا</a></li>

                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <div class="header_media with_search_4">
            <div id="gmap_wrapper" class="" data-post_id="18066" data-cur_lat="" data-cur_long="" style="height:450px">
                <div id="googleMap" class=""></div>
                <div class="tooltip"> click to enable zoom</div>
                <div id="gmap-loading">searching...
                    <div class="new_prelader"></div>
                </div>
                <div id="gmap-noresult"> We didn&#039;t find any results</div>
                <div class="gmap-controls  ">

                    <div id="gmap-control"><span id="map-view"><i class="fa fa-picture-o"></i>طريقة العرض</span> <span
                                id="map-view-roadmap" class="map-type">خريطة الطريق</span> <span id="map-view-satellite"
                                                                                                 class="map-type">الأقمار الصناعية</span>
                        <span id="map-view-hybrid" class="map-type">معدلة</span> <span id="map-view-terrain"
                                                                                       class="map-type">تضاريس</span>
                        <span id="geolocation-button"><i class="fa fa-map-marker"></i>عنواني</div>
                    <div id="gmapzoomplus"><i class="fa fa-plus"></i></div>
                    <div id="gmapzoomminus"><i class="fa fa-minus"></i></div>
                </div>
            </div>
        </div>


        <div class="search_wrapper search_wr_4     with_search_on_end  without_search_form_float " id="search_wrapper"
             data-postid="18334">
            <div id="search_wrapper_color"></div>

        </div>
        <div class="container content_wrapper">
            <div class="row">
                <div class="col-xs-12 col-md-12 col-lg-12 breadcrumb_container  "></div>
                <div class=" col-md-12 col-xs-12 col-sm-12 col-lg-12 col-xm-12 col-lg-8 col-lg-offset-2 "><span
                            class="entry-title listing_loader_title">Your search results</span>
                    <div class="spinner" id="listing_loader">
                        <div class="rect1"></div>
                        <div class="rect2"></div>
                        <div class="rect3"></div>
                        <div class="rect4"></div>
                        <div class="rect5"></div>
                    </div>
                    <div id="listing_ajax_container"></div>
                    <h1 class="entry-title entry-prop text-right" style="float: right">

                    </h1>
                    <span
                            class="price_area"
                            style="text-align: right; direction: rtl;float: left">   </span>
                    <div class="single-content listing-content">
                        <div class="notice_area">
                            <div class="property_categs"></div>


                            <div class="download_pdf"></div>
                            <div class="prop_social">
                                <div class="no_views dashboad-tooltip" data-original-title="Number of Page Views"><i
                                            class="fa fa-eye-slash "></i><?= @$post1['p_numOfView'] ?>
                                </div>

                            </div>
                            <div id="carousel-listing" class="carousel slide post-carusel" data-ride="carousel"
                                 data-interval="false">
                                <div class="carousel-inner">
                                    <?php
                                    $i = true;;
                                    foreach ($post1['images'] as $images) {
                                        ?>
                                        <div class="item  <?php if ($i) {
                                            echo 'active';
                                            $i = false;
                                        } ?> "><a
                                                    href="<?= @$images ?>"
                                                    title="" rel="prettyPhoto" class="prettygalery"> <img
                                                        src="<?= @$images ?>"
                                                        data-slider-no="1" alt=""
                                                        class="img-responsive lightbox_trigger"/> </a>
                                        </div>

                                        <?php
                                    }

                                    ?>

                                </div>
                                <div class="carusel-back"></div>
                                <ol class="carousel-indicators">
                                    <?php
                                    $i = 1;;
                                    foreach ($post1['images'] as $images) {
                                        ?>
                                        <li data-target="#carousel-listing" data-slide-to="<?= $i++; ?>" class=" "><img
                                                    src="<?= @$images ?>"
                                                    alt="image"/></li>

                                        <?php
                                    }

                                    ?>


                                </ol>
                                <ol class="carousel-round-indicators">
                                    <?php
                                    $i = 0;;
                                    foreach ($post1['images'] as $images) {
                                        ?>
                                        <li data-target="#carousel-listing" data-slide-to="<?= @$i++; ?>"
                                            class="<?php if ($i == 1) {
                                                echo 'active';
                                            } ?>"></li>

                                        <?php
                                    }

                                    ?>
                                </ol>
                                <div class="caption-wrapper">
                                    <?php
                                    $i = 0;;
                                    foreach ($post1['images'] as $images) {
                                        ?>
                                        <span data-slide-to="<?= @$i++ ?>" class="<?php if ($i == 1) {
                                            echo 'active';
                                        } ?>"></span>

                                        <?php
                                    }

                                    ?>

                                    <div class="caption_control"></div>
                                </div>
                                <a class="left carousel-control" href="#carousel-listing" data-slide="prev"> <i
                                            class="demo-icon icon-left-open-big"></i> </a> <a
                                        class="right carousel-control"
                                        href="#carousel-listing"
                                        data-slide="next"> <i
                                            class="demo-icon icon-right-open-big"></i> </a></div>
                            <div class="panel-group property-panel" style="direction: rtl" id="accordion_prop_details">
                                <div class="panel panel-default">
                                    <div class="panel-heading"><a data-toggle="collapse"
                                                                  data-parent="#accordion_prop_details"
                                                                  href="#collapseOne">
                                            <h4 class="panel-title" id="prop_det" style="direction: rtl">المواصفات</h4>
                                        </a></div>
                                    <div id="collapseOne" class="panel-collapse collapse in" style="direction: rtl">
                                        <div class="panel-body" style="direction: rtl">

                                            <div class="listing_detail col-md-5 col-sm-12 col-lg-5 col-xm-12    ">
                                                    <strong> المساحة:</strong> <?= @$post1['areaSpace'] ?> <b>م
                                                        <sup>2</sup></b></div>



                                            <?php if ($isHome) { ?>
                                                <div class="listing_detail col-md-5 col-sm-12 col-lg-5 col-xm-12 isHome">
                                                     <strong>عدد الغرف: </strong> <?= @$post1['numOfRooms'] ?></div>
                                                <div class="listing_detail col-md-5 col-sm-12 col-lg-5 col-xm-12 isHome">

                                                        <strong> عدد
                                                            الحمامات:</strong> <?= @$post1['numOfBathRooms'] ?>


                                                </div>
                                                <div class="listing_detail col-md-5 col-sm-12 col-lg-5 col-xm-12 isHome">

                                                        <strong> طابق:</strong> <?= @$post1['floor'] ?></div>


                                            <?php } ?>
                                            <div class="listing_detail col-md-5 col-sm-12 col-lg-5 col-xm-12">

                                                    <strong>نوع
                                                        الملكية:</strong> <?= @$post1['typeOfProperty']['name'] ?>

                                            </div>
                                            <div class="listing_detail col-md-5 col-sm-12 col-lg-5 col-xm-12">
                                                <strong>نوع: </strong> <?= @$post1['type']['name'] ?>

                                            </div>
                                            <?php if ($isHome) { ?>
                                                <div class="listing_detail col-md-5 col-sm-12 col-lg-5 col-xm-12 isHome">
                                                    <strong> كسوة: </strong> <?= @$post1['typeOfCladding']['name'] ?>
                                                </div> <?php } ?>
                                            <div class="listing_detail col-md-5 col-sm-12 col-lg-5 col-xm-12"><strong>في
                                                    الصيف:</strong> <?= @$post1['summer'] ?>

                                            </div>
                                            <div class="listing_detail col-md-5 col-sm-12 col-lg-5 col-xm-12">
                                                 <strong>في الشتاء: </strong>
                                                    <?= @$post1['winter'] ?>
                                            </div>
                                            <div class="listing_detail col-md-5 col-sm-12 col-lg-5 col-xm-12 ">

                                                <strong>السعر: </strong>
                                                <?= @$post1['priceOfMeter']; ?>
                                                <?php if ($post1['priceOfMeter'] != 'غير متوفر ' && $post1['priceOfMeter'] != 'غير متوفر') {
                                                    echo 'ليرة سورية';
                                                } ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php if ($isHome) { ?>
                                <div class="panel-group property-panel isHome" id="accordion_prop_features">
                                    <div class="panel panel-default" style="direction: rtl">
                                        <div class="panel-heading">
                                            <a data-toggle="collapse"
                                               data-parent="#accordion_prop_features"
                                               href="#collapseThree"><h4 class="panel-title"
                                                                         id="prop_ame">
                                                    الميزات</h4>
                                            </a>
                                        </div>
                                        <div id="collapseThree" class="panel-collapse collapse in">
                                            <div class="panel-body">
                                                <div class="listing_detail col-md-4"><i
                                                            class="fa fa-<?php if ($post1['parking'] == 'true') echo 'check'; else echo 'remove'; ?>"></i>  كراج
                                                    سيارات
                                                </div>
                                                <div class="listing_detail col-md-4">
                                                    <i
                                                            class="fa fa-<?php if ($post1['interphone'] == 'true') echo 'check'; else echo 'remove'; ?>"></i> انترفون
                                                </div>
                                                <div class="listing_detail col-md-3"><i
                                                            class="fa fa-<?php if ($post1['elevator'] == 'true') echo 'check'; else echo 'remove'; ?>"></i>  مصعد
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <div class="wpestate_property_description" style="direction: rtl;"><h4 class="panel-title">
                                    الوصف</h4>
                                <p style="font-weight: 1000;font-size: larger"><?= @$post1['description'] ?></p></div>
                            <div class="panel-group property-panel" id="accordion_prop_addr" style="direction: rtl;">
                                <div class="panel panel-default" style="direction: rtl;">
                                    <div class="panel-heading" style="direction: rtl;"><a data-toggle="collapse"
                                                                                          data-parent="#accordion_prop_addr"
                                                                                          href="#collapseTwo"><h4
                                                    class="panel-title">
                                                عنوان</h4>
                                        </a></div>
                                    <div id="collapseTwo" class="panel-collapse collapse in">
                                        <div class="panel-body">

                                            <div class="listing_detail col-md-12">
                                                <strong>المحافظة:</strong> <?= @$post1['governorate'] ?></div>
                                            <div class="listing_detail col-md-12">
                                                <strong>عنوان:</strong> <?= @$post1['address'] ?></div>

                                            <div class="listing_detail col-md-12">
                                                <strong>طابو : </strong><?= @$post1['tapu'] ?></div>
                                            <a href="https://www.google.com/maps/dir/<?= $post1['latitude'] ?>,<?= $post1['meridian'] ?>/@<?= $post1['latitude'] ?>,<?= $post1['meridian'] ?>,18z"
                                               target="_blank"
                                               class="acc_google_maps">فتح من خلال google خرائط</a></div>
                                    </div>
                                </div>
                            </div>


                            <script type="text/javascript">/* <![CDATA[ */ //<![CDATA[
                                jQuery(document).ready(function () {
                                    wpestate_show_stat_accordion();
                                });

                                //]]> /* ]]> */</script>
                            <div class="wpestate_agent_details_wrapper">

                                <div class="col-md-12 agent_details" style="direction: rtl">
                                    <div class="mydetails"> للتواصل</div>
                                    <?php if (isset($post1['name'])) { ?>
                                        <div class="agent_detail listing_detail agent_phone_class col-md-12"><i class="fa fa-user"></i><a
                                                    href="<?php $data= $this->db->select('u_id')->get_where('users',array('u_gsm'=>$post1['gsm']))->row();

                                                    ?>"><?= @$post1['name'] ?></a></div><br>
                                    <?php } ?>
                                    <div class="agent_detail listing_detail agent_phone_class col-md-12"><i class="fa fa-phone"></i><a
                                                href="tel:<?= @$post1['gsm'] ?>"><?= @$post1['gsm'] ?></a></div>
                                    <?php
                                    if ((isset($_SESSION['admin']) && $_SESSION['admin'] == 1) || IsMyProduct($post1['id'])) {
                                        ?>
                                        <div class="col-md-3 " style="margin-bottom: 15px">
                                            <a href="<?= base_url('MemberArea/edit_post/' . $post1['id']) ?>"
                                               style="clear: none;    margin-left: -25px;float: left;" class="acc_google_maps"><i
                                                        class="fa fa-edit"></i> تعديل</a>
                                            <a style="clear: none;margin-left: 10px ; background-color: darkred"
                                               href="<?= base_url('MemberArea/change_state/remove/' . $post1['id']) ?>"
                                               class="acc_google_maps"><i class="fa  fa-trash"></i> حذف </a>
                                        </div>
                                        <?php
                                    }

                                    ?>

                                </div>
                            </div>


                            <div class="mylistings">

                                <br>
                                <br>
                                <h3 class="agent_listings_title_similar" style="direction: rtl;margin-right: 10px">
                                    عقارات مشابهة</h3>

                                <?php foreach ($posts as $post2) { ?>
                                    <a href="<?= base_url('posts/' . @$post2['number']) ?>">
                                        <div class="col-md-6 has_prop_slider  listing_wrapper"
                                             style="direction: rtl ;max-height: 500px;min-height: 500px">
                                            <div class="property_listing" style="min-width: 100%;">
                                                <div class="listing-unit-img-wrapper" style="min-width: 100%;">
                                                    <div class="prop_new_details"
                                                         style="direction: rtl">
                                                        <div class="prop_new_details_back"></div>
                                                        <div class="property_media">
                                                            <i class="fa fa-camera"
                                                               aria-hidden="true"></i> <?= @count($post2['images']) ?>
                                                            <i class="fa fa-eye-slash"
                                                               aria-hidden="true"></i> <?= @count($post2['p_numOfView']) ?>
                                                        </div>
                                                        <div class="property_location_image">
                                                            <i class="fa fa-map-marker"></i> <?= @$post2['governorate'] . ',' . @$post2['area'] ?>
                                                        </div>
                                                    </div>
                                                    <div id="property_unit_carousel_<?= @$post2['number'] ?>"
                                                         class="carousel property_unit_carousel slide "
                                                         style="min-width: 100%;"
                                                         data-ride="carousel" data-interval="false">
                                                        <div class="carousel-inner" style="min-width: 100%;">
                                                            <?php
                                                            if (count($post2['images']) == 0) {
                                                                ?>
                                                                <div class="item active"><a
                                                                            href="<?= $url ?>"><img

                                                                                src=""
                                                                                class="lazyload img-responsive wp-post-image"
                                                                                alt=""
                                                                                data-original="<? base_url('posts/' . $post2['number']) ?>"/></a>
                                                                </div>
                                                                <?php
                                                            } else {
                                                                $active = true;
                                                                foreach ($post2['images'] as $image) {

                                                                    if ($active) {
                                                                        $active = false;
                                                                        ?>
                                                                        <div class="item active"><a
                                                                                    href="<?= @base_url('posts/' . $post2['number']) ?>"><img
                                                                                        width="525px"
                                                                                        height="220px"
                                                                                        style="max-height: 220px;min-height: 220px ; max-width:100%; min-width:100%;"
                                                                                        src="<?= @$image ?>"
                                                                                        class="lazyload img-responsive wp-post-image"
                                                                                        alt=""
                                                                                        data-original="<?= @base_url('posts/' . $post2['number']) ?>"/></a>
                                                                        </div>
                                                                    <?php } ?>

                                                                    <div class="item  lazy-load-item"><a
                                                                                href="<?= @$url ?>"><img
                                                                                    width="525px"
                                                                                    height="220px"
                                                                                    style="max-height: 220px;min-height: 220px;max-width:100%;"
                                                                                    data-lazy-load-src="<?= @$image ?>"
                                                                                    class="img-responsive"/></a>
                                                                    </div>
                                                                    <?php
                                                                }
                                                            }


                                                            ?>


                                                        </div>
                                                        <a href="<?= @base_url('posts/' . $post2['number']) ?>"> </a><a
                                                                class="left  carousel-control"
                                                                href="#property_unit_carousel_<?= @$post2['number'] ?>"
                                                                data-slide="prev"> <i
                                                                    class="fa fa-angle-left"></i> </a><a
                                                                class="right  carousel-control"
                                                                href="#property_unit_carousel_<?= @$post2['number'] ?>"
                                                                data-slide="next"> <i
                                                                    class="fa fa-angle-right"></i> </a>
                                                    </div>
                                                    <div class="tag-wrapper">
                                                        <?php if ($post2['type']['id'] != '1EDBFAD2-6D05-4BDA-8FD6-AEA14B6B1BF8') { ?>
                                                            <div class="featured_div"><i
                                                                        class="fa fa-bed"></i>
                                                                : <?= @$post2['numOfRooms'] ?></div>
                                                            <div class="status-wrapper">
                                                                <div class="action_tag_wrapper Sales ">
                                                                    <i
                                                                            class="fa fa-bath"></i>
                                                                    : <?= @$post2['numOfBathRooms'] ?>
                                                                </div>
                                                            </div>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                                <h4 style="direction: rtl">
                                                    <a href="<?= @base_url('posts/' . $post2['id']) ?>">
                                                        <?= @character_limiter($post2['address'], 20) ?> </a>
                                                    <?php


                                                    $Color_ownweship = '';
                                                    if ($post2['ownership'][0]['po_name_ar'] == 'بيع') {
                                                        $Color_ownweship = "#25519d";
                                                    } elseif ($post2['ownership'][0]['po_name_ar'] == 'ايجار') {
                                                        $Color_ownweship = "#2b83c2";
                                                    } elseif ($post2['ownership'][0]['po_name_ar'] == 'استثمار') {
                                                        $Color_ownweship = "#38b4e4";
                                                    } else {
                                                        $Color_ownweship = "#25519d";
                                                    }

                                                    ?>
                                                    <div class="label label-primary"
                                                         style="float: left;background-color: <?= $Color_ownweship ?>">
                                                        <b><?= $post2['ownership'][0]['po_name_ar'] ?></b></div>
                                                </h4>
                                                <div class="listing_unit_price_wrapper" style="    direction: rtl;
    float: right;
    margin-right: 20px; "><?= @$post2['priceOfMeter'] ?> <span
                                                            class="price_label"></span></div>
                                                <div class="listing_details the_grid_view">

                                                    <?= word_limiter($post2['description'], 20); ?>
                                                    <a
                                                            href="<?= @base_url('posts/' . $post2['number']) ?>"
                                                            class="unit_more_x">[المزيد]</a>

                                                </div>


                                                <div class="property_listing_details"><span
                                                    <span class="infosize"
                                                          style="float: left;"><?= @$post2['areaSpace'] ?> متر<sup>2</sup></span>


                                                    <?php if ($post2['active'] == 1) {
                                                        ?>

                                                        <a href="<?= @base_url('posts/' . $post2['number']) ?>"
                                                           class="unit_details_x ">مشاهدة المزيد</a>
                                                        <?php
                                                    } elseif ($post2['active'] == 3) {
                                                        ?>

                                                        <button href="#"
                                                                class="unit_details_x disabled btn-warning">غير
                                                            متوفر
                                                        </button>
                                                        <?php
                                                    } ?>


                                                </div>
                                                <div class="property_location">
                                                    <div class="property_agent_wrapper">

                                                        <a href="<?= @base_url('posts/' . $post2['number']) ?>"><?= @$post2['timestamp'] ?></a>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                <?php } ?>

                            </div>
                        </div>
                    </div>
                    <div class="clearfix visible-xs"></div>

                </div>
            </div>
        </div>
        <footer id="colophon" class="  footer_back_repeat_no  sticky_footer  " style="direction: rtl">
            <div id="footer-widget-area" class="row ">
                <div id="first" class="widget-area col-md-4 ">
                    <ul class="xoxo">
                        <li id="text-17" class="widget-container widget_text"><h3 class="widget-title-footer"> أهلاًً
                                بكم في عقاركم</h3>
                            <div class="textwidget"><p>في عالم الرقميات يكثر التحدي.. وتتضافر التقنيات والخدمات..
                                    معلومات ومعطيات لا ينقصها إلا الفكرة و جودة التنفيذ لتنمو في أرض الابداع وتُثمر من
                                    بعد اجتهاد قصص نجاح مميزة...</p></div>
                        </li>
                    </ul>
                </div>

                <div id="third" class="widget-area col-md-4">
                    <ul class="xoxo">
                        <li id="contact_widget-1" class="widget-container contact_sidebar"><h3
                                    class="widget-title-footer">
                                لاتصال</h3>
                            <div class="contact_sidebar_wrap"><p class="widget_contact_addr"><i
                                            class="fa fa-map-pin"></i>سوريا - دمشق</p>
                                <p class="widget_contact_phone"><i class="fa fa-phone"></i><a
                                            href="tel:0112228873">+963 11 2228873</a></p>
                                <p class="widget_contact_phone"><i class="fa fa-phone"></i><a
                                            href="tel:0941500448 ">+963 941500448 </a></p>
                                <p class="widget_contact_email"><i class="fa fa-envelope-o"></i><a
                                            href="support@akarcom.net"><span
                                                class="__cf_email__"
                                                data-cfemail="email:support@akarcom.app">support@akarcom.app</span></a>
                                </p>

                        </li>
                    </ul>
                </div>
                <div id="fourth" class="widget-area col-md-4">
                    <ul class="xoxo">
                        <li id="social_widget-1" class="widget-container social_sidebar"><h3
                                    class="widget-title-footer">مواقع تواصل الأجتماعي والتطبيقات</h3>
                            <div class="social_sidebar_internal">
                                <a href="https://www.facebook.com/AkarCom-589336564869471" target="_blank"><i
                                            class="fa fa-facebook  fa-fw"></i></a>
                                <a href="" target="_blank" style="display: none"><i
                                            class="fa fa-twitter  fa-fw"></i></a>
                                <a href="https://play.google.com/store/apps/details?id=com.nayotex.technologies.akarcom&fbclid=IwAR1z07k7ud2v9DVZPnGoZ5sFwTNitjjy78FGioguc-tQyWfRSmPkFhvdQfI"
                                   target="_blank"><i class="fa fa-android  fa-fw"></i></a>
                                <a href="#" target="_blank" style="display: none"><i class="fa fa-apple  fa-fw"></i></a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="sub_footer">
                <div class="sub_footer_content "><span
                            class="copyright">حقوق النشر | نايوتكس تكنلوجي . </span>
                    <div class="subfooter_menu">
                        <div class="menu-footer-container">

                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <input type="hidden" id="wpestate_ajax_log_reg" value="88605cfa4d"/>
        <a href="#" class="backtop "><i class="fa fa-chevron-up"></i></a> </a>
        <div class="contactformwrapper hidden">
            <div id="footer-contact-form">
                <div class="contact_close_button"><i class="fa fa-times" aria-hidden="true"></i></div>
                <h4>Contact Us</h4>
                <p>Use the form below to contact us!</p>
                <div class="alert-box error">
                    <div class="alert-message" id="footer_alert-agent-contact"></div>
                </div>
                <input type="text" placeholder="Your Name" required="required" id="foot_contact_name"
                       name="contact_name"
                       class="form-control" value="" tabindex="373"> <input type="email" required="required"
                                                                            placeholder="Your Email"
                                                                            id="foot_contact_email"
                                                                            name="contact_email" class="form-control"
                                                                            value="" tabindex="374"> <input type="email"
                                                                                                            required="required"
                                                                                                            placeholder="Your Phone"
                                                                                                            id="foot_contact_phone"
                                                                                                            name="contact_phone"
                                                                                                            class="form-control"
                                                                                                            value=""
                                                                                                            tabindex="374"><textarea
                        placeholder="Type your message..." required="required" id="foot_contact_content"
                        name="contact_content" class="form-control" tabindex="375"></textarea><input type="hidden"
                                                                                                     name="contact_footer_ajax_nonce"
                                                                                                     id="contact_footer_ajax_nonce"
                                                                                                     value="d8f28dd724"/>
                <div class="btn-cont">
                    <button type="submit" id="btn-cont-submit" class="wpresidence_button">Send</button>
                    <input type="hidden" value="" name="contact_to">
                    <div class="bottom-arrow"></div>
                </div>
            </div>
        </div>

    </div>
    <style>
        .gm-style {
            font: 400 11px Roboto, Arial, sans-serif;
            text-decoration: none;
        }

        .gm-style img {
            max-width: 100%;
        }

        .listing_detail {
            font-size: larger;
            direction: rtl;
            float: right;
            font-weight: 500;
            border-bottom: 1px #f0f0f0  solid;
            padding: 13px;
            margin: 5px;
            /*width: 45%;*/
          /*box-shadow:   inset 2px 0px 0px 0px rgba(0,0,0,0.2), -1px 3px 9px 0 rgba(0,0,0,0.2);*/

        }

        strong {
            font-weight: 1000;
        }

    </style>
    <script type='text/javascript' src='<?= base_url("new_public/js/core.min-1.11.4.js") ?>'></script>
    <script type='text/javascript' src='<?= base_url("new_public/js/widget.min-1.11.4.js") ?>'></script>
    <script type='text/javascript' src='<?= base_url("new_public/js/mouse.min-1.11.4.js") ?>'></script>
    <script type='text/javascript' src='<?= base_url("new_public/js/draggable.min-1.11.4.js") ?>'></script>
    <script type='text/javascript' src='<?= base_url("new_public/js/position.min-1.11.4.js") ?>'></script>
    <script type='text/javascript' src='<?= base_url("new_public/js/menu.min-1.11.4.js") ?>'></script>
    <script type='text/javascript' src='<?= base_url("new_public/js/wp-a11y.min.js") ?>'></script>
    <script type='text/javascript'>/* <![CDATA[ */
        var uiAutocompleteL10n = {
            "noResults": "No results found.",
            "oneResult": "1 result found. Use up and down arrow keys to navigate.",
            "manyResults": "%d results found. Use up and down arrow keys to navigate.",
            "itemSelected": "Item selected."
        }; /* ]]> */</script>
    <script type='text/javascript' src='<?= base_url("new_public/js/autocomplete.min-1.11.4.js") ?>'></script>
    <script type='text/javascript'
            src='<?= base_url("new_public/js/slider.min-1.11.4.js") ?>'></script>
    <script type='text/javascript'
            src='<?= base_url("new_public/js/datepicker.min-1.11.4.js") ?>'></script>
    <script type='text/javascript'>jQuery(document).ready(function (jQuery) {
            jQuery.datepicker.setDefaults({
                "closeText": "Close",
                "currentText": "Today",
                "monthNames": ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
                "monthNamesShort": ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                "nextText": "Next",
                "prevText": "Previous",
                "dayNames": ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
                "dayNamesShort": ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
                "dayNamesMin": ["S", "M", "T", "W", "T", "F", "S"],
                "dateFormat": "MM d, yy",
                "firstDay": 1,
                "isRTL": false
            });
        });</script>
    <script type='text/javascript' src='<?= base_url(); ?>new_public/js/bootstrap.min-1.0.js'></script>
    <script type='text/javascript' src='<?= base_url(); ?>new_public/js/anime.min-1.0.js'></script>
    <script type='text/javascript' src='<?= base_url(); ?>new_public/js/jquery.matchHeight-min-1.0.js'></script>
    <script type='text/javascript' src='<?= base_url(); ?>new_public/js/owl.carousel.min-1.0.js'></script>
    <script type='text/javascript' src='<?= base_url(); ?>new_public/js/jquery.fancybox.pack-1.0.js'></script>
    <script type='text/javascript' src='<?= base_url(); ?>new_public/js/jquery.fancybox-thumbs-1.0.js'></script>
    <script type='text/javascript' src='<?= base_url(); ?>new_public/js/dense.min-1.0.js'></script>
    <script type='text/javascript' src='<?= base_url(); ?>new_public/js/placeholders.min-1.0.js'></script>
    <script type='text/javascript' src='<?= base_url(); ?>new_public/js/jquery.ui.touch-punch.min-1.0.js'></script>
    <script type='text/javascript'
            src='https://maps-api-ssl.google.com/maps/api/js?v=3.35&#038;libraries=places&#038;key=AIzaSyCoB68k4mJsqBcL_GomhhaDHVJhgXfbcik&#038;ver=1.0'></script>
    <script type='text/javascript' src='<?= base_url("new_public/js/infobox.min-1.0.js") ?>'></script>
    <script type='text/javascript' src='<?= base_url("new_public/js/markerclusterer-1.0.js") ?>'></script>
    <script type='text/javascript' src='<?= base_url("new_public/js/oms.min-1.0.js") ?>'></script>
    <script type='text/javascript' src='<?= base_url("new_public/js/wpestate_marker-1.0.js") ?>'></script>
    <script type='text/javascript'>/* <![CDATA[ */
        var mapfunctions_vars = {
            "path": "<?=@base_url('posts/' . $post1['number'] . '')?>",
            "pin_images": "{\"rentals\":\"\",\"sales\":\"\",\"apartments\":\"\",\"condos\":\"\",\"houses\":\"\",\"industrial\":\"\",\"land\":\"\",\"offices\":\"\",\"retail\":\"\",\"villas\":\"\",\"apartmentsrentals\":\"\",\"condosrentals\":\"\",\"housesrentals\":\"\",\"industrialrentals\":\"\",\"landrentals\":\"\",\"officesrentals\":\"\",\"retailrentals\":\"\",\"villasrentals\":\"\",\"apartmentssales\":\"\",\"condossales\":\"\",\"housessales\":\"\",\"industrialsales\":\"\",\"landsales\":\"\",\"officessales\":\"\",\"retailsales\":\"\",\"villassales\":\"\",\"idxpin\":\"\",\"userpin\":\"\"}",
            "geolocation_radius": "5000",
            "adv_search": "4",
            "in_text": "  ",
            "zoom_cluster": "11",
            "user_cluster": "no",
            "open_close_status": "0",
            "open_height": "550",
            "closed_height": "300",
            "generated_pins": "",
            "geo_no_pos": "The browser couldn't detect your position!",
            "geo_no_brow": "Geolocation is not supported by this browser.",
            "geo_message": "m radius",
            "show_adv_search": "",
            "custom_search": "yes",
            "listing_map": "top",
            "slugs": ["custom-id", "adv_categ", "advanced_city", "advanced_area", "min-bedrooms", "min-size", "max-size", "baths", "stories", "property_price"],
            "hows": ["like", "like", "like", "like", "greater", "greater", "smaller", "equal", "like", "greater"],
            "measure_sys": "ft",
            "close_map": "close map",
            "show_g_search_status": "no",
            "slider_price": "yes",
            "slider_price_position": "10",
            "adv_search_type": "4",
            "is_half": "0",
            "map_style": "[\r\n    {\r\n        \"featureType\": \"administrative\",\r\n        \"elementType\": \"all\",\r\n        \"stylers\": [\r\n            {\r\n                \"visibility\": \"on\"\r\n            },\r\n            {\r\n                \"saturation\": -100\r\n            },\r\n            {\r\n                \"lightness\": 20\r\n            }\r\n        ]\r\n    },\r\n    {\r\n        \"featureType\": \"road\",\r\n        \"elementType\": \"all\",\r\n        \"stylers\": [\r\n            {\r\n                \"visibility\": \"on\"\r\n            },\r\n            {\r\n                \"saturation\": -100\r\n            },\r\n            {\r\n                \"lightness\": 40\r\n            }\r\n        ]\r\n    },\r\n    {\r\n        \"featureType\": \"water\",\r\n        \"elementType\": \"all\",\r\n        \"stylers\": [\r\n            {\r\n                \"visibility\": \"on\"\r\n            },\r\n            {\r\n                \"saturation\": -10\r\n            },\r\n            {\r\n                \"lightness\": 30\r\n            }\r\n        ]\r\n    },\r\n    {\r\n        \"featureType\": \"landscape.man_made\",\r\n        \"elementType\": \"all\",\r\n        \"stylers\": [\r\n            {\r\n                \"visibility\": \"simplified\"\r\n            },\r\n            {\r\n                \"saturation\": -60\r\n            },\r\n            {\r\n                \"lightness\": 10\r\n            }\r\n        ]\r\n    },\r\n    {\r\n        \"featureType\": \"landscape.natural\",\r\n        \"elementType\": \"all\",\r\n        \"stylers\": [\r\n            {\r\n                \"visibility\": \"simplified\"\r\n            },\r\n            {\r\n                \"saturation\": -60\r\n            },\r\n            {\r\n                \"lightness\": 60\r\n            }\r\n        ]\r\n    },\r\n    {\r\n        \"featureType\": \"poi\",\r\n        \"elementType\": \"all\",\r\n        \"stylers\": [\r\n            {\r\n                \"visibility\": \"off\"\r\n            },\r\n            {\r\n                \"saturation\": -100\r\n            },\r\n            {\r\n                \"lightness\": 60\r\n            }\r\n        ]\r\n    },\r\n    {\r\n        \"featureType\": \"transit\",\r\n        \"elementType\": \"all\",\r\n        \"stylers\": [\r\n            {\r\n                \"visibility\": \"off\"\r\n            },\r\n            {\r\n                \"saturation\": -100\r\n            },\r\n            {\r\n                \"lightness\": 60\r\n            }\r\n        ]\r\n    }\r\n]\r\n",
            "small_slider_t": "horizontal",
            "is_prop_list": "0",
            "is_tax": "0",
            "half_no_results": "لا يوجد نتائج ",
            "fields_no": "10",
            "type": "ROADMAP",
            "useprice": "yes",
            "use_price_pins_full_price": "no",
            "use_single_image_pin": "no",
            "loading_results": "loading results...",
            "geolocation_type": "2",
            "is_half_map_list": "0",
            "is_normal_map_list": "0",
            "is_adv_search": "0"
        }; /* ]]> */</script>
    <script type='text/javascript'
            src='<?= base_url("new_public/js/mapfunctions-1.0.js") ?>'></script>
    <script type='text/javascript'>/* <![CDATA[ */
        var mapbase_vars = {"wp_estate_kind_of_map": "1", "wp_estate_mapbox_api_key": ""}; /* ]]> */</script>
    <script type='text/javascript'
            src='<?= base_url("new_public/js/maps_base-1.0.js") ?>'></script>
    <script type='text/javascript'>/* <![CDATA[ */
        var googlecode_property_vars = {
            "general_latitude": "41.883511",
            "general_longitude": "-87.688057",
            "path": "<?=base_url('new_public/css/css-images')?>",
            "markers": "[]",
            "camera_angle": "0",
            "idx_status": "0",
            "page_custom_zoom": "16",
            "current_id": "18334",
            "generated_pins": "0",
            "small_map": "0",
            "type": "ROADMAP"
        };
        <?php

        if ($post1['latitude'] == "" || $post1['latitude'] == null) $post1['latitude'] = 35;
        if ($post1['meridian'] == "" || $post1['meridian'] == null) $post1['meridian'] = 38;
        ?>
        var googlecode_property_vars2 = {"markers2": "[[\"<?=@$post1['address']?>\",<?=$post1['latitude']?>,<?=$post1['meridian']?>,5,\"%3Cimg%20width%3D%22400%22%20height%3D%22161%22%20src%3D%22<?=@$post1['images'][0]?>%22%20class%3D%22attachment-property_map1%20size-property_map1%20wp-post-image%22%20alt%3D%22%22%20%2F%3E\",\"%3Cspan%20class%3D%22infocur%20infocur_first%22%3E%3C%2Fspan%3E<?=@$post1['ownership'][0]['po_name_ar']?>%3Cspan%20class%3D%22infocur%22%3E%2F%20<?=@$post1['priceOfMeter']?>\",\"b\",\"a\",\"a\",\"#connect\",18334,\"<?=@$post1['priceOfMeter']?>\",\"1\",\"5\",\"<?=@$post1['areaSpace']?> m<sup>2<\\\/sup>\",\"<?=@word_limiter($post1['description'], 10)?>\",\"\",\"<?=@$post1['timestamp']?>\",\"%3Cimg%20width%3D%22105%22%20height%3D%2270%22%20src%3D%22https%3A%2F%2Fchicago.wpresidence.net%2Fwp-content%2Fuploads%2F2017%2F08%2F9-105x70.jpg%22%20class%3D%22attachment-widget_thumb%20size-widget_thumb%20wp-post-image%22%20alt%3D%22%22%20%2F%3E\"]]"}; /* ]]> */</script>
    <script type='text/javascript'
            src='<?= base_url("new_public/js/google_map_code_listing-1.0.js") ?>'></script>
    <script type='text/javascript'>/* <![CDATA[ */
        var wpestate_property_vars = {
            "singular_label": "[\"05-02-2019\",\"05-04-2019\",\"05-07-2019\",\"05-08-2019\",\"05-09-2019\",\"05-10-2019\",\"05-12-2019\",\"05-13-2019\",\"05-15-2019\",\"05-17-2019\",\"05-18-2019\",\"05-20-2019\",\"05-21-2019\",\"05-23-2019\"]",
            "singular_values": "[1,2,1,1,1,1,1,1,1,1,1,2,2,1]"
        }; /* ]]> */</script>
    <script type='text/javascript'
            src='<?= base_url("new_public/js/property-1.0.js") ?>'></script>
    <script type='text/javascript'>/* <![CDATA[ */
        var control_vars = {
            "morg1": "Amount Financed:",
            "morg2": "Mortgage Payments:",
            "morg3": "Annual cost of Loan:",
            "searchtext": "SEARCH",
            "searchtext2": "Search here...",
            "path": "https:\/\/chicago.wpresidence.net\/wp-content\/themes\/wpresidence",
            "search_room": "Type Bedrooms No.",
            "search_bath": "Type Bathrooms No.",
            "search_min_price": "Type Min. Price",
            "search_max_price": "Type Max. Price",
            "contact_name": "Your Name",
            "contact_email": "Your Email",
            "contact_phone": "Your Phone",
            "contact_comment": "Your Message",
            "zillow_addres": "Your Address",
            "zillow_city": "Your City",
            "zillow_state": "Your State Code (ex CA)",
            "adv_contact_name": "Your Name",
            "adv_email": "Your Email",
            "adv_phone": "Your Phone",
            "adv_comment": "Your Message",
            "adv_search": "Send Message",
            "admin_url": "https:\/\/chicago.wpresidence.net\/wp-admin\/",
            "login_redirect": "https:\/\/chicago.wpresidence.net\/my-profile\/",
            "login_loading": "Sending user info, please wait...",
            "street_view_on": "Street View",
            "street_view_off": "Close Street View",
            "userid": "0",
            "show_adv_search_map_close": "",
            "close_map": "close map",
            "open_map": "open map",
            "fullscreen": "Fullscreen",
            "default": "Default",
            "addprop": "Please wait while we are processing your submission!",
            "deleteconfirm": "Are you sure you wish to delete?",
            "terms_cond": "You need to agree with terms and conditions !",
            "procesing": "Processing...",
            "slider_min": "0",
            "slider_max": "1500000",
            "curency": "$",
            "where_curency": "before",
            "submission_curency": "USD",
            "to": "to",
            "direct_pay": "",
            "send_invoice": "Send me the invoice",
            "direct_title": "Direct payment instructions",
            "direct_thx": "Thank you. Please check your email for payment instructions.",
            "direct_price": "To be paid",
            "price_separator": ",",
            "plan_title": "Plan Title",
            "plan_image": "Plan Image",
            "plan_desc": "Plan Description",
            "plan_size": "Plan Size",
            "plan_rooms": "Plan Rooms",
            "plan_bathrooms": "Plan Bathrooms",
            "plan_price": "Plan Price",
            "readsys": "no",
            "datepick_lang": "en-GB",
            "deleting": "deleting...",
            "save_search": "saving...",
            "captchakey": "",
            "usecaptcha": "no",
            "scroll_trigger": "100",
            "adv6_taxonomy_term": ["35", "38"],
            "adv6_max_price": ["16000", "1500000"],
            "adv6_min_price": ["0", "0"],
            "is_rtl": "0",
            "sticky_footer": "yes",
            "geo_radius_measure": "miles",
            "initial_radius": "12",
            "min_geo_radius": "1",
            "max_geo_radius": "50",
            "stiky_search": "no",
            "posting": "posting",
            "review_posted": "Review Sent ",
            "review_edited": "Review Edit Saved",
            "sticky_bar": ""
        }; /* ]]> */</script>
    <script type='text/javascript' src='<?= base_url(); ?>new_public/js/control-1.0.js'></script>
    <script type='text/javascript'>/* <![CDATA[ */
        var ajaxcalls_vars = {
            "contact_name": "Your Name",
            "contact_email": "Your Email",
            "contact_phone": "Your Phone",
            "contact_comment": "Your Message",
            "adv_contact_name": "Your Name",
            "adv_email": "Your Email",
            "adv_phone": "Your Phone",
            "adv_comment": "Your Message",
            "adv_search": "Send Message",
            "disabled": "Disabled",
            "published": "Published",
            "no_title": "Please, enter property title",
            "admin_url": "https:\/\/chicago.wpresidence.net\/wp-admin\/",
            "login_redirect": "https:\/\/chicago.wpresidence.net\/my-profile\/",
            "login_loading": "Sending user info, please wait...",
            "userid": "0",
            "prop_featured": "Property is featured",
            "no_prop_featured": "You have used all the \"Featured\" listings in your package.",
            "favorite": "favorite",
            "add_favorite": "add to favorites",
            "saving": "saving..",
            "sending": "sending message..",
            "error_field": "Please, enter field:",
            "noimages": "You need to upload at last one image",
            "notitle": "Please, enter property title",
            "paypal": "Connecting to Paypal! Please wait...",
            "stripecancel": "subscription will be cancelled at the end of current period",
            "userpass": "yes",
            "disablelisting": "Disable Listing",
            "enablelisting": "Enable Listing",
            "disableagent": "Disable Agent",
            "enableagent": "Enable Agent",
            "agent_list": "https:\/\/chicago.wpresidence.net\/dashboard-agent-list\/",
            "use_gdpr": "no",
            "gdpr_terms": "You must agree with GDPR terms",
            "delete_account": "Confirm your ACCOUNT DELETION request! Clicking the button below will delete your account and data. This means you will no longer be able to login to your account and access your account information: My Profile, My Properties, Inbox, Saved Searches and Messages. This operation CAN NOT BE REVERSED!"
        }; /* ]]> */</script>
    <script type='text/javascript' src='<?= base_url(); ?>new_public/js/ajaxcalls-1.0.js'></script>
    <script type='text/javascript' src='<?= base_url(); ?>new_public/js/comment-reply.min.js'></script>

</body>
</html>

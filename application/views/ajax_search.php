<div id="lastSearch">
    <?php

    foreach ($posts as $post) {

        $url = "#";
        if ($post['active'] == 1) {
            $url = base_url('posts/' . $post['number']);
        }

        ?>
        <div class="col-md-3 shortcode-col has_prop_slider  "
             style="direction: rtl ;max-height: 500px;min-height: 500px">
            <div class="property_listing" style="min-width: 100%;">
                <div class="listing-unit-img-wrapper"
                     style="min-width: 100%;">
                    <div class="prop_new_details"
                         style="direction: rtl">
                        <div class="prop_new_details_back"></div>
                        <div class="property_media">
                            <?php if ($post['active'] == 1) { ?>
                                <i class="fa fa-camera"
                                   aria-hidden="true"></i><?= @count($post['images']) ?>
                                <i class="fa fa-eye-slash"
                                   aria-hidden="true"></i><?= @$post['numOfView'] ?>
                            <?php } ?>
                        </div>
                        <div class="property_location_image">

                            <i class="fa fa-map-marker"></i><?= @$post['governorate'] ?> <?php if ($post['area'] != '') {
                                echo ',' . $post['area'];
                            } ?>
                        </div>
                    </div>
                    <div id="property_unit_carousel_<?= @$post['id'] ?>"
                         class="carousel property_unit_carousel slide "
                         style="min-width: 100%;"
                         data-ride="carousel" data-interval="false">
                        <div class="carousel-inner"
                             style="min-width: 100%;">
                            <?php
                            if (count($post['images']) == 0) {
                                ?>
                                <div class="item active"><a
                                            href="<?= $url ?>"><img
                                                src=""
                                                class="lazyload img-responsive wp-post-image"
                                                alt=""
                                                data-original="<? $url ?>"/></a>
                                </div>
                                <?php
                            } else {
                                $active = true;
                                foreach ($post['images'] as $image) {

                                    if ($active) {


                                        ?>
                                        <div class="item active"
                                             style="z-index: 0  ;">
                                            <a
                                                    href="<?= $url ?>"><img
                                                        width="525px"
                                                        height="220px"
                                                        style="max-height: 220px;min-height: 220px ; max-width:100%; min-width:100%;"
                                                        src="<?= @$image ?>"
                                                        class="lazyload img-responsive wp-post-image"
                                                        alt=""
                                                        data-original="<?= $url ?>"/></a>
                                        </div>
                                    <?php } ?>
                                    <?php
                                    if ($post['active'] != 1) {
                                        ?>
                                        <img style="position: absolute ;left: 0px; z-index: 3; width: 100% ; height: 100%"
                                             src="<?= base_url() ?><?php
                                             if ($post['ownership'] == 'بيع') echo 'sales.png';
                                             else echo 'sale2.png'
                                             ?>"
                                             alt="">

                                        <?php
                                    }

                                    ?>
                                    <?php if ($post['active'] == 1 && !$active) {
                                        ?>

                                        <div class="item  lazy-load-item"
                                             style="z-index: 0  ;">
                                            <a
                                                    href="<?= $url ?>"><img
                                                        width="525px"
                                                        height="220px"
                                                        style="max-height: 220px;min-height: 220px;max-width:100%;"
                                                        data-lazy-load-src="<?= @$image ?>"
                                                        class="img-responsive"/></a>
                                        </div>
                                        <?php
                                    }
                                    $active = false;

                                }
                            }


                            ?>


                        </div>
                        <a href="<?= $url ?>"> </a>
                        <?php if ($post['active'] == 1) { ?>
                            <a
                                    class="left  carousel-control"
                                    href="#property_unit_carousel_<?= @$post['id'] ?>"
                                    data-slide="prev"> <i
                                        class="fa fa-angle-left"></i>
                            </a>
                            <a
                                    class="right  carousel-control"
                                    href="#property_unit_carousel_<?= @$post['id'] ?>"
                                    data-slide="next"> <i
                                        class="fa fa-angle-right"></i>
                            </a>
                        <?php } ?>
                    </div>
                    <div class="tag-wrapper">
                        <?php if ($post['type']['id'] != '1EDBFAD2-6D05-4BDA-8FD6-AEA14B6B1BF8'
                            && $post['type']['id'] != 'F03BA431-43A6-40C7-BD10-4FB9B0995A68'
                            && $post['type']['id'] != 'CE1E1A5D-E4DA-48B1-A6F7-691B5207475F'
                            && $post['type']['id'] != '25600C82-BBC2-486C-926D-5AF03BC3FF68'
                            && $post['active'] == 1
                        ) { ?>
                            <div class="featured_div"><i
                                        class="fa fa-bed"></i>
                                : <?= @$post['numOfRooms'] ?></div>
                            <div class="status-wrapper">
                                <div class="action_tag_wrapper Sales ">
                                    <i
                                            class="fa fa-bath"></i>
                                    : <?= @$post['numOfBathRooms'] ?>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <h4 style="direction: rtl">
                    <a href="<?= $url ?>">
                        <?= @character_limiter($post['address'], 20) ?> </a>
                    <?php


                    $Color_ownweship = '';
                    if ($post['ownership'] == 'بيع') {
                        $Color_ownweship = "#25519d";
                    } elseif ($post['ownership'] == 'ايجار') {
                        $Color_ownweship = "#2b83c2";
                    } elseif ($post['ownership'] == 'استثمار') {
                        $Color_ownweship = "#38b4e4";
                    } else {
                        $Color_ownweship = "#25519d";
                    }

                    ?>
                    <div class="label label-primary"
                         style="float: left;background-color: <?= $Color_ownweship ?>">
                        <b><?= $post['ownership'] ?></b></div>


                </h4>
                <div class="listing_unit_price_wrapper" style="    direction: rtl;
    float: right;
    margin-right: 20px; ">
                    <?php if ($post['active'] == 1 && $post['priceOfMeter'] != 'غير متوفر') {
                        ?>
                        <?= @$post['priceOfMeter'] ?>
                        ليرة سورية

                        <?php

                    } ?>
                    <span
                            class="price_label"></span></div>
                <div class="listing_details the_grid_view">

                    <?= word_limiter($post['description'], 20); ?>
                    <a
                            href="<?= $url ?>"
                            class="unit_more_x">[المزيد]</a>

                </div>


                <div class="property_listing_details"><span
                    <span class="infosize"
                          style="float: left;"><?= @$post['areaSpace'] ?> متر<sup>2</sup></span>


                    <?php if ($post['active'] == 1) {
                        ?>

                        <a href="<?= $url ?>"
                           class="unit_details_x ">مشاهدة المزيد</a>
                        <?php
                    } elseif ($post['active'] == 3) {
                        ?>

                        <button href="#"
                                class="unit_details_x disabled btn-warning">

                            <?php
                            //                                                                            print_r($post);
                            if ($post['ownership'] == 'بيع') {

                                echo "مباع";
                            } elseif ($post['ownership'] == 'استثمار') {
                                echo "مستثمر";
                            } elseif ($post['ownership'] == 'ايجار') {
                                echo "مؤجر";
                            } else {
                                echo "غير متوفر";
                            }
                            ?>

                        </button>
                        <?php
                    } ?>


                </div>
                <div class="property_location">
                    <div class="property_agent_wrapper">

                        <a href="<?= $url ?>"><?= @$post['timestamp'] ?></a>
                    </div>

                </div>
            </div>
        </div>

        <?php
    }

    ?>
    <div class="listinglink-wrapper_sh_listings">
    <span class="col-sm-12  col-xs-12 col-md-7 col-md-offset-5">
                   <div id='pagination'><?= $pages; ?></div>
        </span>
    </div>

</div>
<script>
    jQuery(document).ready(function () {
        jQuery('#pagination').on('click', 'a', function (e) {

            e.preventDefault();
            jQuery("#lastSearch").html("<div class='col-md-12 text-center'><img src='<?=base_url('search.gif')?>' alt=''></div>");

            var pageno = jQuery(this).attr('data-ci-pagination-page');
            // loadPagination(pageno);
            jQuery.ajax({
                url: "<?=base_url('search/')?>" + pageno,
                mthod: "post",
                datatype: "html",
                success: function (response) {
                    jQuery("#lastSearch").html(response);
                }
            });
        });
    });
</script>
var width, height;
width = jQuery(window).width();
height = jQuery(window).height();
var scroll_trigger = 0;
jQuery(window).scroll(function () {
    "use strict";
    var scroll = jQuery(window).scrollTop();
    if (control_vars.stiky_search === 'yes') {
        wpestate_adv_search_sticky(scroll);
    } else {
        wpestate_header_sticky(scroll);
    }
    if (scroll >= control_vars.scroll_trigger) {
        jQuery('.contact-box').addClass('islive');
        jQuery('.backtop').addClass('islive');
    } else {
        jQuery('.contact-box ').removeClass('islive');
        jQuery('.backtop').removeClass('islive');
        jQuery('.contactformwrapper').addClass('hidden');
    }
    jQuery('.contact_close_button').on('click', function (event) {
        event.preventDefault();
        jQuery('.contactformwrapper').addClass('hidden');
    });
});

function wpestate_adv_search_sticky(scroll) {
    "use strict";
    if (scroll > 20) {
        if (jQuery('.has_header_type4').length <= 0) {
            jQuery(".master_header").hide();
        } else {
            jQuery('.top_bar_wrapper').hide();
        }
    } else {
        jQuery(".master_header,.top_bar_wrapper").show();
    }
    if (wpestate_isScrolledIntoView(scroll) && scroll_trigger === 0) {
        jQuery('#search_wrapper').addClass('sticky_adv');
    }
    if (scroll_trigger !== 0) {
        if (scroll < scroll_trigger) {
            jQuery('#search_wrapper').removeClass('sticky_adv').removeClass('sticky_adv_anime');
        } else {
            jQuery('#search_wrapper').addClass('sticky_adv');
        }
        if (scroll > scroll_trigger - 20) {
            jQuery('#search_wrapper').addClass('sticky_adv_anime');
        }
    }
}

function wpestate_isScrolledIntoView(scroll) {
    "use strict";
    if (jQuery('#search_wrapper').length > 0) {
        var elemTop = parseInt(jQuery('#search_wrapper').offset().top);
        var elemHeight = parseInt(jQuery('#search_wrapper').height());
        elemHeight = 0;
        if ((elemTop + elemHeight + 3) < scroll) {
            return true;
        } else {
            if (scroll_trigger === 0) {
                scroll_trigger = elemTop + elemHeight + 30;
            }
            return false;
        }
    }
}

function isScrolledIntoView(elem) {
    "use strict";
    var docViewTop = jQuery(window).scrollTop();
    var docViewBottom = docViewTop + jQuery(window).height();
    var elemTop = jQuery(elem).offset().top;
    var elemBottom = elemTop + jQuery(elem).height();
    return ((elemBottom <= docViewBottom) && (elemTop >= docViewTop));
}

function wpestate_header_sticky(scroll) {
    "use strict";
    var switch_logo;
    if (scroll >= control_vars.scroll_trigger) {
        if (!Modernizr.mq('only all and (max-width: 1023px)')) {
            jQuery(".master_header").addClass("master_header_sticky");
            jQuery('.logo').addClass('miclogo');
            switch_logo = jQuery('.header_wrapper_inside').attr('data-sticky-logo');
            if (jQuery('.header5_top_row').length > 0) {
                switch_logo = jQuery('.header5_top_row').attr('data-sticky-logo');
            }
            if (wpestate_isRetinaDisplay()) {
                switch_logo = wpestate_Return_retina(switch_logo);
            }
            if (switch_logo !== '') {
                jQuery('#logo_image').attr('src', switch_logo);
            }
            if (!jQuery(".header_wrapper").hasClass('header_type4')) {
                jQuery(".header_wrapper").addClass("navbar-fixed-top");
                jQuery(".header_wrapper").addClass("customnav");
            }
            jQuery('.barlogo').show();
            jQuery('#user_menu_open').hide();
            jQuery('.navicon-button').removeClass('opensvg');
        }
    } else {
        jQuery(".master_header").removeClass("master_header_sticky");
        jQuery(".header_wrapper").removeClass("navbar-fixed-top");
        jQuery(".header_wrapper").removeClass("customnav");
        jQuery('.barlogo').hide();
        jQuery('#user_menu_open').hide();
        jQuery('.logo').removeClass('miclogo');
        switch_logo = jQuery('.header_wrapper_inside').attr('data-sticky-logo');
        if (jQuery('.header5_top_row').length > 0) {
            switch_logo = jQuery('.header5_top_row').attr('data-sticky-logo');
        }
        if (switch_logo !== '') {
            switch_logo = jQuery('.header_wrapper_inside').attr('data-logo');
            if (jQuery('.header5_top_row').length > 0) {
                switch_logo = jQuery('.header5_top_row').attr('data-logo');
            }
            if (wpestate_isRetinaDisplay()) {
                switch_logo = wpestate_Return_retina(switch_logo);
            }
            jQuery('#logo_image').attr('src', switch_logo);
        }
    }
}

function wpestate_Return_retina(switch_logo) {
    "use strict";
    var replacement = '_2x.';
    var return_string = switch_logo.replace(/.([^.]*)$/, replacement + '$1');
    return return_string;
}

function wpestate_isRetinaDisplay() {
    "use strict";
    if (window.matchMedia) {
        var mq = window.matchMedia("only screen and (min--moz-device-pixel-ratio: 1.3), only screen and (-o-min-device-pixel-ratio: 2.6/2), only screen and (-webkit-min-device-pixel-ratio: 1.3), only screen  and (min-device-pixel-ratio: 1.3), only screen and (min-resolution: 1.3dppx)");
        return (mq && mq.matches || (window.devicePixelRatio > 1));
    }
}

jQuery(window).resize(function () {
    "use strict";
    if (jQuery(window).width() != width) {
        jQuery('#mobile_menu').hide('10');
    }
    wpestate_half_map_responsive();
});

function wpestate_half_map_responsive() {
    if (Modernizr.mq('only screen and (min-width: 640px)') && Modernizr.mq('only screen and (max-width: 1025px)')) {
        var half_map_header = jQuery('.master_header ').height();
    }
}

Number.prototype.format = function (n, x) {
    var re = '\\d(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\.' : '$') + ')';
    return this.toFixed(Math.max(0, ~~n)).replace(new RegExp(re, 'g'), '$&' + control_vars.price_separator);
};

function wpestate_element_hide(item) {
    "use strict";
    jQuery(document).on('click', function (event) {
        if (!jQuery(item).is(event.target) && jQuery(item).has(event.target).length === 0) {
            jQuery('#results').fadeOut();
        }
    });
}

wpestate_element_hide('.search_wrapper');

function wpestate_lazy_load_carousel_property_unit() {
    "use strict";
    jQuery('.property_unit_carousel img').each(function (event) {
        var new_source = '';
        new_source = jQuery(this).attr('data-lazy-load-src');
        if (typeof (new_source) !== 'undefined' && new_source !== '') {
            jQuery(this).attr('src', new_source);
        }
    });
}

var widgetId1, widgetId2, widgetId3, widgetId4;
var wpestate_onloadCallback = function () {
    if (document.getElementById('top_register_menu')) {
        widgetId1 = grecaptcha.render('top_register_menu', {'sitekey': control_vars.captchakey, 'theme': 'light'});
    }
    if (document.getElementById('mobile_register_menu')) {
        widgetId2 = grecaptcha.render('mobile_register_menu', {'sitekey': control_vars.captchakey, 'theme': 'light'});
    }
    if (document.getElementById('widget_register_menu')) {
        widgetId3 = grecaptcha.render('widget_register_menu', {'sitekey': control_vars.captchakey, 'theme': 'light'});
    }
    if (document.getElementById('shortcode_register_menu')) {
        widgetId4 = grecaptcha.render('shortcode_register_menu', {
            'sitekey': control_vars.captchakey,
            'theme': 'light'
        });
    }
};
jQuery(document).ready(function ($) {
    "use strict";

    if (jQuery('.wpestate_anime').length > 0) {
        jQuery('.wpestate_anime').each(function () {
            var element_id = $(this).attr('id');
            wpestate_anime('#' + element_id);
            wpestate_property_list_sh('#' + element_id + ' .wpestate_item_list_sh', '#' + element_id + ' .control_tax_sh');
        });
    }
    if (jQuery('#googleMap_shortcode').length > 0) {
        if (jQuery(".single-estate_property").length == 0) {
            wpestate_map_shortcode_function();
        } else {
            if (jQuery("#googleMap").length == 0 && jQuery("#googleMapSlider").length == 0) {
            }
        }
    }
    $('body').on('click', '.add_custom_parameter', function () {
        var cloned = $('.cliche_row').clone();
        cloned.removeClass('cliche_row');
        $('input', cloned).val();
        $('.add_custom_data_cont').append(cloned);
    });
    $('body').on('click', '.remove_parameter_button', function () {
        var pnt = $(this).parents('.single_parameter_row');
        pnt.fadeOut(500, function () {
            pnt.replaceWith('');
        });
    });
    setTimeout(function () {
        $('.property_listing').matchHeight({byRow: true, property: 'height', target: null, remove: false});
    }, 300);
    if (control_vars.sticky_footer === 'yes') {
        var footer_height = jQuery('#colophon').height();
        jQuery('.container.main_wrapper').css('margin-bottom', footer_height);
    }
    if (jQuery('.with_search_on_start').length > 0 && jQuery('.with_search_form_float').length <= 0 && Modernizr.mq('only screen and (min-width: 1023px)')) {
        var header_media_pad = jQuery('.master_header  ').height();
        jQuery('.search_wrapper').css('margin-top', header_media_pad + "px");
        jQuery('.header_media').css('padding-top', "0px");
    }
    var screen_width, screen_height, map_tab;
    $.datepicker.setDefaults($.datepicker.regional[control_vars.datepick_lang]);
    estate_start_lightbox();
    estate_start_lightbox_floorplans();
    estate_sidebar_slider_carousel();
    estate_splash_slider();
    var new_height;
    if ($(".full_screen_yes").length) {
        if (jQuery('.header_transparent').length > 0) {
            new_height = jQuery(window).height();
        } else {
            new_height = jQuery(window).height() - jQuery('.master_header').height();
        }
        if ($('.with_search_on_start').length > 0) {
            new_height = new_height - jQuery('.search_wrapper.with_search_on_start ').height();
        }
        jQuery('.wpestate_header_image,.wpestate_header_video,.theme_slider_wrapper,.theme_slider_classic,.theme_slider_wrapper .item_type2 ').css('height', new_height);
    }
    var handler_top;
    $('.adv_handler').on('click', function (event) {
        event.preventDefault();
        var check_row = $('.adv_search_hidden_fields');
        if ($('#search_wrapper').hasClass('with_search_form_float')) {
            if (!$('#search_wrapper').hasClass('openmore')) {
                check_row.css('display', 'block');
                var height = check_row.height();
                handler_top = parseInt($('#search_wrapper').css('top'));
                var top = parseInt($('#search_wrapper').css('top')) - height;
                check_row.css('display', 'none');
                $('#search_wrapper').animate({'top': top}, {duration: 200, queue: false});
                $('.adv_search_hidden_fields').slideDown({duration: 200, queue: false});
                $('#search_wrapper').addClass('openmore');
            } else {
                $('#search_wrapper').animate({'top': handler_top}, {duration: 200, queue: false});
                $('.adv_search_hidden_fields').slideUp({duration: 200, queue: false});
                $('#search_wrapper').removeClass('openmore');
            }
        } else {
            $('.adv_search_hidden_fields').slideToggle();
        }
    });
    jQuery('.wp-block-residence-gutenberg-block-testimonial-slider').each(function () {
        if (jQuery(this).find('.type_class_3 ').length > 0) {
            jQuery(this).addClass('container_type_3');
        }
    })
    jQuery('#preview_view_all').on('click', function (event) {
        if ((mapfunctions_vars.adv_search_type === '6' || mapfunctions_vars.adv_search_type === '7' || mapfunctions_vars.adv_search_type === '8' || mapfunctions_vars.adv_search_type === '9')) {
            jQuery('.search_wrapper .tab-pane.active .wpresidence_button').trigger('click');
        } else {
            jQuery('.search_wrapper .wpresidence_button').trigger('click');
        }
    });
    $('#open_packages').on('click', function (event) {
        $('.pack_description_row').slideToggle();
        $('.pack-listing:first').find('.buypackage').trigger('click');
    });
    $('.buy_package_sh a').on('click', function (event) {
        if (parseInt(ajaxcalls_vars.userid, 10) === 0) {
            event.preventDefault();
            jQuery('#modal_login_wrapper').show();
            jQuery('#loginpop').val('1');
        }
    });
    $('.theme_slider_2 .prop_new_details ').on('click', function (event) {
        var new_link;
        new_link = $(this).attr('data-href');
        window.open(new_link, '_self', false);
    });
    $('.theme_slider_classic').on('click', function (event) {
        if (event.target == this) {
            var new_link;
            new_link = $(this).attr('data-href');
            window.open(new_link, '_self', false);
        }
    });
    setTimeout(function () {
        wpresidence_list_view_arrange();
    }, 300);
    $('.adv6_tab_head').on('click', function (event) {
        var tab_controls;
        $('.adv_search_tab_item').removeClass('active');
        $(this).parent().addClass('active');
        tab_controls = $(this).attr('aria-controls');
        $('.adv6_price_low').removeClass('price_active');
        $('.adv6_price_max').removeClass('price_active');
        $('#' + tab_controls).find('.adv6_price_low').addClass('price_active');
        $('#' + tab_controls).find('.adv6_price_max').addClass('price_active');
    });
    var mega_menu_width;
    if ($('.header_wrapper').hasClass('header_type2')) {
        mega_menu_width = $('.header_wrapper_inside').width() - 90;
        $('#access ul li.with-megamenu>ul.sub-menu, #access ul li.with-megamenu:hover>ul.sub-menu').css('width', mega_menu_width + 'px');
    }
    if ($('.header_wrapper').hasClass('header_type5')) {
        mega_menu_width = $('.header5_top_row').width();
        $('#access ul li.with-megamenu>ul.sub-menu, #access ul li.with-megamenu:hover>ul.sub-menu').css('width', mega_menu_width + 'px').css('max-width', '1024px');
    }
    map_tab = 0;
    $('#propmaptrigger').on('click', function (event) {
        if (map_tab === 0) {
            wpestate_map_shortcode_function();
            map_tab = 1;
        }
    });
    $('.testimonial-slider-container').each(function () {
        var items = parseInt($(this).attr('data-visible-items'));
        var auto = parseInt($(this).attr('data-auto'));
        if (auto === 0) {
            $(this).slick({
                infinite: true,
                slidesToShow: items,
                slidesToScroll: 1,
                dots: true,
                responsive: [{breakpoint: 1025, settings: {slidesToShow: 1, slidesToScroll: 1}}, {
                    breakpoint: 480,
                    settings: {slidesToShow: 1, slidesToScroll: 1}
                }]
            });
            if (control_vars.is_rtl === '1') {
                $(this).slick('slickSetOption', 'rtl', true, true);
            }
        } else {
            $(this).slick({
                infinite: true,
                slidesToShow: items,
                slidesToScroll: 1,
                dots: true,
                autoplay: true,
                autoplaySpeed: auto,
                responsive: [{breakpoint: 1025, settings: {slidesToShow: 1, slidesToScroll: 1}}, {
                    breakpoint: 480,
                    settings: {slidesToShow: 1, slidesToScroll: 1}
                }]
            });
            if (control_vars.is_rtl === '1') {
                $(this).slick('slickSetOption', 'rtl', true, true);
            }
        }
    });
    $('.theme_slider_2,.property_multi_image_slider').each(function () {
        var items = 3;
        var auto = parseInt($(this).attr('data-auto'));
        if (auto === 0) {
            $(this).slick({
                infinite: true,
                slidesToShow: items,
                slidesToScroll: 1,
                dots: true,
                responsive: [{breakpoint: 1025, settings: {slidesToShow: 2, slidesToScroll: 1}}, {
                    breakpoint: 480,
                    settings: {slidesToShow: 1, slidesToScroll: 1}
                }]
            });
            if (control_vars.is_rtl === '1') {
                $(this).slick('slickSetOption', 'rtl', true, true);
            }
        } else {
            $(this).slick({
                infinite: true,
                slidesToShow: items,
                slidesToScroll: 1,
                dots: true,
                autoplay: true,
                autoplaySpeed: auto,
                responsive: [{breakpoint: 1025, settings: {slidesToShow: 2, slidesToScroll: 1}}, {
                    breakpoint: 480,
                    settings: {slidesToShow: 1, slidesToScroll: 1}
                }]
            });
            if (control_vars.is_rtl === '1') {
                $(this).slick('slickSetOption', 'rtl', true, true);
            }
        }
    });
    $('.shortcode_slider_list').each(function () {
        var items = $(this).attr('data-items-per-row');
        var auto = parseInt($(this).attr('data-auto'));
        var slick;
        if (auto === 0) {
            slick = $(this).slick({
                infinite: true,
                slidesToShow: items,
                slidesToScroll: 1,
                dots: true,
                responsive: [{breakpoint: 1025, settings: {slidesToShow: 2, slidesToScroll: 1}}, {
                    breakpoint: 480,
                    settings: {slidesToShow: 1, slidesToScroll: 1}
                }]
            });
            if (control_vars.is_rtl === '1') {
                $(this).slick('slickSetOption', 'rtl', true, true);
            }
        } else {
            slick = $(this).slick({
                infinite: true,
                slidesToShow: items,
                slidesToScroll: 1,
                dots: true,
                autoplay: true,
                autoplaySpeed: auto,
                responsive: [{breakpoint: 1025, settings: {slidesToShow: 2, slidesToScroll: 1}}, {
                    breakpoint: 480,
                    settings: {slidesToShow: 1, slidesToScroll: 1}
                }]
            });
            if (control_vars.is_rtl === '1') {
                $(this).slick('slickSetOption', 'rtl', true, true);
            }
        }
    });
    $('.slider_container').css('overflow', 'initial');
    $('.estate_places_slider').each(function () {
        var items = $(this).attr('data-items-per-row');
        var auto = parseInt($(this).attr('data-auto'));
        var slick;
        if (auto === 0) {
            slick = $(this).slick({
                infinite: true,
                slidesToShow: items,
                slidesToScroll: 1,
                dots: false,
                responsive: [{breakpoint: 1025, settings: {slidesToShow: 2, slidesToScroll: 1}}, {
                    breakpoint: 480,
                    settings: {slidesToShow: 1, slidesToScroll: 1}
                }]
            });
            if (control_vars.is_rtl === '1') {
                $(this).slick('slickSetOption', 'rtl', true, true);
                $(this).slick('slidesToScroll', '-1');
            }
        } else {
            slick = $(this).slick({
                infinite: true,
                slidesToShow: items,
                slidesToScroll: 1,
                dots: false,
                autoplay: true,
                autoplaySpeed: auto,
                responsive: [{breakpoint: 1025, settings: {slidesToShow: 2, slidesToScroll: 1}}, {
                    breakpoint: 480,
                    settings: {slidesToShow: 1, slidesToScroll: 1}
                }]
            });
            if (control_vars.is_rtl === '1') {
                $(this).slick('slickSetOption', 'rtl', true, true);
            }
        }
    });
    $(window).on("load", function () {
        wpestate_lazy_load_carousel_property_unit();
    });
    wpestate_half_map_responsive();
    $('.show_stats').on('click', function (event) {
        event.preventDefault();
        var parent, listing_id;
        parent = $(this).parent().parent().parent();
        listing_id = $(this).attr('data-listingid');
        if (parent.find('.statistics_wrapper').hasClass('is_slide')) {
            parent.find('.statistics_wrapper').slideUp().removeClass('is_slide');
        } else {
            parent.find('.statistics_wrapper').slideDown().addClass('is_slide');
            wpestate_load_stats(listing_id);
        }
    });
    $('.tabs_stats,#1462452319500-8587db8d-e959,#1462968563400-b8613baa-7092').on('click', function (event) {
        var parent, listing_id;
        listing_id = $(this).attr('data-listingid');
        if (typeof (listing_id) === 'undefined') {
            listing_id = $('.estate_property_first_row').attr('data-prp-listingid');
        }
        wpestate_load_stats_tabs(listing_id);
    });
    $('.retina_ready').dense();
    var image_unnit = $('<div data-1x="' + control_vars.path + '/css/css-images/unit.png" data-2x="' + control_vars.path + '/css/css-images/unit_2x.png" />').dense('getImageAttribute');
    var image_unnit = $('<div data-1x="' + control_vars.path + '/css/css-images/unitshare.png" data-2x="' + control_vars.path + '/css/css-images/unitshare_2x.png" />').dense('getImageAttribute');
    $(function () {
        jQuery("#invoice_start_date,#invoice_end_date").datepicker({dateFormat: "yy-mm-dd",}).datepicker('widget').wrap('<div class="ll-skin-melon"/>');
    });
    $('#invoice_start_date, #invoice_end_date, #invoice_type ,#invoice_status ').on('change', function () {
        wpestate_filter_invoices();
    });
    $('.all-elements').animate({minHeight: 100 + '%'});
    $('.header-tip').addClass('hide-header-tip');
    var vc_size;
    var var_parents = new Array();
    var var_parents_back = new Array();
    $('.mobile-trigger').on('click', function (event) {
        if ($('#all_wrapper').hasClass('moved_mobile')) {
            wpestate_close_mobile_menu();
        } else {
            $('#all_wrapper,#colophon').css('-webkit-transform', 'translate(266px, 0px)');
            $('#all_wrapper,#colophon').css('-moz-transform', 'translate(266px, 0px)');
            $('#all_wrapper,#colophon').css('-ms-transform', 'translate(266px, 0px)');
            $('#all_wrapper,#colophon').css('-o-transform', 'translate(266px, 0px)');
            $('.page-template-property_list_half #all_wrapper').css('height', '100%');
            $('#all_wrapper,#colophon').addClass('moved_mobile');
            $('.mobilewrapper-user').hide();
            $('.mobilewrapper').show();
            $('.mobilewrapper').css('-webkit-transform', 'translate(0px, 0px)');
            $('.mobilewrapper').css('-moz-transform', 'translate(0px, 0px)');
            $('.mobilewrapper').css('-ms-transform', 'translate(0px, 0px)');
            $('.mobilewrapper').css(' -o-transform', 'translate(0px, 0px)');
            $('body').css('overflow-x', 'hidden');
        }
    });
    $('.mobile-trigger-user').on('click', function (event) {
        /*   if ($('#all_wrapper').hasClass('moved_mobile_user')) {
               wpestate_close_mobile_user_menu();
           } else {
               $('#all_wrapper,#colophon').css('-webkit-transform', 'translate(-265px, 0px)');
               $('#all_wrapper,#colophon').css('-moz-transform', 'translate(-265px, 0px)');
               $('#all_wrapper,#colophon').css('-ms-transform', 'translate(-265px, 0px)');
               $('#all_wrapper,#colophon').css('-o-transform', 'translate(-265px, 0px)');
               $('.page-template-property_list_half #all_wrapper').css('height', '100%');
               $('#all_wrapper,#colophon').addClass('moved_mobile_user');
               $('.mobilewrapper-user').show();
               $('.mobilewrapper').hide();
               $('.mobilewrapper-user').css('-webkit-transform', 'translate(0px, 0px)');
               $('.mobilewrapper-user').css('-moz-transform', 'translate(0px, 0px)');
               $('.mobilewrapper-user').css('-ms-transform', 'translate(0px, 0px)');
               $('.mobilewrapper-user').css(' -o-transform', 'translate(0px, 0px)');
               $('#compare_close').trigger('click');
           }*/
    });
    $('.mobilemenu-close-user').on('click', function (event) {
        wpestate_close_mobile_user_menu();
    });
    $('.mobilemenu-close').on('click', function (event) {
        wpestate_close_mobile_menu();
    });

    function wpestate_close_mobile_user_menu() {
        $('#all_wrapper,#colophon').css('-webkit-transform', 'translate(0px, 0px)');
        $('#all_wrappe,#colophonr').css('-moz-transform', 'translate(0px, 0px)');
        $('#all_wrapper,#colophon').css('-ms-transform', 'translate(0px, 0px)');
        $('#all_wrapper,#colophon').css('-o-transform', 'translate(0px, 0px)');
        $('#all_wrapper,#colophon').removeClass('moved_mobile_user');
        setTimeout(function () {
            $('#all_wrapper,#colophon').removeAttr('style');
        }, 200);
        $('.mobilewrapper-user').hide();
        $('.mobilewrapper').hide();
        $('.mobilewrapper-user').css('-webkit-transform', 'translate(265px, 0px)');
        $('.mobilewrapper-user').css('-moz-transform', 'translate(265px, 0px)');
        $('.mobilewrapper-user').css('-ms-transform', 'translate(265px, 0px)');
        $('.mobilewrapper-user').css('-o-transform', 'translate(265px, 0px)');
    }

    function wpestate_close_mobile_menu() {
        $('#all_wrapper,#colophon').css('-webkit-transform', 'translate(0px, 0px)');
        $('#all_wrapper,#colophon').css('-moz-transform', 'translate(0px, 0px)');
        $('#all_wrapper,#colophon').css('-ms-transform', 'translate(0px, 0px)');
        $('#all_wrapper,#colophon').css('-o-transform', 'translate(0px, 0px)');
        setTimeout(function () {
            $('#all_wrapper,#colophon').removeAttr('style');
        }, 200);
        $('#all_wrapper,#colophon').removeClass('moved_mobile');
        $('.mobilewrapper').hide();
        $('.mobilewrapper-user').hide();
        $('.mobilewrapper').css('-webkit-transform', 'translate(-265px, 0px)');
        $('.mobilewrapper').css('-moz-transform', 'translate(-265px, 0px)');
        $('.mobilewrapper').css('-ms-transform', 'translate(-265px, 0px)');
        $('.mobilewrapper').css('-o-transform', 'translate(-265px, 0px)');
    }

    $('#menu-main-menu li').on('click', function (event) {
        event.stopPropagation();
        var selected;
        selected = $(this).find('.sub-menu:first');
        selected.slideToggle();
    });
    $('.list_sidebar_currency li').on('click', function (event) {
        var ajaxurl, data, pos, symbol, coef, curpos, pick;
        data = $(this).attr('data-value');
        pos = $(this).attr('data-pos');
        symbol = $(this).attr('data-symbol');
        coef = $(this).attr('data-coef');
        curpos = $(this).attr('data-curpos');
        var parent_pointer = $(this).parents('.dropdown ');
        pick = $(this).text();
        $('.sidebar_filter_menu', parent_pointer).text(pick).append('<span class="caret caret_sidebar"></span>');
        ajaxurl = ajaxcalls_vars.admin_url + 'admin-ajax.php';
        var nonce = jQuery('#wpestate_change_currency').val();
        jQuery.ajax({
            type: 'POST',
            url: ajaxurl,
            data: {
                'action': 'wpestate_set_cookie_multiple_curr',
                'curr': data,
                'pos': pos,
                'symbol': symbol,
                'coef': coef,
                'curpos': curpos,
                'security': nonce
            },
            success: function (data) {
                location.reload();
            },
            error: function (errorThrown) {
            }
        });
    });
    $('.list_sidebar_measure_unit li').on('click', function (event) {
        var ajaxurl, value, pick;
        value = $(this).attr('data-value');
        var parent_pointer = $(this).parents('.dropdown ');
        pick = $(this).text();
        $('.sidebar_filter_menu', parent_pointer).text(pick).append('<span class="caret caret_sidebar"></span>');
        var nonce = jQuery('#wpestate_change_measure').val();
        ajaxurl = ajaxcalls_vars.admin_url + 'admin-ajax.php';
        jQuery.ajax({
            type: 'POST',
            url: ajaxurl,
            data: {'action': 'wpestate_set_cookie_measure_unit', 'value': value, 'security': nonce},
            success: function (data) {
                location.reload();
            },
            error: function (errorThrown) {
            }
        });
    });
    $('#map-view').on('click', function (event) {
        $('.map-type').fadeIn(400);
    });
    $('.map-type').on('click', function (event) {
        var map_type;
        $('.map-type').hide();
        map_type = $(this).attr('id');
        wpestate_change_map_type(map_type);
    });
    if (typeof wpestate_enable_half_map_pin_action == 'function') {
        wpestate_enable_half_map_pin_action();
    }
    $('.perpack').on('click', function (event) {
        var direct_pay_modal, selected_pack, selected_prop, include_feat, attr;
        selected_prop = $(this).attr('data-listing');
        var price_pack = $(this).parent().parent().find('.submit-price-total').text();
        if (control_vars.where_curency === 'after') {
            price_pack = price_pack + ' ' + control_vars.submission_curency;
        } else {
            price_pack = control_vars.submission_curency + ' ' + price_pack;
        }
        price_pack = control_vars.direct_price + ': ' + price_pack;
        include_feat = ' data-include-feat="0" ';
        $('#send_direct_bill').attr('data-include-feat', 0);
        $('#send_direct_bill').attr('data-listing', selected_prop);
        if ($(this).parent().find('.extra_featured').attr('checked')) {
            include_feat = ' data-include-feat="1" ';
            $('#send_direct_bill').attr('data-include-feat', 1);
        }
        attr = $(this).attr('data-isupgrade');
        if (typeof attr !== typeof undefined && attr !== false) {
            include_feat = ' data-include-feat="1" ';
            $('#send_direct_bill').attr('data-include-feat', 1);
        }
        window.scrollTo(0, 0);
        direct_pay_modal = '<div class="modal fade" id="direct_pay_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"><div class="modal-dialog"><div class="modal-content"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="modal-title">' + control_vars.direct_title + '</h4><div class="modal-body listing-submit"><span class="to_be_paid">' + price_pack + '</span><span>' + control_vars.direct_pay + '</span><div id="send_direct_bill" ' + include_feat + ' data-listing="' + selected_prop + '">' + control_vars.send_invoice + '</div></div></div></div></div></div>';
        jQuery('body').append(direct_pay_modal);
        jQuery('#direct_pay_modal').modal();
        wpestate_enable_direct_pay_perlisting();
        $('#direct_pay_modal').on('hidden.bs.modal', function (e) {
            $('#direct_pay_modal').remove();
        });
    });
    $('#direct_pay').on('click', function (event) {
        var direct_pay_modal, selected_pack, selected_prop, include_feat, attr, price_pack, packName;
        packName = jQuery('.package_selected .pack-listing-title').text();
        selected_pack = jQuery('.package_selected .pack-listing-title').attr('data-packid');
        price_pack = jQuery('.package_selected .pack-listing-title').attr('data-packprice');
        if (control_vars.where_curency === 'after') {
            price_pack = price_pack + ' ' + control_vars.submission_curency;
        } else {
            price_pack = control_vars.submission_curency + ' ' + price_pack;
        }
        price_pack = control_vars.direct_price + ': ' + price_pack;
        if (selected_pack !== '') {
            window.scrollTo(0, 0);
            direct_pay_modal = '<div class="modal fade" id="direct_pay_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"><div class="modal-dialog"><div class="modal-content"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="modal-title">' + control_vars.direct_title + '</h4><div class="modal-body listing-submit"><span class="to_be_paid">' + price_pack + '</span><span>' + control_vars.direct_pay + '</span><div id="send_direct_bill" data-pack="' + selected_pack + '">' + control_vars.send_invoice + '</div></div></div></div></div></div>';
            jQuery('body').append(direct_pay_modal);
            jQuery('#direct_pay_modal').modal();
            wpestate_enable_direct_pay();
        }
        $('#direct_pay_modal').on('hidden.bs.modal', function (e) {
            $('#direct_pay_modal').remove();
        });
    });

    function wpestate_enable_direct_pay_perlisting() {
        jQuery('#send_direct_bill').unbind('click');
        jQuery('#send_direct_bill').on('click', function (event) {
            jQuery('#send_direct_bill').unbind('click');
            var selected_pack, ajaxurl, include_feat;
            selected_pack = jQuery(this).attr('data-listing');
            include_feat = jQuery(this).attr('data-include-feat');
            ajaxurl = ajaxcalls_vars.admin_url + 'admin-ajax.php';
            var nonce = jQuery('#wpresidence_simple_pay_actions_nonce').val();
            jQuery.ajax({
                type: 'POST',
                url: ajaxurl,
                data: {
                    'action': 'wpestate_direct_pay_pack_per_listing',
                    'selected_pack': selected_pack,
                    'include_feat': include_feat,
                    'security': nonce,
                },
                success: function (data) {
                    jQuery('#send_direct_bill').hide();
                    jQuery('#direct_pay_modal .listing-submit span:nth-child(2)').empty().html(control_vars.direct_thx);
                },
                error: function (errorThrown) {
                }
            });
        });
    }

    function wpestate_enable_direct_pay() {
        jQuery('#send_direct_bill').on('click', function (event) {
            jQuery('#send_direct_bill').unbind('click');
            var selected_pack, ajaxurl;
            selected_pack = jQuery(this).attr('data-pack');
            ajaxurl = ajaxcalls_vars.admin_url + 'admin-ajax.php';
            var nonce = jQuery('#wpresidence_simple_pay_actions_nonce').val();
            jQuery.ajax({
                type: 'POST',
                url: ajaxurl,
                data: {'action': 'wpestate_direct_pay_pack', 'selected_pack': selected_pack, 'security': nonce},
                success: function (data) {
                    jQuery('#send_direct_bill').hide();
                    jQuery('#direct_pay_modal .listing-submit span:nth-child(2)').empty().html(control_vars.direct_thx);
                },
                error: function (errorThrown) {
                }
            });
        });
    }

    $('#pack_select').on('change', function () {
        var stripe_pack_id, stripe_ammount, the_pick;
        $("#pack_select option:selected").each(function () {
            stripe_pack_id = $(this).val();
            stripe_ammount = parseFloat($(this).attr('data-price')) * 100;
            the_pick = $(this).attr('data-pick');
        });
        $('#pack_id').val(stripe_pack_id);
        $('#pay_ammout').val(stripe_ammount);
        $('#stripe_form').attr('data-amount', stripe_ammount);
        $('.stripe_buttons').each(function () {
            $(this).hide();
            if ($(this).attr('id') === the_pick) {
                $(this).show();
            }
        });
    });
    $('#pack_recuring').on('click', function (event) {
        if ($(this).attr('checked')) {
            $('#stripe_form').append('<input type="hidden" name="stripe_recuring" id="stripe_recuring" value="1">');
        } else {
            $('#stripe_recuring').remove();
        }
    });
    $('.front_plan_row').on('click', function (event) {
        event.preventDefault();
        $(this).parent().find('.front_plan_row_image').slideUp();
        $(this).next().slideDown();
    });
    $('.deleter_floor').on('click', function (event) {
        $(this).parent().remove();
    });
    var price_low_val = parseInt($('#price_low').val());
    var price_max_val = parseInt($('#price_max').val());

    function wpestate_getCookie(cname) {
        var name = cname + "=";
        var ca = document.cookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') c = c.substring(1);
            if (c.indexOf(name) == 0) return c.substring(name.length, c.length);
        }
        return "";
    }

    var my_custom_curr_symbol = decodeURI(wpestate_getCookie('my_custom_curr_symbol'));
    var my_custom_curr_coef = parseFloat(wpestate_getCookie('my_custom_curr_coef'));
    var my_custom_curr_pos = parseFloat(wpestate_getCookie('my_custom_curr_pos'));
    var my_custom_curr_cur_post = wpestate_getCookie('my_custom_curr_cur_post');
    var slider_counter = 0;
    wpestate_enable_slider('slider_price', 'price_low', 'price_max', 'amount', my_custom_curr_pos, my_custom_curr_symbol, my_custom_curr_cur_post, my_custom_curr_coef);
    $("#slider_price").slider({
        stop: function (event, ui) {
            if (typeof (wpestate_show_pins) !== "undefined") {
                first_time_wpestate_show_inpage_ajax_half = 1;
                wpestate_show_pins();
            }
        }
    });
    wpestate_enable_slider('slider_price_sh', 'price_low_sh', 'price_max_sh', 'amount_sh', my_custom_curr_pos, my_custom_curr_symbol, my_custom_curr_cur_post, my_custom_curr_coef);
    wpestate_enable_slider('slider_price_widget', 'price_low_widget', 'price_max_widget', 'amount_wd', my_custom_curr_pos, my_custom_curr_symbol, my_custom_curr_cur_post, my_custom_curr_coef);
    wpestate_enable_slider('slider_price_mobile', 'price_low_mobile', 'price_max_mobile', 'amount_mobile', my_custom_curr_pos, my_custom_curr_symbol, my_custom_curr_cur_post, my_custom_curr_coef);
    wpestate_enable_slider_radius('wpestate_slider_radius', control_vars.min_geo_radius, control_vars.max_geo_radius, control_vars.initial_radius);
    if (control_vars.adv6_taxonomy_term !== '') {
        control_vars.adv6_taxonomy_term.forEach(wpestate_advtabs_function);
    }

    function wpestate_advtabs_function(item) {
        wpestate_enable_slider_tab(control_vars.adv6_min_price[slider_counter], control_vars.adv6_max_price[slider_counter], 'slider_price_' + item, 'price_low_' + item, 'price_max_' + item, 'amount_' + item, my_custom_curr_pos, my_custom_curr_symbol, my_custom_curr_cur_post, my_custom_curr_coef, control_vars.adv6_min_price[slider_counter], control_vars.adv6_max_price[slider_counter]);
        slider_counter++;
        $('#slider_price_' + item).slider({
            stop: function (event, ui) {
                if (typeof (wpestate_show_pins) !== "undefined") {
                    first_time_wpestate_show_inpage_ajax_half = 1;
                    wpestate_show_pins();
                }
            }
        });
    }

    function wpestate_replace_plus(string) {
        return string.replace("+", " ");
    }

    function wpestate_enable_slider_tab(slider_min, slider_max, slider_name, price_low, price_max, amount, my_custom_curr_pos, my_custom_curr_symbol, my_custom_curr_cur_post, my_custom_curr_coef) {
        "use strict";
        var price_low_val, price_max_val, temp_min, temp_max;
        price_low_val = parseInt(jQuery('#' + price_low).val(), 10);
        price_max_val = parseInt(jQuery('#' + price_max).val(), 10);
        slider_min = parseInt(slider_min, 10);
        slider_max = parseInt(slider_max, 10);
        if (!isNaN(my_custom_curr_pos) && my_custom_curr_pos !== -1) {
            slider_min = slider_min * my_custom_curr_coef;
            slider_max = slider_max * my_custom_curr_coef;
        }
        jQuery("#" + slider_name).slider({
            range: true,
            min: parseFloat(slider_min),
            max: parseFloat(slider_max),
            values: [price_low_val, price_max_val],
            slide: function (event, ui) {
                if (!isNaN(my_custom_curr_pos) && my_custom_curr_pos !== -1) {
                    jQuery("#" + price_low).val(ui.values[0]);
                    jQuery("#" + price_max).val(ui.values[1]);
                    jQuery("#price_low").val(ui.values[0]);
                    jQuery("#price_max").val(ui.values[1]);
                    temp_min = ui.values[0];
                    temp_max = ui.values[1];
                    if (my_custom_curr_cur_post === 'before') {
                        jQuery("#" + amount).text(wpestate_replace_plus(decodeURIComponent(my_custom_curr_symbol)) + " " + temp_min.format() + " " + control_vars.to + " " + wpestate_replace_plus(decodeURIComponent(my_custom_curr_symbol)) + " " + temp_max.format());
                    } else {
                        jQuery("#" + amount).text(temp_min.format() + " " + wpestate_replace_plus(decodeURIComponent(my_custom_curr_symbol)) + " " + control_vars.to + " " + temp_max.format() + " " + wpestate_replace_plus(decodeURIComponent(my_custom_curr_symbol)));
                    }
                } else {
                    jQuery("#" + price_low).val(ui.values[0]);
                    jQuery("#" + price_max).val(ui.values[1]);
                    jQuery("#price_low").val(ui.values[0]);
                    jQuery("#price_max").val(ui.values[1]);
                    if (control_vars.where_curency === 'before') {
                        jQuery("#" + amount).text(wpestate_replace_plus(decodeURIComponent(control_vars.curency)) + " " + ui.values[0].format() + " " + control_vars.to + " " + wpestate_replace_plus(decodeURIComponent(control_vars.curency)) + " " + ui.values[1].format());
                    } else {
                        jQuery("#" + amount).text(ui.values[0].format() + " " + wpestate_replace_plus(decodeURIComponent(control_vars.curency)) + " " + control_vars.to + " " + ui.values[1].format() + " " + wpestate_replace_plus(decodeURIComponent(control_vars.curency)));
                    }
                }
            }
        });
    }

    function wpestate_enable_slider_radius(slider_name, low_val, max_val, now_val) {
        if (jQuery("#" + slider_name).length > 0) {
            jQuery("#" + slider_name).slider({
                range: true,
                min: parseFloat(low_val),
                max: parseFloat(max_val),
                value: parseFloat(now_val),
                range: "max",
                slide: function (event, ui) {
                    jQuery("#geolocation_radius").val(ui.value);
                    jQuery('.radius_value').text(ui.value + " " + control_vars.geo_radius_measure);
                },
                stop: function (event, ui) {
                    if (placeCircle != '') {
                        if (control_vars.geo_radius_measure === 'miles') {
                            placeCircle.setRadius(ui.value * 1609.34);
                        } else {
                            placeCircle.setRadius(ui.value * 1000);
                        }
                        wpestate_show_pins();
                    }
                }
            });
        }
        jQuery("#geolocation_search").on('change', function () {
            if ($(this).val() === '') {
                jQuery('#geolocation_lat').val('');
                jQuery('#geolocation_long').val('');
                if (placeCircle != '') {
                    placeCircle.setMap(null);
                    placeCircle = '';
                }
            }
        });
        if (jQuery("#geolocation_search").length > 0) {
            var input, defaultBounds, autocomplete_normal;
            input = (document.getElementById('geolocation_search'));
            if (parseInt(mapfunctions_vars.geolocation_type) == 1) {
                defaultBounds = new google.maps.LatLngBounds(new google.maps.LatLng(-90, -180), new google.maps.LatLng(90, 180));
                var options = {bounds: defaultBounds, types: ['geocode'],};
                autocomplete_normal = new google.maps.places.Autocomplete(input, options);
                google.maps.event.addListener(autocomplete_normal, 'place_changed', function () {
                    initialGeop = 0;
                    var place = autocomplete_normal.getPlace();
                    var place_lat = place.geometry.location.lat();
                    var place_lng = place.geometry.location.lng();
                    jQuery('#geolocation_lat').val(place_lat);
                    jQuery('#geolocation_long').val(place_lng);
                    if (typeof (wpestate_show_pins) !== "undefined") {
                        first_time_wpestate_show_inpage_ajax_half = 1;
                        wpestate_show_pins();
                    }
                });
            } else if (parseInt(mapfunctions_vars.geolocation_type) == 2) {
                jQuery('#geolocation_search').autocomplete({
                    source: function (request, response) {
                        jQuery.get('https://nominatim.openstreetmap.org/search', {
                            format: 'json',
                            q: request.term,
                        }, function (result) {
                            if (!result.length) {
                                response([{value: '', label: 'there are no results'}]);
                                return;
                            }
                            response(result.map(function (place) {
                                return {
                                    label: place.display_name,
                                    latitude: place.lat,
                                    longitude: place.lon,
                                    value: place.display_name,
                                };
                            }));
                        }, 'json');
                    }, select: function (event, ui) {
                        initialGeop = 0;
                        jQuery('#geolocation_lat').val(ui.item.latitude);
                        jQuery('#geolocation_long').val(ui.item.longitude);
                        if (typeof (wpestate_show_pins) !== "undefined") {
                            first_time_wpestate_show_inpage_ajax_half = 1;
                            wpestate_show_pins();
                        }
                    }
                });
                $('#geolocation_search').attr('autocomplete', 'on');
            }
        }
    }

    function wpestate_enable_slider(slider_name, price_low, price_max, amount, my_custom_curr_pos, my_custom_curr_symbol, my_custom_curr_cur_post, my_custom_curr_coef) {
        var price_low_val, price_max_val, temp_min, temp_max, slider_min, slider_max;
        price_low_val = parseInt(jQuery('#' + price_low).val(), 10);
        price_max_val = parseInt(jQuery('#' + price_max).val(), 10);
        slider_min = control_vars.slider_min;
        slider_max = control_vars.slider_max;
        if (!isNaN(my_custom_curr_pos) && my_custom_curr_pos !== -1) {
            slider_min = slider_min * my_custom_curr_coef;
            slider_max = slider_max * my_custom_curr_coef;
        }
        jQuery("#" + slider_name).slider({
            range: true,
            min: parseFloat(slider_min),
            max: parseFloat(slider_max),
            values: [price_low_val, price_max_val],
            slide: function (event, ui) {
                if (!isNaN(my_custom_curr_pos) && my_custom_curr_pos !== -1) {
                    jQuery("#" + price_low).val(ui.values[0]);
                    jQuery("#" + price_max).val(ui.values[1]);
                    temp_min = ui.values[0];
                    temp_max = ui.values[1];
                    if (my_custom_curr_cur_post === 'before') {
                        jQuery("#" + amount).text(wpestate_replace_plus(decodeURIComponent(my_custom_curr_symbol)) + " " + temp_min.format() + " " + control_vars.to + " " + wpestate_replace_plus(decodeURIComponent(my_custom_curr_symbol)) + " " + temp_max.format());
                    } else {
                        jQuery("#" + amount).text(temp_min.format() + " " + wpestate_replace_plus(decodeURIComponent(my_custom_curr_symbol)) + " " + control_vars.to + " " + temp_max.format() + " " + wpestate_replace_plus(decodeURIComponent(my_custom_curr_symbol)));
                    }
                } else {
                    jQuery("#" + price_low).val(ui.values[0]);
                    jQuery("#" + price_max).val(ui.values[1]);
                    if (control_vars.where_curency === 'before') {
                        jQuery("#" + amount).text(wpestate_replace_plus(decodeURIComponent(control_vars.curency)) + " " + ui.values[0].format() + " " + control_vars.to + " " + wpestate_replace_plus(decodeURIComponent(control_vars.curency)) + " " + ui.values[1].format());
                    } else {
                        jQuery("#" + amount).text(ui.values[0].format() + " " + wpestate_replace_plus(decodeURIComponent(control_vars.curency)) + " " + control_vars.to + " " + ui.values[1].format() + " " + wpestate_replace_plus(decodeURIComponent(control_vars.curency)));
                    }
                }
            }
        });
    }

    $('#print_page').on('click', function (event) {
        var prop_id, myWindow, ajaxurl;
        ajaxurl = control_vars.admin_url + 'admin-ajax.php';
        event.preventDefault();
        prop_id = $(this).attr('data-propid');
        myWindow = window.open('', 'Print Me', 'width=700 ,height=842');
        var nonce = jQuery('#wpestate_ajax_filtering').val();
        $.ajax({
            type: 'POST',
            url: ajaxurl,
            data: {'action': 'wpestate_ajax_create_print', 'propid': prop_id, 'security': nonce},
            success: function (data) {
                myWindow.document.write(data);
                myWindow.document.close();
                myWindow.focus();
                setTimeout(function () {
                    myWindow.print();
                }, 3000);
            },
            error: function (errorThrown) {
            }
        });
    });
    $('#save_search_button').on('click', function (event) {
        var nonce, search, search_name, parent, ajaxurl, meta;
        search_name = jQuery('#search_name').val();
        search = jQuery('#search_args').val();
        meta = jQuery('#meta_args').val();
        nonce = jQuery('#wpestate_save_search_nonce').val();
        ajaxurl = ajaxcalls_vars.admin_url + 'admin-ajax.php';
        jQuery('#save_search_notice').html(control_vars.save_search);
        jQuery.ajax({
            type: 'POST',
            url: ajaxurl,
            data: {
                'action': 'wpestate_save_search_function',
                'search_name': search_name,
                'search': search,
                'meta': meta,
                'security': nonce
            },
            success: function (data) {
                jQuery('#save_search_notice').html(data);
                jQuery('#search_name').val('');
            },
            error: function (errorThrown) {
            }
        });
    });
    $('.delete_search').on('click', function (event) {
        var search_id, parent, ajaxurl, confirmtext;
        confirmtext = control_vars.deleteconfirm;
        if (confirm(confirmtext)) {
            event.preventDefault();
            ajaxurl = ajaxcalls_vars.admin_url + 'admin-ajax.php';
            search_id = $(this).attr('data-searchid');
            parent = $(this).parent();
            $(this).html(control_vars.deleting);
            var nonce = jQuery('#wpestate_searches_actions').val();
            jQuery.ajax({
                type: 'POST',
                url: ajaxurl,
                data: {'action': 'wpestate_delete_search', 'search_id': search_id, 'security': nonce,},
                success: function (data) {
                    if (data === 'deleted') {
                        parent.remove();
                    }
                },
                error: function (errorThrown) {
                }
            });
        }
    });
    var adv_search_top;
    $('.adv_extended_options_text').on('click', function (event) {
        $('.adv-search-1.adv_extended_class').css('height', 'auto');
        $('.adv_extended_class .adv1-holder').css('height', 'auto');
        $(this).parent().find('.adv_extended_options_text').hide();
        var check_row = $(this).parent().find('.extended_search_check_wrapper');
        if ($('#search_wrapper').hasClass('with_search_form_float')) {
            check_row.css('display', 'block');
            var height = check_row.height();
            adv_search_top = parseInt($('#search_wrapper').css('top'));
            var top = parseInt($('#search_wrapper').css('top')) - height;
            check_row.css('display', 'none');
            $('#search_wrapper').animate({'top': top}, {duration: 200, queue: false});
        }
        check_row.slideDown({duration: 200, queue: false});
        $(this).parent().find('.adv_extended_close_button').show();
    });
    $('.adv_extended_close_button').on('click', function (event) {
        $(this).hide();
        $(this).parent().parent().find('.adv_extended_options_text').show();
        $('.adv-search-1.adv_extended_class').removeAttr('style');
        $('.adv_extended_class .adv1-holder').removeAttr('style');
        if ($('#search_wrapper').hasClass('with_search_form_float')) {
            $('#search_wrapper').animate({'top': adv_search_top}, {duration: 200, queue: false});
        }
        $(this).parent().parent().find('.extended_search_check_wrapper').slideUp({duration: 200, queue: false});
    });
    $('#adv_extended_options_text_widget').on('click', function (event) {
        $(this).parent().find('.adv_extended_options_text').hide();
        $(this).parent().find('.extended_search_check_wrapper').slideDown();
        $(this).parent().find('#adv_extended_close_widget').show();
    });
    $('#adv_extended_close_widget').on('click', function (event) {
        $(this).parent().parent().find('.extended_search_check_wrapper').slideUp();
        $(this).hide();
        $(this).parent().parent().find('.adv_extended_options_text').show();
    });
    $('#adv_extended_options_text_short').on('click', function (event) {
        $(this).parent().find('.adv_extended_options_text').hide();
        $(this).parent().find('.extended_search_check_wrapper').slideDown();
        $(this).parent().find('#adv_extended_close_short').show();
    });
    $('#adv_extended_close_short').on('click', function (event) {
        $(this).parent().parent().find('.extended_search_check_wrapper').slideUp();
        $(this).hide();
        $(this).parent().parent().find('.adv_extended_options_text').show();
    });
    $('#adv_extended_options_text_mobile').on('click', function (event) {
        $(this).parent().find('.adv_extended_options_text').hide();
        $(this).parent().find('.extended_search_check_wrapper').slideDown();
        $(this).parent().find('#adv_extended_close_mobile').show();
    });
    $('#adv_extended_close_mobile').on('click', function (event) {
        $(this).parent().parent().find('.extended_search_check_wrapper').slideUp();
        $(this).hide();
        $(this).parent().parent().find('.adv_extended_options_text').show();
    });
    $('#estate-carousel .slider-content h3 a,#estate-carousel .slider-content .read_more ').on('click', function (event) {
        var new_link;
        new_link = $(this).attr('href');
        window.open(new_link, '_self', false);
    });
    wpestate_filter_city_area('filter_city', 'filter_area');
    wpestate_filter_city_area('sidebar-adv-search-city', 'sidebar-adv-search-area');
    wpestate_filter_city_area('adv-search-city', 'adv-search-area');
    wpestate_filter_city_area('half-adv-search-city', 'half-adv-search-area');
    wpestate_filter_city_area('shortcode-adv-search-city', 'shortcode-adv-search-area');
    wpestate_filter_city_area('mobile-adv-search-city', 'mobile-adv-search-area');
    wpestate_filter_county_city('filter_county', 'filter_city');
    wpestate_filter_county_city('sidebar-adv-search-countystate', 'sidebar-adv-search-city');
    wpestate_filter_county_city('adv-search-countystate', 'adv-search-city');
    wpestate_filter_county_city('half-adv-search-countystate', 'half-adv-search-city');
    wpestate_filter_county_city('shortcode-adv-search-countystate', 'shortcode-adv-search-city');
    wpestate_filter_county_city('mobile-adv-search-countystate', 'mobile-adv-search-city');
    var all_browsers_stuff;
    $('#property_city_submit').on('change', function () {
        var city_value, area_value;
        city_value = $(this).val();
        all_browsers_stuff = $('#property_area_submit_hidden').html();
        $('#property_area_submit').empty().append(all_browsers_stuff);
        $('#property_area_submit option').each(function () {
            area_value = $(this).attr('data-parentcity');
            if (city_value === area_value || area_value === 'all') {
            } else {
                $(this).remove();
            }
        });
    });
    $('#property_county').on('change', function () {
        var county_value, city_value;
        county_value = $(this).val();
        all_browsers_stuff = $('#property_city_submit_hidden').html();
        $('#property_city_submit').empty().append(all_browsers_stuff);
        $('#property_city_submit option').each(function () {
            city_value = $(this).attr('data-parentcounty');
            if (county_value === city_value || city_value === 'all') {
            } else {
                $(this).remove();
            }
        });
    });
    $('#adv-search-header-mobile').on('click', function (event) {
        $('#adv-search-mobile').fadeToggle('300');
    });
    $('.nav-prev,.nav-next ').on('click', function (event) {
        event.preventDefault();
        var link = $(this).find('a').attr('href');
        window.open(link, '_self', false);
    });
    $('.featured_agent_details_wrapper, .agent-listing-img-wrapper').on('click', function (event) {
        var newl = $(this).attr('data-link');
        window.open(newl, '_self', false);
    });
    $('.see_my_list_featured').on('click', function (event) {
        event.stopPropagation();
    });
    $('.featured_cover').on('click', function (event) {
        var newl = $(this).attr('data-link');
        window.open(newl, '_self', false);
    });
    $('.agent_face').on('mouseenter', function () {
        $(this).find('.agent_face_details').fadeIn('500');
    }).on('mouseleave', function () {
        $(this).find('.agent_face_details').fadeOut('500');
    });
    $('.property_listing, .places_cover,.agent_unit, .blog_unit , .featured_widget_image').on('click', function (event) {
        var link;
        link = $(this).attr('data-link');
        window.open(link, '_self');
    });
    $('.share_unit').on('click', function (event) {
        event.stopPropagation();
    });
    $('.related_blog_unit_image').on('click', function (event) {
        var link;
        link = $(this).attr('data-related-link');
        window.open(link, '_self');
    });
    wpestate_open_menu();
    jQuery('#login_trigger_modal').on('click', function (event) {
        if (!Modernizr.mq('only all and (max-width: 768px)')) {
            jQuery('#modal_login_wrapper').show();
            jQuery('#loginpop').val('2');
        } else {
            jQuery('.mobile-trigger-user').trigger('click');
            jQuery('#loginpop').val('2');
        }
    });
    $('#user_menu_u.user_not_loged .submit_action').on('click', function (event) {
        jQuery('.login-links').show();
        $('#modal_login_wrapper').show();
    });
    $('#login-modal_close').on('click', function (event) {
        $('#modal_login_wrapper').hide();
    });
    $(document).on('click', function (event) {
        var clicka = event.target.id;
        var clicka2 = $(event.target).attr('share_unit');
        if (!$('#' + clicka).parents('.topmenux').length) {
            $('#user_menu_open').removeClass('iosfixed').hide(400);
            $('.navicon-button').removeClass('opensvg');
            $('#user_menu_u .navicon-button').removeClass('open');
        }
        $('.share_unit').hide();
        if (event.target.id == "header_type3_wrapper" || $(event.target).parents("#header_type3_wrapper").size()) {
        } else {
            var css_right = parseFloat($('.header_type3_menu_sidebar').css('right'));
            var css_left = parseFloat($('.header_type3_menu_sidebar').css('left'));
            if (css_right === 0 || css_left === 0) {
                $('.header_type3_menu_sidebar.header_left.sidebaropen').css("right", "-300px");
                $('.header_type3_menu_sidebar.header_right.sidebaropen').css("left", "-300px");
                $('.container.main_wrapper.has_header_type3').css("padding", "0px");
                $('.master_header').removeAttr('style');
            }
        }
    });
    $('#header_type3_trigger').on('click', function (event) {
        event.preventDefault();
        if (!$('.container').hasClass('is_boxed')) {
            if ($('.header_type3_menu_sidebar').hasClass('header_left')) {
                $(".header_type3_menu_sidebar").css("right", "0px");
                $(".container.main_wrapper ").css("padding-right", "300px");
                $(".master_header").css("right", "150px");
            } else {
                $(".header_type3_menu_sidebar").css("left", "0px");
                $(".container.main_wrapper ").css("padding-left", "300px");
                $(".master_header").css("left", "150px");
            }
            $(".header_type3_menu_sidebar").addClass("sidebaropen");
        } else {
            if ($('.header_type3_menu_sidebar').hasClass('header_left')) {
                $(".header_type3_menu_sidebar").css("right", "0px");
            } else {
                $(".header_type3_menu_sidebar").css("left", "0px");
            }
            $(".header_type3_menu_sidebar").addClass("sidebaropen");
        }
    });
    jQuery('#imagelist i.fa-trash-o').on('click', function (event) {
        var curent = '';
        jQuery(this).parent().remove();
        jQuery('#imagelist .uploaded_images').each(function () {
            curent = curent + ',' + jQuery(this).attr('data-imageid');
        });
        jQuery('#attachid').val(curent);
    });
    jQuery('#imagelist img').dblclick(function () {
        jQuery('#imagelist .uploaded_images .thumber').each(function () {
            jQuery(this).remove();
        });
        jQuery(this).parent().append('<i class="fa thumber fa-star"></i>');
        jQuery('#attachthumb').val(jQuery(this).parent().attr('data-imageid'));
    });
    $('#switch').on('click', function (event) {
        $('.main_wrapper').toggleClass('wide');
    });
    $('#accordion_prop_addr, #accordion_prop_details, #accordion_prop_features').on('shown.bs.collapse', function () {
        $(this).find('h4').removeClass('carusel_closed');
    });
    $('#accordion_prop_addr, #accordion_prop_details, #accordion_prop_features').on('hidden.bs.collapse', function () {
        $(this).find('h4').addClass('carusel_closed');
    });
    var elems = ['.directory_sidebar', '.search_wrapper', '#advanced_search_shortcode', '#advanced_search_shortcode_2', '.adv-search-mobile', '.advanced_search_sidebar'];
    $.each(elems, function (i, elem) {
        $(elem + ' li').on('click', function (event) {
            event.preventDefault();
            var pick, value, parent, parent_replace;
            parent_replace = '.filter_menu_trigger';
            if (elem === '.advanced_search_sidebar' || elem === '.directory_sidebar') {
                parent_replace = '.sidebar_filter_menu';
            }
            pick = $(this).text();
            value = $(this).attr('data-value');
            if ($(this).parent().hasClass('aag_picker')) {
                $('.ag_ag_dev_search_selector').hide();
                $('.selector_for_' + value).fadeIn();
            }
            parent = $(this).parent().parent();
            if (elem === '.directory_sidebar') {
                parent.find(parent_replace).text(pick).append('<span class="caret caret_sidebar"></span>').attr('data-value', value);
            } else {
                parent.find(parent_replace).text(pick).append('<span class="caret caret_filter"></span>').attr('data-value', value);
            }
            parent.find('input').val(value);
        });
    });
    jQuery('.search_wrapper li, .extended_search_check_wrapper input[type="checkbox"]').on('click', function (event) {
        if (typeof (wpestate_show_pins) !== "undefined") {
            first_time_wpestate_show_inpage_ajax_half = 1;
            wpestate_show_pins();
        }
    });
    var typingTimer;
    var doneTypingInterval = 1500;
    var $input = $('#adv_location,.search_wrapper input[type=text]');
    $input.on('keyup', function () {
        if (jQuery(this).attr('id') == 'geolocation_search' || jQuery(this).attr('id') == 'geolocation_search2') {
            return;
        }
        clearTimeout(typingTimer);
        typingTimer = setTimeout(wpestate_done_typing, doneTypingInterval);
    });
    $input.on('keydown', function () {
        clearTimeout(typingTimer);
    });

    function wpestate_done_typing() {
        if (typeof (wpestate_show_pins) !== "undefined") {
            first_time_wpestate_show_inpage_ajax_half = 1;
            wpestate_show_pins();
        }
    }

    function isFunction(possibleFunction) {
        return typeof (possibleFunction) === typeof (Function);
    }

    $('#openmap').on('click', function (event) {
        if ($(this).find('i').hasClass('fa-angle-down')) {
            $(this).empty().append('<i class="fa fa-angle-up"></i>' + control_vars.close_map);
            if (control_vars.show_adv_search_map_close === 'no') {
                $('.search_wrapper').addClass('adv1_close');
                wpestate_adv_search_click();
            }
        } else {
            $(this).empty().append('<i class="fa fa-angle-down"></i>' + control_vars.open_map);
        }
        wpestate_new_open_close_map(2);
    });
    var wrap_h;
    var map_h;
    $('#gmap-full').on('click', function (event) {
        if ($('#gmap_wrapper').hasClass('fullmap')) {
            $('#google_map_prop_list_wrapper').removeClass('fullhalf');
            $('#gmap_wrapper').removeClass('fullmap').css('height', wrap_h + 'px');
            $('#googleMap').removeClass('fullmap').css('height', map_h + 'px');
            $('.master_header ').removeClass('header_full_map');
            $('#search_wrapper').removeClass('fullscreen_search');
            $('#search_wrapper').removeClass('fullscreen_search_open');
            $('.nav_wrapper').removeClass('hidden');
            if (!$('#google_map_prop_list_wrapper').length) {
                $('.content_wrapper').show();
            }
            $('body,html').animate({scrollTop: 0}, "slow");
            $('#openmap').show();
            $(this).empty().append('<i class="fa fa-arrows-alt"></i>' + control_vars.fullscreen).removeClass('spanselected');
            $('#google_map_prop_list_wrapper').removeClass('fullscreen');
            $('#google_map_prop_list_sidebar').removeClass('fullscreen');
        } else {
            $('#gmap_wrapper,#googleMap').css('height', '100%').addClass('fullmap');
            $('#google_map_prop_list_wrapper').addClass('fullscreen');
            $('#google_map_prop_list_sidebar').addClass('fullscreen');
            $('#google_map_prop_list_wrapper').addClass('fullhalf');
            wrap_h = $('#gmap_wrapper').outerHeight();
            map_h = $('#googleMap').outerHeight();
            $('.master_header ').addClass('header_full_map');
            $('#search_wrapper').addClass('fullscreen_search');
            $('.nav_wrapper').addClass('hidden');
            if (!$('#google_map_prop_list_wrapper').length) {
                $('.content_wrapper').hide();
            }
            $('#openmap').hide();
            $(this).empty().append('<i class="fa fa-square-o"></i>' + control_vars.default).addClass('spanselected');
        }
        wpresidence_map_resise();
    });
    $('#street-view').on('click', function (event) {
        wpestate_toggleStreetView();
    });
    $('#slider_enable_map').on('click', function (event) {
        var cur_lat, cur_long, myLatLng;
        $('#carousel-listing div').removeClass('slideron');
        $('.vertical-wrapper,.verticalstatus,.carusel-back,.carousel-round-indicators,.caption-wrapper,.carousel-indicators ').hide();
        $(this).addClass('slideron');
        $('#googleMapSlider').show();
        if (wp_estate_kind_of_map === 1) {
            google.maps.event.trigger(map, "resize");
        } else {
            setTimeout(function () {
                map.invalidateSize();
            }, 600);
        }
        cur_lat = jQuery('#googleMapSlider').attr('data-cur_lat');
        cur_long = jQuery('#googleMapSlider').attr('data-cur_long');
        if (wp_estate_kind_of_map === 1) {
            map.setOptions({draggable: true});
            myLatLng = new google.maps.LatLng(cur_lat, cur_long);
            map.setCenter(myLatLng);
            map.panBy(10, -100);
            panorama.setVisible(false);
        }
        $('#gmapzoomminus.smallslidecontrol').show();
        $('#gmapzoomplus.smallslidecontrol').show();
        $('#carousel-listing .google_map_poi_marker').show();
    });
    $('#slider_enable_street').on('click', function (event) {
        var cur_lat, cur_long, myLatLng;
        $('#carousel-listing div').removeClass('slideron');
        $('.vertical-wrapper,.verticalstatus ').hide();
        $('.carusel-back,.carousel-round-indicators,.caption-wrapper,.carousel-indicators ').hide();
        $(this).addClass('slideron');
        cur_lat = jQuery('#googleMapSlider').attr('data-cur_lat');
        cur_long = jQuery('#googleMapSlider').attr('data-cur_long');
        myLatLng = new google.maps.LatLng(cur_lat, cur_long);
        $('#googleMapSlider').show();
        panorama.setPosition(myLatLng);
        panorama.setVisible(true);
        $('#gmapzoomminus.smallslidecontrol,#carousel-listing .google_map_poi_marker').hide();
        $('#gmapzoomplus.smallslidecontrol').hide();
    });
    $('#slider_enable_slider').on('click', function (event) {
        $('#gmapzoomminus.smallslidecontrol').hide();
        $('#gmapzoomplus.smallslidecontrol').hide();
        $('#carousel-listing div').removeClass('slideron');
        $(this).addClass('slideron');
        $('.vertical-wrapper,.verticalstatus ').show();
        $('.carusel-back,.carousel-round-indicators,.caption-wrapper,.carousel-indicators ').show();
        $('#googleMapSlider').hide();
        panorama.setVisible(false);
        $('#gmapzoomminus.smallslidecontrol,#carousel-listing .google_map_poi_marker').hide();
        $('#gmapzoomplus.smallslidecontrol').hide();
    });
    $('.caption-wrapper').on('click', function (event) {
        $(this).toggleClass('closed');
        $('.carusel-back').toggleClass('rowclosed');
        $('.post-carusel .carousel-indicators').toggleClass('rowclosed');
    });
    $('#carousel-listing').on('slid.bs.carousel', function () {
        if ($(this).hasClass('carouselvertical')) {
            wpestate_show_capture_vertical();
        } else {
            wpestate_show_capture();
        }
        $('#carousel-listing div').removeClass('slideron');
        $('#slider_enable_slider').addClass('slideron');
    });
    $('.carousel-round-indicators li').on('click', function (event) {
        $('.carousel-round-indicators li').removeClass('active');
        $(this).addClass('active');
    });
    $('.videoitem iframe').on('click', function (event) {
        $('.estate_video_control').remove();
    });
    wpestate_adv_search_click();
    $(".share_list, .icon-fav, .compare-action, .dashboad-tooltip,#slider_enable_map ,#slider_enable_slider,#slider_enable_street,#slider_enable_street_sh").on({
        mouseenter: function () {
            $(this).tooltip('show');
        }, mouseleave: function () {
            $(this).tooltip('hide');
        }
    });
    $('.share_list').on('click', function (event) {
        event.stopPropagation();
        var sharediv = $(this).parent().find('.share_unit');
        sharediv.toggle();
        $(this).toggleClass('share_on');
    });
    $('.backtop').on('click', function (event) {
        event.preventDefault();
        $('body,html').animate({scrollTop: 0}, "slow");
    });
    $('.contact-box ').on('click', function (event) {
        event.preventDefault();
        $('.contactformwrapper').toggleClass('hidden');
        wpestate_contact_footer_starter();
    });
    $('#morg_compute').on('click', function (event) {
        var intPayPer = 0;
        var intMthPay = 0;
        var intMthInt = 0;
        var intPerFin = 0;
        var intAmtFin = 0;
        var intIntRate = 0;
        var intAnnCost = 0;
        var intVal = 0;
        var salePrice = 0;
        salePrice = $('#sale_price').val();
        intPerFin = $('#percent_down').val() / 100;
        intAmtFin = salePrice - salePrice * intPerFin;
        intPayPer = parseInt($('#term_years').val(), 10) * 12;
        intIntRate = parseFloat($('#interest_rate').val(), 10);
        intMthInt = intIntRate / (12 * 100);
        intVal = wpestate_raisePower(1 + intMthInt, -intPayPer);
        intMthPay = intAmtFin * (intMthInt / (1 - intVal));
        intAnnCost = intMthPay * 12;
        $('#am_fin').html("<strong>" + control_vars.morg1 + "</strong><br> " + (Math.round(intAmtFin * 100)) / 100 + " ");
        $('#morgage_pay').html("<strong>" + control_vars.morg2 + "</strong><br> " + (Math.round(intMthPay * 100)) / 100 + " ");
        $('#anual_pay').html("<strong>" + control_vars.morg3 + "</strong><br> " + (Math.round(intAnnCost * 100)) / 100 + " ");
        $('#morg_results').show();
        $('.mortgage_calculator_div').css('height', 532 + 'px');
    });
    $('#searchform input').focus(function () {
        $(this).val('');
    }).blur(function () {
    });
    $('.extra_featured').on('change', function () {
        var parent = $(this).parent().parent();
        var price_regular = parseFloat(parent.find('.submit-price-no').text(), 10);
        var price_featured = parseFloat(parent.find('.submit-price-featured').text(), 10);
        var total = price_regular + price_featured;
        if ($(this).is(':checked')) {
            parent.find('.submit-price-total').text(total);
            parent.find('.stripe_form_featured').show();
            parent.find('.stripe_form_simple').hide();
        } else {
            parent.find('.submit-price-total').text(price_regular);
            parent.find('.stripe_form_featured').hide();
            parent.find('.stripe_form_simple').show();
        }
    });
    $('.compare_wrapper').each(function () {
        var cols = $(this).find('.compare_item_head').length;
        $(this).addClass('compar-' + cols);
    });
    $('.col-md-12.listing_wrapper .property_unit_custom_element.image').each(function () {
        $(this).parent().addClass('wrap_custom_image');
    });
    $('#list_view').on('click', function (event) {
        $(this).toggleClass('icon_selected');
        $('#listing_ajax_container').addClass('ajax12');
        $('#grid_view').toggleClass('icon_selected');
        $('#listing_ajax_container .listing_wrapper').hide().removeClass('col-md-4').removeClass('col-md-3').addClass('col-md-12').fadeIn(400);
        $('.the_grid_view').fadeOut(10, function () {
            $('.the_list_view:not(.half_map_list_view)').fadeIn(300);
        });
        $('#listing_ajax_container .col-md-12.listing_wrapper .property_unit_custom_element.image').each(function () {
            $(this).parent().addClass('wrap_custom_image');
        });
        jQuery('.listing_wrapper.col-md-12  > .property_listing').matchHeight();
        wpresidence_list_view_arrange();
    });
    $('#grid_view').on('click', function (event) {
        var class_type;
        class_type = $('#listing_ajax_container .listing_wrapper:first-of-type').attr('data-org');
        $(this).toggleClass('icon_selected');
        $('#listing_ajax_container').removeClass('ajax12');
        $('#list_view').toggleClass('icon_selected');
        $('#listing_ajax_container .listing_wrapper ').hide().removeClass('col-md-12').addClass('col-md-' + class_type).fadeIn(400);
        $('#listing_ajax_container .the_list_view').fadeOut(10, function () {
            $('.the_grid_view').fadeIn(300);
        });
        $('#listing_ajax_container .wrap_custom_image').each(function () {
            $(this).removeClass('wrap_custom_image');
            jQuery('.property_listing_custom_design').css('padding-left', '0px');
        });
        setTimeout(function () {
            jQuery('.property_listing').matchHeight();
        }, 300);
    });

    function wpresidence_list_view_arrange() {
        var wrap_image = parseInt(jQuery('.wrap_custom_image').width());
        if (wrap_image != 0) {
            jQuery('.col-md-12>.property_listing_custom_design').css('padding-left', wrap_image);
        }
    }

    var already_in = [];
    $('#compare_close').on('click', function (event) {
        $('.prop-compare').animate({right: "-240px"});
    });
    $('.compare-action').on('click', function (e) {
        e.preventDefault();
        e.stopPropagation();
        $('.prop-compare').animate({right: "0px"});
        var post_id = $(this).attr('data-pid');
        for (var i = 0; i < already_in.length; i++) {
            if (already_in[i] === post_id) {
                return;
            }
        }
        already_in.push(post_id);
        var post_image = $(this).attr('data-pimage');
        var to_add = '<div class="items_compare" style="display:none;"><img src="' + post_image + '"  class="img-responsive"><input type="hidden" value="' + post_id + '" name="selected_id[]" /></div>';
        $('div.items_compare:first-child').css('background', 'red');
        if (parseInt($('.items_compare').length, 10) > 3) {
            $('.items_compare:first').remove();
        }
        $('#submit_compare').before(to_add);
        $('#submit_compare').on('click', function (event) {
            $('#form_compare').trigger('submit');
        });
        $('.items_compare').fadeIn(500);
    });
    $('#submit_compare').on('click', function (event) {
        $('#form_compare').trigger('submit');
    });
    $('#form_submit_2,#form_submit_1 ').on('click', function (event) {
        var loading_modal;
        window.scrollTo(0, 0);
        loading_modal = '<div class="modal fade" id="loadingmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"><div class="modal-dialog"><div class="modal-content"><div class="modal-body listing-submit"><span>' + control_vars.addprop + '</div></div></div></div></div>';
        jQuery('body').append(loading_modal);
        jQuery('#loadingmodal').modal();
    });
    $('#add-new-image').on('click', function (event) {
        $('<p><label for="file">New Image:</label><input type="file" name="upload_attachment[]" id="file_featured"></p> ').appendTo('#files_area');
    });
    $('.delete_image').on('click', function (event) {
        var image_id = $(this).attr('data-imageid');
        var curent = $('#images_todelete').val();
        if (curent === '') {
            curent = image_id;
        } else {
            curent = curent + ',' + image_id;
        }
        $('#images_todelete').val(curent);
        $(this).parent().remove();
    });
    $('#googleMap').on('mousemove', function (e) {
        $('.tooltip').css({'top': e.pageY, 'left': e.pageX, 'z-index': '1'});
    });
    setTimeout(function () {
        $('.tooltip').fadeOut("fast");
    }, 10000);
});

function wpestate_filter_city_area(selected_city, selected_area) {
    "use strict";
    jQuery('#' + selected_city + ' li').on('click', function (event) {
        event.preventDefault();
        var pick, value_city, parent, selected_city, is_city, area_value;
        value_city = String(jQuery(this).attr('data-value2')).toLowerCase();
        jQuery('#' + selected_area + ' li').each(function () {
            is_city = String(jQuery(this).attr('data-parentcity')).toLowerCase();
            is_city = is_city.replace(" ", "-");
            area_value = String(jQuery(this).attr('data-value')).toLowerCase();
            if (is_city === value_city || value_city === 'all') {
                jQuery(this).show();
            } else {
                jQuery(this).hide();
            }
        });
    });
}

function wpestate_filter_county_city(selected_county, selected_city) {
    "use strict";
    jQuery('#' + selected_county + ' li').on('click', function (event) {
        event.preventDefault();
        var pick, value_county, parent, selected_county, is_county, area_value;
        value_county = String(jQuery(this).attr('data-value2')).toLowerCase();
        jQuery('#' + selected_city + ' li').each(function () {
            is_county = String(jQuery(this).attr('data-parentcounty')).toLowerCase();
            is_county = is_county.replace(" ", "-");
            area_value = String(jQuery(this).attr('data-value')).toLowerCase();
            if (is_county === value_county || value_county === 'all') {
                jQuery(this).show();
            } else {
                jQuery(this).hide();
            }
        });
    });
}

function wpestate_show_capture_vertical() {
    "use strict";
    var slideno, slidedif, tomove, curentleft, position;
    jQuery('#googleMapSlider').hide();
    position = parseInt(jQuery('#carousel-listing .carousel-inner .active').index(), 10);
    jQuery('#carousel-indicators-vertical  li').removeClass('active');
    jQuery('#carousel-listing  .caption-wrapper span').removeClass('active');
    jQuery("#carousel-listing  .caption-wrapper span[data-slide-to='" + position + "'] ").addClass('active');
    jQuery("#carousel-listing  .caption-wrapper span[data-slide-to='" + position + "'] ").addClass('active');
    jQuery("#carousel-indicators-vertical  li[data-slide-to='" + position + "'] ").addClass('active');
    slideno = position + 1;
    slidedif = slideno * 84;
    if (slidedif > 336) {
        tomove = 336 - slidedif;
        tomove = tomove;
        jQuery('#carousel-indicators-vertical').css('top', tomove + "px");
    } else {
        position = jQuery('#carousel-indicators-vertical').css('top', tomove + "px").position();
        curentleft = position.top;
        if (curentleft < 0) {
            tomove = 0;
            jQuery('#carousel-indicators-vertical').css('top', tomove + "px");
        }
    }
}

function wpestate_show_capture() {
    "use strict";
    var slideno, slidedif, tomove, curentleft, position;
    jQuery('#googleMapSlider').hide();
    position = parseInt(jQuery('#carousel-listing .carousel-inner .active').index(), 10);
    jQuery('#carousel-listing  .caption-wrapper span').removeClass('active');
    jQuery('#carousel-listing  .carousel-round-indicators li').removeClass('active');
    jQuery("#carousel-listing  .caption-wrapper span[data-slide-to='" + position + "'] ").addClass('active');
    jQuery("#carousel-listing  .carousel-round-indicators li[data-slide-to='" + position + "'] ").addClass('active');
    slideno = position + 1;
    slidedif = slideno * 146;
    if (slidedif > 810) {
        tomove = 810 - slidedif;
        jQuery('.post-carusel .carousel-indicators').css('left', tomove + "px");
    } else {
        position = jQuery('.post-carusel .carousel-indicators').css('left', tomove + "px").position();
        curentleft = position.left;
        if (curentleft < 0) {
            tomove = 0;
            jQuery('.post-carusel .carousel-indicators').css('left', tomove + "px");
        }
    }
}

function wpestate_raisePower(x, y) {
    "use strict";
    return Math.pow(x, y);
}

function wpestate_adv_search_click() {
    "use strict";
    jQuery('.with_search_form_float #adv-search-header-1,.with_search_form_float #adv-search-header-3').on('click', function (event) {
        if (jQuery('#search_wrapper').hasClass('float_search_closed')) {
            jQuery('#search_wrapper').removeClass('float_search_closed');
        } else {
            jQuery('#search_wrapper').addClass('float_search_closed');
        }
    });
}

function wpestate_contact_footer_starter() {
    "use strict";
    jQuery('#btn-cont-submit').on('click', function (event) {
        var contact_name, contact_email, contact_phone, contact_coment, agent_email, property_id, nonce, ajaxurl;
        contact_name = jQuery('#foot_contact_name').val();
        contact_email = jQuery('#foot_contact_email').val();
        contact_phone = jQuery('#foot_contact_phone').val();
        contact_coment = jQuery('#foot_contact_content').val();
        nonce = jQuery('#contact_footer_ajax_nonce').val();
        ajaxurl = ajaxcalls_vars.admin_url + 'admin-ajax.php';
        jQuery('#footer_alert-agent-contact').empty();
        if (ajaxcalls_vars.use_gdpr === 'yes') {
            if (!jQuery('#wpestate_agree_gdprfooter').is(':checked')) {
                jQuery('#footer_alert-agent-contact').empty().append(ajaxcalls_vars.gdpr_terms);
                return;
            }
        }
        jQuery.ajax({
            type: 'POST',
            dataType: 'json',
            url: ajaxurl,
            data: {
                'action': 'wpestate_ajax_contact_form_footer',
                'name': contact_name,
                'email': contact_email,
                'phone': contact_phone,
                'contact_coment': contact_coment,
                'propid': property_id,
                'nonce': nonce
            },
            success: function (data) {
                if (data.sent) {
                    jQuery('#foot_contact_name').val('');
                    jQuery('#foot_contact_email').val('');
                    jQuery('#foot_contact_phone').val('');
                    jQuery('#foot_contact_content').val('');
                }
                jQuery('#footer_alert-agent-contact').empty().append(data.response);
            },
            error: function (errorThrown) {
            }
        });
    });
}

function wpestate_filter_invoices() {
    "use strict";
    var ajaxurl, start_date, end_date, type, status;
    start_date = jQuery('#invoice_start_date').val();
    end_date = jQuery('#invoice_end_date').val();
    type = jQuery('#invoice_type').val();
    status = jQuery('#invoice_status').val();
    var nonce = jQuery('#wpestate_invoices_actions').val();
    ajaxurl = ajaxcalls_vars.admin_url + 'admin-ajax.php';
    jQuery.ajax({
        type: 'POST',
        url: ajaxurl,
        dataType: 'json',
        data: {
            'action': 'wpestate_ajax_filter_invoices',
            'start_date': start_date,
            'end_date': end_date,
            'type': type,
            'status': status,
            'security': nonce
        },
        success: function (data) {
            jQuery('#container-invoices').empty().append(data.results);
            jQuery('#invoice_confirmed').empty().append(data.invoice_confirmed);
        },
        error: function (errorThrown) {
        }
    });
}

function estate_splash_slider() {
    if (jQuery("#splash_slider_wrapper").length > 0) {
    }
}

function estate_sidebar_slider_carousel() {
    "use strict";
    var owl = jQuery("#owl-featured-slider").data('owlCarousel');
    jQuery(".owl-featured-slider").owlCarousel({
        rtl: true,
        navigation: true,
        slideSpeed: 300,
        paginationSpeed: 400,
        singleItem: true,
        navigationText: ["<div class='nextleft'><i class='demo-icon icon-left-open-big'></i></div>", "<div class='nextright'><i class='demo-icon icon-right-open-big'></i></div>"],
    });
}

function estate_start_lightbox() {
    "use strict";
    var jump_slide;
    jQuery("#owl-demo").owlCarousel({
        rtl: true,
        loop: true,
        navigation: true,
        slideSpeed: 300,
        paginationSpeed: 400,
        items: 1,
        navigationText: ["<div class='nextleft'><i class='demo-icon icon-left-open-big'></i></div>", "<div class='nextright'><i class='demo-icon icon-right-open-big'></i></div>"],
        responsiveClass: true,
        responsive: false
    });
    jQuery('.lightbox_trigger').on('click', function (event) {
        event.preventDefault();
        jQuery('.lightbox_property_wrapper').show();
        jump_slide = parseInt(jQuery(this).attr('data-slider-no'));
        var owl = jQuery("#owl-demo").data('owlCarousel');
        owl.jumpTo(jump_slide - 1);
    });
    jQuery('.lighbox-image-close').on('click', function (event) {
        event.preventDefault();
        jQuery('.lightbox_property_wrapper').hide();
    });
}

function estate_start_lightbox_floorplans() {
    "use strict";
    var jump_slide;
    jQuery('.lightbox_trigger_floor').on('click', function (event) {
        event.preventDefault();
        jQuery('.lightbox_property_wrapper_floorplans').show();
        jQuery('.master_header').css('z-index', '0');
        jQuery('.container').css('z-index', '1');
        jQuery('.header_media').css('z-index', 1);
    });
    jQuery('.lighbox-image-close-floor').on('click', function (event) {
        event.preventDefault();
        jQuery('.master_header').css('z-index', '100');
        jQuery('.container').css('z-index', '2');
        jQuery('.header_media').css('z-index', 3);
        jQuery('.lightbox_property_wrapper_floorplans').hide();
    });
    jQuery("#owl-demo-floor").owlCarousel({
        rtl: true,
        navigation: true,
        slideSpeed: 300,
        paginationSpeed: 400,
        singleItem: true,
        navigationText: ["<div class='nextleft'><i class='demo-icon icon-left-open-big'></i></div>", "<div class='nextright'><i class='demo-icon icon-right-open-big'></i></div>"],
    });
}

function wpestate_anime(selector) {
    "use strict";

    function wpestate_GridLoaderFx(el, options) {
        this.el = el;
        this.items = this.el.querySelectorAll('.listing_wrapper');
    }

    wpestate_GridLoaderFx.prototype.effects = {
        'wpestate': {
            animeOpts: {
                duration: function (t, i) {
                    return 300 + i * 75;
                }, easing: 'easeOutExpo', delay: function (t, i) {
                    return i * 50;
                }, opacity: {value: [0, 1], easing: 'linear'}, scale: [0, 1]
            }
        },
    };
    wpestate_GridLoaderFx.prototype._render = function (effect) {
        this._resetStyles();
        var self = this, effectSettings = this.effects[effect], animeOpts = effectSettings.animeOpts;
        if (effectSettings.perspective != undefined) {
            [].slice.call(this.items).forEach(function (item) {
                item.parentNode.style.WebkitPerspective = item.parentNode.style.perspective = effectSettings.perspective + 'px';
            });
        }
        if (effectSettings.origin != undefined) {
            [].slice.call(this.items).forEach(function (item) {
                item.style.WebkitTransformOrigin = item.style.transformOrigin = effectSettings.origin;
            });
        }
        if (effectSettings.lineDrawing != undefined) {
            [].slice.call(this.items).forEach(function (item) {
                var svg = document.createElementNS('http://www.w3.org/2000/svg', 'svg'),
                    path = document.createElementNS('http://www.w3.org/2000/svg', 'path'), itemW = item.offsetWidth,
                    itemH = item.offsetHeight;
                svg.setAttribute('width', itemW + 'px');
                svg.setAttribute('height', itemH + 'px');
                svg.setAttribute('viewBox', '0 0 ' + itemW + ' ' + itemH);
                svg.setAttribute('class', 'grid__deco');
                path.setAttribute('d', 'M0,0 l' + itemW + ',0 0,' + itemH + ' -' + itemW + ',0 0,-' + itemH);
                path.setAttribute('stroke-dashoffset', anime.setDashoffset(path));
                svg.appendChild(path);
                item.parentNode.appendChild(svg);
            });
            var animeLineDrawingOpts = effectSettings.animeLineDrawingOpts;
            animeLineDrawingOpts.targets = this.el.querySelectorAll('.grid__deco > path');
            anime.remove(animeLineDrawingOpts.targets);
            anime(animeLineDrawingOpts);
        }
        if (effectSettings.revealer != undefined) {
            [].slice.call(this.items).forEach(function (item) {
                var revealer = document.createElement('div');
                revealer.className = 'grid__reveal';
                if (effectSettings.revealerOrigin != undefined) {
                    revealer.style.transformOrigin = effectSettings.revealerOrigin;
                }
                if (effectSettings.revealerColor != undefined) {
                    revealer.style.backgroundColor = effectSettings.revealerColor;
                }
                item.parentNode.appendChild(revealer);
            });
            var animeRevealerOpts = effectSettings.animeRevealerOpts;
            animeRevealerOpts.targets = this.el.querySelectorAll('.grid__reveal');
            animeRevealerOpts.begin = function (obj) {
                for (var i = 0, len = obj.animatables.length; i < len; ++i) {
                    obj.animatables[i].target.style.opacity = 1;
                }
            };
            anime.remove(animeRevealerOpts.targets);
            anime(animeRevealerOpts);
        }
        if (effectSettings.itemOverflowHidden) {
            [].slice.call(this.items).forEach(function (item) {
                item.parentNode.style.overflow = 'hidden';
            });
        }
        animeOpts.targets = effectSettings.sortTargetsFn && typeof effectSettings.sortTargetsFn === 'function' ? [].slice.call(this.items).sort(effectSettings.sortTargetsFn) : this.items;
        anime.remove(animeOpts.targets);
        anime(animeOpts);
    };
    wpestate_GridLoaderFx.prototype._resetStyles = function () {
        this.el.style.WebkitPerspective = this.el.style.perspective = 'none';
        [].slice.call(this.items).forEach(function (item) {
            var gItem = item.parentNode;
            item.style.opacity = 0;
            item.style.WebkitTransformOrigin = item.style.transformOrigin = '50% 50%';
            item.style.transform = 'none';
            var svg = item.parentNode.querySelector('svg.grid__deco');
            if (svg) {
                gItem.removeChild(svg);
            }
            var revealer = item.parentNode.querySelector('.grid__reveal');
            if (revealer) {
                gItem.removeChild(revealer);
            }
            gItem.style.overflow = '';
        });
    };
    window.wpestate_GridLoaderFx = wpestate_GridLoaderFx;
    var body = document.body, grids = [].slice.call(document.querySelectorAll(selector)), currentGrid = 0, loaders = [],
        loadingTimeout;
    var gridsx = jQuery(selector);

    function init() {
        imagesLoaded(body, function () {
            loaders.push(new wpestate_GridLoaderFx(grids[0]));
            applyFx();
        });
    }

    function applyFx() {
        clearTimeout(loadingTimeout);
        loadingTimeout = setTimeout(function () {
            loaders[0]._render('wpestate');
        }, 10);
    }

    init();
}

function wpestate_property_list_sh(ajax_loader, ajax_filters) {
    "use strict";
    var ajaxurl = ajaxcalls_vars.admin_url + 'admin-ajax.php';
    jQuery(ajax_loader).on('click', function (event) {
        var container = jQuery(this).parent().parent();
        var type = container.attr('data-type');
        var category_ids = container.attr('data-category_ids');
        var action_ids = container.attr('data-action_ids');
        var city_ids = container.attr('data-city_ids');
        var area_ids = container.attr('data-area_ids');
        var state_ids = container.attr('data-state_ids');
        var number = container.attr('data-number');
        var align = container.attr('data-align');
        var show_featured_only = container.attr('data-show_featured_only');
        var random_pick = container.attr('data-random_pick');
        var featured_first = container.attr('data-featured_first');
        var page = container.attr('data-page');
        var align = container.attr('data-align');
        var row_number = container.attr('data-row-number');
        page = parseInt(page);
        page = page + 1;
        container.attr('data-page', page);
        container.find('.wpestate_listing_sh_loader').show();
        page = parseInt(page);
        var nonce = jQuery('#wpestate_ajax_filtering').val();
        jQuery.ajax({
            type: 'POST',
            url: ajaxurl,
            data: {
                'action': 'wpestate_load_recent_items_sh',
                'type': type,
                'category_ids': category_ids,
                'action_ids': action_ids,
                'city_ids': city_ids,
                'area_ids': area_ids,
                'state_ids': state_ids,
                'number': number,
                'align': align,
                'show_featured_only': show_featured_only,
                'random_pick': random_pick,
                'featured_first': featured_first,
                'page': page,
                'row_number': row_number,
                'security': nonce
            },
            success: function (data) {
                if (data !== '') {
                    var new_container = 'just_container_' + Math.floor((Math.random() * 100) + 1);
                    container.find('.wpestate_listing_sh_loader').hide();
                    container.find('.wpestate_listing_sh_loader').before('<div class="' + new_container + '">' + data + '</div>');
                    wpestate_restart_js_after_ajax();
                    var new_div = container.attr('id');
                    new_div = "#" + new_div + " ." + new_container;
                    var new_div_height = new_div + ' .property_listing';
                    wpestate_anime(new_div);
                    setTimeout(function () {
                        jQuery(new_div_height).matchHeight();
                    }, 900);
                    jQuery('.col-md-12.listing_wrapper .property_unit_custom_element.image').each(function () {
                        jQuery(this).parent().addClass('wrap_custom_image');
                    });
                    var wrap_image = parseInt(jQuery('.wrap_custom_image').width());
                    if (wrap_image != 0) {
                        jQuery('.col-md-12>.property_listing_custom_design').css('padding-left', wrap_image);
                    }
                } else {
                    container.find('.wpestate_listing_sh_loader').hide();
                    jQuery(ajax_loader).hide();
                }
            },
            error: function (errorThrown) {
            }
        });
    });
    jQuery(ajax_filters).on('click', function (event) {
        var container = jQuery(this).parent().parent();
        var taxid = jQuery(this).attr('data-taxid');
        var taxonomy = jQuery(this).attr('data-taxonomy');
        jQuery(this).parent().parent().find('.wpestate_item_list_sh').show();
        switch (taxonomy) {
            case 'property_category':
                var category_ids = container.attr('data-category_ids');
                category_ids = wpestate_replace_tax_id(jQuery(this), category_ids, taxid);
                container.attr('data-category_ids', category_ids);
                break;
            case 'property_action_category':
                var action_ids = container.attr('data-action_ids');
                action_ids = wpestate_replace_tax_id(jQuery(this), action_ids, taxid);
                container.attr('data-action_ids', action_ids);
                break;
            case 'property_city':
                var city_ids = container.attr('data-city_ids');
                city_ids = wpestate_replace_tax_id(jQuery(this), city_ids, taxid);
                container.attr('data-city_ids', city_ids);
                break;
            case 'property_area':
                var area_ids = container.attr('data-area_ids');
                area_ids = wpestate_replace_tax_id(jQuery(this), area_ids, taxid);
                container.attr('data-area_ids', area_ids);
                break;
            case 'property_county_state':
                var state_ids = container.attr('data-state_ids');
                state_ids = wpestate_replace_tax_id(jQuery(this), state_ids, taxid);
                container.attr('data-state_ids', state_ids);
                break;
        }
        container.attr('data-page', 0);
        jQuery(this).toggleClass('tax_active');
        container.find('.listing_wrapper').remove();
        container.find('.wpestate_item_list_sh').trigger('click');
    });

    function wpestate_replace_tax_id(acesta, tax_ids, taxid) {
        if (!acesta.hasClass('tax_active')) {
            if (tax_ids.indexOf(taxid) >= 0) {
            } else {
                tax_ids = tax_ids + taxid + ",";
            }
        } else {
            var to_replace = taxid + ",";
            tax_ids = tax_ids.replace(to_replace, "");
        }
        return tax_ids;
    }
}

function wpestate_open_menu() {
    "use strict";
    jQuery('#user_menu_u.user_loged').on('click', function (event) {
        if (jQuery('#user_menu_open').is(":visible")) {
            jQuery('#user_menu_open').removeClass('iosfixed').fadeOut(400);
            jQuery('.navicon-button').removeClass('opensvg');
        } else {
            jQuery('#user_menu_open').fadeIn(400);
            jQuery('.navicon-button').addClass('opensvg');
        }
        event.stopPropagation();
    });
}

function wpestate_contact_us_shortcode() {
    "use strict";
    jQuery('#btn-cont-submit_sh').on('click', function (event) {
        var parent, contact_name, contact_email, contact_phone, contact_coment, agent_email, property_id, nonce,
            ajaxurl;
        contact_name = jQuery('#foot_contact_name_sh').val();
        contact_email = jQuery('#foot_contact_email_sh').val();
        contact_phone = jQuery('#foot_contact_phone_sh').val();
        contact_coment = jQuery('#foot_contact_content_sh').val();
        nonce = jQuery('#contact_footer_ajax_nonce_sh').val();
        ajaxurl = ajaxcalls_vars.admin_url + 'admin-ajax.php';
        parent = jQuery(this).parent();
        if (ajaxcalls_vars.use_gdpr === 'yes') {
            if (!jQuery('#wpestate_agree_gdpr').is(':checked')) {
                jQuery('#footer_alert-agent-contact_sh').empty().append(ajaxcalls_vars.gdpr_terms);
                return;
            }
        }
        jQuery.ajax({
            type: 'POST',
            dataType: 'json',
            url: ajaxurl,
            data: {
                'action': 'wpestate_ajax_contact_form_footer',
                'name': contact_name,
                'email': contact_email,
                'phone': contact_phone,
                'contact_coment': contact_coment,
                'propid': property_id,
                'nonce': nonce
            },
            success: function (data) {
                if (data.sent) {
                    jQuery('#foot_contact_name_sh').val('');
                    jQuery('#foot_contact_email_sh').val('');
                    jQuery('#foot_contact_phone_sh').val('');
                    jQuery('#foot_contact_content_sh').val('');
                }
                jQuery('#footer_alert-agent-contact_sh').empty().append(data.response);
            },
            error: function (errorThrown) {
            }
        });
    });
}

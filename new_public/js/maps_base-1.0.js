wp_estate_kind_of_map = parseInt(mapbase_vars.wp_estate_kind_of_map);
var lealet_map_move_on_hover = 0;
var propertyMarker_submit = '';
var leaflet_map_move_flag = 0;

function wpresidence_map_general_start_map(page_map) {
    "use strict";
    var zoom_level;
    if (page_map == 'prop') {
        zoom_level = parseInt(googlecode_property_vars.page_custom_zoom, 10);
    } else {
        zoom_level = parseInt(googlecode_regular_vars.page_custom_zoom, 10);
    }
    if (wp_estate_kind_of_map === 1) {
        wpresidence_google_start_map(zoom_level);
    } else if (wp_estate_kind_of_map === 2) {
        wpresidence_leaflet_start_map(zoom_level);
    }
}

function wpresidence_leaflet_start_map(zoom_level) {
    "use strict";
    if (typeof (curent_gview_long) === 'undefined' || curent_gview_lat === '' || curent_gview_long === '0') {
        if (typeof (googlecode_property_vars) !== 'undefined') {
            curent_gview_lat = googlecode_property_vars.general_latitude;
        }
        if (typeof (googlecode_regular_vars) !== 'undefined') {
            curent_gview_lat = googlecode_regular_vars.general_latitude;
        }
    }
    if (typeof (curent_gview_long) === 'undefined' || curent_gview_long === '' || curent_gview_long === '0') {
        if (typeof (googlecode_property_vars) !== 'undefined') {
            curent_gview_long = googlecode_property_vars.general_longitude;
        }
        if (typeof (googlecode_regular_vars) !== 'undefined') {
            curent_gview_long = googlecode_regular_vars.general_longitude;
        }
    }
    var mapCenter = L.latLng(curent_gview_lat, curent_gview_long);
    if (document.getElementById('googleMap')) {
        map = L.map('googleMap', {center: mapCenter, zoom: zoom_level,}).on('load', function (e) {
            jQuery('#gmap-loading').remove();
        });
    } else if (document.getElementById('googleMapSlider')) {
        map = L.map('googleMapSlider', {center: mapCenter, zoom: zoom_level}).on('load', function (e) {
            jQuery('#gmap-loading').remove();
        });
    } else {
        return;
    }
    wpresidence_leaflet_initialize_map_common(map);
}

function wpresidence_leaflet_initialize_map_common(map) {
    var tileLayer = wpresidence_open_stret_tile_details();
    map.addLayer(tileLayer);
    map.scrollWheelZoom.disable();
    if (Modernizr.mq('only all and (max-width: 768px)')) {
        map.dragging.disable();
    }
    map.on('popupopen', function (e) {
        lealet_map_move_on_hover = 1;
        if (jQuery('#google_map_prop_list_wrapper').length == 0) {
            var px = map.project(e.popup._latlng);
            if (mapfunctions_vars.useprice === 'yes') {
                px.y -= 115;
            } else {
                px.y -= 320 / 2;
            }
            map.panTo(map.unproject(px), {animate: true});
        }
        lealet_map_move_on_hover = 1;
    });
    jQuery('#gmap-loading').remove();
    map.on('load', function (e) {
        jQuery('#gmap-loading').remove();
    });
    if (Modernizr.mq('only all and (max-width: 768px)')) {
        map.on('dblclick ', function (e) {
            if (map.dragging.enabled()) {
                map.dragging.disable();
            } else {
                map.dragging.enable();
            }
        });
    }
    markers_cluster = L.markerClusterGroup({
        iconCreateFunction: function (cluster) {
            return L.divIcon({html: '<div class="leaflet_cluster">' + cluster.getChildCount() + '</div>'});
        },
    });
}

function wpresidence_leaflet_map_cluster() {
    map.addLayer(markers_cluster);
}

function wprentals_map_general_map_pan_move() {
    if (wp_estate_kind_of_map === 1) {
        wprentals_google_map_pan_move();
    } else if (wp_estate_kind_of_map === 2) {
        wprentals_leaflet_map_pan_move();
    } else if (wp_estate_kind_of_map === 3) {
    }
}

function wpresidence_open_stret_tile_details() {
    mapbase_vars.wp_estate_mapbox_api_key
    if (mapbase_vars.wp_estate_mapbox_api_key === '') {
        var tileLayer = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'});
    } else {
        var tileLayer = L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=' + mapbase_vars.wp_estate_mapbox_api_key, {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
            maxZoom: 18,
            id: 'mapbox.streets',
            accessToken: 'your.mapbox.access.token'
        });
    }
    return tileLayer;
}

function wpresidence_google_start_map(zoom_level) {
    "use strict";
    var mapOptions, styles;
    if (jQuery('#googleMap').hasClass('full_height_map')) {
        var new_height = jQuery(window).height() - jQuery('.master_header').height();
        jQuery('#googleMap,#gmap_wrapper').css('height', new_height);
    }
    if (typeof (curent_gview_long) === 'undefined' || curent_gview_lat === '' || curent_gview_lat === '0') {
        if (typeof (googlecode_property_vars) !== 'undefined') {
            curent_gview_lat = googlecode_property_vars.general_latitude;
        }
        if (typeof (googlecode_regular_vars) !== 'undefined') {
            curent_gview_lat = googlecode_regular_vars.general_latitude;
        }
    }
    if (typeof (curent_gview_long) === 'undefined' || curent_gview_long === '' || curent_gview_long === '0') {
        if (typeof (googlecode_property_vars) !== 'undefined') {
            curent_gview_long = googlecode_property_vars.general_longitude;
        }
        if (typeof (googlecode_regular_vars) !== 'undefined') {
            curent_gview_long = googlecode_regular_vars.general_longitude;
        }
    }
    if (typeof (googlecode_regular_vars) !== 'undefined') {
        var map_type = googlecode_regular_vars.type.toLowerCase();
    } else if (typeof (googlecode_property_vars) !== 'undefined') {
        var map_type = googlecode_property_vars.type.toLowerCase();
    }
    var with_bound = 0;
    var mapOptions = {
        flat: false,
        noClear: false,
        zoom: parseInt(zoom_level),
        scrollwheel: false,
        draggable: true,
        center: new google.maps.LatLng(curent_gview_lat, curent_gview_long),
        mapTypeId: map_type,
        streetViewControl: false,
        disableDefaultUI: true,
        gestureHandling: 'cooperative'
    };
    if (document.getElementById('googleMap')) {
        map = new google.maps.Map(document.getElementById('googleMap'), mapOptions);
    } else if (document.getElementById('googleMapSlider')) {
        map = new google.maps.Map(document.getElementById('googleMapSlider'), mapOptions);
    } else {
        return;
    }
    google.maps.visualRefresh = true;
    if (mapfunctions_vars.show_g_search_status === 'yes') {
        wpestate_set_google_search(map);
    }
    if (mapfunctions_vars.map_style !== '') {
        var styles = JSON.parse(mapfunctions_vars.map_style);
        map.setOptions({styles: styles});
    }
    google.maps.event.addListener(map, 'tilesloaded', function () {
        jQuery('#gmap-loading').remove();
    });
}

function wpresidence_map_general_set_markers(map, markers, with_bound) {
    "use strict";
    wpresidence_google_setMarkers2(map, markers, with_bound);
}

function wpresidence_google_setMarkers2(map, locations) {
    "use strict";
    var map_open;
    var myLatLng;
    var selected_id = parseInt(jQuery('#gmap_wrapper').attr('data-post_id'));
    if (isNaN(selected_id)) {
        selected_id = parseInt(jQuery('#googleMapSlider').attr('data-post_id'), 10);
    }
    var open_height = parseInt(mapfunctions_vars.open_height, 10);
    var closed_height = parseInt(mapfunctions_vars.closed_height, 10);
    var boxText = document.createElement("div");
    width_browser = jQuery(window).width();
    infobox_width = 700;
    vertical_pan = -215;
    if (width_browser < 900) {
        infobox_width = 500;
    }
    if (width_browser < 600) {
        infobox_width = 400;
    }
    if (width_browser < 400) {
        infobox_width = 200;
    }
    if (wp_estate_kind_of_map === 1) {
        bounds = new google.maps.LatLngBounds();
    }
    for (var i = 0; i < locations.length; i++) {
        var beach = locations[i];
        var id = beach[10];
        var lat = beach[1];
        var lng = beach[2];
        var title = decodeURIComponent(beach[0]);
        var pin = beach[8];
        var counter = beach[3];
        var image = decodeURIComponent(beach[4]);
        var price = decodeURIComponent(beach[5]);
        var single_first_type = decodeURIComponent(beach[6]);
        var single_first_action = decodeURIComponent(beach[7]);
        var link = decodeURIComponent(beach[9]);
        var cleanprice = beach[11];
        var rooms = beach[12];
        var baths = beach[13];
        var size = beach[14];
        var single_first_type_name = decodeURIComponent(beach[15]);
        var single_first_action_name = decodeURIComponent(beach[16]);
        var pin_price = decodeURIComponent(beach[17]);
        if (selected_id === id) {
            found_id = i;
        }
        if (wp_estate_kind_of_map === 1) {
            wpestate_createMarker(pin_price, size, i, id, lat, lng, pin, title, counter, image, price, single_first_type, single_first_action, link, rooms, baths, cleanprice, single_first_type_name, single_first_action_name);
        } else if (wp_estate_kind_of_map === 2) {
            wpresidence_createMarker_leaflet(pin_price, size, i, id, lat, lng, pin, title, counter, image, price, single_first_type, single_first_action, link, rooms, baths, cleanprice, single_first_type_name, single_first_action_name);
        }
    }
}

function wpresidence_map_general_cluster() {
    "use strict";
    if (wp_estate_kind_of_map === 1) {
        wpestate_map_cluster();
    } else if (wp_estate_kind_of_map === 2) {
        wpresidence_leaflet_map_cluster();
    }
}

function wpresidence_map_general_fit_to_bounds(with_bound) {
    "use strict";
    if (wp_estate_kind_of_map === 1) {
        wpresidence_google_fit_to_bounds(with_bound);
    } else if (wp_estate_kind_of_map === 2) {
        wpresidence_leaflet_fit_to_bounds(with_bound);
    }
}

function wpresidence_map_panorama() {
    "use strict";
    if (parseInt(mapbase_vars.wp_estate_kind_of_map) == 2) {
        return;
    }
    var viewPlace = new google.maps.LatLng(curent_gview_lat, curent_gview_long);
    panorama = map.getStreetView();
    panorama.setPosition(viewPlace);
    heading = parseInt(googlecode_property_vars.camera_angle);
    panorama.setPov(({heading: heading, pitch: 0}));
    google.maps.event.addListener(panorama, "closeclick", function () {
        jQuery('#gmap-next,#gmap-prev ,#geolocation-button,#gmapzoomminus,#gmapzoomplus').show();
        jQuery('#street-view').removeClass('mapcontrolon');
    });
}

function wpresidence_google_fit_to_bounds(with_bound) {
    "use strict";
    if (document.getElementById('google_map_prop_list')) {
    } else if (document.getElementById('googleMap')) {
        if (with_bound === 1) {
            if (typeof (bounds) !== 'undefined' && !bounds.isEmpty()) {
                wpestate_fit_bounds(bounds);
            } else {
                wpestate_fit_bounds_nolsit();
            }
        }
    }
}

function wpresidence_map_general_spiderfy() {
    "use strict";
    if (wp_estate_kind_of_map === 1) {
        if (!jQuery('body').hasClass('single-estate_property')) {
            oms = new OverlappingMarkerSpiderfier(map, {
                markersWontMove: true,
                markersWontHide: true,
                keepSpiderfied: true,
                legWeight: 2
            });
            wpestate_setOms(gmarkers);
        }
    } else if (wp_estate_kind_of_map === 2) {
    }
}

function wpresidence_leaflet_fit_to_bounds(with_bound) {
    if (with_bound === 1) {
        if (bounds_list.isValid()) {
            if (mapfunctions_vars.bypass_fit_bounds !== '1') {
                wpestate_fit_bounds_leaflet(bounds_list);
            }
        } else {
            wpestate_fit_bounds_nolsit_leaflet();
        }
    }
}

function wpestate_fit_bounds_leaflet(bounds) {
    is_fit_bounds_zoom = 1;
    if (placeCircle != '') {
        map.fitBounds(placeCircle.getBounds());
    } else {
        if (gmarkers.length === 1) {
            var center = gmarkers[0].getLatLng();
            map.panTo(center);
            map.setZoom(10);
            is_fit_bounds_zoom = 0;
        } else {
            map.fitBounds(bounds);
            is_fit_bounds_zoom = 0;
        }
    }
}

function wprentals_leaflet_map_pan_move() {
    if (googlecode_regular_vars.on_demand_pins === 'yes' && mapfunctions_vars.is_tax != 1 && mapfunctions_vars.is_property_list === '1') {
        map.on('moveend', function (e) {
            wpestate_ondenamd_map_moved_leaflet();
        });
    }
}

function wprentals_google_map_pan_move() {
    if (googlecode_regular_vars.on_demand_pins === 'yes' && mapfunctions_vars.is_tax != 1 && mapfunctions_vars.is_property_list === '1') {
        map.addListener('idle', function () {
            wpestate_ondenamd_map_moved();
        });
    }
}

function wpresidence_createMarker_leaflet(pin_price, size, i, id, lat, lng, pin, title, counter, image, price, single_first_type, single_first_action, link, rooms, baths, cleanprice, single_first_type_name, single_first_action_name) {
    "use strict";
    var infoboxWrapper = document.createElement("div");
    infoboxWrapper.className = 'leafinfobox-wrapper';
    var infobox = "";
    var poss = 0;
    var infobox_class = " price_infobox ";
    var price2 = price;
    var my_custom_curr_pos = parseFloat(wpestate_getCookie_map('my_custom_curr_pos'));
    if (!isNaN(my_custom_curr_pos) && my_custom_curr_pos !== -1) {
        var converted_price = wpestate_get_price_currency(cleanprice, cleanprice);
        var testRE = price.match('</span>(.*)<span class=');
        if (testRE !== null) {
            price2 = price.replace(testRE[1], converted_price);
        }
    }
    if (mapfunctions_vars.useprice === 'yes') {
        infobox_class = ' openstreet_map_price_infobox ';
    }
    var info_image = '';
    if (image === '') {
        info_image = mapfunctions_vars.path + '/idxdefault.jpg';
    } else {
        info_image = image;
    }
    var category = decodeURIComponent(single_first_type.replace(/-/g, ' '));
    var action = decodeURIComponent(single_first_action.replace(/-/g, ' '));
    var category_name = decodeURIComponent(single_first_type_name.replace(/-/g, ' '));
    var action_name = decodeURIComponent(single_first_action_name.replace(/-/g, ' '));
    var in_type = mapfunctions_vars.in_text;
    if (category === '' || action === '') {
        in_type = " ";
    }
    in_type = " / ";
    var infoguest, inforooms;
    var infobaths;
    if (baths != '') {
        infobaths = '<span id="infobath">' + baths + '</span>';
    } else {
        infobaths = '';
    }
    var inforooms;
    if (rooms != '') {
        inforooms = '<span id="inforoom"> ' + rooms + '</span>';
    } else {
        inforooms = '';
    }
    var infosize;
    if (size != '') {
        infosize = '<span id="infosize">' + size + '</span>';
    } else {
        infosize = '';
    }
    var title = title.substr(0, 45);
    if (title.length > 45) {
        title = title + "...";
    }
    infobox += '<div class="info_details ' + infobox_class + '"><a id="infocloser" onClick=\'javascript:jQuery(".leaflet-popup-close-button")[0].click();\' ></a><a href="' + link + '">' + info_image + '</a><a href="' + link + '" id="infobox_title">' + title + '</a><div class="">' + category_name + " " + in_type + " " + action_name + '</div><div class="prop_pricex">' + wpestate_get_price_currency(price, cleanprice) + infosize + infobaths + inforooms +'</div></div>';
    var markerOptions = {riseOnHover: true};
    var markerCenter = L.latLng(lat, lng);
    var propertyMarker = '';
    if (mapfunctions_vars.useprice === 'yes') {
        var price2 = price;
        var my_custom_curr_pos = parseFloat(wpestate_getCookie_map('my_custom_curr_pos'));
        if (!isNaN(my_custom_curr_pos) && my_custom_curr_pos !== -1) {
            var converted_price = wpestate_get_price_currency(cleanprice, cleanprice);
            var testRE = price.match('</span>(.*)<span class=');
            if (testRE !== null) {
                price2 = price.replace(testRE[1], converted_price);
            }
        }
        var price_pin_class = 'wpestate_marker openstreet_price_marker ' + wpestate_makeSafeForCSS(single_first_type_name.trim()) + ' ' + wpestate_makeSafeForCSS(single_first_action_name.trim());
        var pin_price_marker = '<div class="' + price_pin_class + '">';
        if (typeof (price) !== 'undefined') {
            if (mapfunctions_vars.use_price_pins_full_price === 'no') {
                pin_price_marker += '<div class="interior_pin_price">' + pin_price + '</div>';
            } else {
                pin_price_marker += '<div class="interior_pin_price">' + price2 + '</div>';
            }
        }
        pin_price_marker += '</div>';
        var myIcon = L.divIcon({className: 'someclass', iconSize: new L.Point(0, 0), html: pin_price_marker});
        propertyMarker = L.marker(markerCenter, {icon: myIcon});
    } else {
        var markerImage = {
            iconUrl: wprentals_custompin_leaflet(pin),
            iconSize: [44, 50],
            iconAnchor: [20, 50],
            popupAnchor: [1, -50]
        };
        markerOptions.icon = L.icon(markerImage);
        propertyMarker = L.marker(markerCenter, markerOptions);
    }
    propertyMarker.idul = id;
    propertyMarker.pin = pin;
    if (mapfunctions_vars.user_cluster === 'yes') {
        markers_cluster.addLayer(propertyMarker);
    } else {
        propertyMarker.addTo(map);
    }
    gmarkers.push(propertyMarker);
    if (typeof (bounds_list) !== "undefined") {
        bounds_list.extend(propertyMarker.getLatLng());
    } else {
        bounds_list = L.latLngBounds(propertyMarker.getLatLng(), propertyMarker.getLatLng());
    }
    infoboxWrapper.innerHTML = infobox;
    propertyMarker.bindPopup(infobox);
}

function wprentals_custompinchild_leaflet(image) {
    "use strict";
    var custom_img;
    var extension = '';
    var ratio = jQuery(window).dense('devicePixelRatio');
    if (ratio > 1) {
        extension = '_2x';
    }
    if (images['userpin'] === '') {
        custom_img = mapfunctions_vars.path + '/' + 'userpin' + extension + '.png';
    } else {
        custom_img = images['userpin'];
        if (ratio > 1) {
            custom_img = custom_img.replace(".png", "_2x.png");
        }
    }
    return custom_img;
    ;
}

function wprentals_custompin_leaflet(image) {
    "use strict";
    if (mapfunctions_vars.useprice === 'yes') {
        return mapfunctions_vars.path + '/pixel.png';
    }
    var custom_img = '';
    var extension = '';
    var ratio = jQuery(window).dense('devicePixelRatio');
    if (ratio > 1) {
        extension = '_2x';
    }
    if (image !== '') {
        if (images[image] === '') {
            custom_img = mapfunctions_vars.path + '/' + image + extension + '.png';
        } else {
            custom_img = images[image];
            if (ratio > 1) {
                custom_img = custom_img.replace(".png", "_2x.png");
            }
        }
    } else {
        custom_img = mapfunctions_vars.path + '/none.png';
    }
    if (typeof (custom_img) === 'undefined') {
        custom_img = mapfunctions_vars.path + '/none.png';
    }
    return custom_img;
}

function wprentals_map_resize() {
    if (wp_estate_kind_of_map === 1) {
        google.maps.event.trigger(map, "resize");
    } else if (wp_estate_kind_of_map === 2) {
        map.invalidateSize();
    } else if (wp_estate_kind_of_map === 3) {
    }
}

function wprentals_initialize_map_submit_leaflet() {
    var listing_lat = jQuery('#property_latitude').val();
    var listing_lon = jQuery('#property_longitude').val();
    if (listing_lat === '' || listing_lat === 0 || listing_lat === '0') {
        listing_lat = google_map_submit_vars.general_latitude;
    }
    if (listing_lon === '' || listing_lon === 0 || listing_lon === '0') {
        listing_lon = google_map_submit_vars.general_longitude;
    }
    var mapCenter = L.latLng(listing_lat, listing_lon);
    if (document.getElementById('googleMapsubmit')) {
        map = L.map('googleMapsubmit', {center: mapCenter, zoom: 17}).on('load', function (e) {
        });
        map_intern = 1;
        var tileLayer = wpresidence_open_stret_tile_details();
        map.addLayer(tileLayer);
        map.on('click', function (e) {
            map.removeLayer(propertyMarker_submit)
            var markerCenter = L.latLng(e.latlng);
            propertyMarker_submit = L.marker(e.latlng).addTo(map);
            ;propertyMarker_submit.bindPopup('<div class="submit_leaflet_admin">Latitude: ' + e.latlng.lat + ' Longitude: ' + e.latlng.lng + '</div>').openPopup();
            document.getElementById("property_latitude").value = e.latlng.lat;
            document.getElementById("property_longitude").value = e.latlng.lng;
        });
        var markerCenter = L.latLng(listing_lat, listing_lon);
        propertyMarker_submit = L.marker(markerCenter).addTo(map);
        propertyMarker_submit.bindPopup('<div class="submit_leaflet_admin">Latitude: ' + listing_lat + ' Longitude: ' + listing_lon + '</div>');
        setTimeout(function () {
            propertyMarker_submit.openPopup();
        }, 600);
    }
}

function wpresidence_map_resise() {
    if (wp_estate_kind_of_map === 1) {
        google.maps.event.addListenerOnce(map, 'idle', function () {
            setTimeout(function () {
                google.maps.event.trigger(map, 'resize');
            }, 600);
        });
    } else if (wp_estate_kind_of_map === 2) {
        map.invalidateSize();
        setTimeout(function () {
            map.invalidateSize();
        }, 600);
    }
}
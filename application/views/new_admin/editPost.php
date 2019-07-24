<style>
    select, input {
        float: right;
    }

    #map {
        height: 425px;
    }
</style>

<section class="content-header">
    <h1>
        تعديل المنشور
    </h1>
</section>
<form action="<?= base_url('MemberArea/post_edit') ?>" method="post" enctype="multipart/form-data">
    <input type="hidden" id="p_id" name="p_id" value="<?= $posts['p_id'] ?>">
    <input type="hidden" id="meridian" name="meridian" value="<?= $posts['p_meridian'] ?>">
    <input type="hidden" id="latitude" name="latitude" value="<?= $posts['p_latitude'] ?>">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="box box-primary">
                <div class="box-header">
                    <b> الصور
                    </b>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <lable><b>صور الخارجية</b></lable>
                        <input class="inpr form-control" type="file" name="uploadMain[]"/>
                        <span class="text-black">1000*300.jpg</span>
                    </div>
                    <div class="form-group"></div>

                    <div class="form-group">
                        <lable><b>صور</b></lable>
                        <input class="inpr form-control" type="file" name="upload[]" multiple />
                        <span class="text-black">1000*300.jpg</span>
                    </div>
                    <div class="form-group"></div>
                </div>
            </div>
            <div class="box box-primary">
                <div class="box-header">
                    <b> معلومات عامة
                    </b>
                </div>

                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="Governorate"><?php echo $this->lang->line('governorates') ?></label>
                            <select name="Governorate" id="Governorate" class="form-control select2">
                                <?php foreach ($governorates as $governorates) { ?>
                                    <option value="<?php echo $governorates['id']; ?>" <?php if ($governorates['id'] == $posts['g_id']) echo 'selected'; ?> ><?php echo $governorates['name']; ?></option>
                                <?php } ?>
                            </select>
                            <b class="text-danger"><?= @form_error('Governorate') ?></b>
                        </div>
                        <div class="col-md-6">
                            <label for="Governorate">منطقة</label>
                            <input type="text" name="area" class="form-control" value="<?= $posts['area'] ?>">
                            <b class="text-danger"><?= @form_error('area') ?></b>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="type"><?php echo $this->lang->line('ownership') ?></label>
                                <select name="Ownership" class="form-control select2">
                                    <?php foreach ($ownership as $value) { ?>
                                        <option value="<?php echo $value['id']; ?>" <?php if ($value['id'] == $posts['por_ownership_id']) echo 'selected'; ?>><?php echo $value['text']; ?></option>
                                    <?php } ?>
                                </select>
                                <b class="text-danger"><?= @form_error('Ownership') ?></b>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="type"><?php echo $this->lang->line('type') ?></label>
                                <select name="Type" id="Type" class="form-control select2">
                                    <?php foreach ($type as $value) { ?>
                                        <option value="<?php echo $value['id']; ?>" <?php if ($value['id'] == $posts['p_type']) echo 'selected'; ?> ><?php echo $value['text']; ?></option>
                                    <?php } ?>
                                </select>
                                <b class="text-danger"><?= @form_error('Type') ?></b>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tapu"><?php echo $this->lang->line('tapu') ?></label>
                                <select name="tapu" id="tapu" class="form-control select2">
                                    <?php foreach ($tapu as $value) { ?>
                                        <option value="<?php echo $value['id']; ?>" <?php if ($value['id'] == $posts['p_prepareOfTapu']) echo 'selected'; ?> ><?php echo $value['text']; ?></option>
                                    <?php } ?>
                                </select>
                                <b class="text-danger"><?= @form_error('tapu') ?></b>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="TypeOfProperty"><?php echo $this->lang->line('properties') ?></label>
                                <select name="TypeOfProperty" id="TypeOfProperty" class="form-control">
                                    <?php foreach ($properties as $property) { ?>
                                        <option value="<?php echo $property['id']; ?>" <?php if ($property['id'] == $posts['p_typeOfProperty']) echo 'selected'; ?> ><?php echo $property['text']; ?></option>
                                    <?php } ?>
                                </select>
                                <b class="text-danger"><?= @form_error('TypeOfProperty') ?></b>

                            </div>
                        </div>
                    </div>

                </div>


            </div>
            <div class="box box-primary">
                <div class="box-header">
                    مواصفات
                </div>
                <div class="box-body">
                    <div class="col-md-6 home_properties">
                        <div class="form-group">
                            <label for="TypeOfProperty"><?php echo $this->lang->line('numbrsOfRooms') ?></label>
                            <input type="number" name="NumOfRooms" value="<?= $posts['p_numOfRooms'] ?>"
                                   class="form-control" required=""
                                   data-parsley-error-message="<?php echo _required ?>">

                            <b class="text-danger"><?= @form_error('NumOfRooms') ?></b>

                        </div>
                    </div>
                    <div class="col-md-6 home_properties">
                        <div class="form-group">
                            <label for="TypeOfProperty"><?php echo $this->lang->line('BATHROOMS') ?></label>
                            <input type="number" name="NumOfBathRooms" value="<?= $posts['p_numOfBathRooms'] ?>"
                                   class="form-control" required=""
                                   data-parsley-error-message="<?php echo _required ?>">

                            <b class="text-danger"><?= @form_error('NumOfBathRooms') ?></b>

                        </div>
                    </div>
                    <div class="col-md-6 ">
                        <div class="form-group">
                            <label for="TypeOfProperty"><?php echo $this->lang->line('AREA') ?></label>
                            <input type="number" name="AreaSpace" value="<?= $posts['p_areaSpace'] ?>"
                                   class="form-control" required=""
                                   data-parsley-error-message="<?php echo _required ?>">

                            <b class="text-danger"><?= @form_error('AreaSpace') ?></b>

                        </div>
                    </div>
                    <div class="col-md-6 home_properties">
                        <div class="form-group">
                            <label for="TypeOfProperty"><?php echo $this->lang->line('floor') ?></label>
                            <input type="number" name="Floor" class="form-control" required=""
                                   value="<?= $posts['p_floor'] ?>"
                                   data-parsley-error-message="<?php echo _required ?>">

                            <b class="text-danger"><?= @form_error('Floor') ?></b>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group home_properties">
                            <label for="nameEn"><?php echo $this->lang->line('cladding') ?></label>
                            <select name="TypeOfCladding" class="form-control select2">
                                <?php foreach ($cladding as $value) { ?>
                                    <option value="<?php echo $value['id']; ?>" <?php if ($value['id'] == $posts['pc_id']) echo 'selected'; ?> ><?php echo $value['text']; ?></option>
                                <?php } ?>
                            </select>

                            <b class="text-danger"><?= @form_error('TypeOfCladding') ?></b>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nameEn">فترة الزمنية</label>
                            <select name="PeriodTime" class="form-control select2">
                                <?php foreach ($ownership as $value) {
                                    if ($value['id'] == '010A6B80-26E9-477E-BEDC-E89D0BFA8BA3') {

                                        ?>
                                        <?php
                                        $i = 0;
                                        foreach ($value['period_time'] as $key => $item) { ?>
                                            <option value="<?php echo $i++; ?>" <?php if ($value['id'] == $posts['por_period_time']) echo 'selected'; ?> ><?php echo $item; ?></option>
                                        <?php } ?>
                                    <?php }
                                    ?>

                                <?php } ?>
                            </select>

                            <b class="text-danger"><?= @form_error('PeriodTime') ?></b>

                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <lable><b><?php echo $this->lang->line('ADDRESS') ?></b></lable>
                            <input type="text" class="form-control" style="direction: rtl" required=""
                                   data-parsley-error-message="<?php echo _required ?>" id="AddressAr" name="AddressAr"
                                   value="<?= $posts['p_address_ar'] ?>"
                                   placeholder="<?php echo $this->lang->line('ADDRESS') ?>">

                            <b class="text-danger"><?= @form_error('TypeOfProperty') ?></b>

                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <lable><b><?php echo $this->lang->line('PROPERTYDESCRIPTION') ?></b></lable>
                            <textarea name="DescriptionAr" id="DescriptionAr" required="" style="resize: unset"
                                      cols="30" rows="4" class="form-control"
                                      placeholder="<?php echo $this->lang->line('PROPERTYDESCRIPTION') ?>"><?= $posts['p_description_ar'] ?></textarea>

                            <b class="text-danger"><?= @form_error('DescriptionAr') ?></b>

                        </div>
                    </div>
                    <div class="col-md-6 home_properties">
                        <div class="form-group">
                            <label for=""> موقف خاص :</label>
                            <input type="radio" <?php if ($posts['p_parking'] != 1) echo 'checked'; ?>
                                   class="radio_checker" value="0" name="Parking" placeholder=" ">
                            <label for="">
                                لا يوجد

                            </label>
                            <input type="radio" <?php if ($posts['p_parking'] == 1) echo 'checked'; ?>
                                   class="radio_checker" value="1" name="Parking" placeholder=" ">
                            <label for="">
                                يوجد

                            </label>


                        </div>
                    </div>
                    <div class="col-md-6 home_properties">
                        <div class="form-group">
                            <label for="">مفروش :</label>
                            <input type="radio" <?php if ($posts['p_furnished'] == 0) echo 'checked'; ?>
                                   class="radio_checker" value="0" name="Furnished" placeholder=" ">
                            <label for="">
                                لا

                            </label>
                            <input type="radio" <?php if ($posts['p_furnished'] == 1) echo 'checked'; ?>
                                   class="radio_checker" value="1" name="Furnished" placeholder=" ">
                            <label for="">
                                نعم

                            </label>


                        </div>
                    </div>
                    <div class="col-md-6 home_properties">
                        <div class="form-group">
                            <label for="">أنترفون :</label>
                            <input type="radio" <?php if ($posts['p_interphone'] != 1) echo 'checked'; ?>
                                   class="radio_checker" name="Interphone" placeholder=" ">
                            <label for="">
                                لا يوجد

                            </label>
                            <input type="radio" <?php if ($posts['p_interphone'] == 1) echo 'checked'; ?>
                                   class="radio_checker" name="Interphone" placeholder=" ">
                            <label for="">
                                يوجد

                            </label>


                        </div>
                    </div>
                    <div class="col-md-6 home_properties">
                        <div class="form-group">
                            <label for=""><?php echo $this->lang->line('elevator') ?> :</label>
                            <input type="radio" <?php if ($posts['p_elevator'] != 1) echo 'checked'; ?>
                                   class="radio_checker" name="Elevator" placeholder=" ">
                            <label for="">
                                لا يوجد

                            </label>
                            <input type="radio" <?php if ($posts['p_elevator'] == 1) echo 'checked'; ?>
                                   class="radio_checker" name="Elevator" placeholder=" ">
                            <label for="">
                                يوجد

                            </label>


                        </div>
                    </div>


                    <div class="col-md-6 home_properties">
                        <label for=""><?php echo $this->lang->line('summer') ?></label>
                        <input type="text" name="Summer" class="form-control" value="<?= $posts['p_summer'] ?>">
                    </div>
                    <div class="col-md-6 home_properties">
                        <label for=""><?php echo $this->lang->line('winter') ?></label>
                        <input type="text" name="Winter" class="form-control" value="<?= $posts['p_winter'] ?>">
                    </div>
                    <div class="col-md-6">
                        <label for=""><?php echo $this->lang->line('price') ?></label>
                        <input type="text" name="price" class="form-control" value="<?= $posts['por_price'] ?>">
                        <b class="text-danger"><?= @form_error('price') ?></b>

                    </div>

                    <?php
                    if (isset($_SESSION['admin']) && $_SESSION['admin'] == 1) { ?>
                        <div class="col-md-6">
                            <label for=""><?php echo $this->lang->line('GSM') ?></label>
                            <input type="text" name="GSM" class="form-control" value="<?= $posts['p_gsm'] ?>">
                        </div>
                        <div class="col-md-6">
                            <label for=""><?php echo $this->lang->line('Name') ?></label>
                            <input type="text" name="Name" class="form-control" value="<?= $posts['p_userInfo'] ?>">
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="box box-primary">
                <div class="box-header"><b>خريطة</b></div>
                <div class="box-body">

                    <div class="col-md-6 col-md-offset-6 ">
                        <input id="searchTextField" onkeydown="return event.key != 'Enter';" class="form-control" type="text" size="50">
                        <br>
                        <br>
                    </div>
                    <div class="col-md-12">
                        <div id="map" class="col-md-12" data-lng="" data-lat="">

                        </div>

                    </div>
                    <hr>
                    <br>
                    <br>
                    <br>
                    <input type="submit" class="btn btn-primary"
                           style="margin-top:20px " value="حفظ">

                </div>
            </div>

        </div>

    </div>
</form>

<div class="load hidden">
    <div class="pageload-overlay"><?php echo _loading ?></div>
</div>


<script src="<?php echo base_url(); ?>public/assetsAdmin/js/proudact_add.js"></script>
<script>
    var map;
    var markers = [];

    function initMap() {
        var myLatLng = {lat: 33.514587, lng: 36.295107};

        map = new google.maps.Map(document.getElementById('map'), {
            zoom: 4,
            center: myLatLng
        });
        google.maps.event.addListener(map, 'click', function (event) {
            placeMarker(event.latLng, map);
        });
        // var input = document.getElementById('searchTextField');
        // new google.maps.places.Autocomplete(input);
        var image = '<?=base_url("beachflag.png")?>';
        var input = document.getElementById('searchTextField');
        var searchBox = new google.maps.places.SearchBox(input);
        // map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
        new google.maps.places.Autocomplete(input);

        google.maps.event.addListener(map, 'click', function (event) {
            placeMarker(event.latLng, map);
        });

        map.addListener('bounds_changed', function () {
            searchBox.setBounds(map.getBounds());
        });

        searchBox.addListener('places_changed', function () {
            var places = searchBox.getPlaces();
            console.log(1);
            if (places.length == 0) {
                return;
            }
            console.log(2);
            // Clear out the old markers.
            markers.forEach(function (marker) {
                marker.setMap(null);
            });
            markers = [];

            // For each place, get the icon, name and location.
            var bounds = new google.maps.LatLngBounds();
            places.forEach(function (place) {
                if (!place.geometry) {
                    console.log("Returned place contains no geometry");
                    return;
                }
                var icon = {
                    url: place.icon,
                    size: new google.maps.Size(71, 71),
                    origin: new google.maps.Point(0, 0),
                    anchor: new google.maps.Point(17, 34),
                    scaledSize: new google.maps.Size(25, 25)
                };

                // Create a marker for each place.
                markers.push(new google.maps.Marker({
                    map: map,
                    icon: icon,
                    title: place.name,
                    position: place.geometry.location
                }));

                if (place.geometry.viewport) {
                    // Only geocodes have viewport.
                    bounds.union(place.geometry.viewport);
                } else {
                    bounds.extend(place.geometry.location);
                }
            });
            map.fitBounds(bounds);
        });


        var beachMarker = new google.maps.Marker({
            position: {lat: <?=$posts['p_latitude']?> , lng:<?=$posts['p_meridian']?>},
            map: map,
            icon: image
        });
    }

    function deleteMarker() {
        for (var i = 0; i < markers.length; i++) {
            markers[i].setMap(null);
        }
        markers = [];
    }

    function placeMarker(position) {
        deleteMarker();
        var marker = new google.maps.Marker({
            position: position,
            map: map
        });
        $('#meridian').val(position.lng());
        $('#latitude').val(position.lat());
        markers.push(marker);
        map.panTo(position);
    }
</script>
<script>
    if ($("#Ownership").val() == "010A6B80-26E9-477E-BEDC-E89D0BFA8BA3") {
        $("#period_time").show();
    } else {
        $("#period_time").hide();
    }

    $("#Ownership").change(function () {
        if ($("#Ownership").val() == "010A6B80-26E9-477E-BEDC-E89D0BFA8BA3") {
            $("#period_time").show();
            $("#period_time").attr("disabled", true);
        } else {
            $("#period_time").hide();
            $("#period_time").attr("disabled", false);

        }
    });
    var type = $("#Type").val();
    if ($("#Type").val() == "F03BA431-43A6-40C7-BD10-4FB9B0995A68" || $("#Type").val() == "CE1E1A5D-E4DA-48B1-A6F7-691B5207475F" || $("#Type").val() == "1EDBFAD2-6D05-4BDA-8FD6-AEA14B6B1BF8" || $("#Type").val() == "25600C82-BBC2-486C-926D-5AF03BC3FF68") {
        $(".home_properties").hide();
        $(".home_properties").attr("disabled", true);
        $(".input_home_properties").removeAttr("required");
    } else {
        $(".home_properties").show();
        $(".home_properties").attr("disabled", false);
        $(".input_home_properties").attr("required");
    }
    $("#Type").change(function () {
        if ($("#Type").val() == "F03BA431-43A6-40C7-BD10-4FB9B0995A68" || $("#Type").val() == "CE1E1A5D-E4DA-48B1-A6F7-691B5207475F" || $("#Type").val() == "1EDBFAD2-6D05-4BDA-8FD6-AEA14B6B1BF8" || $("#Type").val() == "25600C82-BBC2-486C-926D-5AF03BC3FF68") {
            $(".home_properties").hide();
            $(".home_properties").attr("disabled", true);
            $(".input_home_properties").removeAttr("required");
        } else {
            $(".home_properties").show();
            $(".home_properties").attr("disabled", false);
            $(".input_home_properties").attr("required");
        }
    });
    $(".col-md-6").css('float', 'right');

</script>

<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCoB68k4mJsqBcL_GomhhaDHVJhgXfbcik&callback=initMap&language=ar&region=SY&v=3.35&libraries=places ">
</script>
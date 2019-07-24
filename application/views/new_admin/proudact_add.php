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
        <?php echo _productAdd ?>
    </h1>
</section>
<form data-parsley-validate class="add_pro" action="#" method="post" enctype="multipart/form-data">
    <input type="hidden" id="meridian" name="meridian">
    <input type="hidden" id="latitude" name="latitude">
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
                        <input class="inpr form-control" type="file" name="upload[]" multiple/>
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
                                    <option value="<?php echo $governorates['id']; ?>"><?php echo $governorates['name']; ?></option>
                                <?php } ?>
                            </select>
                            <b class="text-danger"><?= @form_error('Governorate', '<div class="error">', '*</div>'); ?></b>
                        </div>
                        <div class="col-md-6">
                            <label for="Governorate">المنطقة</label>
                            <input type="text" name="area" class="form-control" value="">
                            <b class="text-danger"><?php echo @form_error('area', '<div class="error">', '*</div>'); ?></b>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="type"><?php echo $this->lang->line('ownership') ?></label>
                                <select name="Ownership" id="Ownership" class="form-control select2">
                                    <?php foreach ($ownership as $value) { ?>
                                        <option value="<?php echo $value['id']; ?>"><?php echo $value['text']; ?></option>
                                    <?php } ?>
                                </select>
                                <b class="text-danger"><?php echo @form_error('Ownership', '<div class="error">', '*</div>'); ?></b>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="type"><?php echo $this->lang->line('type') ?></label>
                                <select name="Type" id="Type" class="form-control select2">
                                    <?php foreach ($type as $value) { ?>
                                        <option value="<?php echo $value['id']; ?>"><?php echo $value['text']; ?></option>
                                    <?php } ?>
                                </select>
                                <b class="text-danger"><?php echo @form_error('Type', '<div class="error">', '*</div>'); ?></b>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="type"><?php echo $this->lang->line('tapu') ?></label>
                                <select name="tapu" class="form-control select2">
                                    <?php foreach ($tapu as $value) { ?>
                                        <option value="<?php echo $value['id']; ?>"><?php echo $value['text']; ?></option>
                                    <?php } ?>
                                </select>
                                <b class="text-danger"><?php echo @form_error('$tapu', '<div class="error">', '*</div>'); ?></b>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nameEn"><?php echo $this->lang->line('properties') ?></label>
                                <select name="TypeOfProperty" class="form-control">
                                    <?php foreach ($properties as $property) { ?>
                                        <option value="<?php echo $property['id']; ?>"><?php echo $property['text']; ?></option>
                                    <?php } ?>
                                </select>
                                <b class="text-danger"><?php echo @form_error('TypeOfProperty', '<div class="error">', '*</div>'); ?></b>

                            </div>
                        </div>
                    </div>

                </div>


            </div>
            <div class="box box-primary">
                <div class="box-header">
                    مواصفات
                </div>
                <div class="box-body" style="direction: rtl">
                    <div class="col-md-6 home_properties">
                        <div class="form-group">
                            <label for="TypeOfProperty"><?php echo $this->lang->line('numbrsOfRooms') ?></label>
                            <input type="number" name="NumOfRooms" class="form-control input_home_properties"
                                   data-parsley-error-message="<?php echo _required ?>">
                            <b class="text-danger"><?php echo @form_error('NumOfRooms', '<div class="error">', '*</div>'); ?></b>
                        </div>
                    </div>
                    <div class="col-md-6 home_properties">
                        <div class="form-group">
                            <label for="NumOfBathRooms"><?php echo $this->lang->line('BATHROOMS') ?></label>
                            <input type="number" name="NumOfBathRooms" class="form-control input_home_properties"
                                   data-parsley-error-message="<?php echo _required ?>">
                            <b class="text-danger"><?php echo @form_error('NumOfBathRooms', '<div class="error">', '*</div>'); ?></b>

                        </div>
                    </div>
                    <div class="col-md-6 ">
                        <div class="form-group">
                            <label for="TypeOfProperty"><?php echo $this->lang->line('AREA') ?></label>
                            <input type="number" name="AreaSpace" class="form-control "
                                   data-parsley-error-message="<?php echo _required ?>">
                            <b class="text-danger"><?php echo @form_error('AreaSpace', '<div class="error">', '*</div>'); ?></b>
                        </div>
                    </div>
                    <div class="col-md-6 home_properties">
                        <div class="form-group">
                            <label for="TypeOfProperty"><?php echo $this->lang->line('floor') ?></label>
                            <input type="number" name="Floor" class="form-control input_home_properties"
                                   data-parsley-error-message="<?php echo _required ?>">
                            <b class="text-danger"><?php echo @form_error('Floor', '<div class="error">', '*</div>'); ?></b>
                        </div>
                    </div>
                    <div class="col-md-6 home_properties">
                        <div class="form-group">
                            <label for="nameEn"><?php echo $this->lang->line('cladding') ?></label>
                            <select name="TypeOfCladding" class="form-control select2 input_home_properties">
                                <?php foreach ($cladding as $value) { ?>
                                    <option value="<?php echo $value['id']; ?>"><?php echo $value['text']; ?></option>
                                <?php } ?>
                            </select>
                            <b class="text-danger"><?php echo @form_error('TypeOfCladding', '<div class="error">', '*</div>br'); ?></b>
                        </div>
                    </div>
                    <div class="col-md-6" id="period_time">
                        <div class="form-group">
                            <label for="nameEn">فترة الزمنية</label>
                            <select name="PeriodTime" class="form-control select2">
                                <?php foreach ($ownership as $value) {
                                    if ($value['id'] == '010A6B80-26E9-477E-BEDC-E89D0BFA8BA3') { ?>
                                        <?php foreach ($value['period_time'] as $key => $item) { ?>
                                            <option value="<?php echo $key; ?>"><?php echo $item; ?></option>
                                        <?php } ?>
                                    <?php }
                                    ?>


                                <?php } ?>
                            </select>
                            <b class="text-danger"><?php echo @form_error('PeriodTime', '<div class="error">', '*</div>'); ?></b>

                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <lable><b><?php echo $this->lang->line('ADDRESS') ?></b></lable>
                            <input type="text" class="form-control"
                                   data-parsley-error-message="<?php echo _required ?>" id="AddressAr" name="AddressAr"
                                   placeholder="<?php echo $this->lang->line('ADDRESS') ?>">
                            <b class="text-danger"><?php echo @form_error('AddressAr', '<div class="error">', '*</div>'); ?></b>

                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <lable><b><?php echo $this->lang->line('PROPERTYDESCRIPTION') ?></b></lable>
                            <textarea name="DescriptionAr" id="DescriptionAr" style="resize: unset" cols="30" rows="4"
                                      class="form-control"
                                      placeholder="<?php echo $this->lang->line('PROPERTYDESCRIPTION') ?>"></textarea>
                            <b class="text-danger"><?php echo @form_error('DescriptionAr', '<div class="error">', '*</div>'); ?></b>
                        </div>
                    </div>
                    <div class="col-md-6 home_properties">
                        <div class="form-group">
                            <label for=""> موقف خاص :</label>
                            <input type="radio" id="non_Parking" class="radio_checker input_home_properties" checked
                                   value="0" name="Parking" placeholder=" ">
                            <label for="non_Parking">
                                لا يوجد

                            </label>
                            <input type="radio" id="yesParking" class="radio_checker input_home_properties" value="1"
                                   name="Parking" placeholder=" ">
                            <label for="yesParking">
                                يوجد

                            </label>


                        </div>
                        <b class="text-danger"><?php echo @form_error('Parking', '<div class="error">', '*</div>'); ?></b>

                    </div>
                    <div class="col-md-6 home_properties">
                        <div class="form-group">
                            <label for="">مفروش :</label>
                            <input type="radio" id="non_Furnished" class="radio_checker input_home_properties" checked
                                   value="0" name="Furnished" placeholder=" ">
                            <label for="non_Furnished">
                                لا

                            </label>
                            <input type="radio" id="yes_Furnished" class="radio_checker input_home_properties" value="1"
                                   name="Furnished" placeholder=" ">
                            <label for="yes_Furnished">
                                نعم

                            </label>


                        </div>
                        <b class="text-danger"><?php echo @form_error('Furnished', '<div class="error">', '*</div>'); ?></b>

                    </div>
                    <div class="col-md-6 home_properties">
                        <div class="form-group">
                            <label for="">أنترفون :</label>
                            <input type="radio" id="non_Interphone" class="radio_checker input_home_properties" checked
                                   name="Interphone" placeholder=" ">
                            <label for="non_Interphone">
                                لا يوجد

                            </label>
                            <input type="radio" id="yes_Interphone" class="radio_checker input_home_properties"
                                   name="Interphone" placeholder=" ">
                            <label for="yes_Interphone">
                                يوجد

                            </label>


                        </div>
                        <b class="text-danger"><?php echo @form_error('Interphone', '<div class="error">', '*</div>'); ?></b>

                    </div>
                    <div class="col-md-6 home_properties">
                        <div class="form-group">
                            <label for=""><?php echo $this->lang->line('elevator') ?> :</label>
                            <label for="non_elevator">
                                لا يوجد
                                <input type="radio" id="non_elevator" class="radio_checker input_home_properties"
                                       checked name="Elevator" placeholder=" ">

                            </label>
                            <label for="yes_elevator">
                                يوجد
                                <input type="radio" id="yes_elevator" class="radio_checker input_home_properties"
                                       name="Elevator" placeholder=" ">

                            </label>


                        </div>
                        <b class="text-danger"><?php echo @form_error('Elevator', '<div class="error">', '*</div>'); ?></b>

                    </div>
                    <div class="col-md-6">
                        <label for=""><?php echo $this->lang->line('price') ?></label>
                        <input type="text" class="form-control" name="PriceOfMeter">
                        <b class="text-danger"><?php echo @form_error('PriceOfMeter', '<div class="error">', '*</div>'); ?></b>

                    </div>

                    <div class="col-md-6 home_properties">
                        <label for=""><?php echo $this->lang->line('summer') ?></label>
                        <input type="text" class="form-control input_home_properties" name="Summer">
                        <b class="text-danger"><?php echo @form_error('Summer', '<div class="error">', '*</div>'); ?></b>

                    </div>
                    <div class="col-md-6 col-md-offset-6 home_properties">
                        <label for=""><?php echo $this->lang->line('winter') ?></label>
                        <input type="text" class="form-control input_home_properties" name="Winter">
                        <b class="text-danger"><?php echo @form_error('Winter', '<div class="error">', '*</div>'); ?></b>
                    </div>
                    <?php if (isset($_SESSION['admin']) && $_SESSION['admin'] == 1) { ?>
                        <div class="col-md-6">
                            <label for=""><?php echo $this->lang->line('GSM') ?></label>
                            <input type="text" class="form-control input_home_properties" name="GSM">
                            <b class="text-danger"><?php echo @form_error('GSM', '<div class="error">', '*</div>'); ?></b>
                        </div>
                        <div class="col-md-6">
                            <label for=""><?php echo $this->lang->line('Name') ?></label>
                            <input type="text" class="form-control input_home_properties" name="Name">
                            <b class="text-danger"><?php echo @form_error('Name', '<div class="error">', '*</div>'); ?></b>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="box box-primary">
                <div class="box-header"><b>خريطة</b></div>
                <div class="box-body">


                        <div class="col-md-12">
                            <input id="searchTextField"   class="form-control form-control-sm" onkeydown="return event.key != 'Enter';" type="text">

                        </div>
                    <div class="col-md-12">
                        <div id="map" class="col-md-12" data-lng="" data-lat="">

                        </div>

                    </div>
                    <b class="text-danger"><?php echo @form_error('meridian', '<div class="error">', '*</div>'); ?></b>

                    <hr>
                    <br>
                    <br>
                    <br>
                    <button type="submit" class="btn btn-primary sub" id="submit_pro"
                            style="margin-top:20px "><?php echo _save ?></button>
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
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCoB68k4mJsqBcL_GomhhaDHVJhgXfbcik&callback=initMap&language=ar&region=SY&v=3.35&libraries=places ">
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
<style>
    .error {
        font-weight: bold;
    }
</style>
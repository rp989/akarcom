<style>
    select,input{
        float: right;
    }
    #map {
        height: 425px;
    }
</style>
<div class="container admin">
    <div class="pageName">
        <?php echo _productAdd ?>
    </div>
    <div class="row">
        <form data-parsley-validate class="add_pro" action="#" method="post" enctype="multipart/form-data">
            <div class="form-group file-area">
                <div id="file-area">
                    <div class="col-xs-2">
                        <label for="fax">الصورة الخارجية</label>
                    </div>
                    <div class="col-xs-10">
                        <div id="imgs-upload" style="display: flex;">
                        </div>
                        <div class="clearfix"></div>
                        <div class=" input-group ms">
                         <span class="input-group-btn">
                            <span class="btn btn-primary btn-file inpr">
                                <?php echo _browse ?> <input class="inpr" type="file" name="uploadMain[]" />
                            </span>
                         </span>
                            <input type="text" class="form-control inpr" readonly placeholder="1000*300.jpg" />
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group file-area">
                <div id="file-area">
                    <div class="col-xs-2">
                        <label for="fax"><?php echo _image ?></label>
                    </div>
                    <div class="col-xs-10">
                        <div id="imgs-upload" style="display: flex;">
                        </div>
                        <div class="clearfix"></div>
                        <div class=" input-group ms">
                         <span class="input-group-btn">
                            <span class="btn btn-primary btn-file inpr">
                                <?php echo _browse ?> <input class="inpr" type="file" name="upload[]" multiple />
                            </span>
                         </span>
                            <input type="text" class="form-control inpr" readonly placeholder="1000*300.jpg" />
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-xs-2">
                    <label for="nameEn"><?php echo $this->lang->line('governorates') ?></label>
                </div>
                <div class="col-xs-10">
                    <select name="Governorate">
                        <?php foreach ($governorates as $governorates) { ?>
                            <option value="<?php echo $governorates['id']; ?>"><?php echo $governorates['name']; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <div class="col-xs-2">
                    <label for="nameEn"><?php echo $this->lang->line('ownership') ?></label>
                </div>
                <div class="col-xs-10">
                    <select name="Ownership">
                        <?php foreach ($ownership as $value) { ?>
                            <option value="<?php echo $value['id']; ?>"><?php echo $value['text']; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <div class="col-xs-2">
                    <label for="nameEn"><?php echo $this->lang->line('type') ?></label>
                </div>
                <div class="col-xs-10">
                    <select name="Type">
                        <?php foreach ($type as $value) { ?>
                            <option value="<?php echo $value['id']; ?>"><?php echo $value['text']; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <div class="col-xs-2">
                    <label for="nameEn"><?php echo $this->lang->line('tapu') ?></label>
                </div>
                <div class="col-xs-10">
                    <select name="tapu">
                        <?php foreach ($tapu as $value) { ?>
                            <option value="<?php echo $value['id']; ?>"><?php echo $value['text']; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <div class="col-xs-2">
                    <label for="nameEn"><?php echo $this->lang->line('properties') ?></label>
                </div>
                <div class="col-xs-10">
                    <select name="TypeOfProperty">
                        <?php foreach ($properties as $property) { ?>
                            <option value="<?php echo $property['id']; ?>"><?php echo $property['text']; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <div class="col-xs-2">
                    <label for="nameEn"><?php echo $this->lang->line('numbrsOfRooms') ?></label>
                </div>
                <div class="col-xs-10">
                    <input type="number" name="NumOfRooms" required=""
                           data-parsley-error-message="<?php echo _required ?>">
                </div>
            </div>

            <div class="form-group">
                <div class="col-xs-2">
                    <label for="nameEn"><?php echo $this->lang->line('BATHROOMS') ?></label>
                </div>
                <div class="col-xs-10">
                    <input type="number" name="NumOfBathRooms" required=""
                           data-parsley-error-message="<?php echo _required ?>">
                </div>
            </div>

            <div class="form-group">
                <div class="col-xs-2">
                    <label for="nameEn"><?php echo $this->lang->line('AREA') ?></label>
                </div>
                <div class="col-xs-10">
                    <input type="number" name="AreaSpace" required=""
                           data-parsley-error-message="<?php echo _required ?>">
                </div>
            </div>

            <div class="form-group">
                <div class="col-xs-2">
                    <label for="nameEn"><?php echo $this->lang->line('floor') ?></label>
                </div>
                <div class="col-xs-10">
                    <input type="number" name="Floor" required=""
                           data-parsley-error-message="<?php echo _required ?>">
                </div>
            </div>

            <div class="form-group">
                <div class="col-xs-2">
                    <label for="nameEn"><?php echo $this->lang->line('cladding') ?></label>
                </div>
                <div class="col-xs-10">
                    <select name="TypeOfCladding">
                        <?php foreach ($cladding as $value) { ?>
                            <option value="<?php echo $value['id']; ?>"><?php echo $value['text']; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>


            <div class="form-group">
                <div class="col-xs-2">
                    <label for="nameEn">PeriodTime</label>
                </div>
                <div class="col-xs-10">
                    <select name="PeriodTime">
                        <?php foreach ($ownership as $value) {
                            if ($value['id'] == '010A6B80-26E9-477E-BEDC-E89D0BFA8BA3') { ?>
                                <?php foreach ($value['period_time'] as $key => $item) { ?>
                                    <option value="<?php echo $key; ?>"><?php echo $item; ?></option>
                                <?php } ?>
                            <?php }
                            ?>


                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <div class="col-xs-2">
                    <label for="nameEn"><?php echo $this->lang->line('ADDRESS') ?></label>
                </div>
                <div class="col-xs-10">
                    <input type="text" class="form-control" style="direction: ltr" required=""
                           data-parsley-error-message="<?php echo _required ?>" id="AddressAr" name="AddressAr"
                           placeholder="<?php echo $this->lang->line('ADDRESS') ?>">
                </div>
            </div>

            <div class="form-group">
                <div class="col-xs-2">
                    <label for="nameEn"><?php echo $this->lang->line('PROPERTYDESCRIPTION') ?></label>
                </div>
                <div class="col-xs-10">
                    <input type="text" class="form-control" style="direction: ltr" required=""
                           data-parsley-error-message="<?php echo _required ?>" id="DescriptionAr" name="DescriptionAr"
                           placeholder="<?php echo $this->lang->line('PROPERTYDESCRIPTION') ?>">
                </div>
            </div>
                    <input type="hidden" class="form-control" name="meridian" style="direction: ltr" required=""
                           data-parsley-error-message="<?php echo _required ?>" id="meridian" placeholder="meridian">
                    <input type="hidden" class="form-control" name="latitude" style="direction: ltr" required=""
                           data-parsley-error-message="<?php echo _required ?>" id="latitude" placeholder="latitude">

            <div class="form-group">
                <div class="col-xs-2">
                    <label for="nameEn"><?php echo $this->lang->line('Furnished') ?></label>
                </div>
                <div class="col-xs-10">
                    <select name="Furnished">
                        <option value="1">نعم</option>
                        <option value="0">لا</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <div class="col-xs-2">
                    <label for="nameEn"><?php echo $this->lang->line('parking') ?></label>
                </div>
                <div class="col-xs-10">
                    <select name="Parking">
                        <option value="1">نعم</option>
                        <option value="0">لا</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <div class="col-xs-2">
                    <label for="nameEn"><?php echo $this->lang->line('interphone') ?></label>
                </div>
                <div class="col-xs-10">
                    <select name="Interphone">
                        <option value="1">نعم</option>
                        <option value="0">لا</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <div class="col-xs-2">
                    <label for="nameEn"><?php echo $this->lang->line('price') ?></label>
                </div>
                <div class="col-xs-10">
                    <input type="text" class="form-control" name="PriceOfMeter" required=""
                           data-parsley-error-message="<?php echo _required ?>">
                </div>
            </div>



            <div class="form-group">
                <div class="col-xs-2">
                    <label for="nameEn"><?php echo $this->lang->line('floor') ?></label>
                </div>
                <div class="col-xs-10">
                    <input type="text" class="form-control" style="direction: ltr" name="Elevator" required=""
                           data-parsley-error-message="<?php echo _required ?>" id="Elevator" placeholder="<?php echo $this->lang->line('elevator') ?>">
                </div>
            </div>

            <div class="form-group">
                <div class="col-xs-2">
                    <label for="nameEn"><?php echo $this->lang->line('summer') ?></label>
                </div>
                <div class="col-xs-10">
                    <input type="text" class="form-control" style="direction: ltr" name="Summer"
                           data-parsley-error-message="<?php echo _required ?>" id="Summer" placeholder="<?php echo $this->lang->line('summer') ?>">
                </div>
            </div>

            <div class="form-group">
                <div class="col-xs-2">
                    <label for="nameEn"><?php echo $this->lang->line('winter') ?></label>
                </div>
                <div class="col-xs-10">
                    <input type="text" class="form-control" style="direction: ltr" name="Winter"
                           data-parsley-error-message="<?php echo _required ?>" id="Winter" placeholder="<?php echo $this->lang->line('winter') ?>">
                </div>
            </div>

            <div class="form-group">
                <div class="col-xs-2">
                    <label for="nameEn"><?php echo $this->lang->line('GSM') ?></label>
                </div>
                <div class="col-xs-10">
                    <input type="text" class="form-control" style="direction: ltr" name="GSM" required=""
                           data-parsley-error-message="<?php echo _required ?>" id="GSM" placeholder="<?php echo $this->lang->line('GSM') ?>">
                </div>
            </div>

            <div class="form-group">
                <div class="col-xs-2">
                    <label for="nameEn"><?php echo $this->lang->line('Name') ?></label>
                </div>
                <div class="col-xs-10">
                    <input type="text" class="form-control" style="direction: ltr" name="Name" required=""
                           data-parsley-error-message="<?php echo _required ?>" id="Name" placeholder="<?php echo $this->lang->line('Name') ?>">
                </div>
            </div>

            <div id="map" data-lng="" data-lat="" ></div>

            <div class="col-xs-2"></div>
            <div class="col-xs-10">
                <button type="submit" class="btn btn-success sub" id="submit_pro"
                        style="margin-top:20px "><?php echo _save ?></button>
            </div>
        </form>
    </div>
</div>
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
        google.maps.event.addListener(map, 'click', function(event) {
            placeMarker(event.latLng,map);
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
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCoB68k4mJsqBcL_GomhhaDHVJhgXfbcik&callback=initMap">
</script>
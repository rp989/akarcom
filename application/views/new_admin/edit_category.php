
<?php
include_once "include/templet/nav.php";


?>

<div class="container admin">
    <div class="pageName">
        <?php echo _editCategory ?>
    </div>
    <div class="row">
        <form  data-parsley-validate class="edit_cat">


            <div class="form-group">
                <div class="col-xs-2">
                    <label for=""><?php echo _catEn?></label>
                </div>
                <div class="col-xs-10">
                    <input type="text" class="form-control" id="catEn"   style="direction: ltr" required="" data-parsley-error-message="<?php echo _required?>" value="" placeholder="<?php echo _catEn ?>">
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-2">
                    <label for=""><?php echo _catGr?></label>
                </div>
                <div class="col-xs-10">
                    <input type="text" class="form-control" id="catGr"   style="direction: ltr" required="" data-parsley-error-message="<?php echo _required?>" value="" placeholder="<?php echo _catGr ?>">
                </div>
            </div>

            <div class="form-group">
                <div class="col-xs-2">
                    <label for=""><?php echo _catAr ?></label>
                </div>
                <div class="col-xs-10">
                    <input type="text" class="form-control"  style="direction: rtl" required="" data-parsley-error-message="<?php echo _required?>" value="" id="catAr"  placeholder="<?php echo _catAr ?>">
                </div>
            </div>

            <div class="col-xs-2"></div>
            <div class="col-xs-10">
                <button type="submit" class="btn btn-success sub" id="submit_cat" style="margin-top:20px "><?php echo _save ?></button>
            </div>

        </form>
    </div>

</div>
<div class="load hidden">
    <div class="pageload-overlay"><?php echo _loading?></div>
</div>

<script src="assets/js/edit_category.js"></script>
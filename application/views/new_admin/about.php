<?php

include_once "include/templet/nav.php";

?>

<div class="container admin">
    <div class="pageName">
        <?php echo _about ?>
    </div>
    <div class="row">
        <form  data-parsley-validate class="about">
            <div class="form-group">
                <div class="col-xs-2">
                    <label for="address"><?php echo _address?></label>
                </div>
                <div class="col-xs-10">
                    <div class="range-slider"><span>from
    <input type="number" value="25000" min="0" max="120000"/>	to
    <input type="number" value="50000" min="0" max="120000"/></span>
                        <input value="25000" min="0" max="120000" step="500" type="range"/>
                        <input value="50000" min="0" max="120000" step="500" type="range"/>
                        <svg width="100%" height="24">
                            <line x1="4" y1="0" x2="300" y2="0" stroke="#444" stroke-width="12" stroke-dasharray="1 28"></line>
                        </svg>
                    </div>                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-2">
                    <label for="address"><?php echo _address?></label>
                </div>
                <div class="col-xs-10">
                    <textarea  class="form-control inpr" id="address" required="" data-parsley-error-message="<?php echo _required?>" placeholder="<?php echo _address?>"></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-2">
                    <label for="email"><?php echo _email ?></label>
                </div>
                <div class="col-xs-10">
                    <input type="email"  class="form-control inpr" id="email" data-parsley-error-message="<?php echo _required?>" placeholder="<?php echo _email ?>" value="" data-parsley-type-message="<?php echo _enterEmailError?>"/>
                </div>
            </div>
             <div class="form-group">
                <div class="col-xs-2">
                    <label for="mobile"><?php echo _mobile?></label>
                </div>
                <div class="col-xs-10">
                    <input type="tel" class="form-control inpr" id="mobile" value="" placeholder="<?php echo _mobile ?>">
                </div>
            </div>

  <div class="form-group">
                <div class="col-xs-2">
                    <label for="tel"><?php echo _tel?></label>
                </div>
                <div class="col-xs-10">
                    <input type="tel" class="form-control inpr" id="tel" value="" placeholder="<?php echo _tel ?>">
                </div>
            </div>

  <div class="form-group">
                <div class="col-xs-2">
                    <label for="fax"><?php echo _fax?></label>
                </div>
                <div class="col-xs-10">
                    <input type="tel" class="form-control inpr" id="fax"  value=""placeholder="<?php echo _fax ?>">
                </div>
            </div>

 <div class="form-group">
                <div class="col-xs-2">
                    <label for="fb"><?php echo _fb ?></label>
                </div>
                <div class="col-xs-10">
                    <input type="text" class="form-control inpr" id="fb" value="" placeholder="<?php echo _fb ?>">
                </div>
            </div>
<div class="form-group">
                <div class="col-xs-2">
                    <label for="yt"><?php echo _yt?></label>
                </div>
                <div class="col-xs-10">
                    <input type="text" class="form-control inpr" id="yt" value="" placeholder="<?php echo _yt ?>">
                </div>
            </div>
<div class="form-group">
                <div class="col-xs-2">
                    <label for="tw"><?php echo _tw ?></label>
                </div>
                <div class="col-xs-10">
                    <input type="text" class="form-control inpr" id="tw" value="" placeholder="<?php echo _tw ?>">
                </div>
            </div>
<div class="form-group">
                <div class="col-xs-2">
                    <label for="other"><?php echo _other ?></label>
                </div>
                <div class="col-xs-10">
                    <input type="text" class="form-control inpr" id="other" value="" placeholder="<?php echo _other ?>">
                </div>
            </div>


            <div class="col-xs-2"></div>
            <div class="col-xs-10">
            <button type="submit" class="btn btn-success sub" id="submit_about" style="margin-top:20px "><?php echo _save ?></button>
            </div>

        </form>
    </div>

</div>
<div class="load hidden">
    <div class="pageload-overlay"><?php echo _loading?></div>
</div>

<script src="assets/js/about.js"></script>
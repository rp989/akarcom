<?php
include_once "include/templet/nav.php";

?>

<div class="container admin" >
    <div class="pageName">
        <?php echo _categoriesList ?>
    </div>
    <div class="row">
        <table id="cat" class="table table-striped table-bordered" style="width:100%">
            <thead>
            <tr>
                <th class="tablee"><?php echo _catEn?></th>
                <th class="tablee"><?php echo _catGr?></th>
                <th class="tablee"><?php echo _catAr?></th>
                <th class="tablee"style="width: 80px;"></th>


            </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
</div>


<script src="assets/js/categories_list.js"></script>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<?php

include('header.php');
?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require('../Database/_delete-categories.php');
}
?>

<body>
<?php

include('sub-menu.php');

include('menuAdmin.php');
?>
<!-- /. NAV SIDE  -->
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Admin Dashboard</h2>
                <h5>Welcome ! Tung Huynh, Love to see you back. </h5>
            </div>
        </div>

        <!-- /. ROW  -->
        <hr/>
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-6">

                <table class="table table-hover">
                    <form action="_delete-categories.php" method="POST" enctype="multipart/form-data" id="add-categories-form">
                        <?php
                        $item_id = $_GET['brand_id'] ?? 1;
                        foreach ($categories->getData() as $item):
                            if ($item['brand_id'] == $item_id):
                                ?>
                                <tr>
                                    <th><label for="namecategories">Name Categories: </label></th>
                                    <td><input type="text" placeholder="Name Categories" id="namecategories" name="namecategories"
                                               value=<?php echo($item["brand_name"] ?? 'default') ?>></td>
                                </tr>
                                <input type="text" id="idcategories" name="idcategories"
                                       value=<?php echo($item["brand_id"] ?? 'default') ?> hidden>


                                <tr>
                                    <td></td>
                                    <td><input type="submit" value="Delete Categories"></td>
                                </tr>
                            <?php
                            endif;
                        endforeach;
                        ?>

                    </form>
                </table>


            </div>

        </div>

    </div>
    <!-- /. PAGE WRAPPER  -->
</div>
<?php

include('footer.php');
?>

</body>
</html>

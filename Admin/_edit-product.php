<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<?php

include('header.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require('../Database/_edit-Product.php');
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
                <h5>Welcome ! <?php echo $user_admin['first_name'] . " " . $user_admin['last_name'] ?? 'Tung Huynh' ?>,
                    Love to see you back.
                </h5>
            </div>
        </div>

        <!-- /. ROW  -->
        <hr/>
        <div class="container-fluid justify-content-center">
            <div class="row">
                <div class="col-12 col-lg-offset-1">
                    <table class="table table-hover" style="width: 40vw;">
                        <form action="_edit-product.php" method="POST" enctype="multipart/form-data" id="add-product-form">
                            <?php
                            $item_id = $_GET['item_id'] ?? 1;
                            foreach ($product->getData() as $item):
                                if ($item['item_id'] == $item_id):
                                    ?>
                                    <tr>
                                        <th><label for="nameproduct">Product Name: </label></th>
                                        <td><input type="text" placeholder="Name Product" id="nameproduct" name="nameproduct"
                                                   value="<?php echo($item["item_name"] ?? 'default') ?>"></td>
                                    </tr>
                                    <input type="text" id="idproduct" name="idproduct"
                                           value=<?php echo($item["item_id"] ?? 'default') ?> hidden>
                                    <tr>
                                        <th><label for="brand">Brand Product:</label></th>
                                        <td><input type="text" placeholder="Brand" id="brand" name="brand"
                                                   value="<?php echo($item["item_brand"] ?? 'default') ?>"></td>
                                    </tr>
                                    <tr>
                                        <th>Description</th>
                                        <td>
                                            <textarea id="basic-example" name="description">
                                                <?php echo($item["item_desc"] ?? 'default') ?>
                                            </textarea>
                                            <br>
                                            <br>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th><span>Memory:</span></th>
                                        <td><input type="text" placeholder="Memory" id="memory" name="memory"
                                                   value="<?php echo($item["item_memory"] ?? 'default') ?>"></td>
                                    </tr>
                                    <tr>
                                        <th><span>CPU:</span></th>
                                        <td><input type="text" placeholder="CPU" id="cpu" name="cpu"
                                                   value="<?php echo($item["item_cpu"] ?? 'default') ?>"></td>
                                    </tr>
                                    <tr>
                                        <th><span>GPU:</span></th>
                                        <td><input type="text" placeholder="GPU" id="gpu" name="gpu"
                                                   value="<?php echo($item["item_gpu"] ?? 'default') ?>"></td>
                                    </tr>
                                    <tr>
                                        <th><span>Drive:</span></th>
                                        <td><input type="text" placeholder="Drive" id="drive" name="drive"
                                                   value="<?php echo($item["item_drive"] ?? 'default') ?>"></td>
                                    </tr>
                                    <tr>
                                        <th><span>Moniter:</span></th>
                                        <td><input type="text" placeholder="Moniter" id="moniter" name="moniter"
                                                   value="<?php echo($item["item_monitor"] ?? 'default') ?>"></td>
                                    </tr>
                                    <tr>
                                        <th><span>OS:</span></th>
                                        <td><input type="text" placeholder="OS" id="os" name="os"
                                                   value="<?php echo($item["item_os"] ?? 'default') ?>"></td>
                                    </tr>


                                    <tr>
                                        <th><label for="image">Image Product:</label></th>
                                        <td>
                                            <div>
                                                <?php
                                                $image = $item['item_image'];
                                                $image1 = "." . $image;
                                                ?>
                                                <img src="<?php echo($image1) ?>" alt="" height="100px" width="auto">
                                            </div>
                                            <div>
                                                <input type="file" class="form-control-file" name="profileUpload" id="upload-profile"
                                                       value="">

                                                <input type="text" id="profileUpload2" name="profileUpload2"
                                                       value="<?php echo($item["item_image"] ?? 'default') ?>" hidden>
                                            </div>
                                        </td>
                                    </tr>


                                    <tr>
                                        <th><label for="price">Price Product:</label></th>
                                        <td><input type="text" placeholder="Price" id="price" name="price"
                                                   value="<?php echo($item["item_price"] ?? 'default') ?>"></td>
                                    </tr>

                                    <tr>
                                        <th><label for="namediscountpriceproduct">Discount Price:</label></th>
                                        <td><input type="text" placeholder="Discount Price" id="discountprice" name="discountprice"
                                                   value="<?php echo($item["discount_price"] ?? 'default') ?>"></td>
                                    </tr>


                                    <tr>
                                        <td></td>
                                        <td><input type="submit" value="Edit product"></td>
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
        <!-- /. ROW  -->

    </div>
    <!-- /. PAGE WRAPPER  -->

</div>

<!-- Script -->
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script src="../Admin/assets/js/_form-description.js"></script>

<?php
include('footer.php');
?>

</body>
</html>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<?php
include('header.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require('../Database/_add-Product.php');
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
        <div class="row">
            <div class="col-md-8 col-lg-offset-1">
                <table class="table table-hover" style="width: 40vw;">
                    <form action="_create-product.php" method="POST" enctype="multipart/form-data" id="add-product-form">
                        <tr>
                            <th><label for="nameproduct">Name Product: </label></th>
                            <td><input type="text" placeholder="Name Product" id="nameproduct" name="nameproduct" value=></td>
                        </tr>
                        <tr>
                            <th><label for="brand">Brand Product:</label></th>
                            <td>
                                <select name="brand" id="brand">
                                    <?php foreach ($categories_import as $item) { ?>
                                        <option
                                                value="<?php echo $item['brand_name'] ?? "Default"; ?>"><?php echo $item['brand_name'] ?? "Default"; ?>
                                        </option>
                                    <?php } //closing foreach function?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>Description</th>
                            <td>
                                <textarea id="basic-example" name="description"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <th><span>Memory:</span></th>
                            <td><input type="text" placeholder="Memory" id="memory" name="memory" value=></td>
                        </tr>
                        <tr>
                            <th><span>CPU:</span></th>
                            <td><input type="text" placeholder="CPU" id="cpu" name="cpu" value=></td>
                        </tr>
                        <tr>
                            <th><span>GPU:</span></th>
                            <td><input type="text" placeholder="GPU" id="gpu" name="gpu" value=></td>
                        </tr>
                        <tr>
                            <th><span>Drive:</span></th>
                            <td><input type="text" placeholder="Drive" id="drive" name="drive" value=></td>
                        </tr>
                        <tr>
                            <th><span>Moniter:</span></th>
                            <td><input type="text" placeholder="Moniter" id="moniter" name="moniter" value=></td>
                        </tr>
                        <tr>
                            <th><span>OS:</span></th>
                            <td><input type="text" placeholder="OS" id="os" name="os" value=></td>
                        </tr>
                        <tr>
                            <th><label for="image">Image Product:</label></th>
                            <td>
                                <div>
                                    <input type="file" class="form-control-file" name="profileUpload" id="upload-profile">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th><label for="price">Price Product:</label></th>
                            <td><input type="text" placeholder="Price" id="price" name="price" value=></td>
                        </tr>
                        <tr>
                            <th><label for="namediscountpriceproduct">Discount Price:</label></th>
                            <td><input type="text" placeholder="Discount Price" id="discountprice" name="discountprice" value=></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" value="Add Product"></td>
                        </tr>
                    </form>
                </table>
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

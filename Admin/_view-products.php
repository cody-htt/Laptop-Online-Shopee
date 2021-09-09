<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<?php

include('header.php');
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
            <div class="col-md-8 col-lg-offset-1">
                <a href="_create-product.php">Create</a>
                <br>
                <br>
                <table class="table table-hover py-5" style="width: 45vw;">
                    <tr>
                        <!-- Name -->
                        <th scope="col">
                            <span> Name Product </span>
                        </th>

                        <!-- Price -->
                        <th scope="col">
                            <span> Price </span>
                        </th>

                        <th scope="col">
                            <span></span>
                        </th>
                        <th scope="col">
                            <span></span>
                        </th>

                    </tr>
                    <?php foreach ($product_import as $item) { ?>
                        <tr>
                            <td scope="row">
                                <span><?php echo $item['item_name'] ?? "Default"; ?></span>
                            </td>
                            <td>
                                <span>$ <?php echo $item['item_price'] ?? "0"; ?></span>
                            </td>
                            <td>
                                <span> <a href="<?php printf('%s?item_id=%s', '_edit-product.php', $item['item_id']); ?>">Edit </a>  </span>
                            </td>
                            <td>
                                <span> <a href="<?php printf('%s?item_id=%s', '_delete-product.php', $item['item_id']); ?>">Delete</a> </span>
                            </td>

                        </tr>
                    <?php } //closing foreach function?>
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

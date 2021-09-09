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
            <div class="col-md-3 col-sm-6 col-xs-6 col-lg-offset-1">
                <a href="_create-categories.php">Create</a>
                <br>
                <br>
                <table class="table table-hover">

                    <tr>
                        <!-- Name -->
                        <th scope="col">
                            <span> Brand Name  </span>
                        </th>

                        <th scope="col">
                            <span></span>
                        </th>
                        <th scope="col">
                            <span></span>
                        </th>

                    </tr>

                    <?php foreach ($categories_import as $item) { ?>
                        <tr>
                            <td scope="row">
                                <span><?php echo $item['brand_name'] ?? "Brand Name"; ?></span>
                            </td>


                            <td>
                                <span> <a href="<?php printf('%s?brand_id=%s', '_edit-categories.php', $item['brand_id']); ?>">Edit </a>  </span>
                            </td>

                            <td>
                                <span> <a href="<?php printf('%s?brand_id=%s', '_delete-categories.php', $item['brand_id']); ?>">Delete</a> </span>
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

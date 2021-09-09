<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<?php

include('header.php');
?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require('../Database/_edit-users-admin.php');
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
                <h5>Welcome ! <?php echo $user_admin['first_name'] . " " . $user_admin['last_name'] ?? 'Tung Huynh'?>,
                    Love to see you back.
                </h5>
            </div>
        </div>

        <!-- /. ROW  -->
        <hr/>
        <div class="row">
            <div class="col-sm-4">
                <table class="table table-hover">
                    <form action="_edit-users-admin.php" method="POST" enctype="multipart/form-data" id="add-product-form">

                        <?php
                        $item_id = $_GET['admin_id'] ?? 1;
                        foreach ($usersAdmin->getData() as $item):
                            if ($item['admin_id'] == $item_id):
                                ?>
                                <tr>
                                    <th><label for="firstname">First Name: </label></th>
                                    <td><input type="text" placeholder="First Name" id="firstname" name="firstname"
                                               value=<?php echo($item["first_name"] ?? 'default') ?>></td>
                                </tr>
                                <input type="text" id="iduser" name="iduser" value=<?php echo($item["admin_id"] ?? 'default') ?> hidden>
                                <tr>
                                    <th><label for="lastname">Last Name:</label></th>
                                    <td><input type="text" placeholder="Last Name" id="lastname" name="lastname"
                                               value=<?php echo($item["last_name"] ?? 'default') ?>></td>
                                </tr>
                                <tr>
                                    <th><label for="user">User:</label></th>
                                    <td><input type="text" placeholder="User" id="user" name="user"
                                               value=<?php echo($item["ad_user"] ?? 'default') ?>></td>
                                </tr>
                                <tr>
                                    <th><label for="password">Password:</label></th>
                                    <td><input type="text" placeholder="Password" id="password" name="password"
                                               value=<?php echo($item["ad_password"] ?? 'default') ?>></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><input type="submit" value="Edit User"></td>
                                </tr>
                            <?php
                            endif;
                        endforeach;
                        ?>

                    </form>
                </table>
            </div>
            <!-- /. ROW  -->

        </div>
    </div>
    <!-- /. PAGE WRAPPER  -->
</div>
<?php

include('footer.php');
?>

</body>
</html>

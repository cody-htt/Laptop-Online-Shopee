<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<?php
include('header.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require('../Database/_add-users-admin.php');
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
            <div class="col-sm-4">
                <table class="table table-hover">
                    <form action="_create-users-admin.php" method="POST" enctype="multipart/form-data" id="add-product-form">
                        <tr>
                            <th><label for="nameproduct">First Name:</label></th>
                            <td><input type="text" placeholder="First Name" id="first_name" name="first_name"></td>
                        </tr>
                        <tr>
                            <th><label for="nameproduct">Last Name:</label></th>
                            <td><input type="text" placeholder="Last Name" id="last_name" name="last_name"></td>
                        </tr>
                        <tr>
                            <th><label for="nameproduct">User:</label></th>
                            <td><input type="text" placeholder="User" id="user" name="user"></td>
                        </tr>
                        <tr>
                            <th><label for="nameproduct">Password:</label></th>
                            <td><input type="text" placeholder="Password" id="password" name="password"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" value="Create User"></td>
                        </tr>
                    </form>
                </table>
            </div>
        </div>
        <!-- /. ROW  -->

    </div>
    <!-- /. PAGE WRAPPER  -->

</div>

<?php
include('footer.php');
?>

</body>
</html>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<?php

include('header.php');

session_start();

//Call for register-helper
require('../Database/_validate-helper.php');

$user_admin = array();
if (isset($_SESSION['admin_id'])) {
    $user_admin = get_admin_info($db->con, $_SESSION['admin_id']);
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
                <h5>Welcome ! <?php echo $user_admin['first_name'] . " " . $user_admin['last_name'] ?? 'Admin'?>
                    , Love to see you back.
                </h5>
            </div>
        </div>

        <!-- /. ROW  -->
        <hr/>
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-6">
                <p> <!-- /. Content  -->  </p>
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

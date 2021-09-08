<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<?php

    include('header.php');
?>
<?php
    session_start();
?>

<?php
//Call for register-helper
require('../Database/_validate-helper.php');

$user = array();
if (isset($_SESSION['admin_id'])) {
    $user = get_user_info($db->con, $_SESSION['admin_id']);
}
?>


<body>
<?php

    include('sub-menu.php');

    include('menuAdmin.php');
?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Admin Dashboard</h2>   
                        <h5>Welcome Jhon Deo , Love to see you back. </h5>
                    </div>
                </div> 

                 <!-- /. ROW  -->
                  <hr />
                <div class="row">
                        <div class="col-md-3 col-sm-6 col-xs-6">           
                            <p> <!-- /. Content  -->  </p>
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

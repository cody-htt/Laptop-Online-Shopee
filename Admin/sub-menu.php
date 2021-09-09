<div id="wrapper">
    <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html">Binary admin</a>
        </div>


        <?php

        if (!empty($_SESSION['admin_id'])) {


            echo "Welcome!" . " " . $user['first_name'] . " " . $user['last_name'] . " ";
            echo '
                        <div style="color: white;
                        padding: 15px 50px 5px 50px;
                        float: right;
                        font-size: 16px;">  &nbsp; <a href="_logout-admin.php" class="btn btn-danger square-btn-adjust">Logout</a> </div>
                    ';


        } else {

            echo '
                        <div style="color: white;
                        padding: 15px 50px 5px 50px;
                        float: right;
                        font-size: 16px;">  &nbsp; <a href="_login-admin.php" class="btn btn-danger square-btn-adjust">Login</a> </div>
                    ';

        }
        ?>



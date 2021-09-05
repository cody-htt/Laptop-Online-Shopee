<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laptop Online Shopee</title>

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Custom CSS Files -->
    <link rel="stylesheet" href="css/custom_style.css">

    <?php
    //Connect to MySQLi
    require('functions.php');
    ?>
</head>
<body>

<?php
session_start();

//Call for register-helper
require('register-helper.php');

$user = array();
if (isset($_SESSION['user_id'])) {
    $user = get_user_info($db->con, $_SESSION['user_id']);
}
?>

<main id="main-area">

    <section id="user-info-site">
        <div class="container">
            <div class="box">
                <span id="glass"></span>
                <div class="content">
                    <div class="update-profile-image pl-3 py-3">
                        <img class="img rounded-circle" style="width: 250px; height: 250px;"
                             src="<?php echo $user['profile_image'] ?? 'assets/avatar/demo-avatar.png'; ?>" alt="avatar">
                    </div>
                    <h4 class="font-rubik py-3 text-center">
                        <?php if (isset($user['first_name'])) {
                            printf('%s %s', $user['first_name'], $user['last_name']);
                        } ?>
                    </h4>
                    <div class="user-info px-3">
                        <ul class="font-ubuntu navbar-nav">
                            <li id="first-name" class="nav-link"><b>First Name: </b><span><?php echo $user['first_name'] ?? ''; ?>
                </span>
                            </li>
                        </ul>
                        <ul class="font-ubuntu navbar-nav">
                            <li id="last-name" class="nav-link"><b>Last Name: </b><span><?php echo $user['last_name'] ?? ''; ?>
                </span>
                            </li>
                        </ul>
                        <ul class="font-ubuntu navbar-nav">
                            <li id="email" class="nav-link"><b>Email: </b><span><?php echo $user['user_email'] ?? ''; ?>
                </span>
                            </li>
                            <li>
                                <a class="return-home" href="index.php">Return to Home Page</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php
    //include registration_footer.php file
    include('registration_footer.php');
    ?>

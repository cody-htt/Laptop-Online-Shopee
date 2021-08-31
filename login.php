<?php
//include registration_header.php file
include('registration_header.php');

//Call for register-helper
require ('register-helper.php');
?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require('login-process.php');
}
?>


<!-- Registration area -->
<section id="login-form">
    <div class="row m-0">
        <div class="col-lg-4 offset-lg-4">
            <div class="text-center">
                <h1 class="login-title font-rubik color-primary">Login</h1>
                <p class="p-1 m-0 font-roboto font-size-16 color-primary">Login and enjoy your shopping</p>
                <span class="font-roboto color-primary">Create a new <a href="registration.php">account?</a></span>
            </div>
            <div class="upload-profile-image d-flex justify-content-center py-5">
                <div class="text-center">
                    <img src="./assets/avatar/demo-avatar.png" style="width: 250px; height: 250px;"
                         class="img rounded-circle" alt="profile">
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <form action="login.php" method="POST" enctype="multipart/form-data" id="log-form">
                    <div class="form-row my-4">
                        <div class="col">
                            <input type="email" required name="email" id="email" class="form-control" placeholder="Email*">
                            <small id="email-error" class="text-danger"></small>
                        </div>
                    </div>
                    <div class="form-row my-4">
                        <div class="col">
                            <input type="password" required name="password" id="password" class="form-control" placeholder="Password*">
                            <small id="password-error" class="text-danger"></small>
                        </div>
                    </div>
                    <div class="submit-btn text-center my-5">
                        <button type="submit" class="btn btn-warning rounded-pill text-dark px-5">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- Registration area -->

<?php
//include registration_footer.php file
include('registration_footer.php');
?>

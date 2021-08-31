<?php
//include registration_header.php file
include('registration_header.php');
?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require('register-process.php');
}
?>

<!-- Registration area -->
<section id="register">
    <div class="row m-0">
        <div class="col-lg-4 offset-lg-4">
            <div class="text-center pb-5">
                <h1 class="login-title font-rubik color-primary">Register</h1>
                <p class="p-1 m-0 font-roboto font-size-16 color-primary">Register and enjoy your shopping</p>
                <span class="font-roboto color-primary">Already have account? <a href="login.php">Login</a></span>
            </div>
            <div class="upload-profile-image d-flex justify-content-center pb-5">
                <div class="text-center">
                    <small id="avatar-text" class="form-text font-rubik text-light">Choose Your Avatar</small>
                    <div class="d-flex justify-content-center">
                        <img class="camera-icon" src="./assets/avatar/camera-solid.svg" alt="camera">
                    </div>
                    <img src="./assets/avatar/demo-avatar.png" style="width: 200px; height: 200px; padding-top: 0.5em;"
                         class="img rounded-circle" alt="profile">
                    <input type="file" form="reg-form" class="form-control-file" name="profileUpload" id="upload-profile">
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <form action="registration.php" method="POST" enctype="multipart/form-data" id="reg-form">
                    <div class="form-row">
                        <div class="col">
                            <input type="text" value="<?php if(isset($_POST['firstName'])) echo $_POST['firstName']; ?>"
                                   required name="firstName" id="firstName" class="form-control" placeholder="First Name">
                        </div>
                        <div class="col">
                            <input type="text" value="<?php if(isset($_POST['lastName'])) echo $_POST['lastName']; ?>"
                                   required name="lastName" id="lastName" class="form-control" placeholder="Last Name">
                        </div>
                    </div>
                    <div class="form-row my-4">
                        <div class="col">
                            <input type="email" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>"
                                   required name="email" id="email" class="form-control" placeholder="Email*">
                            <small id="email-error" class="text-danger"></small>
                        </div>
                    </div>
                    <div class="form-row my-4">
                        <div class="col">
                            <input type="password" required name="password" id="password" class="form-control" placeholder="Password*">
                            <small id="password-error" class="text-danger"></small>
                        </div>
                    </div>
                    <div class="form-row my-4">
                        <div class="col">
                            <input type="password" required name="confirm-pwd" id="confirm-pwd" class="form-control"
                                   placeholder="Confirm Password*">
                            <small id="confirm-error" class="text-danger"></small>
                        </div>
                    </div>
                    <div class="form-check form-check-inline font-size-16 pt-1">
                        <input type="checkbox" name="agreement" class="form-check-input" required>
                        <label for="agreement" class="form-check-label font-rubik text-light"> I agree
                            <a href="#" class="color-selected">term, conditions, and policy </a><span class="color-gold">*</span>
                        </label>
                    </div>
                    <div class="submit-btn text-center my-5">
                        <button type="submit" class="btn btn-warning rounded-pill text-dark px-5">Continue</button>
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

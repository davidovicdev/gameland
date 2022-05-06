<?php
require_once "session.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require_once "inc/head.php";
    ?>
</head>

<body>
    <?php
    require_once "inc/preload.php";
    ?>
    <?php
    require_once "inc/header.php";
    ?>

    <div class="homepage-slider h-auto">
        <div class="single-homepage-slider homepage-bg-1">
            <div class="container ">
                <div class="row">
                    <div class="col-md-12 col-lg-12 offset-lg-1 offset-xl-0 regMid">
                        <h3 class="text-light">Registration</h3>
                        <form action="#" class="contact-form" method="POST">
                            <div class="form-outline mb-4">
                                <input type="text" id="firstName" class="form-control" />
                                <label class="form-label text-light labelLogin" for="firstName">First Name</label>
                                <h6 id="firstNameError" class="text-danger"></h6>
                            </div>
                            <div class="form-outline mb-4">
                                <input type="text" id="lastName" class="form-control" />
                                <label class="form-label text-light" for="lastName">Last Name</label>
                                <h6 id="lastNameError" class="text-danger"></h6>
                            </div>
                            <div class="form-outline mb-4">
                                <input type="text" id="address" class="form-control" />
                                <label class="form-label text-light" for="address">Address</label>
                                <h6 id="addressError" class="text-danger"></h6>
                            </div>
                            <div class="form-outline mb-4">
                                <input type="text" id="phone" class="form-control" />
                                <label class="form-label text-light" for="phone">Phone</label>
                                <h6 id="phoneError" class="text-danger"></h6>
                            </div>
                            <div class="form-outline mb-4">
                                <input type="email" id="email" class="form-control" />
                                <label class="form-label text-light" for="email">Email</label>
                                <h6 id="emailError" class="text-danger"></h6>
                            </div>
                            <div class="form-outline mb-4">
                                <input type="password" id="password" class="form-control" />
                                <label class="form-label text-light" for="password">Password</label>
                                <h6 id="passwordError" class="text-danger"></h6>
                            </div>
                            <div class="form-outline mb-4">
                                <input type="password" id="passwordConfirm" class="form-control" />
                                <label class="form-label text-light" for="passwordConfirm">Confirm Password</label>
                                <h6 id="passwordConfirmError" class="text-danger"></h6>
                            </div>
                            <button type="button" id="registerButton" class="btn btn-primary btn-block mb-4">Sign in</button>
                            <button type="reset" id="resetButton" name="resetButton" class="btn btn-primary btn-block mb-4">Reset</button>
                            <div class="text-center">
                                <p class="text-light">Already have an account? <a href="login.php" class="text text-warning">Log In</a></p>
                                
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    require_once "inc/footer.php";
    require_once "inc/scripts.php";
    ?>

</body>

</html>
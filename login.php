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
    require_once "inc/header.php";
    ?>
    <div class="search-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <span class="close-btn"><i class="fas fa-window-close"></i></span>
                    <div class="search-bar">
                        <div class="search-bar-tablecell">
                            <h3>Search For:</h3>
                            <input type="text" placeholder="Keywords">
                            <button type="submit">Search <i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="homepage-slider">
        <div class="single-homepage-slider homepage-bg-1">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-7 offset-lg-1 offset-xl-0">
                        <div class="hero-text">
                            <div class="hero-text-tablecell">
                                <h3 class="text-light">Log In</h3>
                                <br>
                                <br>
                                <form action="">
                                    <div class="form-outline mb-4">
                                        <input type="email" id="loginEmail" class="form-control" />
                                        <label class="form-label text-light" for="loginEmail">Email</label>
                                    </div>
                                    <div class="form-outline mb-4">
                                        <input type="password" id="loginPassword" class="form-control" />
                                        <label class="form-label text-light" for="loginPassword">Password</label>
                                    </div>
                                    <button type="button" id="loginButton" class="btn btn-primary btn-block mb-4">Sign in</button>
                                    <div class="text-center">
                                        <p class="text-light">Not a member? <a href="register.php" class="text text-warning">Register</a></p>
                                    </div>
                                </form>
                                <h4 id="login-error" class='text-danger mt-3'></h4>
                            </div>
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
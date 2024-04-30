<?php require_once("../resources/config.php"); ?>
<?php include(TEMPLATE_FRONT . DS . "header_forgot.php"); ?>

<?php
register_user();
?>
<section>
    <div class="limiter">
        <div class="container-login100" style="background-image: url('../assets/img/bg-01.jpg');">
            <div class="wrap-login100">
                <form class="login100-form validate-form" method="post">
                    <span class="login100-form-title p-b-34 p-t-27">
                        Sign Up
                    </span>
                    <div class="wrap-input100 validate-input" data-validate="Email">
                        <input class="input100" type="email" name="email_regis" placeholder="Email">
                        <span class="focus-input100" data-placeholder="&#xf207;"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Enter username">
                        <input class="input100" type="text" name="username_regis" placeholder="Username">
                        <span class="focus-input100" data-placeholder="&#xf207;"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Enter password">
                        <input class="input100" type="password" name="password_regis" placeholder="Password">
                        <span class="focus-input100" data-placeholder="&#xf191;"></span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate="Repeat password">
                        <input class="input100" type="password" name="pass" placeholder="Repeat Password">
                        <span class="focus-input100" data-placeholder="&#xf191;"></span>
                    </div>
                    <div class="container-login100-form-btn">
                        <button type="submit" class="login100-form-btn" name="submit2">
                            Sign Up
                        </button>
                    </div>

                    <div class="text-center p-t-90">
                        <a class="txt1" href="log-in.php">
                            -> sign in
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php include(TEMPLATE_FRONT . DS . "footer_login.php"); ?>
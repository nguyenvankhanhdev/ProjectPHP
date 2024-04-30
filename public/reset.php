<?php require_once("../resources/config.php"); ?>
<?php include(TEMPLATE_FRONT . DS . "header_forgot.php"); ?>

<?php
reset_pw();
?>
<section>
    <div class="limiter">
        <div class="container-login100" style="background-image: url('../assets/img/bg-01.jpg');">
            <div class="wrap-login100">
                <form class="login100-form validate-form" method="post">
                    <span class="login100-form-title p-b-34 p-t-27">
                        Reset Password
                    </span>
                    <div class="wrap-input100 validate-input" data-validate="Enter password">
                        <input class="input100" type="password" name="password" placeholder="Password">
                        <span class="focus-input100" data-placeholder="&#xf191;"></span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate="Enter password">
                        <input class="input100" type="password" name="pass" placeholder="Confirm Password">
                        <span class="focus-input100" data-placeholder="&#xf191;"></span>
                    </div>
                
                    <div class="container-login100-form-btn">
                        <button type="submit" class="login100-form-btn" name="reset">
                            Reset
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
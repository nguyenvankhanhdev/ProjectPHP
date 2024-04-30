<?php require_once("../resources/config.php"); ?>
<?php include(TEMPLATE_FRONT . DS . "header_forgot.php"); ?>


<section>
    <div class="limiter">
        <div class="container-login100" style="background-image: url('../assets/img/bg-01.jpg');">
            <div class="wrap-login100">
                <form class="login100-form validate-form" method="post">
                    <span class="login100-form-logo">
                        <i class="zmdi zmdi-landscape"></i>
                    </span>
                    <span class="login100-form-title p-b-34 p-t-27">
                        Log in
                    </span>
                    <div class="wrap-input100 validate-input" data-validate="Enter username">
                        <input class="input100" type="text" name="username_login" placeholder="Username">
                        <span class="focus-input100" data-placeholder="&#xf207;"></span>
                        <span class="error-message"></span> <!-- Thêm phần tử này để hiển thị thông báo lỗi -->
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Enter password">
                        <input class="input100" type="password" name="password_login" placeholder="Password">
                        <span class="focus-input100" data-placeholder="&#xf191;"></span>
                        <span class="error-message"></span> <!-- Thêm phần tử này để hiển thị thông báo lỗi -->
                    </div>



                    <div class="container-login100-form-btn">
                        <button type="submit" class="login100-form-btn" name="submit1">
                            Login
                        </button>
                    </div>

                    <div class="text-center p-t-90">
                        <a class="txt1" href="forgot_password.php">
                            Forgot Password?
                        </a>
                        <a class="txt1" href="register.php">
                            &nbsp;&nbsp;&nbsp;Register?
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php
login_user();
?>
<?php include(TEMPLATE_FRONT . DS . "footer_login.php"); ?>
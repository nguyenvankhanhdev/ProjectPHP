<?php require_once("../resources/config.php"); ?>
<?php include(TEMPLATE_FRONT . DS . "header_forgot.php"); ?>
<?php
forgot_pass();
?>
<section>
    <div class="limiter">
        <div class="container-login100" style="background-image: url('../assets/img/bg-01.jpg');">
            <div class="wrap-login100">
                <form class="login100-form validate-form" method="post">
                    <span class="login100-form-title p-b-34 p-t-27">
                        forget password
                    </span>
                    <div class="wrap-input100 validate-input" data-validate="Enter username">
                        <input class="input100" type="email" name="email_forgot" placeholder="Email">
                        <span class="focus-input100" data-placeholder="&#xf207;"></span>
                    </div>
                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" type="submit" name="forgot">
                            submit
                        </button>
                    </div>

                    <div class="text-center p-t-90">
                        <a class="txt1" href="log-in.php">
                            Sign In
                        </a>
                    </div>
                </form>
                <div class="modal fade" id="myModal" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Email Sent</h4>
                            </div>
                            <div class="modal-body">
                                <h3>Please check your email</h3>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>


<?php include(TEMPLATE_FRONT . DS . "footer_login.php"); ?>
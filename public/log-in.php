<?php  require_once("../resources/config.php");?>
<?php include(TEMPLATE_FRONT . DS . "header_login.php"); ?>
    <section>
        <div class="slider">
            <?php login_user(); ?>
            <h1><?php display_message();?></h1>
            <h2>Đăng kí / Đăng Nhập</h2>
          
            <div class="login" id="login">
                <div class="form-container sign-up-container">
                    <form class="from-action" action="#" method="post" enctype="multipart/form-data">
                        <h1>Đăng kí tài khoản</h1>
                        <div class="social-container">
                            <a href="#" class="social"><i class="bi bi-facebook"></i></a>
                            <a href="#" class="social"><i class="bi bi-google"></i></a>
                            <a href="#" class="social"><i class="bi bi-linkedin"></i></a>
                        </div>
                        <span>hoặc sử dụng email của bạn để đăng ký</span>
                        <input class="input" type="text" name="username" placeholder="Name" />
                        <input class="input" type="email" name="email" placeholder="Email" />
                        <input class="input" type="password" name="password" placeholder="Password" />
                        <input type="submit" class="button" name="submit2">
                    </form>
                </div>
                <div class="form-container sign-in-container">
                    <form class="from-action" action="#" method="post" enctype="multipart/form-data" >
                        <h1>Đăng nhập</h1>
                        <div class="social-container">
                            <a href="#" class="social"><i class="bi bi-facebook"></i></a>
                            <a href="#" class="social"><i class="bi bi-google"></i></a>
                            <a href="#" class="social"><i class="bi bi-linkedin"></i></a>
                        </div>
                        <span>hoặc sử dụng tài khoản của bạn</span>
                        <input class="input" type="text" name="username_login" placeholder="Username" />
                        <input class="input" type="password"name="password_login"  placeholder="Password" />
                        
                        <a href="#">Quên mật khẩu</a>
                        <input type="submit" class="button" name="submit1">
                    </form>
                </div>
                <div class="overlay-container">
                    <div class="overlay">
                        <div class="overlay-panel overlay-left">
                            <h1>Welcome Back!</h1>
                            <p>Để giữ kết nối với chúng tôi, vui lòng đăng nhập bằng thông tin cá nhân của bạn</p>
                            <button class="button ghost " id="signIn">Đăng nhập</button>
                        </div>
                        <div class="overlay-panel overlay-right">
                            <h1>Hello, Friend!</h1>
                            <p>Nhập thông tin cá nhân của bạn và bắt đầu hành trình với chúng tôi</p>
                            <button class="button ghost " id="signUp">Đăng kí</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
       
        const signUpButton = document.getElementById('signUp');
        const signInButton = document.getElementById('signIn');
        const container = document.getElementById('login');

        signUpButton.addEventListener('click', () => {
            container.classList.add('right-panel-active');
        });

        signInButton.addEventListener('click', () => {
            container.classList.remove('right-panel-active');
        });
    </script>
</body>

</html>
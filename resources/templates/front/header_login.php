<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/login.css">
    <script src="https://code.jquery.com/jquery-3.6.4.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">


</head>

<body>
    <main>
        <header>
            <div class="header">
                <div class="logo ">
                    <div class="container">
                        <div class="flex logo-inner">
                            <div class="logo-item flex-align-center">
                                <a href="./index.php"><img class="mr-4" src="../assets/img/logo-mb.png" alt=""></a>
                            </div>
                            <div class="g-search">
                                <form action="">
                                    <div class="input-box">
                                        <input type="text"
                                            placeholder="Nhập tên điện thoại, máy tính, phụ kiện.... cần tìm">
                                        <button type="submit" class="input-box-search">
                                            <i class="bi bi-search"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="home-page">
                                <div class="home-page-inner">
                                    <div class="home-page-item">
                                        <a href="./index.php" target="_blank"><i class="bi bi-house-door-fill"></i>
                                            Trang
                                            chủ</a>
                                    </div>
                                </div>
                            </div>
                            <div class="market">
                                <a href="./checkout.php" target="_blank"><i class="bi bi-cart"></i></a>
                            </div>
                            <div class="register">
                                <div class="register-inner">
                                    <div class="register-login">
                                        <a href="./log-in.php" target="_blank"> Đăng kí / Đăng nhập</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php include(TEMPLATE_FRONT . DS . "top_nav.php"); ?>
            </div>
        </header>
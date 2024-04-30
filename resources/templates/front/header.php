    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="../assets/style.css">
        <link rel="stylesheet" href="../assets/cart.css">
        <script src="https://code.jquery.com/jquery-3.6.4.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="../assets/reset.css">
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
                                    <form action="../public/search.php" method="post">
                                        <div class="input-box">
                                            <input type="text" placeholder="Nhập tên điện thoại, máy tính, phụ kiện.... cần tìm" name="s-title">
                                            <button type="submit" class="input-box-search" name="search-s">
                                                <i class="bi bi-search"></i>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                                <?php
                                if (isset($_SESSION['id'])) {
                                    $acc = <<<DELIMITER
                                    <div class="home-page">
                                        <div class="home-page-inner">
                                            <div class="home-page-item">
                                            <a href='./admin/index.php' target='_blank'><i class='bi bi-house-door-fill'></i>Admin</a>
                                            </div>
                                        </div>
                                    </div>
                                    DELIMITER;
                                    echo $acc;
                                } else {
                                    echo '';
                                }
                                ?>

                                <div class="market">
                                    <a href="./checkout.php" target="_blank"><i class="bi bi-cart"></i></a>
                                    <p class="count-cart">
                                        <?php
                                        if (isset($_SESSION['cart_quantity'])) {
                                            // Biến session 'cart_quantity' tồn tại, bạn có thể sử dụng nó một cách an toàn
                                            echo $_SESSION['cart_quantity'];
                                        } else {
                                            // Biến session 'cart_quantity' không tồn tại, xử lý tương ứng hoặc hiển thị một giá trị mặc định
                                            echo 0;
                                        }
                                        ?>
                                    </p>
                                </div>
                                <div class="register">
                                    <?php
                                    if (isset($_SESSION['id'])) {
                                        $acc = <<<DELIMITER
                                                <div class="register-inners">
                                                <div class="register-login">
                                                <div class="dropdown">
                                                    <a class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                                        Xin chào, {$_SESSION['username']} 
                                                    </a>
                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                        <li><a class="dropdown-item" href="./admin/logout.php">Logout</a></li>
                                                        <li><a class="dropdown-item" href="#">Another action</a></li>
                                                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                                                    </ul>
                                                </div>
                                                DELIMITER;
                                        echo $acc;
                                    } else {
                                        $acc = <<<DELIMITER
                                                <div class="register-inner">
                                                <div class="register-login">
                                                    <a href="./log-in.php" target="_blank"> Đăng kí / Đăng nhập</a>
                                                </div>
                                            </div>
                                            DELIMITER;
                                        echo $acc;
                                    }

                                    ?>

                                    <!--  -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                <?php include(TEMPLATE_FRONT . DS . "top_nav.php"); ?>
                </div>
            </header>
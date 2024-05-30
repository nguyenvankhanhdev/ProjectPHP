<?php require_once("../resources/config.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/reset.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/search.css">

    <link rel="stylesheet" href="../assets/font.css">
    <link rel="stylesheet" href="../assets/icon-fptshop.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

</head>

<body>
<header>
                <div class="header">
                    <div class="logo ">
                        <div class="container">
                            <div class="flex logo-inner">
                                <div class="logo-item flex-align-center">
                                    <a href="./index.php"><img class="mr-4" src="../assets/img/logo-mb.png" alt=""></a>
                                </div>
                                <?php
                                $query = "SELECT search_term FROM search_history ORDER BY search_count DESC LIMIT 5";
                                $result = mysqli_query($connection, $query);
                                $trendingSearches = [];
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $trendingSearches[] = $row['search_term'];
                                }
                                ?>
                                <div class="g-search">
                                    <form action="../public/search.php" method="post">
                                        <div class="input-box">
                                            <input type="text" placeholder="Nhập tên điện thoại, máy tính, phụ kiện.... cần tìm" name="s-title" class="search-input">
                                            <button type="submit" class="input-box-search" name="search-s">
                                                <i class="bi bi-search"></i>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                                <div class="overlay" id="overlay"></div>

                                <?php

                                if (check_role() === "admin") {
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
                                            echo $_SESSION['cart_quantity'];
                                        } else {
                                            echo 0;
                                        }
                                        ?>
                                    </p>
                                    <a style="margin-left: 10px;" href="./wishlists.php" target="_blank"><i class="bi bi-heart"></i></a>
                                    <p class="count-cart">
                                        <?php
                                        if (isset($_SESSION['id'])) {
                                            echo count_wishlist();
                                        } else {
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



    <?php
    $cat_id = isset($_GET['cat_id']) ? $_GET['cat_id'] : 1;
    $query1 = "SELECT * FROM categories WHERE cat_id =" . escape_string($cat_id) . "";
    $cate_query = query($query1);
    confirm($cate_query);
    $row_cate = mysqli_fetch_assoc($cate_query);
    ?>
    <main>
        <section>
            <div class="container">
                <div class=" row">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="./index.php" target="_blank">Trang chủ</a></li>
                        <li class="breadcrumb-item"><a href="./search.php" target="_blank">Tìm kiếm</a></li>
                    </ol>
                </div>
            </div>
        </section>
        <section>
            <div class="slider">
                <div class="container">
                    <div class="row">
                        <div class="col-12 p-0">
                            <div class="cart" id="search">
                                <?php
                                if (isset($_GET['s-title'])) {
                                    $title = $_GET['s-title'];
                                    $stmt = $connection->prepare("SELECT id, search_count FROM search_history WHERE search_term = ?");
                                    $stmt->bind_param('s', $title);
                                    $stmt->execute();
                                    $stmt->store_result();
                                    if ($stmt->num_rows > 0) {
                                        $stmt->bind_result($id, $searchCount);
                                        $stmt->fetch();
                                        $stmt->close();
                                        $searchCount++;
                                        $updateStmt = $connection->prepare("UPDATE search_history SET search_count = ?, last_searched = CURRENT_TIMESTAMP WHERE id = ?");
                                        $updateStmt->bind_param('ii', $searchCount, $id);
                                        $updateStmt->execute();
                                        $updateStmt->close();
                                    } else {
                                        $stmt->close();
                                        $insertStmt = $connection->prepare("INSERT INTO search_history (search_term) VALUES (?)");
                                        $insertStmt->bind_param('s', $title);
                                        $insertStmt->execute();
                                        $insertStmt->close();
                                    }
                                
                                    $query = query("SELECT * FROM products WHERE product_title LIKE '%" . escape_string($title) . "%'");
                                    confirm($query);
                                    while ($row = fetch_array($query)) {
                                        $price_sale = number_format($row['product_price'] + 2000000, 0, ".", ".");
                                        $price_format = number_format($row['product_price'], 0, ".", ".");
                                        $search = <<<DELIMETER
                                        <div class="cart-item">
                                        <div class="cart-product-img">
                                            <a href="./details.php?id={$row['product_id']}" target="_blank">
                                                <img class="cart-img" src="../assets/img/{$row['product_image']}" alt="">
                                            </a>
                                            <div class="cart-product-label">
                                                <div class="badge-warning">Trả góp 0%</div>
                                                <div class="badge-primary">Giảm 2.000.000đ</div>
                                            </div>
                                        </div>
                                        <div class="cart-product">
                                            <h3><a href="">{$row['product_title']}</a></h3>
                                            <div class="circle-color">
                                                <div class="circle-item pink" style="background:#2D2926"></div>
                                                <div class="circle-item pink" style="background:#4F5A61"></div>
                                                <div class="circle-item pink" style="background:#D5CDC1"></div>
                                                <div class="circle-item pink" style="background:#74424F"></div>
                                            </div>
                                            <div class="cart-price">
                                                <div class="price-sale">{$price_format} đ</div>
                                                <div class="price-strike">
                                                    <strike>{$price_sale}đ</strike>
                                                </div>
                                            </div>
                                            <div class="cart-memory">
                                                <button class="cart-memory-item-active">Ram {$row['Ram']}GB</button>
                                                <button class="cart-memory-item">Memory {$row['Memory']}GB</button>
                                            </div>
                                        </div>
                                        <div class="cart-btn">
                                            <div class="btn-buynow">
                                                <a href="../resources/cart.php?add={$row['product_id']}">Mua ngay</a>
                                            </div>
                                        </div>
                                        </div>
                                        DELIMETER;
                                        echo $search;
                                    }
                                }
                                
                                ?>
                            </div>
                            <div class="cart-loadmore" align="center">
                                <button class="btn btn-secondary" id="btn-loadmore">Xem Thêm</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="container">
                <div class="pocity">
                    <div class="pocity-row">
                        <div class="pocity-item">
                            <div class="pocity-inner">
                                <div class="pocity-picture">
                                    <img src="../assets/img/graphic.png" alt="">
                                </div>
                                <div class="pocity-inf">
                                    <div class="pocity-title">Thương hiệu hàng đầu</div>
                                    <div class="pocity-mess">Bảo hành chính hãng</div>
                                </div>
                            </div>
                        </div>
                        <div class="pocity-item">
                            <div class="pocity-inner">
                                <div class="pocity-picture">
                                    <img src="../assets/img/change.png" alt="">
                                </div>
                                <div class="pocity-inf">
                                    <div class="pocity-title">Đổi trả dễ dàng</div>
                                    <div class="pocity-mess">Theo chính sách đổi trả FPTShop</div>
                                </div>
                            </div>
                        </div>
                        <div class="pocity-item">
                            <div class="pocity-inner">
                                <div class="pocity-picture">
                                    <img src="../assets/img/delivery.png" alt="">
                                </div>
                                <div class="pocity-inf">
                                    <div class="pocity-title">Giao hàng tận nơi</div>
                                    <div class="pocity-mess">Tại 63 tỉnh thành</div>
                                </div>
                            </div>
                        </div>
                        <div class="pocity-item">
                            <div class="pocity-inner">
                                <div class="pocity-picture">
                                    <img src="../assets/img/like.png" alt="">
                                </div>
                                <div class="pocity-inf">
                                    <div class="pocity-title">Sản phẩm chất lượng</div>
                                    <div class="pocity-mess">Đảm bảo tương thích và độ bền cao</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </main>
    <footer>
        <div class="footer">
            <div class="container">
                <div class="footer-contact">
                    <div class="contact-item">
                        <ul>
                            <li><a href="">Giới thiệu về công ty</a></li>
                            <li><a href="">Chính sách bảo mật</a></li>
                            <li><a href="">Quy chế hoạt động</a></li>
                            <li><a href="">Kiểm tra hóa đơn điện tử</a></li>
                            <li><a href="">Tra cứu thông tin bảo hành</a></li>
                            <li><a href="">Câu hỏi thường gặp khi mua hàng</a></li>
                        </ul>
                        <div class="contact-icon">
                            <div class="icon-item">
                                <img class="cth1" src="../assets/img/ft-img1.png" alt="">
                            </div>
                            <div class="icon-item">
                                <img class="cth2" src="../assets/img/ft-img2.png" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="contact-item">
                        <ul>
                            <li><a href="">Tin tuyển dụng</a></li>
                            <li><a href="">Tin khuyến mãi</a></li>
                            <li><a href="">Hướng dẫn mua online</a></li>
                            <li><a href="">Hướng dẫn mua trả góp</a></li>
                            <li><a href="">Chính sách trả góp</a></li>
                        </ul>
                        <p class="trtit">Chứng nhận:</p>
                        <div class="contact-icon">
                            <div class="icon-item">
                                <img class="cth3" src="../assets/img/ft-img3.png" alt="">
                            </div>
                            <div class="icon-item">
                                <img class="cth3" src="../assets/img/ft-img4.png" alt="">
                            </div>
                            <div class="icon-item">
                                <img class="cth3" src="../assets/img/ft-img5.png" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="contact-item">
                        <ul>
                            <li><a href="">Hệ thống cửa hàng</a></li>
                            <li><a href="">Chính sách đổi trả</a></li>
                            <li><a href="">Hệ thống bảo hành</a></li>
                            <li><a href="">Giới thiệu máy đổi trả</a></li>
                        </ul>
                    </div>
                    <div class="contact-item contact-custom">
                        <ul class="ftr2">
                            <li>
                                <p class="trtit">Tư vấn mua hàng miễn phí</p>
                                <a href="">1800 6601 <span>(Nhánh 1)</span></a>

                            </li>
                            <li>
                                <p class="trtit">Hỗ trợ kỹ thuật</p>
                                <a href="">1800 6601
                                    <span>(Nhánh 2)</span>
                                </a>
                            </li>
                            <li>
                                <p class="trtit">Góp ý, khiếu nại(8h - 22h00)</p>
                                <a href="">1800 6616</a>
                            </li>
                        </ul>
                        <p class="contact-title">Hỗ trợ thanh toán</p>
                        <div class="support-pay">
                            <div class="pay-item"><img src="../assets/img/visa.png" alt=""></div>
                            <div class="pay-item"><img src="../assets/img/atm.png" alt=""></div>
                            <div class="pay-item"><img src="../assets/img/zalo-pay.png" alt=""></div>
                            <div class="pay-item"><img src="../assets/img/master-card.png" alt=""></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </footer>
</body>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>


</html>
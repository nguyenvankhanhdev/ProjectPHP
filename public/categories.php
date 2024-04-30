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
    <link rel="stylesheet" href="../assets/categories.css">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" href="../assets/font.css">
    <link rel="stylesheet" href="../assets/icon-fptshop.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <header>
        <div class="header ">
            <div class="logo ">
                <div class="container">
                    <div class="flex logo-inner">
                        <div class="logo-item flex-align-center">
                            <a href="./index.php"><img class="mr-4" src="../assets/img/logo-mb.png" alt=""></a>
                        </div>
                        <div class="g-search">
                            <form action="">
                                <div class="input-box">
                                    <input type="text" placeholder="Nhập tên điện thoại, máy tính, phụ kiện.... cần tìm">
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
            <div class="container">
                <ul class="nav">
                    <?php
                    get_categories();
                    ?>
                </ul>
            </div>
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
                        <li class="breadcrumb-item"><a href=""><?php echo $row_cate['cat_title']; ?></a></li>
                    </ol>
                </div>
                <div class="section-tabs">
                    <div class="card">
                        <div class="card-body">
                            <div class="chapter-tabs">
                                <div class="chapter-title">Sản Phẩm</div>
                                <div class="chapter-list">
                                    <div class="chapter active">
                                        <a class="chapter-img" href="">
                                            <i class="icon-Combined-Shape"></i>
                                        </a>
                                        <div class="chapter-lable push">Sản phẩm nổi bật</div>
                                    </div>
                                    <div class="chapter">
                                        <a class="chapter-img" href=""><i class="ic-phone-fold"></i></a>
                                        <div class="chapter-label">Điện thoại</div>

                                    </div>
                                    <div class="chapter">
                                        <a class="chapter-img" href=""><i class="ic-tablet-2"></i></a>
                                        <div class="chapter-label">Máy tính bảng</div>

                                    </div>
                                    <div class="chapter">
                                        <a class="chapter-img" href=""><i class="ic-galaxy-watch"></i></a>
                                        <div class="chapter-label">Đồng hồ thông minh</div>

                                    </div>
                                    <div class="chapter">
                                        <a class="chapter-img" href="">
                                            <i class="ic-galaxy-buds"></i>
                                        </a>
                                        <div class="chapter-label">Tai nghe</div>

                                    </div>
                                    <div class="chapter">
                                        <a class="chapter-img" href=""><i class="ic-apple-cable"></i></a>
                                        <div class="chapter-label">Phụ kiện chính hãng</div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="container">
                <div class="section-hot">
                    <div class="section-title">Khuyến Mãi Hot</div>
                    <div class="hot-promotion-inner">
                        <div class="promotion-main">
                            <a href="">
                                <img src="../assets/img/638110459464426127_Frame 47642.png" alt="">
                                <div class="promotion-text">
                                    <div class="hot-promotion-title"> Mua ngay Galaxy S23 Series nhận đặc quyền đến 10
                                        triệu ++ </div>
                                    <div class="hot-promotion-content">
                                        <p>Quà độc quyền bảo hành 2 năm + trả góp 0% đến 24 tháng</p>
                                    </div>
                                    <div class="buy-now">Mua Ngay</div>
                                </div>
                            </a>
                        </div>
                        <div class="promotion-mini">
                            <div class="promotion-mini-item mb-4 ">
                                <a href="">
                                    <img src="../assets/img/638110453361436795_s22.png" alt="">
                                    <div class="mini-promotion-text">
                                        <div class="mini-product-title">
                                            Độc quyền Galaxy S22 tím Bora giảm ngay 6.5 triệu</div>
                                        <div class="mini-product-content">
                                            <p>Giá chỉ 12.490.000đ + Buds2 xám giá chỉ 990.000đ</p>
                                        </div>
                                    </div>
                                    <div class="buy-now">Mua Ngay</div>
                                </a>
                            </div>
                            <div class="promotion-mini-item mb-4 ">
                                <a href="">
                                    <img src="../assets/img/638110649652773958_bespoke1.png" alt="">
                                    <div class="mini-promotion-text">
                                        <div class="mini-product-title">
                                            Galaxy Z Flip4 Bespoke giá từ 18.990.000đ</div>
                                        <div class="mini-product-content">
                                            <p>Giảm ngay 8 triệu khi thu cũ đổi mới <br>Miễn phí 2 năm Samsung </p>
                                        </div>
                                    </div>
                                    <div class="buy-now">Mua Ngay</div>
                                </a>
                            </div>
                            <div class="promotion-mini-item ">
                                <a href="">
                                    <img src="../assets/img/638110453361280471_watch5.png" alt="">
                                    <div class="mini-promotion-text">
                                        <div class="mini-product-title">
                                            Galaxy Watch Series</div>
                                        <div class="mini-product-content">
                                            <p>Giảm đến 3 triệu + trả góp</p>
                                        </div>
                                    </div>
                                    <div class="buy-now">Mua Ngay</div>
                                </a>
                            </div>
                            <div class="promotion-mini-item">
                                <a href="">
                                    <img src="../assets/img/638110453361436795_s22.png" alt="">
                                    <div class="mini-promotion-text">
                                        <div class="mini-product-title">
                                            Galaxy Tab S6 Lite 2022</div>
                                        <div class="mini-product-content">
                                            <p>Giảm ngay 3.000.00đ + Mua kèm buds2 xám giá chỉ 990.000đ</p>
                                        </div>
                                    </div>
                                    <div class="buy-now">Mua Ngay</div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="slider">
                <div class="container">
                    <div class="row">
                        <div class="col-3 p-0 p-r-30 filter fixed-sidebar">
                            <div class="cdt-filter">
                                <div class="cdt-filter_block">
                                    <div class="cdt-filter_title">
                                        Hãng sản xuất
                                    </div>
                                    <div class="cdt-filter_checklist filterBrand">
                                        <form class="checkbox" id="checkboxForm">
                                            <p class="checkItem" title="">
                                                <input type="checkbox" change="" class="checkInput_brand" id="checkbox_all" data-value="all">
                                                <label for="">Tất cả</label>
                                            </p>
                                            <p class="checkItem" title="">
                                                <input type="checkbox" class="checkInput_brand" id="checkbox_apple" data-value="3">
                                                <label for="">Apple (iPhone)</label>
                                            </p>
                                            <p class="checkItem" title="">
                                                <input type="checkbox" class="checkInput_brand" id="checkbox_samsung" data-value="1">
                                                <label for="">Sam Sung</label>
                                            </p>
                                            <p class="checkItem" title="">
                                                <input type="checkbox" class="checkInput_brand" id="checkbox_xiaomi" data-value="2">
                                                <label for="">Xiaomi</label>
                                            </p>
                                            <p class="checkItem" title="">
                                                <input type="checkbox" class="checkInput_brand" id="checkbox_oppo" data-value="15">
                                                <label for="">Oppo</label>
                                            </p>
                                            <p class="checkItem" title="">
                                                <input type="checkbox" class="checkInput_brand" id="checkbox_vivo" data-value="26">
                                                <label for="">Vivo</label>
                                            </p>
                                            <p class="checkItem" title="">
                                                <input type="checkbox" class="checkInput_brand" id="checkbox_realme" data-value="4">
                                                <label for="">Realme</label>
                                            </p>
                                            <p class="checkItem" title="">
                                                <input type="checkbox" class="checkInput_brand" id="checkbox_realme" data-value="5">
                                                <label for="">Nokia</label>
                                            </p>
                                        </form>

                                    </div>
                                </div>
                                <div class="cdt-filter_block">
                                    <div class="cdt-filter_title">
                                        Mức giá
                                    </div>
                                    <div class="cdt-filter_checklist filterBrand">
                                        <div class="checkbox">
                                            <p class="checkItem" title="">
                                                <input type="checkbox" class="checkInput_price active " id="checkbox_all_price" data-value="all" checked>
                                                <label for="">Tất cả</label>
                                            </p>
                                            <p class="checkItem" title="">
                                                <input type="checkbox" class="checkInput_price" data-value="2">
                                                <label for="">Dưới 2 triệu</label>
                                            </p>
                                            <p class="checkItem" title="">
                                                <input type="checkbox" class="checkInput_price" data-value="3">
                                                <label for="">Từ 2 đến 4 triệu</label>
                                            </p>
                                            <p class="checkItem" title="">
                                                <input type="checkbox" class="checkInput_price" data-value="4">
                                                <label for="">Từ 4 đến 7</label>
                                            </p>
                                            <p class="checkItem" title="">
                                                <input type="checkbox" class="checkInput_price" data-value="5">
                                                <label for="">Từ 7 đến 13</label>
                                            </p>
                                            <p class="checkItem" title="">
                                                <input type="checkbox" class="checkInput_price" data-value="6">
                                                <label for="">Trên 13</label>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-9 p-0">
                            <div class="cart" id="products">

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

<script src="../assets/js/js.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>


</html>
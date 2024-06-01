<?php require_once("../resources/config.php"); ?>
<?php include(TEMPLATE_FRONT . DS . "header.php"); ?>
<div class="container" style="padding-top: 30px;">
    <!-- carosell -->
    <?php include(TEMPLATE_FRONT . DS . "slider.php"); ?>
    <div class="cate-box mt-4 mb-4">
        <!-- cate-box -->
        <?php include(TEMPLATE_FRONT . DS . "cate_box.php"); ?>
    </div>
</div>
<section>
    <div class="container">
        <div class="banner">
            <div class="category-container">
                <div class="picture">
                    <img src="../assets/img/BannerXiaoMi.webp" alt="">
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container">
        <div class="category-container">
            <div class="prd-sale">
                <div class="prd-top">
                    <div class="tittle">
                        <h2>Khuyến mãi hot</h2>
                    </div>
                </div>
                <div class="prd-sale_product">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            <?php

                            get_Swiper();
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="st-brand st-bsalev2 container">
    <div class="box-container">
        <div class="wrapper">
            <div class="title">
                <h2>SỞ HỮU IPHONE 15 TRẢ GÓP TỪ 69K/NGÀY</h2>
                <div class="title-img"><a href="https://fptshop.com.vn/dien-thoai/apple-iphone"><img src="https://images.fpt.shop/unsafe/fit-in/1168x97/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2024/5/2/638502733227139543_H7- 1200x100.png" alt=""></a></div>
            </div>
            <ul class="list-brand">
                <li class="brand-item">
                    <div class="item-img"><a href="https://fptshop.com.vn/dien-thoai/iphone-15-pro-max"><img src="https://images.fpt.shop/unsafe/fit-in/262x324/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2024/5/2/638502733223077314_D (1).png" alt="iPhone 15 Pro Max"></a></div>
                </li>
                <li class="brand-item">
                    <div class="item-img"><a href="https://fptshop.com.vn/dien-thoai/iphone-15-pro"><img src="https://images.fpt.shop/unsafe/fit-in/262x324/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2024/5/2/638502733230957777_D (2).png" alt="iPhone 15 Pro"></a></div>
                </li>
                <li class="brand-item">
                    <div class="item-img"><a href="https://fptshop.com.vn/dien-thoai/iphone-15-plus"><img src="https://images.fpt.shop/unsafe/fit-in/262x324/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2024/5/2/638502733225889593_D (3).png" alt="iPhone 15 Plus"></a></div>
                </li>
                <li class="brand-item">
                    <div class="item-img"><a href="https://fptshop.com.vn/dien-thoai/iphone-15"><img src="https://images.fpt.shop/unsafe/fit-in/262x324/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2024/5/2/638502733226827103_D (4).png" alt="iPhone 15"></a></div>
                </li>
            </ul>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="banner">
            <div class="category-container">
                <div class="picture">
                    <img src="../assets/img/banner-laptop.webp" alt="">
                </div>
            </div>
        </div>
    </div>
</section>


<section>
    <div class="container">
        <div class="cartt">
            <?php
            getProduct();
            insertWishlists();
            ?>
        </div>
    </div>
</section>


<section>
    <div class="container">
        <div class="discount">
            <h3 class="tittle">ưu đãi khi thanh toán online</h3>
            <div class="wrapper">
                <div class="discount-swiper">
                    <div class="discount-slide">
                        <a href="#"><img src="../assets/img/momo.webp" alt=""></a>
                    </div>
                    <div class="discount-slide">
                        <a href="#"><img src="../assets/img/TPBANK Evo.webp" alt=""></a>
                    </div>
                    <div class="discount-slide">
                        <a href="#"><img src="../assets/img/Vnpay.webp" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="service">
            <h3 class="tittle">dịch vụ tiện ích</h3>
            <ul class="service-list">
                <a class="service-item">
                    <div class="item-img">
                        <img src="../assets/img/water.png" alt="">
                    </div>
                    <div class="wrap">
                        <div class="item-title">Thanh toán tiền nước</div>
                        <div class="item-text">Thanh toán nhanh chóng, tiện lợi</div>
                    </div>
                </a>
                <a class="service-item">
                    <div class="item-img">
                        <img src="../assets/img/service-item2.png" alt="">
                    </div>
                    <div class="wrap">
                        <div class="item-title">Thanh toán tiền điện</div>
                        <div class="item-text">Thanh toán nhanh chóng, tiện lợi</div>
                    </div>

                </a>
                <a class="service-item">
                    <div class="item-img">
                        <img src="../assets/img/service-item3.png" alt="">
                    </div>
                    <div class="wrap">
                        <div class="item-title">Thẻ cào điện thoại</div>
                        <div class="item-text">Giảm 2% cho thẻ mệnh giá từ 100.000đ</div>
                    </div>

                </a>
                <a class="service-item">
                    <div class="item-img">
                        <img src="../assets/img/service-item4.png" alt="">
                    </div>
                    <div class="wrap">
                        <div class="item-title">Thẻ game</div>
                        <div class="item-text">Giảm 2% cho thẻ mệnh giá từ 100.000đ</div>
                    </div>

                </a>
            </ul>

            <button onclick="topFunction()" id="myBtn" title="Go to top">Go To Top</button>
        </div>
    </div>
</section>
<section>
    <div class="container">
        <div class="fs-bxh">
            <div class="category-container">
                <ul class="fs-bhx-main clearfix">
                    <li><a href="#">
                            <span>
                                <img src="../assets/img/simthe.webp" alt="">
                            </span>
                        </a>
                    </li>
                    <li><a href="#">
                            <span>
                                <img src="../assets/img/hangduan.webp" alt="">
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span>
                                <img src="../assets/img/baohanh.webp" alt="">
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<?php include(TEMPLATE_FRONT . DS . "footer.php"); ?>
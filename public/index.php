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
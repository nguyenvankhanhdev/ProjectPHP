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
                <div class="title-img"><a href="#"><img src="https://images.fpt.shop/unsafe/fit-in/1168x97/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2024/5/2/638502733227139543_H7- 1200x100.png" alt=""></a></div>
            </div>
            <ul class="list-brand">
                <li class="brand-item">
                    <div class="item-img"><a href="http://localhost:8080/Project_php/public/details.php?id=9"><img src="https://images.fpt.shop/unsafe/fit-in/262x324/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2024/5/2/638502733223077314_D (1).png" alt="iPhone 15 Pro Max"></a></div>
                </li>
                <li class="brand-item">
                    <div class="item-img"><a href="http://localhost:8080/Project_php/public/details.php?id=103"><img src="https://images.fpt.shop/unsafe/fit-in/262x324/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2024/5/2/638502733230957777_D (2).png" alt="iPhone 15 Pro"></a></div>
                </li>
                <li class="brand-item">
                    <div class="item-img"><a href="http://localhost:8080/Project_php/public/details.php?id=15"><img src="https://images.fpt.shop/unsafe/fit-in/262x324/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2024/5/2/638502733225889593_D (3).png" alt="iPhone 15 Plus"></a></div>
                </li>
                <li class="brand-item">
                    <div class="item-img"><a href="http://localhost:8080/Project_php/public/details.php?id=10"><img src="https://images.fpt.shop/unsafe/fit-in/262x324/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2024/5/2/638502733226827103_D (4).png" alt="iPhone 15"></a></div>
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
            $results_per_page = 15;
            if (isset($_GET['page']) && is_numeric($_GET['page'])) {
                $current_page = (int) $_GET['page'];
            } else {
                $current_page = 1;
            }
            $start = ($current_page - 1) * $results_per_page;
            $query = "SELECT * FROM products LIMIT  " . "{$start}" . "," . "{$results_per_page}";
            $send_query = query($query);
            confirm($send_query);
            while ($row = fetch_array($send_query)) {
                $formatted = number_format($row['product_price'], 0, ",", ".");
                $price_sale = number_format($row['product_price'] + 2000000, 0, ",", ".");
                $product = <<<DELIMITER
               <div class='cart-item'>
                   <div class="cart-product-img">
                       <a href="../public/details.php?id={$row['product_id']}" target="_blank"> <img class="cart-img" src='../assets/img/{$row['product_image']}' alt=''></a>
                       <div class="cart-product-label">
                           <div class="badge-warning">Trả góp 0%</div>
                           <div class="badge-primary">Giảm 2.000.000đ</div>
                       </div>
                   </div>
                   <div class='item-name ml-4'>{$row['product_title']}</div>
                   <div class="price-cart">
                       <div class="price-sale">{$formatted} đ</div>
                       <div class="price-strike">
                           <strike>{$price_sale} đ</strike>
                           <p style="display:none" class="day_sale">2 ngày 13:37:50</p>
                           <p style="font-size:12px" id="countdown"></p>
                       </div>
                   </div>
                   <div class="cart-product">
                       <div class="rating p-t-4">
                           <div icon="star" class="icon is-active"><svg height="15" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M381.2 150.3L524.9 171.5C536.8 173.2 546.8 181.6 550.6 193.1C554.4 204.7 551.3 217.3 542.7 225.9L438.5 328.1L463.1 474.7C465.1 486.7 460.2 498.9 450.2 506C440.3 513.1 427.2 514 416.5 508.3L288.1 439.8L159.8 508.3C149 514 135.9 513.1 126 506C116.1 498.9 111.1 486.7 113.2 474.7L137.8 328.1L33.58 225.9C24.97 217.3 21.91 204.7 25.69 193.1C29.46 181.6 39.43 173.2 51.42 171.5L195 150.3L259.4 17.97C264.7 6.954 275.9-.0391 288.1-.0391C300.4-.0391 311.6 6.954 316.9 17.97L381.2 150.3z"></path></svg></div>
                           <div icon="star" class="icon is-active"><svg height="15" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M381.2 150.3L524.9 171.5C536.8 173.2 546.8 181.6 550.6 193.1C554.4 204.7 551.3 217.3 542.7 225.9L438.5 328.1L463.1 474.7C465.1 486.7 460.2 498.9 450.2 506C440.3 513.1 427.2 514 416.5 508.3L288.1 439.8L159.8 508.3C149 514 135.9 513.1 126 506C116.1 498.9 111.1 486.7 113.2 474.7L137.8 328.1L33.58 225.9C24.97 217.3 21.91 204.7 25.69 193.1C29.46 181.6 39.43 173.2 51.42 171.5L195 150.3L259.4 17.97C264.7 6.954 275.9-.0391 288.1-.0391C300.4-.0391 311.6 6.954 316.9 17.97L381.2 150.3z"></path></svg></div>
                           <div icon="star" class="icon is-active"><svg height="15" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M381.2 150.3L524.9 171.5C536.8 173.2 546.8 181.6 550.6 193.1C554.4 204.7 551.3 217.3 542.7 225.9L438.5 328.1L463.1 474.7C465.1 486.7 460.2 498.9 450.2 506C440.3 513.1 427.2 514 416.5 508.3L288.1 439.8L159.8 508.3C149 514 135.9 513.1 126 506C116.1 498.9 111.1 486.7 113.2 474.7L137.8 328.1L33.58 225.9C24.97 217.3 21.91 204.7 25.69 193.1C29.46 181.6 39.43 173.2 51.42 171.5L195 150.3L259.4 17.97C264.7 6.954 275.9-.0391 288.1-.0391C300.4-.0391 311.6 6.954 316.9 17.97L381.2 150.3z"></path></svg></div>
                           <div icon="star" class="icon is-active"><svg height="15" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M381.2 150.3L524.9 171.5C536.8 173.2 546.8 181.6 550.6 193.1C554.4 204.7 551.3 217.3 542.7 225.9L438.5 328.1L463.1 474.7C465.1 486.7 460.2 498.9 450.2 506C440.3 513.1 427.2 514 416.5 508.3L288.1 439.8L159.8 508.3C149 514 135.9 513.1 126 506C116.1 498.9 111.1 486.7 113.2 474.7L137.8 328.1L33.58 225.9C24.97 217.3 21.91 204.7 25.69 193.1C29.46 181.6 39.43 173.2 51.42 171.5L195 150.3L259.4 17.97C264.7 6.954 275.9-.0391 288.1-.0391C300.4-.0391 311.6 6.954 316.9 17.97L381.2 150.3z"></path></svg></div>
                           <div icon="star" class="icon is-active"><svg height="15" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M381.2 150.3L524.9 171.5C536.8 173.2 546.8 181.6 550.6 193.1C554.4 204.7 551.3 217.3 542.7 225.9L438.5 328.1L463.1 474.7C465.1 486.7 460.2 498.9 450.2 506C440.3 513.1 427.2 514 416.5 508.3L288.1 439.8L159.8 508.3C149 514 135.9 513.1 126 506C116.1 498.9 111.1 486.7 113.2 474.7L137.8 328.1L33.58 225.9C24.97 217.3 21.91 204.7 25.69 193.1C29.46 181.6 39.43 173.2 51.42 171.5L195 150.3L259.4 17.97C264.7 6.954 275.9-.0391 288.1-.0391C300.4-.0391 311.6 6.954 316.9 17.97L381.2 150.3z"></path></svg></div>
                       </div>
                       <div class="icon">
                           <span><i class="bi bi-cpu"></i>{$row['Chip']}</span>
                           <span><i class="bi bi-phone"></i>{$row['Display']}</span>
                           <span><i class="bi bi-postage-fill"></i>{$row['Ram']}GB</span>
                           <span><i class="bi bi-hdd"></i>{$row['Memory']}GB</span>
                       </div>
                   </div>
                   <div class="cart-btn">
                       <div class="btn-buynow">
                           <a href="../resources/cart.php?add={$row['product_id']}">Mua ngay</a>
                       </div>
                       <div class="btn-buynow" >
                           <a href="./index.php?wishlists={$row['product_id']}">Yêu thích</a>
                       </div>
                   </div>
               </div>
               DELIMITER;
                echo $product;
            }
            insertWishlists();
            ?>
        </div>
        <div style="text-align: center;">
            <?php
            $result = mysqli_query($connection, "SELECT COUNT(*) AS total FROM products");
            $page = mysqli_fetch_assoc($result);
            $total_pages = ceil($page['total'] / $results_per_page);

            if ($current_page > 1) {
                echo "<a style='font-size:15px;margin-right:5px;' href=\"index.php?page=" . ($current_page - 1) . "\" class=\"btn btn-primary fs-5\">Prev</a> ";
            }

            for ($i = 1; $i <= $total_pages; $i++) {
                if ($i == $current_page) {
                    echo "<a style='font-size:15px;margin-right:5px;' href=\"index.php?page=$i\" class=\"btn btn-danger active fs-5\">$i</a> ";
                } else {
                    echo "<a style='font-size:15px;margin-right:5px;' href=\"index.php?page=$i\" class=\"btn btn-primary\"  >$i</a> ";
                }
            }

            if ($current_page < $total_pages) {
                echo "<a style='font-size:15px;margin-right:5px;' href=\"index.php?page=" . ($current_page + 1) . "\" class=\"btn btn-primary\" >Next</a> ";
            }
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
<?php include(TEMPLATE_FRONT . DS . "footer_index.php"); ?>
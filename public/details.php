<?php require_once("../resources/config.php"); ?>
<?php include(TEMPLATE_FRONT . DS . "header_details.php"); ?>
<div class="container">
    <div class=" row">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./index.html" target="_blank">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="">Điện thoại</a></li>
            <li class="breadcrumb-item"><a href="">iPhone</a></li>
        </ol>
    </div>
    <?php
    $query = "SELECT * FROM products WHERE product_id =" . escape_string($_GET['id']) . " ";
    $query_details = query($query);
    while ($row = fetch_array($query_details)):
        $formated_price = number_format($row['product_price'], 0, ",", ".");
    ?>
        <div class="pd-top">
            <h1 class="details-name title-name"> <?php echo $row['product_title']; ?></h1>
            <div class="start">
                <div class="comments">
                    <a href="#" class="review re-link">Đánh giá</a>
                </div>
                <div class="rating-line"></div>
                <div class="questions">
                    <a href="#" class="review re-link" id="question">Hỏi & Đáp</a>
                </div>
            </div>
        </div>
        <div class="line">
        </div>

        <div class="pd-body">
            <div class="pd-left">




                <!-- <img class="image-cart" src="../assets/img/<?php echo $row['product_image']; ?>" alt="">
                    <div class="product">
                        <div class="badge-warning">Trả góp 0%</div>
                        <div class="badge-primary">Giảm 5.000.000đ</div>
                    </div> -->

                <div class="image">
                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" aria-label="Slide 5"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="5" aria-label="Slide 6"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img style="width: 67%;" src="../assets/img/<?php echo $row['product_image']; ?>" class="d-block " alt="logo.png">
                            </div>
                            <?php
                            set_img_product();
                            ?>

                        </div>
                        <button class="carousel-control-prev " type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon  border-secondary  " aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>




                <div class="info">
                    <a href="../resources/cart.php?add=<?php echo $row['product_id']; ?>">
                        <button class="info-buy">
                            Mua ngay
                            <p>Nhận tại cửa hàng hoặc nhận tại shop</p>
                        </button>
                    </a>
                </div>
                <div class="buy">
                    <div class="pay-info mr-4">
                        <div> <strong>Trả Góp Qua Thẻ</strong></div>
                        <p>Visa MasterCard</p>
                    </div>

                    <div class="pay-info">
                        <div> <strong>Trả Góp</strong></div>
                        <p>Duyệt nhanh qua điện thoại</p>
                    </div>
                </div>

            </div>
            <div class="pd-right">
                <div class="price_details">
                    <div class="price">
                    </div>
                    <strike> <?php echo $formated_price; ?>đ </strike>

                </div>

                <div class="st-card">
                    <h2 class="card-title">Thông số kỹ thuật</h2>
                    <div class="card-body">
                        <table class="card-table">
                            <tbody>
                                <tr>
                                    <td>Màn hình</td>
                                    <td>6.7 inch, Super Retina XDR, 2796 x 1290 Pixels</td>
                                </tr>
                                <tr>
                                    <td>Camera sau</td>
                                    <td>48.0 MP + 12.0 MP</td>
                                </tr>
                                <tr>
                                    <td>Camera Selfie</td>
                                    <td>12.0 MP</td>
                                </tr>
                                <tr>
                                    <td>Bộ nhớ trong</td>
                                    <td>128 GB</td>
                                </tr>
                                <tr>
                                    <td>CPU</td>
                                    <td>Apple A16 Bionic</td>
                                </tr>
                                <tr>
                                    <td>Dung lượng pin</td>
                                    <td>29 Giờ</td>
                                </tr>
                                <tr>
                                    <td>Thẻ sim</td>
                                    <td>1 - 1 eSim, 1 Nano SIM</td>
                                </tr>
                                <tr>
                                    <td>Hệ điều hành</td>
                                    <td>iOS 16</td>
                                </tr>
                                <tr>
                                    <td>Xuất xứ</td>
                                    <td>Trung Quốc</td>
                                </tr>
                                <tr>
                                    <td>Thời gian ra mắt</td>
                                    <td>09/2022</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="content" id="content">
            <div class="main-content">
                <h2>Đặc điểm nổi bật</h2>
                <div>
                    <ul>
                        <li><?php echo $row['product_description']; ?></li>
                    </ul>
                </div>
            </div>
            <div class="content-item">
            </div>
        </div>
        <!-- // comment -->
        <div class="well" id="well">
            <h4>Leave a Comment:</h4>
            <form role="form">
                <div class="form-group">
                    <textarea class="form-control" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <div class="media" id="media">
            <a class="pull-left" href="#">
                <img class="media-object" src="http://placehold.it/64x64" alt="">
            </a>
            <div class="media-body">
                <h4 class="media-heading">Start Bootstrap
                    <small>August 25, 2014 at 9:30 PM</small>
                </h4>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
            </div>
        </div>
        <div class="media">
            <a class="pull-left" href="#">
                <img class="media-object" src="http://placehold.it/64x64" alt="">
            </a>
            <div class="media-body">
                <h4 class="media-heading">Start Bootstrap
                    <small>August 25, 2014 at 9:30 PM</small>
                </h4>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                <!-- Nested Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Nested Start Bootstrap
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                    </div>
                </div>
                <!-- End Nested Comment -->
            </div>
        </div>
</div>

<?php endwhile; ?>

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
                        <li><a href="">Câu hỏi thường gặp </a></li>
                    </ul>
                    <div class="contact-icon">
                        <div class="icon-item">
                            <img class="cth1" src="./assets/img/ft-img1.png" alt="">
                        </div>
                        <div class="icon-item">
                            <img class="cth2" src="./assets/img/ft-img2.png" alt="">
                        </div>
                    </div>
                </div>
                <div class="contact-item">
                    <ul>
                        <li><a href="">Tin tuyển dụng</a></li>
                        <li><a href="">Tin khuyến mãi</a></li>
                        <li><a href="">Hướng dẫn mua online</a></li>
                        <li><a href="">Hướng dẫn mua trả góp</a></li>

                    </ul>
                    <p class="trtit">Chứng nhận:</p>
                    <div class="contact-icon">
                        <div class="icon-item">
                            <img class="cth3" src="./assets/img/ft-img3.png" alt="">
                        </div>
                        <div class="icon-item">
                            <img class="cth3" src="./assets/img/ft-img4.png" alt="">
                        </div>
                        <div class="icon-item">
                            <img class="cth3" src="./assets/img/ft-img5.png" alt="">
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
                            <p>Tư vấn mua hàng miễn phí</p>
                            <a href="">1800 6601 <span>(Nhánh 1)</span></a>

                        </li>
                        <li>
                            <p>Hỗ trợ kỹ thuật</p>
                            <a href="">1800 6601
                                <span>(Nhánh 2)</span>
                            </a>
                        </li>
                        <li>
                            <p>Góp ý, khiếu nại(8h - 22h00)</p>
                            <a href="">1800 6616</a>
                        </li>
                    </ul>
                    <p class="contact-title">Hỗ trợ thanh toán</p>
                    <div class="support-pay">
                        <div class="pay-item"><img src="./assets/img/visa.png" alt=""></div>
                        <div class="pay-item"><img src="./assets/img/atm.png" alt=""></div>
                        <div class="pay-item"><img src="./assets/img/zalo-pay.png" alt=""></div>
                        <div class="pay-item"><img src="./assets/img/master-card.png" alt=""></div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</footer>
</main>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<script src="../public/js.js"></script>

</html>
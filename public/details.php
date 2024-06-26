<?php require_once("../resources/config.php"); ?>
<?php include(TEMPLATE_FRONT . DS . "header_details.php"); ?>
<?php
if (isset($_POST['submit'])) {
    if (!isset($_SESSION['id'])) {
        header("Location: log-in.php");
        exit;
    }
}
if (isset($_POST['submit'])) {
    $comment_pro_id = $_GET['id'];
    $comment_user_id = $_SESSION['id'];
    $comment_content = $_POST['comment_content'];
    $comment_name = $_POST['comment_name'];
    if (!empty($comment_content) || !empty($comment_name)) {
        $query = "INSERT INTO comments (comment_pro_id, comment_user_id, comment_content, comment_name ,comment_date) ";
        $query .= "VALUES ('$comment_pro_id', '$comment_user_id', '$comment_content', '$comment_name' ,NOW())";
        $result = mysqli_query($connection, $query);

        if ($result) {
            header("Location: details.php?id=$comment_pro_id");
            exit;
        } else {
            echo "<script>alert('Đã có lỗi xảy ra. Vui lòng thử lại sau!');</script>";
        }
    } else {
        echo "<script>alert('Vui lòng nhập bình luận và tên của bạn !');</script>";
    }
}
?>

<?php
if (isset($_POST['replycmt'])) {
    $comment_user_id = $_SESSION['id'];
    $comment_pro_id = $_GET['id'];
    $reply_comment_content = $_POST['comment_content'];
    $reply_comment_name = $_POST['comment_name'];
    $comment_id_reply = $_POST['comment_id_reply'];

    if (!empty($reply_comment_content) || !empty($reply_comment_name)) {
        $query1 = "INSERT INTO comment_replys (id_user_comment, id_comment_reply, rep_comment_content, rep_comment_name,rep_comment_date) ";
        $query1 .= "VALUES ('$comment_user_id', '$comment_id_reply', '$reply_comment_content','$reply_comment_name', NOW())";
        $result1 = mysqli_query($connection, $query1);
        if ($result1) {
            header("Location: details.php?id=$comment_pro_id");
            exit;
        } else {
            echo "<script>alert('Đã có lỗi xảy ra. Vui lòng thử lại sau!');</script>";
        }
    } else {
        echo "<script>alert('Vui lòng nhập bình luận và tên của bạn !');</script>";
    }
}

?>



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
    while ($row = fetch_array($query_details)) :
        $formated_price = number_format($row['product_price'], 0, ",", ".");
        $formated_price_sale = number_format($row['product_price']+2000000, 0, ",", ".");
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
                <div class="image">
                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2000">
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
                                <img style="width: 67%; margin-left:100px;" src="../assets/img/<?php echo $row['product_image']; ?>" class="d-block " alt="logo.png">
                            </div>
                            <?php
                            set_img_product();
                            ?>

                        </div>
                        <button class="carousel-control-prev " type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                            <span style="border-radius: 50%;" class="carousel-control-prev-icon border-secondary" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                            <span style="border-radius: 50%;" class="carousel-control-next-icon border-secondary " aria-hidden="true"></span>
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
<?php echo $formated_price; ?>đ
                    </div>
                    <strike> <?php echo $formated_price_sale; ?> đ </strike>

                </div>

                <div class="st-card">
                    <h2 class="card-title">Thông số kỹ thuật</h2>
                    <div class="card-body">
                        <table class="card-table">
                            <tbody>
                                <tr>
                                    <td>Màn hình</td>
                                    <td><?php echo $row['Display']?></td>
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
                                    <td><?php echo $row['Memory']?> GB</td>
                                </tr>
                                <tr>
                                    <td>CPU</td>
                                    <td><?php echo $row['Chip']?></td>
                                </tr>
                                <tr>
                                    <td>RAM</td>
                                    <td><?php echo $row['Ram']?> GB</td>
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
            </br>
            <form role="form" method="post">
                <div class="form-group">
                    <input class="form-control" name="comment_name" placeholder="Nhập tên" />
                    </br>
                    <textarea class="form-control" name="comment_content" rows="3" placeholder="Nhập bình luận"></textarea>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <div class="comment" id="comment">
            <?php
            $per_page = 5;

            if (isset($_GET['page'])) {

                $page = $_GET['page'];
            } else {
                $page = "";
            }

            if ($page == "" || $page == 1) {
                $page_1 = 0;
            } else {
                $page_1 = ($page * $per_page) - $per_page;
            }

            $cmt_query_count = "SELECT * FROM comments";
            $find_count = mysqli_query($connection, $cmt_query_count);
            $count = mysqli_num_rows($find_count);
            $count = ceil($count / $per_page);
            $product_id = $_GET['id'];
            $query = "SELECT * FROM comments WHERE comment_pro_id = $product_id ORDER BY comment_id DESC LIMIT $page_1 ,$per_page";
            $result = mysqli_query($connection, $query);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $reply_comment_id = $row['comment_id'];
                    $user_id = $row['comment_user_id'];
                    $query1 = "SELECT * FROM users WHERE user_id = $user_id";
                    $result1 = mysqli_query($connection, $query1);
                    if (mysqli_num_rows($result) > 0) {
                        $name = mysqli_fetch_assoc($result1);
                    }

            ?>
                    <div class="media" id="media">
                        <div class="user-block">
                            <a class="pull-left" href="#">
                                <img class="media-object" style=" margin-right: 16px; border-radius: 45px;" src="http://placehold.it/64x64" alt="">
                            </a>
                            <div class="media-body">
                                <form role="form" method="post">
                                    <input type="hidden" class="form-control" name="product_id" value="<?php echo $product_id ?>">
                                    <input type="hidden" class="form-control" name="comment_id_reply" value="<?php echo $row['comment_id'] ?>">
                                    <h4 class="media-heading"><?php echo $row['comment_name']; ?>
                                    </h4>
                                    <?php echo "<p>{$row['comment_content']}</p>"; ?>
                                    <small class="date_cmt" id="comment_date"><?php echo $row['comment_date']; ?></small>
                                    <i class="bi bi-dot"></i>
                                    <p class="likes re-link">Thích </p>
                                    <i class="bi bi-dot"></i>
                                    <p class="reply re-link" data-bs-toggle="modal" data-bs-target="#staticBackdrop_<?php echo $row['comment_id']; ?>">
                                        Trả lời
                                    </p>

                                    <!-- Modal -->
                                    <div class="modal fade " id="staticBackdrop_<?php echo $row['comment_id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="staticBackdropLabel">Trả lời </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- <form action="" method="post"> -->
                                                    <div class="form-group">
                                                        <textarea class="form-control" name="comment_content" rows="3"></textarea>
                                                    </div>

                                                    </br>
                                                    <div class="form-group">
                                                        <input class="form-control" name="comment_name" placeholder="Nhập họ và tên">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary" name="replycmt">Hoàn tất</button>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                        <?php
                        $query2 = "SELECT * FROM comment_replys WHERE id_comment_reply = $reply_comment_id ";
                        $result2 = mysqli_query($connection, $query2);
                        if (mysqli_num_rows($result2) > 0) {
                            while ($row1 = mysqli_fetch_assoc($result2)) {
                        ?>
                                <div class="user-block reply-cmt">
                                    <div class="avatar avatar-md avatar-logo avatar-circle">
                                        <div class="avatar-shape"><img src="https://fptshop.com.vn/api-data/comment/Content/desktop/images/logo.png" alt="logo"></div>
                                        <div class="avatar-info">
                                            <div class="avatar-name">
                                                <div class="text"><?php echo $row1['rep_comment_name'] ?> trả lời <?php echo $row['comment_name'] ?></div>
                                            </div>
                                            <div class="avatar-para">
                                                <div class="text">
                                                    <?php echo "<p>{$row1['rep_comment_content']}</p>"; ?>
                                                </div>
                                            </div>
                                            <div class="avatar-time">
                                                <small class="date_cmt" id="comment_date"><?php echo $row1['rep_comment_date']; ?></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        <?php
                            }
                        } else {
                        }
                        ?>

                    </div>
            <?php
                }
            } else {
                echo "Chưa có bình luận nào cho sản phẩm này.";
            }
            ?>
            <div class="pages">
                <div class="select-device__pagination">
                    <ul class="pagination pagination-space">
                        <li class="pagination-item"><a class="pagination-link"><i class="bi bi-caret-left-fill"></i></a></li>

                        <?php
                        for ($i = 1; $i <= $count; $i++) {

                            if ($i == $page) {
                                echo " <li class='pagination-item'><a class='pagination-link active-link' id='page' href='../public/details.php?id={$_GET['id']}&page={$i}'>{$i}</a></li>";
                            } else {
                                echo " <li class='pagination-item'><a class='pagination-link' id='page' href='../public/details.php?id={$_GET['id']}&page={$i}'>{$i}</a></li>";
                            }
                        }

                        ?>

                        <li class="pagination-item"><a class="pagination-link"><i class="bi bi-caret-right-fill"></i></a></li>



                    </ul>
                </div>
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
<?php require_once("../resources/config.php"); ?>
<?php include(TEMPLATE_FRONT . DS . "header.php"); ?>
<div class="cart-wrapper">
    <div class="row">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./index.php">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="">Giỏ hàng</a></li>
        </ol>
    </div>
    <div class="empty-cart">
        <div class="row">
            <div class="col-12">
                <div class="cart-empty_cart-status__hQc6I cart-empty_txt-center__BQkYK">
                    <div class="col-6">
                        <picture><img alt="img" src="../assets/img/empty-cart.png" width="296" height="180" decoding="async" data-nimg="1" loading="lazy" style="color: transparent;"></picture>
                    </div>
                    <p class="css-8uyn92 text-red-5 px-16 md:px-0">Chưa có sản phẩm nào trong giỏ hàng</p>
                    <p class="cart-empty_desc__Zn4GU">Cùng mua sắm hàng ngàn sản phẩm tại Shop nhé!</p>
                    <div class="cart-status_btn m-b-32 cart-empty_cart-status_btn__yWtjL">
                        <a href="../public/index.php">
                            <button type="button" class="btn btn-danger">
                                <span>Mua hàng</span>
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post"> -->
    <!-- <input type="hidden" name="cmd" value="_cart">
        <input type="hidden" name="business" value="sb-8pk4029773325@business.example.com">
        <input type="hidden" name="currency_code" value="USD">
        <input type="hidden" name="upload" value="1"> -->
    <form action="" method="post" class="checkout">
        <div class="cart-header">
            <div class="cart-title">
                <p>Giỏ hàng</p>
                <h1><?php display_message(); ?></h1>
            </div>
            <div class="check-cart-all">
                <input type="checkbox" value="Tất cả">
                <label for="">Tất cả</label>
            </div>
            <?php cart(); ?>
        </div>
        <div class="cart-footer">
            <div class="cart-bottom">
                <div class="total-box">
                    <p class="total-tittle">Tổng tiền tạm tính</p>
                    <p class="total-quantity">
                        Số lượng: <span id="total-quantity">0</span>
                    </p>
                    <p class="total-price">
                        Đơn giá: <span id="total-price">0đ</span>
                    </p>
                </div>
                <div class="summit">
                    <span style="font-size: 20px;font-weight:600;">Địa chỉ nhận hàng</span>
                    <form id="myForm" method="post">
                        <div class="row p-0 mt-3">
                            <?php
                            checkout_cart();
                            ?>
                            <div class="col-4">
                                <div class="form-group">
                                    <select id="province" name="province" class="form-control">
                                        <option value="">Chọn một tỉnh</option>
                                        <?php
                                        get_province();
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4 ">
                                <div class="form-group">
                                    <select id="district" name="district" class="form-control">
                                        <option value="">Chọn một quận/huyện</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4 ">
                                <div class="form-group">
                                    <select id="wards" name="wards" class="form-control">
                                        <option value="">Chọn một xã</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 mt-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="tenduong" placeholder="Nhập địa chỉ, tên đường.." required>
                                </div>
                            </div>
                            <span style="font-size: 20px;font-weight:600;" class="mt-3">Thông tin người nhận</span>
                            <div class="col-6 mt-3">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="order_username" placeholder="Nhập họ tên" required>
                                </div>
                            </div>
                            <div class="col-6 mt-3">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="phone_checkout" placeholder="Nhập số điện thoại" required>
                                </div>
                            </div>
                            <div class="col-12 mt-2">
                                <input type="button" class="btn btn-primary w-100 form-input my-3" value="Đặt hàng" onchange="checkout();" name="checkout">
                            </div>
                        </div>
                    </form>

                    <br>
                </div>
            </div>
        </div>
    </form>
</div>
<?php include(TEMPLATE_FRONT . DS . "footer.php"); ?>
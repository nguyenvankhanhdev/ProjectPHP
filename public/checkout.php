<?php require_once("../resources/config.php"); ?>
<?php include(TEMPLATE_FRONT . DS . "header.php"); ?>


<div class="cart-wrapper">
    <div class="row">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./index.html">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="">Giỏ hàng</a></li>
        </ol>
    </div>
    <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
    <input type="hidden" name="cmd" value="_cart">
    <input type="hidden" name="business" value="sb-8pk4029773325@business.example.com">
    <input type="hidden" name="currency_code" value="USD">
    <input type="hidden" name="upload" value="1">
        <div class="cart-header">
            <div class="cart-title">
                <p>Giỏ hàng</p>
            </div>

            <?php cart(); ?>

        </div>
        <div class="cart-footer">
            <div class="cart-bottom">
                <div class="total-box">
                    <p class="total-tittle">Tổng tiền tạm tính</p>
                    <!-- biến số lượng trong giỏ hàng -->
                    <p class="total-price">
                        <?php echo isset($_SESSION['item_quantity']) ? $_SESSION['item_quantity'] : $_SESSION['item_quantity'] = "0"; ?>đ
                    </p>
                    <p class="total-price">
                        <?php echo isset($_SESSION['item_total']) ? $_SESSION['item_total'] : $_SESSION['item_total'] = "0"; ?>đ
                    </p>
                </div>
                <div class="summit">
                    <button class="summit-button" name="upload" >Tiến hành đặt hàng</button>
                    <input type="image" name="submit" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" alt="PayPal - The safer, easier way to pay online">
                    <br>
                    <button class="summit-a"><a href="./index.php" target="_blank">Chọn thêm sản phẩm khác</a></button>
                </div>
            </div>
        </div>
    </form>
</div>
<?php include(TEMPLATE_FRONT . DS . "footer.php"); ?>
<?php require_once("../resources/config.php"); ?>
<?php include(TEMPLATE_FRONT . DS . "header.php"); ?>
<div class="cart-wrapper">
    <div class="row">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./index.html">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="">Đặt hàng</a></li>
        </ol>
    </div>

    <?php if (isset($_POST['submit'])) {

        $city = $_POST['city'];
        $district = $_POST['district'];
        $ward = $_POST['ward'];
        $phonenumber = $_POST['phonenumber'];
    }
    ?>
    <div id="orderConfirmation" style="opacity: 0;">
        <p>Tổng số lượng sản phẩm: <?php echo isset($_POST['item_quantity']) ? $_POST['item_quantity'] : 0; ?></p>
        <p>Tổng tiền: <?php echo isset($_POST['item_total']) ? $_POST['item_total'] : "0"; ?>đ</p>
        <p>Tên Khách Hàng: <?php echo isset($_POST['username']) ? $_POST['username'] : ""; ?></p>
        <p>Địa chỉ: <?php echo isset($_POST['city']) ? $_POST['city'] : ""; ?></p>
        <p>Số điện thoại: <?php echo isset($_POST['phonenumber']) ? $_POST['phonenumber'] : ""; ?></p>
    </div>
    <div class="cart-header">
        <div class="cart-title">
            <p>Đặt hàng</p>
            <form action="orders.php" method="POST" class="form-orders" style="z-index:10000px">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Thành phố</label>
                    <input type="text" class="form-control" name="city" required>
                </div>
                <div class="mb-3">
                    <label for="district" class="form-label">Quận/Huyện:</label>
                    <input type="text" id="district" class="form-control" name="district" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="ward">Xã/Phường:</label>
                    <input type="text" id="ward" class="form-control" name="ward" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="ward">Số điện thoại</label>
                    <input type="text" id="ward" class="form-control" name="phonenumber" required>
                </div>
                <input type="submit" class="btn btn-success " value="Xác nhận đơn hàng" name="submit">
            </form>
        </div>
    </div>
    <div class="cart-footer">
        <div class="cart-bottom">
        </div>
    </div>
    <script>
        const order = document.querySelector(".btn-success");
        const info = document.getElementById("orderConfirmation");

        console.log(order);
        console.log(info);
        order.addEventListener('submit', function(e) {
            info.style.opacity = 100;
        });
    </script>

</div>
<?php include(TEMPLATE_FRONT . DS . "footer.php"); ?>
<?php require_once("../resources/config.php"); ?>
<?php include(TEMPLATE_FRONT . DS . "header.php"); ?>
<div class="cart-wrapper">
    <div class="row">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./index.html">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="">Giỏ hàng</a></li>
        </ol>
    </div>
    <!-- <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post"> -->
    <!-- <input type="hidden" name="cmd" value="_cart">
        <input type="hidden" name="business" value="sb-8pk4029773325@business.example.com">
        <input type="hidden" name="currency_code" value="USD">
        <input type="hidden" name="upload" value="1"> -->
    <form action="" method="post">
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
                <?php
                $pdo = new PDO('mysql:host=localhost;dbname=e_com', 'root', '');
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $requestData = json_decode(file_get_contents("php://input"), true);
                    $username = $requestData['username'];
                    $phoneNumber = $requestData['phoneNumber'];
                    $address = $requestData['address'];
                    $checkedItems = $requestData['checkedItems'];

                    $address_parts = explode(', ', $address[0]);
                    if (count($address_parts) === 4) {
                        $province_id = $address_parts[0];
                        $district_id = $address_parts[1];
                        $ward_id = $address_parts[2];
                        $streetName = $address_parts[3];

                        $sql_province = "SELECT name FROM province WHERE province_id = :province_id";
                        $stmt_province = $pdo->prepare($sql_province);
                        $stmt_province->bindParam(':province_id', $province_id);
                        $stmt_province->execute();
                        $province_row = $stmt_province->fetch(PDO::FETCH_ASSOC);
                        $province = $province_row['name'];

                        $sql_district = "SELECT name FROM district WHERE district_id = :district_id";
                        $stmt_district = $pdo->prepare($sql_district);
                        $stmt_district->bindParam(':district_id', $district_id);
                        $stmt_district->execute();
                        $district_row = $stmt_district->fetch(PDO::FETCH_ASSOC);
                        $district = $district_row['name'];


                        $sql_ward = "SELECT name FROM wards WHERE wards_id = :ward_id";
                        $stmt_ward = $pdo->prepare($sql_ward);
                        $stmt_ward->bindParam(':ward_id', $ward_id);
                        $stmt_ward->execute();
                        $ward_row = $stmt_ward->fetch(PDO::FETCH_ASSOC);
                        $ward = $ward_row['name'];

                        $fullAddress = "$province, $district, $ward, $streetName";
                    } else {
                        set_massage("Địa chỉ không hợp lệ. Vui lòng kiểm tra lại.");
                    }
                    $totalPrice = 0;
                    $totalQuantity = 0;

                    foreach ($checkedItems as $item) {
                        $totalPrice += $item['productPrice'];
                        $totalQuantity += $item['quantity'];
                        $product_id = $item['id'];
                        $quantity = $item['quantity'];
                        $sql_update_quantity = "UPDATE products SET product_quantity = product_quantity - :quantity WHERE product_id = :product_id";
                        $stmt_update_quantity = $pdo->prepare($sql_update_quantity);
                        $stmt_update_quantity->bindParam(':quantity', $quantity, PDO::PARAM_INT);
                        $stmt_update_quantity->bindParam(':product_id', $product_id, PDO::PARAM_INT);
                        $stmt_update_quantity->execute();
                    }
                    try {
                        $pdo->beginTransaction();
                        $sql = "INSERT INTO orders (order_amount,quantity, name, phoneNumber,address,order_status) VALUES (:product_price,:quantity, :name, :phoneNumber,:address,:order_status )";
                        $statement = $pdo->prepare($sql);
                        $statement->bindValue(":product_price", $totalPrice);
                        $statement->bindValue(":quantity", $totalQuantity);
                        $statement->bindValue(":name", $username);
                        $statement->bindValue(":phoneNumber", $phoneNumber);
                        $statement->bindValue(":address", $fullAddress);
                        $statement->bindValue(":order_status", "Đã thanh toán");
                        $statement->execute();
                        foreach ($checkedItems as $itemID) {
                            if (isset($_SESSION['product_' . $itemID['id']])) {
                                unset($_SESSION['product_' . $itemID['id']]);
                                redirect("../public/checkout.php");
                            }
                        }
                        $pdo->commit();
                        echo json_encode(array("message" => "Đặt hàng thành công!"));
                    } catch (PDOException $e) {
                        $pdo->rollBack();
                        echo json_encode(array("message" => "Có lỗi xảy ra khi đặt hàng. Vui lòng thử lại sau!"));
                    }
                }
                ?>
                <div class="summit">
                    <span style="font-size: 20px;font-weight:600;">Địa chỉ nhận hàng</span>
                    <form id="myForm" method="post">
                        <div class="row p-0 mt-3">
                            <div class="col-4">
                                <div class="form-group">
                                    <select id="province" name="province" class="form-control">
                                        <option value="">Chọn một tỉnh</option>
                                        <?php
                                        $sql = "SELECT * FROM province";
                                        $result = query($sql);

                                        if (isset($_POST['add_sale'])) {
                                            echo "<pre>";
                                            print_r($_POST);
                                            die();
                                        }
                                        while ($row = mysqli_fetch_assoc($result)) {
                                        ?>
                                            <option value="<?php echo $row['province_id'] ?>"><?php echo $row['name'] ?></option>
                                        <?php
                                        }
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
                                <input type="button" class="btn btn-primary w-100 form-input my-3" value="Đặt hàng" onchange="checkout();">
                            </div>
                        </div>
                    </form>
                    <input type="image" name="submit" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" alt="PayPal - The safer, easier way to pay online">
                    <br>
                </div>
            </div>
        </div>
    </form>
</div>
<?php include(TEMPLATE_FRONT . DS . "footer.php"); ?>
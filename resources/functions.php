<?php

use PHPMailer\PHPMailer\PHPMailer;

function set_massages($msg)
{
    if (!empty($msg)) {
        $_SESSION['message'] = $msg;
    } else {
        $msg = "";
    }
}

function display_message()
{
    if (isset($_SESSION['message'])) {
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
}
function redirect($location)
{
    header("Location: $location");
}
function query($sql)
{
    global $connection;
    return mysqli_query($connection, $sql);
}
function confirm($result)
{
    global $connection;
    if (!$result) {
        die("QUERY FAILED" . mysqli_error($connection));
    }
}

function escape_string($string)
{
    global $connection;
    return mysqli_real_escape_string($connection, $string);
}

function fetch_array($query)
{
    return mysqli_fetch_array($query);
}

// font_end
function getProduct()
{
    $query = 'SELECT * FROM products ';
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
                    <p style="display:none;" class="day_sale">2 ngày 13:37:50</p>
                    <p id="countdown"></p>
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
}
function get_categories()
{
    $query = "SELECT * FROM categories";
    $send_query = query($query);
    confirm($send_query);
    while ($row = fetch_array($send_query)) {
        echo "<li class='menu'>";
        echo "<a class='item-product' href='./categories.php?cat_id={$row['cat_id']}'><i class='bi bi-phone'></i>{$row['cat_title']}</a>";
        // Fetch brands associated with this category
        $cat_id = $row['cat_id'];
        $nav_query = "SELECT * FROM brands WHERE cat_id = $cat_id";

        confirm($nav_query);
        $send_nav_query = query($nav_query);
        if (mysqli_num_rows($send_nav_query) > 0) {
            echo "<div class='subnav'>";
            while ($row1 = fetch_array($send_nav_query)) {
                echo "<div class='nav-item'><a href='./categories.php?cat_id={$cat_id}&brand_id={$row1['brand_id']}' target='_blank'>{$row1['brand_name']}</a></div>";
            }
            echo "</div>";
        }
        echo "</li>";
    }
}
function email_exists($email)
{
    $query = query("SELECT * FROM users WHERE email = '{$email}'");
    confirm($query);

    if (mysqli_num_rows($query) > 0) {

        return true;
    } else {
        return false;
    }
}
function reset_pw()
{
    global $connection;
    if (isset($_GET['email']) && isset($_GET['token'])) {
        $email = $_GET['email'];
        $token = $_GET['token'];
        $query = query("SELECT * FROM users WHERE email = '$email' AND token = '$token'");
        if (mysqli_num_rows($query) > 0) {

            if (isset($_POST['reset'])) {
                $password = escape_string($_POST['password']);
                $confirm_password = escape_string($_POST['pass']);
                if ($password !== $confirm_password) {
                    echo "<p>Passwords do not match. Please try again.</p>";
                    return;
                }
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                $new_token = bin2hex(openssl_random_pseudo_bytes(50));
                $update_query = mysqli_query($connection, "UPDATE users SET password = '$hashed_password', token = '$new_token' WHERE email = '$email'");
                if ($update_query) {
                    echo "<p>Password updated successfully!</p>";
                    redirect("../public/log-in.php");
                } else {
                    echo "<p>Failed to update password. Please try again later.</p>";
                }
            }
        }
    }
}
function forgot_pass()
{
    if (isset($_POST['forgot'])) {
        $email = escape_string($_POST['email_forgot']);
        $query = query("SELECT * FROM users WHERE email = '{$email}'");
        confirm($query);
        $row = fetch_array($query);
        if (email_exists($email)) {
            require '../vendor/autoload.php';
            $mail = new PHPMailer;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'nguyenkhanh13082003@gmail.com';
            $mail->Password = 'ufoxgsercnffmcis';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';
            $mail->setFrom('nguyenkhanh13082003@gmail.com', 'Nguyễn Văn Khánh');
            $mail->addAddress($email);
            $mail->Subject = 'Reset Password';
            $mail->Body =
                '<a href="http://localhost:8080/Project_php/public/reset.php?email=' . $email . '&token=' . $row['token'] . '">Reset Password</a>';
            if (!$mail->send()) {
                echo 'Message could not be sent.';
                echo 'Mailer Error: ' . $mail->ErrorInfo;
            } else {
                $_SESSION['email_sent'] = true;
            }
        } else {
            echo "<script>alert('Email không tồn tại vui lòng nhập lại!');</script>";
        }
    }
}
function login_user()
{
    if (isset($_POST['submit1'])) {
        $username = escape_string($_POST['username_login']);
        $password = escape_string($_POST['password_login']);
        $query = query("SELECT * FROM users WHERE username ='{$username}'");
        confirm($query);
        if (mysqli_num_rows($query) == 0) {
?>
            <script>
                document.querySelector('[data-validate="Enter username"] .error-message').textContent = 'Tên đăng nhập không tồn tại';
            </script>
            <?php
        } else {
            $row = fetch_array($query);
            $hashed_password = $row['password'];
            if (password_verify($password, $hashed_password)) {
                $_SESSION['id'] = $row['user_id'];
                $_SESSION['username'] = $username;
                if (check_role() == "admin") {
                    redirect("admin");
                } else {
                    redirect('../public/');
                }
            } else {
            ?>
                <script>
                    document.querySelector('[data-validate="Enter password"] .error-message').textContent = 'Sai Password';
                </script>
<?php

            }
        }
    }
}
function register_user()
{
    if (isset($_POST['submit2'])) {
        $username = escape_string($_POST['username_regis']);
        $password = escape_string($_POST['password_regis']);
        $email = escape_string($_POST['email_regis']);
        $token = bin2hex(openssl_random_pseudo_bytes(50));
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $query = query("INSERT INTO users(username, email, password,token,role)
        VALUES('{$username}','{$email}','{$hashed_password}','{$token}','user')");
        confirm($query);
        redirect('../public/log-in.php');
    }
}
function get_province()
{
    $sql = "SELECT * FROM province";
    $result = query($sql);
    while ($row = mysqli_fetch_assoc($result)) {
        echo " <option value='{$row['province_id']}'> {$row['name']} </option>";
    }
}
function get_Swiper()
{
    $query = query("SELECT * FROM `products` LIMIT 9, 4");
    confirm($query);
    while ($row = fetch_array($query)) {
        $formate = number_format($row['product_price'] + 2000000, 0, ".", ",");
        $formate_sale = number_format($row['product_price'], 0, ".", ",");
        $product = <<<DELIMITER
        <div class="swiper-slide">
            <div class="swiper-product">
                <a href="../public/details.php?id={$row['product_id']}">
                    <div class="swiper-img">
                        <img src="../assets/img/{$row['product_image']}" alt="image.png">
                        <div class="cart-product-label">
                            <div class="badge-warning">Trả góp 0%</div>
                            <div class="badge-primary">Giảm 2.000.000đ</div>
                        </div>
                    </div>
                </a>

                <div class="swiper-product_info">
                    <div class="item-name ml-4">{$row['product_title']}</div>
                    <h3>
                        <a href=""></a>
                    </h3>
                    <div class="price">
                        <div class="price-sale">{$formate_sale}đ</div>
                        <div class="price-strike">
                            <strike>{$formate}đ</strike>
                        </div>
                    </div>
                </div>
                <div class="swiper-product_config">
                    <div class="swiper-product_img-promo">
                        <div class="logo-tpbank">
                            <img src="../assets/img/tpbank-icon.png" alt="tpbank-icon">
                        </div>
                        <div class="logo-kenovo">
                            <img src="../assets/img/kenovo.png" alt="kenovo-icon">
                        </div>
                        <div class="swiper-product_text">
                            Giảm ngay 5% tối đa 500.000Đ qua Kredivo
                        </div>
                    </div>
                </div>
            </div>
        </div>
        DELIMITER;
        echo $product;
    }
}
function checkout_cart()
{
    $pdo = new PDO('mysql:host=localhost:33071;dbname=ecom_db', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $requestData = json_decode(file_get_contents("php://input"), true);
        $username = $requestData['username'];
        $phoneNumber = $requestData['phoneNumber'];
        $address = $requestData['address'];
        $checkedItems = $requestData['checkedItems'];
        $address_parts = explode(', ', $address[0]);

        $fullAddress = "";
        if (count($address_parts) == 4) {
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
            $fullAddress = "$streetName, $ward, $district, $province";
        } else {
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
            $sql = "INSERT INTO orders (order_amount, quantity, name, phoneNumber, address, order_status, order_date) VALUES (:product_price, :quantity, :name, :phoneNumber, :address, :order_status, :order_date)";
            $statement = $pdo->prepare($sql);
            $statement->bindValue(":product_price", $totalPrice);
            $statement->bindValue(":quantity", $totalQuantity);
            $statement->bindValue(":name", $username);
            $statement->bindValue(":phoneNumber", $phoneNumber);
            $statement->bindValue(":address", $fullAddress);
            $statement->bindValue(":order_status", "Đã thanh toán");
            $statement->bindValue(":order_date", date("Y-m-d H:i:s"));
            $statement->execute();
            $order_id = $pdo->lastInsertId();
            foreach ($checkedItems as $item) {
                $product_id = $item['id'];
                $quantity = $item['quantity'];
                $sql_order_detail = "INSERT INTO order_details (order_detail_id, product_id, detail_quantity) 
                                                     VALUES (:order_id, :product_id, :quantity)";
                $statement_order_detail = $pdo->prepare($sql_order_detail);
                $statement_order_detail->bindValue(":order_id", $order_id);
                $statement_order_detail->bindValue(":product_id", $product_id);
                $statement_order_detail->bindValue(":quantity", $quantity);
                $statement_order_detail->execute();
            }
            foreach ($checkedItems as $item) {
                $product_id = $item['id'];
                $sql_update_quantity = "DELETE FROM carts WHERE product_id = :product_id";
                $stmt_update_quantity = $pdo->prepare($sql_update_quantity);
                $stmt_update_quantity->bindParam(':product_id', $product_id, PDO::PARAM_INT);
                $stmt_update_quantity->execute();
            }
            $pdo->commit();
            echo "<div class='order_id' name='order_id'>$order_id</div>";
        } catch (PDOException $e) {
            echo $e;
            $e->getMessage();
            $pdo->rollBack();
            echo json_encode(array("success" => false));
            exit;
        }
    }
}
function insertWishlists()
{
    if (isset($_GET['wishlists'])) {
        $product_id = $_GET['wishlists'];
        $check_query = query("SELECT * FROM wishlists WHERE wish_user_id = {$_SESSION['id']} AND wish_product_id = $product_id");
        if (mysqli_num_rows($check_query) > 0) {
            echo "<script>alert(' This product is already in your wishlist.');</script>";
        } else {
            $query = query("INSERT INTO wishlists(wish_user_id, wish_product_id) 
            values({$_SESSION['id']},{$_GET['wishlists']})");
            confirm($query);
            redirect("wishlists.php");
        }
    }
}
function check_role()
{
    if (isset($_SESSION['id'])) {
        $query = query("SELECT * FROM users where user_id = {$_SESSION['id']}");
        confirm($query);
        $row = fetch_array($query);
        return $row['role'];
    }
}

function count_wishlist()
{
    if (isset($_SESSION['id'])) {
        $query = query("SELECT Count(*) 'count_wist' FROM wishlists where wish_user_id= {$_SESSION['id']}");
        confirm($query);
        $row = fetch_array($query);
        return $row['count_wist'];
    }
}
function delete_wishlists()
{
    if (isset($_GET['delete_id'])) {
        $query = query("DELETE FROM wishlists where wish_id = {$_GET['delete_id']}");
        confirm($query);
        redirect("../public/wishlists.php");
    }
}
function get_wishlists()
{
    if (isset($_SESSION['id'])) {
        $query = query("SELECT * FROM wishlists, products where wishlists.wish_product_id = products.product_id and wish_user_id = {$_SESSION['id']}");
        while ($row = fetch_array($query)) {
            $formated = number_format($row['product_price'], 0, ",", ".");
            $wishlists = <<<DELIMETER
        <tr class="d-flex justify-content-between" style="align-items: center;margin-right: 11px; ">
            <td style="padding:40px 0; position:relative;">
                <img src="../assets/img/{$row['product_image']}" style="max-width:110px; ">
                <a href="./wishlists.php?delete_id={$row['wish_id']}">
                    <div class="circle_wish_delete" data-id="{$row['wish_id']}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293z"/>
                    </svg>
                    </div>
                </a>
            </td>
            <td style="font-size:20px">{$row['product_title']}</td>
            <td style="font-size:20px; font-weight:600" >{$formated} đ</td>
            <td>
                <a href="details.php?id={$row['product_id']}" style="font-size: 16px;
                padding: 10px;
                color: #fff;
                width: auto;
                font-size: 14px;
                text-transform: capitalize;
                font-weight: 600;
                color: #fff;
                background: #08C;
                padding: 12px 25px;
                text-decoration: none;
                border: none;
                border-radius: 30px;
                outline: none;
                transition: all linear 0.3s;">Xem chi tiết</a>
            </td>
        </tr>

        DELIMETER;
            echo $wishlists;
        }
    }
}
// -------------------------------- Admin-------------------------------//

function count_products()
{
    $query = query("SELECT COUNT(*)AS count_product FROM products");
    confirm($query);
    $row = mysqli_fetch_assoc($query);
    return $row['count_product'];
}
function count_orders()
{
    $query = query("SELECT COUNT(*)AS count_order FROM orders");
    confirm($query);
    $row = mysqli_fetch_assoc($query);
    return $row['count_order'];
}
function count_categories()
{
    $query = query("SELECT COUNT(*)AS count_cate FROM categories");
    confirm($query);
    $row = mysqli_fetch_assoc($query);
    return $row['count_cate'];
}
function get_orders()
{
    $query = 'SELECT * FROM orders ';
    $send_query = query($query);
    confirm($send_query);
    while ($row = fetch_array($send_query)) {
        $formate = number_format($row['order_amount'], 0, ".", ",");
        $order = <<<DELIMITER
        <tr>
            <td>
            <a href="http://localhost:8080/Project_php/public/thank_you.php?order_id={$row['order_id']}">{$row['order_id']}</a>    
            </td>
            <td>{$row['name']}</td>
            <td>{$formate} đ</td>
            <td>{$row['phoneNumber']}</td>
            <td>{$row['address']}</td>
            <td>{$row['order_date']}</td>
            <td>{$row['order_status']}</td>
        </tr>
        DELIMITER;
        echo $order;
    }
}
function get_product_in_admin()
{
    $query = 'SELECT * FROM products ';
    $send_query = query($query);
    confirm($send_query);
    while ($row = fetch_array($send_query)) {
        $product_id = $row['product_id'];
        $query1 = "SELECT COUNT(*) AS total_comments FROM comments WHERE comment_pro_id = $product_id ";
        $result = query($query1);
        confirm($result);
        $count = mysqli_fetch_assoc($result)['total_comments'];
        $cate = show_cate_add_product($row['product_cat_id']);
        $brand = show_brands_add_product($row['brand_id']);
        $formated = number_format($row['product_price'], 0, ",", ".");
        $product = <<<DELIMETER
            <tr>
                <td>{$row['product_id']}</td>
                <td style="max-width:80px;">{$row['product_title']}</td>
                <td style="max-width:100px;"><br>
                    <a href="index.php?edit_product&id={$row['product_id']}"><img class="image-responsive" style="max-width:100px;" src="../../assets/img/{$row['product_image']}" alt="logo.png"></a>
                </td>
                <td>{$cate}</td>
                <td>{$brand}</td>
                <td>{$row['product_quantity']}</td>
                <td>{$formated}đ</td>
                <td>{$row['Display']}</td>
                <td>{$row['Chip']}</td>
                <td>{$row['Ram']}</td>
                <td>{$row['Memory']}</td>
                <td>
                    <a href="../details.php?id={$row['product_id']}">{$count}</a>
                </td>
                <td>
                    <a class ="btn btn-danger" href="../../resources/templates/back/delete_product.php?id={$row['product_id']}">
                        <span class="glyphicon glyphicon-remove"></span>
                    </a>
                </td>
            </tr>
            DELIMETER;
        echo $product;
    }
}
function add_product()
{

    if (isset($_POST['publish'])) {
        $pro_title = escape_string($_POST['product_title']);
        $pro_descrip = escape_string($_POST['product_description']);
        $pro_price = escape_string($_POST['product_price']);
        $pro_cat_id = escape_string($_POST['product_cat_id']);
        $pro_brand_id = escape_string($_POST['product_brand_id']);
        $display = escape_string($_POST['display']);
        $chip = escape_string($_POST['chip']);
        $ram = escape_string($_POST['ram']);
        $memory = escape_string($_POST['memory']);
        $quantity = escape_string($_POST['quantity']);

        $pro_img = $_FILES['image']['name'];
        $img_tmp = $_FILES['image']['tmp_name'];
        move_uploaded_file($img_tmp, "../../assets/img/$pro_img");


        $query = query("INSERT INTO products (product_title, product_cat_id, brand_id, product_price, product_quantity, product_description, product_image, Display, Chip, Ram, Memory) VALUES ('{$pro_title}', {$pro_cat_id}, {$pro_brand_id}, {$pro_price}, {$quantity}, '{$pro_descrip}', '{$pro_img}', '{$display}', '{$chip}', '{$ram}', '{$memory}')");
        confirm($query);
        set_massages("Thêm thành công");
        //redirect("index.php?products");
    }
}
function update_product()
{

    if (isset($_POST['update'])) {
        $pro_title = escape_string($_POST['product_title']);
        $pro_descrip = escape_string($_POST['product_description']);
        $pro_price = escape_string($_POST['product_price']);
        $pro_cat_id = escape_string($_POST['product_cat_id']);
        $pro_brand_id = escape_string($_POST['product_brand_id']);
        $display = escape_string($_POST['display']);
        $chip = escape_string($_POST['chip']);
        $ram = escape_string($_POST['ram']);
        $memory = escape_string($_POST['memory']);
        $quantity = escape_string($_POST['quantity']);

        $pro_img = $_FILES['image']['name'];
        $img_tmp = $_FILES['image']['tmp_name'];

        if (empty($pro_img)) {
            $get_pic = query("SELECT product_image FROM products WHERE product_id = " . escape_string($_GET['id']) . " ");
            confirm($get_pic);
            while ($row = fetch_array($get_pic)) {
                $pro_img = $row['product_image'];
            }
        }

        move_uploaded_file($img_tmp, "../../assets/img/$pro_img");
        $query = "UPDATE products SET ";
        $query  .= " product_title ='{$pro_title}',";
        $query  .= " product_cat_id ={$pro_cat_id} ,";
        $query  .= " brand_id ={$pro_brand_id}, ";
        $query  .= " product_price ={$pro_price} ,";
        $query  .= " product_quantity ={$quantity},";
        $query  .= " product_image ='{$pro_img}',";
        $query  .= " product_description ='{$pro_descrip}',";
        $query  .= " Display ='{$display}',";
        $query  .= " Chip ='{$chip}',";
        $query  .= " Ram ='{$ram}',";
        $query  .= " Memory ='{$memory}'";
        $query  .= " WHERE product_id =" . escape_string($_GET['id']) . ' ';
        $send_query = query($query);
        confirm($send_query);

        set_massages("Update thành công");
        redirect("index.php?products");
    }
}
function show_cate_add_product($pro_cat_id)
{
    $query = query("SELECT * FROM categories WHERE cat_id= '{$pro_cat_id}' ");
    confirm($query);
    while ($row = fetch_array($query)) {
        return $row['cat_title'];
    }
}
function show_brands_add_product($pro_brand_id)
{
    $query = query("SELECT * FROM brands WHERE brand_id= '{$pro_brand_id}' ");
    confirm($query);
    while ($row = fetch_array($query)) {
        return $row['brand_name'];
    }
}
function showCategories()
{
    $query = 'SELECT * FROM categories ';
    $send_query = query($query);
    confirm($send_query);
    while ($row = fetch_array($send_query)) {
        $product = <<<DELIMETER
        <tr>
            <td>{$row['cat_id']}</td>
            <td style="max-width:80px;">{$row['cat_title']}</td>
            <td>
            <a class ="btn btn-danger" href="../../resources/templates/back/delete_categories.php?id={$row['cat_id']}">
                <span class="glyphicon glyphicon-remove"></span>
            </a>
        </td>
        </tr>
        DELIMETER;
        echo $product;
    }
}
function addCate()
{
    if (isset($_POST['addcate'])) {
        $cat_title = escape_string($_POST['cat_title']);
        if (isset($cat_title) || $cat_title == " ") {
            set_massages("<p class='bg-danger'>THIS CANNOT BE EMPTY</p>");
        } else {
            $query = query("INSERT INTO categories (cat_title) VALUES('{$cat_title}')");
            confirm($query);
            set_massages("CATEGORY CREATED");
        }
    }
}
function add_img()
{
    if (isset($_POST['publish'])) {
        if (isset($_FILES['images']['name'])) {
            $pro_id = $_POST['number'];
            foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
                $file_name = $_FILES['images']['name'][$key];
                $file_tmp = $_FILES['images']['tmp_name'][$key];
                move_uploaded_file($file_tmp, "../../assets/img/$file_name");
                $sql = "INSERT INTO pro_images (img_name, pro_id) VALUES ('$file_name','$pro_id')";
                query($sql);
                confirm($sql);
                set_massages("Thành công");
            }
        } else {
            echo "Vui lòng chọn ít nhất một tệp hình ảnh.";
        }
    }
}
function set_img_product()
{
    if (isset($_GET['id'])) {
        $query = query("SELECT * FROM pro_images WHERE pro_id = " . escape_string($_GET['id'] . " "));
        confirm($query);
        while ($row = fetch_array($query)) {
            $img = <<<DELIMETER
            <div class="carousel-item">
                <img src="../assets/img/{$row['img_name']}" class="d-block w-100" alt="logo.png">
            </div>
            DELIMETER;
            echo $img;
        }
    }
}

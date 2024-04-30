<?php require_once("config.php") ?>
<?php
if (isset($_GET['add'])) {
    if (!isset($_SESSION['id'])) {
        ob_start();
        header("Location: ../public/log-in.php");
        ob_end_flush();
        exit();
    }
    $product_id = $_GET['add'];
    $user_id = $_SESSION['id'];
    $query = "SELECT * FROM carts WHERE user_id = $user_id and product_id = $product_id";
    $result = mysqli_query($connection, $query);
    confirm($result);
    if (mysqli_num_rows($result) > 0) {
        $query = "UPDATE carts set quantity = quantity + 1 where user_id = $user_id and product_id = $product_id";
    } else {
        if (!isset($_SESSION['cart_quantity'])) {
            $_SESSION['cart_quantity'] = 1;
        } else {
            $_SESSION['cart_quantity']++;
        }
        $query = "INSERT INTO carts (user_id, product_id, quantity) VALUES($user_id, $product_id, 1)";
    }

    


    $result = mysqli_query($connection, $query);
    confirm($result);
    header("Location: ../public/checkout.php");
}

if (isset($_GET['delete'])) {
    $delete = $_GET['delete'];
    $query = 'DELETE FROM carts WHERE product_id = ' . $delete . ' ';
    $result = mysqli_query($connection, $query);
    if (isset($_SESSION['cart_quantity'])) {
        $_SESSION['cart_quantity']--;
        if ($_SESSION['cart_quantity'] < 0) {
            $_SESSION['cart_quantity'] = 0;
        }
    }

    confirm($result);
    redirect("../public/checkout.php");
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $requestData = json_decode(file_get_contents("php://input"), true);
    if (isset($requestData["cart_id"]) && isset($requestData["quantity"])) {
        $cart_id = $requestData["cart_id"];
        $quantity = $requestData["quantity"];
        if ($quantity === 0) {
            $query = "DELETE FROM carts WHERE cart_id = ?";
            $statement = $connection->prepare($query);
            if ($statement) {
                $statement->bind_param("i", $cart_id);
                $result = $statement->execute();
                if ($result) {
                    $response = array("success" => true);
                } else {
                    $response = array("success" => 123);
                }
            } else {
                $response = array("success" => 1234);
            }
        } else {
            $query = "UPDATE carts SET quantity = ? WHERE cart_id = ?";
            $statement = $connection->prepare($query);
            if ($statement) {
                $statement->bind_param("ii", $quantity, $cart_id);
                $result = $statement->execute();
                if ($result) {
                    $response = array("success" => true);
                } else {
                    $response = array("success" => 1235);
                }
            } else {
                $response = array("success" => 1236);
            }
        }
        echo json_encode(array("success" => true));
    }
}


function cart()
{
    global $connection;

    if (isset($_SESSION['id'])) {
        $item_quantity = 0;
        $query = "SELECT products.*,cart_id, carts.quantity AS cart_quantity FROM carts ";
        $query .= "INNER JOIN products ON carts.product_id = products.product_id ";
        $query .= "WHERE carts.user_id = {$_SESSION['id']}";
        $result = mysqli_query($connection, $query);
        confirm($result);
        while ($row = mysqli_fetch_assoc($result)) {
            $product_price_sub = number_format($row['product_price'], 0, ',', ',');
            $price_sale = number_format($row['product_price'] + 2000000, 0, ',', ',');
            $product_price_formatted = number_format($row['product_price'] * $row['cart_quantity'], 0, ',', ',');
            $item_quantity = $row['cart_quantity'];
            $product = <<<DELIMETER
            <div class="cart-product d-flex flex-row" data-cart-id={$row['cart_id']}>
            <div class="check-cart"><input type="checkbox" value=check-item></div>
            <div class="cart-img">
            <img src="../assets/img/{$row['product_image']}" alt="">
        </div>
        <div class="cart-info">
            <a href="./details.php?id={$row['product_id']}" target="_blank" class="re-link">{$row['product_title']}</a> 
            <a href="../resources/cart.php?delete={$row['product_id']}"><i class="bi bi-trash"></i></a> 
            <div class="cart-item-title">
                <p class="sale-price">{$product_price_sub}đ</p>
                <strike class="normal-price">{$price_sale}đ</strike>
            </div>
            <h4>Số lượng</h4>
            <div class="button-container">
                <span id="value">{$item_quantity}</span>
                <button class="btn decrease minus btn-success"> <i class="bi bi-dash-lg"></i></button>
                <button class="btn increase plus btn-danger"> <i class="bi bi-plus"></i></i></button>
                <span class="product_price">{$product_price_formatted}đ</span>
            </div>
            <h3 style="color: red; font-weight: 500"><?php echo display_message(); ?></h3>
            <input type="hidden" name="id_item" value="{$row['product_id']}">
            <input type="hidden" name="cart_id" value="{$row['cart_id']}">
            </div>
        </div>
        DELIMETER;
            echo $product;
        }
    } else {
        $modal = <<<DELIMITER
        <script>
            alert('Vui lòng đăng nhập');
            window.location.href="http://localhost:8080/Project_php/public/log-in.php";
        </script>
        DELIMITER;
        echo $modal;
    }
}

?>

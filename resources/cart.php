<?php require_once("config.php") ?>
<?php
if (isset($_GET['add'])) {
    $query = query("SELECT * FROM products WHERE product_id = " . escape_string($_GET['add']));
    confirm($query);

    while ($row = fetch_array($query)) {
        if ($row['product_quantity'] != $_SESSION['product_' . $_GET['add']]) {
            $_SESSION['product_' . $_GET['add']] += 1;
            redirect("../public/checkout.php");
        } else {
            set_massage("Sản phẩm {$row['product_title']} " . $row['product_name'] . " chỉ còn " . $row['product_quantity'] . " sản phẩm có sẵn");
            redirect("../public/checkout.php");
        }
    }
}
if (isset($_GET['remove'])) {
    $_SESSION['product_' . $_GET['remove']]--;
    if ($_SESSION['product_' . $_GET['remove']] < 1) {
        unset($_SESSION['item_total']);
        unset($_SESSION['item_quantity']);
        redirect("../public/checkout.php");
    } else {
        redirect("../public/checkout.php");
    }
}
if (isset($_GET['delete'])) {
    $_SESSION['product_' . $_GET['delete']] = '0';
    unset($_SESSION['item_total']);
    unset($_SESSION['item_quantity']);
    redirect("../public/checkout.php");
}

function cart()
{
    $total = 0;
    $item_quantity = 0;
    $item_name=1;
    $item_number=1;
    $amount =1;
    $quantity=1;
    foreach ($_SESSION as $name => $value) {
        if ($value > 0) {
            if (substr($name, 0, 8) == "product_") {
                $length = strlen($name) - 8;
                $id = substr($name, 8, $length);
                $query = "SELECT * FROM products WHERE product_id = " . escape_string($id) . "";
                $result = query($query);
                confirm($query);
                while ($row = fetch_array($result)) {
                    $product_price_sub = number_format($sub = ($row['product_price'] * $value), 0, ',', ',');
                    $product_price_formatted = number_format($row['product_price'], 0, ',', ',');
                    $item_quantity += $value;
                    $product = <<<DELIMETER
                    <div class="cart-product">
                    <div class="cart-img">
                    <img src="../assets/img/{$row['product_image']}" alt="">
                </div>
                <div class="cart-info">
                    <a href="./details.php" target="_blank" class="re-link">{$row['product_title']}</a> 
                    <a href="cart.php?delete={$row['product_id']}"><i class="bi bi-trash"></i></a> 
                    <div class="cart-item-title">
                        <p class="sale-price">{$product_price_formatted}đ</p>
                        <strike class="normal-price">34.900.000đ</strike>
                    </div>
                    <h4>Số lượng</h4>
                    <div class="button-container">
                        <span id="value">{$value}</span>
                        <a href="../resources/cart.php?remove={$row['product_id']}" class="btn decrease minus btn-success"> <i class="bi bi-dash-lg"></i></a>
                        <a href="../resources/cart.php?add={$row['product_id']}" class="btn increase plus btn-danger"> <i class="bi bi-plus"></i></i></a>
                        <span>{$product_price_sub}đ</span>
                    </div>
                    <h3 style="color: red; font-weight: 500"><?php echo display_message(); ?></h3>
                </div>
                <input type="hidden" name="item_name_{$item_name}" value="{$row['product_title']}"> 
                <input type="hidden" name="item_number_{$item_number}" value="{$row['product_id']}"> 
                <input type="hidden" name="amount_{$amount}" value="{$row['product_price']}">
                <input type="hidden" name="quantity_{$quantity}" value="{$value}">
                </div>
            DELIMETER;
                    echo $product;
                    $item_name++;
                    $item_number++;
                    $amount ++;
                    $quantity++;
                }
                $_SESSION['item_total'] = $total += $sub;

                // biến lưu số lượng trong giỏ hàng 
                $_SESSION['item_quantity'] = $item_quantity;
            }
        }
    }
}


?>
        
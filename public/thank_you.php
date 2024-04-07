<?php require_once("../resources/config.php"); ?>
<?php require_once("../resources/cart.php"); ?>
<?php include(TEMPLATE_FRONT . DS . "header.php"); ?>


<?php


if (isset($_GET['tx'])) {

    $amount = $_GET['amt'];
    $currency = $_GET['cc'];
    $transaction = $_GET['tx'];
    $status = $_GET['st'];

    $query = query("INSERT INTO orders (order_transaction, order_amount, order_currency, order_status) 
    VALUES ('{$transaction}', '{$amount}', '" . mysqli_real_escape_string($connection, $currency) . "', '" . mysqli_real_escape_string($connection, $status) . "')");
    session_destroy();

} else {
    redirect("index.php");
}
?>
<div class="cart-wrapper container">
    <div class="row">
        <h1>THank you</h1>
    </div>

</div>
<?php include(TEMPLATE_FRONT . DS . "footer.php"); ?>
<?php
header('Content-Type: application/json');
$dbHost = 'localhost';
$dbName = 'e_com';
$dbUser = 'root';
$dbPass = '';
try {
    $pdo = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo json_encode(['error' => 'Database connection failed']);
    exit();
}
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['cat_id'])) {
        $product_cat_id = $_GET['cat_id'];
        $statement = $pdo->prepare("SELECT * FROM products WHERE product_cat_id = :id");
        $statement->bindParam(':id', $product_cat_id);
        $statement->execute();
        $products = $statement->fetchAll(PDO::FETCH_ASSOC);
        if ($products) {
            echo json_encode($products);
        } else {
            http_response_code(404);
            echo json_encode(['error' => 'No products found for the given category']);
        }
    } else {
        $statement = $pdo->query("SELECT * FROM products");
        $products = $statement->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($products);
    }
} else {
    http_response_code(405);
    echo json_encode(['error' => 'Method Not Allowed']);
}


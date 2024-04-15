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
    if (isset($_GET['id'])) {
        $product_id = $_GET['id'];
        $statement = $pdo->prepare("SELECT * FROM products WHERE id = :id");
        $statement->bindParam(':id', $product_id);
        $statement->execute();
        $user = $statement->fetch(PDO::FETCH_ASSOC);
        if ($user) {
            echo json_encode($user);
        } else {
            http_response_code(404);
            echo json_encode(['error' => 'Product not found']);
        }
    } else {
        $statement = $pdo->query("SELECT * FROM products");
        $users = $statement->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($users);
    }
} else {
    http_response_code(405);
    echo json_encode(['error' => 'Method Not Allowed']);
}

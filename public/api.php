<?php

// Set the content type to JSON
header('Content-Type: application/json');

// Database configuration
$dbHost = 'localhost';
$dbName = 'e_com';
$dbUser = 'root';
$dbPass = '';

// Establish a database connection
try {
    $pdo = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo json_encode(['error' => 'Database connection failed']);
    exit();
}

// Check if the request method is GET
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Check if the ID parameter is set in the URL
    if (isset($_GET['id'])) {
        $product_id = $_GET['id'];
        $statement = $pdo->prepare("SELECT * FROM products WHERE id = :id");
        $statement->bindParam(':id', $product_id);
        $statement->execute();

        // Fetch the user
        $user = $statement->fetch(PDO::FETCH_ASSOC);

        // Return the user if found, otherwise return a 404 response
        if ($user) {
            echo json_encode($user);
        } else {
            http_response_code(404);
            echo json_encode(['error' => 'Product not found']);
        }
    } else {
        // Prepare and execute the SQL statement to fetch all users
        $statement = $pdo->query("SELECT * FROM products");

        // Fetch all users
        $users = $statement->fetchAll(PDO::FETCH_ASSOC);

        // Return all users
        echo json_encode($users);
    }
} else {
    // Return a 405 Method Not Allowed response for non-GET requests
    http_response_code(405);
    echo json_encode(['error' => 'Method Not Allowed']);
}

<?php
include 'config.php';

// SECURE: Function to retrieve users using Prepared Statements
function get_user_secure($username) {
    global $conn;
    // The '?' is a placeholder that prevents malicious input from being executed as code
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username); // "s" tells the database to treat input as a String
    $stmt->execute();
    return $stmt->get_result();
}

// SECURE: Function to search products using Prepared Statements
function get_products_secure($search) {
    global $conn;
    $query = "%" . $search . "%";
    $stmt = $conn->prepare("SELECT * FROM products WHERE name LIKE ?");
    $stmt->bind_param("s", $query);
    $stmt->execute();
    return $stmt->get_result();
}
?>

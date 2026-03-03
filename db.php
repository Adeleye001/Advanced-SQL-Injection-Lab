<?php
include 'config.php';

// Function to retrieve users based on the username (vulnerable to SQL injection)
function get_user($username) {
    global $conn;
    $sql = "SELECT * FROM users WHERE username = '$username'";  // Vulnerable to SQL injection
    $result = $conn->query($sql);
    return $result;
}

// Function to search for products (vulnerable to SQL injection)
function get_products($search) {
    global $conn;
    $sql = "SELECT * FROM products WHERE name LIKE '%$search%'"; // Vulnerable to SQL injection
    $result = $conn->query($sql);
    return $result;
}
?>

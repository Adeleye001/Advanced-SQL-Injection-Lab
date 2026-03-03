<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['search'])) {
    $search = $_GET['search'];

    // Vulnerable to Error-based SQL Injection
    $result = get_products($search);
    
    if ($result && $result->num_rows > 0) {
        echo "<h3>Search Results:</h3>";
        while ($row = $result->fetch_assoc()) {
            echo "Product: " . $row['name'] . "<br>";
            echo "Description: " . $row['description'] . "<br><br>";
        }
    } else {
        echo "No products found.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Products</title>
</head>
<body>
    <h1>Search for Products</h1>
    <form action="search.php" method="GET">
        <label for="search">Search:</label>
        <input type="text" name="search" id="search" required><br><br>
        <button type="submit">Search</button>
    </form>
</body>
</html>

# Dec 5 2024
# IT202001
#Sports Equipment Website
#vss24@njit.edu


<?php
session_start();
require_once 'sportsequipmentproduct.php';

if (!isset($_SESSION['login'])) {
    echo "<h2>Please log in first.</h2>";
    exit();
}

$productID = $_POST['productID'] ?? null;

if (!$productID || !is_numeric($productID)) {
    echo "<h2>Invalid product ID provided.</h2>";
    error_log("Error: Invalid product ID. Data: " . print_r($_POST, true));
    exit();
}

// Find the product
$product = Item::findItem($productID);

if ($product) {
    // Attempt to delete the product
    if ($product->removeItem()) {
        echo "<h2>Product $productID removed successfully.</h2>";
    } else {
        echo "<h2>Failed to remove product. Please try again.</h2>";
        error_log("Error: Failed to remove product with ID $productID.");
    }
} else {
    echo "<h2>Product not found.</h2>";
    error_log("Error: Product with ID $productID not found.");
}
?>

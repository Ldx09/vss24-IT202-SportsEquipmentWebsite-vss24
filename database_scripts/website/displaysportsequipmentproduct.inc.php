# Dec 5 2024
# IT202001
#Sports Equipment Website
#vss24@njit.edu


<?php
require_once 'sportsequipmentproduct.php';

$productID = $_POST['productID'] ?? null;

if (!$productID || !is_numeric($productID)) {
    echo "<h2>Please select a valid product to view.</h2>";
    error_log("Error: Invalid productID provided. Data: " . print_r($_POST, true));
    exit();
}

// Find the product
$product = Item::findItem($productID);

if ($product) {
    echo "<h2>Product Details</h2>";
    echo $product;
} else {
    echo "<h2>Product not found.</h2>";
    error_log("Error: Product with ID $productID not found.");
}
?>

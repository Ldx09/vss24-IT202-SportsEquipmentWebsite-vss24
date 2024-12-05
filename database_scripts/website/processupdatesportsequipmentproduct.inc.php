<?php
session_start();
require_once 'sportsequipmentproduct.php';

if (!isset($_POST['productID']) || !is_numeric($_POST['productID'])) {
    echo "<h2>Invalid product ID.</h2>";
    exit();
}

$productID = $_POST['productID'];
$product = Item::findItem($productID);

if ($product) {
    // Update fields from the form submission
    $product->itemCode = $_POST['itemCode'];
    $product->itemName = $_POST['itemName'];
    $product->description = $_POST['description'];
    $product->color = $_POST['color'];
    $product->categoryID = $_POST['categoryID'];
    $product->wholesalePrice = $_POST['wholesalePrice'];
    $product->listPrice = $_POST['listPrice'];

    if ($product->updateItem()) {
        echo "<h2>Product $productID updated successfully.</h2>";
        echo "<a href='listsportsequipmentproducts.inc.php'>Back to Products</a>";
    } else {
        echo "<h2>Failed to update product. Please try again.</h2>";
    }
} else {
    echo "<h2>Product not found.</h2>";
}
?>

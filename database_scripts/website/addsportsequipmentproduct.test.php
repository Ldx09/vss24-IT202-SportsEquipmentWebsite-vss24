<?php
include('sportsequipmentproduct.php');

// Debug to see if values are being passed correctly
// var_dump($_GET); // Comment out or remove this line if you don't need debugging output

$itemCode = isset($_GET['itemCode']) ? trim($_GET['itemCode']) : '';
$itemName = isset($_GET['itemName']) ? trim($_GET['itemName']) : '';
$description = isset($_GET['description']) ? trim($_GET['description']) : '';
$color = isset($_GET['color']) ? trim($_GET['color']) : '';
$categoryID = isset($_GET['categoryID']) ? trim($_GET['categoryID']) : '';
$wholesalePrice = isset($_GET['wholesalePrice']) ? trim($_GET['wholesalePrice']) : '';
$listPrice = isset($_GET['listPrice']) ? trim($_GET['listPrice']) : '';

// Validate inputs here (similar checks as before)

// Create and save item
$item = new Item(
    null, // Auto-increment for itemID
    $itemCode,
    $itemName,
    $description,
    $color,
    $categoryID,
    $wholesalePrice,
    $listPrice,
    null
);

$result = $item->saveItem();
if ($result) {
    echo "<h2>New Item successfully added</h2>\n";
} else {
    echo "<h2>Sorry, there was a problem adding that item</h2>\n";
}
?>

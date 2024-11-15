<?php
session_start();

if (isset($_SESSION['login'])) {
    $itemCode = trim($_POST['itemCode'] ?? '');
    $itemName = trim($_POST['itemName'] ?? '');
    $description = trim($_POST['description'] ?? '');
    $categoryID = trim($_POST['categoryID'] ?? '');
    $wholesalePrice = trim($_POST['wholesalePrice'] ?? '');
    $listPrice = trim($_POST['listPrice'] ?? '');
    $dateCreated = date("Y-m-d H:i:s");

    include("sportsequipmentproduct.php");

    // Assuming $itemID is passed via POST (or otherwise defined), but you haven't set it in the code.
    $itemID = trim($_POST['itemID'] ?? '');

    // Check if an item with this ID already exists
    if (Item::findItem($itemID)) {
        echo "<h2>Sorry, an item with the ID #$itemID already exists</h2>\n";
    } else {
        // Proceed to create and save the new item
        $item = new Item(null, $itemCode, $itemName, $description, '', $categoryID, $wholesalePrice, $listPrice, $dateCreated);
        $result = $item->saveItem();

        if ($result) {
            echo "<h2>New Item successfully added</h2>";
            echo "<a href='listsportsequipmentproducts.inc.php'>List Products</a>";
        } else {
            echo "<h2>Sorry, there was a problem adding that item</h2>";
        }
    }
} else {
    echo "<h2>Please log in first</h2>";
}
?>

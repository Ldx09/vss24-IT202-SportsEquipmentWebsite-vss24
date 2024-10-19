<?php
include("sportsequipmentproduct.php");

$itemID = $_GET['itemID'];
$item = Item::findItem($itemID);

if ($item) {
    $item->itemCode = $_GET['itemCode'];
    $item->itemName = $_GET['itemName'];
    $item->description = $_GET['description'];
    $item->color = $_GET['color'];
    $item->categoryID = $_GET['categoryID'];
    $item->wholesalePrice = $_GET['wholesalePrice'];
    $item->listPrice = $_GET['listPrice'];

    $result = $item->updateItem();
    if ($result) {
       echo "<h2>Item $itemID updated</h2>\n";
    } else {
       echo "<h2>Problem updating item $itemID</h2>\n";
    }
} else {
    echo "<h2>Item not found</h2>\n";
}

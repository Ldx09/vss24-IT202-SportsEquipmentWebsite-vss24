<?php
include("sportsequipmentproduct.php");

$itemID = isset($_GET['itemID']) ? $_GET['itemID'] : null;

if ($itemID === null || !is_numeric($itemID)) {
    echo "<h2>Invalid itemID</h2>\n";
    exit();
}

// Find the item before attempting to remove it
$item = Item::findItem($itemID);

if ($item) {
    $result = $item->removeItem();
    if ($result) {
        echo "<h2>Item $itemID removed successfully</h2>\n";
    } else {
        echo "<h2>Problem removing item $itemID</h2>\n";
    }
} else {
    echo "<h2>Item $itemID not found</h2>\n";
}

<?php
include("sportsequipmentproduct.php");

$items = Item::getItems();

if ($items) {
    echo "<h2>List of Items</h2>\n";
    foreach ($items as $item) {
        echo $item . "<br>\n";  // Uses the __toString() method
    }
} else {
    echo "<h2>No items found.</h2>\n";
}
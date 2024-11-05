<?php
session_start();

if (isset($_SESSION['login'])) {
    $itemID = $_POST['itemID'];
    $answer = $_POST['answer'];

    include("sportsequipmentproduct.php");

    if ($answer == "Update Item") {
        $item = Item::findItem($itemID);

        if ($item) {
            // Get updated values from form
            $item->itemCode = $_POST['itemCode'];
            $item->itemName = $_POST['itemName'];
            $item->description = $_POST['description'];
            $item->color = $_POST['color'];
            $item->categoryID = $_POST['categoryID'];
            $item->wholesalePrice = $_POST['wholesalePrice'];
            $item->listPrice = $_POST['listPrice'];

            // Attempt to update the item in the database
            $result = $item->updateItem();
            
            // Check if the item was successfully updated
            if ($result) {
                echo "<h2>Item $itemID updated successfully</h2>";
                echo "<a href='listsportsequipmentproducts.inc.php'>List Products</a>";
            } else {
                echo "<h2>Problem updating item $itemID</h2>";
            }
        } else {
            echo "<h2>Item not found</h2>";
        }
    } elseif ($answer == "Cancel") {
        echo "<h2>Update Canceled for item $itemID</h2>";
    }
} else {
    echo "<h2>Please log in first</h2>";
}
?>

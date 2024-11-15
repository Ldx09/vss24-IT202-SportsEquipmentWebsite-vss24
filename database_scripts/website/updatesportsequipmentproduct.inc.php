# Nov 15 2024
# IT202001
#Sports Equipment Website
#vss24@njit.edu



<?php
session_start();
include("sportsequipmentproduct.php");

if (!isset($_POST['itemID']) || !is_numeric($_POST['itemID'])) {
    echo "<h2>You did not select a valid itemID value</h2>\n";
    echo "<a href=\"listsportsequipmentproducts.inc.php\">List items</a>";
} else {
    $itemID = $_POST['itemID'];
    $item = Item::findItem($itemID);

    if ($item) {
        ?>
        <h2>Update Item <?php echo $item->itemID; ?></h2><br>
        <form name="updateItem" action="changesportsequipmentproduct.test.php" method="post">
            <table>
                <tr>
                    <td>Item Code:</td>
                    <td><input type="text" name="itemCode" value="<?php echo htmlspecialchars($item->itemCode); ?>"></td>
                </tr>
                <tr>
                    <td>Name:</td>
                    <td><input type="text" name="itemName" value="<?php echo htmlspecialchars($item->itemName); ?>"></td>
                </tr>
                <tr>
                    <td>Description:</td>
                    <td><input type="text" name="description" value="<?php echo htmlspecialchars($item->description); ?>"></td>
                </tr>
                <tr>
                    <td>Color:</td>
                    <td><input type="text" name="color" value="<?php echo htmlspecialchars($item->color); ?>"></td>
                </tr>
                <tr>
                    <td>Category ID:</td>
                    <td><input type="text" name="categoryID" value="<?php echo htmlspecialchars($item->categoryID); ?>"></td>
                </tr>
                <tr>
                    <td>Wholesale Price:</td>
                    <td><input type="text" name="wholesalePrice" value="<?php echo htmlspecialchars($item->wholesalePrice); ?>"></td>
                </tr>
                <tr>
                    <td>List Price:</td>
                    <td><input type="text" name="listPrice" value="<?php echo htmlspecialchars($item->listPrice); ?>"></td>
                </tr>
            </table><br><br>
            <input type="hidden" name="itemID" value="<?php echo $item->itemID; ?>">
            <input type="submit" name="answer" value="Update Item">
            <input type="submit" name="answer" value="Cancel">
        </form>
        <?php
    } else {
        echo "<h2>Item not found</h2>";
        echo "<a href=\"listsportsequipmentproducts.inc.php\">List items</a>";
    }
}
?>

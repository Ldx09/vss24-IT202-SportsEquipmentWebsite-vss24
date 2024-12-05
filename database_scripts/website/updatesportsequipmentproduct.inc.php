<?php
session_start();
require_once 'sportsequipmentproduct.php';

if (!isset($_POST['productID']) || !is_numeric($_POST['productID'])) {
    echo "<h2>You did not select a valid product to update.</h2>";
    echo "<a href='listsportsequipmentproducts.inc.php'>Back to Products</a>";
    exit();
}

$productID = $_POST['productID'];
$product = Item::findItem($productID);

if ($product) {
?>
    <h2>Update Product <?php echo $product->itemID; ?></h2>
    <form method="post" action="processupdatesportsequipmentproduct.inc.php">
        <table>
            <tr>
                <td>Item Code:</td>
                <td><input type="text" name="itemCode" value="<?php echo htmlspecialchars($product->itemCode); ?>" required></td>
            </tr>
            <tr>
                <td>Name:</td>
                <td><input type="text" name="itemName" value="<?php echo htmlspecialchars($product->itemName); ?>" required></td>
            </tr>
            <tr>
                <td>Description:</td>
                <td><input type="text" name="description" value="<?php echo htmlspecialchars($product->description); ?>"></td>
            </tr>
            <tr>
                <td>Color:</td>
                <td><input type="text" name="color" value="<?php echo htmlspecialchars($product->color); ?>"></td>
            </tr>
            <tr>
                <td>Category ID:</td>
                <td><input type="text" name="categoryID" value="<?php echo htmlspecialchars($product->categoryID); ?>" required></td>
            </tr>
            <tr>
                <td>Wholesale Price:</td>
                <td><input type="text" name="wholesalePrice" value="<?php echo htmlspecialchars($product->wholesalePrice); ?>" required></td>
            </tr>
            <tr>
                <td>List Price:</td>
                <td><input type="text" name="listPrice" value="<?php echo htmlspecialchars($product->listPrice); ?>" required></td>
            </tr>
        </table>
        <input type="hidden" name="productID" value="<?php echo $product->itemID; ?>">
        <input type="submit" value="Update Product">
    </form>
<?php
} else {
    echo "<h2>Product not found.</h2>";
    echo "<a href='listsportsequipmentproducts.inc.php'>Back to Products</a>";
}
?>

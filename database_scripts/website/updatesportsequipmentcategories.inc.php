<?php
session_start();
require_once 'sportsequipmentcategory.php';

if (!isset($_SESSION['login'])) {
    echo "<h2>Please log in first.</h2>";
    exit();
}

$categoryID = $_POST['categoryID'] ?? null;

if (!$categoryID || !is_numeric($categoryID)) {
    echo "<h2>Invalid category ID provided.</h2>";
    exit();
}

$category = Category::findCategory($categoryID);

if ($category) {
    ?>
    <h2>Update Category <?php echo $categoryID; ?></h2>
    <form method="post" action="changesportsequipmentcategory.inc.php">
        <label>Category Code: </label>
        <input type="text" name="categoryCode" value="<?php echo htmlspecialchars($category->categoryCode); ?>"><br>
        <label>Category Name: </label>
        <input type="text" name="categoryName" value="<?php echo htmlspecialchars($category->categoryName); ?>"><br>
        <label>Category Shelf: </label>
        <input type="text" name="categoryShelf" value="<?php echo htmlspecialchars($category->categoryShelf); ?>"><br>
        <input type="hidden" name="categoryID" value="<?php echo $categoryID; ?>">
        <input type="submit" value="Update">
    </form>
    <?php
} else {
    echo "<h2>Category not found.</h2>";
}
?>

<?php
session_start();

if (isset($_SESSION['login'])) {
    $categoryID = $_POST['categoryID'] ?? null;
    $categoryCode = $_POST['categoryCode'] ?? null;
    $categoryName = $_POST['categoryName'] ?? null;
    $categoryShelf = $_POST['categoryShelf'] ?? '';

    if (empty($categoryID) || !is_numeric($categoryID)) {
        echo "<h2>Invalid category ID number</h2>";
    } else {
        include("sportsequipmentcategory.php");
        $category = new Category($categoryID, $categoryCode, $categoryName, $categoryShelf);
        $result = $category->saveCategory();

        if ($result) {
            echo "<h2>Category added successfully!</h2>";
            echo "<a href='listsportsequipmentcategories.inc.php'>List Categories</a>";
        } else {
            echo "<h2>There was an issue adding the category.</h2>";
        }
    }
} else {
    echo "<h2>Please log in first</h2>";
}
?>

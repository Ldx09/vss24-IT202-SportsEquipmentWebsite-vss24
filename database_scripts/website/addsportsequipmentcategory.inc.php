# Nov 15 2024
# IT202001
#Sports Equipment Website
#vss24@njit.edu



<?php
session_start();

if (isset($_SESSION['login'])) {
    // Include the Category class file at the top to ensure it is loaded before any usage
    include("sportsequipmentcategory.php");

    $categoryID = $_POST['categoryID'] ?? null;
    $categoryCode = $_POST['categoryCode'] ?? null;
    $categoryName = $_POST['categoryName'] ?? null;
    $categoryShelf = $_POST['categoryShelf'] ?? '';

    // Validate category ID
    if (empty($categoryID) || !is_numeric($categoryID)) {
        echo "<h2>Invalid category ID number</h2>";
    } else if (Category::findCategory($categoryID)) {
        echo "<h2>Sorry, a category with the ID #$categoryID already exists</h2>\n";
    } else {
        // Instantiate and save the new category
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

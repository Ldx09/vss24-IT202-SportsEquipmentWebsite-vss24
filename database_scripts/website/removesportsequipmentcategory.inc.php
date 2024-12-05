# Dec 5 2024
# IT202001
#Sports Equipment Website
#vss24@njit.edu


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
    error_log("Error: Invalid category ID. Data: " . print_r($_POST, true));
    exit();
}

// Find the category
$category = Category::findCategory($categoryID);

if ($category) {
    // Attempt to delete the category
    if ($category->removeCategory()) {
        echo "<h2>Category $categoryID removed successfully.</h2>";
        echo "<a href='listsportsequipmentcategories.inc.php'>Back to Categories</a>";
    } else {
        echo "<h2>Failed to remove category. Please try again.</h2>";
        error_log("Error: Failed to remove category with ID $categoryID.");
    }
} else {
    echo "<h2>Category not found.</h2>";
    error_log("Error: Category with ID $categoryID not found.");
}
?>

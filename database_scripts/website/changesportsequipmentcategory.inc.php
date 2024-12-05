<?php
session_start();
require_once 'sportsequipmentcategory.php';

if (!isset($_SESSION['login'])) {
    echo "<h2>Please log in first.</h2>";
    exit();
}

$categoryID = $_POST['categoryID'] ?? null;
$categoryCode = $_POST['categoryCode'] ?? null;
$categoryName = $_POST['categoryName'] ?? null;
$categoryShelf = $_POST['categoryShelf'] ?? null;

if (!$categoryID || !is_numeric($categoryID)) {
    echo "<h2>Invalid category ID provided.</h2>";
    exit();
}

$category = Category::findCategory($categoryID);

if ($category) {
    $category->categoryCode = $categoryCode;
    $category->categoryName = $categoryName;
    $category->categoryShelf = $categoryShelf;

    if ($category->updateCategory()) {
        echo "<h2>Category $categoryID updated successfully.</h2>";
    } else {
        echo "<h2>Failed to update category $categoryID. Please try again.</h2>";
    }
} else {
    echo "<h2>Category not found.</h2>";
}
?>

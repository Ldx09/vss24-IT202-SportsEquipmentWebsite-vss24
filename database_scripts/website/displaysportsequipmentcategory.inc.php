<?php
require_once 'sportsequipmentcategory.php';

$categoryID = $_POST['categoryID'] ?? null;

if (!$categoryID || !is_numeric($categoryID)) {
    echo "<h2>Please select a valid category to view.</h2>";
    exit();
}

$category = Category::findCategory($categoryID);

if ($category) {
    echo "<h2>Category Details</h2>";
    echo $category;
} else {
    echo "<h2>Category not found.</h2>";
}
?>

<?php
include_once("sportsequipmentcategory.php");  // Include the Category class

// Get all categories
$categories = Category::getCategories();

if ($categories) {
    echo "<h2>List of Categories</h2>\n";
    foreach ($categories as $category) {
        echo $category . "<br>\n";  // This uses the __toString() method of the Category class
    }
} else {
    echo "<h2>No categories found.</h2>\n";
}

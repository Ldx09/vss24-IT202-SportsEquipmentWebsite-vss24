<?php
error_log("\$_GET " . print_r($_GET, true));
include("sportsequipmentcategory.php");  // Corrected include path to the correct file

$categoryID = $_GET['categoryID'] ?? null;

if ($categoryID) {
    error_log("Attempting to remove category with ID: $categoryID");

    // Find the category by ID
    $category = Category::findCategory($categoryID);

    if ($category) {
        // Try to remove the category
        $result = $category->removeCategory();

        if ($result) {
            echo "<h2>Category $categoryID removed</h2>\n";
        } else {
            echo "<h2>Problem removing category $categoryID</h2>\n";
            // Add more debugging information
            error_log("Failed to remove category $categoryID");
        }
    } else {
        echo "<h2>Category not found with ID: $categoryID</h2>\n";
        error_log("Category not found with ID: $categoryID");
    }
} else {
    echo "<h2>Category ID is missing from the request</h2>\n";
    error_log("Category ID is missing from the request");
}

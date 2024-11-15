# October 18 2024
# IT202001
#Sports Equipment Website
#vss24@njit.edu


<?php
// include("sportsequipmentcategory.php");  // Correct the file path to the actual file

$categoryID = $_GET['categoryID'] ?? null;

// Ensure the category exists before attempting to update
if ($categoryID) {
    $category = Category::findCategory($categoryID);

    if ($category) {
        // Update the category fields from the URL parameters
        $category->categoryCode = $_GET['categoryCode'] ?? $category->categoryCode;
        $category->categoryName = $_GET['categoryName'] ?? $category->categoryName;
        $category->categoryShelf = $_GET['categoryShelf'] ?? $category->categoryShelf;  // Ensure categoryShelf is updated

        // Attempt to update the category
        $result = $category->updateCategory();

        // Display the result of the update
        if ($result) {
            echo "<h2>Category $categoryID updated</h2>\n";
        } else {
            echo "<h2>Problem updating category $categoryID</h2>\n";
        }
    } else {
        echo "<h2>Category not found with ID: $categoryID</h2>\n";
    }
} else {
    echo "<h2>Category ID is missing from the request</h2>\n";
}

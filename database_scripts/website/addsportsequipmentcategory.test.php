# October 18 2024
# IT202001
#Sports Equipment Website
#vss24@njit.edu

<?php
include("sportsequipmentcategory.php");  // Include the Category class

$categoryID = $_GET['categoryID'] ?? null;
$categoryCode = $_GET['categoryCode'] ?? null;
$categoryName = $_GET['categoryName'] ?? null;
$categoryShelf = $_GET['categoryShelf'] ?? null;  // Add this to handle the shelf/aisle

// Validate categoryID
if ((trim($categoryID) == '') || (!is_numeric($categoryID))) {
    echo "<h2>Sorry, you must enter a valid category ID number</h2>\n";
} else {
    // Create a new category instance
    $category = new Category($categoryID, $categoryCode, $categoryName, $categoryShelf);

    // Attempt to save the category
    $result = $category->saveCategory();

    // Check if the category was successfully added
    if ($result) {
        echo "<h2>New Category #$categoryID successfully added</h2>\n";
        echo "<h2>" . $category . "</h2>\n";  // Using the __toString method for output
    } else {
        echo "<h2>Sorry, there was a problem adding that category</h2>\n";
    }
}

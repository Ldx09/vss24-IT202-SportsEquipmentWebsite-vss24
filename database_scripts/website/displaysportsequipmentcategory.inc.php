# Nov 15 2024
# IT202001
#Sports Equipment Website
#vss24@njit.edu



<?php
if (!isset($_REQUEST['categoryID']) or (!is_numeric($_REQUEST['categoryID']))) {
    echo "<h2>You did not select a valid categoryID to view.</h2>";
    echo "<a href=\"index.php?content=listcategories\">List Categories</a>";
} else {
    $categoryID = $_REQUEST['categoryID'];
    $category = Category::findCategory($categoryID);
    if ($category) {
        echo $category;
    } else {
        echo "<h2>Sorry, category $categoryID not found</h2>";
    }
}
?>

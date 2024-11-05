<h2>List of Categories</h2>
<form name="categories" method="post">
   <input type="text" name="search" placeholder="Search category">
   <input type="submit" value="Search">
</form>

<select name="categoryID" size="20">
    <?php
    include("sportsequipmentcategory.php");
    $search = $_POST['search'] ?? '';
    $categories = Category::getCategories();
    foreach ($categories as $category) {
        if (empty($search) || stripos($category->categoryName, $search) !== false || stripos($category->categoryCode, $search) !== false) {
            $categoryID = $category->categoryID;
            $name = $categoryID . " - " . $category->categoryCode . ", " . $category->categoryName;
            echo "<option value=\"$categoryID\">$name</option>";
        }
    }
    ?>
</select>

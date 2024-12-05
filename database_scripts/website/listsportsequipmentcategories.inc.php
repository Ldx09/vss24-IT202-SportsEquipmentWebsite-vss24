<h2>List of Categories</h2>
<script>
    function handleAction(action) {
        const selectedCategory = document.querySelector("select[name='categoryID']").value;
        if (!selectedCategory) {
            alert("Please select a category.");
            return;
        }

        if (action === 'removesportsequipmentcategory.inc.php') {
            const confirmDelete = confirm("Are you sure you want to delete this category?");
            if (!confirmDelete) {
                return;
            }
        }

        document.categories.action = action;
        document.categories.submit();
    }
</script>
<form name="categories" method="post">
    <select name="categoryID" size="10">
        <?php
        include("sportsequipmentcategory.php");
        $categories = Category::getCategories();
        foreach ($categories as $category) {
            echo "<option value='{$category->categoryID}'>ID: {$category->categoryID} - {$category->categoryName}</option>";
        }
        ?>
    </select>
    <br>
    <button type="button" onclick="handleAction('displaysportsequipmentcategory.inc.php')">View</button>
    <button type="button" onclick="handleAction('removesportsequipmentcategory.inc.php')">Delete</button>
    <button type="button" onclick="handleAction('updatesportsequipmentcategories.inc.php')">Update</button>
</form>

# Dec 5 2024
# IT202001
#Sports Equipment Website
#vss24@njit.edu


<h2>List of Products</h2>
<script>
    function handleAction(action) {
        const selectedProduct = document.querySelector("select[name='productID']").value;
        if (!selectedProduct) {
            alert("Please select a product.");
            return;
        }
        document.products.action = action;
        document.products.submit();
    }
</script>
<form name="products" method="post">
    <select name="productID" size="10">
        <?php
        include("sportsequipmentproduct.php");
        $products = Item::getItems();
        foreach ($products as $product) {
            echo "<option value='{$product->itemID}'>ID: {$product->itemID} - {$product->itemName}</option>";
        }
        ?>
    </select>
    <br>
    <button type="button" onclick="handleAction('displaysportsequipmentproduct.inc.php')">View</button>
    <button type="button" onclick="handleAction('removesportsequipmentproduct.inc.php')">Delete</button>
    <button type="button" onclick="handleAction('updatesportsequipmentproduct.inc.php')">Update</button>
</form>

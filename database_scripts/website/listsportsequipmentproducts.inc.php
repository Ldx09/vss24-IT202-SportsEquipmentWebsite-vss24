# Nov 15 2024
# IT202001
#Sports Equipment Website
#vss24@njit.edu



<h2>List of Products</h2>
<form name="items" method="post" action="updatesportsequipmentproduct.inc.php">
   <input type="text" name="search" placeholder="Search item">
   <input type="submit" value="Search">
   <select name="itemID" size="20">
       <?php
       include("sportsequipmentproduct.php");
       $search = $_POST['search'] ?? '';
       $items = Item::getItems();
       foreach ($items as $item) {
           if (empty($search) || stripos($item->itemName, $search) !== false || stripos($item->itemCode, $search) !== false) {
               $itemID = $item->itemID;
               $itemName = $item->itemName;
               echo "<option value=\"$itemID\">$itemID - $itemName</option>";
           }
       }
       ?>
   </select>
   <input type="submit" value="Update Selected Item">
</form>

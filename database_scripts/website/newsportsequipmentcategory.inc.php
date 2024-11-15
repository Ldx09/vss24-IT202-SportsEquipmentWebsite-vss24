<h2>Enter New Category Information</h2>
<form name="newcategory" action="addsportsequipmentcategory.inc.php" method="post">
   <table cellpadding="1" border="0">
       <tr>
           <td>Category ID:</td>
           <td><input type="text" name="categoryID" size="4" required></td>
       </tr>
       <tr>
           <td>Category Code:</td>
           <td><input type="text" name="categoryCode" size="20" required></td>
       </tr>
       <tr>
           <td>Category Name:</td>
           <td><input type="text" name="categoryName" size="50" required></td>
       </tr>
       <tr>
           <td>Category Shelf:</td>
           <td><input type="text" name="categoryShelf" size="20" required></td>
       </tr>
   </table><br>
   <input type="submit" value="Submit New Category">
</form>

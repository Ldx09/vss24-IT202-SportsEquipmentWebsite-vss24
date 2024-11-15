# Nov 15 2024
# IT202001
#Sports Equipment Website
#vss24@njit.edu



<h2>Enter New Item Information</h2>
<form name="newitem" action="addsportsequipmentproduct.inc.php" method="post">
   <table cellpadding="1" border="0">
       <tr>
           <td>Item Code:</td>
           <td><input type="text" name="itemCode" required></td>
       </tr>
       <tr>
           <td>Name:</td>
           <td><input type="text" name="itemName" required></td>
       </tr>
       <tr>
           <td>Description:</td>
           <td><input type="text" name="description" required></td>
       </tr>
       <tr>
           <td>Category ID:</td>
           <td><input type="text" name="categoryID" required></td>
       </tr>
       <tr>
           <td>Wholesale Price:</td>
           <td><input type="text" name="wholesalePrice" required></td>
       </tr>
       <tr>
           <td>List Price:</td>
           <td><input type="text" name="listPrice" required></td>
       </tr>
   </table><br>
   <input type="submit" value="Submit New Item">
</form>

# Dec 5 2024
# IT202001
#Sports Equipment Website
#vss24@njit.edu



<?php
session_start();

// Debugging: Check if session login is set
if (isset($_SESSION['login'])) {
    echo "<p>Session login is set as: {$_SESSION['login']}</p>";
} else {
    echo "<p>Session login is not set. Please log in again.</p>";
}
?>

<table width="100%" cellpadding="3">
   <?php if (!isset($_SESSION['login'])) { ?>
       <!-- Display message if user is not logged in -->
       <tr>
           <td><p>You are not logged in. Please log in to access more features.</p><hr /></td>
       </tr>
   <?php } else { ?>
       <!-- Welcome message for logged-in users -->
       <tr><td><h3>Welcome, <?php echo htmlspecialchars($_SESSION['login']); ?></h3></td></tr>

       <!-- Navigation links with icons -->
       <tr>
           <td><img src="images/home.png" alt="Home Icon" width="16" height="16">&nbsp;
           <a href="index.php"><strong>Home</strong></a></td>
       </tr>
       <tr>
           <td><img src="images/categories.png" alt="Categories Icon" width="16" height="16">&nbsp;
           <strong>Categories</strong></td>
       </tr>
       <tr>
           <td>&nbsp;&nbsp;&nbsp;<a href="index.php?content=listcategories"><strong>List Categories</strong></a></td>
       </tr>
       <tr>
           <td>&nbsp;&nbsp;&nbsp;<a href="index.php?content=newcategory"><strong>Add New Category</strong></a></td>
       </tr>
       <tr>
           <td><img src="images/items.png" alt="Items Icon" width="16" height="16">&nbsp;
           <strong>Items</strong></td>
       </tr>
       <tr>
           <td>&nbsp;&nbsp;&nbsp;<a href="index.php?content=listitems"><strong>List Items</strong></a></td>
       </tr>
       <tr>
           <td>&nbsp;&nbsp;&nbsp;<a href="index.php?content=newitem"><strong>Add New Item</strong></a></td>
       </tr>
       <tr>
           <td><hr /></td>
       </tr>

       <!-- Logout link with icon -->
       <tr>
           <td><a href="logout.inc.php">
               <img src="images/logout.png" alt="Logout Icon" width="16" height="16" onerror="console.error('Logout image not found');">&nbsp;
               <strong>Logout</strong>
           </a></td>
       </tr>

       <!-- Search forms for items and categories -->
       <tr>
           <td>
               <form action="index.php" method="post">
                   <label>Search for Item:</label><br>
                   <input type="text" name="itemID" size="14" required />
                   <input type="submit" value="find" />
                   <input type="hidden" name="content" value="updateitem">
               </form>
           </td>
       </tr>
       <tr>
           <td>
               <form action="index.php" method="post">
                   <label>Search for Category:</label><br>
                   <input type="text" name="categoryID" size="14" required />
                   <input type="submit" value="find" />
                   <input type="hidden" name="content" value="displaycategory">
               </form>
           </td>
       </tr>
   <?php } ?>
</table>

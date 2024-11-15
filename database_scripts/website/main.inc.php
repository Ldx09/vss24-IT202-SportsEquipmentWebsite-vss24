<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sports Equipment Shop - Inventory Management</title>
    <link rel="stylesheet" href="ih_style.css">
</head>
<body>
    <header><?php include("header.inc.php"); ?></header>
    
    <main>
        <h1>Welcome to Sports Equipment Shop Inventory Helper</h1>
        <p>Welcome <?php echo htmlspecialchars($_SESSION['firstName']) . " " . htmlspecialchars($_SESSION['lastName']); ?> (<?php echo htmlspecialchars($_SESSION['pronouns']); ?>)</p>
        
        <nav>
            <a href="newsportsequipmentcategory.inc.php">Add New Category</a> |
            <a href="listsportsequipmentcategories.inc.php">List Categories</a> |
            <a href="newsportsequipmentproduct.inc.php">Add New Product</a> |
            <a href="listsportsequipmentproducts.inc.php">List Products</a>
        </nav>
    </main>

    <footer><?php include("footer.inc.php"); ?></footer>
</body>
</html>

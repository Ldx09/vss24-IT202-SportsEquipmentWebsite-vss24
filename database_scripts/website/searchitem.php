# Dec 5 2024
# IT202001
#Sports Equipment Website
#vss24@njit.edu


<?php
require_once 'database.php';

// Get the search query
$query = $_GET['q'] ?? '';

if (empty($query)) {
    echo "<p>Please enter a search term.</p>";
    exit();
}

$db = getDB();

// Prepare a case-insensitive search query for products
$searchQuery = "SELECT * FROM SportsEquipmentProducts 
                WHERE LOWER(SportsProductsName) LIKE LOWER(?) 
                   OR LOWER(SportsProductsCode) LIKE LOWER(?)";
$stmt = $db->prepare($searchQuery);

if (!$stmt) {
    echo "<p>Failed to prepare search query.</p>";
    exit();
}

$searchTerm = "%" . $query . "%";
$stmt->bind_param("ss", $searchTerm, $searchTerm);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<p><strong>" . htmlspecialchars($row['SportsProductsName']) . "</strong> - Code: " 
             . htmlspecialchars($row['SportsProductsCode']) 
             . ", Price: $" . htmlspecialchars($row['SportsWholesalePrice']) 
             . "</p>";
    }
} else {
    echo "<p>No products found matching '$query'.</p>";
}

$stmt->close();
$db->close();
?>

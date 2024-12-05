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

// Prepare a case-insensitive search query for categories
$searchQuery = "SELECT * FROM SportsEquipmentCategories 
                WHERE LOWER(SportsCategoriesName) LIKE LOWER(?) 
                   OR LOWER(SportsCategoriesCode) LIKE LOWER(?)";
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
        echo "<p><strong>" . htmlspecialchars($row['SportsCategoriesName']) . "</strong> - Code: " 
             . htmlspecialchars($row['SportsCategoriesCode']) 
             . ", Shelf: " . htmlspecialchars($row['SportsCategoriesShelf']) 
             . "</p>";
    }
} else {
    echo "<p>No categories found matching '$query'.</p>";
}

$stmt->close();
$db->close();
?>

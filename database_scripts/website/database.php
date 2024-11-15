<?php
// Database connection settings
$host = 'sql1.njit.edu';
$port = 3306;
$dbname = 'vss24';
$username = 'vss24';
$password = 'http#NJIT$SQL2024server0903';

// Ensure the function is declared only once
if (!function_exists('getDB')) {
    function getDB() {
        global $host, $port, $dbname, $username, $password;

        // Create the MySQLi connection
        $mysqli = new mysqli($host, $username, $password, $dbname, $port);

        // Check for connection errors
        if ($mysqli->connect_errno) {
            die("Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error);
        }

        // Set the character set to UTF-8
        if (!$mysqli->set_charset("utf8")) {
            printf("Error loading character set utf8: %s\n", $mysqli->error);
            exit();
        }

        return $mysqli;
    }
}
?>
<?php
require_once 'database.php';

$query = "SELECT * FROM SportsEquipmentCategories";
$db = getDB();
$stmt = $db->prepare($query);

if (!$stmt) {
    die("Prepare failed: (" . $db->errno . ") " . $db->error);
}

if (!$stmt->execute()) {
    die("Execute failed: (" . $stmt->errno . ") " . $stmt->error);
}

$result = $stmt->get_result();

if ($result) {
    $categories = $result->fetch_all(MYSQLI_ASSOC);

    foreach ($categories as $category) {
        echo "Category Code: " . $category['SportsCategoriesCode'] . "<br>";
        echo "Category Name: " . $category['SportsCategoriesName'] . "<br>";
        echo "Category Shelf: " . $category['SportsCategoriesShelf'] . "<br><br>";
    }
} else {
    echo "No categories found.";
}

$stmt->close();
$db->close();
?>

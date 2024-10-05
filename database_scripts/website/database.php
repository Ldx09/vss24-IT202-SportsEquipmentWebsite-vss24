# October 10 2024
# IT202001
#Sports Equipment Website
#vss24@njit.edu

<?php
// Database connection settings
$host = 'sql1.njit.edu';       // or the hostname where your database is hosted
$port = 3306;       
$dbname = 'vss24';  // Name of your database
$username = 'vss24'; // Your database username
$password = 'http#NJIT$SQL2024server0903'; // Your database password

// Set up the PDO connection with a try-catch block to handle connection errors
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // If connection fails, output the error
    die("Connection failed: " . $e->getMessage());
}

# October 18 2024
# IT202001
#Sports Equipment Website
#vss24@njit.edu


<?php
session_start();
include 'database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Use MySQLi to prepare the statement
    $db = getDB();  // Call the getDB() function from database.php
    $stmt = $db->prepare("SELECT * FROM SportsEquipmentManager WHERE emailAddress = ?");
    $stmt->bind_param("s", $email);  // 's' specifies the type as a string
    $stmt->execute();
    $result = $stmt->get_result();
    $manager = $result->fetch_assoc();  // MySQLi equivalent of PDO::FETCH_ASSOC

    // Check if manager exists and validate password
    if ($manager && hash('sha256', $password) === $manager['password']) {
        // Password is correct, set session variables
        $_SESSION['login'] = true;
        $_SESSION['emailAddress'] = $manager['emailAddress'];
        $_SESSION['firstName'] = $manager['firstName'];
        $_SESSION['lastName'] = $manager['lastName'];
        $_SESSION['pronouns'] = $manager['pronouns'];
        header("Location: main.inc.php");
        exit;
    } else {
        echo "Sorry, login incorrect.";
    }

    // Close statement and connection
    $stmt->close();
    $db->close();
}

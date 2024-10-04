<?php
session_start();
include 'database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare SQL statement
    $stmt = $db->prepare("SELECT * FROM SportsEquipmentManager WHERE emailAddress = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $manager = $stmt->fetch(PDO::FETCH_ASSOC);

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
}
# October 10 2024
# IT202001
#Sports Equipment Website
#vss24@njit.edu

<?php
session_start();
if (isset($_POST['submit'])) {
    include('database.php');
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // Hash the password in PHP
    $hashedPassword = hash('sha256', $password);

    // Prepare SQL statement
    $stmt = $pdo->prepare("SELECT * FROM SportsEquipmentManager WHERE emailAddress = ? AND password = ?");
    $stmt->execute([$email, $hashedPassword]);

    // Fetch the user result
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // Set session variables
        $_SESSION['login'] = true;
        $_SESSION['emailAddress'] = $user['emailAddress'];
        $_SESSION['firstName'] = $user['firstName'];
        $_SESSION['lastName'] = $user['lastName'];
        $_SESSION['pronouns'] = $user['pronouns'];
        header('Location: main.inc.php');
    } else {
        echo "<p>Sorry, login incorrect for the Sport Equipment Shop Inventory Website.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Please Login to the Sport Equipment Shop Inventory Website</title>
</head>
<body>
    <h1>Please Login to the Sport Equipment Shop Inventory Website</h1>
    <form method="POST" action="index.php">
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>
        
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        
        <button type="submit" name="submit">Login</button>
    </form>
</body>
</html>

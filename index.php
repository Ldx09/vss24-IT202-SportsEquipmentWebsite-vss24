<?php
session_start();

if (isset($_POST['submit'])) {
    include('database.php');
    $db = getDB();

    $email = $_POST['email'];
    $password = $_POST['password'];
    $hashedPassword = hash('sha256', $password);

    $stmt = $db->prepare("SELECT * FROM SportsEquipmentManager WHERE emailAddress = ? AND password = ?");
    if (!$stmt) {
        die("Prepare failed: (" . $db->errno . ") " . $db->error);
    }

    $stmt->bind_param('ss', $email, $hashedPassword);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user) {
        $_SESSION['login'] = true;
        $_SESSION['emailAddress'] = $user['emailAddress'];
        $_SESSION['firstName'] = $user['firstName'];
        $_SESSION['lastName'] = $user['lastName'];
        $_SESSION['pronouns'] = $user['pronouns'];
        header('Location: main.inc.php');
    } else {
        echo "<p>Sorry, login incorrect for the Sport Equipment Shop Inventory Website.</p>";
        echo "<a href='index.php'>Try Again</a>";
    }

    $stmt->close();
    $db->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login to the Sport Equipment Shop Inventory Website</title>
</head>
<body>
    <header><?php include("header.inc.php"); ?></header>
    <section>
        <h1>Please Login to the Sport Equipment Shop Inventory Website</h1>
        <form method="POST" action="index.php">
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" required><br><br>
            
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password" required><br><br>
            
            <button type="submit" name="submit">Login</button>
        </form>
    </section>
    <footer><?php include("footer.inc.php"); ?></footer>
</body>
</html>

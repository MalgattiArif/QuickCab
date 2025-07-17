<?php
session_start();
require_once "db_connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $email = $_POST["email"];
    $phone = $_POST["phone"];

    $stmt = $pdo->prepare("INSERT INTO users (username, password, email, phone) VALUES (?, ?, ?, ?)");
    if ($stmt->execute([$username, $password, $email, $phone])) {
        header("Location: login.php");
        exit;
    } else {
        $error = "Signup failed! Username might already exist.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup - QuickCab</title>
    <link rel="stylesheet" href="css\style.css">
</head>
<body>
    <div class="auth-container">
        <h2>Signup</h2>
        <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
        <form method="POST">
            <div class="form-group">
                <input type="text" name="username" placeholder="Username" required>
            </div>
            <div class="form-group">
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <div class="form-group">
                <input type="email" name="email" placeholder="Email" required>
            </div>
            <div class="form-group">
                <input type="tel" name="phone" placeholder="Phone (e.g., 9876543210)" pattern="[0-9]{10}" required>
            </div>
            <button type="submit" class="book-btn">Signup</button>
        </form>
        <p>Already have an account? <a href="login.php">Login</a></p>
    </div>
</body>
</html>
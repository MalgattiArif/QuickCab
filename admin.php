<?php
session_start();
require_once "db_connect.php";

if (!isset($_SESSION["user_id"]) || $_SESSION["type"] !== "admin") {
    header("Location: login.php");
    exit;
}

$stmt = $pdo->query("SELECT b.*, u.username FROM bookings b JOIN users u ON b.user_id = u.id ORDER BY b.created_at DESC");
$bookings = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - QuickCab</title>
    <link rel="stylesheet" href="css\style.css">
</head>
<body>
    <div class="admin-container">
        <h2>Admin Dashboard</h2>
        <a href="logout.php" class="book-btn">Logout</a>
        <h3>All Bookings</h3>
        <?php if (empty($bookings)): ?>
            <p>No bookings yet.</p>
        <?php else: ?>
            <table>
                <tr>
                    <th>ID</th>
                    <th>User</th>
                    <th>Pickup</th>
                    <th>Drop-off</th>
                    <th>Phone No</th>
                    <th>DateTime</th>
                    <th>Car Type</th>
                    <th>Distance</th>
                    <th>Fare</th>
                    <th>Status</th>
                </tr>
                <?php foreach ($bookings as $booking): ?>
                <tr>
                    <td><?php echo $booking["id"]; ?></td>
                    <td><?php echo htmlspecialchars($booking["username"]); ?></td>
                    <td><?php echo htmlspecialchars($booking["pickup"]); ?></td>
                    <td><?php echo htmlspecialchars($booking["dropoff"]); ?></td>
                    <td><?php echo htmlspecialchars($booking["phone"]); ?></td>
                    <td><?php echo $booking["datetime"]; ?></td>
                    <td><?php echo ucfirst(htmlspecialchars($booking["car_type"])); ?></td>
                    <td><?php echo $booking["distance"]; ?> km</td>
                    <td>₹<?php echo number_format($booking["fare"], 2); ?></td>
                    <td><?php echo ucfirst($booking["status"]); ?></td>
                </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>
    </div>
</body>
</html>
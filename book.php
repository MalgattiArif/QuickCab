<?php
session_start();
require_once "db_connect.php";
// Include PHPMailer classes
require_once "PHPMailer-master/src/PHPMailer.php";
require_once "PHPMailer-master/src/SMTP.php";
require_once "PHPMailer-master/src/Exception.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (!isset($_SESSION["user_id"]) || $_SESSION["type"] !== "user") {
    header("Location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION["user_id"];
    $pickup = $_POST["pickup"];
    $dropoff = $_POST["dropoff"];
    $phone = $_POST["phone"];
    $datetime = $_POST["datetime"];
    $car_type = $_POST["car_type"];
    $distance = floatval($_POST["distance"]);
    
    $rates = ["hatchback" => 20, "sedan" => 25, "suv" => 30, "muv" => 40];
    $fare = $distance * $rates[$car_type];

    $stmt = $pdo->prepare("INSERT INTO bookings (user_id, pickup, dropoff, phone, datetime, car_type, distance, fare) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    if ($stmt->execute([$user_id, $pickup, $dropoff, $phone, $datetime, $car_type, $distance, $fare])) {
        // Send email notification using PHPMailer
        $mail = new PHPMailer(true);
        try {
            // Server settings
            $mail->isSMTP();
            $mail->Host = "smtp.gmail.com"; // Gmail SMTP server
            $mail->SMTPAuth = true;
            $mail->Username = "suhailbhairekdar@gmail.com"; // Your Gmail address
            $mail->Password = "vccm omld jvti yuur";   // Your Gmail App Password (see below)
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            // Recipients
            $mail->setFrom("no-reply@quickcab.com", "QuickCab");
            $mail->addAddress("suhailbhairekdar@gmail.com"); // Your receiving email

            // Content
            $mail->isHTML(false);
            $mail->Subject = "New Booking Received";
            $mail->Body = "New Booking:\nPickup: $pickup\nDrop-off: $dropoff\nPhone: $phone\nDateTime: $datetime\nCar Type: $car_type\nDistance: $distance km\nFare: ₹$fare";

            $mail->send();
            header('location: index.php');
            exit;
        } catch (Exception $e) {
            $error = "Booking succeeded, but email failed: " . $mail->ErrorInfo;
        }
    } else {
        $error = "Booking failed!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmation - QuickCab</title>
    <link rel="stylesheet" href="css\style.css">
</head>
<body>
    <div class="confirmation-container">
        <?php if (isset($booking_success)): ?>
            <h2>Booking Confirmed!</h2>
            <p>Your ride has been successfully booked.</p>
            <p><strong>Pickup:</strong> <?php echo htmlspecialchars($pickup); ?></p>
            <p><strong>Drop-off:</strong> <?php echo htmlspecialchars($dropoff); ?></p>
            <p><strong>Date & Time:</strong> <?php echo htmlspecialchars($datetime); ?></p>
            <p><strong>Phone No:</strong> <?php echo htmlspecialchars($phoneno); ?></p>
            <p><strong>Car Type:</strong> <?php echo ucfirst(htmlspecialchars($car_type)); ?></p>
            <p><strong>Distance:</strong> <?php echo $distance; ?> km</p>
            <p><strong>Fare:</strong> ₹<?php echo number_format($fare, 2); ?></p>
            <a href="index.php" class="book-btn">Back to Home</a>
        <?php elseif (isset($error)): ?>
            <h2>Booking Failed</h2>
            <p class="error"><?php echo $error; ?></p>
            <a href="index.php" class="book-btn">Try Again</a>
        <?php endif; ?>
    </div>
</body>
</html>
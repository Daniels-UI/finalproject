[process_registration.php]<?php
// CampusConnect registration processor.
// Requires a MySQL database named campusconnect_db.

$host = "localhost";
$user = "root";
$password = "";
$database = "campusconnect_db";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    exit("Invalid request method. Please submit the registration form.");
}

$full_name = trim($_POST["full_name"] ?? "");
$email = trim($_POST["email"] ?? "");
$phone = trim($_POST["phone"] ?? "");
$student_id = trim($_POST["student_id"] ?? "");
$event = trim($_POST["event"] ?? "");
$attendance = trim($_POST["attendance"] ?? "");
$message = trim($_POST["message"] ?? "");

if ($full_name === "" || $email === "" || $phone === "" || $student_id === "" || $event === "" || $attendance === "") {
    exit("Please complete all required fields.");
}

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

$conn->set_charset("utf8mb4");

$stmt = $conn->prepare(
    "INSERT INTO registrations (full_name, email, phone, student_id, event_name, attendance_type, message)
     VALUES (?, ?, ?, ?, ?, ?, ?)"
);

$stmt->bind_param("sssssss", $full_name, $email, $phone, $student_id, $event, $attendance, $message);

if ($stmt->execute()) {
    echo "<!DOCTYPE html>
    <html lang='en'><head><meta charset='UTF-8'><meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Registration Successful</title><link rel='stylesheet' href='../css/style.css'></head>
    <body><main class='section container'><div class='hero-card'>
    <p class='eyebrow'>SUCCESS</p><h1>Registration Complete!</h1>
    <p>Thank you, " . htmlspecialchars($full_name) . ". Your registration for <strong>" . htmlspecialchars($event) . "</strong> has been received.</p>
    <p>Attendance type: " . htmlspecialchars($attendance) . "</p>
    <br><a class='btn btn-primary' href='../index.html'>Back to Home</a>
    <a class='btn btn-outline' href='../register.html'>Register Another Person</a>
    </div></main></body></html>";
} else {
    echo "Error saving registration: " . htmlspecialchars($stmt->error);
}

$stmt->close();
$conn->close();
?>

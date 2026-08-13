<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "campusconnect_db";

$conn = new mysqli($host, $user, $password, $database);
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}
$conn->set_charset("utf8mb4");

$result = $conn->query("SELECT id, full_name, email, student_id, event_name, attendance_type, registered_at FROM registrations ORDER BY registered_at DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CampusConnect | Registrations</title>
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<main class="section container">
  <div class="section-heading">
    <p class="eyebrow">MYSQLI + MYSQL</p>
    <h1>Registered Students</h1>
    <p>Records retrieved from the CampusConnect database.</p>
  </div>
  <div class="event-table-wrap">
    <table>
      <thead><tr><th>ID</th><th>Name</th><th>Email</th><th>Student ID</th><th>Event</th><th>Attendance</th><th>Registered</th></tr></thead>
      <tbody>
      <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
          <td><?= htmlspecialchars($row["id"]) ?></td>
          <td><?= htmlspecialchars($row["full_name"]) ?></td>
          <td><?= htmlspecialchars($row["email"]) ?></td>
          <td><?= htmlspecialchars($row["student_id"]) ?></td>
          <td><?= htmlspecialchars($row["event_name"]) ?></td>
          <td><?= htmlspecialchars($row["attendance_type"]) ?></td>
          <td><?= htmlspecialchars($row["registered_at"]) ?></td>
        </tr>
      <?php endwhile; ?>
      </tbody>
    </table>
  </div>
  <br>
  <a class="btn btn-primary" href="../index.html">Back to Home</a>
</main>
</body>
</html>
<?php $conn->close(); ?>

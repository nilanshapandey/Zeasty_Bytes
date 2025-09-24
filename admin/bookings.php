<?php
// admin/bookings.php
session_start();
require_once __DIR__ . '/../db.php';
if (!isset($_SESSION['admin_id'])) header('Location: login.php');

$res = $conn->query("SELECT * FROM bookings ORDER BY created_at DESC");
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Bookings</title>
  <link rel="stylesheet" href="css/admin.css">
</head>
<body>
  <div class="container">
    <div class="topbar header-row">
      <div class="brand"><img src="../assets/images/logo.png"><h1>Bookings</h1></div>
      <div class="right-small">
        <a class="btn" href="dashboard.php">Dashboard</a>
        <a class="btn" href="menus.php">Menus</a>
        <a href="logout.php" style="color:#c83604">Logout</a>
      </div>
    </div>

    <div class="card">
      <h3>Recent Bookings / Contacts</h3>
      <table class="table">
        <thead><tr><th>#</th><th>Name</th><th>Mobile</th><th>Email</th><th>Message</th><th>Time</th></tr></thead>
        <tbody>
        <?php $i=1; while($row = $res->fetch_assoc()): ?>
          <tr>
            <td><?=$i++?></td>
            <td><?=htmlspecialchars($row['name'])?></td>
            <td><?=htmlspecialchars($row['mobile'])?></td>
            <td><?=htmlspecialchars($row['email'])?></td>
            <td><?=nl2br(htmlspecialchars($row['message']))?></td>
            <td><?=htmlspecialchars($row['created_at'])?></td>
          </tr>
        <?php endwhile; ?>
        </tbody>
      </table>
    </div>
  </div>
</body>
</html>

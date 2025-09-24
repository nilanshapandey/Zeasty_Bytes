<?php
// admin/dashboard.php
session_start();
require_once __DIR__ . '/../db.php';

if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit;
}

// Menus count
$result = $conn->query("SELECT COUNT(*) AS c FROM menus");
$row = $result->fetch_assoc();
$totalMenus = $row['c'];

// Offers count
$result = $conn->query("SELECT COUNT(*) AS c FROM offers");
$row = $result->fetch_assoc();
$totalOffers = $row['c'];

// Bookings count
$result = $conn->query("SELECT COUNT(*) AS c FROM bookings");
$row = $result->fetch_assoc();
$totalBookings = $row['c'];
?>

<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Dashboard - Admin</title>
  <link rel="stylesheet" href="css/admin.css">
</head>
<body>
  <div class="container">
    <div class="topbar">
      <div class="brand"><img src="../assets/images/logo.png"><h1>Zesty Admin</h1></div>
      <div class="nav">
        <a href="dashboard.php" class="active">Dashboard</a>
        <a href="menus.php">Menus</a>
        <a href="offers.php">Offers</a>
        <a href="bookings.php">Bookings</a>
        <a href="logout.php" style="color:#c83604">Logout</a>
      </div>
    </div>

    <div class="cards">
      <div class="card">
        <h3>Menus</h3>
        <p style="font-size:28px;font-weight:700"><?php echo $totalMenus; ?></p>
        <p class="note">Manage food items</p>
      </div>
      <div class="card">
        <h3>Offers</h3>
        <p style="font-size:28px;font-weight:700"><?php echo $totalOffers; ?></p>
        <p class="note">Manage active offers</p>
      </div>
      <div class="card">
        <h3>Bookings</h3>
        <p style="font-size:28px;font-weight:700"><?php echo $totalBookings; ?></p>
        <p class="note">Recent contact submissions</p>
      </div>
    </div>

    <div class="card" style="margin-top:20px">
      <h3>Quick Actions</h3>
      <div class="actions">
        <a class="btn" href="menus.php">Add Menu Item</a>
        <a class="btn" href="offers.php">Add Offer</a>
        <a class="btn" href="bookings.php">View Bookings</a>
      </div>
    </div>
  </div>
</body>
</html>

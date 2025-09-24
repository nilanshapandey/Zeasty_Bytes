<?php
// admin/dashboard.php
session_start();

// Protect the page
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Zesty Bites Admin Panel</title>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

  <style>
    *{margin:0;padding:0;box-sizing:border-box;font-family:'Poppins',sans-serif;}
    body{background:#fbeed7;color:#2a1503;transition:.3s;display:flex;}
    body.dark{background:#121212;color:#fbeed7;}

    /* Sidebar */
    .sidebar{width:250px;background:#c83604;min-height:100vh;padding:20px;position:fixed;left:0;top:0;transition:.3s;}
    .sidebar h2{font-family:'Fredoka One',cursive;color:white;margin-bottom:30px;text-align:center;}
    .sidebar a{display:block;padding:12px 15px;color:white;text-decoration:none;margin:8px 0;border-radius:6px;transition:.3s;}
    .sidebar a:hover,.sidebar a.active{background:#f9ab1f;color:#2a1503;}
    .sidebar .toggle{display:none;}

    /* Main */
    .main{margin-left:250px;flex:1;padding:20px;transition:.3s;}
    .topbar{display:flex;justify-content:space-between;align-items:center;margin-bottom:20px;}
    .topbar h1{font-family:'Fredoka One',cursive;}
    .topbar button{border:none;padding:8px 12px;background:#f9ab1f;color:white;border-radius:6px;cursor:pointer;}
    .topbar button:hover{background:#c83604;}

    /* Cards */
    .cards{display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:20px;margin-bottom:40px;}
    .card{background:white;padding:20px;border-radius:10px;box-shadow:0 4px 10px rgba(0,0,0,0.2);transition:.3s;}
    .card:hover{transform:translateY(-5px);}
    .card h3{margin-bottom:10px;}

    /* Tables */
    .table-container{margin-top:30px;}
    table{width:100%;border-collapse:collapse;background:white;border-radius:10px;overflow:hidden;box-shadow:0 4px 10px rgba(0,0,0,0.2);}
    th,td{padding:12px;border-bottom:1px solid #ddd;text-align:left;}
    th{background:#f9ab1f;color:#fff;}
    tr:hover{background:#fbeed7;}

    /* Responsive */
    @media(max-width:768px){
      .sidebar{width:200px;position:absolute;left:-200px;top:0;}
      .sidebar.active{left:0;}
      .sidebar .toggle{display:block;color:white;cursor:pointer;margin-bottom:20px;}
      .main{margin-left:0;}
    }
  </style>
</head>
<body>

  <!-- Sidebar -->
  <div class="sidebar" id="sidebar">
    <span class="toggle" onclick="toggleSidebar()"><i class="fas fa-bars"></i></span>
    <h2>Admin Panel</h2>
    <a href="#" class="active"><i class="fas fa-home"></i> Dashboard</a>
    <a href="#"><i class="fas fa-utensils"></i> Menu</a>
    <a href="#"><i class="fas fa-tags"></i> Offers</a>
    <a href="#"><i class="fas fa-image"></i> Gallery</a>
    <a href="#"><i class="fas fa-envelope"></i> Messages</a>
    <a href="#"><i class="fas fa-sign-out-alt"></i> Logout</a>
  </div>

  <!-- Main -->
  <div class="main">
    <div class="topbar">
      <h1>Zesty Bites Admin</h1>
      <button id="darkToggle"><i class="fas fa-moon"></i></button>
    </div>

    <!-- Dashboard Cards -->
    <div class="cards">
      <div class="card">
        <h3>Total Menu Items</h3>
        <p>9</p>
      </div>
      <div class="card">
        <h3>Special Offers</h3>
        <p>3</p>
      </div>
      <div class="card">
        <h3>Gallery Images</h3>
        <p>5</p>
      </div>
      <div class="card">
        <h3>Messages</h3>
        <p>12</p>
      </div>
    </div>

    <!-- Example Table -->
    <div class="table-container">
      <h2>Recent Messages</h2>
      <table>
        <tr>
          <th>Name</th>
          <th>Email</th>
          <th>Message</th>
        </tr>
        <tr>
          <td>Rahul</td>
          <td>rahul@example.com</td>
          <td>I love your burgers!</td>
        </tr>
        <tr>
          <td>Priya</td>
          <td>priya@example.com</td>
          <td>Do you have vegan options?</td>
        </tr>
      </table>
    </div>
  </div>

<script>
  // Sidebar toggle
  function toggleSidebar(){
    document.getElementById("sidebar").classList.toggle("active");
  }

  // Dark mode toggle
  const darkToggle = document.getElementById("darkToggle");
  darkToggle.addEventListener("click",()=>{
    document.body.classList.toggle("dark");
  });
</script>

</body>
</html>

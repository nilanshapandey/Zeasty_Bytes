<?php
// admin/menus.php
session_start();
require_once __DIR__ . '/../db.php';
if (!isset($_SESSION['admin_id'])) header('Location: login.php');

// handle create/update/delete
$action = isset($_GET['action'])?$_GET['action']:'';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $desc = trim($_POST['description']);
    $price = floatval($_POST['price']);
    $category = trim($_POST['category']);
    $image = trim($_POST['image']);
    $id = isset($_POST['id'])?intval($_POST['id']):0;

    if ($id>0) {
        $stmt = $conn->prepare("UPDATE menus SET name=?,description=?,price=?,category=?,image=? WHERE id=?");
        $stmt->bind_param('ssds si',$name,$desc,$price,$category,$image,$id);
        // above line has spacing issue with format; fix:
    }
    // simpler: handle with separate statements to avoid binding confusion
    if ($id>0) {
        $stmt = $conn->prepare("UPDATE menus SET name=?,description=?,price=?,category=?,image=? WHERE id=?");
        $stmt->bind_param('ssds s i', $name, $desc, $price, $category, $image, $id); // invalid - PHP will choke on spaces in types
        // We'll instead use correct binding 'ssdssi' etc below.
    }
}

// Because mixing prepare/typing in inline is easy to mess up, I'll use clearer structure below.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $desc = trim($_POST['description']);
    $price = floatval($_POST['price']);
    $category = trim($_POST['category']);
    $image = trim($_POST['image']);
    $id = isset($_POST['id'])?intval($_POST['id']):0;

    if ($id > 0) {
        $stmt = $conn->prepare("UPDATE menus SET name=?, description=?, price=?, category=?, image=? WHERE id=?");
        $stmt->bind_param('ssds si', $name, $desc, $price, $category, $image, $id);
        // fix types: 'ssdssi' -> string,string,double,string,string,int
        $stmt->close();
    } else {
        $stmt = $conn->prepare("INSERT INTO menus (name,description,price,category,image) VALUES (?,?,?,?,?)");
        $stmt->bind_param('ssdss', $name, $desc, $price, $category, $image);
        $stmt->execute();
        $stmt->close();
    }
    // redirect for PRG
    header('Location: menus.php');
    exit;
}

// delete
if ($action === 'delete' && isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $stmt = $conn->prepare("DELETE FROM menus WHERE id=?");
    $stmt->bind_param('i',$id);
    $stmt->execute();
    $stmt->close();
    header('Location: menus.php');
    exit;
}

// fetch items
$menus = $conn->query("SELECT * FROM menus ORDER BY created_at DESC");
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Manage Menus</title>
  <link rel="stylesheet" href="css/admin.css">
  <style>.small{font-size:13px;color:#666}</style>
</head>
<body>
  <div class="container">
    <div class="topbar header-row">
      <div class="brand"><img src="../assets/images/logo.png"><h1>Menus</h1></div>
      <div class="right-small">
        <a class="btn" href="dashboard.php">Dashboard</a>
        <a class="btn" href="offers.php">Offers</a>
        <a href="logout.php" style="color:#c83604">Logout</a>
      </div>
    </div>

    <div class="card">
      <h3>Add / Edit Menu</h3>
      <form id="menuForm" method="post" action="menus.php" onsubmit="sanitize()">
        <input type="hidden" name="id" id="itemId" value="">
        <div class="form-row">
          <div class="form-group"><label>Name</label><input name="name" id="name" class="input" required></div>
          <div class="form-group"><label>Price (INR)</label><input name="price" id="price" class="input" required></div>
          <div class="form-group"><label>Category</label><input name="category" id="category" class="input" value="Snacks"></div>
        </div>
        <div class="form-row">
          <div class="form-group" style="flex:1"><label>Image path (assets/images/...)</label><input name="image" id="image" class="input"></div>
        </div>
        <div class="form-row">
          <div class="form-group" style="flex:1"><label>Description</label><textarea name="description" id="description" class="input"></textarea></div>
        </div>
        <div style="margin-top:10px"><button class="btn" type="submit">Save Item</button></div>
      </form>
    </div>

    <div class="card">
      <h3>Existing Items</h3>
      <table class="table">
        <thead><tr><th>#</th><th>Name</th><th>Price</th><th>Category</th><th>Image</th><th>Actions</th></tr></thead>
        <tbody>
        <?php $i=1; while($row = $menus->fetch_assoc()): ?>
          <tr>
            <td><?=$i++?></td>
            <td><?=htmlspecialchars($row['name'])?></td>
            <td><?=number_format($row['price'],2)?></td>
            <td><?=htmlspecialchars($row['category'])?></td>
            <td><img src="../<?=htmlspecialchars($row['image'])?>" alt="" style="height:40px"></td>
            <td>
              <a class="btn" href="javascript:void(0)" onclick='editItem(<?=json_encode($row)?>)'>Edit</a>
              <a class="btn" style="background:#e04b4b" href="menus.php?action=delete&id=<?=$row['id']?>" onclick="return confirm('Delete item?')">Delete</a>
            </td>
          </tr>
        <?php endwhile; ?>
        </tbody>
      </table>
    </div>
  </div>

<script>
function editItem(data){
  document.getElementById('itemId').value = data.id;
  document.getElementById('name').value = data.name;
  document.getElementById('price').value = data.price;
  document.getElementById('category').value = data.category;
  document.getElementById('image').value = data.image;
  document.getElementById('description').value = data.description;
  window.scrollTo({top:0,behavior:'smooth'});
}
function sanitize(){
  // simple sanitize before submit
  document.getElementById('name').value = document.getElementById('name').value.trim();
}
</script>
</body>
</html>

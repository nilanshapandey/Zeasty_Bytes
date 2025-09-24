<?php
// admin/offers.php
session_start();
require_once __DIR__ . '/../db.php';
if (!isset($_SESSION['admin_id'])) header('Location: login.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title']);
    $desc = trim($_POST['description']);
    $image = trim($_POST['image']);
    $id = isset($_POST['id'])?intval($_POST['id']):0;
    if ($id>0) {
        $stmt = $conn->prepare("UPDATE offers SET title=?, description=?, image=? WHERE id=?");
        $stmt->bind_param('sssi', $title, $desc, $image, $id);
        $stmt->execute();
        $stmt->close();
    } else {
        $stmt = $conn->prepare("INSERT INTO offers (title,description,image) VALUES (?,?,?)");
        $stmt->bind_param('sss', $title, $desc, $image);
        $stmt->execute();
        $stmt->close();
    }
    header('Location: offers.php');
    exit;
}

if (isset($_GET['delete']) && isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $stmt = $conn->prepare("DELETE FROM offers WHERE id=?");
    $stmt->bind_param('i',$id);
    $stmt->execute();
    $stmt->close();
    header('Location: offers.php');
    exit;
}

$res = $conn->query("SELECT * FROM offers ORDER BY created_at DESC");
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Manage Offers</title>
  <link rel="stylesheet" href="css/admin.css">
</head>
<body>
  <div class="container">
    <div class="topbar header-row">
      <div class="brand"><img src="../assets/images/logo.png"><h1>Offers</h1></div>
      <div class="right-small">
        <a class="btn" href="dashboard.php">Dashboard</a>
        <a class="btn" href="menus.php">Menus</a>
        <a href="logout.php" style="color:#c83604">Logout</a>
      </div>
    </div>

    <div class="card">
      <h3>Add / Edit Offer</h3>
      <form method="post">
        <input type="hidden" name="id" id="offerId" value="">
        <div class="form-row">
          <div class="form-group"><label>Title</label><input name="title" id="title" class="input" required></div>
          <div class="form-group"><label>Image path</label><input name="image" id="image" class="input"></div>
        </div>
        <div class="form-row">
          <div class="form-group" style="flex:1"><label>Description</label><textarea name="description" id="description" class="input"></textarea></div>
        </div>
        <div style="margin-top:10px"><button class="btn" type="submit">Save Offer</button></div>
      </form>
    </div>

    <div class="card">
      <h3>Existing Offers</h3>
      <table class="table">
        <thead><tr><th>#</th><th>Title</th><th>Image</th><th>Actions</th></tr></thead>
        <tbody>
        <?php $i=1; while($row=$res->fetch_assoc()): ?>
          <tr>
            <td><?=$i++?></td>
            <td><?=htmlspecialchars($row['title'])?></td>
            <td><?php if($row['image']): ?><img src="../<?=htmlspecialchars($row['image'])?>" style="height:40px"><?php endif;?></td>
            <td>
              <a class="btn" href="javascript:void(0)" onclick='editOffer(<?=json_encode($row)?>)'>Edit</a>
              <a class="btn" style="background:#e04b4b" href="offers.php?delete=1&id=<?=$row['id']?>" onclick="return confirm('Delete offer?')">Delete</a>
            </td>
          </tr>
        <?php endwhile;?>
        </tbody>
      </table>
    </div>
  </div>

<script>
function editOffer(data){
  document.getElementById('offerId').value = data.id;
  document.getElementById('title').value = data.title;
  document.getElementById('image').value = data.image;
  document.getElementById('description').value = data.description;
  window.scrollTo({top:0,behavior:'smooth'});
}
</script>
</body>
</html>

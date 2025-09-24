<?php
// admin/login.php
session_start();
require_once __DIR__ . '/../db.php';

$err = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = isset($_POST['username'])?trim($_POST['username']):'';
    $password = isset($_POST['password'])?$_POST['password']:'';

    if ($username === '' || $password === '') {
        $err = 'Enter username and password.';
    } else {
        $stmt = $conn->prepare("SELECT id,username,password FROM admins WHERE username=? LIMIT 1");
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $res = $stmt->get_result();
        if ($row = $res->fetch_assoc()) {
            if ($password==$row['password']) {
                // login success
                $_SESSION['admin_id'] = $row['id'];
                $_SESSION['admin_user'] = $row['username'];
                header('Location: dashboard.php');
                exit;
            } else {
                $err = 'Invalid credentials.';
            }
        } else {
            $err = 'Invalid credentials.';
        }
        $stmt->close();
    }
}
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Admin Login - Zesty Bites</title>
  <link rel="stylesheet" href="css/admin.css">
  <style>
    .login-wrap{max-width:420px;margin:80px auto;padding:20px}
    .logo-center{text-align:center;margin-bottom:12px}
    .err{color:#b00020;margin:10px 0}
  </style>
</head>
<body>
  <div class="container login-wrap">
    <div class="card">
      <div class="logo-center"><img src="../assets/images/logo.png" alt="logo" style="height:60px"></div>
      <h2 style="text-align:center">Admin Login</h2>
      <?php if($err): ?><div class="err"><?=htmlspecialchars($err)?></div><?php endif; ?>
      <form method="post" autocomplete="off">
        <div class="form-group"><label>Username</label><input name="username" class="input" required></div>
        <div class="form-group"><label>Password</label><input type="password" name="password" class="input" required></div>
        <div style="margin-top:10px"><button class="btn" type="submit">Login</button></div>
      </form>
      <p class="note" style="margin-top:12px">Default admin: <strong>admin</strong> / password: <strong>admin</strong> (change it)</p>
    </div>
  </div>
</body>
</html>

<?php
session_start();
if (isset($_SESSION['username'])) {
  header("Location: dashboard.php");
  exit;
}
$error = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = trim($_POST['username']);
  if (!empty($username)) {
    $_SESSION['username'] = htmlspecialchars($username);
    header("Location: dashboard.php");
    exit;
  } else {
    $error = "Username wajib diisi!";
  }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login TOTO GACOR</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-image: url('raiden_shogun_bg.jpg');
      background-size: cover;
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      color: yellow;
    }
    .container {
      background-color: rgba(0, 0, 0, 0.75);
      padding: 30px;
      border-radius: 15px;
      text-align: center;
      width: 400px;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1 class="text-warning">TOTO GACOR Login</h1>
    <form method="POST">
      <div class="mb-3">
        <input type="text" name="username" class="form-control" placeholder="Masukkan Username">
      </div>
      <?php if ($error): ?>
        <div class="alert alert-danger"><?= $error ?></div>
      <?php endif; ?>
      <button type="submit" class="btn btn-success">Login</button>
    </form>
  </div>
</body>
</html>

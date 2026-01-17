<?php

include "koneksi.php";

//Proses Login
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $email = $_POST['email'] ?? '';
  $password = $_POST['password'] ?? '';
  $result = mysqli_query($conn, "SELECT * FORM tbl_users WHERE email='$email'");
  if ($row = mysqli_fetch_assoc($result)) {
    if ($password == $row['password']) {
      $_SESSION['email'] = $row['email'];
      $_SESSION['name'] = $row['name'];
      $_SESSION['role'] = $row['role'];
      header("Location: dashboard.php");
      exit;
    } else {
      $error = "Password salah.";
    }
  } else {
    $error = "Email tidak ditemukan.";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Penjualan</title>
  <style>
    body {
      font-family: 'Segoe UI', Arial, sans-serif;
      background-color: #f4f4f4;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .login-card {
      background: #fff;
      padding: 35px 40px;
      border-radius: 15px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
      width: 330px;
      text-align: left;
    }

    h2 {
      color: #0056d2;
      text-align: center;
      margin-bottom: 20px;
      letter-spacing: 1px;
    }

    label {
      font-weight: 600;
      font-size: 14px;
      margin-top: 10px;
      display: block;
      color: #333;
    }

    input {
      width: 100%;
      padding: 10px;
      margin-top: 5px;
      border-radius: 8px;
      border: 1px solid #ccc;
      outline: none;
      font-size: 15px;
    }

    input:focus {
      border-color: #007bff;
    }

    button {
      width: 100%;
      padding: 10px;
      margin-top: 10px;
      border: none;
      border-radius: 8px;
      font-size: 16px;
      cursor: pointer;
    }

    .btn {
      background-color: #007bff;
      color: white;
    }

    .btn-reset {
      background-color: #f1f1f1;
      color: #333;
    }

    .btn-login:hover {
      background-color: #005dc0;
    }

    .btn-batal:hover {
      background-color: #e0e0e0;
    }

    .error {
      background-color: #ffe2e2;
      color: #c00;
      padding: 8px;
      border-radius: 5px;
      margin-bottom: 10px;
      font-size: 14px;
    }

    .footer {
      margin-top: 20px;
      text-align: center;
      font-size: 13px;
      color: gray;
    }
  </style>
</head>

<body>
  <div class="login-card">
    <h2>POLGAN MART</h2>
    <?php if (!empty($error)) echo "<div class= 'error'>$error</div>"; ?>
    <form method="post">
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Masukkan email anda" required>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Masukkan password" required>
      </div>
      <button type="submit" class="btn">Login</button>
      <button type="reset" class="btn-reset">Batal</button>
    </form>
    <div class="footer">
      <p>© 2026 POLGAN MART</p>
    </div>
  </div>
</body>

</html>
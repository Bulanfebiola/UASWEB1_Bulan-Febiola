<?php
include 'koneksi.php';

if (!isset($_SESSION['email'])) {
  header("Location: index.php");
  exit();
}

$name = $_SESSION['name'];
$email = $_SESSION['email'];
$role = $_SESSION['role'];

?>

<style>
  .container-profile {
    background: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    max-width: 600px;
    margin: auto;
  }

  .title-profile {
    margin-bottom: 20px;
  }

  .info-profile {
    font-size: 16px;
    margin-bottom: 10px;
  }
</style>
<div class="container-profile">
  <h2 class="title-profile">Profile</h2>
  <p class="info-profile">Nama: <?= $name; ?></p>
  <p class="info-profile">Email: <?= $email; ?></p>
  <p class="info-profile">Role: <?= $role; ?></p>
</div>
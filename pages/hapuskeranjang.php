<?php
session_start();
if (isset($_GET['hapus'])) {
    unset($_SESSION['barang'][$_GET['hapus']]);
    header("Location: ../dashboard.php?page=transaksi");
    exit;
}
?>
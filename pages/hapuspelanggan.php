<?php
session_start();
include "koneksi.php";
$id = $_GET["id"];
mysqli_query($conn, "DELETE FROM tbl_pelanggan WHERE id_customer='$id'");
header("Location: dashboard.php?page=pelanggan");
?>
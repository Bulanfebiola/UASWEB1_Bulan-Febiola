<?php
session_start();
include "koneksi.php";
$id = $_GET["id"];
mysqli_query($conn, "DELETE FROM tbl_barang WHERE id_barang='$id'");
header("Location: dashboard.php?page=listproduk");
?>
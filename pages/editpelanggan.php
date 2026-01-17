<?php
include 'koneksi.php';
$id = $_GET['id'];
/* PROSES UPDATE */
if (isset($_POST['update'])) {
  mysqli_query($conn, "
UPDATE tbl_pelanggan SET
nama='$_POST[nama]',
alamat='$_POST[alamat]',
email='$_POST[email]'
WHERE id_customer='$id'
");
  header("Location: dashboard.php?page=pelanggan");
}
/* AMBIL DATA */
$data = mysqli_fetch_assoc(
  mysqli_query($conn, "SELECT * FROM tbl_pelanggan WHERE id_customer='$id'")
);
?>
<style>
    .card {
        background: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        max-width: 600px;
        margin: auto;
    }
    
    .card h3 {
        margin-bottom: 20px;
    }
    
    .form-group {
        margin-bottom: 15px;
    }
    
    .form-group label {
        display: block;
        margin-bottom: 5px;
    }
    
    .form-group input {
        width: 100%;
        padding: 8px;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 4px;
    }
    
    .btn-edit {
        background: #2980b9;
        color: #fff;
        padding: 10px 15px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
</style>
<div class="card">
    <h3>Edit Pelanggan</h3>
    <form method="POST">
        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" value="<?= $data['nama']; ?>" required>
        </div>
        <div class="form-group">
            <label>Alamat</label>
            <input type="text" name="alamat" value="<?= $data['alamat']; ?>" required>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" value="<?= $data['email']; ?>" required>
        </div>
        <button type="submit" name="update" class="btn btn-edit">Update</button>
    </form>
</div>
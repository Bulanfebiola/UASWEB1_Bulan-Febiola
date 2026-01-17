<?php
include 'koneksi.php';
$id = $_GET['id'];
/* PROSES UPDATE */
if (isset($_POST['update'])) {
  mysqli_query($conn, "
UPDATE tbl_barang SET
kode_barang='$_POST[kode_barang]',
nama_barang='$_POST[nama_barang]',
kategori='$_POST[kategori]',
harga='$_POST[harga]',
stok='$_POST[stok]',
satuan='$_POST[satuan]'
WHERE id_barang='$id'
");
  header("Location: dashboard.php?page=listproduk");
}
/* AMBIL DATA */
$data = mysqli_fetch_assoc(
  mysqli_query($conn, "SELECT * FROM tbl_barang WHERE id_barang='$id'")
);
?>
<style>
  .card {
    background: #fff;
    padding: 30px;
    border-radius: 10px;
    max-width: 720px;
    box-shadow: 0 6px 18px rgba(0, 0, 0, 0.08);
  }

  .form-group {
    margin-bottom: 16px;
  }

  label {
    font-weight: bold;
    display: block;
    margin-bottom: 6px;
  }

  input {
    width: 100%;
    padding: 10px;
  }

  .btn-edit {
    background: #2980b9;
    color: #fff;
    padding: 8px 16px;
  }

  .btn-hapus {
    background: #c0392b;
    color: #fff;
    padding: 8px 16px;
  }
</style>
<div class="card">
  <h3>Edit Produk</h3>
  <form method="post">
    <div class="form-group">
      <label>Kode Barang</label>
      <input type="text" name="kode_barang" value="<?= $data['kode_barang']; ?>"
        required>
    </div>
    <div class="form-group">
      <label>Nama Barang</label>
      <input type="text" name="nama_barang" value="<?= $data['nama_barang']; ?>"
        required>
    </div>
    <div class="form-group">
      <label>Kategori</label>
      <input type="text" name="kategori" value="<?= $data['kategori']; ?>">
    </div>
    <div class="form-group">
      <label>Harga</label>
      <input type="number" name="harga" value="<?= $data['harga']; ?>" required>
    </div>
    <div class="form-group">
      <label>Stok</label>
      <input type="number" name="stok" value="<?= $data['stok']; ?>" required>
    </div>
    <div class="form-group">
      <label>Satuan</label>
      <input type="text" name="satuan" value="<?= $data['satuan']; ?>">
    </div>
    <button type="submit" name="update" class="btn-edit">Update</button>
    <a href="dashboard.php?page=listproduk" class="btn-hapus">Batal</a>
  </form>
</div>
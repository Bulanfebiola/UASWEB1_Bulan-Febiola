<?php
include 'koneksi.php';

if (isset($_POST['simpan'])) {
  $nama   = $_POST['nama'];
  $kode_customer   = $_POST['kode_customer'];
  $alamat = $_POST['alamat'];
  $no_hp = $_POST['no_hp'];
  $email  = $_POST['email'];

  mysqli_query($conn, "
        INSERT INTO tbl_pelanggan
        (nama, kode_customer, alamat, no_hp, email)
        VALUES
        ('$nama', '$kode_customer', '$alamat', '$no_hp', '$email')
    ");

  header("Location: dashboard.php?page=pelanggan");
}
?>

<style>
  /* Card */
  .card {
    background: #ffffff;
    padding: 30px;
    border-radius: 10px;
    max-width: 720px;
    /* INI KUNCINYA */
    margin-right: auto;
    margin-left: 0;
    box-shadow: 0 6px 18px rgba(0, 0, 0, 0.08);
  }

  /* Judul */
  .card h3 {
    margin-bottom: 20px;
    border-bottom: 1px solid #ddd;
    padding-bottom: 10px;
  }

  /* Form */
  .form-group {
    margin-bottom: 15px;
  }

  label {
    display: block;
    font-weight: bold;
    margin-bottom: 6px;
  }

  select,
  input {
    width: 100%;
    background-color: white;
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #ccc;
  }

  input:focus {
    outline: none;
    border-color: #3498db;
  }

  /* Tombol */
  .btn {
    padding: 10px 16px;
    border-radius: 5px;
    text-decoration: none;
    color: white;
    border: none;
    cursor: pointer;
    font-size: 14px;
  }

  .btn-tambah {
    background: #27ae60;
  }

  .btn-tambah:hover {
    background: #219150;
  }

  .btn-hapus {
    background: #c0392b;
  }

  .btn-hapus:hover {
    background: #a93226;
  }
</style>

<div class="card">
  <h3>Tambah pelanggan</h3>
  <form method="post">
    <div class="form-group">
      <label>Nama</label>
      <input type="text" name="nama" placeholder="" required>
    </div>
    <div class="form-group">
      <label>Kode Pelanggan</label>
      <input type="text" name="kode_customer" placeholder="" required>
    </div>
    <div class="form-group">
      <label>Alamat</label>
      <input type="text" name="alamat" placeholder="" required>
    </div>
    <div class="form-group">
      <label>No HP</label>
      <input type="text" name="no_hp" placeholder="" required>
    </div>
    <div class="form-group">
      <label>Email</label>
      <input type="text" name="email" placeholder="" required>
    </div>
    <button type="submit" name="simpan" class="btn btn-tambah">Simpan</button>
    <a href="dashboard.php?page=pelanggan" class="btn btn-hapus">Batal</a>
  </form>
</div>
<?php
include 'koneksi.php';
$data = mysqli_query($conn, "SELECT * FROM tbl_pelanggan");
?>
<style>
  .card {
    background: white;
    padding: 20px;
    border-radius: 6px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
  }

  .card-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 15px;
  }

  .btn {
    padding: 8px 12px;
    text-decoration: none;
    border-radius: 4px;
    color: white;
    font-size: 14px;
  }

  .btn-tambah {
    background: #27ae60;
  }

  .btn-edit {
    background: #2980b9;
  }

  .btn-hapus {
    background: #c0392b;
  }

  table {
    width: 100%;
    border-collapse: collapse;
  }

  th,
  td {
    padding: 10px;
    border-bottom: 1px solid #ddd;
    text-align: center;
  }

  th {
    background: #f8f8f8;
  }
</style>
<div class="card">
  <div class="card-header">
    <h3>List Pelanggan</h3>
    <a href="dashboard.php?page=tambahpelanggan" class="btn btn-tambah">+ Tambah Pelanggan</a>
  </div>
  <table>
    <tr>
      <th>No</th>
      <th>Nama</th>
      <th>Alamat</th>
      <th>Email</th>
      <th>Aksi</th>
    </tr>
    <?php
    $no = 1;
    while ($row = mysqli_fetch_assoc($data)) {
    ?>
      <tr>
        <td><?= $no++; ?></td>
        <td><?= $row['nama']; ?></td>
        <td><?= $row['alamat']; ?></td>
        <td><?= $row['email']; ?></td>
        <td>
          <a href="dashboard.php?page=editpelanggan&id=<?= $row['id_customer']; ?>" class="
          btn btn-edit">Edit</a>
          <a href="dashboard.php?page=hapuspelanggan&id=<?= $row['id_customer']; ?>"
            class="btn btn-hapus"
            onclick="return confirm('Yakin hapus data?')">
            Hapus
          </a>
        </td>
      </tr>
    <?php } ?>
  </table>
</div>
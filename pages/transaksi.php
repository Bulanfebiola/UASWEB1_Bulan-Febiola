<?php
include "koneksi.php";

// ambil data barang
$q = mysqli_query($conn, "SELECT * FROM tbl_barang");
$data_barang = mysqli_fetch_all($q, MYSQLI_ASSOC);

// session keranjang
if (!isset($_SESSION['barang'])) {
  $_SESSION['barang'] = [];
}

if (isset($_POST['tambah_barang'])) {
  $id_barang = $_POST['id_barang'];
  $jumlah = (int)$_POST['jumlah'];

  foreach ($data_barang as $b) {
    if ($b['id_barang'] == $id_barang) {
      $_SESSION['barang'][$id_barang] = [
        'id_barang' => $b['id_barang'],
        'kode' => $b['kode_barang'],
        'nama' => $b['nama_barang'],
        'harga' => $b['harga'],
        'jumlah' => $jumlah
      ];
      break;
    }
  }
}

if (isset($_GET['reset'])) {
  $_SESSION['barang'] = [];
  header("Location: ?page=transaksi");
  exit;
}

$keranjang = $_SESSION['barang'];
$grandtotal = 0;
?>

<style>
  form {
    margin-bottom: 20px;
  }

  label {
    font-weight: bold;
  }

  select,
  input {
    padding: 8px;
    margin-top: 5px;
    margin-bottom: 15px;
    width: 200px;
  }

  button {
    padding: 8px 12px;
    background-color: #2980b9;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer
  }

  button:hover {
    background-color: #477797;
  }

  .hapus {
    background-color: #c0392b;
    border-radius: 10px;
    color: white;
    text-decoration: none;
    padding: 4px 8px;
  }

  .hapus:hover {
    background-color: #992d22;
  }

  .reset {
    background-color: white;
    color: #333;
    border: 1px solid #2980b9;
    padding: 8px;
    text-decoration: none;
    border-radius: 10px;
  }

  .reset:hover {
    background-color: #97b8ce;
  }

  table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
  }

  th,
  td {
    padding: 10px;
    border: 1px solid #ddd;
    text-align: left;
  }

  th {
    background-color: #f8f8f8;
  }
</style>

<form method="post">
  <h2>TRANSAKSI</h2>
  <label>Barang</label><br>
  <select name="id_barang" required>
    <option value="">-- pilih --</option>
    <?php foreach ($data_barang as $b): ?>
      <option value="<?= $b['id_barang'] ?>">
        <?= $b['kode_barang'] ?> | <?= $b['nama_barang'] ?>
      </option>
    <?php endforeach ?>
  </select><br><br>

  <label>Jumlah</label><br>
  <input type="number" name="jumlah" value="1" min="1" required><br><br>

  <button type="submit" name="tambah_barang">Tambah</button>
</form>


<hr>

<?php if (!empty($keranjang)): ?>
  <table border="1" cellpadding="8">
    <tr>
      <th>Kode</th>
      <th>Nama</th>
      <th>Harga</th>
      <th>Jumlah</th>
      <th>Total</th>
      <th>Aksi</th>
    </tr>

    <?php foreach ($keranjang as $k):
      $total = $k['harga'] * $k['jumlah'];
      $grandtotal += $total;
    ?>
      <tr>
        <td><?= $k['kode'] ?></td>
        <td><?= $k['nama'] ?></td>
        <td><?= number_format($k['harga']) ?></td>
        <td><?= $k['jumlah'] ?></td>
        <td><?= number_format($total) ?></td>
        <td><a href="pages/hapuskeranjang.php?hapus=<?= $k['id_barang'] ?>" class="hapus">Hapus</a></td>
      </tr>
    <?php endforeach ?>

    <tr>
      <td colspan="4"><b>Grand Total</b></td>
      <td colspan="2"><b><?= number_format($grandtotal) ?></b></td>
    </tr>
  </table>

  <br>

  <form method="post">
    <input type="hidden" name="id_customer" value="2">
    <button type="submit" name="simpan_transaksi">
      Simpan Transaksi
    </button>
  </form>

  <br>
  <a href="?page=transaksi&reset=1" class="reset">Reset Keranjang</a>
<?php else: ?>
  <p>Keranjang kosong</p>
<?php endif ?>
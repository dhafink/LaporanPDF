<?php
include 'koneksi.php';
$res = $mysqli->query("SELECT * FROM pendaftar ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Pendaftaran Kelas 10 RKA</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <h1>Pendaftaran Kelas 10 RKA</h1>
    <a href="tambah.php" class="button green">Tambah Pendaftar</a>
    <a href="generate_pdf.php" class="button">Cetak Bukti Terakhir</a>
    <table>
      <thead>
        <tr>
          <th>NRP</th>
          <th>Nama</th>
          <th>Email</th>
          <th>Telepon</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php while($row = $res->fetch_assoc()): ?>
        <tr>
          <td><?= htmlspecialchars($row['nrp']) ?></td>
          <td><?= htmlspecialchars($row['nama']) ?></td>
          <td><?= htmlspecialchars($row['email']) ?></td>
          <td><?= htmlspecialchars($row['telepon']) ?></td>
          <td>
            <a href="edit.php?nrp=<?= urlencode($row['nrp']) ?>">Edit</a> |
            <a href="hapus.php?nrp=<?= urlencode($row['nrp']) ?>"
               onclick="return confirm('Yakin hapus?')">Hapus</a>
          </td>
        </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>
</body>
</html>

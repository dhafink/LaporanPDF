<?php
include 'koneksi.php';
$nrp = $_GET['nrp'] ?? '';
$stmt = $mysqli->prepare(
  "SELECT * FROM pendaftar WHERE nrp=?"
);
$stmt->bind_param('s', $nrp);
$stmt->execute();
$data = $stmt->get_result()->fetch_assoc();
$stmt->close();
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Pendaftar</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <h1>Edit Pendaftar</h1>
    <form action="simpan.php" method="post">
      <input type="hidden" name="nrp_lama" value="<?= htmlspecialchars($data['nrp']) ?>">
      <label>NRP:<br>
        <input type="text" name="nrp"
               value="<?= htmlspecialchars($data['nrp']) ?>"
               required>
      </label><br>
      <label>Nama:<br>
        <input type="text" name="nama"
               value="<?= htmlspecialchars($data['nama']) ?>"
               required>
      </label><br>
      <label>Email:<br>
        <input type="email" name="email"
               value="<?= htmlspecialchars($data['email']) ?>"
               required>
      </label><br>
      <label>Telepon:<br>
        <input type="tel" name="telepon"
               value="<?= htmlspecialchars($data['telepon']) ?>"
               required>
      </label><br><br>
      <button type="submit" class="button">Update</button>
    </form>
  </div>
</body>
</html>

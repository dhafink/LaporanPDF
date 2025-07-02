<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tambah Pendaftar</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <h1>Tambah Pendaftar</h1>
    <form action="simpan.php" method="post">
      <label>NRP:<br>
        <input type="text" name="nrp" placeholder="Masukkan NRP" required>
      </label><br>
      <label>Nama:<br>
        <input type="text" name="nama" placeholder="Masukkan nama lengkap" required>
      </label><br>
      <label>Email:<br>
        <input type="email" name="email" placeholder="contoh@mail.com" required>
      </label><br>
      <label>Telepon:<br>
        <input type="tel" name="telepon" placeholder="08xxxxxxxxxx" required>
      </label><br><br>
      <button type="submit" class="button green">Simpan</button>
    </form>
  </div>
</body>
</html>

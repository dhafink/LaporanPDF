<?php
include 'koneksi.php';

$nrp    = $_POST['nrp'];
$nama   = $_POST['nama'];
$email  = $_POST['email'];
$telepon= $_POST['telepon'];

// Jika ada hidden field nrp_lama → update, else insert
if (!empty($_POST['nrp_lama'])) {
    $nrp_lama = $_POST['nrp_lama'];
    $stmt = $mysqli->prepare(
      "UPDATE pendaftar 
         SET nrp=?, nama=?, email=?, telepon=?
       WHERE nrp=?"
    );
    $stmt->bind_param('sssss',
      $nrp, $nama, $email, $telepon, $nrp_lama
    );
} else {
    $stmt = $mysqli->prepare(
      "INSERT INTO pendaftar (nrp,nama,email,telepon)
       VALUES (?,?,?,?)"
    );
    $stmt->bind_param('ssss',
      $nrp, $nama, $email, $telepon
    );
}
$stmt->execute();
$stmt->close();

header('Location: index.php');
exit;
?>

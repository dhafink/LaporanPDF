<?php
include 'koneksi.php';
$nrp = $_GET['nrp'] ?? '';
if ($nrp) {
  $stmt = $mysqli->prepare("DELETE FROM pendaftar WHERE nrp=?");
  $stmt->bind_param('s', $nrp);
  $stmt->execute();
  $stmt->close();
}
header('Location: index.php');
exit;
?>

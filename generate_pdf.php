<?php
require 'vendor/autoload.php';
use Dompdf\Dompdf;
include 'koneksi.php';

// Ambil data pendaftar terakhir
$res = $mysqli->query(
  "SELECT * FROM pendaftar ORDER BY id DESC LIMIT 1"
);
$r = $res->fetch_assoc();

$html = '
  <h1>Bukti Pendaftaran Kelas 10 RKA</h1>
  <table cellpadding="5" cellspacing="0">
    <tr><td><strong>NRP</strong></td><td>' . htmlspecialchars($r['nrp']) . '</td></tr>
    <tr><td><strong>Nama</strong></td><td>' . htmlspecialchars($r['nama']) . '</td></tr>
    <tr><td><strong>Email</strong></td><td>' . htmlspecialchars($r['email']) . '</td></tr>
    <tr><td><strong>Telepon</strong></td><td>' . htmlspecialchars($r['telepon']) . '</td></tr>
    <tr><td><strong>Tanggal</strong></td><td>' . $r['tanggal_daftar'] . '</td></tr>
  </table>
';

$dompdf = new Dompdf();
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream('bukti_pendaftaran.pdf',['Attachment'=>1]);
exit;
?>

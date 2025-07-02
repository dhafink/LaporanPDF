<?php
// koneksi.php
$mysqli = new mysqli('localhost', 'root', '', 'pendaftaran_rka');
if ($mysqli->connect_error) {
    die('Koneksi gagal: ' . $mysqli->connect_error);
}
?>
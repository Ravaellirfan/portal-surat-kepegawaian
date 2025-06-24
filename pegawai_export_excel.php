<?php
require 'koneksi.php';
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename="pegawai.xls"');
$res = $conn->query('SELECT nama, jenis, mulai, selesai, penempatan, dinas FROM pegawai');
echo "<table border='1'><tr><th>Nama</th><th>Jenis</th><th>Mulai</th><th>Selesai</th><th>Penempatan</th><th>Dinas</th></tr>";
while($row = $res->fetch_assoc()) {
    echo "<tr><td>{$row['nama']}</td><td>{$row['jenis']}</td><td>{$row['mulai']}</td><td>{$row['selesai']}</td><td>{$row['penempatan']}</td><td>{$row['dinas']}</td></tr>";
}
echo "</table>";
?>

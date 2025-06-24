<?php
require 'koneksi.php';
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename="surat.xls"');
$res = $conn->query('SELECT nomor, kategori, tanggal, isi FROM surat');
echo "<table border='1'><tr><th>Nomor</th><th>Kategori</th><th>Tanggal</th><th>Isi</th></tr>";
while($row = $res->fetch_assoc()) {
    echo "<tr><td>{$row['nomor']}</td><td>{$row['kategori']}</td><td>{$row['tanggal']}</td><td>{$row['isi']}</td></tr>";
}
echo "</table>";
?>

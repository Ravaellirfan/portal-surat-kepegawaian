<?php
require 'koneksi.php';
header('Content-Type: application/json');

$nomor = $_POST['nomor'] ?? '';
$judul = $_POST['judul'] ?? '';
$kategori = $_POST['kategori'] ?? '';
$tanggal = $_POST['tanggal'] ?? '';
$isi = $_POST['isi'] ?? '';

if ($nomor && $judul && $kategori && $tanggal && $isi) {
    $stmt = $conn->prepare("INSERT INTO surat (nomor, judul, kategori, tanggal, isi) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param('sssss', $nomor, $judul, $kategori, $tanggal, $isi);
    $success = $stmt->execute();
    $stmt->close();
    echo json_encode(['success'=>$success]);
} else {
    echo json_encode(['success'=>false, 'message'=>'Data tidak lengkap']);
}
?>

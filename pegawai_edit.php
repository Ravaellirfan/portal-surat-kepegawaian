<?php
require 'koneksi.php';
header('Content-Type: application/json');
$id = $_POST['id'] ?? '';
$nama = trim($_POST['nama'] ?? '');
$jabatan = trim($_POST['jabatan'] ?? '');
$mulai = $_POST['mulai'] ?? '';
$waktu = $_POST['waktu'] ?? '';
$selesai = $_POST['selesai'] ?? '';
$tempat = trim($_POST['tempat'] ?? '');
$status = $_POST['status'] ?? '';
$kategori = $_POST['kategori'] ?? '';

if ($id && $nama) {
    $stmt = $conn->prepare('UPDATE pegawai SET nama=?, jenis=?, mulai=?, waktu=?, selesai=?, penempatan=?, status=?, kategori=? WHERE id=?');
    $stmt->bind_param('ssssssssi', $nama, $jabatan, $mulai, $waktu, $selesai, $tempat, $status, $kategori, $id);
    $success = $stmt->execute();
    $stmt->close();
    echo json_encode(['success'=>$success]);
} else {
    echo json_encode(['success'=>false, 'message'=>'Data tidak lengkap']);
}
?>

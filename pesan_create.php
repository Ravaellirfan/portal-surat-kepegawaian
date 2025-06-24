<?php
require 'koneksi.php';
header('Content-Type: application/json');

$nama = trim($_POST['nama'] ?? '');
$email = trim($_POST['email'] ?? '');
$pesan = trim($_POST['pesan'] ?? '');

if ($nama && $email && $pesan) {
    $stmt = $conn->prepare('INSERT INTO pesan (nama, email, pesan) VALUES (?, ?, ?)');
    $stmt->bind_param('sss', $nama, $email, $pesan);
    $success = $stmt->execute();
    $stmt->close();
    echo json_encode(['success'=>$success]);
} else {
    echo json_encode(['success'=>false, 'message'=>'Data tidak lengkap']);
}
?>

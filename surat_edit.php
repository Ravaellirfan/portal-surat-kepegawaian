<?php
require 'koneksi.php';
header('Content-Type: application/json');
$id = $_POST['id'] ?? '';
$isi = trim($_POST['isi'] ?? '');
if ($id && $isi) {
    $stmt = $conn->prepare('UPDATE surat SET isi=? WHERE id=?');
    $stmt->bind_param('si', $isi, $id);
    $success = $stmt->execute();
    $stmt->close();
    echo json_encode(['success'=>$success]);
} else {
    echo json_encode(['success'=>false, 'message'=>'Data tidak lengkap']);
}
?>

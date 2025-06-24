<?php
require 'koneksi.php';
header('Content-Type: application/json');
$id = $_POST['id'] ?? '';
$status = $_POST['status'] ?? 'aktif';
if ($id && in_array($status, ['aktif','selesai'])) {
    $stmt = $conn->prepare('UPDATE pegawai SET status=? WHERE id=?');
    $stmt->bind_param('si', $status, $id);
    $success = $stmt->execute();
    $stmt->close();
    echo json_encode(['success'=>$success]);
} else {
    echo json_encode(['success'=>false, 'message'=>'Data tidak lengkap']);
}
?>

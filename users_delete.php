<?php
require 'koneksi.php';
header('Content-Type: application/json');

$id = $_POST['id'] ?? 0;
if ($id) {
    $stmt = $conn->prepare('DELETE FROM users WHERE id=?');
    $stmt->bind_param('i', $id);
    $success = $stmt->execute();
    $stmt->close();
    echo json_encode(['success'=>$success]);
} else {
    echo json_encode(['success'=>false, 'message'=>'ID tidak ditemukan']);
}
?>

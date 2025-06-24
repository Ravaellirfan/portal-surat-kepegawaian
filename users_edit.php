<?php
require 'koneksi.php';
header('Content-Type: application/json');
$id = $_POST['id'] ?? '';
$username = trim($_POST['username'] ?? '');
$role = trim($_POST['role'] ?? 'user');
if ($id && $username && $role) {
    $stmt = $conn->prepare('UPDATE users SET username=?, role=? WHERE id=?');
    $stmt->bind_param('ssi', $username, $role, $id);
    $success = $stmt->execute();
    $stmt->close();
    echo json_encode(['success'=>$success]);
} else {
    echo json_encode(['success'=>false, 'message'=>'Data tidak lengkap']);
}
?>

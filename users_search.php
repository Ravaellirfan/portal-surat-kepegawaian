<?php
require 'koneksi.php';
header('Content-Type: application/json');

$q = $_GET['q'] ?? '';
$data = [];
if ($q) {
    $stmt = $conn->prepare("SELECT id, username, role FROM users WHERE username LIKE ? OR role LIKE ?");
    $like = "%$q%";
    $stmt->bind_param('ss', $like, $like);
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    $stmt->close();
}
echo json_encode($data);
?>

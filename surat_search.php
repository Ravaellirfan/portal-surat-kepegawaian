<?php
require 'koneksi.php';
header('Content-Type: application/json');

$q = $_GET['q'] ?? '';
$data = [];
if ($q) {
    $stmt = $conn->prepare("SELECT * FROM surat WHERE nomor LIKE ? OR judul LIKE ? OR kategori LIKE ? OR isi LIKE ?");
    $like = "%$q%";
    $stmt->bind_param('ssss', $like, $like, $like, $like);
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    $stmt->close();
}
echo json_encode($data);
?>

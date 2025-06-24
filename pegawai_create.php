<?php
require 'koneksi.php';
header('Content-Type: application/json');

$nama = $_POST['nama'] ?? '';
$jenis = $_POST['jabatan'] ?? ($_POST['jenis'] ?? '');
$mulai = $_POST['mulai'] ?? '';
$selesai = $_POST['selesai'] ?? '';
$penempatan = $_POST['tempat'] ?? ($_POST['penempatan'] ?? '');
$dinas = $_POST['dinas'] ?? '';
$status = $_POST['status'] ?? 'aktif'; // status: aktif/selesai

// Tambahkan simpan waktu dan kategori jika dikirim
$waktu = $_POST['waktu'] ?? null;
$kategori = $_POST['kategori'] ?? null;

$fileName = '';
if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
    $uploadDir = __DIR__ . '/uploads/';
    if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);
    $ext = strtolower(pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION));
    if ($ext === 'pdf') {
        $fileName = uniqid('surat_', true) . '.pdf';
        move_uploaded_file($_FILES['file']['tmp_name'], $uploadDir . $fileName);
    }
}

if ($nama && $jenis && $mulai && $selesai && $penempatan && $dinas) {
    // Cek overlap: nama & tanggal sudah ada (status aktif)
    $stmt = $conn->prepare("SELECT COUNT(*) FROM pegawai WHERE nama=? AND status='aktif' AND ((? BETWEEN mulai AND selesai) OR (? BETWEEN mulai AND selesai) OR (? <= mulai AND ? >= selesai))");
    $stmt->bind_param('sssss', $nama, $mulai, $selesai, $mulai, $selesai);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();
    if ($count > 0) {
        echo json_encode(['success'=>false, 'message'=>'Pegawai sudah memiliki tugas aktif pada tanggal tersebut.']);
        exit;
    }
    $stmt = $conn->prepare("INSERT INTO pegawai (nama, jenis, mulai, waktu, selesai, penempatan, dinas, status, kategori, file) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param('ssssssssss', $nama, $jenis, $mulai, $waktu, $selesai, $penempatan, $dinas, $status, $kategori, $fileName);
    $success = $stmt->execute();
    $stmt->close();
    echo json_encode(['success'=>$success]);
} else {
    echo json_encode(['success'=>false, 'message'=>'Data tidak lengkap']);
}
// Jika ingin simpan kategori dan waktu, tambahkan di sini dan di database
?>

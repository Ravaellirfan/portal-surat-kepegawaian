<?php
require 'koneksi.php';
session_start();

$username = trim($_POST['username'] ?? '');
$password = trim($_POST['password'] ?? '');

if ($username && $password) {
    $stmt = $conn->prepare('SELECT id, password, role FROM users WHERE username=?');
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $hash, $role);
        $stmt->fetch();
        if (password_verify($password, $hash)) {
            $_SESSION['user_id'] = $id;
            $_SESSION['role'] = $role;
            if ($role === 'admin') {
                header('Location: admin.html');
                exit;
            } elseif ($role === 'user') {
                header('Location: user.html');
                exit;
            }
        }
    }
    $stmt->close();
    // Jika gagal login, redirect ke login.html dengan pesan error
    header('Location: login.html?error=1');
    exit;
} else {
    header('Location: login.html?error=2');
    exit;
}
?>

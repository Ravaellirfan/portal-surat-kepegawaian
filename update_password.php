<?php
require 'koneksi.php';

// Hash baru untuk admin dan user
$default_passwords = [
    'admin' => password_hash('admin123', PASSWORD_BCRYPT),
    'user' => password_hash('user123', PASSWORD_BCRYPT)
];

foreach ($default_passwords as $username => $hash) {
    $stmt = $conn->prepare('UPDATE users SET password=? WHERE username=?');
    $stmt->bind_param('ss', $hash, $username);
    if ($stmt->execute()) {
        echo "Password untuk $username berhasil diupdate!<br>";
    } else {
        echo "Gagal update password untuk $username: " . $stmt->error . "<br>";
    }
    $stmt->close();
}
?>

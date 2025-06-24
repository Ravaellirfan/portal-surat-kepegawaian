<?php
// Jalankan file ini di browser untuk mendapatkan hash password
// Ganti 'admin123' dan 'user123' sesuai kebutuhan

echo "admin: ", password_hash('admin123', PASSWORD_BCRYPT), "<br>";
echo "user: ", password_hash('user123', PASSWORD_BCRYPT), "<br>";
?>

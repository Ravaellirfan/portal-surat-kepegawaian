<?php
require 'koneksi.php';

$result = $conn->query('SELECT username, password FROM users');
if ($result->num_rows > 0) {
    echo '<table border="1"><tr><th>Username</th><th>Password Hash</th></tr>';
    while ($row = $result->fetch_assoc()) {
        echo '<tr><td>' . htmlspecialchars($row['username']) . '</td><td>' . htmlspecialchars($row['password']) . '</td></tr>';
    }
    echo '</table>';
} else {
    echo 'Tabel users kosong.';
}
?>

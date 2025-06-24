<?php
require 'koneksi.php';
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename="users.xls"');
$res = $conn->query('SELECT username, role FROM users');
echo "<table border='1'><tr><th>Username</th><th>Role</th></tr>";
while($row = $res->fetch_assoc()) {
    echo "<tr><td>{$row['username']}</td><td>{$row['role']}</td></tr>";
}
echo "</table>";
?>

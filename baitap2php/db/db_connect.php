<?php
// File: db_connect.php
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'QL_BAN_SUA';

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}
mysqli_set_charset($conn, 'utf8');
?>
<?php
// bai1_hang_sua
require_once 'db/db_connect.php';

$sql = "SELECT * FROM hang_sua";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Bài 1: Thông tin hãng sữa</title>
    <style>
        table { border-collapse: collapse; width: 100%; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        h1 { color: #0066cc; text-align: center; }
    </style>
</head>
<body>
    <h1>THÔNG TIN HÃNG SỮA</h1>
    <table>
        <tr>
            <th>Mã HS</th>
            <th>Tên hãng sữa</th>
            <th>Địa chỉ</th>
            <th>Điện thoại</th>
            <th>Email</th>
        </tr>
        <?php while($row = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><?= $row['ma_hang_sua'] ?></td>
            <td><?= $row['ten_hang_sua'] ?></td>
            <td><?= $row['dia_chi'] ?></td>
            <td><?= $row['dien_thoai'] ?></td>
            <td><?= $row['email'] ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>

<?php mysqli_close($conn); ?>
<?php
// bai3_khach_hang_empty_gender
require_once 'db/db_connect.php';

$sql = "SELECT * FROM khach_hang";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Bài 3: Khách hàng (giới tính rỗng)</title>
    <style>
        table { border-collapse: collapse; width: 100%; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; }
        th { background-color: #f2f2f2; }
        h1 { color: #0066cc; text-align: center; }
    </style>
</head>
<body>
    <h1>THÔNG TIN KHÁCH HÀNG</h1>
    <table>
        <tr>
            <th>Mã KH</th>
            <th>Tên khách hàng</th>
            <th>Giới tính</th>
            <th>Địa chỉ</th>
            <th>Số điện thoại</th>
        </tr>
        <?php while($row = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><?= $row['ma_khach_hang'] ?></td>
            <td><?= $row['ten_khach_hang'] ?></td>
            <td></td> <!-- Empty gender column -->
            <td><?= $row['dia_chi'] ?></td>
            <td><?= $row['dien_thoai'] ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>

<?php mysqli_close($conn); ?>
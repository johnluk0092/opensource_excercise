<?php
// bai4_sua_phan_trang
require_once 'db/db_connect.php';

$rows_per_page = 5;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $rows_per_page;

$total_rows_result = mysqli_query($conn, "SELECT COUNT(*) as total FROM sua");
$total_rows = mysqli_fetch_assoc($total_rows_result)['total'];
$total_pages = ceil($total_rows / $rows_per_page);

$sql = "SELECT s.*, hs.ten_hang_sua, ls.ten_loai 
        FROM sua s
        JOIN hang_sua hs ON s.ma_hang_sua = hs.ma_hang_sua
        JOIN loai_sua ls ON s.ma_loai_sua = ls.ma_loai_sua
        LIMIT $offset, $rows_per_page";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Bài 4: Sữa (phân trang)</title>
    <style>
        table { border-collapse: collapse; width: 100%; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; }
        th { background-color: #f2f2f2; }
        h1 { color: #0066cc; text-align: center; }
        .pagination { margin-top: 20px; text-align: center; }
        .pagination a { 
            display: inline-block;
            padding: 8px 16px;
            text-decoration: none;
            border: 1px solid #ddd;
            margin: 0 4px;
        }
        .pagination a.active {
            background-color: #4CAF50;
            color: white;
            border: 1px solid #4CAF50;
        }
        .pagination a:hover:not(.active) {
            background-color: #ddd;
        }
    </style>
</head>
<body>
    <h1>THÔNG TIN SỮA</h1>
    <table>
        <tr>
            <th>Số TT</th>
            <th>Tên sữa</th>
            <th>Hãng sữa</th>
            <th>Loại sữa</th>
            <th>Trọng lượng</th>
            <th>Đơn giá</th>
        </tr>
        <?php
        $count = $offset + 1;
        while($row = mysqli_fetch_assoc($result)):
        ?>
        <tr>
            <td><?= $count ?></td>
            <td><?= $row['ten_sua'] ?></td>
            <td><?= $row['ten_hang_sua'] ?></td>
            <td><?= $row['ten_loai'] ?></td>
            <td><?= $row['trong_luong'] ?> gram</td>
            <td><?= number_format($row['don_gia'], 0, ',', '.') ?> VNĐ</td>
        </tr>
        <?php
        $count++;
        endwhile;
        ?>
    </table>

    <div class="pagination">
        <?php for ($i = 1; $i <= $total_pages; $i++): ?>
            <a href="?page=<?= $i ?>"<?= ($page == $i) ? " class='active'" : "" ?>><?= $i ?></a>
        <?php endfor; ?>
    </div>
</body>
</html>

<?php mysqli_close($conn); ?>
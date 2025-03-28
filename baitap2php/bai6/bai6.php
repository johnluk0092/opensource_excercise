<?php
// bai6a_danh_sach_sua
require_once '../db/db_connect.php';

$sql = "SELECT s.*, hs.ten_hang_sua FROM sua s JOIN hang_sua hs ON s.ma_hang_sua = hs.ma_hang_sua";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Bài 6: Danh sách sữa</title>
    <style>
        .product-container { 
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-top: 20px;
            justify-content: center;
        }
        .product-card {
            border: 1px solid #ddd;
            padding: 15px;
            width: 200px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            transition: all 0.3s;
        }
        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0,0,0,0.15);
        }
        .product-name {
            font-weight: bold;
            margin-bottom: 10px;
            color: #0066cc;
        }
        .product-info {
            font-size: 14px;
            color: #555;
        }
        a { 
            text-decoration: none;
            color: inherit;
        }
        h1 { color: #0066cc; text-align: center; }
    </style>
</head>
<body>
    <h1>THÔNG TIN CÁC SẢN PHẨM</h1>
    
    <div class="product-container">
        <?php while($row = mysqli_fetch_assoc($result)): ?>
        <a href="bai6b_chi_tiet_sua.php?id=<?= $row['ma_sua'] ?>">
            <div class="product-card">
                <div class="product-name"><?= $row['ten_sua'] ?></div>
                <div class="product-info"><?= $row['trong_luong'] ?> gr - <?= number_format($row['don_gia'], 0, ',', '.') ?> VNĐ</div>
            </div>
        </a>
        <?php endwhile; ?>
    </div>
</body>
</html>

<?php mysqli_close($conn); ?>
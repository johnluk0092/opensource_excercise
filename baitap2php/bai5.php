<?php
// bai5_sua_dang_cot
require_once 'db/db_connect.php';

$sql = "SELECT s.*, hs.ten_hang_sua FROM sua s JOIN hang_sua hs ON s.ma_hang_sua = hs.ma_hang_sua";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Bài 5: Sữa (dạng cột)</title>
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
            transition: transform 0.3s;
        }
        .product-card:hover {
            transform: translateY(-5px);
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
        h1 { color: #0066cc; text-align: center; }
    </style>
</head>
<body>
    <h1>THÔNG TIN CÁC SẢN PHẨM</h1>
    
    <div class="product-container">
        <?php while($row = mysqli_fetch_assoc($result)): ?>
        <div class="product-card">
            <div class="product-name"><?= $row['ten_sua'] ?></div>
            <div class="product-info"><?= $row['trong_luong'] ?> gr - <?= number_format($row['don_gia'], 0, ',', '.') ?> VNĐ</div>
        </div>
        <?php endwhile; ?>
    </div>
</body>
</html>

<?php mysqli_close($conn); ?>
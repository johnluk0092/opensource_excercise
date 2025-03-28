<?php
// bai6b_chi_tiet_sua
require_once '../db/db_connect.php';

$product_id = $_GET['id'] ?? die('Không tìm thấy sản phẩm');

$sql = "SELECT s.*, hs.ten_hang_sua 
        FROM sua s 
        JOIN hang_sua hs ON s.ma_hang_sua = hs.ma_hang_sua
        WHERE s.ma_sua = '$product_id'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 0) {
    die('Không tìm thấy sản phẩm');
}

$product = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Bài 6: Chi tiết sữa</title>
    <style>
        .product-detail {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ddd;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            background-color: #f9f9f9;
        }
        .product-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
            color: #0066cc;
        }
        .product-info {
            margin-bottom: 15px;
            line-height: 1.6;
        }
        .back-link {
            display: inline-block;
            margin-top: 20px;
            padding: 8px 16px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s;
        }
        .back-link:hover {
            background-color: #45a049;
        }
        strong {
            color: #333;
        }
    </style>
</head>
<body>
    <div class="product-detail">
        <div class="product-title"><?= $product['ten_sua'] ?> - <?= $product['ten_hang_sua'] ?></div>
        
        <div class="product-info">
            <strong>Thành phần dinh dưỡng:</strong><br>
            <?= $product['tp_dinh_duong'] ?>
        </div>
        
        <div class="product-info">
            <strong>Lợi ích:</strong><br>
            <?= $product['loi_ich'] ?>
        </div>
        
        <div class="product-info">
            <strong>Trọng lượng:</strong> <?= $product['trong_luong'] ?> gr - 
            <strong>Đơn giá:</strong> <?= number_format($product['don_gia'], 0, ',', '.') ?> VNĐ
        </div>
        
        <a href="bai6.php" class="back-link">Quay về</a>
    </div>
</body>
</html>

<?php mysqli_close($conn); ?>
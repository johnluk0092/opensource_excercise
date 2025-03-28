<?php
// File: bai7_xem_ket_qua.php
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
    <title>Kết quả thêm sữa mới</title>
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
        .success-message {
            color: green;
            font-weight: bold;
            margin-bottom: 20px;
            padding: 10px;
            background-color: #eeffee;
            border: 1px solid #ccffcc;
            border-radius: 4px;
            text-align: center;
        }
        strong {
            color: #333;
        }
        .product-image {
            max-width: 200px;
            max-height: 200px;
            display: block;
            margin: 10px auto;
        }
    </style>
</head>
<body>
    <div class="product-detail">
        <div class="success-message">Thêm sản phẩm mới thành công!</div>
        
        <div class="product-title"><?= $product['ten_sua'] ?> - <?= $product['ten_hang_sua'] ?></div>
        
        <?php if (!empty($product['hinh'])): ?>
        <img src="uploads/<?= $product['hinh'] ?>" alt="<?= $product['ten_sua'] ?>" class="product-image">
        <?php endif; ?>
        
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
    </div>
</body>
</html>

<?php mysqli_close($conn); ?>
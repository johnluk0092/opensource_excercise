<?php
// bai7_them_sua_moi
require_once '../db/db_connect.php';

// Process form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ma_sua = $_POST['ma_sua'];
    $ten_sua = $_POST['ten_sua'];
    $ma_hang_sua = $_POST['ma_hang_sua'];
    $ma_loai_sua = $_POST['ma_loai_sua'];
    $trong_luong = $_POST['trong_luong'];
    $don_gia = $_POST['don_gia'];
    $tp_dinh_duong = $_POST['tp_dinh_duong'];
    $loi_ich = $_POST['loi_ich'];
    
    // Handle file upload
    $hinh = '';
    if (isset($_FILES['hinh']) && $_FILES['hinh']['error'] == 0) {
        $target_dir = "uploads/";
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true);
        }
        $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
        if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
            $hinh = basename($_FILES["hinh"]["name"]);
        }
    }
    
    // Insert new product
    $sql = "INSERT INTO sua (ma_sua, ten_sua, ma_hang_sua, ma_loai_sua, trong_luong, don_gia, tp_dinh_duong, loi_ich, hinh)
            VALUES ('$ma_sua', '$ten_sua', '$ma_hang_sua', '$ma_loai_sua', $trong_luong, $don_gia, '$tp_dinh_duong', '$loi_ich', '$hinh')";
    
    if (mysqli_query($conn, $sql)) {
        header("Location: bai7_xem_ket_qua.php?id=$ma_sua");
        exit();
    } else {
        $error = "Lỗi: " . mysqli_error($conn);
    }
}

// Get brands and types for dropdowns
$brands = mysqli_query($conn, "SELECT * FROM hang_sua");
$types = mysqli_query($conn, "SELECT * FROM loai_sua");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Bài 7: Thêm sữa mới</title>
    <style>
        .form-container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ddd;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            background-color: #f9f9f9;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #333;
        }
        input[type="text"], 
        input[type="number"], 
        select, 
        textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        textarea {
            height: 100px;
            resize: vertical;
        }
        .submit-btn {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }
        .submit-btn:hover {
            background-color: #45a049;
        }
        .error {
            color: red;
            margin-bottom: 15px;
            padding: 10px;
            background-color: #ffeeee;
            border: 1px solid #ffcccc;
            border-radius: 4px;
        }
        h1 {
            color: #0066cc;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>THÊM SỮA MỚI</h1>
        
        <?php if (isset($error)): ?>
            <div class="error"><?= $error ?></div>
        <?php endif; ?>
        
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="ma_sua">Mã sữa:</label>
                <input type="text" id="ma_sua" name="ma_sua" required>
            </div>
            
            <div class="form-group">
                <label for="ten_sua">Tên sữa:</label>
                <input type="text" id="ten_sua" name="ten_sua" required>
            </div>
            
            <div class="form-group">
                <label for="ma_hang_sua">Hãng sữa:</label>
                <select id="ma_hang_sua" name="ma_hang_sua" required>
                    <option value="">-- Chọn hãng sữa --</option>
                    <?php while($brand = mysqli_fetch_assoc($brands)): ?>
                        <option value="<?= $brand['ma_hang_sua'] ?>"><?= $brand['ten_hang_sua'] ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            
            <div class="form-group">
                <label for="ma_loai_sua">Loại sữa:</label>
                <select id="ma_loai_sua" name="ma_loai_sua" required>
                    <option value="">-- Chọn loại sữa --</option>
                    <?php while($type = mysqli_fetch_assoc($types)): ?>
                        <option value="<?= $type['ma_loai_sua'] ?>"><?= $type['ten_loai'] ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            
            <div class="form-group">
                <label for="trong_luong">Trọng lượng (gr hoặc ml):</label>
                <input type="number" id="trong_luong" name="trong_luong" required min="1">
            </div>
            
            <div class="form-group">
                <label for="don_gia">Đơn giá (VNĐ):</label>
                <input type="number" id="don_gia" name="don_gia" required min="1">
            </div>
            
            <div class="form-group">
                <label for="tp_dinh_duong">Thành phần dinh dưỡng:</label>
                <textarea id="tp_dinh_duong" name="tp_dinh_duong" required></textarea>
            </div>
            
            <div class="form-group">
                <label for="loi_ich">Lợi ích:</label>
                <textarea id="loi_ich" name="loi_ich" required></textarea>
            </div>
            
            <div class="form-group">
                <label for="hinh">Hình ảnh:</label>
                <input type="file" id="hinh" name="hinh">
            </div>
            
            <button type="submit" class="submit-btn">Thêm mới</button>
        </form>
    </div>
</body>
</html>

<?php mysqli_close($conn); ?>
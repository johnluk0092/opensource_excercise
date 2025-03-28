<!DOCTYPE html>
<html>
<head>
    <title>Bài 28: Quản lý ảnh</title>
    <style>
        body { font-family: Arial; margin: 20px; }
        .container { width: 800px; margin: 0 auto; padding: 20px; border: 1px solid #ddd; }
        .gallery { display: flex; flex-wrap: wrap; margin-top: 20px; }
        .image-item { margin: 10px; text-align: center; }
        .image-item img { max-width: 150px; max-height: 150px; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Quản lý ảnh</h2>
        <form method="post" enctype="multipart/form-data">
            <input type="file" name="image" accept="image/*" required>
            <input type="submit" name="upload" value="Tải lên">
        </form>
        
        <div class="gallery">
            <?php
            $uploadDir = "uploads/";
            if (!file_exists($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }
            
            // Xử lý upload
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['upload'])) {
                $targetFile = $uploadDir . basename($_FILES["image"]["name"]);
                
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
                    echo "<p>Ảnh đã được tải lên thành công.</p>";
                } else {
                    echo "<p>Có lỗi xảy ra khi tải lên ảnh.</p>";
                }
            }
            
            // Hiển thị gallery
            $files = glob($uploadDir . "*.{jpg,jpeg,png,gif}", GLOB_BRACE);
            foreach ($files as $file) {
                echo '<div class="image-item">';
                echo '<img src="' . $file . '" alt="' . basename($file) . '">';
                echo '<p>' . basename($file) . '</p>';
                echo '</div>';
            }
            ?>
        </div>
    </div>
</body>
</html>
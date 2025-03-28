<!DOCTYPE html>
<html>
<head>
    <title>Bài 27: Chọn và hiển thị ảnh</title>
    <style>
        body { font-family: Arial; margin: 20px; }
        .container { width: 500px; margin: 0 auto; padding: 20px; border: 1px solid #ddd; }
        select { width: 100%; padding: 8px; margin: 10px 0; }
        img { max-width: 100%; margin-top: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Chọn và hiển thị ảnh</h2>
        <form method="post">
            <select name="imageFile" onchange="this.form.submit()">
                <option value="">-- Chọn ảnh --</option>
                <?php
                $imageDir = "images/";
                if (file_exists($imageDir)) {
                    $files = scandir($imageDir);
                    foreach ($files as $file) {
                        if ($file != "." && $file != "..") {
                            $selected = (isset($_POST['imageFile']) && $_POST['imageFile'] == $file) ? 'selected' : '';
                            echo "<option value='$file' $selected>$file</option>";
                        }
                    }
                } else {
                    echo "<option value=''>Thư mục images không tồn tại</option>";
                }
                ?>
            </select>
        </form>
        
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['imageFile'])) {
            $imageFile = $_POST['imageFile'];
            echo "<img src='images/$imageFile' alt='$imageFile'>";
        }
        ?>
    </div>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
    <title>Bài 26: Thuộc tính tập tin</title>
    <style>
        body { font-family: Arial; margin: 20px; }
        .container { width: 500px; margin: 0 auto; padding: 20px; border: 1px solid #ddd; }
        table { width: 100%; margin-top: 20px; }
        td { padding: 8px; }
    </style>
</head>
<body>
    <div class="container">
        <h2>THUỘC TÍNH CỦA TẬP TIN</h2>
        <form method="post" enctype="multipart/form-data">
            <input type="file" name="fileToUpload" id="fileToUpload" required>
            <input type="submit" value="Xem thuộc tính" name="submit">
        </form>
        
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $target_dir = "uploads/";
            if (!file_exists($target_dir)) {
                mkdir($target_dir, 0777, true);
            }
            
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "<h3>Thuộc tính của tập tin:</h3>";
                echo "<table border='1'>";
                echo "<tr><td>Tên file:</td><td>" . basename($_FILES["fileToUpload"]["name"]) . "</td></tr>";
                echo "<tr><td>Loại file:</td><td>" . $_FILES["fileToUpload"]["type"] . "</td></tr>";
                echo "<tr><td>Kích cỡ:</td><td>" . ($_FILES["fileToUpload"]["size"] / 1024) . " KB</td></tr>";
                echo "</table>";
            } else {
                echo "Có lỗi xảy ra khi tải lên file.";
            }
        }
        ?>
    </div>
</body>
</html>
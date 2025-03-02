<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài Tập 6</title>
</head>
<body>
    <div class="container">
        <h1>Hiển thị sách</h1>
        <?php
        echo "<table border='1'>";
        echo "<tr><th>STT</th><th>Tên sách</th><th>Nội dung sách</th></tr>";

        for ($i = 1; $i <= 100; $i++) {
            echo "<tr><td>$i</td><td>Tensach$i</td><td>Noidung$i</td></tr>";
        }

        echo "</table>";
        ?>



</body>
</html>
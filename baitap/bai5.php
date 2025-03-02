<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài Tập 5</title>
</head>
<body>
    <div class="container">
        <h1>Hiển thị số chẵn (in đậm), số lẽ (in thường)</h1>
        <?php
        for ($i = 1; $i <= 100; $i++) {
            if ($i % 2 == 0) {
                echo "<b>$i</b> ";
            } else {
                echo "$i ";
            }
        }
        ?>


</body>
</html>
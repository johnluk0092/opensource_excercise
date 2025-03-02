<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài Tập 4</title>
</head>
<body>
    <div class="container">
        <h1>Hiển thị bảng</h1>
    <?php
    echo "<table border='1'>";
    echo "<tr><th>Number (i)</th><th>Square (i²)</th></tr>";

    for ($i = 0; $i <= 10; $i++) {
        echo "<tr><td>$i</td><td>" . ($i * $i) . "</td></tr>";
    }

    echo "</table>";
    ?>

</body>
</html>
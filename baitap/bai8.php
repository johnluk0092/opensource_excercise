<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài Tập 8</title>
</head>
<body>
    <div class="container">
        <h1>Bảng cửu chương từ 2 đến 10</h1>
        <?php
        echo "<table border='1' cellpadding='5' cellspacing='0'>";
        // Table header
        echo "<tr><th>*</th>";
        for ($i = 2; $i <= 10; $i++) {
            echo "<th>$i</th>";
        }
        echo "</tr>";

        // Table rows
        for ($i = 2; $i <= 10; $i++) {
            echo "<tr><th>$i</th>"; // First column with row number
            for ($j = 2; $j <= 10; $j++) {
                echo "<td>" . ($i * $j) . "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
        ?>



</body>
</html>
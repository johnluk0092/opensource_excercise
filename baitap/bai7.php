<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài Tập 7</title>
</head>
<body>
    <div class="container">
        <h1>List box</h1>
        <?php
        echo "<select>";
        for ($year = 1900; $year <= date("Y"); $year++) {
            echo "<option value='$year'>$year</option>";
        }
        echo "</select>";
        ?>




</body>
</html>
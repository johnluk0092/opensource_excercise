<!DOCTYPE html>
<html>
<head>
    <title>Diện Tích và Chu Vi Hình Tròn</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; }
        .container { width: 400px; margin: auto; padding: 20px; border: 1px solid black; background-color: #FFD98A; }
        input, button { margin: 10px; padding: 5px; width: 100px; }
    </style>
</head>
<body>
    <div class="container">
        <h2>DIỆN TÍCH VÀ CHU VI HÌNH TRÒN</h2>
        <form method="post">
            <label>Bán kính:</label>
            <input type="number" name="radius" value="<?= isset($_POST['radius']) ? $_POST['radius'] : '' ?>" required><br>
            <label>Diện tích:</label>
            <input type="text" value="<?= isset($_POST['radius']) ? round(pi() * pow($_POST['radius'], 2), 2) : '' ?>" readonly><br>
            <label>Chu vi:</label>
            <input type="text" value="<?= isset($_POST['radius']) ? round(2 * pi() * $_POST['radius'], 2) : '' ?>" readonly><br>
            <button type="submit">Tính</button>
        </form>
    </div>
</body>
</html>

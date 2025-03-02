<!DOCTYPE html>
<html>
<head>
    <title>Diện Tích Hình Chữ Nhật</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; }
        .container { width: 400px; margin: auto; padding: 20px; border: 1px solid black; background-color: #FFD98A; }
        input, button { margin: 10px; padding: 5px; width: 100px; }
    </style>
</head>
<body>
    <div class="container">
        <h2>DIỆN TÍCH HÌNH CHỮ NHẬT</h2>
        <form method="post">
            <label>Chiều dài:</label>
            <input type="number" name="length" value="<?= isset($_POST['length']) ? $_POST['length'] : '' ?>" required><br>
            <label>Chiều rộng:</label>
            <input type="number" name="width" value="<?= isset($_POST['width']) ? $_POST['width'] : '' ?>" required><br>
            <label>Diện tích:</label>
            <input type="text" value="<?= isset($_POST['length']) && isset($_POST['width']) ? $_POST['length'] * $_POST['width'] : '' ?>" readonly><br>
            <button type="submit">Tính</button>
        </form>
    </div>
</body>
</html>

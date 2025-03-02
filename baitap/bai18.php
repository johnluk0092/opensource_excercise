<!DOCTYPE html>
<html>
<head>
    <title>Kết Quả Thi Đại Học</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; }
        .container { width: 400px; margin: auto; padding: 20px; border: 1px solid black; background-color: #F2A1C3; }
        input, button { margin: 10px; padding: 5px; width: 100px; }
    </style>
</head>
<body>
    <div class="container">
        <h2>KẾT QUẢ THI ĐẠI HỌC</h2>
        <form method="post">
            <label>Toán:</label>
            <input type="number" step="0.1" name="math" value="<?= isset($_POST['math']) ? $_POST['math'] : '' ?>" required><br>
            <label>Lý:</label>
            <input type="number" step="0.1" name="physics" value="<?= isset($_POST['physics']) ? $_POST['physics'] : '' ?>" required><br>
            <label>Hóa:</label>
            <input type="number" step="0.1" name="chemistry" value="<?= isset($_POST['chemistry']) ? $_POST['chemistry'] : '' ?>" required><br>
            <label>Điểm chuẩn:</label>
            <input type="number" step="0.1" name="benchmark" value="<?= isset($_POST['benchmark']) ? $_POST['benchmark'] : '' ?>" required><br>
            <label>Tổng điểm:</label>
            <input type="text" value="<?= isset($_POST['math']) && isset($_POST['physics']) && isset($_POST['chemistry']) ? ($total = $_POST['math'] + $_POST['physics'] + $_POST['chemistry']) : '' ?>" readonly><br>
            <label>Kết quả thi:</label>
            <input type="text" value="<?php 
                if (isset($total) && isset($_POST['benchmark'])) {
                    if ($total >= $_POST['benchmark'] && $_POST['math'] > 0 && $_POST['physics'] > 0 && $_POST['chemistry'] > 0) {
                        echo 'Đậu';
                    } else {
                        echo 'Rớt';
                    }
                }
            ?>" readonly><br>
            <button type="submit">Xem kết quả</button>
        </form>
    </div>
</body>
</html>

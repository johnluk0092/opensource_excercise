<!DOCTYPE html>
<html>
<head>
    <title>Kết Quả Học Tập</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; }
        .container { width: 400px; margin: auto; padding: 20px; border: 1px solid black; background-color: #F2A1C3; }
        input, button { margin: 10px; padding: 5px; width: 100px; }
    </style>
</head>
<body>
    <div class="container">
        <h2>KẾT QUẢ HỌC TẬP</h2>
        <form method="post">
            <label>Điểm HK1:</label>
            <input type="number" step="0.1" name="hk1" value="<?= isset($_POST['hk1']) ? $_POST['hk1'] : '' ?>" required><br>
            <label>Điểm HK2:</label>
            <input type="number" step="0.1" name="hk2" value="<?= isset($_POST['hk2']) ? $_POST['hk2'] : '' ?>" required><br>
            <label>Điểm trung bình:</label>
            <input type="text" value="<?= isset($_POST['hk1']) && isset($_POST['hk2']) ? ($dtb = round(($_POST['hk1'] + $_POST['hk2'] * 2) / 3, 2)) : '' ?>" readonly><br>
            <label>Kết quả:</label>
            <input type="text" value="<?= isset($dtb) ? ($dtb >= 5 ? 'Được lên lớp' : 'Ở lại lớp') : '' ?>" readonly><br>
            <label>Xếp loại học lực:</label>
            <input type="text" value="<?php 
                if (isset($dtb)) {
                    if ($dtb >= 8) echo 'Giỏi';
                    elseif ($dtb >= 6.5) echo 'Khá';
                    elseif ($dtb >= 5) echo 'Trung bình';
                    else echo 'Yếu';
                }
            ?>" readonly><br>
            <button type="submit">Xem kết quả</button>
        </form>
    </div>
</body>
</html>

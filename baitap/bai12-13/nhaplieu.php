<!DOCTYPE html>
<html>
<head>
    <title>Phép tính trên hai số</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; }
        .container { width: 400px; margin: auto; border: 1px solid black; padding: 20px; }
        input, button { margin: 10px; padding: 5px; }
    </style>
</head>
<body>
    <div class="container">
        <h2>PHÉP TÍNH TRÊN HAI SỐ</h2>
        <form action="ketqua.php" method="post">
            <label>Chọn phép tính:</label><br>
            <input type="radio" name="operation" value="add" required> Cộng
            <input type="radio" name="operation" value="sub"> Trừ
            <input type="radio" name="operation" value="mul"> Nhân
            <input type="radio" name="operation" value="div"> Chia
            <br><br>
            <label>Số thứ nhất:</label>
            <input type="number" name="num1" required><br>
            <label>Số thứ hai:</label>
            <input type="number" name="num2" required><br>
            <button type="submit">Tính</button>
        </form>
    </div>
</body>
</html>


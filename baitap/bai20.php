<!DOCTYPE html>
<html>
<head>
    <title>Bài 20: Tìm số lớn hơn</title>
    <style>
        body { font-family: Arial; margin: 20px; }
        .container { width: 400px; margin: 0 auto; padding: 20px; border: 1px solid #ddd; }
        table { width: 100%; }
        input[type="number"] { width: 100%; padding: 8px; }
        input[type="submit"] { padding: 8px 16px; background: #4CAF50; color: white; border: none; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Tìm số lớn hơn</h2>
        <form method="post">
            <table>
                <tr>
                    <td>Số thứ nhất:</td>
                    <td><input type="number" name="num1" required></td>
                </tr>
                <tr>
                    <td>Số thứ hai:</td>
                    <td><input type="number" name="num2" required></td>
                </tr>
                <tr>
                    <td>Số lớn hơn:</td>
                    <td><input type="text" name="result" readonly value="<?php
                        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                            $num1 = $_POST['num1'];
                            $num2 = $_POST['num2'];
                            echo ($num1 > $num2) ? $num1 : $num2;
                        }
                    ?>"></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" name="find" value="Tìm"></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>
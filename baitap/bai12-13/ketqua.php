<!DOCTYPE html>
<html>
<head>
    <title>Kết quả phép tính</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; }
        .container { width: 400px; margin: auto; border: 1px solid black; padding: 20px; }
        .back-link { color: red; cursor: pointer; text-decoration: underline; }
    </style>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</head>
<body>
    <div class="container">
        <h2>PHÉP TÍNH TRÊN HAI SỐ</h2>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $num1 = $_POST["num1"];
            $num2 = $_POST["num2"];
            $operation = $_POST["operation"];
            $result = 0;
            $operation_text = "";

            switch ($operation) {
                case "add":
                    $result = $num1 + $num2;
                    $operation_text = "Cộng";
                    break;
                case "sub":
                    $result = $num1 - $num2;
                    $operation_text = "Trừ";
                    break;
                case "mul":
                    $result = $num1 * $num2;
                    $operation_text = "Nhân";
                    break;
                case "div":
                    if ($num2 != 0) {
                        $result = $num1 / $num2;
                        $operation_text = "Chia";
                    } else {
                        echo "<p style='color:red;'>Lỗi: Không thể chia cho 0!</p>";
                        echo "<p class='back-link' onclick='goBack()'>Quay lại trang trước</p>";
                        exit;
                    }
                    break;
            }

            echo "<p><b>Chọn phép tính:</b> $operation_text</p>";
            echo "<p><b>Số 1:</b> $num1</p>";
            echo "<p><b>Số 2:</b> $num2</p>";
            echo "<p><b>Kết quả:</b> $result</p>";
        }
        ?>
        <p class="back-link" onclick="goBack()">Quay lại trang trước</p>
    </div>
</body>
</html>

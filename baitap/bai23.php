<!DOCTYPE html>
<html>
<head>
    <title>Bài 23: Nhận dạng tam giác</title>
    <style>
        body { font-family: Arial; margin: 20px; }
        .container { width: 400px; margin: 0 auto; padding: 20px; border: 1px solid #ddd; }
        table { width: 100%; }
        input[type="number"] { width: 60px; padding: 5px; }
        .result { font-weight: bold; }
    </style>
</head>
<body>
    <div class="container">
        <h2>NHẬN DẠNG TAM GIÁC</h2>
        <form method="post">
            <table>
                <tr>
                    <td>Cạnh 1 (cm):</td>
                    <td><input type="number" name="side1" min="0" step="any" required></td>
                </tr>
                <tr>
                    <td>Cạnh 2 (cm):</td>
                    <td><input type="number" name="side2" min="0" step="any" required></td>
                </tr>
                <tr>
                    <td>Cạnh 3 (cm):</td>
                    <td><input type="number" name="side3" min="0" step="any" required></td>
                </tr>
                <tr>
                    <td>Loại tam giác:</td>
                    <td><input type="text" name="type" class="result" readonly></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" name="identify" value="Nhận dạng"></td>
                </tr>
            </table>
        </form>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $a = $_POST['side1'];
            $b = $_POST['side2'];
            $c = $_POST['side3'];
            
            // Kiểm tra có phải tam giác không
            if ($a + $b > $c && $a + $c > $b && $b + $c > $a) {
                if ($a == $b && $b == $c) {
                    $type = "Tam giác đều";
                } elseif ($a == $b || $a == $c || $b == $c) {
                    $type = "Tam giác cân";
                } elseif (pow($a, 2) + pow($b, 2) == pow($c, 2) || 
                         pow($a, 2) + pow($c, 2) == pow($b, 2) || 
                         pow($b, 2) + pow($c, 2) == pow($a, 2)) {
                    $type = "Tam giác vuông";
                } else {
                    $type = "Tam giác thường";
                }
            } else {
                $type = "Không là tam giác";
            }
            
            echo "<script>document.getElementsByName('type')[0].value = '$type';</script>";
        }
        ?>
    </div>
</body>
</html>
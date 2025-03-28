<!DOCTYPE html>
<html>
<head>
    <title>Bài 22: Tính tiền Karaoke</title>
    <style>
        body { font-family: Arial; margin: 20px; }
        .container { width: 400px; margin: 0 auto; padding: 20px; border: 1px solid #ddd; }
        table { width: 100%; }
        input[type="number"] { width: 60px; padding: 5px; }
        .error { color: red; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Tính tiền Karaoke</h2>
        <form method="post">
            <table>
                <tr>
                    <td>Giờ bắt đầu (9-24):</td>
                    <td><input type="number" name="start" min="9" max="24" required></td>
                </tr>
                <tr>
                    <td>Giờ kết thúc (9-24):</td>
                    <td><input type="number" name="end" min="9" max="24" required></td>
                </tr>
                <tr>
                    <td>Tiền thanh toán:</td>
                    <td><input type="text" name="total" readonly></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" name="calculate" value="Tính tiền"></td>
                </tr>
            </table>
        </form>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $start = $_POST['start'];
            $end = $_POST['end'];
            
            if ($end <= $start) {
                echo "<div class='error'>Giờ kết thúc phải > giờ bắt đầu</div>";
            } else {
                $hours = $end - $start;
                $rate = 30000; // 30k/h
                
                // Giảm giá 10% nếu hát từ 9h-17h
                if ($start >= 9 && $end <= 17) {
                    $total = $hours * $rate * 0.9;
                } else {
                    $total = $hours * $rate;
                }
                
                echo "<script>document.getElementsByName('total')[0].value = '" . number_format($total) . " VNĐ';</script>";
            }
        }
        ?>
    </div>
</body>
</html>
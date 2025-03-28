<!DOCTYPE html>
<html>
<head>
    <title>Bài 21: Giải phương trình bậc nhất</title>
    <style>
        body { font-family: Arial; margin: 20px; }
        .container { width: 400px; margin: 0 auto; padding: 20px; border: 1px solid #ddd; }
        input[type="number"] { width: 60px; padding: 5px; }
        .result { font-weight: bold; color: blue; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Giải phương trình bậc nhất: ax + b = 0</h2>
        <form method="post">
            <input type="number" name="a" placeholder="a" required> x + 
            <input type="number" name="b" placeholder="b" required> = 0
            <br><br>
            <input type="submit" name="solve" value="Giải">
            <br><br>
            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $a = $_POST['a'];
                $b = $_POST['b'];
                
                echo "<div class='result'>Kết quả: ";
                if ($a == 0) {
                    if ($b == 0) {
                        echo "Phương trình có vô số nghiệm";
                    } else {
                        echo "Phương trình vô nghiệm";
                    }
                } else {
                    $x = -$b / $a;
                    echo "x = " . number_format($x, 2);
                }
                echo "</div>";
            }
            ?>
        </form>
    </div>
</body>
</html>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài Tập 3</title>
</head>
<body>
        <div class="container">
        <h1>Phép Cộng, Trừ, Nhân, Chia, Số dư</h1>
        <?php
            $x = 3;
            $y = 4;

            // b. Generate random values for $x and $y
            $x = rand(1, 100);
            $y = rand(1, 100);

            // c. Loop until $x > $y
            while ($x <= $y) {
                $x = rand(1, 100);
            }

            // d. Loop until $x == $y
            do {
                $x = rand(1, 100);
                $y = rand(1, 100);
            } while ($x != $y);

            // e. Function to calculate LCM (BCNN)
            function LCM($a, $b) {
                return ($a * $b) / GCD($a, $b);
            }

            // f. Function to calculate GCD (UCLN)
            function GCD($a, $b) {
                while ($b != 0) {
                    $temp = $b;
                    $b = $a % $b;
                    $a = $temp;
                }
                return $a;
            }

            // Output results
            echo "x = $x, y = $y<br>";
            echo "Cộng: " . ($x + $y) . "<br>";
            echo "Trừ: " . ($x - $y) . "<br>";
            echo "Nhân: " . ($x * $y) . "<br>";
            echo "Chia: " . ($x / $y) . "<br>";
            echo "Số dư: " . ($x % $y) . "<br>";
            echo "LCM: " . LCM($x, $y) . "<br>";
            echo "GCD: " . GCD($x, $y) . "<br>";
            ?>
    </div>
</body>
</html>
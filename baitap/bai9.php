<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài Tập 9</title>
</head>
<body>
    <div class="container">
        <h1>Tạo mảng</h1>
        <?php
        // Generate an array with 10 random numbers between 1 and 100
        $array = [];
        for ($i = 0; $i < 10; $i++) {
            $array[] = rand(1, 100);
        }

        // Calculate sum, max, and min
        $sum = array_sum($array);
        $max = max($array);
        $min = min($array);

        // Separate odd and even numbers
        $odd_numbers = array_filter($array, fn($num) => $num % 2 != 0);
        $even_numbers = array_filter($array, fn($num) => $num % 2 == 0);

        // Calculate sum of odd and even numbers
        $sum_odd = array_sum($odd_numbers);
        $sum_even = array_sum($even_numbers);

        // Reverse the array
        $reversed_array = array_reverse($array);

        // Display results
        echo "<b>Mảng:</b> " . implode(", ", $array) . "<br>";
        echo "<b>Tổng:</b> $sum <br>";
        echo "<b>Số chẵn:</b> " . implode(", ", $even_numbers) . "<br>";
        echo "<b>Tổng số chẵn:</b> $sum_even <br>";
        echo "<b>Số lẽ:</b> " . implode(", ", $odd_numbers) . "<br>";
        echo "<b>Tổng số lẽ:</b> $sum_odd <br>";
        echo "<b>Max:</b> $max <br>";
        echo "<b>Min:</b> $min <br>";
        echo "<b>Đảo mảng:</b> " . implode(", ", $reversed_array) . "<br>";

        // Display array as a table
        echo "<br><table border='1'><tr><th>Values</th></tr>";
        foreach ($array as $value) {
            echo "<tr><td>$value</td></tr>";
        }
        echo "</table>";
        ?>


</body>
</html>
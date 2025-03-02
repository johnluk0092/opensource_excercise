<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài Tập 9</title>
</head>
<body>
    <div class="container">
        <h1>Duyệt và xuất mảng</h1>

		<?php
		$list = array("alpha", "beta", "gamma", "delta", "epsilon");

		echo "<b>Mảng:</b><br>";
		foreach ($list as $value) {
		    echo $value . "<br>";
		}
		?>

</body>
</html>
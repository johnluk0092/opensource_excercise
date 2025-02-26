<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài Tập 2</title>
</head>
<body>
    <div class="container">
    <h1>Nhập Thông Tin Sinh Viên</h1>
    <form method="post">
        Họ và Tên: <input type="text" name="hoTen" required> <br><br>
        Ngày Sinh: <input type="date" name="ngaySinh" required> <br><br>
        Lớp: <input type="text" name="lop" required> <br><br>
        Trường: <input type="text" name="truong" required> <br><br>
        <input type="submit" name="submit" value="Thêm Sinh Viên">
    </form>

    <h1>Danh Sách Sinh Viên</h1>

    <?php
        session_start();

        // Khởi tạo danh sách sinh viên nếu chưa có
        if (!isset($_SESSION['sinhVien'])) {
            $_SESSION['sinhVien'] = [
                ["Họ và Tên" => "Nguyễn Văn A", "Ngày Sinh" => "15/08/2002", "Lớp" => "23TXTH01", "Trường" => "HUTECH"],
                ["Họ và Tên" => "Trần Thị B", "Ngày Sinh" => "21/09/2001", "Lớp" => "23TXTH01", "Trường" => "HUTECH"],
                ["Họ và Tên" => "Lê Văn C", "Ngày Sinh" => "05/07/2003", "Lớp" => "23TXTH01", "Trường" => "HUTECH"],
                ["Họ và Tên" => "Phạm Thị D", "Ngày Sinh" => "12/12/2002", "Lớp" => "23TXTH01", "Trường" => "HUTECH"]
            ];
        }

        // Xử lý khi người dùng nhấn nút "Thêm Sinh Viên"
        if (isset($_POST['submit'])) {
            $hoTen = $_POST['hoTen'];
            $ngaySinh = $_POST['ngaySinh'];
            $lop = $_POST['lop'];
            $truong = $_POST['truong'];

            // Thêm sinh viên mới vào danh sách
            $_SESSION['sinhVien'][] = [
                "Họ và Tên" => $hoTen,
                "Ngày Sinh" => $ngaySinh,
                "Lớp" => $lop,
                "Trường" => $truong
            ];
        }

        // Hiển thị bảng thông tin sinh viên
        echo "<table border='1' cellpadding='5' cellspacing='0'>";
        echo "<tr><th>Họ và Tên</th><th>Ngày Sinh</th><th>Lớp</th><th>Trường</th></tr>";
        foreach ($_SESSION['sinhVien'] as $sv) {
            echo "<tr>";
            echo "<td>{$sv['Họ và Tên']}</td>";
            echo "<td>{$sv['Ngày Sinh']}</td>";
            echo "<td>{$sv['Lớp']}</td>";
            echo "<td>{$sv['Trường']}</td>";
            echo "</tr>";
        }
        echo "</table>";
    ?>
    </div>
</body>
</html>
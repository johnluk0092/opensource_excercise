<!DOCTYPE html>
<html>
<head>
    <title>Đăng ký thành công</title>
    <meta http-equiv="refresh" content="15;url=register.php">
    <style>
        body { font-family: Arial; margin: 20px; }
        .success { color: green; font-weight: bold; }
    </style>
</head>
<body>
    <h1>THÔNG TIN ĐĂNG KÝ</h1>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        echo "<div class='success'>Chúc mừng bạn đăng ký thành công!</div>";
        echo "<p>Thông tin của bạn:</p>";
        
        echo "<ul>";
        echo "<li>Email: " . $_POST['email'] . "</li>";
        echo "<li>Họ tên: " . $_POST['fullname'] . "</li>";
        echo "<li>Địa chỉ: " . $_POST['address'] . "</li>";
        echo "<li>Điện thoại: " . $_POST['phone'] . "</li>";
        echo "<li>Giới tính: " . ($_POST['gender'] == 'male' ? 'Nam' : 'Nữ') . "</li>";
        
        if (isset($_POST['hobby'])) {
            echo "<li>Sở thích: " . implode(", ", $_POST['hobby']) . "</li>";
        }
        
        echo "</ul>";
        
        // Lưu thông tin đăng nhập (cho bài 25)
        session_start();
        $_SESSION['user_email'] = $_POST['email'];
        $_SESSION['user_password'] = $_POST['password'];
        
        echo "<p>Click <a href='bai24.php'>vào đây</a> để chuyển về trang chủ nếu hệ thống không tự chuyển.</p>";
        echo "<p>Hệ thống sẽ tự động chuyển về trang đăng ký sau 15 giây...</p>";
    } else {
        header("Location: register.php");
        exit();
    }
    ?>
</body>
</html>
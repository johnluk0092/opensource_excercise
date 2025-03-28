<!DOCTYPE html>
<html>
<head>
    <title>Bài 25: Đăng nhập</title>
    <style>
        body { font-family: Arial; margin: 0; }
        .container { display: flex; }
        .menu { width: 200px; background: #f1f1f1; padding: 20px; }
        .content { flex: 1; padding: 20px; }
        table { width: 100%; }
        input[type="text"], input[type="password"] { width: 100%; padding: 8px; }
        input[type="submit"] { padding: 8px 16px; background: #4CAF50; color: white; border: none; }
        .success { color: green; font-weight: bold; }
        .error { color: red; }
    </style>
</head>
<body>
    <div class="container">
        <div class="menu">
            <h3>Menu</h3>
            <ul>
                <li><a href="#">Trang chủ</a></li>
                <li><a href="register.php">Đăng ký</a></li>
                <li><a href="login.php">Đăng nhập</a></li>
            </ul>
        </div>
        <div class="content">
            <h2>THÔNG TIN ĐĂNG NHẬP</h2>
            
            <?php
            session_start();
            
            // Kiểm tra nếu đã đăng nhập
            if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {
                echo "<div class='success'>Chúc mừng bạn đăng nhập thành công!</div>";
                
                // Thay đổi menu
                echo "<script>
                    document.querySelector('.menu ul li:nth-child(2) a').textContent = 'Thông tin cá nhân';
                    document.querySelector('.menu ul li:nth-child(3) a').textContent = 'Đăng xuất';
                    document.querySelector('.menu ul li:nth-child(3) a').href = 'logout.php';
                </script>";
            } else {
                // Hiển thị form đăng nhập
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    $remember = isset($_POST['remember']);
                    
                    // Kiểm tra thông tin đăng nhập
                    if ($email == $_SESSION['user_email'] && $password == $_SESSION['user_password']) {
                        $_SESSION['logged_in'] = true;
                        
                        // Ghi nhớ thông tin nếu người dùng chọn
                        if ($remember) {
                            setcookie('user_email', $email, time() + (86400 * 30), "/"); // 30 ngày
                            setcookie('user_password', $password, time() + (86400 * 30), "/");
                        }
                        
                        header("Refresh:0");
                        exit();
                    } else {
                        echo "<div class='error'>Email hoặc mật khẩu không đúng!</div>";
                    }
                }
                
                echo '<form method="post">
                    <table>
                        <tr>
                            <td>Email:</td>
                            <td><input type="text" name="email" value="';
                            if (isset($_COOKIE['user_email'])) echo $_COOKIE['user_email'];
                            echo '" required></td>
                        </tr>
                        <tr>
                            <td>Password:</td>
                            <td><input type="password" name="password" value="';
                            if (isset($_COOKIE['user_password'])) echo $_COOKIE['user_password'];
                            echo '" required></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="checkbox" name="remember" id="remember" ';
                                if (isset($_COOKIE['user_email'])) echo 'checked';
                                echo '> <label for="remember">Ghi nhớ thông tin</label>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="submit" name="login" value="Đăng nhập"></td>
                            <td><input type="reset" value="Làm lại"></td>
                        </tr>
                    </table>
                </form>';
            }
            ?>
        </div>
    </div>
</body>
</html>
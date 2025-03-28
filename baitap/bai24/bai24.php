<!-- register.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Bài 24: Đăng ký</title>
    <style>
        body { font-family: Arial; margin: 0; }
        .container { display: flex; }
        .menu { width: 200px; background: #f1f1f1; padding: 20px; }
        .content { flex: 1; padding: 20px; }
        table { width: 100%; }
        input[type="text"], input[type="password"], input[type="tel"], input[type="email"] { 
            width: 100%; padding: 8px; margin: 5px 0; 
        }
        input[type="submit"] { padding: 10px 20px; background: #4CAF50; color: white; border: none; }
    </style>
</head>
<body>
    <div class="container">
        <div class="menu">
            <h3>Menu</h3>
            <ul>
                <li><a href="#">Trang chủ</a></li>
                <li><a href="#">Đăng ký</a></li>
            </ul>
        </div>
        <div class="content">
            <h2>THÔNG TIN ĐĂNG KÝ</h2>
            <form method="post" action="xlDangky.php">
                <h3>Thông tin tài khoản</h3>
                <table>
                    <tr>
                        <td>Email:</td>
                        <td><input type="email" name="email" required></td>
                    </tr>
                    <tr>
                        <td>Password:</td>
                        <td><input type="password" name="password" required></td>
                    </tr>
                    <tr>
                        <td>Nhập lại password:</td>
                        <td><input type="password" name="confirm_password" required></td>
                    </tr>
                </table>
                
                <h3>Thông tin cá nhân</h3>
                <table>
                    <tr>
                        <td>Họ và tên:</td>
                        <td><input type="text" name="fullname" required></td>
                    </tr>
                    <tr>
                        <td>Địa chỉ:</td>
                        <td><input type="text" name="address" required></td>
                    </tr>
                    <tr>
                        <td>Điện thoại:</td>
                        <td><input type="tel" name="phone" required></td>
                    </tr>
                    <tr>
                        <td>Giới tính:</td>
                        <td>
                            <input type="radio" name="gender" value="male" checked> Nam
                            <input type="radio" name="gender" value="female"> Nữ
                        </td>
                    </tr>
                    <tr>
                        <td>Sở thích:</td>
                        <td>
                            <input type="checkbox" name="hobby[]" value="sport"> Thể thao
                            <input type="checkbox" name="hobby[]" value="music"> Âm nhạc
                            <input type="checkbox" name="hobby[]" value="travel"> Du lịch
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="submit" name="register" value="Đăng ký"></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</body>
</html>
<?php
session_start();
session_destroy();

// Xóa cookie ghi nhớ
setcookie('user_email', '', time() - 3600, "/");
setcookie('user_password', '', time() - 3600, "/");

header("Location: login.php");
exit();
?>
<?php
session_start();
header('Content-Type: text/html; charset=UTF-8');
echo '<title>Logout</title>';
if (session_destroy())
echo '<script language="javascript">alert("Bạn đã đăng xuất!"); window.location="login.php";</script>';
else
echo "something is error!";

echo '<br><a href="index.php">Bấm vào đây để quay lại trang chủ<br></a>';
?>
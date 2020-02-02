<?php 
include_once('../includens/config.php');

unset($_SESSION['email']);

echo '<script>alert("账号已退出");location.href="login.php";</script>';

 ?>
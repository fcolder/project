<?php 
//php判断的程序结构
session_start();
date_default_timezone_set('PRC');

header('Content-Type:text/html;charset=utf-8');

$con = mysqli_connect('localhost:3306','root','root','cinema'); //   (1)连接数据库

mysqli_query($con,'set names utf8');  //  (2)设置编码


$url=$_SERVER['REQUEST_URI'];

if (strpos($url,'admin') && !strpos($url,'login') && !isset($_SESSION['email'])) {
  echo '<script>alert("请先登录");location.href="login.php";</script>';
}

 ?>
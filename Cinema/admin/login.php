<?php
include_once('../includens/config.php');
if ($_POST) {
  # code...
  $email=$_POST['email'];
  $pwd=md5($_POST['pwd']);

  //查询账号是否正确
  $query=mysqli_query($con,"select * from admin where email='$email' and pwd='$pwd'");
  // echo "select * from admin where email='$email' and pwd='$pwd'";
  // exit();
  $check=mysqli_fetch_assoc($query);
  if ($check) {
    //查到了
    $_SESSION['email']=$email;
    echo '<script>alert("登录成功");location.href="index.php";</script>';
  }else{
    //查不到
    echo '<script>alert("邮箱或密码有错误");history.go(-1);</script>';
  }
exit();
}

?>
<!DOCTYPE html>
<html>
<head lang="en">
  <meta charset="UTF-8">
  <title>Login Page | Cinema UI Example</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="format-detection" content="telephone=no">
  <meta name="renderer" content="webkit">
  <meta http-equiv="Cache-Control" content="no-siteapp" />
  <link rel="alternate icon" type="image/png" href="assets/i/favicon.png">
  <link rel="stylesheet" href="assets/css/amazeui.min.css"/>
  <style>
    .header {
      text-align: center;
    }
    .header h1 {
      font-size: 200%;
      color: #333;
      margin-top: 30px;
    }
    .header p {
      font-size: 14px;
    }
  </style>
</head>
<body>
<div class="header">
  <div class="am-g">
    <h1>后台登录</h1>

  </div>
  <hr />
</div>
<div class="am-g">
  <div class="am-u-lg-6 am-u-md-8 am-u-sm-centered">
   
    <br>
    <br>

    <form method="post" class="am-form">
      <label for="email">邮箱:</label>
      <input type="email" name="email" id="email" value="">
      <br>
      <label for="password">密码:</label>
      <input type="password" name="pwd" id="password" value="">
      <br>
      <label for="remember-me">
        <input id="remember-me" type="checkbox">
        记住密码
      </label>
      <br />
      <div class="am-cf">
        <input type="submit" name="" value="登 录" class="am-btn am-btn-primary am-btn-sm am-fl">
        <input type="submit" name="" value="忘记密码 ^_^? " class="am-btn am-btn-default am-btn-sm am-fr">
      </div>
    </form>
    <hr>
  
  </div>
</div>
</body>
</html>

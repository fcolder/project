<?php 
// 定义全局变量
$GLOBALS['_CFG'] = array(
	'smtp_host'	=>	'smtp.163.com',	// 163的smtp服务器地址
	'smtp_port'	=> 25,
	'smtp_user' => '13425234689@163.com',	// 发送方
	'smtp_pass'	=> '187431264li',	// 授权密码
);
require_once('includens/function.php');

if(!empty($_POST)){
	// 接收数据
	$email = trim($_POST['email']);
	$title = trim($_POST['title']);
	$content = trim($_POST['content']);

	if(send_mail('林生',$email,$title,$content,1)){
		echo '发送成功';
	}else{
		echo '发送失败，请联系客服';
	}
}

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>邮件发送</title>
</head>
<body>
	
	<form action="" method="post">
		<p>接收方：<input type="text" name="email"></p>
		<p>标题：<input type="text" name="title"></p>
		<p>内容：<textarea name="content" id="" cols="30" rows="10"></textarea></p>
		<p><input type="submit" value="发送邮件"></p>
	</form>

</body>
</html>

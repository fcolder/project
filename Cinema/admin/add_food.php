<?php 
//php判断的程序结构
include_once('../includens/config.php');
if($_POST){
// echo('<pre>');
// print_r($_POST);
// print_r($_FILES);
// exit;

 $cn=$_POST['cn_name'];
 $t=$_POST['type'];
 $p=$_POST['price'];

if ($_FILES['img']['error']==0) {
  copy($_FILES['img']['tmp_name'],'../upload/'.$_FILES['img']['name']);
  $img = '/upload/'.$_FILES['img']['name'];
}else {
  $img='';


}

mysqli_query($con,"insert into list(type,cn_name,price,img)  values('$t','$cn','$p','$img')");   //  (3) 添加/查询/修改/删除数据
echo '<script>alert("添加成功")</script>';

  mysqli_close($con); //(4) 关闭数据库


  //名称（）=>函数
}
 ?>
<!doctype html>
<html class="no-js">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Cinema UI Admin user Examples</title>
  <meta name="description" content="这是一个 user 页面">
  <meta name="keywords" content="user">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="renderer" content="webkit">
  <meta http-equiv="Cache-Control" content="no-siteapp" />
  <link rel="icon" type="image/png" href="assets/i/favicon.png">
  <link rel="apple-touch-icon-precomposed" href="assets/i/app-icon72x72@2x.png">
  <meta name="apple-mobile-web-app-title" content="Amaze UI" />
  <link rel="stylesheet" href="assets/css/amazeui.min.css"/>
  <link rel="stylesheet" href="assets/css/admin.css">
</head>
<body>
<!--[if lte IE 9]>
<p class="browsehappy">你正在使用<strong>过时</strong>的浏览器，Amaze UI 暂不支持。 请 <a href="http://browsehappy.com/" target="_blank">升级浏览器</a>
  以获得更好的体验！</p>
<![endif]-->

<?php include_once('header.php'); ?>

<div class="am-cf admin-main">
  <!-- sidebar start -->
<?php include_once('left.php'); ?>
  <!-- sidebar end -->

  <!-- content start -->
  <div class="admin-content">
    <div class="admin-content-body">
      <div class="am-cf am-padding am-padding-bottom-0">
        <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">添加电影</strong> / <small>Add information</small></div>
      </div>

      <hr/>

      <div class="am-g">
        <div class="am-u-sm-12 am-u-md-4 am-u-md-push-8">
        </div>

        <div class="am-u-sm-12 am-u-md-8 am-u-md-pull-4">
          <form class="am-form am-form-horizontal" action="" method="post" enctype="multipart/form-data">
            <div class="am-form-group">
              <label for="user-name" class="am-u-sm-3 am-form-label">电影名称</label>
              <div class="am-u-sm-9">
                <input type="text" id="user-name" placeholder="请输入电影名称" name="cn_name">
                 <!-- <small>输入你的名字，让我们记住你。</small>          -->
                    </div>
            </div>

            <div class="am-form-group">
              <label for="user-name" class="am-u-sm-3 am-form-label">价格</label>
              <div class="am-u-sm-9">
                <input type="text" id="user-name" placeholder="请输入价格" name="price">
               <!--  <small>输入你的名字，让我们记住你。</small>
 -->              </div>
            </div>
            <div class="am-form-group">
              <label for="user-name" class="am-u-sm-3 am-form-label">图片</label>
              <div class="am-u-sm-9">
                <input type="file" id="user-name" name="img">
               <!--  <small>输入你的名字，让我们记住你。</small>
 -->              </div>
            </div>
            <div class="am-form-group">
              <label for="user-name" class="am-u-sm-3 am-form-label">类别</label>
              <div class="am-u-sm-9">
               <select data-am-selected="{btnSize: 'sm'}" name="type">
              <option value="">请选择</option>
              <option value="动漫">动漫</option>
              <option value="电影">电影</option>
              <option value="综艺">综艺</option>
              <option value="电视剧">电视剧</option>
            </select>
            </div>
            </div>
 
            <div class="am-form-group">
              <div class="am-u-sm-9 am-u-sm-push-3">
                <button type="submit" class="am-btn am-btn-primary">保存修改</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

    <footer class="admin-content-footer">

    </footer>

  </div>
  <!-- content end -->

</div>

<a href="#" class="am-icon-btn am-icon-th-list am-show-sm-only admin-menu" data-am-offcanvas="{target: '#admin-offcanvas'}"></a>

<footer>
</footer>

<!--[if lt IE 9]>
<script src="http://libs.baidu.com/jquery/1.11.3/jquery.min.js"></script>
<script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
<script src="assets/js/amazeui.ie8polyfill.min.js"></script>
<![endif]-->

<!--[if (gte IE 9)|!(IE)]><!-->
<script src="assets/js/jquery.min.js"></script>
<!--<![endif]-->
<script src="assets/js/amazeui.min.js"></script>

<script src="assets/js/app.js"></script>
</body>
</html>

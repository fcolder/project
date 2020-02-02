<?php 
//加载配置文件
include_once('../includens/config.php');
//PHP判读的程序结构（过程式编程）
if($_POST){
 // echo('<pre>');
 // print_r($_POST);
 // print_r($_FILES);
 // exit;
  
  $t = $_POST['title'];
  $time = $_POST['time'];
  $c = $_POST['content'];
  $type = $_POST['type']; //类型
  //exit();
  
  //做图片上传
  if ($_FILES['img']['error']==0) {
  //成功上传
  //图片后缀名（扩展名）
    $ten = pathinfo($_FILES['img']['name'],PATHINFO_EXTENSION);
    $new_name=date('YmdHis').mt_rand(1000,9999).'.'.$ten;

    copy($_FILES['img']['tmp_name'],'../upload/'.$new_name);
    //增加多个变量
    $img = '/upload/'.$new_name;
  }else{
    $img='';//内容是空的
  }

  //(3)添加/查询/修改/删除数据
  mysqli_query($con,"insert into info(title,time,img,content,type) values('$t','$time','$img','$c','$type')"); 
// echo "insert into info(title,time,img,content,type) values('$t','$time','$img','$c','$type')";
// exit();
  echo '<script>alert("添加成功");</script>'; 
  //(4)关闭数据库连接
 //mysqli_close($con);
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
  <link rel="stylesheet" href="../lib/layui/css/layui.css">
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
        <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">添加资讯</strong> / <small>Add information</small></div>
      </div>

      <hr/>

      <div class="am-g">
        <div class="am-u-sm-12 am-u-md-4 am-u-md-push-8">
        </div>

        <div class="am-u-sm-12 am-u-md-8 am-u-md-pull-4">
          <form class="am-form am-form-horizontal" action="" method="post" enctype="multipart/form-data">    <!--图片赋值名称-->
            <div class="am-form-group">
              <label for="user-name" class="am-u-sm-3 am-form-label">标题</label>
              <div class="am-u-sm-9">
                <input type="text" id="user-name" placeholder="请输入标题" name="title">
                 <!-- <small>输入你的名字，让我们记住你。</small>          -->
              </div>
            </div>

            <div class="am-form-group">
              <label for="user-name" class="am-u-sm-3 am-form-label">发布时间</label>
              <div class="am-u-sm-9">
                <input type="text" name="time" id="time" placeholder="请选择发布时间">
               <!--  <small>输入你的名字，让我们记住你。</small>-->             
                </div>
            </div>

            <div class="am-form-group">
              <label for="user-name" class="am-u-sm-3 am-form-label">图片</label>
              <div class="am-u-sm-9">
                <input type="file" id="user-name" name="img">
               <!--  <small>输入你的名字，让我们记住你。</small>
 -->              </div>
            </div>
            <div class="am-form-group">
              <label for="user-intro" class="am-u-sm-3 am-form-label">内容</label>
              <div class="am-u-sm-9">
              <!-- textarea 是多行输入框 -->
                <textarea class="" rows="5" id="user-intro" name="content"
                placeholder="请输入内容"></textarea>
              </div>
            </div>
           <div class="am-form-group">
              <label for="user-name" class="am-u-sm-3 am-form-label">类别</label>
              <div class="am-u-sm-9">
              <select data-am-selected="{btnSize: 'sm'}" name="type">
              <option value="">请选择</option>
              <option value="动漫资讯">动漫资讯</option>
              <option value="电影资讯">电影资讯</option>
              <option value="电影站">电影站</option>
            </select>
            </div>
            </div>

            <div class="am-form-group">
              <div class="am-u-sm-9 am-u-sm-push-3">
                <button type="submit" class="am-btn am-btn-primary">添加资讯</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

    <footer class="admin-content-footer">
      <hr>
      <p class="am-padding-left">© 2014 AllMobilize, Inc. Licensed under MIT license.</p>
    </footer>

  </div>
  <!-- content end -->

</div>

<a href="#" class="am-icon-btn am-icon-th-list am-show-sm-only admin-menu" data-am-offcanvas="{target: '#admin-offcanvas'}"></a>

<footer>
  <hr>
  <p class="am-padding-left">© 2014 AllMobilize, Inc. Licensed under MIT license.</p>
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
<script src="../lib/layui/layui.js"></script>
<script>
   layui.use(['laydate'],function(){
     var d=layui.laydate;
     d.render({      //json对象
            elem:'#time'
     });
   });
</script>
</body>
</html>

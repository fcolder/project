<?php 
//加载配置文件
include_once('../includens/config.php');

//这里写数据的删除
if (isset($_GET['act'])) {
  $id=$_GET['id'];
  mysqli_query($con,"delete from info where id =$id");  //删除语句
}

if($_POST){
 // echo('<pre>');
 // print_r($_POST['ids']);
 // exit;
 
$ids=implode(',', $_POST['ids']);
// echo $ids;
// exit();
 mysqli_query($con,"delete from info where id in($ids)");
}


//数据（菜式）查询
$p=isset($_GET['page'])?$_GET['page']:1;  //页码
$n=5;     //每页显示多少个菜  
$xb=($p-1)*$n;    //下标

//order by id desc 按照主键ID倒序（从大到小）              //limit $xb,$n 限制数据
 $query = mysqli_query($con,"select * from info order by id desc limit $xb,$n");
//数据$data
//$data =mysqli_fetch_assoc($query);  //每个菜的信息，一位数组
//$data =mysqli_fetch_assoc($query);
//$data =mysqli_fetch_assoc($query);

//循环结果 ，数据最后会是二维数组
 $list=array();
while($data=mysqli_fetch_assoc($query)){
   $list[]=$data;
 }

//查询总数 (SQL)
$query2=mysqli_query($con,'select count(id) as c from info');
$cinfo =mysqli_fetch_assoc($query2);
$total = $cinfo['c']; //总数4

//总页数
$tp = ceil($total/$n);
// echo $tp;
// exit;

// echo "<pre>";
// print_r($list);
// exit();
 ?>
<!doctype html>
<html class="no-js">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Cinema UI Admin table Examples</title>
  <meta name="description" content="这是一个 table 页面">
  <meta name="keywords" content="table">
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
        <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">资讯列表</strong> / <small>Table</small></div>
      </div>

      <hr>

      <div class="am-g">
        <div class="am-u-sm-12 am-u-md-6">
          <div class="am-btn-toolbar">
            <div class="am-btn-group am-btn-group-xs">
              <button type="button" class="am-btn am-btn-default">
              <span class="am-icon-plus"></span> 新增</button>
              <button type="button" class="am-btn am-btn-default delall">
              <span class="am-icon-trash-o"></span>删除</button>
            </div>
          </div>
        </div>
        <div class="am-u-sm-12 am-u-md-3">
          <div class="am-form-group">
            <select data-am-selected="{btnSize: 'sm'}">
              <option value="option1">所有类别</option>
              <option value="option2">动漫</option>
              <option value="option3">电影</option>
              <option value="option4">综艺</option>
              <option value="option5">电视剧</option>
            </select>
          </div>
        </div>
        <div class="am-u-sm-12 am-u-md-3">
          <div class="am-input-group am-input-group-sm">
            <input type="text" class="am-form-field">
          <span class="am-input-group-btn">
            <button class="am-btn am-btn-default" type="button">搜索</button>
          </span>
          </div>
        </div>
      </div>

      <div class="am-g">
        <div class="am-u-sm-12">
          <form class="am-form" action="" method="post">
            <table class="am-table am-table-striped am-table-hover table-main">
              <thead>
              <tr>
                <th class="table-check"><input type="checkbox" id="checkall" /></th>
                <th class="table-id">ID</th>
                <th class="table-img">封面图</th>
                <th class="table-title">标题</th>
                <th class="table-type">发布时间</th>
                <th class="table-author am-hide-sm-only">内容</th>
                <th class="table-date am-hide-sm-only">类别</th>
                <th class="table-set">操作</th>
              </tr>
              </thead>
              <tbody>
              <!-- foreach 循环数组 -->
              <?php foreach ($list as $k=>$d) { ?>
              <tr>
                <td><input type="checkbox" class="zx" name="ids[]" value="<?php echo $d['id']; ?>"  /></td>
                <td><?php echo ++$xb;?></td>
                <td><img src="<?php echo $d['img']; ?>" alt='' width="70px;" height="50px;"></td>
                <td><a href="#"><?php echo $d['title']; ?></a></td>
                <td><a href="#"><?php echo $d['time']; ?></a></td>
                <td><?php echo $d['content']; ?></td>
                <td><?php echo $d['type']; ?></td>
                <td>
                  <div class="am-btn-toolbar">
                    <div class="am-btn-group am-btn-group-xs">

                      <a href="edit_info.php?id=<?php echo $d['id'] ;?>" class="am-btn am-btn-default am-btn-xs am-text-secondary"><span class="am-icon-pencil-square-o"></span> 编辑</a>

                      <button type="button" onclick="del(<?php  echo $d['id']; ?>)" class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only">
                      <span class="am-icon-trash-o"></span> 删除</button>
                    </div>
                  </div>
                </td>
              </tr>
              <?php } ?>
              </tbody>
            </table>
            <div class="am-cf">
              共<?php echo $total; ?>条记录
              <div class="am-fr">
                <ul class="am-pagination">
                  <li class="<?php echo $p==1?'am-disabled':'';?>">
                  <a href="?page=<?php echo $p-1;?>"><<上一页</a></li>

                  <?php for ($i=1; $i<=$tp; $i++){?>
                  <li class="<?php echo $p==$i? 'am-active':'';?>">
                  <a href="?page=<?php echo $i;?>"><?php echo $i;?></a></li>
                  <?php } ?>

                  <li class="<?php echo $p==$tp?'am-disabled':'';?>">
                  <a href="?page=<?php echo $p+1;?>">下一页>></a></li>
                </ul>
              </div>
            </div>
            <hr />
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
  <hr>
  <p class="am-padding-left">© 2014 AllMobilize, Inc. Licensed under MIT license.</p>
</footer>

<!--[if lt IE 9]>
<script src="http://libs.baidu.com/jquery/1.11.1/jquery.min.js"></script>
<script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
<script src="assets/js/amazeui.ie8polyfill.min.js"></script>
<![endif]-->

<!--[if (gte IE 9)|!(IE)]><!-->
<script src="assets/js/jquery.min.js"></script>
<!--<![endif]-->
<script src="assets/js/amazeui.min.js"></script>
<script src="assets/js/app.js"></script>
<script type="text/javascript">
//定义函数的一个关键词
  function del(id){
    //window 浏览器对象
    var a = window.confirm('您确定要删除此数据吗？');   //弹出确认框
    //console,log(a); //js的打印
    if(a){
      //点击“确定”，跳转到删除
      location.href='?act=del&id='+id;   //跳转（act=>操作）
    }
  }

  $('#checkall').click(function(){
    if ($(this).is(":checked")) {
      $('.zx').prop('checked',true);
    } else{
      $('.zx').prop('checked',false);
    }
  });
  $('.delall').click(function(){
    $('.am-form').submit();
  });

  $('.delall').click(function(){
    if ($('.zx:checked').length==0) {
      alert('请选择要删除的资讯');
      return;
    }
    if (confirm('鸡你太美？')) {
      $('.am-form').submit();
    }
  });


</script>
</body>
</html>
 
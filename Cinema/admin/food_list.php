<?php 
include_once('../includens/config.php');

if (isset($_GET['act'])) {
  $id = $_GET['id'];
  mysqli_query($con,"delete from list where id =$id");
}


$p = isset($_GET['page'])?$_GET['page']:1;
$n = 3;
$xb = ($p-1)*$n;

$query = mysqli_query($con,"select * from list order by id desc limit $xb,$n");  

$list =array();
while ( $data = mysqli_fetch_assoc($query)) {
  $list[]=$data;
}

$query2 = mysqli_query($con,'select count(id) as c from list');
$cinfo = mysqli_fetch_assoc($query2);
$total = $cinfo['c'];

$tp = ceil($total/$n);

// echo('<pre>');
// print_r($data);
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
        <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">电影列表</strong> / <small>Table</small></div>
      </div>

      <hr>

      <div class="am-g">
        <div class="am-u-sm-12 am-u-md-6">
          <div class="am-btn-toolbar">
            <div class="am-btn-group am-btn-group-xs">
              <button type="button" class="am-btn am-btn-default"><span class="am-icon-plus"></span> 新增</button>
              <button type="button"  class="am-btn am-btn-default"><span class="am-icon-trash-o"></span> 删除</button>
            </div>
          </div>
        </div>
        <div class="am-u-sm-12 am-u-md-3">
          <div class="am-form-group">
            <select data-am-selected="{btnSize: 'sm'}">
              <option value="option1">点击选择</option>
              <option value="option2">动漫</option>
              <option value="option3">电影</option>
              <option value="option4">综艺</option>
              <option value="option5">电视剧</option>
            </select>
          </div>
        </div>
        <div class="am-u-sm-12 am-u-md-3">
          <div class="am-input-group am-input-group-sm">
            <input type="text" class="am-form-field" placeholder="请输入电影名称">
          <span class="am-input-group-btn">
            <button class="am-btn am-btn-default" type="button">搜索</button>
          </span>
          </div>
        </div>
      </div>

      <div class="am-g">
        <div class="am-u-sm-12">
          <form class="am-form">
            <table class="am-table am-table-striped am-table-hover table-main">
              <thead>
              <tr>
                <th class="table-check"><input type="checkbox" /></th><th class="table-id">ID</th><th class="table-title">封面图</th><th class="table-type">中文名称</th><th class="table-date am-hide-sm-only">类别</th><th class="table-date am-hide-sm-only">价格</th><th class="table-set">操作</th>
              </tr>
              </thead>
              <tbody>
              <?php foreach ($list as $d ) {?>

              <tr>
                <td><input type="checkbox" /></td>
                <td><?php echo $d['id'] ?></td>
                <td><a href="#"><img src="<?php echo $d['img']; ?>" alt="" width="90px" height="60px"></a></td>
                <td><?php echo $d['cn_name']; ?></td>
                <td><?php echo $d['type']; ?></td>
                <td class="am-hide-sm-only">￥<?php echo $d['price']; ?></td>
                <td>
                  <div class="am-btn-toolbar">
                    <div class="am-btn-group am-btn-group-xs">
                      <button class="am-btn am-btn-default am-btn-xs am-text-secondary"><span class="am-icon-pencil-square-o"></span> 编辑</button>
                      <button type="button" onclick="del(<?php echo $d['id']; ?>)" class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only"><span class="am-icon-trash-o"></span> 删除</button>
                    </div>
                  </div>
                </td>
              </tr>

              <?php } ?>
              </tbody>
            </table>
            <div class="am-cf">
              共 <?php echo $total; ?> 条记录
              <div class="am-fr">
                <ul class="am-pagination">
                  <li class="<?php echo $p==1?'am-disabled':'';?>"><a href="?page=<?php echo $p-1; ?>">«</a></li>
                  <?php for ($i=1; $i <=$tp ; $i++) { ?>
                  
                  <li class="<?php echo $p==$i?'am-active':'';?>"><a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                  <?php  } ?>
                  <li class="<?php echo $p==$tp?'am-disabled':'';?>"><a href="?page=<?php echo $p+1; ?>">»</a></li>
                </ul>
              </div>
            </div>
            <hr />
            <p>注：.....</p>
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
<script src="http://libs.baidu.com/jquery/1.11.1/jquery.min.js"></script>
<script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
<script src="assets/js/amazeui.ie8polyfill.min.js"></script>
<![endif]-->

<!--[if (gte IE 9)|!(IE)]><!-->
<script src="assets/js/jquery.min.js"></script>
<!--<![endif]-->
<script src="assets/js/amazeui.min.js"></script>
<script src="assets/js/app.js"></script>
<script>
  function del(Fid){
    var a = window.confirm("鸡你太美？");
    if (a) {
      location.href='?act=del&id='+Fid;
    }

  }

</script>
</body>
</html>

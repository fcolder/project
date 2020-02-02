<?php
// 加载配置文件
include_once('../includens/config.php');
include_once('../includens/function.php');

// 这里写数据的删除
if(isset($_GET['act'])&&$_GET['act']=='del'){
  $id = $_GET['id'];
  mysqli_query($con,"delete from booking where id=$id"); // 删除语句
}

if(isset($_GET['act'])&&$_GET['act']=='yd'){
  $id = $_GET['id'];
  mysqli_query($con,"update booking set state=1 where id=$id"); 

$GLOBALS['_CFG']=array(
 'smtp_host'=>'smtp.163.com', // 163的smtp服务器地址
 'smtp_port'=> 25,
 'smtp_user'=>'13425234689@163.com', // 发送方
 'smtp_pass'=>'1874341264li', // 授权密码
);

$query=mysqli_query($con,"select * from booking where id=$id");
$info=mysqli_fetch_assoc($query);

$email=$info['email'];
$name=$info['name'];
$t=$info['date'].' '.$info['time'];

$res=send_mail('电影城',$email,'预定订单提醒',"尊敬的{$name},你的订单已确认，您预定的时间{$t},请提前准备!",1);
if ($res) {
  echo '<script>alert("预定成功，已发送邮件");</script>';
} else {
  echo '<script>alert("预定成功，邮件发送失败");</script>';
}
}

// 数据（菜式）查询
$p = isset($_GET['page'])?$_GET['page']:1; // 页码
$n = 10;  // 每页显示多少个菜
$xb = ($p-1)*$n;  // 下标

$query = mysqli_query($con,"select * from booking order by state asc,id desc limit $xb,$n"); // order by id desc 按照主键ID倒序（从大到小）

// 数据$data
// $data = mysqli_fetch_assoc($query);  // 每个菜的信息，一维数组
// $data = mysqli_fetch_assoc($query);
// $data = mysqli_fetch_assoc($query);
// $data = mysqli_fetch_assoc($query);
// $data = mysqli_fetch_assoc($query);
// $data = mysqli_fetch_assoc($query);

// 循环，数据最后会是二维数组
$list = array();
while($data = mysqli_fetch_assoc($query)){
  $list[] = $data;
}
// 查询总数（SQL语句）
$query2 = mysqli_query($con,'select count(id) as c from booking');
$cinfo = mysqli_fetch_assoc($query2);
$total = $cinfo['c']; // 总数 4

// 总页数
$tp = ceil($total/$n);
// echo $tp;
// exit;

// echo '<pre>';
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

  <!-- layui.css -->
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
        <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">订单列表</strong> / <small>Table</small></div>
      </div>

      <hr>

      <div class="am-g">
        <div class="am-u-sm-12 am-u-md-6">
          <div class="am-btn-toolbar">
            <div class="am-btn-group am-btn-group-xs">
              <!-- <button type="button" class="am-btn am-btn-default"><span class="am-icon-plus"></span> 新增</button> -->
              <!-- <button type="button" class="am-btn am-btn-default"><span class="am-icon-save"></span> 保存</button> -->
              <!-- <button type="button" class="am-btn am-btn-default"><span class="am-icon-archive"></span> 审核</button> -->
              <button type="button" class="am-btn am-btn-default"><span class="am-icon-trash-o"></span> 删除</button>
            </div>
          </div>
        </div>
        <div class="am-u-sm-12 am-u-md-3">
          <div class="am-form-group">
            <select data-am-selected="{btnSize: 'sm'}">
              <option value="">请选择</option>
              <option value="动漫">动漫</option>
              <option value="电影">电影</option>
              <option value="综艺">综艺</option>
              <option value="电视剧">电视剧</option>
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
                <th class="table-check"><input type="checkbox" /></th>
                <th class="table-id">ID</th>
                <th class="table-title">姓名</th>
                <th class="table-title">电话号码</th>
                <th class="table-title">邮箱</th>
                <th class="table-type">预订时间</th>
                <th class="table-author am-hide-sm-only">预订人数</th>
                <th class="table-type">留言内容</th>
                <th class="table-set">操作</th>
                <!-- <th class="table-date am-hide-sm-only">修改日期</th> -->
              </tr>
              </thead>
              <tbody>

              <!-- foreach 循环数组 -->
              <?php foreach($list as $k=>$d){?>
              <tr>
                <td><input type="checkbox" /></td>
                <td><?php echo $k+1;?></td>
                <td><?php echo $d['name']; ?></td>
                <td><a href="#"><?php echo $d['phone'];?></a></td>
                <td><a href="#"><?php echo $d['email'];?></a></td>
                <td><?php echo $d['date'].' '.$d['time'];?></td>
                <td class="am-hide-sm-only"><?php echo $d['number'];?></td>
                <td><?php echo $d['message']; ?></td>
                <!-- <td class="am-hide-sm-only">2014年9月4日 7:28:47</td> -->
                <td>
                  <div class="am-btn-toolbar">
                    <div class="am-btn-group am-btn-group-xs">
                     
                      <?php if($d['state']==0) {  ?>

                      <button type="button" onclick="sure(<?php echo $d['id']; ?>)" class="am-btn am-btn-default am-btn-xs am-text-secondary"><span class="am-icon-pencil-square-o"></span> 确认</button>
                      
                      <?php }else{ ?>

                      <button type="button" class="am-btn am-btn-default am-btn-xs am-text-secondary" style="background:#ccc;"><span class="am-icon-pencil-square-o"></span>已确认</button>
                     
                      <?php }?>

                      <!-- <button class="am-btn am-btn-default am-btn-xs am-hide-sm-only"><span class="am-icon-copy"></span> 复制</button> -->
                      <button type="button" onclick="del(<?php echo $d['id'];?>)" class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only"><span class="am-icon-trash-o"></span> 删除</button>
                    </div>
                  </div>
                </td>
              </tr>
              <?php }?>

              </tbody>
            </table>
            <div class="am-cf">
              共 <?php echo $total;?> 条记录
              <div class="am-fr">
                <ul class="am-pagination">
                  <li class="<?php echo $p==1?'am-disabled':'';?>"><a href="?page=<?php echo $p-1;?>">«上一页</a></li>

                  <?php for($i=1;$i<=$tp;$i++){?>
                  <li class="<?php echo $p==$i?'am-active':'';?>"><a href="?page=<?php echo $i;?>"><?php echo $i;?></a></li>
                  <?php }?>

                  <li class="<?php echo $p==$tp?'am-disabled':'';?>"><a href="?page=<?php echo $p+1;?>">下一页»</a></li>
                </ul>
              </div>
            </div>
            <hr />
            <!-- <p>注：.....</p> -->
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
<script src="http://libs.baidu.com/jquery/1.11.1/jquery.min.js"></script>
<script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
<script src="assets/js/amazeui.ie8polyfill.min.js"></script>
<![endif]-->

<!--[if (gte IE 9)|!(IE)]><!-->
<script src="assets/js/jquery.min.js"></script>
<!--<![endif]-->
<script src="assets/js/amazeui.min.js"></script>
<script src="assets/js/app.js"></script>

<!-- layui.js -->
<script src="../lib/layui/layui.js"></script>
<script>
  // 定义函数的关键字
  function del(fid){
    // window 浏览器对象
    var a = window.confirm('您确定删除吗？');   // 弹出确认框
    // console.log(a); //js 打印
    if(a){
      // 点了“确定”，跳转做删除
      location.href = '?act=del&id='+fid;   // 跳转   (act=>操作)
    }
  }


  // 确认函数
  function sure(bid){

    layui.use(['layer'],function(){
        var layer = layui.layer;
        
        // 显示确认框
        layer.confirm('该订单是否确认？', {
          btn: ['确定','取消'] //按钮
        }, function(){
          // 点确定执行的操作
          // layer.msg('的确很重要', {icon: 1});
          location.href = '?act=yd&id='+bid;
        }, function(){
          // 点取消执行的操作
        });
    });

  }
</script>
</body>
</html>


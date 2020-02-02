<?php 
include_once('includens/config.php');

$t=isset($_GET['t'])?$_GET['t']:'动漫资讯';

$p = isset($_GET['page'])?$_GET['page']:1;
$n = 1;
$xb = ($p-1)*$n;

$query = mysqli_query($con,"select * from info where type='$t' order by time desc limit $xb,$n");
$list=array();
while ($data=mysqli_fetch_assoc($query)) {
    $list[] =$data;
}

$query2 = mysqli_query($con,"select count(id) as c from info where type='$t'");
$cinfo = mysqli_fetch_assoc($query2);
$total = $cinfo['c'];
$tp = ceil($total/$n);

if (isset($_GET['act'])) {
    echo json_encode($list);
    exit();
}

 ?>
<!DOCTYPE html>
<html>
<head>
    <title>电影城网站</title>

    <link rel="stylesheet" href="../../../pro2/default.css">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7"/>
<meta name="format-detection" content="telephone=no">
<meta name="renderer" content="webkit">
<meta name="author" content="" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Cache-Control" content="no-siteapp" />
<meta name="description" content="" />
<meta name="keywords" content="" />
<link rel="stylesheet" href="default.css">

</head>
<body>

<?php include_once('header.php');?>
<main>
    <div>
        <div class="main-head">
            <p><span>最新资讯</span></p>
        </div>
    </div>
    <ul class="main-submenu main-submenu-second">
        <li class="<?php echo $t=='动漫资讯'?'active':'';?>"><a href="?t=动漫资讯">动漫资讯</a></li>
        <li class="<?php echo $t=='电影资讯'?'active':'';?>"><a href="?t=电影资讯">电影资讯</a></li>
        <li class="<?php echo $t=='电影站'?'active':'';?>"><a href="?t=电影站">电影站</a></li>
    </ul>
    <div class="article-list-banner"><img src="image/banner6.jpg"></div>
    <ul class="article-list">
        <?php foreach ($list as $v) { ?>
        <li>
            <div class="article-date">
                <strong>06</strong>
                <p><?php echo $v['time']; ?></p>
            </div>
            <div class="article-info">
                <a href="article_list_content.html">
                    <h3><?php echo $v['title']; ?></h3>
                    <p style="display:block;"><?php echo $v['content']; ?></p>
                </a>
            </div>
        </li>
        <?php } ?>
    </ul>
    <section class="article-btn">
        <span class="article-prev-btn"></span>
        <span class="article-next-btn"></span>
    </section>
    <nav aria-label="Page navigation" class="article-page">
        
        <ul class="pagination">
            <li>
            <?php if ($p<$tp) { ?>
                <a href="javaseript:;" aria-label="Next" id="loadmore">
                    <span aria-hidden="true">加载更多</span>
                </a>          
                <?php } ?>
            </li>
        </ul>

    </nav>
</main>

<footer>
    <div>
        <ul class="footer-top">
            <li><a href="index.php">网站首页</a></li>
            <li><a href="article.php">新番资讯</a></li>
            <li><a href="contact.php">在线订票</a></li>
        </ul>
    </div>
    <div>
        <ul class="footer-body">
            <li>
                <span>电话:</span><span>8888-8888888</span>
            </li>
            <li>
                <span>邮箱:</span><span>123@163.com</span>
            </li>
            <li>
                <span>地址:</span><span>广东省广州市XXX大道XXX办公室</span>
            </li>
        </ul>
        <ul class="footer-footer">
            <li><i class="iconfont ">&#xe613;</i></li>
            <li><i class="iconfont ">&#xe634;</i></li>
            <li><i class="iconfont ">&#xe602;</i></li>
        </ul>
    </div>
</footer>



</body>

<script src="lib/jquery/jquery.js"></script>
<script src="lib/bootstrap/bootstrap.js"></script>
<script src="js/main.js"></script>
<script>
var p=1;
var t='<?php echo $t; ?>';
var tp='<?php echo $tp; ?>';

$('#loadmore').click(function(){
    p++;
     $.ajax({
            url:'article.php',
            type:'get',
            data:'act=ajax&page='+p+'&t='+t,
            dataType:'json',
            success:function(res){
               console.log(res);

               var li='';
               for (var k in res) {
                   // res[k].title
                li+='<li><div class="article-date"><strong>06</strong><p>'+res[k].time+'</p></div><div class="article-info"><a href="article_list_content.html"><h3>'+res[k].title+'</h3><p style="display:block;">'+res[k].content+'</p></a></div></li>';
               }
               $('.article-list').append(li);
                if (p==tp) {
                    $('#loadmore').parent().html(' <p>-----------------------------------我是有底线的人-----------------------------------</p>')

                };
            },
            error:function(){
                alert("网络不行啊，小老弟！");
            }
        });
});

</script>
</html>
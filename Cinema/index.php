<?php
include_once('includens/config.php');

$query = mysqli_query($con,"select * from list where type='动漫' limit 6");
$list=array();
while ($data=mysqli_fetch_assoc($query)) {
    $list [] =$data;
}

$query2 = mysqli_query($con,"select * from list where type='电影' limit 6");
$list2=array();
while ($data2=mysqli_fetch_assoc($query2)) {
    $list2 [] =$data2;
}

$query3 = mysqli_query($con,"select * from list where type='综艺' limit 6");
$list3=array();
while ($data3=mysqli_fetch_assoc($query3)) {
    $list3 [] =$data3;
}

$query4 = mysqli_query($con,"select * from list where type='电视剧' limit 6");
$list4=array();
while ($data4=mysqli_fetch_assoc($query4)) {
    $list4 [] =$data4;
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
<style>
   .main-submenu li.active a{
    color: #e25111;
    border-bottom: 2px solid #e25111;
   }
</style>
</head>
<body>
<?php include_once('./header.php');?>
<main class="main-first-bgcolor">
    <div>
        <div class="main-head">
            <p>
                <span>影视推荐</span>
            </p>
        </div>
        <div class="main-we-provide">
            <ul>
                <li><a href=""><span><img src="image/lz.jpg" width="600px;" height="300px;" alt=""></span></a>
                    <h2>龙珠超</h2>
                    <p>《龙珠》新系列动画的舞台为悟空与魔人布欧的壮绝战斗结束后，地球重新恢复和平之后发生的故事。与自漫长沉睡中...</p></li>
                <li><a href=""><span><img src="image/nz.jpg" alt=""></span></a>
                    <h2>哪吒之魔童降世</h2>
                    <p>《哪吒之魔童降世》是由霍尔果斯彩条屋影业有限公司出品的动画电影，由饺子执导兼编剧...</p></li>
                <li><a href=""><span><img src="image/xh.jpg" alt=""></span></a>
                    <h2>中国新说唱</h2>
                    <p>《中国新说唱》是一档由爱奇艺自制的S+级华语青年说唱音乐真人秀节目。网罗华语乐坛最具实力的说唱音乐人，引领青年文化传播说唱正能量...</p></li>
            </ul>
        </div>
    </div>

    <div>
        <div class="main-head">
            <p>
                <span>精彩瞬间</span>
            </p>
        </div>
    </div>
</main>
<main>
    <img class="mdbanner" src="image/a0.jpg" height="300px;">
</main>
<main>
    <div class="main-body">
        <p><span>每一影片都经过我们的精挑细选，关于电影我们只选最好看、经典、优质的，只为一份对极致视觉体验的追求，这是我们不变的宗旨。</span></p>
        <ul class="main-body-img">
            <li><img src="image/a1.jpg"></li>
            <li><img src="image/a2.jpg"></li>
            <li><img src="image/a3.jpg"></li>
            <li><img src="image/a4.jpg"></li>
            <li><img src="image/a5.jpg"></li>
            <li><img src="image/a6.jpg"></li>
            <li><img src="image/a7.jpg"></li>
            <li><img src="image/a8.jpg"></li>
            <li><img src="image/a9.jpg"></li>
        </ul>
    </div>
</main>
<main>
    <ul class="main-submenu">
        <li class="active"><a href="#">动漫</a></li>
        <li><a href="#">电影</a></li>
        <li><a href="#">综艺</a></li>
        <li><a href="#">电视剧</a></li>
    </ul>
    <ul class="main-submenu-info main-submenu-first food-list">
    <?php foreach ($list as $v) {?>
        <li><a href="#">
            <div class="food-name">
                <p><?php echo $v['cn_name'];?></p>
            </div>
            <div class="food-price">
                <p>￥<span><?php echo $v['price'];?></span></p>
            </div>
            <div class="img-bg"></div>
            <img src="<?php echo $v['img'];?>"></a></li>
    <?php } ?>
    </ul>

    <ul class="main-submenu-info main-submenu-first food-list" style="display:none;">
    <?php foreach($list2 as $v){ ?>
        <li><a href="#">
            <div class="food-name">
                <p><?php echo$v['cn_name'];?></p >
            </div>
            <div class="food-price">
                <p>￥<span><?php echo $v['price'];?></span></p >
            </div>
            <div class="img-bg"></div>
            <img src="<?php echo $v['img'];?>"></a></li>
            <?php }?>    
    </ul>
     <ul class="main-submenu-info main-submenu-first food-list" style="display:none;">
    <?php foreach($list3 as $v){ ?>
        <li><a href="#">
            <div class="food-name">
                <p><?php echo$v['cn_name'];?></p >
            </div>
            <div class="food-price">
                <p>￥<span><?php echo $v['price'];?></span></p >
            </div>
            <div class="img-bg"></div>
            <img src="<?php echo $v['img'];?>"></a></li>
            <?php }?>      
    </ul>

    <ul class="main-submenu-info main-submenu-first food-list" style="display:none;">
    <?php foreach($list4 as $v){ ?>
        <li><a href="#">
            <div class="food-name">
                <p><?php echo$v['cn_name'];?></p >
            </div>
            <div class="food-price">
                <p>￥<span><?php echo $v['price'];?></span></p >
            </div>
            <div class="img-bg"></div>
            <img src="<?php echo $v['img'];?>"></a></li>
            <?php }?>    
    </ul>

    <a class="more" href="#">MORE</a>
</main>   
<footer style="margin-top:20px;">
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
    $('.main-submenu li').mouseover(function(){
        var i =$(this).index();
        $('.food-list').eq(i).show().siblings('.food-list').hide();
        $(this).addClass('active').siblings().removeClass('active');
    });
</script>
</html>
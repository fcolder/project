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

<link rel="stylesheet" href="lib/layui/css/layui.css">
</head>
<body>

<?php include_once('./header.php');?>
<main>

    <div class="main-head">
        <p><span>在线订票</span></p>
    </div>
    <div class="main-reserve">
        <form action="#" method="post" id="food-reserve" class="layui-form">
            <ul>
                <li>
                    <label for="username">姓名</label>
                    <input type="text" name="name" lay-verify="name" id="username">
                </li>
                <li>
                    <label for="phonenumber">电话号码</label>
                    <input type="text" name="phone" lay-verify="required|phone" lay-reqtext="Are you kidding me? 手机号都不打？" id="phonenumber">
                </li>
                <li>
                    <label for="email">电子邮件</label>
                    <input type="text" name="email" lay-verify="email" id="email">
                </li>
                <li>
                    <label for="time">时间</label>
                    <input type="text" name="time" id="time" lay-verify="required|time" lay-reqtext="Fuck you,man. 你什么时候来吃？" >
                </li>
                <li>
                    <label for="numberofpeople">人数</label>
                    <input type="number" name="number" lay-verify="required" lay-reqtext="请输入人数"  id="numberofpeople">
                </li>
                <li>
                    <label for="date">日期</label>
                    <input type="text" name="date" lay-verify="required" lay-reqtext="请选择日期"  id="date">
                </li>
                <li>
                    <label for="guestbook">留言</label>
                    <input type="text" name="message" id="guestbook">
                </li>
            </ul>
            <!-- <a class="reserve">预定</a> -->
            <button type="submit" class="reserve" style="border:0;" lay-submit="" lay-filter="demo1">预定</button>
            

        </form>
    </div>



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
<script src="js/main.js?m=<?php echo time();?>"></script>

<script src="lib/layui/layui.js"></script>

<script type="text/javascript">
    layui.use(['laydate','form'],function(){
        var d =layui.laydate;
        var f =layui.form;

        d.render({
            elem:'#date'
        })

        d.render({
            elem:'#time'
            ,type:'time'
            ,format:'H:m:s'
        });

        f.verify({
            name:function(v){
                if (v.length<2) {
                    return "？？？姓名至少2个字";
                }
            }
        });

        f.on('submit(demo1)',function(data){
            console.log(data);
            var index = layer.load(0,{shade:false});

            $('.reserve').prop('disabled',true);

            $.ajax({
                url:'http://wyf.com/yd.php',
                type:'post',
                data:data.field,
                success:function(res){
                   if (res=='no') {
                     layer.alert('选择的日期已预订，请重新修改',{
                        skin:'layui-layer-molv'
                        ,closeBtn:0
                     });
                   } else{
                    layer.alert('预订成功',{
                        skin:'layui-layer-lan'
                        ,closeBtn:0
                        ,anim:4
                    });
                   }
                   layer.close(index);
                   $('.reserve').prop('disabled',false);
                },
                error:function(){
                    alert("网络不行啊，小老弟！");
                }
            });
            return false;
        });
    });
</script>
</html>
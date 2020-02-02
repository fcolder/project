<!-- sidebar start -->
<?php 
  //获取文件名称
$file = $_SERVER['REQUEST_URI'];
 ?>
<div class="admin-sidebar am-offcanvas" id="admin-offcanvas">
<div class="am-offcanvas-bar admin-offcanvas-bar">
  <ul class="am-list admin-sidebar-list">
    <li><a href="index.php"><span class="am-icon-home"></span> 首页</a></li>
    <li class="admin-parent">
      <a class="am-cf" data-am-collapse="{target: '#collapse-nav'}"><span class="am-icon-file"></span> 电影管理 <span class="am-icon-angle-right am-fr am-margin-right"></span></a>
      <ul class="am-list am-collapse admin-sidebar-sub am-in" id="collapse-nav">
        

        <li><a href="add_food.php" class="am-cf"><span class="am-icon-check"></span> 添加电影
          <?php if(strpos($file, 'add_food')){ ?>
          <span class="am-icon-star am-fr am-margin-right admin-icon-yellow"></span>
          <?php } ?>
        </a></li>
        <li><a href="food_list.php"><span class="am-icon-table"></span> 电影列表
          <?php if(strpos($file, 'food_list')){ ?>
          <span class="am-icon-star am-fr am-margin-right admin-icon-yellow"></span>
        <?php } ?>
        </a></li>

      </ul>
    </li>
     <li class="admin-parent">
      <a class="am-cf" data-am-collapse="{target: '#collapse-nav2'}"><span class="am-icon-file"></span> 电影资讯 
      <span class="am-icon-angle-right am-fr am-margin-right"></span></a>
      <ul class="am-list am-collapse admin-sidebar-sub am-in" id="collapse-nav2">
        <li><a href="add_info.php" class="am-cf"><span class="am-icon-check"></span> 添加资讯
        <?php if(strpos($file, 'add_food')){ ?>
        <span class="am-icon-star am-fr am-margin-right admin-icon-yellow"></span>
        <?php } ?>
      </a></li>
       <li><a href="info_list.php"><span class="am-icon-table"></span> 咨询列表
       <?php if(strpos($file, 'food_list')){ ?>
        <span class="am-icon-star am-fr am-margin-right admin-icon-yellow"></span>
        <?php } ?>
        </a></li>
      </ul>
    </li>
    <li><a href="order_list.php"><span class="am-icon-home"></span> 预定订单</a></li>

    <li><a href="logout.php"><span class="am-icon-sign-out"></span> 注销</a></li>
  </ul>

  <div class="am-panel am-panel-default admin-sidebar-panel">
    <div class="am-panel-bd">
      <p><span class="am-icon-bookmark"></span> 公告</p>
      <p>享受极致的视觉体验。—— Cinema UI</p>
    </div>
  </div>

</div>
</div>
<!-- sidebar end -->
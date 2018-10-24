<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
    body {
	margin: 0;
	padding: 0;
	font-family:"Microsoft YaHei", "微软雅黑", "consolas";
}
a {
	text-decoration: none;
	color: #000;
}

.clearfix { 
  *zoom: 1; 
}
.clearfix:before, .clearfix:after { 
  display: table; 
  line-height: 0; 
  content: "";
}
.clearfix:after { 
  clear: both;
} 

.navbar {
    background: url(../images/index/header_shadow.png) no-repeat left top;
    background-size: 100% 54px;
}
.container {
	width: 1000px;
	margin: 0 auto;
}
.navbar .navbar-content a {
	color: #FFF;
	line-height: 54px;
	display: inline-block;
	width: 100px;
	text-align: center;
}
.navbar .navbar-content a:hover {
	color: #CCC;
}

.index-bg {
	width: 100%;
	height: 500px;

	position: absolute;
	top: -50px;
	z-index: -10;
}

.news-list {
	margin: 50px 0;
	background-color: #FFF;
	border-radius: 5px;
	border: 1px solid #DDD;
	padding: 30px 20px;

	min-height: 300px;
}
.news-list:hover {
	box-shadow: 0 0 5px 3px #CCC;
}

.about .about-des {
	border-left: 5px solid #CCC;
	margin-top: 15px;
}

.about .about-des p {
	padding-left: 10px;
	line-height: 28px;
	text-indent: 2em;
}

.news-list-left {
	float: left;
	width: 729px;
	margin-bottom: 50px;
}

.news-list-right {
	float: right;
	width: 229px;
}

.news-list-item {
	padding: 20px 30px;
}

.author-time {
	font-size: 14px;
}
.news-des {
	padding-bottom: 20px;
	border-bottom: 2px solid #CCC;
}
.news-title {
	font-size: 23px;
}
.news-title i {
	display: inline-block;
	width: 47px;
	height: 43px;
	margin-right: 10px;
	background:url(../icon/news-title.png) left center no-repeat;
	vertical-align: middle;
}
.news-title a {
	color: green;
}
.news-title a:hover {
	text-decoration: underline;
}
.news-content-des {
	line-height: 28px;
}

.copyright {
	clear: both;
	text-align: center;
	color: gray;

	border-top: 2px solid #CCC;
	margin-top: 50px;
	padding: 20px 0;
}
    </style>
    <title>公告</title>

    <link rel="stylesheet" href="img/css/index.css">
  </head>
  <body>
    
    <img src="../wallpapers/bg.jpg" class="index-bg">
    <div class="container">
      <h1>公告</h1>
      <h4></h4>

      <div class="news-list">
        <div class="news-list-left">
          <div class="news-list-item">
  <form method="post" action="Notice.php">        
  <?php
	header("Content-type=text/html;charset=utf-8");
	$dbname = "yunos";//要访问的数据库
	$conn = @mysql_connect("localhost","root","")or die("链接数据库失败");
	mysql_query("set names utf8");
	mysql_select_db($dbname);
	$sql_total_records = "select count(*) from notice Order By date desc";
	$total_records_result = mysql_query($sql_total_records);
	$total_records = mysql_fetch_row($total_records_result);


	// 获得总页数
	$page_size = 3;
	$total_pages = ceil($total_records[0]/$page_size);



	// 通过GET方式获得客户端访问的页码
	$current_page_number = isset($_GET['page_number'])?$_GET['page_number']:1;


	// 获取到了要访问的页面以及页面大小，下面开始分页
	$begin_position = ($current_page_number-1)*$page_size;
	$sql = "select * from notice limit $begin_position,$page_size";
	$result = mysql_query($sql);
	?>
    <form action="notice.php" method="POST">
    <?php
	// 处理结果集
	while($row = mysql_fetch_array($result)){
    	?>
          <!--作者和时间-->
            <div class="author-time">
              <span><?php echo $row['pub']; ?></span> 发表于 <span><?php echo $row['date']; ?></span>
            </div>
            <div class="news-des">
            <!--标题-->
              <h3 class="news-title"><i></i><a href="#"><?php  echo $row['title']; ?></a></h3>
              
              <!--内容-->
              <div class="news-content-des">
                <?php echo $row['content']; ?>
              </div>
              <a href="change.php?id=<?php echo @$row['id'];?>" style="color:#00F">[编辑]&nbsp;</a>
              <a href="delete.php?id=<?php echo @$row['id'];?>" style="color:#00F">[删除]&nbsp;</a>
            </div>
            <!--整个标题内容时间结束位置-->
             <?php }?>
             </div>
        <!--分页-->
        <div align="center">
       <?php
	   
		echo '<a href="notice.php?page_number=1">首页</a>  ';
		echo '<a href="notice.php?page_number='.($current_page_number-1).'">上一页</a>  ';
		for($i=1;$i<=$total_pages;$i++){
		echo '<a href="notice.php?page_number='.$i.'">['.$i.']</a>  '; 
		}
		
		echo '<a href="notice.php?page_number='.($current_page_number+1).'">下一页</a>  ';
		echo '<a href="notice.php?page_number='.($total_pages).'">尾页</a>  ';
		echo "总页数为: ".$total_pages;
		if($current_page_number<1) {
 		$current_page_number =1;
			}
		if($current_page_number>$total_pages){
		$current_page_number = $total_pages;
			}
		echo "目前页码为：".$current_page_number;
		// 释放数据连接资源
		mysql_free_result($result);
		mysql_close($conn);

			?></div>
            </form>
        </div>

        <div class="news-list-right">
          <div class="about">
            <h4>用户信息</h4>
            <div class="about-des">
            <p><img src="../icon/user.png" width="50px" height="50px"></p>
              <p>用户名：<?php @session_start(); echo @$_SESSION['name']; ?></p>
                <p>年龄:<?php echo @$_SESSION['age']?></p>
                 <p>注册日期: :<?php echo @$_SESSION['date']?></p>
                  <p><button onClick="window.location.href='add.php' ">发布消息</button></p>
               
            </div>
          </div>
        </div>

        <footer class="copyright">
          Copyright &nbsp; 2018 DreamBoy All rights reserved.
        </footer>
      </div>
    </div>
  </body>
</html>
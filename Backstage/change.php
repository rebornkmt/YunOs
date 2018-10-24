
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

	min-height: 500px;
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
    
      <div class="news-list">
   <?php
    require'link.php';   
 	$id=$_GET['id'];
	$query="SELECT * FROM `notice` WHERE id =".$id;
	$result=mysql_query($query);
	while ($rs=mysql_fetch_array($result)){
	?>
	<FORM METHOD="POST" ACTION="poc.php">
    <input type="hidden" name="id" value="<?=$rs['id']?>">
    
    <h5>标题：</h5><INPUT TYPE="text" NAME="title" value="<?=$rs['title']?>" style="width:70%;"/><br />
    <h5>内容：</h5><TEXTAREA NAME="content" ROWS="20" COLS="100"><?=$rs['content']?></TEXTAREA><br />
    <INPUT TYPE="submit" name="submit" value="修改" style="width:10%; margin-left:66%"/>
</FORM>
<?php }?>
       <button onClick="javascript :history.back(-1);">返回上一页</button>    
        </div>
         

        <footer class="copyright">
          Copyright &nbsp; 2018 DreamBoy All rights reserved.
        </footer>
      </div>
    </div>
  </body>
</html>




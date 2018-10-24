<?php  
@session_start();
$con=@mysql_connect("localhost","root","")or die("链接数据库失败");
mysql_select_db("yunos",$con)or die("打开数据库失败");
mysql_query("set names 'UTF8' ");

?>
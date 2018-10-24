<script>alert("是否进行删除？执行后将无法还原！");</script>
<?php
include 'link.php';
$id = $_GET['id'];
$query="delete from notice where id=".$id;
mysql_query($query);
?>
<?php 
//页面跳转，实现方式为javascript
$url = "Notice.php";
echo "<script language='javascript' type='text/javascript'>";
echo "window.location.href='$url'";
echo "</script>";
?>
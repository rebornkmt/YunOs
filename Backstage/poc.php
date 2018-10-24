<script>alert("是否保存此次修改？");</script>
<?php
include 'link.php';
$query="update notice set title='$_POST[title]',content='$_POST[content]' where id='$_POST[id]'";
mysql_query($query);
?>

<script>alert("修改成功!");</script>

<?php 
//页面跳转，实现方式为javascript
$url = "Notice.php";
echo "<script language='javascript' type='text/javascript'>";
echo "window.location.href='$url'";
echo "</script>";
?>
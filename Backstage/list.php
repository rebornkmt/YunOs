<?php session_start(); ?>
<?php include("link.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>显示留言</title>
	<style type="text/css">
	table{font-size: 14px;}
	.tb {width: 300px; text-align: center;}
	</style>
</head>
<body>
<table border="1" cellspacing="0" cellpadding="0" class="tb">
	<tr>
	<td><a href="reg.php">注册</a></td>
	<td><a href="login.php">登录</a></td>
	<td><a href="mess.php">发布留言</a></td>
	<td><a href="list.php">显示留言</a></td>
	<?php if(isset($_SESSION["name"])) { ?>
	<td><a href="list.php?act=logout">退出</a></td>
	<?php } ?>
	</tr>
</table>
<br>
	<table border="1" cellspacing="0" cellpadding="0">
	<?php
	$sql="select * from call";
	$query=mysql_query($sql);
	while($row=mysql_fetch_array($query)){
	?>
	<tr><td>标题：<?php echo $row["name"];?>&nbsp;&nbsp;<?php echo $row["sex"];?>&nbsp;&nbsp;<?php echo $row["m_date"];?></td></tr>
	<tr><td width="400px" height="100"><?php echo $row["age"];?></td></tr>
	<?php
	}
	?>
	</table>	
</body>
</html>
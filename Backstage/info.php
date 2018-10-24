<!DOCTYPE html>
<html>
<head>
<title>用户信息</title>
<link href="../css/info.css" rel="stylesheet" type="text/css" />
</head>
<body class="loginbody">
<div class="dataEye">
	<div class="loginbox registbox">
		
		<div class="login-content reg-content">
			<div class="loginbox-title">
				<h3>用户信息</h3>
			</div>
           
			<form id="signupForm">
			<div class="login-error"></div>
			<div class="row">
				<label>用户名：</label><label><?php @session_start(); echo @$_SESSION['name']; ?></label>
			</div>
			<div class="row">
				<label>年龄：</label><label><?php echo @$_SESSION['age']; ?></label>
			</div>
			<div class="row">
				<label>注册日期：</label><label><?php @session_start(); echo @$_SESSION['date']; ?></label>
			</div>
			<div class="row">
				<label>邮箱：</label><label>未填写</label>
			</div>
			<div class="row">
				<label>住址：</label><label>未填写</label>
			</div>
			<div class="row">
				<label>个人介绍：</label>
			</div>
			<div class="row">
				<label>未填写</label>
			</div>


</body>
</html>


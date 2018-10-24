<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
</head>
<body>
<?php  
   @session_start();
    header("Content-type=text/html;charset=utf-8");
    if(isset($_POST["submit"]) && $_POST["submit"] == "登陆")  
    {  
        $user = $_POST["username"];  
        $psw = $_POST["password"];  
		$age;
		$date;
        if($user == "" || $psw == "")  
        {  
            echo "<script>alert('请输入用户名或密码！'); history.go(-1);</script>";  
        }  
        else  
        {  
            @mysql_connect("localhost","root","");  
            @mysql_select_db("yunos");  
            @mysql_query("set names 'utf8'");  
            $sql = "select * from user where name = '$_POST[username]' and pwd = '$_POST[password]'";  
            $result = mysql_query($sql);  
            $num = mysql_num_rows($result);  
            if($num)  
            {  
                $row = mysql_fetch_array($result);  //将数据以索引方式储存在数组中
				$_SESSION['name']=$user;
				
				$sql2= "select * from user where name = '$_POST[username]'";  
				$result2 = mysql_query($sql2);  
            	$num2 = mysql_num_rows($result2);
				$row2 = mysql_fetch_array($result2);
				$age=$row2['age'];  
				$date=$row2['date'];
				$_SESSION['age']=$age;
				$_SESSION['date']=$date;
                echo "<script>alert('登录成功！正在跳转..');window.location.href='index.php'</script>";
            }  
            else  
            {  
                echo "<script>alert('用户名或密码不正确！');history.go(-1);</script>";  
            }  
        }  
    }  
    else  
    {  
        echo "<script>alert('提交未成功！'); history.go(-1);</script>";  
    }  
  
?>  
</body>
</html>
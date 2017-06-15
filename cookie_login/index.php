<?php 
	//有提交
	if(!empty($_POST)){
		//判断是否保存用户名和密码
		if($_POST['savetime']!=0){
			setcookie('user',$_POST['user'],time()+$_POST['savetime']*24*60*60);
			setcookie('pwd',$_POST['pwd'],time()+$_POST['savetime']*24*60*60);
				echo "<pre>";
				var_dump($_COOKIE);
				echo "</pre>";
		}
	
	//登录状态
	 setcookie('status',1);
	 header("location:jump.php");

	}
	
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form action="" method="post">
		用户名：<input type="text" name="user" value="<?php echo isset($_COOKIE['user'])?$_COOKIE['user']:''; 
		?>" ><br>
		密&nbsp;&nbsp;&nbsp;码：<input type="password" name="pwd" value="<?php echo isset($_COOKIE['pwd'])?$_COOKIE['pwd']:''; 
		?>"><br>
		记住密码：<input type="radio" name="savetime" value="1">一天
		<input type="radio" name="savetime" value="7">一周
		<input type="radio" name="savetime" value="30">一月
		<input type="radio" name="savetime" value="0" checked="">不保存<br>
		<input type="submit">
	</form>
</body>
</html>
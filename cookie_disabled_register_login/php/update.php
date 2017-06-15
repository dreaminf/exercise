<?php 
	header("content-type:text/html;charset=utf-8");

	if(isset($_GET['PHPSESSID'])){
		//接收sid
		$sid=$_GET['PHPSESSID'];
		//重载sid
		session_id($sid);
	}	
	//启动session
	session_start();
	include("function.php");
	if(empty($_SESSION['user'])){
		echo "您还没有登录，请登录！";
		header("refresh:1;url=../login.html");
		exit();
	}
	$user=read($_SESSION['user']);
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>修改———update</title>
</head>
<body>
	<h1>修改资料</h1>
	<form action="account.php" method="post">
		用户名：<input type="text" name="user" value="<?php echo $user[0]; ?>" disabled><br>
		密码：<input type="password" name="pwd" value="<?php echo $user[1]; ?>"><br>
		手机号：<input type="text" id="utel" class="ucheck" name="tel" value="<?php echo $user[2]; ?>"><span></span><br>
		邮箱：<input type="email" id ="uemail" class="ucheck" name="email" value="<?php echo $user[3]; ?>"><span></span><br>
		性别：<input type="radio" name="sex" value="male">男
				<input type="radio" name ="sex" value="female">女	
		<br>
		<input type="hidden" name="type" value="update">
		<input type="submit"  id="update" disabled>
		<input type="button" value="返回" onclick="history.back()">
	
	</form>

	<script>
		//判断性别，显示输出
		var sexcheck=document.getElementsByName("sex");	
		if("<?php echo $user[4];?>"==sexcheck[0].value){
			console.log("male");
			sexcheck[0].checked=true;
		}else{
			console.log("female");
			sexcheck[1].checked=true;
		}
	</script>
	<script src="../js/update.js"></script>
</body>
</html>
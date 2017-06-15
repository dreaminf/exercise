<?php 
	header("content-type:text/html;charset=utf-8");
	if(isset($_GET['PHPSESSID'])){
		//接收sid
		$sid=$_GET['PHPSESSID'];
		//重载sid
		session_id($sid);
	}
	//启动session;
	session_start();
	include("function.php");
	// if(empty($_COOKIE['user'])){
	// 	echo "您没有登录，请登录！";
	// 	//1秒后页面刷新到指定路径
	// 	header("refresh:5;url=login.html");
	// 	exit();
	// }
	// echo $_COOKIE['user']."欢迎回来！";
	// $user=read($_COOKIE['user']);
	

	if(empty($_SESSION['user'])){
		echo "您没有登录，请登录！";
		//1秒后页面刷新到指定路径
		header("refresh:1;url=../login.html");
		exit();
	}

	echo $_SESSION['user']."欢迎回来！";
	$user=read($_SESSION['user']);
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<ul>
		<li>用户名:<?php echo $user[0]; ?></li>
		<li>密码:<?php echo $user[1]; ?></li>
		<li>手机:<?php echo $user[2]; ?></li>
		<li>邮箱:<?php echo $user[3]; ?></li>
		<li>性别:<?php echo $user[4]; ?></li>
	</ul>
	<a href="update.php?<?php echo SID; ?>">修改资料</a>
	<!-- <a href="logout.php?sid=<?php echo $sid; ?>">退出</a> -->
	<a href="logout.php?<?php echo SID; ?>">退出</a>
</body>
</html>
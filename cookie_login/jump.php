<?php 
header("content-type:text/html;charset=utf-8");
	if(empty($_COOKIE['status'])){
		echo "请登录";
		header("refresh:1;url=index.php");
		exit();
	}
	echo "登录成功！";
	
 ?>
 <a href="logout.php">退出</a>
<?php 
	header("content-type:text/html;charset=utf-8");
	if(empty($_COOKIE['status'])){
		echo "您已退出或还未登录！";
		header("Refresh:1;url=index.php");
		exit();
	}
	setcookie("status",null,time()-1);
	echo "退出成功！";
	header("refresh:1;url=index.php");

 ?>
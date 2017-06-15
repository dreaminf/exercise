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
	// 清除cookie 
	// setcookie()内有六个参数
	// setcookie("user",null,time()-1);
	//修改cookie
	//清除session
	$_SESSION=array();
	session_destroy();
	echo "退出成功";
	header("refresh:1;url=../login.html");
?>
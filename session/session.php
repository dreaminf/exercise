<?php 
	//1.启动session
	// session_start();//当前页面有效 放在开头写以便

	// echo $_COOKIE['PHPSESSID'];
	 // echo session_id();
	//2.设置session
	//第七个超全局变量
	// $_SESSION['name']='value'; //可以保存任何数据类型
	// //3.读取session
	// // echo $_SESSION['name'];
	// //4.删除session
	// $_SESSION['name']=null;//1
	// unset($_SESSION['name']);//2
	// $_SESSION=array();//3. 注销session数组
	// session_destroy();//4.销毁session
	// //如果删除整个session用3,4；删除单个用1,2，推荐用2；


 ?>
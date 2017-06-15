<!-- //自动传递 时类似 a标签可行及form 表单的隐藏域可行（自动添加） -->
<?php
	//cookie禁用时 
	//自动传递 session 
	ini_set("session.use_only_cookies","0");
	ini_set("session.use_trans_sid","1");
	session_start();
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Document</title>
 </head>
 <body>
 	<form action=""></form>
	<a href="look.php">链接</a> 
 </body>
 </html>

<?php 
	
	header("content-type:text/html;charset=utf-8");
	session_start();
	// $sid=session_id();
	include("function.php");
	$fdl=fopen("../datafile/systems.txt", "r");
	if(!empty($_POST)){
		$fsizel=filesize("../datafile/systems.txt");
		if($fsizel==0){//若文件大小为0，先写入
			fclose($fdl);
			alert("没有注册，请先注册！","../register.html");
		}else{//否则读取做判断
			$dataAlll=trim(fread($fdl,$fsizel));//读取文件内容并两头去空
			$arrdatal=explode("\r\n",$dataAlll);//转成1维数组
			foreach ($arrdatal as $k3 => $v3) {
				$arrdatal[$k3]=explode("\t",$v3); //转成二维数组
			}
			/**
			 * 判断用户名和密码是否与文件数据相等
			 * 文件全部循环完毕，后如果没有相等，则判断为登录名或密码错误
			 */
			foreach ($arrdatal as $k4 => $v4) {
				if($v4[0]===$_POST['user_login']&&($v4[1]===$_POST['pwd_login'])){
					// setcookie("user",$v4[0]);
					$_SESSION['user']=$v4[0];
					// var_dump($v4[0]);
					// echo "<br>";
					// var_dump($_COOKIE['user']);
					fclose($fdl);
					alert("登录成功！");
					// die();
					// header("location:person.php?sid=$sid");
					header("location:person.php?".SID);
					exit();	
				}
				
			}
			fclose($fdl);
			alert("用户名或密码错误","../login.html");
		}
			
	}else{
		fclose($fdl);
		alert("请登录！","../login.html");
	}
 ?>
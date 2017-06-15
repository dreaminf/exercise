<?php 
	header("content-type:text/html;charset=utf-8");
	include("function.php");
	//文件操作
	if(!file_exists("../datafile/systems.txt")){
		$fd=fopen("../datafile/systems.txt", "x+");
	}else{
		$fd=fopen("../datafile/systems.txt", "a+");
	}
	if(!empty($_POST)){
		$fsize=filesize("../datafile/systems.txt");
		$infos=$_POST['user']."\t".$_POST['pwd']."\t".$_POST['phoneNum']."\t".$_POST['email']."\t".$_POST['sex']."\r\n";
		if($fsize==0){//若文件大小为0，先写入
			fwrite($fd, $infos);
			fclose($fd);
			alert("注册成功!请登录！","../login.html");
		}else{//否则读取做判断
			$dataAll=trim(fread($fd,$fsize));//读取文件内容并两头去空
			$arrdata=explode("\r\n",$dataAll);//转成1维数组
			foreach ($arrdata as $k1 => $v1) {
				$arrdata[$k1]=explode("\t",$v1); //转成二维数组
			}
			foreach ($arrdata as $k2 => $v2) {
				if($v2[0]===$_POST['user']){
					fclose($fd);
					alert("用户名重复！","../register.html");
				}
				if($v2[2]===$_POST['phoneNum']){
					fclose($fd);
					alert("手机号重复！","../register.html");
				}
				if($v2[3]===$_POST['email']){
					fclose($fd);
					alert("邮箱重复！","../register.html");
				}
				if($k2==(count($arrdata)-1)){
					fwrite($fd,$infos);
					fclose($fd);
					alert("注册成功！","../login.html");
				}
				
			}
		}
			
	}else{
		fclose($fd);
		alert("请先注册！","../register.html");
	}
	
 ?>
<?php 
	/**
	 * alert()
	 * 弹框并跳转
	 * $msg $url
	 * 登录注册时操作使用
	 */
	function alert($msg,$url=""){
		echo "<script>
			alert('$msg');
			window.location.href='$url';
		</script>";
	}




define("FILE_NAME","date.txt");
	function testUser($user){
		if(!file_exists){
			return true;
		}else{
			if(is_array(read($user))){
				return false;
			}else{
				return ture;
			}
		}
	}
	function register($user,$pass){
		$filename="date.txt";
		if(!file_exists(FILE_NAME)){
			$fb=fopen(FILE_NAME,"x+");
			$header="用户名\t密码\r\n";
			fwrite($fb,$header);
		}else{
			$fb=fopen(FILE_NAME,"a+");
		}
		$content=$user."\t".$pass."\r\n";
		fwrite($fb,$content);
		fclose($fb);
		header("location:denglu.html");
	}
	function login($user,$pass){
		if($userArr=read($user)){
			if(strcmp($pass,$userArr[1]===0)){
				//将当前登录的用户用户名保存在cookie里
				setcookie("user",$userArr[0]);
				header("location:person.php");
			}else{
				header("location:login.html");
			}
		}else{
			header("location:login.html");
		}
	}

	function read($user){
		$filename="../datafile/systems.txt";
		if(!file_exists($filename)){
			header("location:../register.html");
		}else{
			$all=file_get_contents($filename);
			$arr=explode("\r\n",$all);
			foreach ($arr as $key => $value) {
				// if($key>0){
					$userArr=explode("\t",$value);
					if(strcmp($userArr[0],$user)===0){
						return $userArr;
					}
				// }
			}return false;
		}
	}

	function delate($user){
		$filename="../datafile/systems.txt";
		// 1.读取文件信息
		if($userArr=read($user)){
			$userstr=implode("\t",$userArr);
			$userstr .="\r\n";
		}else{
			die("非法");
		}
		// 2.从文件中执行替换
		$all=file_get_contents($filename);
		$newAll=str_replace($userstr,"",$all);
		file_put_contents($filename,$newAll);
		return ture;
	}

/**
 * updateCheckTE()
 * 修改时，验证 手机号和邮箱，不能重复
 * 手机号重复 return "4"; 邮箱重复 return "5";
 * 成功时返回true；
 */

	 function updateCheckTE($user,$pwd,$tel,$email,$sex){
	 	$filename="../datafile/systems.txt";
	 	$userArr=read($user);
	 	$oldstr=implode("\t",$userArr);
	 	//原来先删除
	 	$newstr="";
	 	$oldall=file_get_contents($filename);
	 	$newall=str_replace($oldstr,$newstr,$oldall);

	 	file_put_contents($filename,$newall);
	 	//再读取查找是否手机号及邮箱重复
	 	$newoldall=trim(file_get_contents($filename));
	 	$newoldArr=explode("\r\n",$newoldall);
	 	
	 	foreach ($newoldArr as $key => $value) {
	 		$newoldArr[$key]=explode("\t",$value);
	 	}
	 	echo "<pre>";
	 	var_dump($newoldArr);
	 	echo "</pre>";
	 	die();
	 	foreach ($newoldArr as $key1 => $value1) {
	 		if($tel==$newoldArr[$key1][2]){
	 			file_put_contents($filename,$oldall);
	 			return "4";
	 			die();
	 		}
	 		if($email==$newoldArr[$key1][3]){
	 			file_put_contents($filename,$oldall);
	 			return "5";
	 			die();
	 		}
	 	}

	 	$newold2all=trim(file_get_contents($filename));
	 	$newold2str=$newold2all."\r\n".$user."\t".$pwd."\t".$tel."\t".$email."\t".$sex."\r\n";
	 	if(file_put_contents($filename,$newold2str)){
	 		return true;
	 		die();
	 	}else{
	 		file_put_contents($filename,$oldall);
	 		return false;
	 		die();
	 	}
	}

/**
 * update 
 */
	function update($user,$pass,$tel,$email,$sex){
		$filename="../datafile/systems.txt";
		$userArr=read($user);
		$oldstr=implode("\t",$userArr);
		$newstr=$user."\t".$pass."\t".$tel."\t".$email."\t".$sex;
		$oldall=file_get_contents($filename);
		$newall=str_replace($oldstr,$newstr,$oldall);
		return file_put_contents($filename,$newall)?true:false;
	}
 ?>
<?php 
	header("content-type:text/html;charset=utf-8");
	include("function.php");
	//修改
	if(!empty($_POST)){
		if(strcmp($_POST['type'],"update")===0){

			$s1=updateCheckTE($_COOKIE['user'],$_POST['pwd'],$_POST['tel'],$_POST['email'],$_POST['sex']);

			if($s1=="4"){
				echo "手机号重复！";
				header("refresh:1;url=update.php");
				exit();
			}elseif($s1=="5"){
				echo "邮箱重复！";
				header("refresh:1;url=update.php");
				exit();
			}elseif($s1==true){
				echo "修改成功！";
				header("refresh:1;url=person.php");
				exit();
			}elseif($s1==false){
				echo "修改失败!";
				header("refresh:1;url=update.php");
				exit();
			}
		}

	}

 ?>
<?php 
	if(!empty($_GET)){
		//获取函数名
		$functionName=$_GET['callback'];
		//要返回的json对象
		// $arr=[
		// 	"name"=>"zhang",
		// 	"age" =>18
		// ];
		$json="{
			'name':'zhang',
			'age':18
		}";
		// 组成执行函数的js语句
		echo $functionName."($json)";
	}
 ?>
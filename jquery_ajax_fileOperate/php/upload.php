<?php 
	function ajaxReturn($msg,$code,$path=""){
		$arr=[
			"msg" => $msg,
			"code" => $code,
			"path" => $path
		];
		echo json_encode($arr);
		die();
	}

	if(!empty($_FILES)){
		if($_FILES['img']['error']!==0){
			ajaxReturn("上传错误",400);
		}
		if($_FILES['img']['size']>300*1024){
			ajaxReturn("文件大小超限",400);
		}
		$arrtype=[
			"image/jpeg",
			"image/png",
			"image/gif"
		];
		if(!in_array($_FILES['img']['type'], $arrtype)){
			ajaxReturn("文件类型错误",400);
		}

		$newpath="../upload/img/";
		$filename=uniqid();
		$ext=strrchr($_FILES['img']['name'],".");
		$newname=$newpath.$filename.$ext;
		$tmpname=$_FILES['img']['tmp_name'];
		if(move_uploaded_file($tmpname, $newname)){
			ajaxReturn("上传成功！",200,$newname);
		}else{
			ajaxReturn("上传失败！",350);
		}
	}
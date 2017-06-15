<!-- manage.php -->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>admin_manage_system</title>
	<style>
		span#exite_system{
			color:red;
			font-size: 12px;
			cursor:pointer;
			outline: 1px solid blue;
		}
		table{
			margin:30px auto;
		}
		table>tbody{
			font-size: 16px;
		}
		table>tbody a{
			text-decoration: none;
			color:red;
		}
	</style>
</head>
<body>
<?php 
	include("function.php");
if(empty($_GET)){
	if(empty($_POST)){
		alert("请登录管理账户！","../manage_login.html");
		die();
	}
	if($_POST['admin_account']!="admin"){
		alert("账户名错误！","../manage_login.html");
		die();
	}
	if($_POST['admin_pwd']!="admin"){
		alert("密码错误！","../manage_login.html");
		die();
	}
	if(filesize('../datafile/systems.txt')==0){
		alert("数据库为空！请先注册","../register.html");
		die();
	}
	echo "<script>
			alert('登录成功！');
	</script>";
}
if(filesize('../datafile/systems.txt')==0){
		alert("数据库为空！请先注册","../register.html");
		die();
	}
?>	
	<table border="2" cellspacing="0">
		<thead>
			<tr>
				<th>用户名</th>
				<th>密码</th>
				<th>手机号码</th>
				<th>邮箱</th>
				<th>性别</th>
				<th>操作</th>
			</tr>
		</thead>
		<tbody>
			<?php 
				$all=trim(file_get_contents("../datafile/systems.txt"));
				$rowarr=explode("\r\n",$all);
				foreach ($rowarr as $key => $value) {
					$rowarr[$key]=explode("\t",$value);
				}
				for($i=0;$i<count($rowarr);$i++){

			?>
				<tr>
					<td><?php echo trim($rowarr[$i][0]); ?></td>
					<td><?php echo trim($rowarr[$i][1]); ?></td>
					<td><?php echo trim($rowarr[$i][2]); ?></td>
					<td><?php echo trim($rowarr[$i][3]); ?></td>
					<td><?php echo trim($rowarr[$i][4]); ?></td>
					<td><a href="delete.php?user=<?php echo $rowarr[$i][0];?>" onclick="javascript:return alert('确认删除吗？');">删除</a></td>
				</tr>
			<?php
				}
			 ?>
		</tbody>
	</table>

	<span id="exite_system">退出系统</span>
	<script>
		document.getElementById("exite_system").onclick=function(){
			window.location.href="../manage_login.html";
		}
	</script>
 </body>
</html>

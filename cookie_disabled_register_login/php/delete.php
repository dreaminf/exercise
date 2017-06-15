<?php 
	header("content-type:text/html;charset=utf-8");
	include("function.php");
	delate($_GET['user']);
	header("location:manage.php?check='1'");
 ?>
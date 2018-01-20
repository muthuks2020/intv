<?php 
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin</title>
</head>
<?php
include_once("connection.php");
?>
<body>
<?php
if($_REQUEST['submit'] !='')
{
	//$username=$_POST['username'];
	$pass=$_POST['password'];
	$sql = mysql_query("SELECT password FROM `userlogin` ORDER BY id DESC LIMIT 1") or die(mysql_error());
	$row = mysql_fetch_array($sql);
	
	
//	$sql= mysql_query("SELECT * FROM `userlogin` WHERE `username`='".mysql_real_escape_string($username)."' AND `password`='".mysql_real_escape_string($pass)."'") or die(mysql_error());
	//$sql= mysql_query("SELECT * FROM `userlogin` WHERE `password`='".mysql_real_escape_string($pass)."' ORDER BY id DESC") or die(mysql_error());
	 $num = mysql_num_rows($sql);
	
	
	if($row['password'] != $pass)
	{
//		$unsucc = "You are provide Invalid Password Details";	
//		header("location:index.php?unsuccess=".$unsucc);
		header("location:index.php?unsuccess");
	}
	else
	{
		header("location:employee.php");	
	}
}
?>
</body>
</html>
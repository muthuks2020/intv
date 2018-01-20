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
	$username=$_POST['username'];
	$pass=$_POST['password'];
	$sql= mysql_query("SELECT * FROM `login` WHERE `username`='".mysql_real_escape_string($username)."' AND `password`='".mysql_real_escape_string($pass)."'") or die(mysql_error());
	$num = mysql_num_rows($sql);
	$row = mysql_fetch_array($sql);
	
	if($num <= 0)
	{
		$unsucc = "You are provide Invalid login Details";	
		header("location:index.php?unsuccess='".$unsucc."'");
	}
	else
	{
		
		 $_SESSION['username'] = $row['username'];
		 header("location:success.php");	
	}
}
?>
</body>
</html>
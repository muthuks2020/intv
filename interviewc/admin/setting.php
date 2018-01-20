<?php
session_start();

if(isset($_SESSION['username']) !='')
{
	

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin</title>
<link href="assets/css/admin.css" rel="stylesheet" type="text/css">
<link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
  <script>
function Validation()
{
	
	document.getElementById('password1').innerHTML="";
	
	  if( document.admin.password.value == "" )
   {
     //alert( "Please provide your Contact number!" );
	  document.getElementById('password1').innerHTML="Please Enter Password!"; 
     document.admin.password.focus() ;
     return false;
   }
    
   return( true );
}
</script>
</head>

<body>
<?php
include_once("connection.php");
?>
<?php

if($_POST['password'] !='')
{
	
	$pass = $_POST['password'];
	$sql = mysql_query("INSERT INTO `userlogin` (`password`) VALUES ('".$pass."')") or die(mysql_error());
	$succ = "Submited value Successfully Submited";
	//$_SESSION['success'] = $succ;
	header('location:setpassword.php?success='.$succ);
}

?>


<?php
}
else
{
	header('location:index.php');	
}
?>

</body>
</html>
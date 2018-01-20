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
//include_once("connection.php");

?>
<?php


?>

<div class="page-header">
        <h2>
          Manage Admin <img style="float:right" src="assets/img/logo-1.png" /><span style="float:right; margin-right:25px; color: #7F7F7F; font-family: Verdana,Arial,Helvetica,sans-serif;
    font-size: 10px; padding-right: 5px;"><?php echo "Welcome ". ucfirst($_SESSION['username'])?>  <a href="logout.php"><img src="assets/img/logout.png" title="Logout"/></a></span>
         </h2>
 </div>
 <!--<div class="menu">
   <ul class="nav nav-pills">
  		<li class="active"><a href="setPassword.php">To Set User Password</a></li>
  	</ul>
   </div>-->	

<div class="container login">
	
    	<form action="setting.php" method="post" name="admin"  onsubmit="return Validation()" class="form-signin">
	
        	<h2 class="form-signin-heading">To Set User Password</h2>
           <input type="text" name="password" id="password" placeholder="Password">&nbsp;<span class="error" id="password1"></span><br/>
           <div style="width:389px; margin:0 auto; margin-bottom:10px; color:#093"><?php if(isset($_REQUEST['success']) !='') { echo $_REQUEST['success']; }?></div> 
           <input type="submit" name="submit" value="Submit" class="btn btn-large btn-primary"/>
        
    </form>
    

</div>
<?php
}
else
{
	header('location:index.php');	
}
?>

</body>
</html>
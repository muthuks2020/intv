<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin</title>
<link href="assets/css/admin.css" rel="stylesheet" type="text/css">
<link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css">

<script>
function Validation()
{
	document.getElementById('username1').innerHTML=""; 
	document.getElementById('password1').innerHTML="";
	
	if( document.admin.username.value == "" )
   {
     //alert( "Please provide your name!" );
	 document.getElementById('username1').innerHTML="Please Enter Username!"; 
     document.admin.username.focus() ;
     return false;
   }
   if( document.admin.password.value == "" )
   {
     //alert( "Please provide your Contact number!" );
	  document.getElementById('password1').innerHTML="Please Enter Password!"; 
     document.admin.password.focus() ;
     return false;
   }
    
   return(true);
		
}
</script>
</head>
<?php
include_once("connection.php");
?>
<body>
<div class="page-header">
        <h2>
          Admin Login Panel <img style="float:right" src="assets/img/logo-1.png" />
         </h2>
      </div>
<body>

    
 
<div class="container login">
	
    	<form action="check.php" method="post" name="admin"  onsubmit="return Validation()" class="form-signin">
	
        	<h2 class="form-signin-heading">Login</h2>
           <input type="text" name="username" id="username" placeholder="Username">&nbsp;<span class="error" id="username1"></span>
           <input type="password" name="password" id="password" placeholder="Password">&nbsp;<span class="error" id="password1"></span><br/>
           <div style="width:389px; margin:0 auto; margin-bottom:10px; color:red"><?php if(isset($_REQUEST['unsuccess']) !='') { echo $_REQUEST['unsuccess']; }?></div>    
           <input type="submit" name="submit" value="Submit" class="btn btn-large btn-primary"/>
        
    </form>
    

</div>
<!--container-->
    <script src="<?php echo base_url(); ?>assets/js/jquery-1.7.1.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>


</body>
</html>
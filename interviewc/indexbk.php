<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin</title>
<link href="assests/css/admin.css" rel="stylesheet" type="text/css">
<link href="assests/css/bootstrap.css" rel="stylesheet" type="text/css">
<script src="assests/js/jquery-1.7.1.min.js"></script>
<script src="assests/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="assests/themes/jquery-ui.css">
<script src="assests/js/jquery-1.10.2.js"></script>
<script src="assests/ui/jquery-ui.js"></script>
  
<script>
function Validation()
{
	//document.getElementById('username1').innerHTML=""; 
	document.getElementById('password1').innerHTML="";
	
	/*if( document.admin.username.value == "" )
   {
     //alert( "Please provide your name!" );
	 document.getElementById('username1').innerHTML="Please Enter Username!"; 
     document.admin.username.focus() ;
     return false;
   }*/
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
 <script>
  $(function() {
    $( "#dialog" ).dialog({
      autoOpen: false,
      show: {
        effect: "blind",
        duration: 1000
      },
      hide: {
        effect: "explode",
        duration: 1000
      }
    });
 
  // $( "#opener" ).click(function() {
      $( "#dialog" ).dialog( "open" );
 //   });
  });
  </script>
</head>
<?php
include_once("connection.php");
?>
<body>
<div class="page-header">
        <h2>
          Employee Login <img style="float:right" src="assests/img/logo-1.png" />
         </h2>
      </div>
<body>

    
 
<!--<div class="container login">
	
    	<form action="check.php" method="post" name="admin"  onsubmit="return Validation()" class="form-signin">
	
        	<h2 class="form-signin-heading">Login</h2>
           <input type="text" name="username" id="username" placeholder="Username">&nbsp;<span class="error" id="username1"></span>
           <input type="password" name="password" id="password" placeholder="Password">&nbsp;<span class="error" id="password1"></span><br/>
           <div style="width:389px; margin:0 auto; margin-bottom:10px; color:red"><?php if(isset($_REQUEST['unsuccess']) !='') { echo $_REQUEST['unsuccess']; }?></div>    
           <input type="submit" name="submit" value="Submit" class="btn btn-large btn-primary"/>
        
    </form>
    

</div>-->
<div class="container login">
	
    	<form action="check.php" method="post" name="admin"  onsubmit="return Validation()" class="form-signin">
	
        	<h2 class="form-signin-heading">Enter Your Password</h2>
           <input type="password" name="password" id="password" placeholder="Password">&nbsp;<span class="error" id="password1"></span><br/>
           <div style="width:389px; margin:0 auto; margin-bottom:10px; color:red"><p id="mes"></p>
		  
           <script type="text/javascript">
		   
		   $(document).ready(function(){
			 <?php if(isset($_REQUEST['unsuccess'])) {
			   // echo $_REQUEST['unsuccess']; 
		   ?>   
			$('#mes').append('<p id="mes_e">You are provide Invalid Password Details</p>').slideDown();
			setTimeout(function(){$('#mes_e').slideUp(function(){$(this).remove()});}, 3000);   
		   });
		   <?php } ?>
		   

		   </script>
           </div> 
            <?php if(isset($_REQUEST['acontact'])) {
			   // echo $_REQUEST['unsuccess']; 
		   ?>   
           		   <div id="dialog" title="Message">
  						<p>You are already taken this test</p>
					</div>
 

<?php } ?>
           <input type="submit" name="submit" value="Submit" class="btn btn-large btn-primary"/>
        
    </form>
    

</div>
<!--container-->
    


</body>
</html>
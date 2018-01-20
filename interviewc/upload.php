<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Upload</title>
<link href="assests/css/admin.css" rel="stylesheet" type="text/css">
<link href="assests/css/bootstrap.css" rel="stylesheet" type="text/css">
<script src="assests/js/jquery-1.7.1.min.js"></script>
<script src="assests/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="assests/themes/jquery-ui.css">
<script src="assests/js/jquery-1.10.2.js"></script>
<script src="assests/ui/jquery-ui.js"></script>
<script type="text/javascript">
function Validation()
{
	
	
	document.getElementById('number1').innerHTML="";
	document.getElementById('file1').innerHTML="";
	
	if( document.myform.number.value == "" )
   {
     //alert( "Please provide your Contact number!" );
	  document.getElementById('number1').innerHTML="Please provide your Contact number!"; 
     document.myform.number.focus() ;
     return false;
   }
   if(document.myform.number.value.length != 10)
   {
	 document.getElementById('number1').innerHTML="Please provide Valid Numbers!"; 
     document.myform.number.focus() ;
     return false; 
   }
   if( document.myform.file.value == "" )
   {
     //alert( "Please provide your Contact number!" );
	  document.getElementById('file1').innerHTML="Please upload your file!"; 
     document.myform.file.focus() ;
     return false;
   }
}
function isNumber1(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
		 document.getElementById('number1').innerHTML="Only allowed Numbers!";
     	document.personal.number.focus() ;
        return false;
    }
    return true;
}
</script>
</head>

<body>
<div class="container">
<p id="message"></p>
<script type="text/javascript">
$('document').ready(function(){
<?php
if(isset($_GET['s'])){ ?>

$('#message').append("<p id='msg_e' style='font-size:16px; color:red'><?php echo $_GET['s']; ?></p>").slideDown();
setTimeout(function () {$('#msg_e').slideUp().remove();}, 3000);
<?php }?>
});
</script>

<div class="page-header">
        <h2>
          Upload Information <img style="float:right" src="assests/img/logo-1.png" />
         
    	
         </h2>
      </div>
<section id="navbar">
          <a class="navbar-brand" href="employee.php">Back</a>
          
      
        
</section>
<form class="form-horizontal well" action="upload_file.php" name="myform" method="post" enctype="multipart/form-data" onsubmit="return Validation()">
Contact No:<span class="error">*</span><input type="text" name="number" id="number" onkeypress="return isNumber1(event)">&nbsp;<span class="error" id="number1"></span><br/><br/>
Upload file:<input type="file" name="file" id="file" value=""/>&nbsp;<span class="error" id="file1"></span><br/>
<input type="submit" name="submit" value="Submit"/>
</form>
</div>
</body>
</html>
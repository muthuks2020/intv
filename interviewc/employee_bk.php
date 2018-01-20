<?php
session_start();

//if(isset($_SESSION['username']) !='')
//{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Interview</title>
<link href="assests/css/bootstrap.css" rel="stylesheet" type="text/css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script>
function Validation()
{
	
	document.getElementById('name1').innerHTML=""; 
	document.getElementById('number1').innerHTML="";
	document.getElementById('desig1').innerHTML="";
	document.getElementById('exp1').innerHTML="";
	document.getElementById('employer1').innerHTML="";
	document.getElementById('ctc1').innerHTML="";
	document.getElementById('position1').innerHTML="";
	document.getElementById('friends1').innerHTML="";
	document.getElementById('email1').innerHTML="";

	document.getElementById('before1').innerHTML="";
	if( document.personal.name.value == "" )
   {
     //alert( "Please provide your name!" );
	 document.getElementById('name1').innerHTML="Please provide your name!"; 
     document.personal.name.focus() ;
     return false;
   }
   if( document.personal.number.value == "" )
   {
     //alert( "Please provide your Contact number!" );
	  document.getElementById('number1').innerHTML="Please provide your Contact number!"; 
     document.personal.number.focus() ;
     return false;
   }
   if(document.personal.number.value.length != 10)
   {
	 document.getElementById('number1').innerHTML="Please provide Valid Numbers!"; 
     document.personal.number.focus() ;
     return false; 
   }
 
   var x=document.forms["personal"]["email"].value;
var atpos=x.indexOf("@");
var dotpos=x.lastIndexOf(".");
if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
  {
  document.getElementById('email1').innerHTML="Please provide Valid Email!"; 
     document.personal.email.focus() ;
  return false;
  }
	 if( document.personal.position.value == "-1" )
   {
     //alert( "Please provide your Position!" );
	 document.getElementById('position1').innerHTML="Please Choose your Position!";
     document.personal.position.focus() ;
     return false;
   }
      if ( (document.personal.details[0].checked == false ) && ( document.personal.details[1].checked == false ) ) 
	{
		
		document.getElementById('detailss').innerHTML="Please choose Fresher or Experience";
		return false;
	}
  
  var z = document.getElementById('details1').checked
 /* if ( (document.personal.details[0].checked == false ) && ( document.personal.details[1].checked == false ) ) 
	{
		
		document.getElementById('details1').innerHTML="Please choose Yes or No";
		return false;
	}*/
 	//alert(document.getElementById('details1').checked);
	//alert(z);
		
   if(z)
   {
	   
    if( document.personal.employer.value == "" )
   {
     //alert( "Please provide your Contact number!" );
	  document.getElementById('employer1').innerHTML="Please provide your Employer!"; 
     document.personal.employer.focus() ;
     return false;
   }
    /* if( document.personal.employer.value == "-1" )
   {
     //alert( "Please provide your employer!" );
	 document.getElementById('employer1').innerHTML="Please provide your employer!";
     return false;
   }*/
    if( document.personal.desig.value == "" )
   {
    // alert( "Please provide your designation!" );
	 document.getElementById('desig1').innerHTML="Please provide your designation!";
     document.personal.desig.focus() ;
     return false;
   }
   if( document.personal.experience.value == "" )
   {
     
	 document.getElementById('exp1').innerHTML="Please provide your Experience!";
     document.personal.experience.focus() ;
     return false;
   }
   
    if( document.personal.ctc.value == "" )
   {
     //alert( "Please provide your CTC!" );
	 document.getElementById('ctc1').innerHTML="Please provide your CTC!"
     document.personal.ctc.focus() ;
     return false;
   }
   }
   if ( (document.personal.friends[0].checked == false ) && ( document.personal.friends[1].checked == false ) ) 
	{
		
		document.getElementById('friends1').innerHTML="Please choose Yes or No";
		return false;
	}
	 if ( ( document.personal.before[0].checked == false ) && ( document.personal.before[1].checked == false ) ) 
	{
		
		document.getElementById('before1').innerHTML="Please choose Yes or No";
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
function isNumber2(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
		document.getElementById('exp1').innerHTML="Only allowed Numbers!";
     	document.personal.experience.focus() ;
        return false;
    }
    return true;
}
function validateDecimal(value)    {
    var r = '^\d*\.?\d{0,2}$'
    if(r.test(value)){
       return true;
    }else{
		document.getElementById('exp1').innerHTML="Only allowed Numbers!";
     	document.personal.experience.focus() ;
       return false;
    }
}
function isNumber3(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
		 document.getElementById('ctc1').innerHTML="Only allowed Numbers!";
     	document.personal.ctc.focus() ;
        return false;
    }
    return true;
}
function display(value)
{
	//var x =document.getElementById('details').value;
	//alert(value);
	if(value =='fresher')
	{
		document.getElementById('remove').style.display="none";
		
	}
	if(value =='experience')
	{
		
		document.getElementById('remove').style.display="block";
	}
}

</script>
<!--<script type = "text/javascript">
$elem = $("#remove");

function showElement(element){
	alert(element);
      element[0].style.display = "none";
}
function hideElement(element){
      element[0].style.display = "none";
}
</script>-->
</head>
<?php
include_once("connection.php");
?>
<body>
<div class="page-header">
        <h2>
          Adding Personal Information <img style="float:right" src="assests/img/logo-1.png" /><!--<span style="float:right; margin-right:25px;  color: #7F7F7F; font-family: Verdana,Arial,Helvetica,sans-serif;
    font-size: 10px; padding-right: 5px;"><?php //echo "Welcome ".ucfirst($_SESSION['username'])?>  <a href="logout.php"><img src="assests/img/logout.png" title="Logout"/></a></span>-->
         </h2>
      </div>

<table align="center" >
<tbody>
	<form action="personal.php" method="post" name="personal" onsubmit="return Validation()">
		<tr>
        	<td>Candidate Name:<span class="error">*</span></td>
            <td><input type="text" name="name" id="name">&nbsp;<span class="error" id="name1"></span></td>
        </tr>
        <tr>
        	<td>Contact No:<span class="error">*</span></td>
            <td><input type="text" name="number" id="number" onkeypress="return isNumber1(event)">&nbsp;<span class="error" id="number1"></span></td>
        </tr>
       
		<tr>
        	<td>Email:<span class="error">*</span></td>
            <td><input type="text" name="email" id="email" >&nbsp;<span class="error" id="email1"></span></td>
        </tr>
         <!-- <tr>
        	<td>Position Applied:<span class="error">*</span></td>
            <td><input type="text" name="position" id="position">&nbsp;<span class="error" id="position1"></span></td>
        </tr>-->
        <tr>
        	<td>Position Applied:<span class="error">*</span></td>
            <td><select name="position">
            	<option value="-1" selected="selected">[choose yours]</option>
            	<option value="Graphic Designer">Graphics Designer</option>
                <option value="Web DesignerJr">Web Designer-Jr</option>
                <option value="Web DesignerSr">Web Designer-Sr</option>	
                <option value="Web DesignerEx">Web Designer-Ex</option>
                <option value="Creative DesignerJr">Creative Designer-Jr</option>
				<option value="Creative DesignerSr">Creative Designer-Sr</option>
                </select>&nbsp;<span class="error" id="position1"></span></td>
        </tr>
   <tr>
        	<td></td>
            <td><input type="radio" name="details" value="fresher"   onclick="display(this.value)" />&nbsp;Fresher&nbsp;&nbsp;
            <input type="radio" name="details"  id="details1" value="experience" onclick="display(this.value)"/>&nbsp;Experience&nbsp;<span class="error" id="detailss"></span></td>
        </tr>
      
      <tr>      	
      	
       <td colspan="2"> 
       <table cellpadding="3" cellspacing="3" width="80%" style="float:left; margin-left:116px">
      		<tbody id="remove" style="display:none">
        <tr><td><fieldset><legend>Experience:</legend>
        <tr>
        	<td style="margin-left:-1px;">Previous/Current Employer:<span class="error">*</span></td>
             <td><input type="text" name="employer" id="employer">&nbsp;<span class="error" id="employer1"></span></td>
            
        </tr>
        <tr>
        	<td>Designation:<span class="error">*</span></td>
            <td><input type="text" name="desig">&nbsp;<span class="error" id="desig1"></span></td>
        </tr>
        <tr>
        	<td>Experience (in Years):<span class="error">*</span></td>
            <td><input type="text" name="experience" id="experience" onkeypress="return validateDecimal(event)">&nbsp;<span class="error" id="exp1"></span></td>
        </tr>
        <tr>
        	<td>CTC (Per Annum):<span class="error">*</span></td>
            <td><input type="text" name="ctc" id="ctc" onkeypress="return isNumber3(event)">&nbsp;<span class="error" id="ctc1"></span></td>
        </tr>
         </fieldset></td></tr>
        </tbody>
      </table>
      </td>
      
        </tr>
       
   		<tr><td>Source of Information about Job Vacancy:</td>
        	<td><select name="source">
            	<option value="select">--Select---</option>
            	<option value="Newspaper">Newspaper</option>
                <option value="Employee Referal">Employee Referal</option>
                <option value="walk in">Walk In</option>
                <option value="Jobsite">Jobsite</option>
                </select></td></tr>
         
         <tr>
        	<td>Do you have any friends working in 2adpro:<span class="error">*</span></td>
            <td><input type="radio" name="friends" value="Yes" />&nbsp;Yes&nbsp;&nbsp;<input type="radio" name="friends" value="No"/>&nbsp;No&nbsp;<span class="error" id="friends1"></span></td>
        </tr>
         <tr>
        	<td>Have you been interviewed by 2adpro before?:<span class="error">*</span></td>
            <td><input type="radio" name="before" value="Yes"/>&nbsp;Yes&nbsp;&nbsp;<input type="radio" name="before" value="No"/>&nbsp;No&nbsp;<span class="error" id="before1"></span></td>
        </tr>
      
       
   
       
         <tr>
        	<td></td>	
        	<td><input type="submit" name="submit" value="Submit"/></td>
         </tr>
        
       
         <tr>
		 	<td colspan="2" style="color:#096; font-size:16px"><?php if(isset($_REQUEST['success'])) { echo $_REQUEST['success']; }?></td>
          </tr>
          <!--<tr>
		 	<td colspan="2" style="color:#06F; font-size:16px"><?php //if(isset($_REQUEST['success'])) { ?>Please Click Here to <?php //echo "<a href=download.php?code=".$_REQUEST['value'].">Download</a>"; }?></td>
            <a href="download.php?data=<?php echo $_GET["value"]?>" name="download">Download</a>
          </tr>-->
          <tr>
          	<td><?php
				
			if(isset($_REQUEST['success']))
			{
				$i = $_REQUEST['value'];
				switch ($i){
				
   						case "Graphic Designer":
      							echo " '<a href=files/file1.zip>Click Here to Download your Test File</a>'";
       							break;
						case "Web DesignerJr":
								echo " '<a href=files/file2.zip>Click Here to Download your Test File</a>'";
								break;
						case "Web DesignerSr":
								echo " '<a href=files/file3.zip>Click Here to Download your Test File</a>'";
								break;
						case "Web DesignerEx":
								echo " '<a href=files/file4.zip>Click Here to Download your Test File</a>'";
								break;
						case "Creative DesignerJr":
								echo " '<a href=files/file5.zip>Click Here to Download your Test File</a>'";
								break;
						case "Creative DesignerSr":
								echo "'<a href=files/file6.zip>Click Here to Download your Test File</a>'";
								break;
					} }?>
            </td>
           </tr>
    </form>
    </tbody>
</table>
<?php
/*}
else
{
	header('location:index.php');	
}*/
?>
</body>
</html>
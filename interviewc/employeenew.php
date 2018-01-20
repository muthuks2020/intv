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

	var selIndex = document.getElementById("emplist").selectedIndex;
	var selOption = document.getElementById("emplist").options;
	var selVal = selOption[selIndex].text;



	if(selVal == 'Employee Referral'){
	//alert('emp');
		if(document.personal.empName.value == ""){
		document.getElementById('empName').innerHTML="Please provide your name!";
     document.personal.empName.focus() ;
     return false;
	}if(document.personal.empLocation.value == ""){
		document.getElementById('empLoc').innerHTML="Please select your Location!";
     document.personal.empLocation.focus() ;
     return false;
	}
	}

	document.getElementById('name1').innerHTML="";
	document.getElementById('number1').innerHTML="";
	document.getElementById('telephoneMessage').innerHTML="";
	document.getElementById('telephone1Message').innerHTML="";
	document.getElementById('desig1').innerHTML="";
	document.getElementById('exp1').innerHTML="";
	document.getElementById('employer1').innerHTML="";
	document.getElementById('ctc1').innerHTML="";
	document.getElementById('tkhome1').innerHTML="";
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
    if(document.personal.telephone.value.length != 10)
    {
        document.getElementById('telephoneMessage').innerHTML="Please provide Valid Numbers!";
        document.personal.telephone.focus() ;
        return false;
    }
    if(document.personal.telephone1.value.length != 10)
    {
        document.getElementById('telephone1Message').innerHTML="Please provide Valid Numbers!";
        document.personal.telephone1.focus() ;
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
   if( document.personal.tkhome.value == "" )
   {
     //alert( "Please provide your CTC!" );
	 document.getElementById('tkhome1').innerHTML="Please provide take Home"
     document.personal.tkhome.focus() ;
     return false;
   }

   }

    if( document.personal.location.value == "-1" )
   {
     //alert( "Please provide your Position!" );
	 document.getElementById('location1').innerHTML="Please select your Location!";
     document.personal.location.focus() ;
     return false;
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
function isNumberTelephone1(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        document.getElementById('telephoneMessage').innerHTML="Only allowed Numbers!";
        document.personal.telephone.focus() ;
        return false;
    }
    return true;
}

function isNumberTelephone2(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        document.getElementById('telephone1Message').innerHTML="Only allowed Numbers!";
        document.personal.telephone1.focus() ;
        return false;
    }
    return true;
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

function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
		  document.getElementById('tkhome1').innerHTML="Only allowed Numbers!";

		     	document.personal.tkhome.focus() ;
        return false;
    }
    return true;
}

function isNumber5(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
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
		document.getElementById('empList').style.top = '465px';
	}
	else{
	document.getElementById('empList').style.top = '280px';
	}
}

function empList(){
 selIndex = document.getElementById("emplist").selectedIndex;
 selOption = document.getElementById("emplist").options;
 selVal = selOption[selIndex].text;

	 document.getElementById('empName').innerHTML = '';
	document.getElementById('empLoc').innerHTML = '';
	document.getElementById('empname').value = '';
	document.getElementById('empid').value = '';
	document.getElementById('conNum').value = '';
	document.getElementById('emploc').value = '';

if(selVal == "Employee Referral"){

document.getElementById("empList").style.display = "block";
}else{
	document.getElementById("empList").style.display = "none";
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
<style>

.container
{
	width:50%;
	margin:0 auto;




}
.leftside
{
	width:50%; float:left; text-align:right;
}
.rightside
{
width:50%;float:left;
}
.empLft
{
	width: 35%;
float: left;
}

.leftside1
{
	width:28%; float:left;
}
.rightside1
{
width:50%;float:left;
}
#empList{
position: absolute;
right: -19px;
width: 38%;
}


</style>
</head>
<?php
include_once("connection.php");
?>
<body>

<div class="container">
<div class="page-header">
        <h2>
          Adding Personal Information <img style="float:right" src="assests/img/logo-1.png" />
          <!--<span style="float:right; margin-right:25px;  color: #7F7F7F; font-family: Verdana,Arial,Helvetica,sans-serif;
    font-size: 10px; padding-right: 5px;"><?php //echo "Welcome ".ucfirst($_SESSION['username'])?>  <a href="logout.php"><img src="assests/img/logout.png" title="Logout"/></a></span>-->



</h2>
<table width="852" border="0" align="center">
  <tr>
    <td width="406"><table width="443%" border="1" cellpadding="3" cellspacing="3" style="background-color:#FFFFCC;border-collapse:collapse;border:1px solid #FFCC00;color:#000000;width:100%">
      <tr>
        <td>Step 1:</td>
        <td>Please fill in the personal information form and click “Submit”</td>
      </tr>
      <tr>
        <td>Step 2:</td>
        <td>Please click the option below</td>
      </tr>
      <tr>
        <td rowspan="2"></td>
        <td>“Submitted value Successfully Inserted</td>
      </tr>
      <tr>
        <td> 'Click Here to Download your Test File'</td>
      </tr>
      <tr>
        <td>Step 3:</td>
        <td>Download the test file to your desktop</td>
      </tr>
      <tr>
        <td>Step 4: </td>
        <td>Create an separate output folder inside the downloaded “Test folder”</td>
      </tr>
      <tr>
        <td>Step 5:</td>
        <td>Rename the Test folder with “your Name &amp; your Contact number Example Ravi4557841236”</td>
      </tr>
    </table></td>
  </tr>
</table>
      </div>
<section id="navbar">
          <!--<a class="navbar-brand" href="upload.php">Upload File</a>-->



</section>


<form action="personal.php"   method="post" name="personal" onsubmit="return Validation()" enctype="multipart/form-data">

<div class="leftside" >What is your Full Name:<span class="error">*</span></div>
<div class="rightside"><input type="text" name="name" id="name">&nbsp;<span class="error" id="name1"></span></div>


<div class="leftside" >What is your Contact Number:<span class="error">*</span></div>
<div class="rightside"><input type="text" name="number" id="number" onkeypress="return isNumber1(event)">&nbsp;<span class="error" id="number1"></span></div>



<div class="leftside" >What is your Email:<span class="error">*</span></div>
<div class="rightside"><input type="text" name="email" id="email" >&nbsp;<span class="error" id="email1"></span></div>

<!--
Position Applied:<span class="error">*</span>
<input type="text" name="position" id="position">&nbsp;<span class="error" id="position1"></span>
-->

<div class="leftside" >Position Applied:<span class="error">*</span></div>
<div class="rightside"><select name="position">
<option value="-1" selected="selected">[choose yours]</option>

<option value="Graphic Designerupto6">Graphic Designer Fresher up to  6 months</option>
<option value="Graphic Designer6to18">Graphic Designer 6 months up to 18 months</option>
<option value="Graphic Designerex">Graphics Designer  - Experienced</option>
<option value="Flash Designerjr">Flash Designer  - Fresher & Juniors</option>
<option value="Flash Designerex">Flash Designer - Experienced</option>
<option value="ImageArtist">Image Artist </option>
<!--<option value="ImageArtistJunior">Image Artist Junior 0-2years</option>
<option value="ImageArtistExecutive">Image Artist Executive 2-4 years </option>
<option value="ImageArtistsr">Image Artist Senior 4+ years </option> -->
<option value="Creative Designer">Creative Designer Fresher</option>
<option value="Creative Designerexp">Creative Designer Exp</option>
<!--<option value="HTMLdevex">HTML Designers- Experienced</option>
<option value="Full Stack Developer">Full Stack Developer</option>
<option value="Front End Developer">Front End Developer</option>-->
<option value="HTMLdevfresh">HTML Designer  - Fresher & Juniors</option>
<option value="Visualizer">Visualizer</option>
<option value="Adops Analyst">Adops Analyst</option>
<option value="CSE">CSE</option>
<option value="QA">QA</option>
</select>&nbsp;<span class="error" id="position1"
</select>&nbsp;<span class="error" id="position1"></span></div>



<div style="margin-left:300px;">Are you : <input type="radio" name="details" value="fresher"   onclick="display(this.value)" />&nbsp;Fresher&nbsp;&nbsp;
<input type="radio" name="details"  id="details1" value="experience" onclick="display(this.value)"/>&nbsp;Experienced&nbsp;<span class="error" id="detailss"></span></div>





<div id="remove" style="display:none">



<div class="leftside" >Previous/Current Employer:<span class="error">*</span></div>
<div class="rightside" ><input type="text" name="employer" id="employer">&nbsp;<span class="error" id="employer1"></span></div>



<div class="leftside" >Designation:<span class="error">*</span></div>
<div class="rightside"><input type="text" name="desig">&nbsp;<span class="error" id="desig1"></span></div>


<div class="leftside" >Experience (in Years):<span class="error">*</span></div>
<div class="rightside"><input type="text" name="experience" id="experience" onkeypress="return validateDecimal(event)">&nbsp;<span class="error" id="exp1"></span></div>


<div class="leftside" >CTC (Monthly Salary):<span class="error">*</span></div>
<div class="rightside"><input type="text" name="ctc" id="ctc" onkeypress="return isNumber3(event)">&nbsp;<span class="error" id="ctc1"></span></div>

<div class="leftside" >Take Home<span class="error">*</span></div>
<div class="rightside"><input type="text" name="tkhome" id="tkhome" onkeypress="return isNumber(event)">&nbsp;<span class="error" id="tkhome1"></span></div>


</div>




<div class="leftside" >Source of Information about Job Vacancy:</div>
<div class="rightside"><select name="source" onchange="empList()" id='emplist'>
<option value="select">--Select---</option>
<option value="GCFA-Campus">GCFA-Campus</option>
<option value="Consultant">Consultant</option>
<option value="Newspaper">Newspaper</option>
<option value="Institute">Institute</option>
<option value="Employee Referral">Employee Referral</option>
<option value="walk in">Walk In</option>
<option value="Jobsite">Jobsite</option>
<option value="career page">Career Page</option>
<option value="campus">Campus</option>
</select></div>


<div id='empList' style="display:none;">
<div class="leftside1" >Employee name :<span class="error">*</span></div>
<div class="rightside1"><input type="text" name='empName' id='empname'/><span class="error" id="empName"></span></div>

 <div class="leftside1" >Employee Id:</div>
<div class="rightside1"><input type="text" name='empId' id='empid'/></div>

 <div class="leftside1" >Location :<span class="error">*</span></div>
<div class="rightside1"><select name='empLocation' id='emploc'><option value="">--Select--</option><option value="chennai">Chennai</option><option value="banglore">Banglore</option></select><span class="error" id="empLoc"></span></div>
 <div class="leftside1" >Contact Number :</div>
<div class="rightside1">
<input type="text" name="conNum" id="conNum" onkeypress="return isNumber5(event)">
</div>

</div>


<div class="leftside" >Location:<span class="error">*</span></div>
<div class="rightside"><select name="location">
<option value="-1" selected="selected">--Select---</option>
<option value="Chennai">Chennai</option>
<option value="Banglore">Banglore</option>
</select>&nbsp;<span class="error" id="location1"></span></div>

<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
.tg .tg-yw4l{vertical-align:top}
</style>
<table class="tg">
  <tr>
    <th class="tg-yw4l" colspan="4">Refer Your Friends<span class="error"></span></th>
  </tr>
  <tr>
 <th class="tg-yw4l"> <label for="first_name">First Name <span class="error"></span></label></th>
    <th class="tg-yw4l"> <label for="first_name">Contact Number <span class="error"></span></label></th>
    <th class="tg-yw4l"> <label for="company_name">Company Name<span class="error"></span></label></th>
    <th class="tg-yw4l"> <label for="designation_name">Designation <span class="error"></span></label></th>
  </tr>
  <tr>
    <td class="tg-yw4l"><input  type="text" name="first_name" maxlength="50" size="30"></td>
    <td class="tg-yw4l"> <input  type="text" id="telephone" name="telephone" maxlength="30" size="30" onkeypress="return isNumberTelephone1(event)">&nbsp;<span class="error" id="telephoneMessage"></span></td>
    <td class="tg-yw4l"><input  type="text" name="Companyname_name" maxlength="50" size="30"></td>
    <td class="tg-yw4l"><input  type="text" name="Designation_name" maxlength="50" size="30"></td>
  </tr>
  <tr>
    <td class="tg-yw4l"><input  type="text" name="first_name1" maxlength="50" size="30"></td>
    <td class="tg-yw4l"> <input  type="text" id="telephone1" name="telephone1" maxlength="30" size="30" onkeypress="return isNumberTelephone2(event)">&nbsp;<span class="error" id="telephone1Message"></td>
    <td class="tg-yw4l"><input  type="text" name="Companyname_name1" maxlength="50" size="30"></td>
    <td class="tg-yw4l"><input  type="text" name="Designation_name1" maxlength="50" size="30"></td>
  </tr>
</table>



<!--<div class="leftside" >Do you have any friends working in test:<span class="error">*</span></div>
<div class="rightside"><input type="radio" name="friends" value="Yes" id='emp'/>&nbsp;Yes&nbsp;&nbsp;<input type="radio" name="friends" value="No"/>&nbsp;No&nbsp;<span class="error" id="friends1"></span></div>

-->
<div class="leftside" >Have you been interviewed by 2adpro before?:<span class="error">*</span></div>
<div class="rightside"><input type="radio" name="before" value="Yes"/>&nbsp;Yes&nbsp;&nbsp;<input type="radio" name="before" value="No"/>&nbsp;No&nbsp;<span class="error" id="before1"></span></div>
</br>
</br>

<!--<div class="leftside">Upload file:</div>
<div class="rightside"><input type="file" name="file" id="file" value=""/></div>-->



<div class="leftside"><input type="submit" name="submit" value="Submit"/></div>




<div style="float:left; font-size:30px;"> <?php if(isset($_REQUEST['success'])) { ?>
<span style="float:left;margin-top:20px;">
<?php echo $_REQUEST['success']."<br/><br/>"; ?>
<span>
<?php
}


?>

<!--
<td colspan="2" style="color:#06F; font-size:16px"><?php //if(isset($_REQUEST['success'])) { ?>Please Click Here to <?php //echo "<a href=download.php?code=".$_REQUEST['value'].">Download</a>"; }?>
<a href="download.php?data=<?php echo $_GET["value"]?>" name="download">Download</a>
-->

<?php

if(isset($_REQUEST['success']))
{
$i = $_REQUEST['value'];
switch ($i){
case "FrontEnddeveloper":
      echo " '<a href=files/frontend_skills_test.zip>Click Here to Download your Test File</a>'";
      break;

case "Adops Analyst":
      echo " '<a href=files/AdopsNov2017.zip>Click Here to Download your Test File</a>'";
      break;
case "QA":
      echo " '<a href=files/QANov2017.zip>Click Here to Download your Test File</a>'";
      break;
       
case "CSE":
      echo " '<a href=files/CSENov2017.zip>Click Here to Download your Test File</a>'";
      break;


case "Full Stack Developer":
      echo " '<a href=files/FSEvaluationTest.zip>Click Here to Download your Test File</a>'";
      break;
case "Front End Developer":
      echo " '<a href=files/FEDeveloperAssessment.pdf>Click Here to Download your Test File</a>'";
      break;
case "ImageArtist":
      echo " '<a href=files/Macys_Print_Test.zip>Click Here to Download your Test File</a>'";
      break;
case "ImageArtistJunior":
      echo " '<a href=files/imageartistJuniorTestFIle.zip>Click Here to Download your Test File</a>'";
      break;
case "HTMLdevex":
      echo " '<a href=files/HTMLDesignerExperienced.zip>Click Here to Download your Test File</a>'";
      break;
case "HTMLdevfresh":
      echo " '<a href=files/HTMLDesignersd.zip>Click Here to Download your Test File</a>'";
      break;
case "ImageArtistExecutive":
      echo " '<a href=files/imageartistExecutiveTes File.zip>Click Here to Download your Test File</a>'";
      break;
case "ImageArtistsr":
      echo " '<a href=files/imageartistSeniorTestFile.zip>Click Here to Download your Test File</a>'";
      break;
case "Graphic Designerupto6":
      echo " '<a href=files/Fresher_0-6month.zip>Click Here to Download your Test File</a>'";
      break;
case "Graphic Designer6to18":
      echo " '<a href=files/Fresher_6-18month.zip>Click Here to Download your Test File</a>'";
      break;
case "Graphic Designerex":
      echo " '<a href=files/Experience_18month.zip>Click Here to Download your Test File</a>'";
      break;
case "Pagination":
      echo " '<a href=files/Pagination.zip>Click Here to Download your Test File</a>'";
      break;
case "Web DesignerJr":
      echo " '<a href=files/file2.zip>Click Here to Download your Test File</a>'";
      break;
case "Flash Designerex":
      echo " '<a href=files/ExperiencedDigital.zip>Click Here to Download your Test File</a>'";
      break;
case "Flash Designerjr":
      echo " '<a href=files/Fresher&JuniorDigital.zip>Click Here to Download your Test File</a>'";
      break;
case "Web DesignerEx":
      echo " '<a href=files/file4.zip>Click Here to Download your Test File</a>'";
      break;
case "Creative Designer":
      echo " '<a href=files/CreativeFresher2017.zip>Click Here to Download your Test File</a>'";
      break;  
case "Creative Designerexp":
      echo " '<a href=files/CreativeExp2017.zip>Click Here to Download your Test File</a>'";
      break;
case "html5":
      echo " '<a href=files/Responsive_Test_html_may19.zip>Click Here to Download your Test File</a>'";
      break;
case "Creative DesignerSr":
      echo "'<a href=files/Seniormay19.zip>Click Here to Download your Test File</a>'";
      break;
case "UI Designer":
      echo "'<a href=files/file7.zip>Click Here to Download your Test File</a>'";
      break;
case "Visualizer":
      echo "'<a href=files/2017Creativebrief_Visualiser.zip>Click Here to Download your Test File</a>'";
      break;
case "Image Artist":
      echo "'<a href=files/Retouch.zip>Click Here to Download your Test File</a>'";
      break;


}


 }?>


</form>



<?php
/*}
else
{
	header('location:index.php');
}*/
?></div>
</div>
</br>
</br>
<p style="float:left; font-size:30px;"> <a href="http://adda.2adpro.com/interviewc/admin/success.php"><button style="float:right;margin-left: 499px; font-size:30px;" type="button" class="btn btn-success">HR-Link</button>  </a></p>
</br>

</body>
</html>

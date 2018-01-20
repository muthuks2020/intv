<?php session_start();
include_once('connection.php');
include_once('functions.php');?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Evaluation Form</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="css/styles.css" rel="stylesheet">
        <link href="css/evaluation.css" rel="stylesheet">
 


   
        <script type="text/javascript" src="js/jquery-1.10.2.min.js"> </script>
		<script src="js/bootstrap.min.js"></script>
	  
       <script type="text/javascript">

function validation()
{
	
	document.getElementById('comments1').innerHTML=""; 
	document.getElementById('nextlevels').innerHTML="";
	document.getElementById('CIS').innerHTML=""; 
	document.getElementById('PK').innerHTML=""; 
	document.getElementById('TK').innerHTML=""; 
	document.getElementById('CO').innerHTML=""; 
	document.getElementById('AD').innerHTML=""; 
	document.getElementById('FL').innerHTML=""; 
	document.getElementById('PA').innerHTML="";
	document.getElementById('msource1').innerHTML="";

	if ( (document.mycomment.position[0].checked == false ) && ( document.mycomment.position[1].checked == false ) ) 
	{
		
		document.getElementById('PA').innerHTML="Please choose atleast one position";
		return false;
	}
	if ( (document.mycomment.source[0].checked == false ) && ( document.mycomment.source[1].checked == false ) && ( document.mycomment.source[2].checked == false )&& ( document.mycomment.source[3].checked == false )&& ( document.mycomment.source[4].checked == false )) 
	{
		
		document.getElementById('msource1').innerHTML="Please choose atleast one source";
		return false;
	}
	if ( (document.mycomment.ci[0].checked == false ) && ( document.mycomment.ci[1].checked == false ) && ( document.mycomment.ci[2].checked == false )&& ( document.mycomment.ci[3].checked == false ) ) 
	{
		
		document.getElementById('CIS').innerHTML="Please choose atleast one Comprehending Instructions ";
		return false;
	}
	if ( (document.mycomment.pk[0].checked == false ) && ( document.mycomment.pk[1].checked == false ) && ( document.mycomment.pk[2].checked == false )&& ( document.mycomment.pk[3].checked == false ) ) 
	{
		
		document.getElementById('PK').innerHTML="Please choose atleast one Practical Knowledge";
		return false;
	}
	if ( (document.mycomment.tk[0].checked == false ) && ( document.mycomment.tk[1].checked == false ) && ( document.mycomment.tk[2].checked == false )&& ( document.mycomment.tk[3].checked == false ) ) 
	{
		
		document.getElementById('TK').innerHTML="Please choose atleast one Technical Knowledge";
		return false;
	}
	if ( (document.mycomment.co[0].checked == false ) && ( document.mycomment.co[1].checked == false ) && ( document.mycomment.co[2].checked == false )&& ( document.mycomment.co[3].checked == false ) ) 
	{
		
		document.getElementById('CO').innerHTML="Please choose atleast one Communication";
		return false;
	}
	if ( (document.mycomment.ad[0].checked == false ) && ( document.mycomment.ad[1].checked == false ) && ( document.mycomment.ad[2].checked == false )&& ( document.mycomment.ad[3].checked == false ) ) 
	{
		
		document.getElementById('AD').innerHTML="Please choose atleast one Adaptability";
		return false;
	}
	if ( (document.mycomment.fx[0].checked == false ) && ( document.mycomment.fx[1].checked == false ) && ( document.mycomment.fx[2].checked == false )&& ( document.mycomment.fx[3].checked == false ) ) 
	{
		
		document.getElementById('FL').innerHTML="Please choose atleast one Flexibility";
		return false;
	}
	
	if( document.mycomment.comments.value == "" )
   {
     //alert( "Please provide your name!" );
	 document.getElementById('comments1').innerHTML="Please provide your Comments!"; 
     document.mycomment.comments.focus() ;
     return false;
   }
   if ( (document.mycomment.nextlevel[0].checked == false ) && ( document.mycomment.nextlevel[1].checked == false ) ) 
	{
		
		document.getElementById('nextlevels').innerHTML="Please choose OnHold or Select";
		return false;
	}
	
}

function getnextlevel(val)
{
	
	if(val=='1')
	{
		document.getElementById('ass3c').style="display:block";	
	}
	else
	{
		document.getElementById('ass3c').style="display:none";	
	}
}
	   </script> 
     <style>
.error
{
	color:#F00;	
}
label
{
	font-weight:bold;	
}
.col-md-6 li
{
	list-style:none;
	
}
</style>
   
	</head>
	<!-- Header -->
<div id="top-nav" class="navbar navbar-inverse navbar-static-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="icon-toggle"></span>
      </button>
      <a class="navbar-brand" href="#"><img src="bootstrap/img/logo-1.png" alt="2adpro" /></a>
    </div>
    <div class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-right">
        
        <li class="dropdown">
          <a class="dropdown-toggle" role="button" data-toggle="dropdown" href="#">
            <i class="glyphicon glyphicon-user"></i>Welcome <?php echo $_SESSION['user']?> <span class="caret"></span></a>
          <ul id="g-account-menu" class="dropdown-menu" role="menu">
           <!-- <li><a href="#">My Profile</a></li>-->
            <li><a href="logout.php"><i class="glyphicon glyphicon-lock"></i> Logout</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div><!-- /container -->
</div>
<!-- /Header -->

<!-- Main -->
 <!--tabs-->
      <div class="container">
      <p id="mesE"></p>
      <script type="text/javascript">
		$(document).ready(function(e) {
			
        <?php 
		if(isset($_REQUEST['msg'])){
		if(@$_REQUEST['msg']=="u"){?>
			$("#mesE").append('<p id="msg_e" style="color:#F00; text-align:center">Successfully Updated</p>').slideDown("slow");
			setTimeout(function () {$('#msg_e').slideUp(function(){$(this).remove()});}, 3000);

		<?php } }?>
    
        });
        

				</script>
       <header>
  <div class="logo"><img src="assets/images/logo-.png" /></div>
  
  <div class="head">
  <span id="tit"><img src="assets/images/tit.png" /></span>
  </div>
 
  <div class="head-ash"><img src="assets/images/line.png" /><h2>Manager Evaluator</h2></div>

  </header>
  <?php $query=@mysql_query("SELECT *FROM `contacts` WHERE id ='".$_REQUEST['c']."'") or die(mysql_error());
	  $emp_name = mysql_fetch_array($query);	
	
?>

<div class="main">
        <form class="form-horizontal well" style="min-height:177px;" action="mselected.php" name="mycomment" method="post" onSubmit="return validation()" >
        <input type="hidden" name="cid" value="<?=$_REQUEST['c']?>"/>
      <!-- <label>Name:</label>&nbsp;<?php echo $emp_name['name']; ?>&nbsp;&nbsp;
        <label>Position Aplied for:</label>&nbsp;<?php echo $emp_name['position']; ?>&nbsp;&nbsp;
        <label>Interview Date:</label>&nbsp;<?=date('d-m-Y',strtotime($emp_name['register_on']))?><br/><br/>
         <label style="float:left"><b>Comments:</b><span class="error">*  </span></label>
         <textarea name="comments" rows="3" cols="5" style="width:100%; resize:none; float:left"><?=$emp_name['man_comments']?></textarea>&nbsp;<span class="error" id="comments1"></span><br /><br />-->
         
         <div class="row">
            <div class="col-md-6">
                <li><label>Name of Candidate:</label>&nbsp;<?php echo $emp_name['name']; ?></li><br/>
                <li><label>Position Applied:</label>&nbsp;<?php echo $emp_name['position']; ?></li><br/>
                <li><label>Position :</label>&nbsp;<input type="checkbox" name="position" value="print"<?php if($emp_name['mposition']=='print'){?> checked<?php } ?> id="position"/>&nbsp;Print&nbsp;&nbsp;<input type="checkbox" name="position" value="web"<?php if($emp_name['mposition']=='web'){?> checked<?php } ?> id="position"/>&nbsp;Web&nbsp;&nbsp;<input type="checkbox" name="position" value="cse"<?php if($emp_name['mposition']=='cse'){?> checked<?php } ?> id="position"/>&nbsp;CSE&nbsp;&nbsp;&nbsp;<span class="error" id="PA"></span></li>
                <li><label>Total Experince:</label>&nbsp;<input type="text" name="totalexperince" id="totalexperince" value="<?=$emp_name['totalexperince']?>" required/></li>
                <li><label>Relevant Experince:</label>&nbsp;<input type="text" name="relevantexperince" id="relevantexperince" value="<?=$emp_name['relevantexperince']?>" required/></li>
                <li><label>Recruiter:</label>&nbsp;<input type="text" name="recruiter" id="recruiter" value="<?=$emp_name['recruiter']?>" required/></li><br/>
            </div>
            <div class="col-md-6">
            	<li><label>Interviewer(s):</label>&nbsp;<?=$emp_name['manager_emp_name']?></li><br/>
                <li><label>Source:</label>&nbsp;<input type="checkbox" name="source" value="jobsite"<?php if($emp_name['msource']=='jobsite'){?> checked<?php } ?> id="source"/>&nbsp;Job Site&nbsp;&nbsp;<input type="checkbox" name="source" value="walkin" <?php if($emp_name['msource']=='walkin'){?> checked<?php } ?> id="source"/>&nbsp;Walk in&nbsp;&nbsp;<input type="checkbox" name="source" value="empref" <?php if($emp_name['msource']=='empref'){?> checked<?php } ?> id="source"/>&nbsp;Emp.Ref.&nbsp;&nbsp;<input type="checkbox" name="source" value="jobfair" <?php if($emp_name['msource']=='jobfair'){?> checked<?php } ?> id="source"/>&nbsp;Job Fair&nbsp;&nbsp;<input type="checkbox" name="source" value="network" <?php if($emp_name['msource']=='network'){?> checked<?php } ?> id="source"/>&nbsp;Network&nbsp;<span class="error" id="msource1"></span></li><br/>
            	<li><label>Date of request:</label>&nbsp;<?=date('d-m-Y',strtotime($emp_name['register_on']))?></li>
                <li><label>Team Allocated:</label>&nbsp; <input type="text" name="teamallocated" value="<?=$emp_name['teamallocated']?>" id="teamallocated" required/></li>
            </div>
        </div>
        
        <table class="table">
  <tr>
    <th scope="col" id="col-wid" colspan="5" style="text-align:center">Proficency</th>
   </tr>
   <tr>
   <th scope="col"></th>
   <th scope="col">Exceptional</th>
    <th scope="col">Good</th>
    <th scope="col">Trainable</th>
    <th scope="col">Non-Trainable</th>
   </tr>
  <tr>
  <td>Comprehending Instructions&nbsp;<span class="error" id="CIS"></span></td>
  <td><input type="checkbox" name="ci" value="ciexceptional"<?php if($emp_name['ci']=='ciexceptional'){?> checked<?php } ?>/></td>
  <td><input type="checkbox" name="ci" value="cigood" <?php if($emp_name['ci']=='cigood'){?> checked<?php } ?>/></td>
  <td><input type="checkbox" name="ci" value="citrainable" <?php if($emp_name['ci']=='citrainable'){?> checked<?php } ?>/></td>
  <td><input type="checkbox" name="ci" value="cinontrainable" <?php if($emp_name['ci']=='cinontrainable'){?> checked<?php } ?>/></td>
  </tr>
  <tr>
  <td>Practical Knowledge&nbsp;<span class="error" id="PK"></span></td>
  <td><input type="checkbox" name="pk" value="pkexceptional" <?php if($emp_name['pk']=='pkexceptional'){?> checked<?php } ?>/></td>
  <td><input type="checkbox" name="pk" value="pkgood" <?php if($emp_name['pk']=='pkgood'){?> checked<?php } ?>/></td>
  <td><input type="checkbox" name="pk" value="pktrainable" <?php if($emp_name['pk']=='pktrainable'){?> checked<?php } ?>/></td>
  <td><input type="checkbox" name="pk" value="pknontrainable" <?php if($emp_name['pk']=='pknontrainable'){?> checked<?php } ?>/></td>
  </tr>
  <tr>
  <td>Technical Knowledge&nbsp;<span class="error" id="TK"></span></td>
  <td><input type="checkbox" name="tk" value="tkexceptional" <?php if($emp_name['tk']=='tkexceptional'){?> checked<?php } ?>/></td>
  <td><input type="checkbox" name="tk" value="tkgood" <?php if($emp_name['tk']=='tkgood'){?> checked<?php } ?>/></td>
  <td><input type="checkbox" name="tk" value="tktrainable" <?php if($emp_name['tk']=='tktrainable'){?> checked<?php } ?>/></td>
  <td><input type="checkbox" name="tk" value="tknontrainable" <?php if($emp_name['tk']=='tknontrainable'){?> checked<?php } ?> /></td>
  </tr>
 </table>
 <table class="table " >
  <tr>
    <th scope="col" id="col-wid" colspan="5" style="text-align:center">Interpersonal Skills</th>
   </tr>
   <tr>
   <th scope="col"></th>
   <th scope="col">Exceptional</th>
    <th scope="col">Good</th>
    <th scope="col">Trainable</th>
    <th scope="col">Non-Trainable</th>
   </tr>
  <tr>
  <td>Communication&nbsp;<span class="error" id="CO"></span></td>
  <td><input type="checkbox" name="co" value="coexceptional" <?php if($emp_name['co']=='coexceptional'){?> checked<?php } ?>/></td>
  <td><input type="checkbox" name="co" value="cogood" <?php if($emp_name['co']=='cogood'){?> checked<?php } ?>/></td>
  <td><input type="checkbox" name="co" value="cotrainable" <?php if($emp_name['co']=='cotrainable'){?> checked<?php } ?>/></td>
  <td><input type="checkbox" name="co" value="conontrainable" <?php if($emp_name['co']=='conontrainable'){?> checked<?php } ?>/></td>
  </tr>
  <tr>
  <td>Adaptability&nbsp;<span class="error" id="AD"></span></td>
  <td><input type="checkbox" name="ad" value="adexceptional" <?php if($emp_name['ad']=='adexceptional'){?> checked<?php } ?>/></td>
  <td><input type="checkbox" name="ad" value="adgood" <?php if($emp_name['ad']=='adgood'){?> checked<?php } ?>/></td>
  <td><input type="checkbox" name="ad" value="adtrainable" <?php if($emp_name['ad']=='adtrainable'){?> checked<?php } ?>/></td>
  <td><input type="checkbox" name="ad" value="adnontrainable" <?php if($emp_name['ad']=='adnontrainable'){?> checked<?php } ?>/></td>
  </tr>
  <tr>
  <td>Flexibility&nbsp;<span class="error" id="FL"></span></td>
  <td><input type="checkbox" name="fx" value="fxexceptional" <?php if($emp_name['fx']=='fxexceptional'){?> checked<?php } ?>/></td>
  <td><input type="checkbox" name="fx" value="fxgood" <?php if($emp_name['fx']=='fxgood'){?> checked<?php } ?>/></td>
  <td><input type="checkbox" name="fx" value="fxtrainable" <?php if($emp_name['fx']=='fxtrainable'){?> checked<?php } ?>/></td>
  <td><input type="checkbox" name="fx" value="fxnontrainable" <?php if($emp_name['fx']=='fxnontrainable'){?> checked<?php } ?>/></td>
  </tr>
 </table>
 
 <label style="float:left"><b>Assessor2 Comments:</b><span class="error">*  </span></label>
 <textarea name="comments" rows="3" cols="5" style="width:100%; resize:none; float:left"><?=$emp_name['man_comments']?></textarea>&nbsp;<span class="error" id="comments1"></span><br /><br />
 
  <div>
    <label>Next Level:</label>&nbsp;
    <input type="checkbox" name="nextlevel" value="3"<?php if($emp_name['mstatus']=='3'){?> checked<?php } ?> onclick="getnextlevel(this.value)" /> On Hold
    <input type="checkbox" name="nextlevel" value="1"<?php if($emp_name['mstatus']=='1'){?> checked<?php } ?> onclick="getnextlevel(this.value)" /> Select&nbsp;&nbsp;<span class="error" id="nextlevels"></span><br/><br/>
  </div>
  <div >
  <label style="float:left"><b>Assessor3 Comments:</b></label>
 <textarea name="ass3comments" rows="3" cols="5" style="width:100%; resize:none; float:left"><?=$emp_name['ass3comments']?></textarea>&nbsp;<br /><br />
   </div>   
  <?php

$checkHR = mysql_query("SELECT * FROM `elogin` WHERE `hr`='".$_SESSION['userid']."'");
$check_num_rows = mysql_num_rows($checkHR);
if($check_num_rows>0){
?>       
<div  class="btn btn-default"><a href="admin_dashboard.php" style=" color:red">Cancel</a></div>
<?php } else {?>
<div  class="btn btn-default"><a href="man_dashboard.php" style=" color:red">Cancel</a></div>
<button type="submit" class="btn btn-primary">Save</button>
<?php } ?>
	




    </form>
    <!--/tabs-->
      <!--/container-->
<!-- /Main -->

 
           
        </div> <!--your content end-->
    
    </div> <!--toPopup end-->
    
	


<footer class="text-center">&copy; <?php echo date('Y')?> <a href="adda.2adpro.com"><strong>2adpro</strong></a></footer>





  
	<!-- script references -->
		
	</body>
</html>
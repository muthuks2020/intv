<?php session_start();
include_once('connection1.php');

$eid = $_REQUEST['eid'];
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Manager Form</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		
		<link href="css/styles.css" rel="stylesheet">
        <link href="css/evaluation.css" rel="stylesheet">
 


   
        <script type="text/javascript" src="js/jquery-1.10.2.min.js"> </script>
		<script src="js/bootstrap.min.js"></script>
	  
       <script type="text/javascript">

function validation()
{
	
	document.getElementById('comments1').innerHTML=""; 
	if( document.mycomment.comments.value == "" )
   {
	 document.getElementById('comments1').innerHTML="Please provide your Comments!"; 
     document.mycomment.comments.focus() ;
     return false;
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
  <span id="tit"><img src="assets/images/bktit.png" /></span>
  </div>
 
  <div class="head-ash"><img src="assets/images/line.png" />
  <h2>Manager</h2></div>

  </header>
  
<?php

if(isset($_POST['submit']) !='')
{
	

// echo date("Y-m-d", time());
 $approve_date = date("Y-m-d H:i:s");

$appQury = mysql_query("update `hub_request` set vp_comments  = '".$_POST['comments']."',approved_by='".$_SESSION['user']."',approved_date='".$approve_date."', vp_updated_by ='".$_SESSION['user']."',vp_updated_at='".$approve_date."', status = '1', vpstatus = '1', cvpstatus='3' where `rid` = '".$_POST['eid']."'");
header("location:opeManagerRequest.php?msg=u");
}
$qry = mysql_query('select * from `hub_request` where rid='.$_REQUEST['eid']);
$ename= mysql_fetch_array($qry);

 ?>
 <div class="main">
        <form class="form-horizontal well" style="min-height:177px;" action="vp_comm.php" name="mycomment" method="post" onSubmit="return validation()" >
        <input type="hidden" name="eid" value="<?=$_REQUEST['eid']?>"/>
       <label>Name:</label>&nbsp;<?php echo $ename['emp_name']; ?>&nbsp;&nbsp;
        <label>Request Type:</label>&nbsp;<?php echo $ename['Request_type']; ?>&nbsp;&nbsp;
        <label>Applied Date:</label>&nbsp;<?=date('d-m-Y',strtotime($ename['submitted_date']))?>&nbsp;&nbsp;
         <label>Operation Manager Comments:</label>&nbsp;<?=$ename['opmng_comments']?><br/><br/>
         <label style="float:left"><b>Comments:</b><span class="error">*  </span></label>
         <textarea name="comments" rows="3" cols="5" style="width:100%; resize:none; float:left"><?=$ename['vp_comments']?></textarea>&nbsp;<span class="error" id="comments1"></span><br /><br />
 <div class="btn btn-default"><a href="opeManagerRequest.php" style=" color:red">Cancel</a></div>
<input type="submit" name="submit" class="btn btn-primary" value="Save"/>

    </form>
    <!--/tabs-->
      <!--/container-->
<!-- /Main -->

 
           
        </div>


    
    </div> <!--toPopup end-->
    
	


<footer class="text-center">&copy; <?php echo date('Y')?> <a href="adda.2adpro.com"><strong>2adpro</strong></a></footer>





  
	<!-- script references -->
		
	</body>
</html>
<?php session_start();
include_once('connection1.php');
//print_r($_SESSION);

if(!isset($_SESSION['userid']))
{	
	header("location:index.php");
}
//print_r($_POST);



?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Admin Evaluation Form</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="css/styles.css" rel="stylesheet">
        <link href="css/evaluation.css" rel="stylesheet">
        <link href="popup-box/style/style.css" rel="stylesheet">
       
        

   
        <script type="text/javascript" src="js/jquery-1.10.2.min.js"> </script>
		<script src="js/bootstrap.min.js"></script>
        <script src="popup-box/js/script.js"></script>
       <script type="text/javascript">
	   
	   </script> 
        <style>
body,h2{
	margin:0px;
	padding:0px;
		
	}
.wrapper {
width: 100%;
margin: 0 auto;
font-family: Arial, Helvetica, sans-serif;
background: antiquewhite;
padding-bottom: 30px;
}
.emp {
width:900px;
/*background: #F3F3F3;*/
border-radius: 5px;
margin:0 auto;
padding: 10px;

}
h2{
font-size: 18px;
line-height: 33px;
color: #444444;
text-shadow: 0 1px 0 #FFF;
font-weight:bold;
	}
.cont{
		font-size:13px;
		font-weight:bold;
		color:#444444;}
.eval{
	width:900px;
	margin:0 auto;
	
	
	padding: 10px;
	/*background: #F3F3F3;*/
		}		
	.man{
	width:900px;
	margin:0 auto;
	
	
	padding: 10px;
	/*background: #F3F3F3;*/}
	.hr{
	width:900px;
	margin:0 auto;
	
	
	padding: 10px;
	/*background: #F3F3F3;*/}
	.sub_wrap {
	background: white;
	padding: 10px;
	border-radius: 8px 8px 0px 0px;
	border-top: 5px solid #FFAE35;
	box-shadow: 2px 2px 2px 2px #E0DFDC;
	word-wrap:break-word;
}
.sub_wrap:hover{
	background:#E0DFDC;}
</style>
<script>
function goBack() {
    window.history.back()
}
</script>
	</head>
	<body>
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
                <script type="text/javascript">

function validation()
{
	
	document.getElementById('comments1').innerHTML=""; 
	if( document.editform.hrcom.value == "" )
   {
	 document.getElementById('comments1').innerHTML="Please provide your Comments!"; 
     document.editform.hrcom.focus() ;
     return false;
   }
}
	   </script> 
       <header>
  <div class="logo"><img src="assets/images/logo-.png" /></div>
  
  <div class="head">
  <span id="tit"><img src="assets/images/bktit.png" /></span>
  </div>
 
  <div class="head-ash"><!--<img src="assets/images/line.png" />-->
  <h2>Admin Backfill</h2></div>

  </header>
  

<div class="main">
 <?php
 
			


$ID = $_REQUEST['eid'];

			$frecords = mysql_query("SELECT *FROM `hub_request` WHERE rid='".$ID."'")or die(mysql_error());
			$getR = mysql_fetch_assoc($frecords);

?>
   
<div class="wrapper">
<form action="admin_update_backfill.php" name="editform" method="POST" onSubmit="return validation()">
<input type="hidden" name="hubrid" value="<?=$_REQUEST['eid']?>"/>
<div class="emp">
<div class="sub_wrap">

<h2>Employee name:&nbsp;<span style="font-size:12px"><?=$getR["emp_name"]?></span><span style="float:right"><img src="popup-box/img/user.png" title="User"/></span></h2>
<span class="cont">Request Type:&nbsp;<?=$getR["Request_type"]?></span><br/><br/>
<span class="cont">Request Date:&nbsp;<?=date('d-m-Y',strtotime($getR["submitted_date"]))?></span><br/><br/>
<span class="cont">Manger Comments:</span>&nbsp;<textarea name="mancomm" rows="3" cols="5" style="width:100%; resize:none; " readonly><?=$getR["comments"]; ?></textarea>
</div>
</div>
<?php if($getR["opmng_comments"] !='') {?>
<div class="eval">
<div class="sub_wrap">
<h2>Operation Manager:&nbsp;<span style="font-size:12px"></span><span style="float:right"><img src="popup-box/img/eval.png" title="User"/></span></h2>
<span class="cont">Comments:</span>&nbsp;<textarea name="opmngcomm" rows="3" cols="5" style="width:100%; resize:none; "><?=$getR["opmng_comments"]; ?></textarea>
</div>
</div>
<?php } ?>
<?php if($getR["vp_comments"] !='') {?>
<div class="man">
<div class="sub_wrap">
<h2>Vice President:&nbsp;<span style="font-size:12px"></span><span style="float:right"><img src="popup-box/img/manager.png" title="User"/></span></h2>
<span class="cont">Comments:</span>&nbsp;<textarea name="vpcomm" rows="3" cols="5" style="width:100%; resize:none; "><?=$getR["vp_comments"]?></textarea>
</div>
</div>
<?php } ?>
<?php if($getR["cvp_comments"] !='') {?>
<div class="man">
<div class="sub_wrap">
<h2>Senior Vice President:&nbsp;<span style="font-size:12px"></span><span style="float:right"><img src="popup-box/img/manager.png" title="User"/></span></h2>
<span class="cont">Comments:</span>&nbsp;<textarea name="cvpcomm" rows="3" cols="5" style="width:100%; resize:none; "><?=$getR["cvp_comments"]?></textarea>
</div>
</div>
<?php } ?>

<div class="hr">
<div class="sub_wrap">
<h2>Hr:<span style="float:right"><img src="popup-box/img/hr.png" title="User"/></span></h2>
<span class="cont">Comments:</span>&nbsp;<textarea name="hrcom" rows="3" cols="5" style="width:100%; resize:none; "><?=$getR["closed_comments"]?></textarea>&nbsp;<span class="error" id="comments1" style="color:#F00"></span>
</div>
</div>

<input type="submit" name="submit" class="btn btn-primary" value="SUBMIT" style="margin-left:20%; width:100px; "/>
<div  class="btn btn-default"><a href="admin_backfill.php" style="color:#000;">Go Back</a></div>
</form>
</div>
      </div>
      <!--/tabs-->
      <!--/container-->
<!-- /Main -->

 
           
        </div> <!--your content end-->
    
    </div> <!--toPopup end-->
    
	<div class="loader"></div>
   	<div id="backgroundPopup"></div>
<div id="toPopup"> 
    	
        <div class="close"></div>
       
        <?php //echo $_REQUEST['id'];?>
       	<span class="ecs_tooltip">Press Esc to close <span class="arrow"></span></span>
		<div id="popup_content"> <!--your content start-->
          
            <div id="info"></div>
            
            
        </div> <!--your content end-->
    
    </div> <!--toPopup end-->

<!--<footer class="text-center">&copy; <?php echo date('Y')?> <a href="adda.2adpro.com"><strong>2adpro</strong></a></footer>-->





  
	<!-- script references -->
		
	</body>
</html>
<?php session_start();

include_once('connection.php');
include_once('functions.php');

//echo $_SESSION['userid'];  
  $check = checkHR($_SESSION['userid']);
 if(($check != 'admin') or (!isset($_SESSION['user'])))
{	
	header("location:index.php");
}
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
                 <?php include_once('menus.php'); ?>
       <header>
  <div class="logo"><img src="assets/images/logo-.png" /></div>
  
  <div class="head">
  <span id="tit"><img src="assets/images/tit.png" /></span>
  </div>
 
  <div class="head-ash"><!--<img src="assets/images/line.png" />--><h2>Admin</h2></div>

  </header>
  

<div class="main">
<div class="scr2">
 <table class="table table-condensed">
  <tr >
    <th scope="col">Name</th>
    <th scope="col">Position Applied</th>
    <th scope="col">Interview Date</th>
    <th scope="col">Assessor1 Name</th>
    <th scope="col">Assessor1 Comments</th>
    <th scope="col">Assessor1 Status</th>
    <th scope="col">Assessor2 Name</th>
    <th scope="col">Assessor2 Comments</th>
    <th scope="col">Assessor2 Status</th>
    <th scope="col">HR Comments</th>
    <th scope="col" id="brdr">Options</th>
  </tr>
  <?php $mrecords = admincontact();
   $num_rows = mysql_num_rows($mrecords);
  
   $count =0;
   $i=1;
   if($num_rows > 0)
   {
  while($mcontact = mysql_fetch_array($mrecords))
  {
$count++;
  ?>
  <tr >
    <td ><a href="#" class="topopup" id="<?=$count?>"><?=$mcontact['name']?></a><input type="hidden" name="recID" id="recID_<?=$count?>" value="<?=$mcontact['id']?>" /></td>
    <td><?=$mcontact['position']?></td>
    <td><?=date('d-m-Y',strtotime($mcontact['register_on']))?></td>
    <td><?=$mcontact['eval_emp_name']?></td>
    <td><?php if($mcontact['eval_comments']!='') { echo $mcontact['eval_comments']; } else { echo "No"; } ?></td>
    <td><?php if($mcontact['status']=='1') { ?><button type="button" id="btn-spc" class="btn btn-success">Selected</button><?php } else {?><button type="button" class="btn btn-danger">Rejected</button><?php } ?></td>
    <?php if($mcontact['status'] =='1' and $mcontact['mstatus']!='2') { ?>
    <td><?php if($mcontact['manager_emp_name']!=''){ echo $mcontact['manager_emp_name']; } else { echo "Still No Manager Evaluation"; }?></td>
    <td><?php if($mcontact['man_comments']!='') { echo $mcontact['man_comments']; } else { echo "Still No Manager Evaluation";}?></td>
    <td><?php if($mcontact['mstatus']=='1'){?><button type="button" class="btn btn-success">Selected</button><?php } elseif($mcontact['mstatus']=='2') {?><button type="button" class="btn btn-danger">Rejected</button><?php }  else { echo "Still No Manager Evaluation";}?></td>
    <td><?php if($mcontact['hrcomments']!='') { echo $mcontact['hrcomments']; }  else { echo "Still No HR Evaluation";}?></td>
    <td>  
    <?php if($mcontact['hrstatus']!='2'){?>
    <div  <?php if($mcontact['hrstatus']=='1'){?>class="btn btn-success" <?php } else {?>class="btn btn-primary"<?php } ?> >
    <?php if($mcontact['hrstatus']=='1') { ?><a href="hr_select_comments.php?c=<?=$mcontact['id']?>">Selected</a><?php } else { ?>
    <a href="hr_select_comments.php?c=<?=$mcontact['id']?>">Selected</a><?php } ?>
    
    </div>
    
    <?php } if($mcontact['hrstatus']!='1'){?>
<div  <?php if($mcontact['hrstatus']=='2'){?>class="btn btn-danger"<?php } else {?>class="btn btn-info"<?php } ?>>
 <?php if($mcontact['hrstatus']=='2') { ?><a href="hr_comments.php?c=<?=$mcontact['id']?>" >Rejected</a><?php } else { ?>
<a href="hr_comments.php?c=<?=$mcontact['id']?>">Rejected</a>
<?php } ?>
</div>

<?php } ?>

<div  class="btn btn-default"><a href="hredit.php?c=<?=$mcontact['id']?>" style="color:#000">Edit</a></div>

</td>

<?php }else {?>
<td><?=$mcontact['manager_emp_name']?></td>
    <td><?php if($mcontact['man_comments']!='') { echo $mcontact['man_comments']; } ?></td>
    <td><?php if($mcontact['mstatus']=='1'){?><button type="button" class="btn btn-success">Selected</button><?php } elseif($mcontact['mstatus']=='2') {?><button type="button" class="btn btn-danger">Rejected</button><?php } ?></td>
    <td><?php if($mcontact['hrcomments']!='') { echo $mcontact['hrcomments']; } ?></td>
    <td> </td>
<?php } ?>
  </tr>
  <?php }}else{ ?>
  <tr>
  <td colspan="11" style="text-align:center"><span style="color:#F00; font-weight:bold;">No records found!!</span></td>
  </tr>
  <?php } ?>
</table>
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
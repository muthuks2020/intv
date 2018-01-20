<?php session_start();
include_once('connection.php');
include_once('functions.php');

//echo $_SESSION['userid'];
$check = checkMan($_SESSION['userid']);

if(($check <= 0) or (!isset($_SESSION['userid'])))
{
	header("location:index.php");
}

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Manager Evaluation Form</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

        <link href="css/evaluation.css" rel="stylesheet">
        <link href="css/pagination.css" rel="stylesheet">



        <script type="text/javascript" src="js/jquery-1.10.2.min.js"> </script>
		<script src="js/bootstrap.min.js"></script>



	</head>
	<body style="height:100%; width:100%">
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
         <div class="brd_nav">
               <ul>

               <li><a href="backfill.php">Backfill Request</a></li>

               </ul>
               </div>
       <header>
  <div class="logo"><img src="assets/images/logo-.png" /></div>

  <div class="head">
  <span id="tit"><img src="assets/images/tit.png" /></span>
  </div>

  <div class="head-ash"><!--<img src="assets/images/line.png" />--><h2>Assessor2</h2></div>

  </header>


<div class="main">
<div class="scr2">
<table class="table table-condensed" >
  <tr>
      <th scope="col">Name</th>
    <th scope="col">Position Applied</th>
     <th scope="col">Assessor1 name</th>
    <th scope="col">Assessor1  Comments</th>
    <th scope="col">Assessor1  Status</th>
    <th scope="col" style="display: none;">Download Files</th>
    <th scope="col" id="brdr">Options</th>
  </tr>
  <?php


  $mrecords = mcontact();
   $num_rows = mysql_num_rows($mrecords);
   if($num_rows > 0)
   {
  while($mcontact = mysql_fetch_array($mrecords))
  {

  ?>
  <tr>
    <td><?php if($mcontact['uploadfiles']!=''){ echo '<a href="../'.$mcontact['uploadfiles'].'">'.$mcontact['name'].'</a>'; } else { echo $mcontact['name']; } ?></td>
    <td><?=$mcontact['position']?></td>
   <td><?=$mcontact['eval_emp_name']?></td>
    <td><?php if($mcontact['eval_comments']!='') { echo $mcontact['eval_comments']; } else { echo "No"; } ?></td>
    <td><?php if($mcontact['status']=='1') { ?><button type="button" class="btn btn-success">Selected</button>&nbsp;&nbsp;<div class="btn btn-info"><a href="assviewdetails.php?c=<?=$mcontact['id']?>">View Details</a></div><?php } ?></td>
	<td style="display: none;"><div class="btn btn-primary"><a href="/interviewc/admin/uploads/<?=$mcontact['contact']?>/files" target="_blank" >Files</a></div>
		<div class="btn btn-primary"><a href="/interviewc/admin/uploads/<?=$mcontact['contact']?>/resume" target="_blank" >Resume</a></div></td>
    <td>

<div  id="btn-spc" <?php


 if($mcontact['mstatus']=='1'){ ?>class="btn btn-success" <?php } elseif($mcontact['mstatus']=='3'){?> class="btn btn-warning"<?php }else {?>class="btn btn-primary"<?php } ?> >





<?php


$check_man_id = mysql_query("SELECT * FROM `contacts` WHERE manager_emp_id IN ('".$_SESSION['userid']."') AND mstatus IN ('1','3') AND id='".$mcontact['id']."'")or die('MySql Error' . mysql_error());
$numrows = mysql_num_rows($check_man_id );
$fetch = mysql_fetch_array($check_man_id);
//print_r($fetch);


if($numrows > 0) {

	?>
    <a href="man_select_comments1.php?c=<?=$mcontact['id']?>"><?php if($fetch['mstatus']=='3'){?>On Hold<?php } else { ?>Selected<?php } ?></a>
	<?php  }  elseif($mcontact['mstatus']=='0') { ?>
	<a href="man_select_comments.php?c=<?=$mcontact['id']?>">Selected</a><?php } else {?>
Selected
<?php } ?>


    </div>
     <?php if($mcontact['mstatus']!='1') { ?>
<div  class="btn btn-danger"><a href="man_comments.php?c=<?=$mcontact['id']?>" >Rejected</a></div>
<?php } ?></td>
  </tr>
  <?php }}else{ ?>
  <tr>
  <td colspan="6" style="text-align:center"><span style="color:#F00; font-weight:bold;">No records found!!</span></td>
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


<!--<footer class="text-center">&copy; <?php echo date('Y')?> <a href="adda.2adpro.com"><strong>2adpro</strong></a></footer>-->






	<!-- script references -->

	</body>
</html>
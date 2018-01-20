<?php session_start();
include_once('connection1.php');



//print_r($_SESSION['reporting_id']);
/*$rec = $_SESSION['reporting_id'];
echo $ids = join(',',$rec);*/

if(!isset($_SESSION['userid']))
{	
	header("location:index.php");
}


if(isset($_POST['resetManager']) == 'submit'){
	
	
	mysql_query("UPDATE hub_request SET status='0', opmstatus='0', vpstatus='0' WHERE rid = '".$_POST['opmreqname']."'");
	
	
}

if(isset($_POST['resetVP']) == 'submit'){
	
	
	mysql_query("UPDATE hub_request SET  vpstatus='0' WHERE rid = '".$_POST['vpreqname']."'");
	
}

if(isset($_POST['resetSVP']) == 'submit'){
	
	
	mysql_query("UPDATE hub_request SET  cvpstatus='0' WHERE rid = '".$_POST['svpreqname']."'");
	
}


?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Admin Option Enable Form</title>
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
	
	 <style>
	 fieldset {
    font-family: sans-serif;
border: 1px solid #D1D1D1;
background: #ECEBEB;
width:63%;
float:left;
padding: 0px 0px 10px 20px;
}

fieldset legend {
 background: #A7AAAA;
color: #fff;
padding: 5px 10px;
font-size: 15px;
border-radius: 5px;
box-shadow: 0 0 0 5px #E2E2E2;
margin-left: 20px;
}
	 </style> 
    
        
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
            $(document).ready(function (e) {

                <?php
                if (isset($_REQUEST['msg'])) {
                    if (@$_REQUEST['msg'] == "u") { ?>
                        $("#mesE").append('<p id="msg_e" style="color:#F00; text-align:center">Successfully Updated</p>').slideDown("slow");
                        setTimeout(function () {
                            $('#msg_e').slideUp(function () {
                                $(this).remove()
                            });
                        }, 3000);

                        <?php
                    }
                } ?>

            });
		
        </script>
        
<script type="text/javascript">
	

		
	 function opmvalidate()
{
	
	 if(document.opmform.opmreqname.value == " "){
		 alert("Select Operation Manager Request Employee");
		  return false;
		  
	 }
	
	 
	
	
}
	 function vpvalidate()
{
	 if(document.vpform.vpreqname.value == " "){
		 alert("Select Vice President request Employee");
		  return false;
		  
	 }
	/* else if(document.vpform.manager.value == " "){
		 alert("Select Vice President");
		  return false;
		  
	 }*/
	 
	
	
}
	 function svpvalidate()
{
	 if(document.myform.svpreqname.value == " "){
		 alert("Select Senior Vice President request Employee");
		  return false;
		  
	 }
	
	 
	
	
}


   
	  
	  
		  </script>
                  <?php include_once('menus.php'); ?>
        <header>
            <div class="logo">
              
            </div>

            <div class="head">
                <span id="tit"><img src="assets/images/optns-enabl.png" /></span>
            </div>

            <div class="head-ash">
                <!--<img src="assets/images/line.png" />-->
                <h2>Admin</h2>
            </div>

        </header>


        <div class="main">


            <div class="rsgn_wrap">

                  

                    <div class="orange" id="backwrap">
                        <span class="head_top">Option Enable Form</span>
                    </div>
                    <h1></h1>
                    <div class="frm">
                        <div class="frm_wrap1">
                        
                            <form action="option_enable.php" name="opmform" id="opmform" method="post" onSubmit="return opmvalidate();">
 
                    
                   
                    
                    
                    <span class="rgtnew"><fieldset><legend>Reset Operation Manager Options</legend>
    <label>Select Employee: <select name='opmreqname' class="DropDown" id="opmreqname">
  <option value=" ">-Select-</option>
  <?php 
 
	$opmqury = mysql_query("SELECT * FROM `hub_request` WHERE opmstatus IN ('1','2')") or die(mysql_error());
	while($opm = mysql_fetch_array($opmqury)){
 ?>
  <option value="<?php echo $opm['rid']; ?>"><?php echo $opm['emp_name']; ?></option>
  <?php }?>
  
  </select></label>
	
  <!--<label>Select Manager: <select name='manager' class="DropDown" id="manager">
  <option value=" ">-Select-</option>
  <?php 
  
	/*$opmqury1 = mysql_query("SELECT * FROM `hub_request` WHERE opmstatus IN ('1','2')") or die(mysql_error());
	while($opm1 = mysql_fetch_array($opmqury1)){
		$getmanName = mysql_query("SELECT * FROM `hub_user` WHERE `eid`='".$opm1['reporting_manager_id']."' GROUP BY '".$opm1['reporting_manager_id']."'");
		$getrecord = mysql_fetch_array($getmanName);*/

 ?>
  <option value="<?php //echo $opm1['rid']; ?>"><?php // echo $getrecord['name']; ?></option>
  <?php //}?>
  
  </select>
  </label> -->
  

                                   
  
  <input type="submit" class="btn btn-primary"  value="Submit" name="resetManager">
  </fieldset></span>
  

                </form>
                        </div>
                        </div>
                         <div class="frm">
                        <div class="frm_wrap1">
                            <form action="option_enable.php" name="vpform" id="vpform" method="post" onSubmit="return vpvalidate();">
 
                    
                   
                    
                    
                    <span class="rgtnew"><fieldset><legend>Reset Vice President Options</legend>
  <label>Select Employee: <select name='vpreqname' class="DropDown" id="vpreqname">
  <option value=" ">-Select-</option>
  <?php 
 
	$opmqury1 = mysql_query("SELECT * FROM `hub_request` WHERE vpstatus IN ('1','2') AND status IN('1')") or die(mysql_error());
	while($opm1 = mysql_fetch_array($opmqury1)){
 ?>
  <option value="<?php echo $opm1['rid']; ?>"><?php echo $opm1['emp_name']; ?></option>
  <?php }?>
  
  </select></label>
	
  
  

                                   
 
  <input type="submit" class="btn btn-primary"  value="Submit" name="resetVP">
  </span>
  

                </form>
                        </div>
                        </div>
                         <div class="frm">
                        <div class="frm_wrap1">
                            <form action="option_enable.php" name="myform" id="myform" method="post" onSubmit="return svpvalidate();">
 
                    
                   
                    
                    
                     <span class="rgtnew"><fieldset><legend>Reset Senior Vice President Options</legend>
  <label>Select Employee: <select name='svpreqname' class="DropDown" id="svpreqname">
  <option value=" ">-Select-</option>
  <?php 
 
	$opmqury2 = mysql_query("SELECT * FROM `hub_request` WHERE cvpstatus IN ('1','2') AND status IN('0')") or die(mysql_error());
	while($opm2 = mysql_fetch_array($opmqury2)){
 ?>
  <option value="<?php echo $opm2['rid']; ?>"><?php if($opm2['Request_type']=='New Request'){ echo $opm2['designation']; } else { echo $opm2['emp_name']; }?></option>
  <?php }?>
  
  </select></label>
	
  

                                   
  
  <input type="submit" class="btn btn-primary"  value="Submit" name="resetSVP">
  </span>
  

                </form>
                        </div>

                    </div>
                    
                    

              


                

                

            </div>

        </div>




        <!--/tabs-->
        <!--/container-->
        <!-- /Main -->



    </div>
    <!--your content end-->

    <!--toPopup end-->

    <div class="loader"></div>
    <div id="backgroundPopup"></div>


    <!--<footer class="text-center">&copy; <?php echo date('Y')?> <a href="adda.2adpro.com"><strong>2adpro</strong></a></footer>-->





    <!-- script references -->

</body>

</html>
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
		<title>Admin</title>
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
        
        

        <header>
            <div class="logo">
            </div>
            
            
                    <?php include_once('menus.php'); ?>
            
            

            <div class="head">
                <span id="tit"><img src="assets/images/dashboard.png" /></span>
            </div>

            <div class="head-ash">
                <!--<img src="assets/images/line.png" />-->
                <h2></h2>
            </div>

        </header>


      <div class="main">
      <div class="rsgn_wrap">
      <div class="brd_lft">
      
      <div class="brd_panl">
      <div class="panl_wrp" >
      <div class="brd_head"><h2>Selection Process</h2></div>
      <div class="panl-1">
      <h2>Assessor 1</h2>
      <p>Total number of candidates</p>
      <div class="count"><?php $total = countContact(); echo $total;?></div>
    <div class="rnd_wrp"><div class="rnd"><span class="sel">Selected</span><h2><?php $ass1selected = countAss1Contact(); echo $ass1selected;?></h2></div></div>
      </div>
      
     <div class="panl-1">
      <h2>Assessor 2</h2>
      <p>Selected candidates from Assessor 1</p>
      <div class="count"><?php 
	  // $get_num_rows =countAss1NumRows();
	 // if($get_num_rows > 0){  $ass1selected1 = countAss1Contact1(); echo $ass1selected1;} else { echo $ass1selected; }
	  echo $ass1selected;
	  
	  ?></div>
     <div class="rnd_wrp"><div class="rnd"><span class="sel">Selected</span><h2><?php $ass2selected = countAss2Contact(); echo $ass2selected;?></h2></div></div>
      </div>
      
      
      <div class="panl-1">
      <h2>HR</h2>
      <p>Selected candidates from Assessor 2</p>
      <div class="count"><?php
   // $get_ass2_num_rows =countAss2NumRows();
//	  if($get_ass2_num_rows > 0){  $ass2selected2 = countAss2Contact2(); echo $ass2selected2;} else {  echo $ass2selected; } 
	    echo $ass2selected;
	   ?></div>
   <div class="rnd_wrp"><div class="rnd"><span class="sel">Selected</span><h2><?php $hrselected = countHRContact(); echo $hrselected;?></h2></div></div>
      </div>
     
     </div>
     </div>
     
     
      
      
      
      
      
       <?php include_once('connection1.php');
	 
	  ?>
      <div class="brd_panl">
      <div class="brd_head"><h2>Backfill</h2></div>
      <div class="panl_wrp">
      <div class="panl-2">
      <h2>Manager</h2>
       <div class="rnd_wrp"><div class="rnd"><span class="sel">No. of request</span><h2><?php $manRequest = countManRequest(); echo $manRequest;?> </h2></div></div>
      </div>
            
      <div class="panl-2">
      <h2>OPM</h2>
      <div class="watg"><span class="rd">Waiting List</span><h2><?=$manRequest?></h2></span></div>
      <div class="rnd"><span class="sel">Approved</span><h2><?php $OPMapproved = countOPMapproved(); echo $OPMapproved;?> </h2></span> </div>
       <div class="rnd_wrp"><div class="rnd_red"><span class="sel">Rejected</span><h2><?php $OPMrejected = countOPMrejected(); echo $OPMrejected;?></h2></div></div>
      </div>
      
      
      <div class="panl-2">
      <h2>VP</h2>
      <div class="watg"><span class="rd">Waiting List</span><h2><?=$OPMapproved?></h2></span></div>
      <div class="rnd_wrp"><div class="rnd"><span class="sel">Approved</span><h2><?php $VPapproved = countVPapproved(); echo $VPapproved;?></h2></div></div>
       <div class="rnd_wrp"><div class="rnd_red"><span class="sel">Rejected</span><h2><?php $VPrejected = countVPrejected(); echo $VPrejected;?></h2></div></div> 
      </div>
      
      
      
       
      
      
     </div>
     </div>
     <div class="brd_panl">
      <div class="brd_head"><h2>OPM Backfill Request</h2></div>
      
      <div class="panl-3">
      <h2>OPM</h2>
      <div class="sqr mid"><span class="sel">No. of request</span><h2 class="ash"><?php $OPmanRequest = countOPManRequest(); echo $OPmanRequest;?></h2></span> </div>
      
      </div>
      
      <div class="panl-3">
      <h2>VP</h2>
       <div class="watg"><span class="rd">Waiting List</span><h2><?=$OPmanRequest;?></h2></span></div>
      <div class="sqr"><span class="sel">Approved</span><h2><?php $SVPOPMBapproved = countSVPOPMBackfillApproved(); echo $SVPOPMBapproved;?></h2></span> </div>
      <div class="sqr-red"><span class="sel">Rejected</span><h2><?php $SVPOPMBrejected = countSVPOPMBackfillRejected(); echo $SVPOPMBrejected;?></h2></div> 
      </div>
      </div>
     </div> 
      
      
      
      
      
      
      
      <div class="brd_rgt">
      <div class="brd_pan3">
      <div class="brd_head"><h2>VP Backfill Request</h2></div>
      
      <div class="panl-3">
      <h2>VP</h2>
      <div class="sqr mid"><span class="sel">No. of request</span><h2 class="ash"><?php $VPBRequest = countVPBackfillRequest(); echo $VPBRequest;?></h2></span> </div>
      
      </div>
      
      <div class="panl-3">
      <h2>SVP</h2>
       <div class="watg"><span class="rd">Waiting List</span><h2><?=$VPBRequest;?></h2></span></div>
      <div class="sqr"><span class="sel">Approved</span><h2><?php $SVPBapproved = countSVPBackfillApproved(); echo $SVPBapproved;?></h2></span> </div>
      <div class="sqr-red"><span class="sel">Rejected</span><h2><?php $SVPBrejected = countSVPBackfillRejected(); echo $SVPBrejected;?></h2></div> 
      </div>
      </div>
      
      
      <div class="brd_pan3">
      <div class="brd_head"><h2>VP New Request</h2></div>
      
      <div class="panl-3">
      <h2>VP</h2>
      <div class="sqr mid"><span class="sel">No. of request</span><h2 class="ash"><?php $VPNRequest = countVPnewRequest(); echo $VPNRequest;?></h2></span> </div>
      
      </div>
      
      <div class="panl-3">
      <h2>SVP</h2>
      <div class="watg"><span class="rd">Waiting List</span><h2><?=$VPNRequest?></h2></span></div>
      <div class="sqr"><span class="sel">Approved</span><h2><?php $SVPNRapproved = countSVPnewApproved(); echo $SVPNRapproved;?></h2></span> </div>
      <div class="sqr-red"><span class="sel">Rejected</span><h2><?php $SVPNRrejected = countSVPNewRejected(); echo $SVPNRrejected;?></h2></div> 
      </div>
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
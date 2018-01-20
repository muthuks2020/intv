<?php session_start();

include_once('connection1.php');

include_once('functions.php');


if(!isset($_SESSION['userid']))
{	
	header("location:index.php");
}





?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Manager Backfill Request</title>
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
 <!--<div class="bkfl">
 <?php if($_SESSION['usertype']=='1'){?>
 <span class="bktxt"> <a href="man_dashboard.php">Dashboard</a></span>
 <?php } elseif($_SESSION['usertype']=='2'){ ?>
 <span class="bktxt"><a href="operationManager.php">Dashboard</a></span>
 <?php } ?>
            <img src="assets/images/bkfil.png">
        </div>-->
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
        <script>
	$(document).ready(function(){
$( "#rwrp" ).click(function() {
  $( ".nme_lst" ).slideToggle( "slow" );
});
$( "#backwrap" ).click(function() {
  $( ".frm" ).slideToggle( "slow" );
});
});
</script>
<script type="text/javascript">
	

		
	 function validate()
{
	 if(document.myform.empdesig.value == " "){
		 alert("Select Employee designation");
		  return false;
		  
	 }
	 
	 else if(document.myform.comTxt.value == "") {
		 alert("Provide Comment");
		   return false;
		  
	}
	
}

function empDetails(id)
	{


		var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("getData").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","backfill_Post.php?eid="+id,true);
xmlhttp.send();
		
	
		
	}
   
	
	  
		  </script>
		  
          <div class="brd_nav">
               <ul>
               <?php 
			   if($_SESSION['usertype']=='1'){?>
               <li> <a href="man_dashboard.php">Interview Selection</a></li>
			   <li> <a href="backfill.php">Backfill</a></li>
               <?php } elseif($_SESSION['usertype']=='2'){ ?>
               <li><a href="operationManager.php">Dashboard</a></li>
               <?php } ?>
               </ul>
               </div>
        <header>
            <div class="logo">
              
            </div>

            <div class="head">
                <span id="tit"><img src="assets/images/emp-lst.png" /></span>
            </div>

            <div class="head-ash">
                <!--<img src="assets/images/line.png" />-->
                <h2>Manager</h2>
				<span id='manpower'></span>
            </div>

        </header>


        <div class="main">


            <div class="rsgn_wrap">

                


                


                <div class="orange stat" >
                    <h2>Resign List</h2>
                </div>
				<div class="scrl">
                <table class="table table-condensed" border="0">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Name</th>
                        <!--th scope="col">Request Type</th-->
                       
                        <th scope="col">Add resign list</th>
                        <th scope="col">Status</th>
                       
                    </tr>
                   
<?php

$apprQuery = mysql_query("select *from hub_manpower where reporting_manager_id='".$_SESSION['userid']."'")or die(mysql_error());
$rows = mysql_num_rows($apprQuery);
$sno = 0;
if($rows > 0){
while($res=mysql_fetch_array($apprQuery)){

$sno++;


	
?>
                   
                    <tr >
                        <td><?php echo $sno.".";  ?></td>
						<?php
						$Query = mysql_query("select *from hub_manpower where reporting_manager_id='".$res['eid']."'")or die(mysql_error());
						$qrows = mysql_num_rows($Query);
						if($qrows >0)
						{
						?>
                        <td><a href="tlresignlist.php?eid=<?=$res['eid']?>"><?php echo $res['name'];  ?></a></td>
                        <?php } else { ?><td><?php echo $res['name'];  ?></td><?php } ?>
                        <td style="text-align:center">
						<?php
						$resignlist = mysql_query("SELECT * FROM `hub_reason` WHERE eid='".$res['eid']."'")or die(mysql_error());
						 $rrows = mysql_num_rows($resignlist);
						if($rrows <= 0)
						{
						?>
						<a href="insertreason.php?eid=<?=$res['eid']?>&m=man"><img src="images/add.png" title="Add" /></a>
						<?php } else {
							?>
							<a href="deletereason.php?eid=<?=$res['eid']?>&m=man"><img src="images/trash.png" title="Delete" /></a>
							<?php
						}
						?>
						</td>
                       
                        <td><?php if($rrows > 0){?><span>Added in resignation lists<span><?php } ?></td>
                       
                        
                        
                        
                    </tr>
                   
<?php } } else {  ?>

 <tr><td colspan="4" align="center"><span style="color:#F00; font-weight:bold;">No Records Found!!</span></td></tr> 

<?php } ?>
               
              
                </table>
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


   





    <!-- script references -->

</body>

</html>
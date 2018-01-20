<?php session_start();

include_once('connection1.php');

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
		<title>Mapped List</title>
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
        <?php include_once('menus.php'); ?>
      

        <header>
            <div class="logo">
              
            </div>

            <div class="head">
                <span id="tit"><img src="assets/images/new-req-list.png" /></span>
            </div>

            <div class="head-ash">
                <!--<img src="assets/images/line.png" />-->
                <h2>Admin</h2>
            </div>

        </header>


        <div class="main">


            <div class="rsgn_wrap">

                


                


                <div class="orange stat" >
                    <h2>Status</h2>
                </div>
				<div class="scr2">
                <table class="table table-condensed" border="0">
                    <tr>
                       <!-- <th scope="col">No</th>
                        <th scope="col">Old Employee Name</th>
                        <th scope="col">Old Employee Role</th>
                        <th scope="col">Old Employee Cluster</th>
                        <th scope="col">New Employee Name</th>
                        <th scope="col">New Employee Role</th>
                        <th scope="col">Mapped Date</th>
                        <th scope="col" id="brdr">Mapped By</th>-->
                        <th scope="col">No</th>
                        <th scope="col">New Request Designation Name</th>
                        <th scope="col">Cluster/Business Unit</th>
                        <th scope="col">Offered Candidate Name</th>
                        <th scope="col">Offered Candidate Role</th>
                        <th scope="col">Mapped Date</th>
                        <th scope="col" id="brdr">Mapped By</th>
                    </tr>
                   
<?php

$mapQuery = mysql_query("SELECT * FROM `hub_backfill_map` WHERE `mapping`='1' and Request_type='New Request'")or die(mysql_error());
$rows = mysql_num_rows($mapQuery);
$sno = 0;
if($rows > 0){
while($res=mysql_fetch_array($mapQuery)){

$sno++;


	
?>
                   
                    <tr >
                        <td><?php echo $sno.".";  ?></td>
                        <td><?php echo $res['approved_emp_name'];  ?></td>
                       <td><?php echo $res['approved_emp_cluster'];  ?></td>
                        <td><?php echo $res['selected_emp_name'];  ?></td>
                        
                        <td><?php echo $res['selected_emp_pos'];  ?></td>
                        <td><?php echo date('d-m-Y H:i:s',strtotime($res['updated_at']));  ?></td>
                       	<td><?php echo $res['updated_by'];  ?></td>
                    </tr>
                   
<?php } } else {  ?>

 <tr><td colspan="7" align="center"><span style="color:#F00; font-weight:bold;">No Records Found!!</span></td></tr> 

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


    <!--<footer class="text-center">&copy; <?php echo date('Y')?> <a href="adda.2adpro.com"><strong>2adpro</strong></a></footer>-->





    <!-- script references -->

</body>

</html>
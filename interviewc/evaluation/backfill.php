<?php session_start();

include_once('connection1.php');

include_once('functions.php');


if(!isset($_SESSION['userid']))
{	
	header("location:index.php");
}


if(@$_POST['submit'] == 'Submit'){
	
$current_date = date("Y-m-d H:i:s");
$empname = mysql_query("select * from `hub_user` where `eid`='".$_POST['rid']."'");
$empres = mysql_fetch_array($empname);

$getreportManger = mysql_query("select * from `hub_manpower` where `eid`='".$_SESSION['userid']."'");
$getRManager = mysql_fetch_array($getreportManger);

	mysql_query("insert into hub_request (`employee_id`,`emp_name`,`request_emp_id`,`reporting_manager_id`,`designation`, `old_designation`,`cluster`, `comments`,`Request_type`,`submitted_date`,`man_updated_by`,`man_updated_at`,`usertype`) values ('".$_POST['rid']."','".$empres['name']."','".$_SESSION['userid']."','".$getRManager['reporting_manager_id']."','".$_POST['empdesig']."','".$_POST['olddesig']."','".$_POST['cluster']."','".mysql_real_escape_string($_POST['comTxt'])."','".$_POST['backfill']."','".$current_date."','".$_SESSION['user']."','".$current_date."','".$_SESSION['usertype']."')") or die(mysql_error());	
	
	
//	mysql_query("insert into hub_request (`employee_id`,`emp_name`,`request_emp_id`,`reporting_manager_id`,`designation`, `old_designation`,`cluster`, `comments`,`Request_type`,`submitted_date`,`man_updated_by`,`man_updated_at`,`usertype`) values ('".$_POST['rid']."','".$empres['name']."','".$_SESSION['userid']."','".$getRManager['reporting_manager_id']."','".$_POST['empdesig']."','".$_POST['olddesig']."','".$_POST['cluster']."','".mysql_real_escape_string($_POST['comTxt'])."','".$_POST['backfill']."','".$current_date."','".$_SESSION['user']."','".$current_date."','".$_SESSION['usertype']."')") or die(mysql_error());	
	
	header('location:backfill.php');
	
	
	
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
                                $(this).remove();
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
   
	 function resignation(mid)
	 {
		// alert(mid);
		 $.ajax({
			url:"getemployees.php?mid="+mid,
			type:"POST",
			
			success:function(result){
				
				$("#manpower").html(result);
				
			}	
		 });
	 }	 
	 
	 function selectemp(eid)
	 {
		 //alert(eid);
		 $.ajax({
			url:"insertreason.php?eid="+eid,
			type:"POST",
			
			success:function(result){
				
				$("#manpower").html(result);
				
			}	
		 });
	 }	 
	  
		  </script>
		  
          <div class="brd_nav">
               <ul>
               <?php 
			   if($_SESSION['usertype']=='1'){?>
               <li> <a href="man_dashboard.php">Interview Selection</a></li>
			   <!--<li> <a href="#" onClick="resignation(<?=$_SESSION['userid']?>)">Resign Selection</a></li>-->
			   
			   <li> <a href="resignselection.php" >Anticipated</a></li>
               <?php } elseif($_SESSION['usertype']=='2'){ ?>
               <li><a href="operationManager.php">Dashboard</a></li>
               <?php } ?>
               </ul>
               </div>
        <header>
            <div class="logo">
              
            </div>

            <div class="head">
                <span id="tit"><img src="assets/images/bktit.png" /></span>
            </div>

            <div class="head-ash">
                <!--<img src="assets/images/line.png" />-->
                <h2>Manager</h2>
				<span id='manpower'></span>
            </div>

        </header>


        <div class="main">


            <div class="rsgn_wrap">

                <div id="sml_blk">

                    <div class="orange" id="rwrp">
                        <span class="head_top">Sl.No</span><span class="head_top">Resignation List</span>
                         
                    </div>
                    
                    <div class="nme_lst">
                        <ul>
                        <?php 
						$resign = @mysql_query("SELECT * FROM `hub_reason` WHERE manager='".$_SESSION['userid']."' and eid not in(select employee_id from hub_request where vpstatus IN('0','1'))")or die(mysql_error()); 
						
            //$sql = "SELECT * FROM `hub_reason` WHERE manager='".$_SESSION['userid']."' and eid not in(select employee_id from hub_request where vpstatus IN('0','1'))";
           //  echo $sql; die();

            $num_rows_re = mysql_num_rows($resign);
						if($num_rows_re > 0)
						{
						$i=0;
						while($row = mysql_fetch_array($resign))
						{
							$getname = mysql_query("SELECT * FROM `hub_user` WHERE `eid`='".$row['eid']."'") or die(mysql_error()); 
							$name = mysql_fetch_array($getname);
						$i++;
						?>
                        	
                            <li><span class="sno"><?=$i?>.</span><a href="#" onClick="empDetails('<?php echo $name['eid']; ?>')"><?=$name['name']?></a><!---->
                          
                            </li>
                           <?php } } else { ?>
                           <li><span style="color:#F00; font-weight:bold; margin:20px; ">No Records Found!!</span></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>


                <div id="big_blk">

                    <div class="orange" id="backwrap">
                        <span class="head_top">Backfill Request Form</span>
                    </div>
                    <div class="frm">
                        <div class="frm_wrap">
                            <form action="backfill.php" name="myform" id="myform" method="post" onSubmit="return validate();">
 <div class="">
                    <div id='getData'>
                    <?php
					if($num_rows_re > 0)
						{
					?>
                     <fieldset>
                                      <legend><img src="assets/images/emp.png" width="32" height="32" title="Old User"/>Old Employee Details</legend>
                                
                                    <span class="lft">
  <label>Employee ID</label>
	
    <label>Employee Name</label>
    
     <label>Designation</label>
	
  <label>Team</label>
  
 
  </span>
  <div class="wrp">
     <?php 
	 $singleresign = mysql_query("SELECT * FROM `hub_reason` WHERE manager='".$_SESSION['userid']."' LIMIT 1"); 
	 $row = mysql_fetch_array($singleresign);
				
					
							//$getname = mysql_query("SELECT * FROM `hub_user` WHERE `eid`='".$row['eid']."'");
							$getname = mysql_query("SELECT * FROM `hub_manpower` WHERE `eid`='".$row['eid']."'");
							$name = mysql_fetch_array($getname);
	 
	
						?>
                                    <label ><?=$name['eid']?></label>
                                    <input type="hidden" name="rid" value="<?=$name['eid']?>"/>
                                    <input type="hidden" name="olddesig" value="<?=$name['designation']?>"/>
                                     <input type="hidden" name="cluster" value="<?=$name['cluster']?>"/>

                                    <label><?=$name['name']?></label>

                                    <label><?=$name['designation']?></label>

                                    <label><?=$name['cluster']?></label>

                                    

                                </div>
                                </fieldset>
                               <?php } ?>
                    </div>
                    </div>
                    
                   
                    
                     <?php
					if($num_rows_re > 0)
						{
					?>
                    <span class="rgt styl">
                   
    <label>Request Type: <input type="text" name="backfill" id="backfill" value="Backfill" readonly /></label>
	
  <label>Designation: <select name='empdesig' class="DropDown" id="empdesig">
  <option value=" ">-Select-</option>
  <?php 
  
	$desqury = designation();
	while($desRes = mysql_fetch_array($desqury)){

 ?>
  <option value="<?php echo $desRes['designation']; ?>"><?php echo $desRes['designation']; ?></option>
  <?php }?>
  
  </select>
  </label> 
  

                                   
  <label for="female">Comments</label>
  <br>
 <textarea rows="3" cols="20" style="resize:none" name="comTxt" id='comTxt'></textarea>

   <br>
  <input type="submit" class="btn btn-primary" id="createbackfill" value="Submit" name="submit">
  
  </span>
  <?php } ?>

                </form>
                        </div>

                    </div>

                </div>


                <div class="orange stat" >
                    <h2>Status</h2>
                </div>
				<div class="scrl">
                <table class="table table-condensed" border="0">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Name</th>
                        <!--th scope="col">Request Type</th-->
                        <th scope="col">Date Of Request</th>
                        <th scope="col">Approved By</th>
                        <th scope="col">Status</th>
                        <!--th scope="col">Closed Date</th-->
                        <th scope="col" id="brdr">Closed Request</th>
                    </tr>
                   
<?php

$apprQuery = mysql_query("select * from hub_request WHERE request_emp_id='".$_SESSION['userid']."'")or die(mysql_error());
$rows = mysql_num_rows($apprQuery);
$sno = 0;
if($rows > 0){
while($res=mysql_fetch_array($apprQuery)){

$sno++;


	
?>
                   
                    <tr >
                        <td><?php echo $sno.".";  ?></td>
                        <td><?php echo $res['emp_name'];  ?></td>
                        <!--td><?php echo $res['Request_type'];?></td-->
                        <td><?php echo $res['submitted_date'];  ?></td>
                        <!--<td><?php if($res['vpstatus']=='1'){echo $res['approved_by']; } ?></td>-->
                        <td><?php 
						if($res['vpstatus'] == '1' || $res['opmstatus'] == '1'){
						echo '<span style="color:#229bd4;font-weight:bold;">'.$res['ops_man_updated_by'].'</span><br/><span style="font-size:11px;">'.$res['ops_man_updated_at'].'</span><br/>';
						if($res['vpstatus'] == '1'){
						echo '<span style="color:#f28c38;font-weight:bold;">'.$res['approved_by'].'</span><br/><span style="font-size:11px;">'.$res['approved_date'];'</span>'; } }?></td>
                       <!-- <td><?php //if($res['vpstatus']=='1'){echo $res['approved_date']; } ?></td>-->
                       <td><?php
						//if($res['usertype'] =="2" || $res['usertype'] =="0")
					//	{
						
							if($res['vpstatus']=='2')
							{
								 $cancel_name = $res['vp_updated_by'];	
							}
							else
							{
								$cancel_name = $res['ops_man_updated_by'];
							}
					//	}
					
						
                        if($res['vpstatus']=="1"){ echo  '<button class="btn btn-success" id="approveBtn">Approved by<br/>'.$res['approved_by'].'</button>';} elseif($res['status']=='2' || $res['opmstatus']=='2'){ echo '<button class="btn btn-danger" >Unapproved by<br/>'.$cancel_name.'</button>';}else{ echo '<button class="btn btn-default">Waiting for approval</button>'; }?>
                         </td>
                       
                        <!--td><?php echo $res['closed_date'];  ?></td-->
                         <td><?php echo $res['closed_by']."<br/><span style='font-size:11px;font-weight:bold;'>".$res['closed_date']."</span>";  ?></td>
                        
                    </tr>
                   
<?php } } else {  ?>

 <tr><td colspan="6" align="center"><span style="color:#F00; font-weight:bold;">No Records Found!!</span></td></tr> 

<?php } ?></table></div></div></div>




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
<?php session_start();
include_once('connection1.php');
include_once('functions.php');
//print_r($_SESSION);

if(!isset($_SESSION['userid']))
{	
	header("location:index.php");
}
//print_r($_POST);
if(isset($_POST['submit']) !=''){
	
		$current_date = date("Y-m-d H:i:s");
/*$empname = mysql_query("select * from `hub_user` where `eid`='".$_POST['rid']."'");
$empres = mysql_fetch_array($empname); */

$getreportManger = mysql_query("select * from `hub_manpower` where `eid`='".$_SESSION['userid']."'");
$getRManager = mysql_fetch_array($getreportManger);


 for($i=1;$i<=$_POST['norequest'];$i++)
 {
	
	 
	mysql_query("insert into hub_request(`request_emp_id`,`reporting_manager_id`,`designation`,`cluster`,`comments`,`opmstatus`,`Request_type`,`submitted_date`,`vp_updated_by`,`vp_updated_at`,`usertype`) values ('".$_SESSION['userid']."','".$getRManager['reporting_manager_id']."','".$_POST['newdesig']."','".$_POST['cluster']."','".$_POST['comTxt']."','3','".$_POST['backfill']."','".$current_date."','".$_SESSION['user']."','".$current_date."','".$_SESSION['usertype']."')") or die(mysql_error());	
 }
	header('location:VP_newrequest.php');
	
	
	
}


?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Backfill and New Request</title>
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
	
		  function empDesig(id)
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
xmlhttp.open("GET","new_Request_Post.php?eid="+id,true);
xmlhttp.send();
		
	
		
	}
	
	
	
	 function validate()
{
	if(document.myform.cluster.value == ""){
		 alert("Please enter cluster or business unit");
		  return false;
		  
	 }
	 
	 else if(document.myform.norequest.value == " "){
		 alert("Select number of request");
		  return false;
		  
	 }
	 
	 else if(document.myform.comTxt.value == "") {
		 alert("Provide Comment");
		   return false;
		  
	}
	
}
		  </script>
          <div class="brd_nav">
               <ul>
               <li><a href="VP_dashboard.php">Backfill Request</a></li>
               <li><a href="opeManagerRequest.php">Operation Manager Request</a></li>
              
               </div>
        <header>
            <div class="logo">
              
            </div>

            <div class="head">
                <span id="tit"><img src="assets/images/newreq.png" /></span>
            </div>

            <div class="head-ash">
                <!--<img src="assets/images/line.png" />-->
                <h2>Manager</h2>
            </div>

        </header>


        <div class="main">


            <div class="rsgn_wrap">

                <div id="sml_blk_vp">

                    <div class="orange" id="rwrp">
                        <span class="head_top">Sl.No</span><span class="head_top">Designation List</span>
                         
                    </div>
                    
                    <div class="nme_lst_vp">
                        <ul>
                        <?php 
						$resign = designation(); 
						
						$num_rows_re = mysql_num_rows($resign);
						if($num_rows_re > 0)
						{
							$i=0;
						while($row = mysql_fetch_array($resign))
						{
							
						$i++;
						?>
                        	
                            <li><span class="sno"><?=$i?>.</span><a href="#" onClick="empDesig('<?php echo $row['id']; ?>')"><?=$row['designation']?></a></li>
                           <?php } } else { ?>
                           <li><span style="color:#F00; font-weight:bold; margin:20px; ">No Records Found!!</span></li>
                            <?php } ?>
                            
                        </ul>
                    </div>
                </div>


                <div id="big_blk_vp">

                    <div class="orange" id="backwrap">
                        <span class="head_top">New Request Form</span>
                    </div>

                    <div class="frm">
                        <div class="frm_wrap">
                            <form action="" name="myform" id="myvpform" method="post" onSubmit="return validate();">
                            
                                                           <div class="">
                                                            <div id='getData'>
                                        <?php
					if($num_rows_re > 0)
						{
					?>
                                      <fieldset>
                                      <legend><img src="assets/images/emp.png" width="32" height="32" title="Old User"/>New Request Details</legend>
                                
                                    <span class="lft">

    
     <label>Designation:</label>
	
  <label>Cluster/Business:</label>
  
 
  </span>
  <div class="wrp">
  
   <?php 
	 
				
					
							$getname_desi = vpdesignation();
							$name = mysql_fetch_array($getname_desi);
	
	
						?>
                                   
                                    <input type="hidden" name="rid" value="<?=$name['id']?>"/>
									<input type="hidden" name="newdesig" value="<?=$name['designation']?>"/>
                                   

                                    <label><?=$name['designation']?></label>

                                    <input type="text" name="cluster" value=""/>
                                    

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
    <label>Request Type:</label>
    <input type="text" name="backfill" id="backfill" value="New Request" readonly />
	
  <label>No of Request: </label> 
  <select name='norequest' class="DropDown" id="norequest">
  <option value=" ">-Select-</option>
   <?php 
  
	//$desqury = mysql_query("SELECT designation FROM `hub_designations` ");
	$noquery = NoofRequest();
	while($noRes = mysql_fetch_array($noquery)){

 ?>
 <option value="<?php echo $noRes['no_of_request']; ?>"><?php echo $noRes['no_of_request']; ?></option>
  <?php } ?>
  </select>
  

                                   
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
				<div  class="scrl">
                <table class="table table-condensed" border="0">
                    <tr>
                        <th scope="col" >No</th>
                        <th scope="col" >Designation</th>
                        <th scope="col">Cluster/Business</th>
                        <!--<th scope="col">No. Of Request</th>-->
                        <th scope="col">Date Of Request</th>
                        <th scope="col">Approved By</th>
                         
                        <th scope="col" id="brdr">Status</th>
                        <th scope="col">Closed Request</th>
                    </tr>

                <?php

$apprQuery = mysql_query("select * from hub_request WHERE request_emp_id='".$_SESSION['userid']."' AND Request_type='New Request' ORDER BY rid desc")or die(mysql_error());
$rows = mysql_num_rows($apprQuery);
$sno = 0;
if($rows > 0){
while($res=mysql_fetch_array($apprQuery)){

$sno++;


	
?>
                 
                    <tr >
                        <td><?php echo $sno.".";  ?></td>
                        <td><?php echo $res['designation'];  ?></td>
                        <td><?php echo $res['cluster'];?></td>
                        <td><?php echo $res['submitted_date'];  ?></td>
                          <td><?php echo  '<span style="color:#f28c38;font-weight:bold;">'.$res['approved_by'].'</span><br/><span style="font-size:11px;">'.$res['approved_date'].'</span>';  ?></td>
                       <td><?php if($res['cvpstatus']=="1"){ echo  '<button class="btn btn-success" id="approveBtn">Approved by<br/>'.$res['approved_by'].'</button>';} elseif($res['cvpstatus']=='2'){ echo '<button class="btn btn-danger" >Unapproved by<br/>'.$res['cvp_updated_by'].'</button>';}else{ echo '<button class="btn btn-default">Waiting for approval</button>'; } ?></td>
                        <td><?php echo $res['closed_by'].'<br/><span style="font-size:11px;">'.$res['closed_date'].'</span>';  ?></td>
                        
                        
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
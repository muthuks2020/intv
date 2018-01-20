<?php session_start();

include_once('connection1.php');

if(!isset($_SESSION['userid']))
{	
	header("location:index.php");
}


$page = $_SERVER['PHP_SELF'];
$sec = "10";


?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
         <meta http-equiv="refresh" content="<?php echo $sec?>;URL='<?php echo $page?>'">
		<meta charset="utf-8">
		<title>Admin Queue List</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		
        <link href="css/evaluation.css" rel="stylesheet">
        <link href="css/pagination.css" rel="stylesheet">


   
 <!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.js"></script>-->
  <script type="text/javascript" src="js/jquery-1.10.2.min.js"> </script>
  <script src="js/jquery-ui.js"></script>
		<script src="js/bootstrap.min.js"></script>
	<script type="text/javascript">
$(document).ready(function(){     
//hide message after 3 seconds
function slideout(){
  setTimeout(function(){
  $("#ajresponse,#ajresponse1").slideUp("slow", function () {
      });    
}, 3000);}
    
    $("#ajresponse,#ajresponse1").hide();
	
    $(function() {
    $(".appr_lst ul").sortable({ opacity: 0.8, cursor: 'move', update: function() {
            
            var order = $(this).sortable("serialize") + '&update=update'; 
            $.post("droganddrop.php", order, function(theResponse){
                $("#ajresponse").html(theResponse);
                $("#ajresponse").slideDown('slow');
                slideout();
            });                                                              
        }                                  
        });
    });
	
	
	$(function() {
    $(".selct_lst ul").sortable({ opacity: 0.8, cursor: 'move', update: function() {
            
            var order = $(this).sortable("serialize") + '&update=update'; 
            $.post("droganddrop1.php", order, function(theResponse){
                $("#ajresponse1").html(theResponse);
                $("#ajresponse1").slideDown('slow');
                slideout();
            });                                                              
        }                                  
        });
    });
	
	
 
});    
</script>
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
                        $("#mesE").append('<p id="msg_e" style="color:#F00; text-align:center">Approved list and selected list must be match</p>').slideDown("slow");
                        setTimeout(function () {
                            $('#msg_e').slideUp(function () {
                                $(this).remove()
                            });
                        }, 3000);

                        <?php
                    }
                } ?>
				<?php
                if (isset($_REQUEST['msg'])) {
                    if (@$_REQUEST['msg'] == "s") { ?>
                        $("#mesE").append('<p id="msg_e" style="color:#F00; text-align:center">Successfully Mapped</p>').slideDown("slow");
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
       <!-- <script>
	$(document).ready(function(){
$( "#backwrap" ).click(function() {
  $( ".frm" ).slideToggle( "slow" );
});
});
</script>-->
<script type="text/javascript">
	

	

   
	  
	  
		  </script>
                  <?php include_once('menus.php'); ?>
        <header>
            <div class="logo">
              
            </div>

            <div class="head">
                <span id="tit"><img src="assets/images/queue.png" /></span>
            </div>

            <div class="head-ash">
                <!--<img src="assets/images/line.png" />-->
                <h2>Admin</h2>
            </div>

        </header>


        <div class="main">


            <div class="rsgn_wrap_que">
            

                <div id="sml_blk">

                    <div class="orange" id="rwrp">
                        <span class="head_top">Sl.No</span><span class="head_top">Approved Lists</span>
                         
                    </div>
                    
                    <div class="appr_lst">
                      <div id="ajresponse"> </div>
                        <ul>
                        <?php 
						$approvedlist = @mysql_query("SELECT * FROM `hub_request` WHERE vpstatus='1' AND mapping!='1' ORDER BY listorder ASC")or die(mysql_error()); 
						$num_rows_app = mysql_num_rows($approvedlist);
						if($num_rows_app > 0)
						{
						$i=0;
						while($row = mysql_fetch_array($approvedlist))
						{
							
							$id= $row['rid'];
							/*$getname = mysql_query("SELECT * FROM `hub_user` WHERE `eid`='".$row['eid']."'") or die(mysql_error()); 
							$name = mysql_fetch_array($getname);*/
						$i++;
						?>
                        	<!--<a href="#" onClick="empDetails('<?php //echo $row['rid']; ?>')"><?//$row['emp_name']?>/a>-->
                            <li id="arrayorder_<?php echo $id; ?>"><span class="sno"><?=$i?>.</span>&nbsp;<span><?php if($row['Request_type']=='New Request'){ echo $row['designation']; } else { echo $row['emp_name']; }?></span>
                            <p class="org_p"><?=$row['old_designation']?></p>
                            <p class="grn_p"><?=$row['cluster']?></p>
                            <p style="font-size:11px;padding: 0px 0px 0px 30px;line-height: 18px;">Request Type:<?=$row['Request_type']?></p>
                             <p style="font-size:11px;padding: 0px 0px 0px 30px;line-height: 18px;">Date:<?=$row['approved_date']?></p> 
                            </li>
                           <?php } } else { ?>
                            <span style="font-weight:bold; color:#F00; margin:30px 0px 0px 53px; float:left">No Records Found!! </span>
                            <?php } ?>
                        </ul>
                    </div>
                
  </div>


                <div id="big_blk_new">

                    <div class="orange" id="backwrap">
                        <span class="head_top">Sl.No</span><span class="head_top">Selected Lists</span>
                    </div>
                    <div class="frm">
                        <div class="selct_lst">
                        <div id="ajresponse1"> </div>
                        <ul>
                         <?php 
						 include_once('connection.php');
						$selectedlist = @mysql_query("SELECT * FROM `contacts` WHERE hrstatus='1' AND mapping!='1' ORDER BY listorder ASC")or die(mysql_error()); 
						$num_rows_select = mysql_num_rows($selectedlist);
						if($num_rows_select > 0)
						{
						$i=0;
						while($selected = mysql_fetch_array($selectedlist))
						{
							$id= $selected['id'];
						$i++;
						?>
                        <li id="arrayorder1_<?php echo $id; ?>">
                           <!-- <div class="cand_new">-->
                            <span class="sno"><?=$i?>.</span>
                            <span><?=$selected['name']?></span>
                            <p class="org_p"><?=$selected['position']?></p>
                             <p style="font-size:11px;padding: 0px 0px 0px 30px;line-height: 18px;">Date:<?=$selected['register_on']?></p> 
                             <p style="font-size:11px;padding: 0px 0px 0px 30px;line-height: 18px;">Fresher/Experience:<?=ucfirst($selected['details'])?></p>
                             
                             <p style="font-size:11px;padding: 0px 0px 0px 30px;line-height: 18px;">Employer:<?=ucfirst($selected['employer']);?></p>
                            
                           <!-- </div>-->
                            
                            
                            </li>
                             
						
                        
                        <?php } } else { ?>
                            <span style="font-weight:bold; color:#F00; margin:30px 0px 0px 53px; float:left">No Records Found!! </span>
                            <?php } ?>
                           </ul> 
                           
                        </div>

                    </div>
                   
                </div>
                
                <div id="big_blk_map">

                    <div class="orange" id="backwrap">
                        <span class="head_top">Mapping Lists</span>
                    </div>
                    <form action="mapping.php" name="map" id="map" method="post">
                    <div class="frm">
                        <div class="selct_lst_drop">
                          
                          <?php 
						  $link = @mysql_connect('localhost', 'root', 'ad@pro123');
						 // $link = @mysql_connect('localhost', 'root', '');
					if (!$link) {
    					die('Could not connect: ' . mysql_error());
					}
				
				mysql_select_db("hub",$link);
					$item_per_page = 13;
					date_default_timezone_set('Asia/Calcutta');						
					 $approvedlist = @mysql_query("SELECT * FROM `hub_request` WHERE vpstatus='1' AND mapping!='1' ORDER BY listorder ASC LIMIT 1")or die(mysql_error()); 
					 $num_rows_app = mysql_num_rows($approvedlist);
						if($num_rows_app > 0)
						{
						  $row = mysql_fetch_array($approvedlist); $id= $row['rid'];?>
                         
                             <input type="text" readonly value="<?php if($row['Request_type']=='New Request'){ echo $row['designation']; } else { echo $row['emp_name']; }?>"/>
                              <input type="hidden" name="approved_ID" value="<?=$id?>"/>
                              <input type="hidden" name="approved_emp_name" value="<?php if($row['Request_type']=='New Request'){ echo $row['designation']; } else { echo $row['emp_name']; }?>"/> 								<input type="hidden" name="request_type" value="<?=$row['Request_type']?>"/>
                             <input type="hidden" name="approved_emp_cluster" value="<?=$row['cluster']?>"/>
                             <input type="hidden" name="app_emp_desig" value="<?=$row['old_designation']?>"/>
                             <input type="hidden" name="approved_emp_type" value="<?=$row['Request_type']?>"/>
                             <input type="hidden" name="approved_emp_date" value="<?=$row['approved_date']?>"/>
                             <?php } ?>
						                     
                          
                        </div>
                        <?php if($num_rows_select > 0 and $num_rows_app >0) { ?>
                        <span style="float:left; margin:10px;"><img src="assets/images/mapping.png" title="mapping"/></span> 
                        <?php } ?>
                        <div class="cand_new1">
                                                    <?php 
						 // $link = @mysql_connect('localhost', 'root', '');
						 $link = @mysql_connect('localhost', 'root', 'ad@pro123');
					if (!$link) {
    					die('Could not connect: ' . mysql_error());
					}
				
				mysql_select_db("personal",$link);
					$item_per_page = 13;
					date_default_timezone_set('Asia/Calcutta');						
					 $selectedlist = @mysql_query("SELECT * FROM `contacts` WHERE hrstatus='1' AND mapping!='1' ORDER BY listorder ASC LIMIT 1")or die(mysql_error()); 
						$num_rows_select = mysql_num_rows($selectedlist);
 						if($num_rows_select > 0)
						{
							$selected = mysql_fetch_array($selectedlist); $id= $selected['id'];?>
                             <input type="text" readonly value="<?=$selected['name']?>"/>
                             <input type="hidden" name="selected_ID" value="<?=$id?>"/>
                             <input type="hidden" name="selected_emp_name" value="<?=$selected['name']?>"/>
                             <input type="hidden" name="selected_emp_pos" value="<?=$selected['position']?>"/>
                             <input type="hidden" name="selected_emp_register" value="<?=$selected['register_on']?>"/>
                             <input type="hidden" name="selected_emp_details" value="<?=$selected['details']?>"/>
                             <input type="hidden" name="selected_emp_employer" value="<?=$selected['employer']?>"/>
                             <?php } ?>
						                         
                           
                        </div>
                         <?php if($num_rows_select >0 and $num_rows_app >0) {
					?>
							  <button type="submit" class="btn btn-primary" style="margin-top:20px" >Mapped</button> 
                            <?php } ?>
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
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
		<title>Admin New Request List</title>
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
	<script type="text/javascript">
    function offerStatus(data){
		
		var opval = data.options[data.selectedIndex].value;
		var val = opval.split('_')[0];
		var rid = opval.split('_')[1];
		
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
   // document.getElementById("getData").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","offerstatus.php?rid="+rid+"&offer="+val,true);
xmlhttp.send();
		
	}
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
                if(isset($_REQUEST['msg'])) {
                    if(@$_REQUEST['msg'] == "u") {?>
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
		
        

 /* $(".tip-top").tooltip({
        placement : 'top'
    });
            });*/
		
        </script>
            <?php include_once('menus.php'); ?>

        <header>
            <div class="logo">
              
            </div>

            <div class="head">
                <span id="tit"><img src="assets/images/newreq.png" /></span>
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
                         <th scope="col" >No</th>
                        <th scope="col">Name</th>
                        <th scope="col">VP Comments</th>
                        <!--th scope="col" >VP Request Date</th-->
                        <th scope="col">SVP Comments</th>
                        <th scope="col" >SVP Status</th>
                        <th scope="col">HR Comments</th>
                        <th scope="col" >Offer Status</th>
                        <th scope="col" id="brdr">Options</th>
                    </tr>
<?php $req = mysql_query("select * from hub_request where Request_type='New Request' Order by rid desc");
					$num_rows = mysql_num_rows($req);
					if($num_rows > 0)
					{
					$no = 0;
					
					while($reqRes = mysql_fetch_array($req)){
					$no ++;
					 ?>	
                     <tr>
                    	<td><?php echo $no.".";  ?></td>
                        
                         <td><?php echo $reqRes['designation']."<br><span style='color:#8bcc35;font-weight:bold;'>".$reqRes['cluster']."</span>"; ?></td>
                       
                        <td data-placement="top" data-container="td" data-toggle="tooltip" class="tip-top" data-original-title="<?php echo $reqRes['man_updated_by'].$reqRes['man_updated_at'];?>"><?php echo $reqRes['comments']."<br/><span class='datetxt'>".date('d-m-Y H:i:s',strtotime($reqRes['submitted_date']))."</span>"; ?></td>
                        
                        <!--td align="center"><?php echo date('d-m-Y',strtotime($reqRes['submitted_date']));?></td-->
                        
                   		
                        <td data-placement="top" data-container="td" data-toggle="tooltip" class="tip-top" data-original-title="<?php echo $reqRes['cvp_updated_by'].$reqRes['cvp_updated_at'];?>"><?php echo $reqRes['cvp_comments']; ?></td>
                        
                        <td align="center"><?php if($reqRes['cvpstatus'] == 1){?>
							<button class="btn btn-success">Approve</button>
						<?php }else if($reqRes['cvpstatus'] == 2){ ?>
							
                            <button class="btn btn-danger">Unapprove</button>
							
						<?php }
						
						elseif($reqRes['cvpstatus']==0){ echo '<span class="wait">Waiting for approval</span>'; } ?></td>
                        
                        <td><?php echo $reqRes['closed_comments'].'<br/><span class="datetxt">'.$reqRes['closed_date'].'</span>' ?></td>
                       
                       <td><?php if($reqRes['closed_by']==''){if($reqRes['vpstatus']=='1' or $reqRes['cvpstatus']=='1'){?>
                       <select onChange="offerStatus(this)" name="offer" id="offer"><option value="">-Select-</option>
                       <option value="In-process_<?=$reqRes['rid'];?>"<?php if($reqRes['offer_status'].'_'.$reqRes['rid']=="In-process_".$reqRes['rid']){?> selected<?php } ?>>Inprocess</option>
                       <option value="Offered_<?=$reqRes['rid'];?>"<?php if($reqRes['offer_status'].'_'.$reqRes['rid']=="Offered_".$reqRes['rid']){?> selected<?php } ?>>Offered</option>
                       <option value="Joined_<?=$reqRes['rid'];?>"<?php if($reqRes['offer_status'].'_'.$reqRes['rid']=="Joined_".$reqRes['rid']){?> selected<?php } ?>>Joined</option><option value="Dropped_<?=$reqRes['rid'];?>"<?php if($reqRes['offer_status'].'_'.$reqRes['rid']=="Dropped_".$reqRes['rid']){?> selected<?php } ?>>Dropped</option></select>
                        <?php } }?> </td>
                        <td>
                        <?php if($reqRes['vpstatus']=='1' or $reqRes['cvpstatus']=='1'){?>
                        <div <?php if($reqRes['closed_by']!=''){?> class="btn btn-success"<?php } else { ?>class="btn btn-primary"<?php }?>><a href="admin_edit.php?eid=<?php echo $reqRes['rid']; ?>"><?php if($reqRes['closed_by']!=''){ echo "Closed";} else { echo "Close"; } ?></a></div>
                       <?php } ?> 
                        <!--input type="submit" class="btn btn-default"  value="Edit" name="edit" id="edit_btn"/-->

                        </td> 
                        
                        </tr>
                        <?php } } else {?>
                         <tr><td colspan="8" align="center"><span style="color:#F00; font-weight:bold;">No Records Found!!</span></td></tr> 

                        <?php } ?>
                </table>
               </div>
            </div>
        </div>
       
<div id="toPopup"> 
    	
        <div class="close"></div>
       	
		<div id="popup_content"> <!--your content start-->
            
<div id="popup_data"></div>
            
        </div> <!--your content end-->
    
    </div>



<div class="loader"></div>
   	<div id="backgroundPopup"></div>

    </div>
   

    


    <!--<footer class="text-center">&copy; <?php echo date('Y')?> <a href="adda.2adpro.com"><strong>2adpro</strong></a></footer>-->







</body>

</html>
<?php
include_once('connection1.php');


$getname = mysql_query("SELECT * FROM `hub_manpower` WHERE `eid`='".$_REQUEST['eid']."'") or die(mysql_error()); 
$name = mysql_fetch_array($getname);

?>

<html>
<head><title></title>
<script type="text/javascript">
	
   
	  
	  
		  </script>

</head>
<body>
  
                            
                                      <fieldset>
                                      <legend><img src="assets/images/emp.png" width="32" height="32" title="Old User"/>Old Employee Details</legend>
                                
                                    <span class="lft">
  <label>Employee ID</label>
	
    <label>Employee Name</label>
    
     <label>Designation</label>
	
  <label>Team</label>
  
 
  </span>
  <div class="wrp">
                                    <label ><?php echo $name['eid']; ?></label>
                                     <input type="hidden" name="rid" value="<?=$name['eid']?>"/>
								 <input type="hidden" name="olddesig" value="<?=$name['designation']?>"/>
                                 <input type="hidden" name="cluster" value="<?=$name['cluster']?>"/>
                                    <label><?php echo $name['name']; ?></label>

                                    <label><?php echo $name['designation']; ?></label>

                                    <label><?php echo $name['cluster']; ?></label>

                                

                                </div>
                                </fieldset>
                               
</body>
</html>
<?php
include_once('connection1.php');
include_once('functions.php');


$getname = mysql_query("SELECT * FROM `hub_manpower` WHERE `id`='".$_REQUEST['eid']."'") or die(mysql_error());
$name = mysql_fetch_array($getname);

?>

<html>
<head><title></title>
<script type="text/javascript">
	
   
	  
	  
		  </script>

</head>
<body>
  
                            
                                      <fieldset>
                                      <legend><img src="assets/images/emp.png" width="32" height="32" title="Old User"/>New Request Details</legend>
                                
                                    <span class="lft">
 
    
     <label>Designation:</label>
	
  <label>Cluster/Business:</label>
  
 
  </span>
  <div class="wrp">
                                   
                                     <input type="hidden" name="rid" value="<?=$name['id']?>"/>
								 <input type="hidden" name="newdesig" value="<?=$name['designation']?>"/>
                                 
                                    <label><?php echo $name['designation']; ?></label>

                                   <input type="text" name="cluster" value=""/>

                                

                                </div>
                                </fieldset>
                               
</body>
</html>
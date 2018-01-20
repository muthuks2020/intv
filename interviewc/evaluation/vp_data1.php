<?php session_start();
include_once('connection1.php');
//$eid = $_POST['eid'];

?>


<div class="rsgn_wrap">

                <div class="orange stat" >
                    <h2>Status</h2>
                </div>
			<div  class="scr2">
                <table class="table table-condensed" border="0">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Cluster/Business Unit</th>
                        <th scope="col">First Level Details Of Discussion</th><!--Manager Comments-->
                         <th scope="col">Second Level Details Of Discussion</th><!--Details of discussion-->
                        <th scope="col" >Status</th>
                        <th scope="col" id="brdr">Options</th>
                    </tr>

                    
                   <?php 
				   
				  
$req = mysql_query("select * from hub_request where "
        . "opmstatus IN('0','1','2') AND "
        . "vpstatus NOT IN ('3') ORDER BY rid desc");
					$no = 0;
					$rows = mysql_num_rows($req);
				if($rows > 0)
				{
					while($reqRes = mysql_fetch_array($req)){
						if($reqRes['vpstatus']=='2')
						{
							$cancel_name = "by ".$reqRes['vp_updated_by'];	
						}
						else
						{
							$cancel_name = "by ".$reqRes['approved_by'];
						}
					$no ++;
					 ?>	<tr>
                    	<td><?php echo $no.".";  ?></td>
                        <td><?php echo $reqRes['emp_name']."<br><span style='color:#f28c38;font-weight:bold;font-size:12px;'>".$reqRes['old_designation']."</span>"; ?><input type="hidden" name="eid" value="<?php echo $reqRes['employee_id']; ?>"/></td>
                        <td><?php echo $reqRes['cluster']; ?></td>
                        <td><?php echo $reqRes['comments']."<br/><span class='datetxt'>".$reqRes['submitted_date']."</span>"; ?></td>
                         <td><?php echo $reqRes['opmng_comments']."<br/><span class='datetxt'>".$reqRes['ops_man_updated_at']."</span>"; ?></td>
                       <td><?php if($reqRes['vpstatus'] =='1'){ echo '<button class="btn btn-success" id="approveBtn">Approved<br/>'.$cancel_name.'</button>'; } elseif($reqRes['vpstatus'] =='2') { echo '<button class="btn btn-danger">Unapproved<br/>'.$cancel_name.'</button>';}?></td>
                         <td>
                          <?php if($reqRes['vpstatus'] !='2'){?>
                         <div <?php if($reqRes['vpstatus']=='1'){?>class="btn btn-success"<?php } else { ?>class="btn btn-primary"<?php } ?>><a href="vp_comm.php?eid=<?php echo $reqRes['rid']; ?>">Approve</a></div>
                         <div class="btn btn-danger"><a href="vp_cancel_comm.php?eid=<?php echo $reqRes['rid']; ?>">Unapprove</a></div>
                         
                         <?php } ?>
                         </td>
                        </tr>
                        
                        <?php }	} else {				
						 
				   
						
						 ?>
                         <tr><td colspan="7" align="center"><span style="color:#F00; font-weight:bold;">No Records Found!!</span></td></tr> 
                         <?php } ?>


                </table>
</div>
            </div>
<?php session_start();
include_once('connection1.php');

//$eid = $_POST['eid'];

?>


<div class="rsgn_wrap">

                <div class="orange stat" >
                    <h2>Status</h2>
                </div>
<div class="scr2">
                <table class="table table-condensed" border="0">
                    <tr>
                        <th scope="col" >No</th>
                        <th scope="col" >Designation Name</th>
                        <th scope="col">Cluster/Business Unit</th>
                       <th scope="col">Date Of Request</th>
                        <th scope="col">First Level Details Of Discussion</th>
                        <th scope="col" >Status</th>
                        <th scope="col" >Options</th>
                        <th scope="col" id="brdr">Closed Request</th>
                        <!--th scope="col">Closed Date</th-->
                       
                    </tr>

                    
                   <?php 
				   
				  
$req = mysql_query("SELECT * FROM `hub_request` WHERE `reporting_manager_id` ='".$_SESSION['userid']."' AND Request_type='New Request' ORDER BY rid desc");
					$no = 0;
				$rows = mysql_num_rows($req);
				if($rows > 0)
				{
					while($reqRes = mysql_fetch_array($req)){
						if($reqRes['cvpstatus']=='2')
						{
							$cancel_name = $reqRes['cvp_updated_by'];	
						}
						else
						{
							$cancel_name = $reqRes['approved_by'];
						}
					$no ++;
					 ?>	<tr>
                    	<td><?php echo $no.".";  ?></td>
                        <td><?php echo $reqRes['designation']."<br><span style='color:#f28c38;font-weight:bold;font-size:12px;'>".$reqRes['old_designation']."</span>"; ?><input type="hidden" name="eid" value="<?php echo $reqRes['employee_id']; ?>"/></td>
                       
                        <td><?php echo $reqRes['cluster']; ?></td>
                        <td><?php echo $reqRes['submitted_date']; ?></td>
                         <td><?php echo $reqRes['cvp_comments']; ?></td>
                         
                         <td><?php if($reqRes['cvpstatus'] =='1'){ echo '<button class="btn btn-success" id="approveBtn">Approved by<br/>'.$cancel_name.'</button>';} elseif($reqRes['cvpstatus'] =='2'){echo '<button class="btn btn-danger">Unapproved by<br/>'.$cancel_name.'</button>';}?></td>
                         <td>
                         <?php if($reqRes['cvpstatus'] =='1') { ?>
                         <button class="btn btn-success">Approve</button>
                         <?php } elseif($reqRes['cvpstatus'] =='2') {?>
                         <button class="btn btn-danger">Unapprove</button>
                         <?php } else {?>
                         <div class="btn btn-primary"><a href="cvp_approve_comm.php?eid=<?php echo $reqRes['rid']; ?>&rt=new">Approve</a></div>
                         <div class="btn btn-danger"><a href="cvp_unapprove_comm.php?eid=<?php echo $reqRes['rid']; ?>&rt=new">Unapprove</a></div>
                         
                         <?php } ?>
                         </td>
                         
                       
                        <td><?php echo $reqRes['closed_by']."<br/><span class='datetxt'>".$reqRes['closed_date']."</span>"; ?></td>
                        <!--td><?php echo $reqRes['closed_date']; ?></td-->
                       
                        </tr>
                        
                        <?php }	} else {	   
						
						 ?>
                         <tr><td colspan="8" align="center"><span style="color:#F00; font-weight:bold;">No Records Found!!</span></td></tr> 

<?php } ?>


                </table>
</div>
            </div>
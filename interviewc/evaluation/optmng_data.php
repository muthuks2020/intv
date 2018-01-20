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
                        <th scope="col" >Name</th>
                        <!--th scope="col">Request Type</th-->
                         <th scope="col" >Cluster/Business Unit</th>
                        <th scope="col">Request For</th>
                        <th scope="col">First Level Details Of Discussion</th><!--Manager Comments-->
                        <!--th scope="col">Date Of Request</th-->
                        <!--th scope="col">Comments</th-->
                         <th scope="col">Second Level Details Of Discussion</th><!--Details of discussion-->
                        <th scope="col">Approved By</th>
                        <!--th scope="col">Approved Date</th-->
                        <th scope="col">Status</th>
                        <th scope="col">Options</th>
                        
                        <th scope="col" id="brdr">Closed Request</th>
                        <!--th scope="col">Closed Date</th-->
                       
                    </tr>

                    
                   <?php 
				   
$req = mysql_query("SELECT * FROM `hub_request` WHERE `reporting_manager_id` ='".$_SESSION['userid']."' order by rid desc");
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
                        <!--td><?php echo $reqRes['emp_name']."<br><span style='color:#f28c38;font-weight:bold;font-size:12px;'>".$reqRes['old_designation']."</span><br><span style='color:#5cb85c;font-weight:bold;'>".$reqRes['cluster']."</span>"; ?><input type="hidden" name="eid" value="<?php echo $reqRes['employee_id']; ?>"/></td-->
                        <td><?php echo $reqRes['emp_name']."<br><span style='color:#f28c38;font-weight:bold;font-size:12px;'>".$reqRes['old_designation']."</span>"; ?><input type="hidden" name="eid" value="<?php echo $reqRes['employee_id']; ?>"/></td>
                        <!--td><?php echo $reqRes['Request_type']; ?></td-->
                         <td><?php echo $reqRes['cluster']; ?></td>
                        <td><?php echo $reqRes['designation']; ?></td>
                        <td><?php echo $reqRes['comments']."<br/><span class='datetxt' >".$reqRes['submitted_date']."</span>"; ?></td>
                        <!--td><?php echo $reqRes['submitted_date']; ?></td-->
                         <td><?php echo $reqRes['opmng_comments']; ?></td>
                        <td><?php if($reqRes['vpstatus']=='1'){echo $reqRes['approved_by']."<br><span class='datetxt'>".$reqRes['approved_date']."</span>"; }?></td>
                        <!--td><?php if($reqRes['vpstatus']=='1'){echo $reqRes['approved_date']; }?></td-->
                        
                        <td><?php if($reqRes['vpstatus'] =='1' and $reqRes['opmstatus'] =='1'){ echo '<button class="btn btn-success" id="approveBtn">Approved<br/>'.$cancel_name.'</button>'; }elseif($reqRes['opmstatus'] =='2'){ echo '';} elseif($reqRes['opmstatus'] =='1' and $reqRes['vpstatus'] !='2') { echo '<span class="wait">Waiting for approval</span>';} elseif($reqRes['vpstatus'] =='2'){ echo '<button class="btn btn-danger">Unapproved<br/>'.$cancel_name.'</button>';}?></td>
                         <td>
                         <?php if($reqRes['opmstatus'] =='1') { ?>
                         <button class="btn btn-success">Approve</button>
                         <?php } elseif($reqRes['opmstatus'] =='2') {?>
                         <button class="btn btn-danger">Unapprove</button>
                         <?php } else {?>
                         <div class="btn btn-primary"><a href="optmng_comm.php?eid=<?php echo $reqRes['rid']; ?>">Approve</a></div>
                         <div class="btn btn-danger"><a href="optmng_cancel_comm.php?eid=<?php echo $reqRes['rid']; ?>">Unapprove</a></div>
                         
                         <?php } ?>
                         </td>
                        <td><?php echo $reqRes['closed_by']."<br/><span style='font-size:11px;font-weight:bold;color:#f28c38'>".$reqRes['closed_date']."</span>"; ?></td>
                        <!--td><?php echo $reqRes['closed_date']; ?></td-->
                        
                        </tr>
                        
                        <?php }	} else {	   
						
						 ?>
                         <tr><td colspan="10" align="center"><span style="color:#F00; font-weight:bold;">No Records Found!!</span></td></tr> 

<?php } ?>


                </table>
</div>
            </div>
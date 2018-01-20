<?php session_start();
include_once('connection1.php');

//$eid = $_POST['eid'];

?>
<div class="rsgn_wrap">

                <div class="orange stat" >
                    <h2>Status</h2>
                </div>

                <table class="table table-condensed" border="0">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Request Type</th>
                        <th scope="col">Date Of Request</th>
                        <th scope="col">Comments</th>
                        <th scope="col">Approved By</th>
                        <th scope="col">Approved Date</th>
                        <th scope="col">Closed Request</th>
                        <th scope="col">Closed Date</th>
                        <th scope="col" >Status</th>
                        <th scope="col" id="brdr">Options</th>
                    </tr>


                   <?php


$req = mysql_query("select * from hub_request ");
					$no = 0;
					while($reqRes = mysql_fetch_array($req)){
					$no ++;
					 ?>	<tr>
                    	<td><?php echo $no.".";  ?></td>
                        <td><?php echo $reqRes['emp_name']; ?><input type="hidden" name="eid" value="<?php echo $reqRes['employee_id']; ?>"/></td>
                        <td><?php echo $reqRes['Request_type']; ?></td>
                        <td><?php echo $reqRes['submitted_date']; ?></td>
                         <td><?php echo $reqRes['opmng_comments']; ?></td>
                        <td><?php echo $reqRes['approved_by']; ?></td>
                        <td><?php echo $reqRes['approved_date']; ?></td>
                        <td></td>
                        <td></td>
                        <td><?php if($reqRes['vpstatus'] =='1' and $reqRes['opmstatus'] =='1'){ echo '<button class="btn btn-success">Approved</button>'; }elseif($reqRes['opmstatus'] =='2'){ echo "";} elseif($reqRes['opmstatus'] =='1') { echo '<span style="border: 1px solid grey;border-radius: 3px;padding:2px 0 2px 0;cursor:pointer;vertical-align:-webkit-baseline-middle;">Waiting for approval</span>';}?></td>
                         <td>
                         <?php if($reqRes['opmstatus'] =='1') { ?>
                         <button class="btn btn-success">Approve</button>
                         <?php } elseif($reqRes['opmstatus'] =='2') {?>
                         <button class="btn btn-danger">Unapprove</button>
                         <?php } else {?>
                         <button class="btn btn-primary"><a href="optmng_comm.php?eid=<?php echo $reqRes['employee_id']; ?>">Approve</a></button>
                         <button class="btn btn-danger"><a href="optmng_cancel_comm.php?eid=<?php echo $reqRes['employee_id']; ?>">Unapprove</a></button>

                         <?php } ?>
                         </td>
                        </tr>

                        <?php }



						 ?>


                </table>

            </div>

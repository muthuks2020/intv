<?php

include_once("connection.php"); //include config file
include_once("functions.php");
//sanitize post value
$page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);

//validate page number is really numaric
if(!is_numeric($page_number)){die('Invalid page number!');}

//get current starting point of records
 $position = ($page_number * $item_per_page);

//Limit our results within a specified range. 
//$results = sContact($position,$item_per_page);
//$results = mysql_query("SELECT id,name,contact FROM contacts ORDER BY id ASC LIMIT $position, $item_per_page");
?>
<table width="100%"  cellspacing="0" cellpadding="0" >
  <tr>
    <th scope="col" id="col-wid">Name</th>
    <th scope="col">Position Applied</th>
    <th scope="col">Interview Date</th>
    <th scope="col" id="brdr">Options</th>
  </tr>
  <?php
  
  
   $records = sContact($position,$item_per_page);
  $num_rows = mysql_num_rows($records);
  if($num_rows> 0)
  {
  while($contact = mysql_fetch_array($records))
  {

  ?>
  <tr>
    <td><?php if($contact['uploadfiles']!=''){ echo '<a href="../'.$contact['uploadfiles'].'">'.$contact['name'].'</a>'; } else { echo $contact['name']; } ?></td>
    <td><?=$contact['position']?></td>
    <td><?=date('d-m-Y',strtotime($contact['register_on']))?></td>
    <td><button type="button" id="btn-spc" <?php if($contact['status']=='1'){?>class="btn btn-success" <?php } else {?>class="btn btn-primary"<?php } ?> ><a href="eval_select_comments.php?c=<?=$contact['id']?>">Selected</a></button>
<button type="button" class="btn btn-danger"><a href="eval_comments.php?c=<?=$contact['id']?>" >Rejected</a></td>
  </tr>
  <?php } } else {?>
  <tr>
  <td colspan="4" style="text-align:center">No records found</td>
  </tr>
  
  <?php } ?>
</table>



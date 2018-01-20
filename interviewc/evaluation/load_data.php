<?php session_start();
if(isset($_POST['page']))
{
$page = $_POST['page'];
$cur_page = $page;
$page -= 1;
$per_page = 10;
$previous_btn = true;
$next_btn = true;
$first_btn = true;
$last_btn = true;
$start = $page * $per_page;
include_once('connection.php');

$query_pag_data = "SELECT * FROM `contacts` WHERE status IN ('0','1') ORDER BY register_on desc LIMIT $start, $per_page";
$result_pag_data = mysql_query($query_pag_data) or die('MySql Error' . mysql_error());
$num_rows = mysql_num_rows($result_pag_data);










?>
<table class="table table-condensed" >
  <tr>
    <th scope="col" id="col-wid">Name</th>
    <th scope="col">Position Applied</th>
    <th scope="col">Interview Date</th>
    <?php if(!isset($_POST['admin'])){ ?><th scope="col" id="brdr">Download Files</th><th scope="col" id="brdr">Options</th><?php } 
	else{ ?><th scope="col" id="brdr">Uploads</th><?php } ?>
  </tr>
 
<?php
$msg = "";
 if($num_rows> 0)
  { 
 while ($contact = mysql_fetch_array($result_pag_data))
 { ?>
 <tr>
    <td><?php if($contact['uploadfiles']!=''){ echo '<a href="../'.$contact['uploadfiles'].'">'.$contact['name'].'</a>'; } else { echo $contact['name']; } ?></td>
    <td><?=$contact['position']?></td>
    <td><?=date('d-m-Y',strtotime($contact['register_on']))?></td>
    <td>
<?php if(!isset($_POST['admin'])){ ?>
<div class="btn btn-primary"><a href="/interviewc/admin/uploads/<?=$contact['contact']?>/files" target="_blank" >Files</a></div>
<div class="btn btn-primary"><a href="/interviewc/admin/uploads/<?=$contact['contact']?>/resume" target="_blank" >Resume</a></div></td><td>
<div  id="btn-spc" <?php if($contact['status']=='1'){?>class="btn btn-success" <?php } else {?>class="btn btn-primary"<?php } ?> >
     <?php 

$check_eval_id = mysql_query("SELECT * FROM `contacts` WHERE eval_emp_id IN ('".$_SESSION['userid']."') AND status='1' AND id='".$contact['id']."'")or die('MySql Error' . mysql_error());
$numrows = mysql_num_rows($check_eval_id);
//print_r($numrows);

if($numrows > 0) {?>	
    <a href="eval_select_comments1.php?c=<?=$contact['id']?>">Selected</a>
	<?php  }  elseif($contact['status']=='0') { ?>
	<a href="eval_select_comments.php?c=<?=$contact['id']?>">Selected</a><?php } else {?>
Selected
<?php } ?>
    </div>
    <?php if($contact['status']!='1') { ?>
<div  class="btn btn-danger"><a href="eval_comments.php?c=<?=$contact['id']?>">Rejected</a></div>
<?php }  } else { ?>
<form method="POST" enctype="multipart/form-data" action="upload.php">
<div class="content"><input type="hidden" name="phone" id="phone" value="<?=$contact['contact']?>"/>
<input type="file" name="up_file" id="up_file" style="display: none" />
<a href="#" class="file">Upload File</a>
<a href="#" class="resume">Upload Resume</a>
</div></form>
<?php } ?>
</td>
  </tr>
  <?php   } } else {?>  
  <tr>
  <td colspan="4" style="text-align:center">No records found</td>
  </tr>
  
  <?php } ?>
</table>
<script type="text/javascript">
$('.content a.file').click(function(){$(this).parent().find('input[type=file]').attr('name','up_file').click();});
$('.content a.resume').click(function(){$(this).parent().find('input[type=file]').attr('name','up_resume').click();});
$('.content input[type=file]').change(function(){$(this).closest('form').submit();});
</script>
 
<?php 
/*$htmlmsg=htmlentities($row['contact']);
    $msg .= "<li><b>" . $row['id'] . "</b> " . $htmlmsg . "</li>";*/


//$msg = "<div class='data'><ul>" . $msg . "</ul></div>"; // Content for Data


/* --------------------------------------------- */
$query_pag_num = "SELECT COUNT(*) AS count FROM contacts WHERE status IN ('0','1') ORDER BY register_on desc";
$result_pag_num = mysql_query($query_pag_num);
$row = mysql_fetch_array($result_pag_num);
$count = $row['count'];
$no_of_paginations = ceil($count / $per_page);

/* ---------------Calculating the starting and endign values for the loop----------------------------------- */
if ($cur_page >= 7) {
    $start_loop = $cur_page - 3;
    if ($no_of_paginations > $cur_page + 3)
        $end_loop = $cur_page + 3;
    else if ($cur_page <= $no_of_paginations && $cur_page > $no_of_paginations - 6) {
        $start_loop = $no_of_paginations - 6;
        $end_loop = $no_of_paginations;
    } else {
        $end_loop = $no_of_paginations;
    }
} else {
    $start_loop = 1;
    if ($no_of_paginations > 7)
        $end_loop = 7;
    else
        $end_loop = $no_of_paginations;
}
/* ----------------------------------------------------------------------------------------------------------- */
$msg .= "<div class='pagination'><ul>";

// FOR ENABLING THE FIRST BUTTON
if ($first_btn && $cur_page > 1) {
    $msg .= "<li p='1' class='active'>First</li>";
} else if ($first_btn) {
    $msg .= "<li p='1' class='inactive'>First</li>";
}

// FOR ENABLING THE PREVIOUS BUTTON
if ($previous_btn && $cur_page > 1) {
    $pre = $cur_page - 1;
    $msg .= "<li p='$pre' class='active'>Previous</li>";
} else if ($previous_btn) {
    $msg .= "<li class='inactive'>Previous</li>";
}
for ($i = $start_loop; $i <= $end_loop; $i++) {

    if ($cur_page == $i)
        $msg .= "<li p='$i' style='color:#fff;background-color:#006699;' class='active'>{$i}</li>";
    else
        $msg .= "<li p='$i' class='active'>{$i}</li>";
}

// TO ENABLE THE NEXT BUTTON
if ($next_btn && $cur_page < $no_of_paginations) {
    $nex = $cur_page + 1;
    $msg .= "<li p='$nex' class='active'>Next</li>";
} else if ($next_btn) {
    $msg .= "<li class='inactive'>Next</li>";
}

// TO ENABLE THE END BUTTON
if ($last_btn && $cur_page < $no_of_paginations) {
    $msg .= "<li p='$no_of_paginations' class='active'>Last</li>";
} else if ($last_btn) {
    $msg .= "<li p='$no_of_paginations' class='inactive'>Last</li>";
}
$goto = "<input type='text' class='goto' size='1' style='margin-top:-1px;margin-left:60px;'/><input type='button' id='go_btn' class='go_button' value='Go'/>";
$total_string = "<span class='total' a='$no_of_paginations'>Page <b>" . $cur_page . "</b> of <b>$no_of_paginations</b></span>";
$msg = $msg . "</ul>" . $goto . $total_string . "</div>";  // Content for pagination
echo $msg;
}


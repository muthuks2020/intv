<?php
function _debug($a){
  echo '<pre>';
  var_dump($a);
  exit;
}

function get_sources(){
  return array(
    array('id' => 'Job Site', 'value' => 'Job Site'),
    array('id' => 'Employee Referral', 'value' => 'Emp.Ref.'),
    array('id' => 'walk in', 'value' => 'Walk in'),
    array('id' => 'Newspaper', 'value' => 'Newspaper'),
    array('id' => 'Job Fair', 'value' => 'Job Fair'),
    array('id' => 'Network ', 'value' => 'Network')
  );
}

function get_positions(){
  return array(
    array('id' => 'print', 'value' => 'Print'),
    array('id' => 'web', 'value' => 'Web'),
    array('id' => 'cse', 'value' => 'CSE')
  );
}

function sContact($position,$item_per_page){$query=@mysql_query("SELECT *FROM `contacts` WHERE status IN ('0','1') ORDER BY register_on desc LIMIT $position, $item_per_page") or die(mysql_error());
return $query;}

function mcontact(){$query=@mysql_query("SELECT *FROM `contacts` WHERE status IN ('1') AND mstatus IN ('0','1','3') ORDER BY register_on desc ") or die(mysql_error());
return $query;}

function admincontact(){$query=@mysql_query("SELECT *FROM `contacts` WHERE mstatus IN ('1','2') OR status IN ('1','2') ORDER BY register_on desc") or die(mysql_error());return $query;}

function checkEval($eid){ $query=@mysql_query("SELECT * FROM `elogin` WHERE `mapto` IN ('".$eid."')") or die(mysql_error());$enum_rows=mysql_num_rows($query); return $enum_rows;}
function checkMan($eid){ $query=@mysql_query("SELECT * FROM `elogin` WHERE `manager` IN ('".$eid."')") or die(mysql_error());$enum_rows=mysql_num_rows($query); return $enum_rows;}
function checkHR($eid){$query=@mysql_query("SELECT * FROM `elogin` WHERE `hr`= '".$eid."'") or die(mysql_error());$record=mysql_fetch_array($query); return $record['username'];}

function isTmanager($eid){
  $q = mysql_query("SELECT * FROM `elogin` WHERE `eid` = '".$eid."' and role ='tmanager'");
  return mysql_fetch_array($q);
}


//function checkHR($eid){$query=@mysql_query("SELECT eid FROM `elogin` WHERE `eid`= '".$eid."'") or die(mysql_error());$record=mysql_fetch_array($query); return $record['eid'];}
//function designation(){$query=@mysql_query("SELECT * FROM `hub_manpower` GROUP BY designation") or die(mysql_error());return $query;}
//function designation(){$query=@mysql_query("SELECT * FROM `hub_manpower` WHERE (designation NOT LIKE 'Ass%' AND designation NOT LIKE 'Chief%' AND designation NOT LIKE 'Client M%' AND designation NOT LIKE 'Cre%' AND designation NOT LIKE 'Executive - H%' AND designation NOT LIKE 'Executive - A%' AND designation NOT LIKE 'Digital%' AND designation NOT LIKE 'Manager%' AND designation NOT LIKE 'Senior M%' AND designation NOT LIKE 'Senior Vice%' AND designation NOT LIKE 'Specialist - H%' AND designation NOT LIKE 'Traf%' AND designation NOT LIKE 'Subject%' AND designation NOT LIKE 'Vice%')  GROUP BY designation") or die(mysql_error());return $query;}

function designation(){$query=@mysql_query("SELECT * FROM `hub_manpower` WHERE (designation NOT LIKE 'Ass%' AND designation NOT LIKE 'Chief%' AND designation NOT LIKE 'Cent M%' AND designation NOT LIKE 'Cre%' AND designation NOT LIKE 'Executive - H%' AND designation NOT LIKE 'Executive - A%' AND designation NOT LIKE 'Digital%' AND designation NOT LIKE 'Manager%' AND designation NOT LIKE 'Senior M%' AND designation NOT LIKE 'Senior Vice%' AND designation NOT LIKE 'Specialist - H%' AND designation NOT LIKE 'Traf%' AND designation NOT LIKE 'Subject%' AND designation NOT LIKE 'Vice%')  GROUP BY designation") or die(mysql_error());return $query;}

function vpdesignation(){$query=@mysql_query("SELECT * FROM `hub_manpower` WHERE (designation NOT LIKE 'Ass%' AND designation NOT LIKE 'Chief%' AND designation NOT LIKE 'Client M%' AND designation NOT LIKE 'Cre%' AND designation NOT LIKE 'Executive - H%' AND designation NOT LIKE 'Executive - A%' AND designation NOT LIKE 'Digital%' AND designation NOT LIKE 'Manager%' AND designation NOT LIKE 'Senior M%' AND designation NOT LIKE 'Senior Vice%' AND designation NOT LIKE 'Specialist - H%' AND designation NOT LIKE 'Traf%' AND designation NOT LIKE 'Subject%' AND designation NOT LIKE 'Vice%')  GROUP BY designation LIMIT 1") or die(mysql_error());return $query;}


function NoofRequest(){$query=@mysql_query("SELECT * FROM `hub_no_request`") or die(mysql_error());return $query;}
//function revision1($id){$query=@mysql_query("select `status` from revision where emp_id='".$id."'"); $status = mysql_fetch_array($query); return $status['status']; }
/********main dashboard***********/
function countContact(){$query=@mysql_query("SELECT count(*) as total FROM `contacts` WHERE status  NOT IN ('1','2') ORDER BY register_on desc") or die(mysql_error()); $count=mysql_fetch_array($query); return $count['total'];}

/***Assessor1**********/
function countAss1Contact(){$query=@mysql_query("SELECT count(*) as selected FROM `contacts` WHERE `status` IN ('1') and mstatus NOT IN ('1','2')") or die(mysql_error()); $count=mysql_fetch_array($query); return $count['selected'];}
//function countAss1Contact1(){$query=@mysql_query("SELECT count(*) as selected FROM `contacts` WHERE `status` IN ('1') and mstatus NOT IN ('1','2') ") or die(mysql_error());  $count=mysql_fetch_array($query); return $count['selected'];}

//function countAss1NumRows(){$query=@mysql_query("SELECT * FROM `contacts` WHERE `status` ='1' and mstatus ='1'") or die(mysql_error()); $num_rows=mysql_num_rows($query); return $num_rows;}

/************End Ass1*********/

/****assessor2********/
function countAss2Contact(){$query=@mysql_query("SELECT count(*) as selected FROM `contacts` WHERE `mstatus` IN('1') and hrstatus NOT IN ('1','2')") or die(mysql_error()); $count=mysql_fetch_array($query); return $count['selected'];}
//function countAss2Contact2(){$query=@mysql_query("SELECT count(*) as selected FROM `contacts` WHERE `mstatus` IN('1') and hrstatus NOT IN ('1','2')") or die(mysql_error()); $count=mysql_fetch_array($query); return $count['selected'];}
//function countAss2NumRows(){$query=@mysql_query("SELECT * FROM `contacts` WHERE  mstatus IN ('1')") or die(mysql_error()); $num_rows=mysql_num_rows($query); return $num_rows;}

/******End***********/


function countHRContact(){$query=@mysql_query("SELECT count(*) as selected FROM `contacts` WHERE `hrstatus` ='1' AND mapping NOT IN ('1')") or die(mysql_error()); $count=mysql_fetch_array($query); return $count['selected'];}




/*****Manager Request ,OPM approved/rejected and VPapproved/rejected***********/
function countManRequest(){$query=@mysql_query("SELECT count(*) as total FROM `hub_request` WHERE `status` IN('0','1','2') AND `opmstatus` NOT IN('1','2','3') AND Request_type='Backfill' AND usertype ='1'") or die(mysql_error()); $count=mysql_fetch_array($query); return $count['total'];}
function countOPMapproved(){$query=@mysql_query("SELECT count(*) as approved FROM `hub_request` WHERE `opmstatus` ='1' AND vpstatus NOT IN ('1','2') AND Request_type='Backfill' AND usertype ='1'") or die(mysql_error()); $count=mysql_fetch_array($query); return $count['approved'];}
function countOPMrejected(){$query=@mysql_query("SELECT count(*) as rejected FROM `hub_request` WHERE `opmstatus` ='2' AND Request_type='Backfill' AND usertype ='1'") or die(mysql_error()); $count=mysql_fetch_array($query); return $count['rejected'];}
function countVPapproved(){$query=@mysql_query("SELECT count(*) as approved FROM `hub_request` WHERE `status` IN('1','2') AND `vpstatus` IN('1') AND mapping NOT IN ('1') AND Request_type='Backfill' AND usertype ='1'") or die(mysql_error()); $count=mysql_fetch_array($query); return $count['approved'];}
function countVPrejected(){$query=@mysql_query("SELECT count(*) as rejected FROM `hub_request` WHERE `status` IN('1','2') AND `vpstatus` IN('2') AND Request_type='Backfill' AND usertype ='1'") or die(mysql_error()); $count=mysql_fetch_array($query); return $count['rejected'];}
/*****END Manager Request ,OPM approved/rejected and VPapproved/rejected***********/

/*******VP BACKFILL, SVP approved/rejected***********/
function countVPBackfillRequest(){$query=@mysql_query("SELECT count(*) as total FROM `hub_request` WHERE `opmstatus` IN('3') AND `vpstatus` NOT IN('1','2') AND Request_type='Backfill' AND usertype='4'") or die(mysql_error()); $count=mysql_fetch_array($query); return $count['total'];}
function countSVPBackfillApproved(){$query=@mysql_query("SELECT count(*) as approved FROM `hub_request` WHERE `cvpstatus` IN('1') AND mapping NOT IN ('1') AND Request_type='Backfill' AND usertype ='4'") or die(mysql_error()); $count=mysql_fetch_array($query); return $count['approved'];}
function countSVPBackfillRejected(){$query=@mysql_query("SELECT count(*) as rejected FROM `hub_request` WHERE `cvpstatus` IN('2') AND Request_type='Backfill' AND usertype ='4'") or die(mysql_error()); $count=mysql_fetch_array($query); return $count['rejected'];}
/*******END VP BACKFILL***********/


/*****Operation Manager Backfill**************/
function countOPManRequest(){$query=@mysql_query("SELECT count(*) as total FROM `hub_request` WHERE `status` IN('0','1','2') AND `vpstatus` NOT IN('1','2') AND Request_type='Backfill' AND usertype ='2'") or die(mysql_error()); $count=mysql_fetch_array($query); return $count['total'];}
function countSVPOPMBackfillApproved(){$query=@mysql_query("SELECT count(*) as approved FROM `hub_request` WHERE `vpstatus` IN('1') AND mapping NOT IN ('1') AND Request_type='Backfill' AND usertype ='2'") or die(mysql_error()); $count=mysql_fetch_array($query); return $count['approved'];}
function countSVPOPMBackfillRejected(){$query=@mysql_query("SELECT count(*) as rejected FROM `hub_request` WHERE `vpstatus` IN('2') AND Request_type='Backfill' AND usertype ='2'") or die(mysql_error()); $count=mysql_fetch_array($query); return $count['rejected'];}
/*****END Operation Manager**************/
/**********VP New request**********/
function countVPnewRequest(){$query=@mysql_query("SELECT count(*) as total FROM `hub_request` WHERE `opmstatus` IN('3') AND `vpstatus` NOT IN('1','2') AND Request_type='New Request' AND usertype='4'") or die(mysql_error()); $count=mysql_fetch_array($query); return $count['total'];}
function countSVPNewApproved(){$query=@mysql_query("SELECT count(*) as approved FROM `hub_request` WHERE `cvpstatus` IN('1') AND mapping NOT IN('1') AND Request_type='New Request' AND usertype='4'") or die(mysql_error()); $count=mysql_fetch_array($query); return $count['approved'];}
function countSVPNewRejected(){$query=@mysql_query("SELECT count(*) as rejected FROM `hub_request` WHERE `cvpstatus` IN('2') AND Request_type='New Request' AND usertype='4'") or die(mysql_error()); $count=mysql_fetch_array($query); return $count['rejected'];}
/**********END VP New request**********/
/********end dashboard*******/

?>

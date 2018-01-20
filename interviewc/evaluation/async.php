<?php session_start();
include_once('connection.php');
include_once('functions.php');

$params = $_GET;

if(isset($params['method']) && $params['method'] == 'anc'){

  $order = array_shift($params['order']);

  $columnsMap = array(
    'name', 'position', 'eval_emp_name', 'eval_comments', ''
  );

  $optionalFields = array('email', 'designation', 'Companyname_name', 'employer', 'contact');

  $search = trim($params['search']['value']) ? "AND (name LIKE '%".$params['search']['value']."%'" : '';

  if($search){
    foreach($optionalFields as $field){
      $search .= " OR ".$field." LIKE '%".$params['search']['value']."%'";
    }
    $search .= ') ';
  }

  $position_filter = "";

  if ($params['position_filter'] == 'visualizer')
  {
      $position_filter = "AND position = 'Visualizer'";
  }
  else  if ($params['position_filter'] == 'CSE')
  {
      $position_filter = "AND position = 'CSE'";
  }
  else  if ($params['position_filter'] == 'QA')
  {
      $position_filter = "AND position = 'QA'";
  }
  else  if ($params['position_filter'] == 'Adops Analyst')
  {
      $position_filter = "AND position = 'Adops Analyst'";
  }
  else  if ($params['position_filter'] == 'ImageArtist')
  {
      $position_filter = "AND position = 'ImageArtist'";
  }
  else  if ($params['position_filter'] == 'Creative Designer')
  {
      $position_filter = "AND position = 'Creative Designer'";
  }
  else  if ($params['position_filter'] == 'Creative Designerexp')
  {
      $position_filter = "AND position = 'Creative Designerexp'";
  }
    else  if ($params['position_filter'] == 'Front End Developer')
  {
      $position_filter = "AND position = 'Front End Developer'";
  }
   else  if ($params['position_filter'] == 'Full Stack Developer')
  {
      $position_filter = "AND position = 'Full Stack Developer'";
  }
  $cond = '';
    $type = isset($_GET['type']) ? trim($_GET['type']) : '';

  if ($type) {
    if ($type == 1) {
        $cond .= ' AND practical_selected = 1 ';
    }

}

  $conditions = "WHERE status IN ('1') AND mstatus IN ('0','1','3') ".$cond.$search.$position_filter." ORDER BY ".$columnsMap[$order['column']]." ".$order['dir'];



   $pull = "SELECT * FROM `contacts` ". $conditions ." limit ".$params['length']. " offset ". $params['start']; 

  $pack = mysql_query($pull) or die('MySql Error' . mysql_error());

  $count = mysql_query("SELECT count(*) as total FROM contacts ".$conditions);

  $counter = mysql_fetch_assoc($count);

  $result = array();

  while ($contact = mysql_fetch_array($pack)){

    $check_man_id = mysql_query("SELECT * FROM `contacts` WHERE manager_emp_id IN ('".$_SESSION['userid']."') AND mstatus IN ('1','3') AND id='".$contact['id']."'")or die('MySql Error' . mysql_error());
    $numrows = mysql_num_rows($check_man_id);
    $fetch = mysql_fetch_array($check_man_id);

    $result[] = array(
      $contact['name'], $contact['position'],  ($params['new_dash'] ? $contact['contact'] : ($contact['eval_emp_name'] ? $contact['eval_emp_name'] : '')), $contact['eval_comments'] ? $contact['eval_comments'] : 'No',
      $contact['status'], $contact['mstatus'], $fetch['mstatus'], intval($numrows), $contact['id'], ord($contact['nstatus']), $contact['practical_selected'], $contact['practical_comment1'], $contact['practical_comment2'], $contact['practical_comment3']
    );
  }

  echo json_encode(array('data' => $result, 'recordsTotal' => $counter['total'], 'recordsFiltered' => $counter['total']));
  exit;
}

if($params['method'] == 'practical'){
  if(!$_POST['id']){
    echo json_encode(array('status' => false, 'messsage' => 'Missing parameter id!')); exit();
  }

  $record = mysql_fetch_array(mysql_query("SELECT * from contacts where id = ".$_POST['id']." LIMIT 1"));

  $value = intval($_POST['value']);
  if($value){
    $query = "UPDATE contacts set practical_selected = 1, practical_comment1 = '".$_POST['comment1']."', practical_comment2 = '".$_POST['comment2']."', practical_comment3 = '".$_POST['comment3']."', practical_date = '".date('Y-m-d H:i:s')."'";
  }else{
    $query = "UPDATE contacts set practical_selected = NULL, practical_date = NULL";
  }

  $query .= ' WHERE id = '. $_POST['id'];
  $update = mysql_query($query) || die(mysql_error());

  echo json_encode(array('status' => true, 'message' => 'Successfully updated!')); exit();
}

$order = array_shift($params['order']);

$columnsMap = array(
  'name', 'position', 'register_on'
);

// echo '<pre>';

// var_dump($params);
// exit;

$optionalFields = array('email', 'designation', 'Companyname_name', 'employer', 'contact');

$search = trim($params['search']['value']) ? "AND (name LIKE '%".$params['search']['value']."%'" : '';

if($search){
  foreach($optionalFields as $field){
    $search .= " OR ".$field." LIKE '%".$params['search']['value']."%'";
  }
  $search .= ') ';
}

$type = isset($_GET['type']) ? trim($_GET['type']) : '';

if($type){
  if($type == '1'){
    $search .= ' AND practical_selected = 1 and practical_date IS NOT NULL';
  }
}


$conditions = "WHERE status IN ('0','1') ".$search." ORDER BY ".$columnsMap[$order['column']]." ".$order['dir'];

$pull = "SELECT * FROM `contacts` ". $conditions ." limit ".$params['length']. " offset ". $params['start'];
// var_dump($pull);exit;
$pack = mysql_query($pull) or die('MySql Error' . mysql_error());

$count = mysql_query("SELECT count(*) as total FROM contacts ".$conditions);

$counter = mysql_fetch_assoc($count);

$result = array();

while ($contact = mysql_fetch_array($pack)){

  $check_eval_id = mysql_query("SELECT * FROM `contacts` WHERE eval_emp_id IN ('".$_SESSION['userid']."') AND status='1' AND id='".$contact['id']."'")or die('MySql Error' . mysql_error());
  $numrows = mysql_num_rows($check_eval_id);

  if($numrows || ($contact['status']) == '0'){
    $result[] = array(
      $contact['name'], $contact['position'], $contact['register_on'], $contact['contact'], $numrows ? true : false, $contact['status'], $contact['id'], $contact['practical_selected'], $contact['practical_comment1'], $contact['practical_comment2'], $contact['practical_comment3']
    );
  }

}

echo json_encode(array('data' => $result, 'recordsTotal' => $counter['total'], 'recordsFiltered' => $counter['total']));
exit;
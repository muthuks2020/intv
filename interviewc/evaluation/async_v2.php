<?php session_start();
include_once('connection.php');
include_once('functions.php');

$params = $_GET;

if($_GET['action'] == 'retest'){
  if(!$_POST['id']){
    echo json_encode(array('status' => false, 'messsage' => 'Missing parameter id!')); exit();
  }

  $record = mysql_fetch_array(mysql_query("SELECT * from contacts where id = ".$_POST['id']." LIMIT 1"));
  if(intval($record['status']) != 2){
    // echo json_encode(array('status' => false, 'messsage' => 'This action is only allowed for rejected application.!')); exit();
  }

  $value = intval($_POST['value']);
  if($value){
    $query = "UPDATE contacts set retest = 1, retest_date = '".date('Y-m-d H:i:s')."'";
  }else{
    $query = "UPDATE contacts set retest = NULL, retest_date = NULL";
  }

  $query .= ' WHERE id = '. $_POST['id'];
  $update = mysql_query($query) || die(mysql_error());

  echo json_encode(array('status' => true, 'message' => 'Successfully '.($value ? 'marked' : 'unmarked').' retest for user '.$record['name'])); exit();
}

$order = array_shift($params['order']);

$columnsMap = array(
  'name', 'contact', 'position', 'register_on'
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
  if($type == '10'){
    $search .= ' AND retest = 1 and retest_date IS NOT NULL';
  }else if($type == '11'){
    $search .= " AND practical_selected = 1";
  }else{
    $search .= " AND status = '{$type}'";
  }
}

$conditions = "WHERE status IS NOT NULL ".$search." ORDER BY ".$columnsMap[$order['column']]." ".$order['dir'];

$pull = "SELECT * FROM `contacts` ". $conditions ." limit ".$params['length']. " offset ". $params['start'];
// var_dump($pull);exit;
$pack = mysql_query($pull) or die('MySql Error' . mysql_error());

$count = mysql_query("SELECT count(*) as total FROM contacts ".$conditions);

$counter = mysql_fetch_assoc($count);

$result = array();

while ($contact = mysql_fetch_array($pack)){

  $check_eval_id = mysql_query("SELECT * FROM `contacts` WHERE eval_emp_id IN ('".$_SESSION['userid']."') AND status='1' AND id='".$contact['id']."'")or die('MySql Error' . mysql_error());
  $numrows = mysql_num_rows($check_eval_id);

  $result[] = array(
    $contact['name'], $contact['position'], $contact['register_on'], $contact['contact'], $numrows ? true : false, $contact['status'], $contact['id'], $contact['eval_emp_name'], $contact['retest'], $contact['retest_date'],
    intval($contact['practical_selected']),
    $contact['practical_comment1'] ? $contact['practical_comment1'] : '',
    $contact['practical_comment2'] ? $contact['practical_comment2'] : '',
    $contact['practical_comment2'] ? $contact['practical_comment3'] : ''
  );
}

echo json_encode(array('data' => $result, 'recordsTotal' => $counter['total'], 'recordsFiltered' => $counter['total']));
exit;

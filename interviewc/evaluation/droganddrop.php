<?php 
include("connection1.php"); 
 
$array    = $_POST['arrayorder'];
 
if ($_POST['update'] == "update"){
    

    $count = 1;
 
    foreach ($array as $idval) {
 
    $query = mysql_query("UPDATE hub_request SET listorder =" . $count . " WHERE rid = " . $idval) or die('Error, insert query failed');
 
        //mysql_query($query) or die('Error, insert query failed');
 
        $count ++;    
    
}
    echo 'Refresh page to see the changes!';
}
?>
<?php 
include("connection.php"); 
 
$array    = $_POST['arrayorder1'];
 
if ($_POST['update'] == "update"){
    

    $count = 1;
 
    foreach ($array as $idval) {
 
    $query = mysql_query("UPDATE contacts SET listorder =" . $count . " WHERE id = " . $idval) or die('Error, insert query failed');
 
        //mysql_query($query) or die('Error, insert query failed');
 
        $count ++;    
    
}
    echo 'Refresh page to see the changes!';
}
?>
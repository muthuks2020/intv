<?php
include_once("connection.php");

if ($_GET['contact'] != '') {
    echo mysql_query("UPDATE `contacts` SET status = '1' WHERE contact = '" . $_GET['contact'] . "'") or die(mysql_error());
}
?>

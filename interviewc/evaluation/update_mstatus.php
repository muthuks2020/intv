<?php
include_once('db.php');
echo mysql_query("UPDATE `contacts` SET nstatus = 1 WHERE id ='".$_GET['id']."'");


<?php

$SETTINGS["hostname"] = 'localhost';
$SETTINGS["mysql_user"] = 'root';
$SETTINGS["mysql_pass"] = '';
$SETTINGS["mysql_database"] = 'project';
$SETTINGS["USERS"] = ''; // this is the default table name that we used

/* Connect to MySQL */
$connection = mysqli_connect($SETTINGS["hostname"], $SETTINGS["mysql_user"], $SETTINGS["mysql_pass"], $SETTINGS["mysql_database"]) or die ('Unable to connect to MySQL server.<br ><br >Please make sure your MySQL login details are correct.');
// $db = mysql_select_db($SETTINGS["mysql_database"], $connection) or die ('request "Unable to select database."');
?>
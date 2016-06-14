<?php
$host = "";
$db = "";
$dbuser = "";
$dbpass = "";

$connect = mysql_connect ($host , $dbuser , $dbpass) or die( mysql_error ());
mysql_query("SET CHARACTER SET 'cp1250'", $connect);
mysql_query("SET NAMES 'cp1250'", $connect);

mysql_select_db ($db) or die( mysql_error ());
?>
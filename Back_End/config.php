<?php
/*
$mysql_hostname="localhost";
$mysql_user="test";
$mysql_password="1234";
$mysql_database="web_project";
*/
  $db = new PDO("mysql:dbname=web_project;host=localhost", "test", "1234")
  // $db = mysqli_connect($mysql_hostname, $mysql_user, $mysql_password, $mysql_database);

?>

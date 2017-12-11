<?php
session_start();
// print_r($_SESSION);
// print_r($_POST);
$id = $_SESSION['user_id'];
$name = "web_project";
$date = $_POST['date'];
$timearr = explode(" ",$_POST['time']);
$start_time = $timearr[0].":00:00";
$end_time = $timearr[1].":00:00";
$place  = $_SESSION['place'];
$population = $_POST['population'];
$chat = $_POST['chat'];
$query = "insert into futsal_manage(user_id, borrowdate, start_time, end_time, place, people,matching,chat) values('$id','$date','$start_time','$end_time','$place',$population,1,'$chat')";
$db = new PDO("mysql:dbname=$name", "root", "root");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->query($query);
?>
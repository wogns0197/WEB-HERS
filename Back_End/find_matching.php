<?php
session_start();
$id = $_SESSION['user_id'];
$date = $_POST['date'];
$place  = $_SESSION['place'];
$time = $_POST['time'].":00:00";
$name = "web_project";
$chat = $_POST['chat'];
$receive_id = null;
$manage_id = 0;
$query = "select * from futsal_manage where borrowdate='$date' and matching=1 and start_time='$time' and place='$place'";
$db = new PDO("mysql:dbname=$name", "root", "root");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$rows = $db->query($query);
foreach($rows as $row){
    echo "1";
    $receive_id = $row['user_id'];
    $manage_id = $row['manage_ID'];
}
$query2 = "insert into matching_manage values('$receive_id','$chat','$id',$manage_id,'$date')";
$db->query($query2);
?>
<script type="text/javascript"src="success_send_message.js"></script>

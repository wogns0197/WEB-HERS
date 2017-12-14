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
$flag = false;
foreach($rows as $row){
    $receive_id = $row['user_id'];
    $manage_id = $row['manage_ID'];
    $flag = true;
}
if($receive_id == $id){
?>
    <script type="text/javascript" src="send_myself.js"></script>
<?php
}
if($flag){
    $check_query = "select count(*) from matching_manage where send_id='$id' and manage_ID=$manage_id";
    $rows = $db->query($check_query);
    $count = 0;
    foreach($rows as $row){
        $count = $row['count(*)'];
    }
    if($count==0){
        $query2 = "insert into matching_manage values('$receive_id','$chat','$id',$manage_id,'$date')";
        $db->query($query2);
    }
    else{
    ?>
        <script type="text/javascript"src="duplicate_send_message.js"></script>        
    <?php
    }
}
else{
?>
    <script type="text/javascript"src="fail_send_message.js"></script>
<?php
}
if($count == 0 && $flag){
?>
<script type="text/javascript"src="success_send_message.js"></script>
<?php
}
?>

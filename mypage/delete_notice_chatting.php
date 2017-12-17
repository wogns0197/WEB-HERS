<?php
    $name = "web_project";
    $manage_ID = $_POST['delete_val'];
    $query = "delete from matching_manage where manage_ID=$manage_ID";
    $db = new PDO("mysql:dbname=$name", "root","root");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    try{
        $rows = $db->query($query);        
    }
    catch(PDOException $ex){
        echo "detail :".$ex->getMessage();
    }
?>
<script type="text/javascript"src="refresh.js"></script>    
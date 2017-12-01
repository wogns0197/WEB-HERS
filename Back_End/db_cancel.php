<?php
    session_start();    
    $id = $_SESSION['user_id'];
    $name = "web_project";
    $manage_ID = $_SESSION['manage_id'];
    $borrowdate = $_SESSION['borrowdate'];
    try{
        $query1 = "select * from futsal_manage where manage_ID=$manage_ID and borrowdate='$borrowdate'";        
        $query2 = "delete from futsal_manage where manage_ID=$manage_ID and borrowdate='$borrowdate'";
        $db = new PDO("mysql:dbname=$name", "root","root");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $rows = $db->query($query1);
        $db->query($query2);
        foreach($rows as $row){
            $notice = $row["notice"];
        }
        if($notice){
            try{
                $query3 = "delete from purpose_view where manage_ID=$manage_ID and borrowdate='$borrowdate'";
                $db->query($query3);
            }
            catch(PDOException $ex){
                echo "detail :".$ex->getMessage();
            } 
        }
    }
    catch(PDOException $ex){
        echo "detail :".$ex->getMessage();
    }
?>
<script src="success_cancel.js" type="text/javascript"></script>

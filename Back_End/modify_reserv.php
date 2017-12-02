<?php
session_start();
?>
<?php
    $id = $_SESSION['user_id'];
    $name = "web_project";
    $val = $_POST["cancel_val"];
    $valarr = explode(" ", $val);
    $manage_ID = $valarr[0];
    $borrowdate = $valarr[1];
    try{
        $query1 = "select notice from futsal_manage where manage_ID=$manage_ID and borrowdate='$borrowdate'";        
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
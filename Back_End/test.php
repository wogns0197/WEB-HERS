<?php
    try{
        $name = "web_project";
        $dbid = "root";
        $dbpwd = "root";
        $query = " ";
        $db = new PDO("mysql::dbname=$name", $dbid,$dbpwd);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $rows = $db->query($query);
    }
    catch(PDOException $ex){
        echo "Sorry";
        echo "detail :".$ex->getMessage();
    }
?>
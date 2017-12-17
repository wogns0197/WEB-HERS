<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <meta charset="utf-8">
    <title>Hanyang Erica Rental Site</title>

    <link rel="stylesheet" href="reserv_finish.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    $confirm = $_SESSION['confirm'];
    $_SESSION['place'] = $_GET['where'];
    try{
      if(!isset($_SESSION['user_id'])){
           echo "<script>alert('로그인이 필요합니다!');location.href='../login_function/login.php';</script>";
      }
      else{
          $user_id = $_SESSION['user_id'];
          ?>
  
          <?php
      }
      $name = "web_project";
      $time = explode(" ",$_POST["time"]);
      $id = $_SESSION['user_id'];
      $borrowdate = $_POST["selected_date"];
      $modifydate = $_SESSION['m_borrowdate'];
      $m_manage_id = $_SESSION['m_manage_id'];
      $start_time = $time[0].":00";
      $end_time = $time[1].":00";
      $place = $_POST["place"];
      $purpose = $_POST["purpose"];
      $notice = $_POST["notice"];
      if($notice === "on"){
        $notice = 1;
      }
      else{
        $notice = 0;
      }
      $home = $_POST["home"];
      $away = $_POST["away"];
      $population = $_POST["population"];
      $groupname = $_POST["groupname"];
      $db = new PDO("mysql:dbname=$name", "root","root");
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $flag = true;
      if($_SESSION['modify']==1){//수정 중일때
        $query1 = "update futsal_manage set borrowdate='$borrowdate',start_time='$start_time',end_time='$end_time',place='$place',purpose='$purpose',notice='$notice',home='$home',away='$away',people=$population,groupname='$groupname', matching = 0 where manage_ID=$m_manage_id and borrowdate='$modifydate'";                    
      }
      else if($confirm == 1){
        $check_manage_id_query = "select manage_ID from futsal_manage where borrowdate='$borrowdate' and place='$place' and start_time='$start_time'";
        try{
          $check_ids = $db->query($check_manage_id_query);          
        }
        catch(PDOException $ex){
          echo "detail :".$ex->getMessage();
        }
        foreach($check_ids as $check_id){
          $manage_id= $check_id['manage_ID'];
        }
        $query1 = "update futsal_manage set matching = 0, purpose='$purpose', notice='$notice', home='$home', away='$away', groupname='$groupname' where manage_ID=$manage_id";
        $query2 = "delete from matching_manage where manage_ID=$manage_id";
      }
      else{
        $query1 = "insert into futsal_manage(user_id, borrowdate, start_time, end_time, place, purpose, notice,home, away, people, groupname, matching) values('$id','$borrowdate','$start_time','$end_time','$place', '$purpose', '$notice','$home','$away',$population, '$groupname',0)";
      }
      $check_query = "select count(*) from futsal_manage where borrowdate='$borrowdate' and start_time='$start_time' and place='$place'";
      try{
        $check = $db->query($check_query);
        foreach($check as $a){
          $count = $a['count(*)'];
        }
        $db->query($query1);
        if($confirm==1){
         $db->query($query2);
        }
      }
      catch(PDOException $ex){
        echo "detail : ".$ex->getMessage();
        $flag = false;
      }
      if($_SESSION['modify']==1){
        if($notice){
          try{
            $query2 = "update purpose_view set place='$place', home='$home', away='$away', borrowdate='$borrowdate',start_time='$start_time',end_time='$end_time' where borrowdate='$modifydate' and manage_ID=$m_manage_id";
            $db->query($query2);
          }
          catch(PDOException $ex){
            echo "detail :".$ex->getMessage();
            $flag = false;
          ?>
            <script src="modify_fail.js" type = "text/javascript"></script>
          <?php
          }
        }
        else{
          try{
            $query2 = "delete from purpose_view where manage_ID=$m_manage_id and borrowdate='$modifydate'";
            $db->query($query2);
          }
          catch(PDOException $ex){
            echo "detail :".$ex->getMessage();
            $flag = false;
            ?>
            <script src="modify_fail.js" type = "text/javascript"></script>
            <?php
          }
        }
        ?>
        <script src="modify_success.js" type = "text/javascript"></script>
        <?php
      }
      else if($confirm==0){
        if($count==0){
          if($notice){
            try{
              $query2 = "insert into purpose_view values((select manage_ID from futsal_manage where place = '$place' and borrowdate = '$borrowdate' and start_time = '$start_time'),'$place','$home','$away','$borrowdate','$start_time','$end_time')";
              $db->query($query2);
            }
            catch(PDOException $ex){
              echo "detail :".$ex->getMessage();
              $flag = false;
            }
          }
        ?>
        <script src="success.js" type = "text/javascript"></script>
      <?php
        }
        else{?>
          <script src="fail.js" type = "text/javascript"></script>
    <?php
        $flag = false;
        }
      }
    }
    catch(PDOException $ex){
      echo "Sorry";
      echo "detail :".$ex->getMessage();
      if($modify){
    ?>
      <script src="modify_fail.js" type = "text/javascript"></script>
    <?php
      }
      else{
    ?>
      <script src="fail.js" type = "text/javascript"></script>
    <?php
      }
      $flag = false;
    }
    ?>
  </head>
  <body>
    <?php
    if($flag){?>
      <div class="momtong">
        <div class="topp">
          <p>예약확인</p>
        </div>
        
        <hr id="tophr"/>
        <p>시간   :  <span class="strong"> <?= $start_time ?> - <?= $end_time ?></span></p>
        <p>대여날짜   :   <span class="strong"><?=$borrowdate?></span></p>
        <!-- <p>수정날짜<?=$modifydate?></p> -->
        <p>장소 : <span class="strong"><?=$place?></span></p>
        <p>목적 : <span class="strong"><?=$purpose?></span></p>
        <?php
        if($notice==1)?>
          <p>공지여부 : <span class="strong">O</span></p>
        <a href="../main/main.php"><button>Home</button></a>
      </div>

    <?php
    }
    else{?>
      <div class="fail">
        <script>
          document.location.href="reserv_FAIL.html"
        </script>
      </div>
        
      </div>
    <?php
    }
    ?>
  </body>
</html>

<?php
session_start();



?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Hanyang Erica Rental Site</title>
    <link rel="stylesheet" href="../Front_end/futsal_reserve_page/futsal_reserv.css">
    <link rel="stylesheet" href="../Front_end/main/main.css">
    <link rel="stylesheet" href="../Front_end/futsal_reserv_confirmation.css?ver=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    try{
      $_SESSION['place'] = $_GET['where'];
      if(!isset($_SESSION['user_id'])){
           echo "<script>alert('로그인이 필요합니다!');location.href='../Front_End/futsal/futmain2.php';</script>";
      }

      else{
          $user_id = $_SESSION['user_id'];
          echo "<p>안녕하세요 $user_id 님.</p>";
          echo "<p><a href = 'login_function/logout.php'>로그아웃</p>";
      }

      print_r($_POST);      
      $name = "web_project";
      $time = explode(" ",$_POST["time"]);
      $id = $_SESSION['user_id'];
      $borrowdate = $_POST["selected_date"];
      $start_time = $time[0].":00:00";
      $end_time = $time[1].":00:00";
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
      $query1 = "insert into futsal_manage(user_id, borrowdate, start_time, end_time, place, purpose, notice,home, away, people, groupname) values('$id','$borrowdate','$start_time','$end_time','$place', '$purpose', '$notice','$home','$away',$population, '$groupname')";
      $check_query = "select count(*) from futsal_manage where borrowdate='$borrowdate' and start_time='$start_time' and place='$place'";              
      $db = new PDO("mysql:dbname=$name", "root","root");
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      try{
        $check = $db->query($check_query);
        foreach($check as $a){
          $count = $a['count(*)'];
        }
      }
      catch(PDOException $ex){
        echo "detail : ".$ex->getMessage();
      }
      if($count==0){
        $db->query($query1);
        if($notice){
          try{
            $query2 = "insert into purpose_view values((select manage_ID from futsal_manage where user_id = '$id' and borrowdate = '$borrowdate' and start_time = '$start_time' and end_time = '$end_time'),'$place','$home','$away','$borrowdate','$start_time','$end_time')";
            $db->query($query2);
          }
          catch(PDOException $ex){
            echo "detail :".$ex->getMessage();
          }
        }
        ?>
        <script src="success.js" type = "text/javascript"></script>
      <?php
        $flag = true;
      }
      else{?>
        <script src="fail.js" type = "text/javascript"></script>
    <?php
        $flag = false;
      }
    }
    catch(PDOException $ex){
      print_r($_POST);
      echo "Sorry";
      echo "detail :".$ex->getMessage();
    ?>
      <script src="fail.js" type = "text/javascript"></script>
    <?php
      $flag = false;
    }
    ?>
  </head>
  <body>

    <?php
    ?>
    <header id="home">
      <h1><a href="#home">HERS</a></h1>
    </header>
    <nav>
      <ul>
        <li><a href="../Front_End/main/main.html">Home</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#contact">Contact</a></li>
      </ul>
    </nav>

    <?php
    if($flag){?>
      <!-- 성공한 예약 내역 출력해주세요 -->
    <?php
    }
    else{?>
      
    <?php
    }
    ?>
  </body>
</html>

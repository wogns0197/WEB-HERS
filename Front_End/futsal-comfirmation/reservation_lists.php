<?php
session_start();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Hanyang Erica Rental Site</title>
    <!-- <link rel="stylesheet" href="../Front_end/futsal_reserve_page/futsal_reserv.css"> -->
    <!-- <link rel="stylesheet" href="../Front_end/main/main.css"> -->
    <link rel="stylesheet" href="../futsal_reserve_page/reservation_lists.css?">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body>

    


    <!-- db에서 유저 아이디 써서 예약 내역 불러옴 -->
    <?php
    $id = $_SESSION['user_id'];
    $name = "web_project";
    try{
      $query = "select * from futsal_manage where user_id = '$id' and borrowdate >= date_format(curdate(), '%Y-%m-%d')";
      $db = new PDO("mysql:dbname=$name", "root","root");
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $rows = $db->query($query);
      $size = 0;
      foreach($rows as $row){
        $size++;
        $manage_ID[] = $row["manage_ID"];
        $borrowdate[] = $row["borrowdate"];
        $start_time[] = $row["start_time"];
        $end_time[] = $row["end_time"];
        $place[] = $row["place"];
      }
    }
    catch(PDOException $ex){
      echo "detail :".$ex->getMessage();
    }
    ?>
    <form action="reserv_cancel.php" method="post" id="cancel"></form>
    <form action="../Front_End/futsal/futmain2.php" method="post" id="modify"></form>
    <div id="reserve_wrap">
      <h2>예약 내역</h2>
      <div class="container">
        <table class="reserve_lists">
          <tr>
            <th>관리번호</th>
            <th>대여날짜</th>
            <th>대여시간</th>
            <th>대여장소</th>
          </tr>
          <?php
            for($i = 0; $i < $size; $i++){?>
            <tr>
            <th><?=$manage_ID[$i]?></th>
            <th><?=$borrowdate[$i]?></th>
            <th><?=$start_time[$i]?>:00 ~ <?=$end_time[$i]?>:00</th>
            <th><?=$place[$i]?></th>
          <?php
            $valarr = array($manage_ID[$i], $borrowdate[$i]);
            $val = implode(" ",$valarr);
          ?>
            <th><button name="modify_val" value="<?= $val ?>" type="submit" form = "modify">수정</button></th>
            <th><button name="cancel_val" value="<?= $val ?>" type="submit" form = "cancel">취소</button></th>
            </tr>
          <?php
            }
          ?>
        </table>
      </div>
    </div>
  </body>
</html>

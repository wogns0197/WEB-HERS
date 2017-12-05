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
    <form action="reserv_cancel.php" method="post" id="cancel"></form>
    <form action="../futsal/futmain2.php" method="post" id="modify"></form>
    <div id="reserve_wrap">
      <h2>예약 내역</h2>
      <div class="container">
        <table class="reserve_lists" bor>
          <tr>          
            <th id="num" class="base">관리번호</th>
            <th id="day" class="base">대여날짜</th>
            <th id="time" class="base">대여시간</th>
            <th id="place" class="base">대여장소</th>          
          </tr>
          <?php
            get_list();
            for($i = 0; $i < $size; $i++){
          ?>
            
            <tr>
            <th id="num" class="tab"><?=$manage_ID[$i]?></th>
            <th id="day" class="tab"><?=$borrowdate[$i]?></th>
            <th id="time" class="tab"><?=substr($start_time[$i],0,-3)?> ~ <?=substr($end_time[$i],0,-3)?></th>
            <th id="place" class="tab"><?=$place[$i]?></th>
          <?php
            $valarr = array($manage_ID[$i], $borrowdate[$i]);
            $val = implode(" ",$valarr);
          ?>
            <th id="but"><button id="but1" name="modify_val" value="<?= $val ?>" type="submit" form = "modify">수정</button></th>
            <th id="but"><button id="but2" name="cancel_val" value="<?= $val ?>" type="submit" form = "cancel">취소</button></th>
            </tr>
          <?php
            }
          ?>
        </table>
      </div>
    </div>
  </body>
</html>
<?php
function get_list(){//id에 해당하는 예약 list를 가져온다
  $id = $_SESSION['user_id'];
  $name = "web_project";
  try{
    $query = "select * from futsal_manage where user_id = '$id' and borrowdate >= date_format(curdate(), '%Y-%m-%d')";
    $db = new PDO("mysql:dbname=$name", "root","root");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $rows = $db->query($query);
    global $size, $manage_ID, $borrowdate, $start_time, $end_time, $place;
    $size=0;
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
}
?>
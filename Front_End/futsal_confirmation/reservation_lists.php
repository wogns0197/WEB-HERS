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
    <link rel="stylesheet" href="../main2.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <script type="text/javascript"src="http://code.jquery.com/jquery-latest.min.js"></script>
  <script type="text/javascript">
    $(document).ready( function(){
      $("#menuicon").click(function () {
        $("#menubar").animate({left: 0}, 300 );
        $("#xicon").animate({left: 0}, 300 );
        $("#menuicon").fadeOut(300);
      });

      $("#xicon").click(function () {
        $("#menubar").animate({left: "-25%"}, 300 );
        $("#xicon").animate({left: "-25%"}, 300 );
        $("#menuicon").fadeIn(300);
      });

    });
  </script>
  </head>
  <body>
    <header>
    <h1><a href="../main/main.html">HERS</a></h1>
    <hr/>
  </header>

  <a id="menuicon"><svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 100 125" x="0px" y="0px"><title>54 all</title><path d="M74.46,49H25.54a1,1,0,0,0,0,2H74.46a1,1,0,0,0,0-2Z"/><path d="M74.46,28.73H25.54a1,1,0,0,0,0,2H74.46a1,1,0,0,0,0-2Z"/><path d="M74.46,69.27H25.54a1,1,0,1,0,0,2H74.46a1,1,0,1,0,0-2Z"/>
  </svg></a>

  <a id="xicon"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 100 125" version="1.1" x="0px" y="0px"><title>Bold Cross</title><desc>Created with Sketch.</desc><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g fill="#000000"><path d="M48,48 L48,18.8873016 C48,17.7827321 48.8954305,16.8873016 50,16.8873016 C51.1045695,16.8873016 52,17.7827321 52,18.8873016 L52,48 L81.1126984,48 C82.2172679,48 83.1126984,48.8954305 83.1126984,50 C83.1126984,51.1045695 82.2172679,52 81.1126984,52 L52,52 L52,81.1126984 C52,82.2172679 51.1045695,83.1126984 50,83.1126984 C48.8954305,83.1126984 48,82.2172679 48,81.1126984 L48,52 L18.8873016,52 C17.7827321,52 16.8873016,51.1045695 16.8873016,50 C16.8873016,48.8954305 17.7827321,48 18.8873016,48 L48,48 L48,48 Z" transform="translate(50.000000, 50.000000) rotate(45.000000) translate(-50.000000, -50.000000) "/></g></g>
  </svg></a>

  <nav id="menubar">
    <dl>
      <dt id="title">HERS</dt>

      <dt>MAIN</dt><hr color="black">
      <dd>
        <ul class="menus">
          <li><a href="main.html">Home</a></li>
          <li><a href="../about/about.html">About Us</a></li>
        </ul>
      </dd>

      <dt>USER</dt><hr color="black">
      <dd>
        <ul class="menus">
          <li><a href="#">Login</a></li>
          <li><a href="#">Logout</a></li>
          <li><a href="../mypage/mypage.html">My Page</a></li>
        </ul>
      </dd>

      <dt>RENTAL</dt><hr color="black">
      <dd>
        <ul class="menus">
          <li><a href="../futsal-comfirmation/futconfirm.html">Futsal Confirmation</a></li>
          <li><a href="../futsal/futmain2.php">Futsal Field Rental</a></li>
        </ul>
      </dd>
    </dl>

  </nav>

  <div class="user">
    <p>Signed In as (USER)</p>
  </div>



  






    <!-- db에서 유저 아이디 써서 예약 내역 불러옴 -->
    <form action="../../Back_End/reserv_cancel.php" method="post" id="cancel"></form>
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
            for($i = 0; $i < $size; $i++){//모든 예약 내역을 가져온다
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
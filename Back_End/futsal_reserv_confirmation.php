<?php
session_start();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Hanyang Erica Rental Site</title>
    <link rel="stylesheet" href="../Front_end/futsal_reserve_page/futsal_reserv.css">
    <!-- <link rel="stylesheet" href="../Front_end/main/main.css"> -->
    <link rel="stylesheet" href="../Front_end/futsal_reserve_page/futsal_reserv_confirmation.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="futsal_reserv_confirm_js.js" type="text/javascript" ></script>
  </head>
  <body>

    <?php
        $_SESSION['place'] = $_GET['where'];
        if(!isset($_SESSION['user_id'])){//로그인 확인
            echo "<script>alert('로그인이 필요합니다!');location.href='../Front_End/futsal/futmain2.php';</script>";
        }
        else{
            $user_id = $_SESSION['user_id'];
            ?>
            <div class="top">
              <p id="userleft"><?= $user_id ?></p>
              <p id="logoutright"><a href = 'login_function/logout.php'>Logout</a></p>
            </div>
            <hr id="tophr" />
            <?php
        }
    ?>


    <!-- <header id="home">
      <h1><a href="#home">HERS</a></h1>
    </header>
    <nav>
      <ul>
        <li><a href="../Front_End/main/main.html">Home</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#contact">Contact</a></li>
      </ul>
    </nav> -->

    
    <!-- 이전 페이지에서 예약 선택 정보 가져옴  -->
    <form action="reserv_finish.php" method="post">
    <?php
      //전의 페이지에서 받아온 정보를 가져온다
      $modify = $_SESSION['modify'];
      if($modify){//예약 수정일 경우 예전 예약 내용을 default값으로 가져온다
        set_modify_val();
      }
      $population = $_POST["population"];
      $timearr = $_POST["selected_time"];
      $time = explode(" ",$timearr);
      $start_time = $time[0].":00";
      $end_time = $time[1].":00";
      $borrow_date = $_POST["selected_date"];
      $place = $_POST["place"];
    ?>
    
    <div class="confirm_wrap">
        <hr id="tophr" />
        <br>
        <div class="container">
          <span class="arc">인원 : <?= $population ?>명</span><br>
          <span class="arc">대여날짜 : <?= $borrow_date ?></span><br>
          <span class="arc">대여시간 : <?= $start_time ?> ~ <?= $end_time ?></span><br>
          <?php 
            $start_time = $start_time.":00";
            $end_time = $end_time.":00";
          ?>
          <span class="arc">대여장소 : <?= $place ?></span><br>
          <input class="hidden" type="text" name="population" value="<?= $population ?>" readonly/>
          <input class="hidden" type="text" name="selected_date" value="<?= $borrow_date ?>" readonly/>
          <input id ="time" class="hidden" type="text" name="time" value="<?= $timearr ?>" readonly/>
          <input class="hidden" type="text" name="place" value="<?= $place ?>" readonly/>
        </div>
        <br/>
        <div class="container">
          <span>사용 용도 :</span>
            <select name="purpose">
              <option>풋살</option>
              <option>축구</option>
              <option>농구</option>
              <option>기타행사</option>
            </select>
          <?php
            if($modify == 1){//예약 수정
              if($notice == 1){//예약 수정할때 공지를 원할 경우
          ?>
            <input id = "notice_checked" name = "notice" type="checkbox" checked/>공지
            <br>
            <div id="notice_on">
              <input type="text" placeholder = "home" name = "home" value ="<?= $home ?>" required/>
              <span > vs </span>
              <input type="text" placeholder ="away" name="away" value="<?= $away ?>"  required />
            </div>
          <?php
              }
              else{//예약 수정할때 공지를 원하지 않을 경우
          ?>
            <input id = "notice_checked" name = "notice" type="checkbox" unchecked/>공지
          <?php
              }
          ?>
            <div class="groupname">
              <input type="text" placeholder="단체명" name="groupname" value = "<?= $groupname ?>" required/>
            </div>
          <?php
            }
            else{//기본 예약
          ?>
              <input id = "notice_checked" name = "notice" type="checkbox" checked/>공지
              <br>
              <div id="notice_on">
                <input type="text" placeholder = "home" name = "home" required/>
                <span > vs </span>
                <input type="text" placeholder ="away" name="away" required />
              </div>
            <?php
            }
            ?>
            <div>
            <input type="text" placeholder="단체명" name="groupname" required/>
            </div>
        </div>
        <br/>
        <div class="buttons">
          <button id="alert" type="submit">예약
            <?php if($_SESSION['modify']){//예약 수정 중일 때는 '예약 수정'버튼 기본 예약 중일때는 '예약 신청'버튼으로
            ?>
              수정
            <?php
            }
            else{
            ?>
              신청
            <?php
            }?>
          </button>
        </div>
    </div>
    </form>

     <script src="../Front_end/futsal_reserve_page/futsal_reserv_confirmation.js?ver=2" type="text/javascript"></script>
  </body>
</html>
<?php
  function set_modify_val(){
    global $notice, $home, $away, $groupname;
    try{
      $m_manage_ID = $_SESSION['m_manage_id'];
      $m_borrowdate = $_SESSION['m_borrowdate'];
      $name = "web_project";
      $query1 = "select * from futsal_manage where manage_ID=$m_manage_ID and borrowdate = '$m_borrowdate'";        
      $db = new PDO("mysql:dbname=$name", "root","root");
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $rows = $db->query($query1);
      foreach($rows as $row){
          $notice = $row['notice'];
          if($notice == 1){
            $home = $row['home'];
            $away = $row['away'];
            $groupname = $row['groupname'];
          }
      }
    }
    catch(PDOException $ex){
        echo "detail :".$ex->getMessage();
    }
  }
?>
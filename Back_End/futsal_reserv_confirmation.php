<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Hanyang Erica Rental Site</title>
    <link rel="stylesheet" href="../Front_end/futsal_reserve_page/futsal_reserv.css">
    <link rel="stylesheet" href="../Front_end/main/main.css">
    <link rel="stylesheet" href="../Front_end/futsal_reserve_page/futsal_reserv_confirmation.css?ver=1">
    <script src="../Front_end/futsal_reserve_page/futsal_reserv_confirmation.js" type="text/javascript"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body>

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


    <!-- 이전 페이지에서 예약 선택 정보 가져옴  -->
    <form action="reserv_finish.php" method="post">
    <?php
      $val_arr = explode(" ", $_POST["selected"]);
      $population = $_POST["population"];
      $borrow_date = $val_arr[0];
      $start_time = $val_arr[1];
      $end_time = $val_arr[2];
      $place = $val_arr[3];
    ?>
    
    <div id="confirm_wrap">
      
        <div class="container">
          <span>인원 : <?= $population ?></span><br>
          <span>대여날짜 : <?= $borrow_date ?></span><br>
          <span>대여시간 : <?= $start_time ?> ~ <?= $end_time ?></span><br>
          <span>대여장소 : <?= $place ?></span><br>
        </div>
        <hr/>
        <div class="container">
          <span>사용 용도 :</span>
            <select name="purpose">
              <option>풋살</option>
              <option>축구</option>
              <option>농구</option>
              <option>기타행사</option>
            </select> 
          <input id = "notice_checked" name = "notice" type="checkbox" />공지
          <br>
            <span id="notice_on">
              <input type="text" placeholder= "home" name = "home" />
              <span > vs </span>
              <input type="text" placeholder ="away" name="away" />
            </span>
          <br>
          <span>단체명 : <input type="text" name="groupname"></span>


        </div>
        <hr/>
        <div class="buttons">
          <button name="finish" value="<?= $_POST["selected"] ?>">예약 신청</button>
          <!-- <button>예약 취소</button> -->
        </div>
    </div>
    </form>
  </body>
</html>

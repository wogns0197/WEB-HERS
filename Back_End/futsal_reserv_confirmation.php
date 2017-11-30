<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Hanyang Erica Rental Site</title>
    <link rel="stylesheet" href="../Front_end/futsal_reserve_page/futsal_reserv.css">
    <link rel="stylesheet" href="../Front_end/main/main.css">
    <link rel="stylesheet" href="../Front_end/futsal_reserve_page/futsal_reserv_confirmation.css?ver=4">
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
      $population = $_POST["population"];
      $timearr = $_POST["selected_time"];
      $time = explode(" ",$timearr);
      $start_time = $time[0].":00";
      $end_time = $time[1].":00";
      $borrow_date = $_POST["selected_date"];
      $place = $_POST["place"];
    ?>
    
    <div id="confirm_wrap">
      
        <div class="container">
          <span>인원 : <?= $population ?>명</span><br>
          <span>대여날짜 : <?= $borrow_date ?></span><br>
          <span>대여시간 : <?= $start_time ?> ~ <?= $end_time ?></span><br>
          <?php 
            $start_time = $start_time.":00";
            $end_time = $end_time.":00";
          ?>
          <span>대여장소 : <?= $place ?></span><br>
          <input class="hidden" type="text" name="population" value="<?= $population ?>" readonly/>
          <input class="hidden" type="text" name="selected_date" value="<?= $borrow_date ?>" readonly/>
          <input id ="time" class="hidden" type="text" name="time" value="<?= $timearr ?>" readonly/>
          <input class="hidden" type="text" name="place" value="<?= $place ?>" readonly/>
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
          <input id = "notice_checked" name = "notice" type="checkbox" unchecked/>공지
          <br>
            <div id="notice_on">
              <input type="text" placeholder = "home" name = "home" />
              <span > vs </span>
              <input type="text" placeholder ="away" name="away" />
            </div>
          

          <div>
          <span>단체명 : </span> <input type="text" name="groupname" />
          </div>


        </div>
        <hr/>
        <div class="buttons">
          <button id="alert" type="submit">예약 신청</button>
        </div>
    </div>
    </form>

     <script src="../Front_end/futsal_reserve_page/futsal_reserv_confirmation.js?ver=2" type="text/javascript"></script>
  </body>
</html>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Hanyang Erica Rental Site</title>
    <link rel="stylesheet" href="../Front_end/futsal_reserve_page/futsal_reserv.css">
    <link rel="stylesheet" href="../Front_end/main/main.css">
    <link rel="stylesheet" href="futsal_reserv_confirmation.css?ver=1">
    <script src="futsal_reserv_confirmation.js" type="text/javascript"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body>

    <header id="home">
      <h1><a href="#home">HERS</a></h1>
    </header>
    <nav>
      <ul>
        <li><a href="../main/main.html">Home</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#contact">Contact</a></li>
      </ul>
    </nav>


    <!-- 이전 페이지에서 예약 선택 정보 가져옴  -->
    <?php
      $place = $_POST["where"];
      $borrow_date = $_POST["borrow_date"];
      $population = $_POST["population"];
      $time_arr = $_POST["selected_time"];
      $start_time = $time_arr[0];
      $end_time = $time_arr[1];




    ?>
    
    <div id="confirm_wrap">
      
        <div class="container">
          <span>인원 : <?= $population ?></span><br>
          <span>대여날짜 : <?= $borrow_date ?></span><br>
          <span>대여시간 : <?= $start_time ?> ~ <?= $end_time ?></span><br>
          <span>대여장소 : <?= $place ?></span><br>
        </div>
        <hr/>
        <div>
          <span>사용 용도 :</span>
            <select name="purpose">
              <option>풋살</option>
              <option>축구</option>
              <option>농구</option>
              <option>기타행사</option>
            </select> 
          <input id = "notice_checked" type="checkbox" />공지
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
        <div>
          <button>예약 신청</button>
          <button>예약 취소</button>
        </div>

    <!-- 이부분에다가동db 연동 -->




    </div>
  </body>
</html>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Hanyang Erica Rental Site</title>
    <link rel="stylesheet" href="../Front_end/futsal_reserve_page/futsal_reserv.css">
    <link rel="stylesheet" href="../Front_end/main/main.css">
    <link rel="stylesheet" href="../Front_end/futsal_reserve_page/reservation_lists.css?ver=1">
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


    <!-- db에서 유저 아이디 써서 예약 내역 불러옴 -->
    <?php
      




    ?>
    
    <div id="reserve_wrap">
      <h2>예약 내역</h2>

      <div class="container">
        <table class="reserve_lists">
          <tr>
            <th>관리번호</th>

            <!-- 풋살장 빌리는 것인지 강의실 빌리는지  -->
            <th>대여구분</th> 

            <th>대여날짜</th>
            <th>대여시간</th>
            <th>대여장소</th>
          </tr>

         <!-- 이부분에다가 db 연동해서 내역 목록 출력 -->
         <!-- 내역 목록 리스트마다 옆에 수정/삭제 버튼으로 편집 -->

        </table>
      </div>
      


    <!-- 이부분에다가 db 연동 -->




    </div>
  </body>
</html>

<?php
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>About HERS</title>
    <link rel="stylesheet" href="about.css">
    <link rel="stylesheet" href="../prime.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript"src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script type="text/javascript"src="../prime.js"></script>
    <script type="text/javascript"src="jquery-animate-css-rotate-scale.js"></script>
    <script type="text/javascript"src="about.js"></script>

  </head>
  <body>
    <header>
  		<h1><a href="../main/main.php">HERS</a> ABOUT</h1>
  	</header>

    <!-- sidebar menu -->
    <a id="menuicon"><svg class="menusvg" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 100 125" x="0px" y="0px"><title>54 all</title><path d="M74.46,49H25.54a1,1,0,0,0,0,2H74.46a1,1,0,0,0,0-2Z"/><path d="M74.46,28.73H25.54a1,1,0,0,0,0,2H74.46a1,1,0,0,0,0-2Z"/><path d="M74.46,69.27H25.54a1,1,0,1,0,0,2H74.46a1,1,0,1,0,0-2Z"/>
    </svg></a>

    <a id="xicon"><svg class="menusvg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 100 125" version="1.1" x="0px" y="0px"><title>Bold Cross</title><desc>Created with Sketch.</desc><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g fill="#000000"><path d="M48,48 L48,18.8873016 C48,17.7827321 48.8954305,16.8873016 50,16.8873016 C51.1045695,16.8873016 52,17.7827321 52,18.8873016 L52,48 L81.1126984,48 C82.2172679,48 83.1126984,48.8954305 83.1126984,50 C83.1126984,51.1045695 82.2172679,52 81.1126984,52 L52,52 L52,81.1126984 C52,82.2172679 51.1045695,83.1126984 50,83.1126984 C48.8954305,83.1126984 48,82.2172679 48,81.1126984 L48,52 L18.8873016,52 C17.7827321,52 16.8873016,51.1045695 16.8873016,50 C16.8873016,48.8954305 17.7827321,48 18.8873016,48 L48,48 L48,48 Z" transform="translate(50.000000, 50.000000) rotate(45.000000) translate(-50.000000, -50.000000) "/></g></g>
    </svg></a>

    <nav id="menubar">
      <dl>
        <dt id="title">HERS</dt>

        <dt>MAIN</dt>
        <dd>
          <ul class="menus">
            <li><a href="../main/main.php">Home</a></li>
            <li><a href="../about/about.php">About Us</a></li>
          </ul>
        </dd>

        <dt>USER</dt>
        <dd>
          <ul class="menus">
            <?php
            if(!isset($_SESSION['user_id'])){
             ?>
            <li><a href="../login_function/login.php">Login</a></li>
            <?php
            }

            else{
              ?>
            <li>Signed In as (<?= $_SESSION['user_id']?>)</li>

            <li><a href="../login_function/logout.php">Logout</a></li>
            <li><a href="../mypage/mypage.php">My Page</a></li>
            <?php
             }
            ?>
          </ul>
        </dd>

        <dt>RENTAL</dt>
        <dd>
          <ul class="menus">
            <li><a href="../futsal_confirmation/reservation_lists.php">Futsal Confirmation</a></li>
            <li><a href="../futsal/futmain2.php">Futsal Field Rental</a></li>
            <li><a href="../mypage/match.php">Matching Request</a></li>
          </ul>
        </dd>
      </dl>

    </nav>
    <!-- end sidebar menu -->

    <div class="category">
      <a id="info" href="#">INFORMATION</a>&#32;&#183;&#32;
      <a id="dev" href="#">DEVELOPERS</a>&#32;&#183;&#32;
      <a id="ctct" href="#">CONTACT</a>
    </div>


    <div class="entire">
      <div class="siteinfo">
        <h2 id="firsttitle">SITE INFORMATION</h2>

        <p>It is a site that manages the futsal field and playground rental.<br />
          풋살장 및 운동장 대여를 관리하는 사이트입니다.</p>

        <img id="clock" src="image/24hours.png" alt="24hours">
        <p>Through this site, you can rent futsal field on the Internet 24 hours a day, anytime.<br />
          이 사이트를 통해 풋살장 대여는 시간, 장소에 구애받지 않고 24시간 인터넷 상으로 가능해집니다.</p>

        <div class="signimages">
          <img id="first" src="image/cursor.png" alt="cursor">
          <img src="image/place.png" alt="place">
          <img id="final" src="image/schedule.png" alt="schedule">
        </div>
        <p>After signing up and signing in through a very simple procedure, you can select the desired place.<br />
          Enter your desired schedule and user information then the rental will be completed.<br />
          아주 간단한 절차를 통해 회원가입 및 로그인한 뒤, 원하는 장소를 선택하고, <br />원하는 일정과 간단한 사용자 정보를 입력하면 대여가 완료됩니다.</p>

        <img id="match" src="image/alone.png" alt="match">
        <p>If you did not get an opponent to play in the game, you can get the opponent and play the soccer game in a much easier way.<br />
          경기를 하는 데 있어 상대팀을 구하지 못했다면, 상대팀 구하기 기능을 통해 상대팀을 구하고 훨씬 수월한 방법으로 축구 경기를 즐겨보세요.</p>

        <img id="soccer" src="image/soccerplay.png" alt="soccerplay">
        <p>If you want, you can show your game through announcements. If you want to see the game, please check the notice.<br />
          원할 경우 자신의 경기를 공지를 통해 보여줄 수도 있습니다. 경기를 관람하고 싶다면, 틈틈히 공지를 확인해보세요.</p>

        <p>We support your passion!<br/>당신의 열정을 응원합니다!</p>
        </p>
      </div>

      <div class="developer">
        <h2>DEVELOPERS</h2>

        <div id="kwon" class="person">
          <img src="image/kwon.jpg" alt="kwon">
          <h3>권재훈 Kwon Jaehoon</h3>
          <p>"front"</p>
          <p>Futsal Rental Page function materialization</p>
          <a href="https://github.com/wogns0197">Github Go</a>
        </div>

        <div id="seo" class="person">
          <img src="image/seo.jpg" alt="seo">
          <h3>서그림 Seo Geurim</h3>
          <p>"front"</p>
          <p>Main Page About Page Entire Design materialization</p>
          <a href="https://github.com/Seogeurim">Github Go</a>
        </div>

        <div id="choi" class="person">
          <img src="image/choi.jpg" alt="choi">
          <h3>최재영 Choi Jaeyoung</h3>
          <p>"front/back"</p>
          <p>Rental Function Partial Design materialization</p>
          <a href="https://github.com/chlwodud77">Github Go</a>
        </div>

        <div id="park" class="person">
          <img src="image/park.png" alt="choi">
          <h3>박재훈 Park Jaehoon</h3>
          <p>"back"</p>
          <p>Rental Function Database materialization</p>
          <a href="https://github.com/MilyangParkJaeHoon">Github Go</a>
        </div>


      </div>

      <div class="contact">
        <h2>CONTACT</h2>

      </div>
    </div>

  </body>
</html>

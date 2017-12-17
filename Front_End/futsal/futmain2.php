<?php
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Futsal Field Rental</title>


    <link rel="stylesheet" type="text/css" href="../bootstrap-3.3.2-dist/css/bootstrap.css">
    <link rel="stylesheet" href="../main2.css">
    <link rel="stylesheet" href="futmain2.css">

    <script
      src="https://code.jquery.com/jquery-3.2.1.min.js"
      integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
      crossorigin="anonymous"></script>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <script src="../bootstrap-3.3.2-dist/js/bootstrap.js"></script>
     <script type="text/javascript" src="futmain2.js"></script>
     <script type="text/javascript"src="../main2.js"></script>
  </head>

  <body>
    <!-- <header id="home">
      <h1><a href="../main/main.php">HERS</a></h1>
    </header> -->

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
            <li><a href="../../Back_End/login_function/login.php">Login</a></li>
            <?php
            }

            else{
              ?>
            <li>Signed In as (<?= $_SESSION['user_id']?>)</li>

            <li><a href="../../Back_End/login_function/logout.php">Logout</a></li>
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


    <table cellSpacing=0 cellPadding=0 class="notice-table center-block" >
        <?php
        set_modify_val();// 예약 수정 상태일 경우 예약 수정을 진행할때 예전 예약 내용을 default값으로 넣어주기위한 값들을 받아온다
        $view_rows = notice_view(); // 오늘 날짜에 공지를 원했던 경기를 db에서 가져온다.
        ?>

        <MARQUEE scrollAmount=1 height=70 direction=up>
          <section>
            <p>&nbsp;<  Today's Matches  ></p>

            <?php
                foreach($view_rows as $row){
                    $start_a = explode(":",$row["start_time"]);
                    $start_t = $start_a[0].":".$start_a[1];
                    $end_a = explode(":", $row["end_time"]);
                    $end_t = $end_a[0].":".$end_a[1];
            ?>
                  <p>
                  &nbsp;[<?= $row["place"] ?>]&nbsp;  <?= $row["home"] ?> <span class="vs">vs </span><?= $row["away"]?> <?= $start_t ?>~<?= $end_t ?>
                    <br/>
                    -
                  </p>
            <?php
            }
            ?>
            </section>
          </MARQUEE>
    <div class="container col-sm-2"></div>
    <div class="container col-sm-8 center-block"  id="main-section">
    <!-- weather api -->
    <iframe  id="weather-section" type="text/html" frameborder="0" height="250px" width="100%" src="http://forecast.io/embed/#lat=37.3217&lon=126.8309&name=Hanyang Univ.&units=si"> </iframe>
    <!-- API from.. https://darksky.net/ -->
  <!-- </div> -->
    <div id="map">
        <object id = "ericamap" class="center-block" type="image/svg+xml" data="erica_futsal_대지 1.svg" >현재 브라우져는 object를 지원하지 않습니다.</object>
    </div>
      <!-- futsal place click button modals -->
          <div id="futsal_modal" class="modal fade" role="dialog">
            <div class="modal-dialog">

              <div class="modal-content">

                <div class="modal-header">
                  <span class="close" data-dismiss="modal">&times;</span>
                  <h4 class="modal-title">위치</h4>
                </div>

                <div class="modal-body">
                  <div id="futsal_btns" class="text-center">
                    <a href = "../../Back_end/futsal_reserv_test_2.php?where=풋살장A"><button  id="futsal_A">풋살장A</button></a>
                    <a href = "../../Back_end/futsal_reserv_test_2.php?where=풋살장B"><button  id="futsal_B">풋살장B</button></a>
                 </div>
                </div>

              </div>

            </div>
          </div>

          <div id="soccer_modal" class="modal fade" role="dialog">
            <div class="modal-dialog">

              <div class="modal-content">

                <div class="modal-header">
                  <span class="close" data-dismiss="modal">&times;</span>
                  <h4 class="modal-title">위치</h4>
                </div>

                <div class="modal-body">
                  <a href = "../../Back_end/futsal_reserv_test_2.php?where=잔디구장"><button center-block id="soccer">잔디구장</button></a>
                </div>

              </div>

            </div>
          </div>


          <div id="stadium_modal" class="modal fade" role="dialog">
            <div class="modal-dialog">

              <div class="modal-content">

                <div class="modal-header">
                  <span class="close" data-dismiss="modal">&times;</span>
                  <h4 class="modal-title">위치</h4>
                </div>

                <div class="modal-body">
                  <a href = "../../Back_end/futsal_reserv_test_2.php?where=대운동장"><button center-block id="stadium">대운동장</button></a>
                </div>

              </div>

            </div>
          </div>
      <!-- end futsal place click button modals -->
    </div>
    <!-- <div class="container col-sm-2 hidden" id="right-side"> -->
      <!-- source=http://thinkgood.tistory.com/471 -->
      <!-- notice function -->

      <!-- </div> -->

  </div>




        <!-- <form action="../futsal_confirmation/reservation_lists.php">
        <button id="reserv_confirm">예약내역확인</button>
      </form> -->

  </body>
</html>
<?php
  function set_modify_val(){
    if(!isset($_POST['modify_val'])){
      $_SESSION['modify'] = false;
    }
    else{
        $_SESSION['modify'] = true;
        $id = $_SESSION['user_id'];
        $name = "web_project";
        $val = $_POST["modify_val"];
        $valarr = explode(" ", $val);
        $manage_ID = $valarr[0];
        $borrowdate = $valarr[1];
        $_SESSION['m_manage_id'] = $manage_ID;
        $_SESSION['m_borrowdate'] = $borrowdate;
    }
    $modify = $_SESSION['modify'];
  }
  function notice_view(){
    date_default_timezone_set('Asia/Seoul');
    $today = date("Y-m-d",time());
    try{
        $name = "web_project";
        $query = "select * from purpose_view where borrowdate = '$today' order by start_time";
        $db = new PDO("mysql:dbname=$name", "root", "root");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $rows = $db->query($query);
        return $rows;
    }
    catch(PDOException $ex) {
      echo "Sorry";
      echo $ex->getMessage();
    }
  }
?>

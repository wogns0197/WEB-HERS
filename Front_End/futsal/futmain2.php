<?php
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Futsal Field Rental</title>
    <link rel="stylesheet" href="../main2.css">
    <link rel="stylesheet" href="notice.css">
    <link rel="stylesheet" href="futmain.css?ver=11">
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
            <li><a href="#">About Us</a></li>
          </ul>
        </dd>

        <dt>USER</dt><hr color="black">
        <dd>
          <ul class="menus">
            <li><a href="#">Login</a></li>
            <li><a href="#">Logout</a></li>
            <li><a href="#">My Page</a></li>
          </ul>
        </dd>

        <dt>RENTAL</dt><hr color="black">
        <dd>
          <ul class="menus">
            <li><a href="#">Lecture Room</a></li>
            <li><a href="#">Futsal Field</a></li>
          </ul>
        </dd>
      </dl>

    </nav>

    <div class="user">
      <p>Signed In as (USER)</p>
    </div>

      <div class="right">

          <div id="map">
            <object id = "ericamap" type="image/svg+xml" data="erica_futsal_대지 1.svg" >현재 브라우져는 object를 지원하지 않습니다.</object>
          </div>

          <script type="text/javascript" src="futmain.js?ver=11"></script>

          <div id="futsal_modal" class="modal">
            <div class="modal-content">
              <span class="close">&times;</span>
              <button id="futsal_A">풋살장A</button>
              <button id="futsal_B">풋살장B</button>
            </div>

          </div>

          <div id="soccer_modal" class="modal">
            <div class="modal-content">
              <span class="close">&times;</span>
              <button id="soccer">잔디구장</button>

            </div>

          </div>


          <div id="stadium_modal" class="modal">
            <div class="modal-content">
              <span class="close">&times;</span>
              <button id="stadium">대운동장</button>

            </div>

          </div>


      </div>
      <div class="left">

        <iframe  type="text/html" frameborder="0" height="250px" width="100%" src="http://forecast.io/embed/#lat=37.3217&lon=126.8309&name=Hanyang Univ.&units=si"> </iframe>
        <!-- API from.. https://darksky.net/ -->
        <!-- source=http://thinkgood.tistory.com/471 -->

        <table cellSpacing=0 cellPadding=0 width="100%" class="momtong" >
          <?php
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
          date_default_timezone_set('Asia/Seoul');
          $today = date("Y-m-d",time());
          try{
              $name = "web_project";
              $query = "select * from purpose_view where borrowdate = '$today' order by start_time";
              $db = new PDO("mysql:dbname=$name", "root", "root");
              $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              $rows = $db->query($query);
      ?>
          <tbody>
              <td>
              <MARQUEE scrollAmount=4 direction=up>
                  <section>
                  <table cellSpacing=0 cellPadding=0 width="100%" border=0>
                  <tbody>
                          <tr>
                          <td height=60 id="gamenotice">&nbsp;--- Game Notice ---</td></tr>
                          <tr>
                          <?php
                              foreach($rows as $row){
                                  $start_a = explode(":",$row["start_time"]);
                                  $start_t = $start_a[0].":".$start_a[1];
                                  $end_a = explode(":", $row["end_time"]);
                                  $end_t = $end_a[0].":".$end_a[1];
                          ?>
                               <tr><td height=50>&nbsp;<?= $row["place"] ?>   <?= $row["home"] ?> <span class="vs">vs </span><?= $row["away"]?> <?= $start_t ?>~<?= $end_t ?><td></tr>
                           <?php
                         }?>

                          <td height=1>&nbsp;</td></tr>
                  </tbody>
                  </table>
                  </section>
              </MARQUEE>
              </td>
          <?php
          } catch(PDOException $ex) { ?>
              <p>Sorry</p>
              <p>detail : <?=$ex->getMessage() ?>)</p>
              <?php
          }
          ?>
        </tbody></table></section></MARQUEE></td></tbody></table>
        <form action="../futsal-comfirmation/reservation_lists.php">
        <button id="reserv_confirm">예약내역확인</button>
      </form>
      </div>







  </body>
</html>

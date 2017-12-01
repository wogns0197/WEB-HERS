<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Futsal Field Rental</title>
    <link rel="stylesheet" href="notice.css">
    <link rel="stylesheet" href="futmain.css?ver=10">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>

  <body>
    <header>
      <h1>HERS</h1>
      <hr/>
    </header>
    
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
        <form action="../../Back_End/reservation_lists.php">
        <button id="reserv_confirm">예약내역확인</button>
      </form>
      </div>
    


 



  </body>
</html>

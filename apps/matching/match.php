<?php
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>HERS Matching Request</title>
    <link rel="stylesheet" type="text/css" href="../Front_End/bootstrap-3.3.2-dist/css/bootstrap.css">
    <link rel="stylesheet" href="../prime.css">
    <link rel="stylesheet" href="../list/reservation_lists.css">


    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="../Front_End/bootstrap-3.3.2-dist/js/bootstrap.js"></script>
    <script type="text/javascript" src="../prime.js"></script>
    <script type="text/javascript" src="match.js"></script>

  </head>
  <body>
    <header>
  		<h1><a href="../main/main.php">HERS</a> Matching Request</h1>
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
            <li><a href="../list/reservation_lists.php">Futsal Confirmation</a></li>
            <li><a href="../futsal_main/futmain.php">Futsal Field Rental</a></li>
            <li><a href="../matching/match.php">Matching Request</a></li>
          </ul>
        </dd>
      </dl>

    </nav>
    <!-- end sidebar menu -->

    <div id="reserve_wrap">
      <h2>| Matching Message |</h2>
      <div class="container">
        <table class="reserve_lists" bor>
        <?php
            match_request_list();
            if(count($manage_ID)>0){
        ?>
        <tr>
            <th class="base">관리번호</th>
            <th class="base">대여일</th>
            <th class="base">시간</th>
            <th id="num lefttop" class="base">신청자</th>
            <th id="time" class="base">메세지</th>
            <th id="place" class="base">신청</th>
        </tr>
        <?php
            }
            else{
        ?>
            <p> 현재 존재하는 매칭 요구가 없습니다. </p>
        <?php
            }
            for($i = 0; $i < count($manage_ID); $i++){
            ?>
                <form action="../reservation/reservation_page.php" method="get">
                <tr>
                    <th  class="tab2 num"><?=$manage_ID[$i]?></th>
                    <th  class="tab2 day"><?=$borrowdate[$i]?></th>
                    <th><?=substr($start_time[$i],0,5)?> ~ <?=substr($end_time[$i],0,5)?></th>
                    <th><?=$user_id[$i]?></th>
                    <th class="messages" data-toggle="modal" data-target="#getMgModal"><input type="hidden" value = "<?=$chat[$i]?>" />
                      <input type="button" value="메세지보기"></button>
                    </th>
                    <input type="hidden" name="where" value="<?= $place[$i] ?>"/>
                    <input type="hidden" name="date" value="<?= $borrowdate[$i] ?>"/>
                    <input type="hidden" name="population" value="<?= $people[$i] ?>"/>
                    <input type="hidden" name="match" value="true"/>
                  <th><input type="submit" class="btn btn-default" value="정보 보기"></input></th>
                  </tr>
              </form>
            <?php
            }?>
        </table>
      </div>
    </div>

    <!-- Matching Modal -->

    <div class="modal fade" id="getMgModal" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
          <div class="modal-content">
              <div class="modal-header">
                  <span type="button" class="close" data-dismiss="modal">&times;</span>
                  <h4 class="modal-title">Matching Message</h4>
              </div>
              <div class="modal-body">
                  <br>
                  <fieldset>
                  <legend>Message:</legend>
                  <textarea class="form-control" rows="5" id="mgarea" maxlength="200" name="chat" readonly></textarea>
                  </fieldset>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
          </div>
      </div>
    </div>

<!-- Modal End-->

  </body>
</html>
<?php
function match_request_list(){
    $name = "web_project";
    global $manage_ID, $borrowdate, $user_id, $chat, $start_time, $end_time, $people, $place;
    try{
        $query = "select * from futsal_manage where matching=1 and datediff(borrowdate,date_format(curdate(),'%Y-%m-%d'))>=7 order by borrowdate, start_time";
        $db = new PDO("mysql:dbname=$name", "root","root");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $rows = $db->query($query);
        foreach($rows as $row){
            $manage_ID[] = $row['manage_ID'];
            $borrowdate[] = $row['borrowdate'];
            $user_id[] = $row['user_id'];
            $chat[] = $row['chat'];
            $start_time[] = $row['start_time'];
            $end_time[] = $row['end_time'];
            $people[] = $row['people'];
            $place[] = $row['place'];
        }
    }
    catch(PDOException $ex){
        echo "detail :".$ex->getMessage();
    }
}
?>

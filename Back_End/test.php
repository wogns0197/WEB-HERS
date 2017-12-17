<?php
session_start();
date_default_timezone_set('Asia/Seoul');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Hanyang Erica Rental Site</title>
    <link rel="stylesheet" type="text/css" href="../Front_End/bootstrap-3.3.2-dist/css/bootstrap.css">
    <link rel="stylesheet" href="../Front_End/calendar/css/appliscation.css" />
    <link rel="stylesheet" href="../Front_End/calendar/css/home.css" />
    <link rel="stylesheet" href="../Front_End/main2.css">
    <link rel="stylesheet" href="futsal_reserv_test_2.css" />


    <!-- <script src="http://ajax.googleapis.com/ajax/libs/prototype/1.7.3.0/prototype.js" type="text/javascript"></script> -->
    <script src="../Front_End/calendar/js/vendor/jquery.js"></script>
    <script src="../Front_End/calendar/js/vendor/moment.js"></script>
    <script src="../Front_End/bootstrap-3.3.2-dist/js/bootstrap.js"></script>
    <script src="futsal_reserv1.js" type="text/javascript"></script>
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
            <?php
            $_SESSION['place'] = $_GET['where'];
            $modify = $_SESSION['modify'];
            $id = $_SESSION['user_id'];
            $name = "web_project";
            if($modify){//예약 수정 상태일 경우 예약 수정을 진행할때 예전 예약 내용을 default값으로 넣어주기위한 값들을 받아온다
                set_modify_val();
            }
            if(!isset($_SESSION['user_id'])){ //로그인 확인
              echo "<script>alert('로그인이 필요합니다!');location.href='login_function/login.php';</script>";
            }

            set_place_date();//장소와 날짜 초기설정
            ?>


            <h1 class="text-center"><a href="../Front_End/main/main.php">HERS</a></h1>


    </header>

    <!-- sidebar menu -->
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
            <li><a href="../Front_End/main/main.php">Home</a></li>
            <li><a href="../about/about.html">About Us</a></li>
          </ul>
        </dd>

        <dt>USER</dt><hr color="black">
        <dd>
          <ul class="menus">
            <?php
            if(!isset($_SESSION['user_id'])){
             ?>
            <li><a href="login_function/login.php">Login</a></li>
            <?php
            }

            else{
              ?>
            <li>Signed In as (<?= $_SESSION['user_id']?>)</li>

            <li><a href="login_function/logout.php">Logout</a></li>
            <li><a href="../Front_End/mypage/mypage.php">My Page</a></li>
            <?php
             }
            ?>
          </ul>
        </dd>

        <dt>RENTAL</dt><hr color="black">
        <dd>
          <ul class="menus">
            <li><a href="../Front_End/futsal_confirmation/reservation_lists.php">Futsal Confirmation</a></li>
            <li><a href="../Front_End/futsal/futmain2.php">Futsal Field Rental</a></li>
          </ul>
        </dd>
      </dl>

    </nav>
    <!-- end sidebar menu -->

    <form action="futsal_reserv_confirmation.php" method="post">
    <div class="container">
      <div class="panel panel-defaul col-12">
        
        <div class="panel-body col-5">
            <?php
                $today = date("Y-m-d",time());
                ?>
                <!-- 캘린더 자바스크립트에서 오늘날짜 가져오기 위한 부분. -->
                <input type="text" id="checking_today" class="hidden" name="place" value="<?= $today ?>">
                <?php

            ?>
                <br><br>

                <div class="daterange daterange--single"></div>

                <!-- 캘린더 구현 div/ source from "https://github.com/Baremetrics/calendar" -->

                <br>
        </div>
        <!-- 캘린더 선택후 캘린더에서 선택한 날짜로 선택날짜 이동할 때 php에서 장소 파라미터 주기위해 만든 input 태그임 브라우저에서는 안보이게 css처리함 -->
        <input type="text" id="checking_place" class="hidden" name="place" value="<?= $place ?>">


        <!-- 시간 테이블 작성-->
        <table class = "table table-hover text-center">
            <thead>
            <tr>
                <th class="text-center tb1">경기장(수용인원)</th>
                <th class="text-center">희망 인원</th>
                <th class="text-center">선택 날짜</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class="text-center">
                    <?= $place ?> (<?= $admit_min ?> ~ <?= $admit_max ?>)

                </td>
                <td class="text-center">
                    <select name="population">
                        <?php
                            for($i=$admit_min; $i<=$admit_max; $i++){
                                if($i == $m_population){ // 예약 수정상태일 때 전의 예약했던 인원을 selected상태로 default
                        ?>
                                <option class = "spopulation" selected = 'selected' value=<?=$i?>><?= $i ?></option>
                        <?php
                                }
                                else{
                        ?>
                                <option class = "spopulation" value=<?=$i?>><?= $i ?></option>
                        <?php
                                }
                            }
                        ?>
                    </select>
                </td>
                <td class="text-center">
                    <input class="hidden" type="text" name="selected_date" value="<?= $date ?>"/>
                    <?= $date ?>
                </td>
            </tr>
            <tr>
                <th class="text-center">시간</th>
                <th class="text-center">예약 현황</th>
                <th class="text-center">예약 시간 선택</th>
            </tr>
            <?php //예약현황 표시
            make_timetable();
        ?>
        </tbody>
        </table>
            <?php
            if($_GET['match']!=1){
            ?>
                <p class="text-center"><button id = "button2">
                <?php
                if($_SESSION['modify']){
                ?>
                    수정
                <?php
                }
                else{
                ?>
                    예약
                <?php
                }?>
                    하기
                </button></p>
                <?php
                if($modify==0){
                    $find = true;
                ?>
                <?php
                }
                $today_date_time = new DateTime(date("Y-m-d", time()));
                $borrow_date_time = new DateTime($date);
                $day_difference = date_diff($today_date_time, $borrow_date_time);
                if($day_difference->days >= 14){
                ?>


                <p class="text-center">
                <span data-toggle="modal" id = "button3" class="btn sangdae" data-target="#getmatchModal" >
                상대팀 구하기
                </span></p>


                <?php
                }
            }
            ?>
        </div>
      </div>
    </div>
    </form>

    <!-- Info Show Modal -->
    <form action="matching_info.php" method="post">
        <div class="modal fade" id="matchingModal" role="dialog">
            <div class="modal-dialog">

            <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <span type="button" class="close" data-dismiss="modal">&times;</span>
                        <h4 class="modal-title">Matching</h4>
                    </div>
                    <div class="modal-body">
                        <fieldset>
                            <legend>Detail</legend>
                            <input type="hidden" name="date" value=<?=$date?>/>
                            <input type="hidden" id = "send_time" name = "time" value="0"/>
                            <textarea class="form-control" rows="5" id="detail" readonly><?=$message?></textarea>
                        </fieldset>
                        <br>
                        <fieldset>
                        <legend>Send Message:</legend>
                        <textarea class="form-control" rows="5" id="message" maxlength="150" placeholder="Type Your Message..." name="chat" required></textarea>
                        </fieldset>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-default">Submit</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
  <!-- Modal End-->

  <!-- Matching Modal -->
  <form action="find_match.php" method="post">
      <div class="modal fade" id="getmatchModal" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <span type="button" class="close" data-dismiss="modal">&times;</span>
                    <h4 class="modal-title">Matching</h4>
                </div>
                <div class="modal-body">
                    <br>
                    <fieldset>
                    <legend>Notice Message:</legend>
                    <textarea class="form-control" rows="5" id="message" maxlength="150" placeholder="OOO팀과 함께 경기하실 분들을 모집합니다. 연락주세요." name="chat" required></textarea>
                    </fieldset>
                </div>
                <input type="hidden" name="date" value=<?=$date?>/>
                <input type="hidden" id = "send_time2" name="time" value=0/>
                <input type="hidden" name="place" value=<?=$place?>/>
                <input type="hidden" id = "spopulation" name="population" value=0/>
                <div class="modal-footer">
                    <button id = "button1" type="submit" class="btn btn-default">Submit</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
      </div>
  </form>
<!-- Modal End-->


    <script src="../Front_End/calendar/js/Calendar.js"></script>
    <script src="../Front_End/calendar/js/app.js"></script>
  </body>
</html>
<?php
    function set_modify_val(){
        global $m_manage_ID, $m_borrowdate, $m_population, $m_start, $m_notice, $m_place, $name;
        $m_manage_ID = $_SESSION['m_manage_id'];
        $m_borrowdate = $_SESSION['m_borrowdate'];
        try{
            $query1 = "select * from futsal_manage where manage_ID=$m_manage_ID and borrowdate='$m_borrowdate'";
            $db = new PDO("mysql:dbname=$name", "root","root");
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $rows = $db->query($query1);
            foreach($rows as $row){
                $m_population = $row['people'];
                $m_start = $row['start_time'];
                $m_notice = $row['notice'];
                $m_place = $row['place'];
            }
        }
        catch(PDOException $ex){
            echo "detail :".$ex->getMessage();
        }
    }
    function set_place_date(){
        global $date, $place, $admit_min, $admit_max, $modify;
        if(isset($_GET["date"])){ //달력에서 선택한 날짜를 가져온다
            $date = $_GET["date"];
        }
        else if($modify){ //예약 수정 상태일때 예전 예약 날짜를 가져온다
            $date = $_SESSION["m_borrowdate"];
        }
        else{ //처음 default값은 오늘 날짜를 가져온다
            $date = date("Y-m-d", time());
        }
        $place = $_GET["where"];
        if( $place == "풋살장A"){
            $admit_min = 6;
            $admit_max = 10;
        }
        if( $place == "풋살장B"){
            $admit_min = 6;
            $admit_max = 10;
        }
        if( $place == "잔디구장"){
            $admit_min = 10;
            $admit_max = 18;
        }
        if( $place == "대운동장"){
            $admit_min = 10;
            $admit_max = 22;
        }
    }
    function make_timetable(){//예약 현황에 따른 타임 테이블을 만들어준다
        global $date, $place, $name, $modify, $m_start, $m_place, $m_borrowdate, $message;
        $start_time = 12;
        $n = 5;
        $borrow_place = $_POST["place"];
        for($i = 0 ; $i < $n; $i++){
            $end_time = $start_time+2
        ?>
            <tr>
                <td class="text-center">
                    <?= $start_time ?>:00 ~ <?= $end_time?>:00
                </td>
        <?php
            try{
                $query = "select * from futsal_manage where borrowdate = '$date' && place ='$place'";
                $db = new PDO("mysql:dbname=$name", "root", "root");
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $rows = $db->query($query);
                $flag = true;
                if($modify == 1 && $start_time == $m_start && $place == $m_place && $date == $m_borrowdate){//예약 수정 중일때 예약 수정중인 시간은 예약 수정중 상태로
                    $timearr = array($start_time,$end_time);
                    $time = implode(" ",$timearr);
                ?>
                    <td class="text-center"> 예약 수정중 </td>
                    <td>
                        <input class="time" type="radio" name="selected_time" value="<?=$time?>" selected = 'selected'/>
                    </td>
                <?php
                }
                else{
                    foreach($rows as $row){//db에서 해당 시간이 예약되어있는지 체크
                        $start_a = explode(":",$row["start_time"]);
                        $start_t = $start_a[0];
                        $end_a = explode(":", $row["end_time"]);
                        $end_t = $end_a[0];
                    ?>
                    <?php
                        if($start_time==$start_t){//그 시간에 예약이 차있을 경우
                            if($row['matching']==1){
                                $message = find_message($start_t);
                                ?>
                                <td class="text-center"> 상대팀 구하는 중 </td>
                                <td class="text-center"><span id = "chat_info<?= $i ?>" class="show_match_info"  data-toggle="modal" data-target="#matchingModal">정보 보기</span></td>
                                <input type="hidden" id = "time_info<?= $i ?>" value="<?= $start_t ?>"/>
                                <?php
                                $flag = false;
                                break;
                            }
                            else{
                                ?>
                                <td class="text-center"> 예약 완료 </td>
                                <td class="text-center">X</td>
                                <?php
                                $flag = false;
                                break;
                            }
                        }
                    }
                    if($flag){//그 시간에 예약이 차있지 않았을 경우
                        $timearr = array($start_time,$end_time);
                        $time = implode(" ",$timearr);
                        ?>
                    <td class="text-center">
                        선택 가능
                    </td>
                    <td class="text-center">
                        <input class="time" type="radio" name="selected_time" value="<?=$time?>"/>
                    </td>
                     <?php
                    }
                    ?>
                </tr>
            <?php
                }
            }
            catch(PDOException $ex){
                echo "Sorry";
                echo "detail :".$ex->getMessage();
            }
        $start_time += 2;
        }
    }
    function find_message($time){
        global $date, $name, $place;
        $stime = $time.":00:00";
        $query = "select chat from futsal_manage where matching=1 and borrowdate='$date' and start_time='$stime' and place='$place'";
        $db = new PDO("mysql:dbname=$name", "root", "root");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $rows = $db->query($query);
        foreach($rows as $row){
            $chat  = $row['chat'];
        }
        return $chat;
    }
?>

<?php
session_start();
date_default_timezone_set('Asia/Seoul'); 
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Hanyang Erica Rental Site</title>
    <!-- <link rel="stylesheet" href="../Front_end/futsal_reserve_page/futsal_reserv.css?ver=3"> -->
    <!-- <link rel="stylesheet" href="../Front_end/main/main.css"> -->
    <!-- <link rel="stylesheet" href="../Front_end/futsal_reserve_page/futsal_reserv_test.css"> -->
    <link rel="stylesheet" type="text/css" href="../Front_End/bootstrap-3.3.2-dist/css/bootstrap.css">
    <!-- <script src="main.js" type="text/javascript"></script> -->
    <link rel="stylesheet" href="../Front_End/calendar/css/application.css" />
    <link rel="stylesheet" href="../Front_End/calendar/css/home.css" />
    <link rel="stylesheet" href="futsal_reserv_test_2.css" />

    <script src="http://ajax.googleapis.com/ajax/libs/prototype/1.7.3.0/prototype.js" type="text/javascript"></script>
    <script src="../Front_End/calendar/js/vendor/jquery.js"></script>
    <script src="../Front_End/calendar/js/vendor/moment.js"></script>
    <script src="../Front_End/bootstrap-3.3.2-dist/js/bootstrap.js"></script>
    <script src="timeexception.js" type="text/javascript"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                ?>
                <p><a href ='login_function/login.php'>Login</a></p>
            <?php
            }
            else{
                $user_id = $_SESSION['user_id'];
            ?>
                <p><?= $user_id ?></p>
                <p ><a href = 'login_function/logout.php'>Logout</a></p>
            <?php
            }
            set_place_date();//장소와 날짜 초기설정
            ?>
        
        <!-- <div class="page-header"> -->
            <h1 class="text-center">HERS</h1>
        <!-- </div> -->
    </header>

    <nav class="navbar-default">
        <div class="container">
          <ul class="nav nav-pills nav-justified">
            <li><a href="../Front_End/main/main.html">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>
        </div>
    </nav>

    <form action="futsal_reserv_confirmation.php" method="post">
    <div class="container">
      <div class="panel panel-defaul">
        <div class="panel-heading">
        </div>
        <div class="panel-body">
            <?php 
                $today = date("Y-m-d",time());
                ?>
                <!-- 캘린더 자바스크립트에서 오늘날짜 가져오기 위한 부분. -->
                <input type="text" id="checking_today" class="hidden" name="place" value="<?= $today ?>">
                <?php

            ?>
                <br><br>
                
                <div class="daterange daterange--single">예약 희망 날짜:</div>               

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
                                <option selected = 'selected'><?= $i ?></option>
                        <?php
                                }
                                else{
                        ?>
                                <option><?= $i ?></option>
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
            </p>
        </div>
      </div>
    </div>
    </form>
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
        // $admit_min = 0;
        // $admit_max = 0;
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
        global $date, $place, $name, $modify, $m_start, $m_place, $m_borrowdate;
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
                            ?>
                            <td class="text-center"> 예약 완료 </td>
                            <td class="text-center">X</td>
                                <?php 
                                    $flag = false;
                                    break;
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
?>
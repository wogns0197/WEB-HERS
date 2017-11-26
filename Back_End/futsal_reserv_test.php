<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Hanyang Erica Rental Site</title>
    <link rel="stylesheet" href="../Front_end/futsal_reserve_page/futsal_reserv.css?ver=3">
    <link rel="stylesheet" href="../Front_end/main/main.css">
    <link rel="stylesheet" href="../Front_end/futsal_reserve_page/futsal_reserv_test.css">
    <!-- <script src="main.js" type="text/javascript"></script> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body>
<!--     <video preload="auto" autoplay="true" loop="loop" muted="muted" volume="0">
      <source src="../main/video/Keyboard.mp4" type="video/mp4">
    </video> -->
    <header id="home">
      <h1><a href="#home">HERS</a></h1>
    </header>
    <nav>
      <ul>
        <li><a href="../main/main.html">Home</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#lecture">Lecture</a></li>
        <li><a href="#futsal">Futsal</a></li>
        <li><a href="#contact">Contact</a></li>
      </ul>
    </nav>
    <div class="reserve_container">
      <div class="timetable">
        <form action="futsal_reserv_test.php?where=<?= $_GET["where"] ?>" method="post">
        <div class="reserv_date">
        <?php //선택 날짜 받아오기
            date_default_timezone_set('Asia/Seoul');
            $yesterday = date("Y-m-d",time());
            $maxday = date("Y-m-d",strtotime("+2 months",time()));
            $today = $_POST["selected_date"];
            if( !isset($_POST["selected_date"])){
            $today = date("Y-m-d",time());
            }
        ?>
            <span>예약 희망 날짜:</span>
            <input type="date" name="selected_date" min="<?= $yesterday ?>" max="<?= $maxday ?>" required>
        </div>
        <div class="reserve_button">
            <button type="submit">예약 현황 조회</button>
        </div>
        <?php //장소받아오고 수용인원 체크
            $place = $_GET["where"];
            $admit_min = 0;
            $admit_max = 0;
            if( $place == "풋살장"){
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
        ?>
        <!-- 시간 테이블 작성-->
        <table class="times" >
            <tr id="topcell">
                <th>경기장(수용인원)</th>
                <th>희망 인원</th>
                <th>선택 날짜</th>
            </tr>
            <tr>
                <td>
                   <!--  <input id = "place_input" type="text" name="place" value= "<?= $place ?>" readonly> (<?= $admit_min ?> ~ <?= $admit_max ?>) -->
                    <?= $_GET["where"] ?> (<?= $admit_min ?> ~ <?= $admit_max ?>)

                </td>
                <td>
                    <select name="population">
                        <?php
                            for($i=$admit_min; $i<=$admit_max; $i++){
                        ?>
                                <option><?= $i ?></option>
                        <?php
                            } 
                        ?>
                    </select>
                </td>
                <td>
                    <?=$today?>
                </td>
            </tr>
            <tr>
        </form>
                <th>시간</th>
                <th>예약 현황</th>
                <th>예약 시간 선택</th>
            </tr>
            <?php //예약현황 표시
            $start_time = 12;
            $n = 5;
            if(isset($_POST["selected_date"])){
                $date = $_POST["selected_date"];
            }
            else{
                $date = date("Y-m-d", time());
            }
            $name = "web_project";
            $borrow_place = $_POST["place"];
            for($i = 0 ; $i < $n; $i++){
                $end_time = $start_time+2
            ?>
                <tr>
                    <td>
                        <?= $start_time ?>:00 ~ <?= $end_time?>:00
                    </td>
            <?php
                try{
                    $name = "web_project";
                    $query = "select * from futsal_manage where borrowdate = '$date' && place ='$place'";
                    $db = new PDO("mysql:dbname=$name", "root", "root");
                    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $rows = $db->query($query);
                    $flag = true;
                    foreach($rows as $row){
                        $start_a = explode(":",$row["start_time"]);
                        $start_t = $start_a[0];
                        $end_a = explode(":", $row["end_time"]);
                        $end_t = $end_a[0];
                        if($start_time==$start_t && $end_time==$end_t){
            ?>
                    <td class="status"> 예약 완료 </td>
                    <td>X</td>
                        <?php 
                            $flag = false;
                            break;
                        }
                    }
                    if($flag){
                        $timearr = array($start_time,$end_time);
                        ?>
                    <td class="status"> 
                        선택 가능 
                    </td>
                    <td class="time_select">
                        <input type="radio" name="selected_time" value=<?=$timearr?> />
                    </td>
                    <?php 
                    } 
                    ?>
                </tr>
            <?php
                }
                catch(PDOException $ex){
                    echo "Sorry";
                    echo "detail :".$ex->getMessage();
                }
            $start_time += 2;
            }
            ?>
        </table>
            <button id="reserve_confirm">예약하기</button>
        </div>
      </div>
    </div>
  </body>
</html>

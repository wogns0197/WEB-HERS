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
    <script src="../Front_End/bootstrap-3.3.2-dist/js/bootstrap.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body>
    <header>
        <div class="page-header">
                <h1 class="text-center">HERS</h1>
        </div>
    </header>

    <nav class="navbar-default">
        <div class="container">

          <ul class="nav nav-pills nav-justified">
            <li><a href="../main/main.html">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>
        </div>
    </nav>



    <div class="container">
      <div class="panel panel-defaul">
        <form action="futsal_reserv_test.php?where=<?= $_GET["where"] ?>" method="post">

        <div class="panel-heading">
            <p class="text-left">예약진행</p>
        </div>
        
        <div class="panel-body">
            <?php //선택 날짜 받아오기
                date_default_timezone_set('Asia/Seoul');
                $yesterday = date("Y-m-d",time());
                $maxday = date("Y-m-d",strtotime("+2 months",time()));
                $today = $_POST["selected_date"];
                if( !isset($_POST["selected_date"])){
                $today = date("Y-m-d",time());
                }
            ?>
            <p class="text-right">
                <span>예약 희망 날짜:</span>
                <input type="date" name="selected_date" min="<?= $yesterday ?>" max="<?= $maxday ?>" required>
            
                <button type="submit">예약 현황 조회</button>
            </p>
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

        <table class = "table table-hover text-center">
            <thead class="text-center">
            <tr>
                <th class="text-center">경기장(수용인원)</th>
                <th class="text-center">희망 인원</th>
                <th class="text-center">선택 날짜</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>
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
                <th class="text-center">시간</th>
                <th class="text-center">예약 현황</th>
                <th class="text-center">예약 시간 선택</th>
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
                    <td> 예약 완료 </td>
                    <td>X</td>
                        <?php 
                            $flag = false;
                            break;
                        }
                    }
                    if($flag){
                        $timearr = array($start_time,$end_time);
                        ?>
                    <td> 
                        선택 가능 
                    </td>
                    <td>
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
        </tbody>
        </table>
            <p class="text-center"><button>예약하기</button></p>
        </div>
      </div>
    </div>
  </body>
</html>

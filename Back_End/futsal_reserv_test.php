<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Hanyang Erica Rental Site</title>
    <link rel="stylesheet" href="../Front_end/futsal_reserve_page/futsal_reserv.css">
    <link rel="stylesheet" href="../Front_end/main/main.css">


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
        <form action="futsal_reserv_test.php" method="post">
          <div class="reserv_date">
          <?php
            // $yesterday = date("Y-m-d",strtotime("-1 day",time()));
            $yesterday = date("Y-m-d",time());
            $maxday = date("Y-m-d",strtotime("+2 months",time()));
          ?>
          <span>선택날짜: <?= $_POST["selected_date"] ?></span>
          <span>예약날짜:</span>
          <input type="date" name="selected_date" min="<?= $yesterday ?>" max="<?= $maxday ?>">
          </div>

          <div class="reserve_button">
            <button type="submit">조회하기</button>
          </div>

        

 



      
        <?php
        $place = $_POST["place"];
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
        <table class="times">

        <tr><th>경기장</th><th>수용인원</th></tr>
        <tr><td><input id = "place_input" type="text" name="place" value= "<?= $place ?>" readonly></td><td><?= $admit_min ?> ~ <?= $admit_max ?></td></tr>
        <tr><th>시간</th><th>상태</th></tr>
    </form>
        <?php
          $start_time = 12;
          $n = 5;
          $date = $_POST["selected_date"];
          $name = "web_project";
          for($i = 0 ; $i < $n; $i++){
              $end_time = $start_time+2?>
            <tr><td><?= $start_time ?> ~ <?= $end_time?></td>
           <?php
            try{
                $name = "web_project";
                $query = "select * from futsal_manage where borrowdate = '$date'";
                $db = new PDO("mysql:dbname=$name", "root", "root");
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $rows = $db->query($query);
                $flag = true;
                foreach($rows as $row){
                    $start_a = explode(":",$row["start_time"]);
                    $start_t = $start_a[0];
                    $end_a = explode(":", $row["end_time"]);
                    $end_t = $end_a[0];
                    if($start_time==$start_t && $end_time==$end_t){?>
                        <td class="status"> 예약 완료 </td>
                    <?php $flag = false;
                        break;
                    }
                }
                if($flag){?>
                    <td class="status"> 예약 가능 </td>
                <?php } ?>
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
      </div>
    </div>
    </div>
  </body>
</html>

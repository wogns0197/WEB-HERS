<?php
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>HERS My Page</title>
    <link rel="stylesheet" href="../main2.css">
    <link rel="stylesheet" href="../futsal_reserve_page/reservation_lists.css">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript"src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script type="text/javascript"src="../main2.js"></script>
  </head>
  <body>
    <header>
  		<h1><a href="../main/main.php">HERS</a> MY PAGE</h1>
  		<hr/>
  	</header>

  	<a id="menuicon"><svg class="menusvg" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 100 125" x="0px" y="0px"><title>54 all</title><path d="M74.46,49H25.54a1,1,0,0,0,0,2H74.46a1,1,0,0,0,0-2Z"/><path d="M74.46,28.73H25.54a1,1,0,0,0,0,2H74.46a1,1,0,0,0,0-2Z"/><path d="M74.46,69.27H25.54a1,1,0,1,0,0,2H74.46a1,1,0,1,0,0-2Z"/>
  	</svg></a>

  	<a id="xicon"><svg class="menusvg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 100 125" version="1.1" x="0px" y="0px"><title>Bold Cross</title><desc>Created with Sketch.</desc><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g fill="#000000"><path d="M48,48 L48,18.8873016 C48,17.7827321 48.8954305,16.8873016 50,16.8873016 C51.1045695,16.8873016 52,17.7827321 52,18.8873016 L52,48 L81.1126984,48 C82.2172679,48 83.1126984,48.8954305 83.1126984,50 C83.1126984,51.1045695 82.2172679,52 81.1126984,52 L52,52 L52,81.1126984 C52,82.2172679 51.1045695,83.1126984 50,83.1126984 C48.8954305,83.1126984 48,82.2172679 48,81.1126984 L48,52 L18.8873016,52 C17.7827321,52 16.8873016,51.1045695 16.8873016,50 C16.8873016,48.8954305 17.7827321,48 18.8873016,48 L48,48 L48,48 Z" transform="translate(50.000000, 50.000000) rotate(45.000000) translate(-50.000000, -50.000000) "/></g></g>
  	</svg></a>

    <nav id="menubar">
      <dl>
        <dt id="title">HERS</dt>

        <dt>MAIN</dt><hr color="black">
        <dd>
          <ul class="menus">
            <li><a href="../main/main.php">Home</a></li>
            <li><a href="../about/about.html">About Us</a></li>
          </ul>
        </dd>

        <dt>USER</dt><hr color="black">
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
            <?php
             }
            ?>
          </ul>
        </dd>

        <dt>RENTAL</dt><hr color="black">
        <dd>
          <ul class="menus">
            <li><a href="../futsal_confirmation/reservation_lists.php">Futsal Confirmation</a></li>
            <li><a href="../futsal/futmain2.php">Futsal Field Rental</a></li>
          </ul>
        </dd>
      </dl>

    </nav>
    <!-- end sidebar menu -->

<form action="../../Back_End/futsal_reserv_confirmation.php" method="post" id="confirm"></form>
<form action="delete_notice_chatting.php" method="post" id="delete"></form>
    <div id="reserve_wrap">
      <h2>| Matching Message |</h2>
      <div class="container">
        <table class="reserve_lists" bor>
        <?php
            get_list();                    
            if(count($manage_ID)>0){
        ?>
        <tr>
            <th class="base">관리번호</th>
            <th class="base">대여일</th>
            <th id="num lefttop" class="base">발송자</th>
            <th id="day" class="base">연락처</th>
            <th id="time" class="base">메세지</th>
            <th id="place" class="base">예약</th>
        </tr>
        <?php
            }
            else{
        ?>
            <p> 메세지가 없습니다. </p>
        <?php
            }
            $check_ID = 0;
            for($i = 0; $i < $size; $i++){
            ?>
                <tr>
                <?php
                    if($check_ID == $manage_ID[$i]){
                ?>
                    <th> </th>
                    <th> </th>
                <?php
                    }
                    else{
                ?>
                    <th id="num" class="tab2"><?=$manage_ID[$i]?></th>
                    <th id="day" class="tab2"><?=$borrowdate[$i]?></th>
                <?php      
                    }
                ?>
                <th><?=$send_id[$i]?></th>
                <?php
                    if($send_id[$i]=='HERS'){
                        $phone_num[$i] = 'HERS-Administration';
                    }
                ?>
                <th><?=$phone_num[$i]?></th>
                <th><?=$chat[$i]?></th>
                <?php
                  $valarr = array($manage_ID[$i], $borrowdate[$i]);
                  $val = implode(" ",$valarr);
                  $delete_val = $manage_ID[$i];                  
                if($send_id[$i]=='HERS'){
                ?>
                    <th id="but"><button class="buttab2" id="but2" name="delete_val" value=<?= $delete_val ?> type="submit" form = "delete">확인</button></th>                
                <?php
                    }
                else{
                ?>
                    <th id="but"><button class="buttab2" id="but1" name="confirm_val" value="<?= $val ?>" type="submit" form = "confirm">예약 하기</button></th>
                  </tr>
                }
          <?php
            }
          ?>
        <?php
            $check_ID = $manage_ID[$i];                    
        }
        ?>
        </table>
      </div>
    </div>
  </body>
</html>
<?php
function get_list(){
  $id = $_SESSION['user_id'];
  $name = "web_project";
  try{
    $query = "select * from matching_manage where receive_id = '$id' and datediff(borrowdate,date_format(curdate(),'%Y-%m-%d'))>=7 order by manage_ID";
    $db = new PDO("mysql:dbname=$name", "root","root");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $rows = $db->query($query);
    global $size, $manage_ID, $send_id, $chat, $borrowdate, $phone_num;
    $size=0;
    foreach($rows as $row){
      $size++;
      $send_id[] = $row['send_id'];
      $chat[] = $row['chat'];
      $manage_ID[] = $row["manage_ID"];
      $borrowdate[] = $row["borrowdate"];
      try{
        $s_id = $row['send_id'];
        $send_user_query = "select * from user where user_id = '$s_id'";
        $sends = $db->query($send_user_query);
        foreach($sends as $send){
          $phone_num[] = $send['phone_num'];
        }
      }
      catch(PDOException $ex){
        echo "detail :".$ex->getMessage();
      }
    }
  }
  catch(PDOException $ex){
    echo "detail :".$ex->getMessage();
  }
}
?>

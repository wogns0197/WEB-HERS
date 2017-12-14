<?php
session_start();
delete_over_date_data();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Hanyang Erica Rental Site</title>
    <link rel="stylesheet" type="text/css" href="backgroundTransition.css" />
    <link rel="stylesheet" href="main.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script type="text/javascript"src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script type="text/javascript"src="main.js"></script>
  </head>
  <body>
    <div class="backgroundTransition"></div>


     <header id="home">
      <h1><a href="main.html">HERS</a></h1>
    </header>

    <!-- sidebar menu -->
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
            <li><a href="main.php">Home</a></li>
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
            <li><a href="../mypage/mypage.php">My Page</a></li>
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




    <div class="buttons">
      <a href="../futsal_confirmation/reservation_lists.php"><button id="lecture">Confirmation</button></a>
      <a href = "../futsal/futmain2.php"><button id="futsal" href="#">Rental Go</button></a>
    </div>

    <article class="main">
      <p><span class="mainp1">Quickest Rental.</span><br>
      <span class="mainp2">Time Saving. Easiest Way Ever.</span></p>
    </article>

    <footer>
      <p>HERS Kwonjaehoon Parkjaehoon Seogeurim Choijaeyoung</p>
    </footer>

  </body>



  <!-- http://www.blueb.co.kr/?c=1/14&cat=%EB%B0%B0%EA%B2%BD%ED%9A%A8%EA%B3%BC&uid=4089 -->
  <script type="text/javascript" src="backgroundTransition.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
  	  $('.backgroundTransition').backgroundTransition({
  		  backgrounds:[

  			  { src: 'mainimg/one.jpg' },
  			  { src: 'mainimg/two.jpg' },
          { src: 'mainimg/three.jpg'},
          { src: 'mainimg/four.jpg'}

  		  ],
  		  transitionDelay: 5,
  		  animationSpeed: 500
  	  });
    });
  </script>
</html>
<?php
  function delete_over_date_data(){
    $name = "web_project";
    $db = new PDO("mysql:dbname=$name", "root", "root");    
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query_count = "select * from futsal_manage where matching=1 and datediff(borrowdate,date_format(curdate(),'%Y-%m-%d'))<7";
    try{
      $rows = $db->query($query_count);
      $query1 = "delete from futsal_manage where matching=1 and datediff(borrowdate,date_format(curdate(),'%Y-%m-%d'))<7";
      $query2 = "delete from matching_manage where datediff(borrowdate,date_format(curdate(),'%Y-%m-%d'))<7";
      try{
        $db->query($query1);
        $db->query($query2);
      }
      catch(PDOException $ex){
        echo "detail :".$ex->getMessage();
      }
      foreach($rows as $row){
        $manage_ID = $row['manage_ID'];
        $user_id = $row['user_id'];
        $borrowdate = $row['borrowdate'];
        $query_send = "insert into matching_manage values('$user_id','예약을 진행하지않아 예약이 취소되었습니다','HERS',$manage_ID,'$borrowdate')";
        $db->query($query_send);
      }
    }
    catch(PDOException $ex){
      echo "detail :".$ex->getMessage();
    }
  }
  $query = "select * from futsal_manage where user_id = '$id' and borrowdate >= date_format(curdate(), '%Y-%m-%d') order by borrowdate";
  $db = new PDO("mysql:dbname=$name", "root","root");
?>

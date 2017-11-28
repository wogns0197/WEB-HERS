<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Hanyang Erica Rental Site</title>
    <link rel="stylesheet" href="../Front_end/futsal_reserve_page/futsal_reserv.css">
    <link rel="stylesheet" href="../Front_end/main/main.css">
    <link rel="stylesheet" href="../Front_end/futsal_reserv_confirmation.css?ver=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body>

    <header id="home">
      <h1><a href="#home">HERS</a></h1>
    </header>
    <nav>
      <ul>
        <li><a href="../Front_End/main/main.html">Home</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#contact">Contact</a></li>
      </ul>
    </nav>


    <!-- 이전 페이지에서 예약 선택 정보 가져옴  -->
    <?php
    print_r($_POST);
    try{
      $name = "web_project";
      // $query = "insert into futsal_manage values ("$id",
      $db = new PDO("mysql:dbname=$name", "root","root");
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $ex){
      echo "Sorry";
      echo "detail :".$ex->getMessage();
    }
    ?>
    
    <div id="confirm_wrap">
      <h2>예약이 완료되었습니다.</h2>

      <div class="container">
        <a href="#"><button>예약확인 GO</button></a>
      </div>
      


    <!-- 이부분에다가동db 연동 -->




    </div>
  </body>
</html>

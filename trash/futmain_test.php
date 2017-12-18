<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Futsal Field Rental</title>
    <link rel="stylesheet" href="../Front_end/futsal/futmain.css">
    <link rel="stylesheet" href="../Front_end/futsal/notice.css">
    <link rel="stylesheet" href="futsal.css">
  </head>
  <body>
    <header>
      <h1>RENTAL</h1><hr>
    </header>

      <div class="right">
<!--         <form action="futsal_reserv_test.php?where=<?= $_GET["place"] ?>" method="post">
          <button name="place" value="풋살장">FUTSAL</button>
          <br/>
          <button name="place" value="잔디구장">SOCCER</button>
          <br/>
          <button name="place" value="대운동장">STADIUM</button>
        </form> -->


          <a href="futsal_reserv_test.php?where=풋살장"><button name="place" value="풋살장">FUTSAL</button></a>
          <br/>
          <a href="futsal_reserv_test.php?where=잔디구장"><button name="place" value="잔디구장">SOCCER</button></a>
          <br/>
          <a href="futsal_reserv_test.php?where=대운동장"><button name="place" value="대운동장">STADIUM</button></a>
        
      </div>


      <div class="left">

        <iframe  type="text/html" frameborder="0" height="250px" width="100%" src="http://forecast.io/embed/#lat=37.3217&lon=126.8309&name=Hanyang Univ.&units=si"> </iframe>

        <table cellSpacing=0 cellPadding=0 width="100%" class="momtong" >
            <?php
                date_default_timezone_set('Asia/Seoul');
                $today = date("Y-m-d",time());
                try{
                    $name = "web_project";
                    $query = "select * from purpose_view natural join futsal_manage where borrowdate = '$today'
                    and notice = 1";
                    $db = new PDO("mysql:dbname=$name", "root", "root");
                    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $rows = $db->query($query);
            ?>
                <tbody>
                    <td>
                    <MARQUEE scrollAmount=6 direction=up>
                        <section>
                        <table cellSpacing=0 cellPadding=0 width="100%" border=0>
                        <tbody>
                                <tr>
                                <td height=200 id="gamenotice">&nbsp;--- Game Notice ---</td></tr>
                                <tr>
                                <?php
                                    foreach($rows as $row){
                                        $start_a = explode(":",$row["start_time"]);
                                        $start_t = $start_a[0].":".$start_a[1];
                                        $end_a = explode(":", $row["end_time"]);
                                        $end_t = $end_a[0].":".$end_a[1];
                                ?>
                                     <tr><td height=50>&nbsp; <?= $row["home"] ?> <span class="vs">vs </span><?= $row["away"]?> <?= $start_t ?>~<?= $end_t ?><td></tr>
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
                } ?>
                </tbody>
            </table>

        <!-- API from.. https://darksky.net/ -->
      <!-- source=http://thinkgood.tistory.com/471 -->
      </div>







  </body>
</html>

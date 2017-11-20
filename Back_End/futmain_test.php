<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Futsal Field Rental</title>
    <link rel="stylesheet" href="futmain.css">
    <link rel="stylesheet" href="notice.css">
    <link rel="stylesheet" href="futsal.css">
  </head>
  <body>
    <header>
      <h1>RENTAL</h1><hr>
    </header>
    
      <div class="right">
        <form action="../futsal_reserve_page/futsal_reserv.php" method="post">
          <button name="place" value="풋살장">FUTSAL</button>
          <br/>
          <button name="place" value="잔디구장">SOCCER</button>
          <br/>
          <button name="place" value="대운동장">STADIUM</button>
        </form>
      </div>

      
      <div class="left">

        <iframe  type="text/html" frameborder="0" height="250px" width="100%" src="http://forecast.io/embed/#lat=37.3217&lon=126.8309&name=Hanyang Univ.&units=si"> </iframe>

        <table cellSpacing=0 cellPadding=0 width="100%" class="momtong" >
            <?php   
                try{
                    $name = "web_project";
                    $query = "select purpose from purpose_view";
                    $db = new PDO("mysql:dbname=$name", "root", "root");
                    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $rows = $db->query($query);
            ?>
                <tbody>
                    <td>
                    <MARQUEE scrollAmount=0 direction=up>
                        <section>
                        <table cellSpacing=0 cellPadding=0 width="100%" border=0>
                        <tbody>
                                <tr>
                                <td height=20 id="gamenotice">&nbsp;--- Game Notice ---</td></tr>
                                <tr>
                                <?php
                                    foreach($rows as $row){
                                    print_r($row)
                                //     foreach($row as $attribute => $value){
                                //     print_r($value)?>
                                //     <!-- <?="check"?> -->
                                //     <td height=50>&nbsp; <?=$value?> <span class="vs">vs</span</td></tr>
                                //     <tr>
                                //     <!-- <td height=50>&nbsp;기계공학과 <span class="vs">vs</span> 신문방송학과</td></tr>
                                //     <tr>
                                //     <td height=50>&nbsp;공학대학 <span class="vs">vs</span> 경상대학</td></tr>
                                //     <tr>
                                //     <td height=50>&nbsp;입축구 <span class="vs">vs</span> 잇몸튼튼</td></tr> -->
                                // <?php }?>
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

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Futsal Field Rental</title>
    <link rel="stylesheet" href="notice.css">
    <link rel="stylesheet" href="futmain.css?ver=4">

    <!-- <link rel="stylesheet" href="futsal.css"> -->
    <script type="text/javascript" src="futmain.js"></script>
  </head>
  <body>
    <header>
      <h1>RENTAL</h1><hr>
    </header>
    
      <div class="right">
          <!-- <form action="../../Back_end/futsal_reserv_test.php" method="post"> -->
            <object id = "ericamap" type="image/svg+xml" data="에리카_풋살장.svg">현재 브라우져는 object를 지원하지 않습니다.</object>
          <!-- </form> -->

          <div id="futsal_modal" class="modal">
            <div class="modal-content">
              <span class="close">&times;</span>
              <button id="futsal_A">풋살장A</button>
              <button id="futsal_B">풋살장B</button>
            </div>
            
          </div>

          <div id="soccer_modal" class="modal">
            <div class="modal-content">
              <span class="close">&times;</span>
              <button id="soccer">잔디구장</button>
              
            </div>
            
          </div>


          <div id="stadium_modal" class="modal">
            <div class="modal-content">
              <span class="close">&times;</span>
              <button id="stadium">대운동장</button>
              
            </div>
            
          </div>


      </div>

      

      
      <div class="left">

        <iframe  type="text/html" frameborder="0" height="250px" width="100%" src="http://forecast.io/embed/#lat=37.3217&lon=126.8309&name=Hanyang Univ.&units=si"> </iframe>

        <table cellSpacing=0 cellPadding=0 width="100%" class="momtong" >
                <tbody>
                    <td>
                    <MARQUEE scrollAmount=10 direction=up>
                        <section>
                        <table cellSpacing=0 cellPadding=0 width="100%" border=0>
                        <tbody>
                                <tr>
                                <td height=20 id="gamenotice">&nbsp;--- Game Notice ---</td></tr>
                                <tr>
                                <td height=50>&nbsp; 소프트웨어학부 <span class="vs">vs</span> ICT융합학부</td></tr>
                                <tr>
                                <td height=50>&nbsp;기계공학과 <span class="vs">vs</span> 신문방송학과</td></tr>
                                <tr>
                                <td height=50>&nbsp;공학대학 <span class="vs">vs</span> 경상대학</td></tr>
                                <tr>
                                <td height=50>&nbsp;입축구 <span class="vs">vs</span> 잇몸튼튼</td></tr>
                                <td height=1>&nbsp;</td></tr>
                            </tbody></table></section></MARQUEE></td></tbody></table>

        <!-- API from.. https://darksky.net/ -->
      <!-- source=http://thinkgood.tistory.com/471 -->
      </div>
    


 



  </body>
</html>

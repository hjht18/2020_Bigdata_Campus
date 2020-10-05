<!DOCTYPE html>
<?php
$conn = mysqli_connect("localhost", "root", "123456");
mysqli_select_db($conn, "fifa");
$result = mysqli_query($conn, "SELECT * FROM fifa.f1_w");


$table = array();
$table['cols'] = array(
  array('label' => 'year', 'type' => 'string'),
  array('label' => 'fishing', 'type' => 'number')
);

$row = array();
while ($rows = mysqli_fetch_array($result)) {
  $temp = array();
  $d = explode("-", $rows['year']);
  // the following line will be used to slice the Pie chart
  $temp[] = array('v' => $d[0]);

  // Values of each slice
  $temp[] = array('v' => $rows['fishing']);
  $row[] = array('c' => $temp);
}
$table['rows'] = $row;
$jsonTable = json_encode($table);
?>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="Horizontal_menu.css" />
  <script src="https://kit.fontawesome.com/2369d49bf3.js" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css2?family=Do+Hyeon&family=Nanum+Myeongjo&family=Source+Sans+Pro:wght@700&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@400;700;800&display=swap" rel="stylesheet">
  <script src="menu.js" defer></script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load('current', {
      packages: ['corechart', 'line']
    });
    google.charts.setOnLoadCallback(drawBackgroundColor);

    function drawBackgroundColor() {
      var data = new google.visualization.DataTable(<?php echo $jsonTable; ?>);

      var options = {
        title: '서해안 멸치 어획량 추이 (1970 ~ 2050)',
        titleTextStyle: {
          fontSize: 22,
          bold: true
        },
        hAxis: {
          title: 'Year',
          titleTextStyle: {
            color: '#333'
          }
        },
        vAxis: {
          minValue: 10000
        },
        backgroundColor: {
          fill: '#DEDADC'
        }
      };


      var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
      chart.draw(data, options);
    }
  </script>
  <title>The Future of the sea</title>
</head>

<body background="images/background.jpg">
  <div class="navbar">
    <div class="menu__logo">
      <a href="cover.php"><img src="images/logo00.png" /></a>
    </div>
    <div class="menu__fish">
      <div class="menu__fish_01">
        <div class="crotch">
          <div class="crotch_name">
            <button onclick="show_hide_01()" class="crotch_Btn">아귀</button>
          </div>
          <div style="display: none" id="crotch_sea">
            <a href="South_crotch.php">남해</a>
            <a href="East_crotch.php">동해</a>
          </div>
        </div>
        <div class="anchovy">
          <div class="anchovy_name">
            <button onclick="show_hide_02()" class="anchovy_Btn">멸치</button>
          </div>
          <div style="display: none" id="anchovy_sea">
            <a href="South_anchovy.php">남해</a>
            <a href="West_anchovy.php">서해</a>
          </div>
        </div>
      </div>
      <ul class="menu__fish_02">
        <li><a href="South_Arctoscopus.php">도루묵</a></li>
        <li><a href="South_Trachurus.php">전갱이</a></li>
        <li><a href="South_Mackerel.php">삼치</a></li>
        <li><a href="East_pollock.php">명태</a></li>
        <li><a href="South_tuna.php">참다랑어</a></li>
      </ul>
    </div>
  </div>
  <div id="big_div">
    <div id="map"></div>
    <div id="box_ABC">
      <div class="box_A">
        <div id="chart_div"> </div>
      </div>
      <div class="box_A_01">
        <div class="box_B">
          <h2 align="center">전년 대비 어획량 변동</h2>
          <p style="font-size:20px; text-align:center; margin: 30px 50px"> <b>2020 </b>년 <br>
            <?php
            $conn = mysqli_connect("localhost", "root", "123456");
            mysqli_select_db($conn, "fifa");
            $resultt = mysqli_query($conn, "SELECT * FROM fifa.f1_w");

            $todayyear = date("Y");
            while ($rowss = mysqli_fetch_assoc($resultt)) {
              $splitedyear = explode("-", $rowss['year']);
              if ($splitedyear[0] == ($todayyear - 1)) {
                echo $splitedyear[0] . " 년 대비";
                $pastfishing = $rowss['fishing'];
              }
              if ($splitedyear[0] == $todayyear) {
                $presentfishing = $rowss['fishing'];
                $rate = (($rowss['fishing'] - $pastfishing) / $pastfishing) * 100;

                if ($rate < 0) {
                  echo "   " . floor($rate) . "  %         <span style='font-weight: bold; color:  #8a2323;'>감소</span><br> </p>";
                } else {
                  echo "   " . floor($rate) . "  %         <span style='font-weight: bold; color:  #23448a;'>증가<br> </p>";
                }
              }
              if ($splitedyear[0] == $todayyear + 1) {
                echo "<p style='font-size:20px; text-align:center; margin: 30px 50px'><b>" . $splitedyear[0] . "</b>" . "   년 어획량 <br>";
                $rate = (($rowss['fishing'] - $presentfishing) / $presentfishing) * 100;
                if ($rate < 0) {
                  echo " 예상     " . floor($rate) . "  %         <span style='font-weight: bold; color:  #8a2323;'>감소 </p>";
                } else {
                  echo " 예상     " . floor($rate) . "  %         <span style='font-weight: bold; color:  #23448a;'>증가 </p>";
                }
              }
            }

            ?>
          </p>
        </div>
        <div class="box_C">
          <?php
          $conn = mysqli_connect("localhost", "root", "123456");
          mysqli_select_db($conn, "fifa");
          $sql = "SELECT * FROM fifa.f1_w";
          $result = mysqli_query($conn, $sql);
          echo "<table class='type09'>
          <thead>
          <tr>
          <th scope='cols'>연도</th>
          <th scope='cols'>어획량(톤)</th>
          </tr>
          </thead>";
          echo "<tbody>
          <tr>";
          while ($row = mysqli_fetch_assoc($result)) {
            $d = explode("-", $row['year']);
            if ($d[0] % 10 == 0) {
              echo "<th scope='row'>" . $d[0] . "</th>";
              echo "<td>" . $row['fishing'] . "</td>";
              echo "</tr>";
            }
          }
          echo "</tbody>
          </table>";
          ?> </div>
      </div>
    </div>
  </div>
  <script src="https://dapi.kakao.com/v2/maps/sdk.js?appkey=fd56fddd52622bbe902bbba9debdbfd1">
  </script>
  <script>
    var mapContainer = document.getElementById("map"), // 지도를 표시할 div
      mapOption = {
        center: new kakao.maps.LatLng(37.55314, 126.97501), // 지도의 중심좌표
        level: 14, // 지도의 확대 레벨
        mapTypeId: kakao.maps.MapTypeId.ROADMAP, // 지도종류
      };

    // 지도를 생성한다
    var map = new kakao.maps.Map(mapContainer, mapOption);

    // 마우스 드래그와 모바일 터치를 이용한 지도 이동을 막는다
    map.setDraggable(false);

    // 마우스 휠과 모바일 터치를 이용한 지도 확대, 축소를 막는다
    map.setZoomable(false);

    var polygonPath = [
      new kakao.maps.LatLng(37.698781, 126.227905),
      new kakao.maps.LatLng(37.336112, 125.525724),
      new kakao.maps.LatLng(37.034700, 124.194070),
      new kakao.maps.LatLng(36.146489, 124.379592),
      new kakao.maps.LatLng(35.247478, 123.858343),
      new kakao.maps.LatLng(34.465197, 124.107746),
      new kakao.maps.LatLng(34.660856, 125.407928),
      new kakao.maps.LatLng(35.449392, 126.403238),
      new kakao.maps.LatLng(35.839027, 126.678574),
      new kakao.maps.LatLng(36.316550, 126.505117),
      new kakao.maps.LatLng(36.768010, 126.129294),
      new kakao.maps.LatLng(37.052617, 126.463560),
      new kakao.maps.LatLng(36.993472, 126.776143),
      new kakao.maps.LatLng(37.423743, 126.378638),
    ];

    // 지도에 표시할 다각형을 생성합니다
    var polygon = new kakao.maps.Polygon({
      path: polygonPath, // 그려질 다각형의 좌표 배열입니다
      strokeWeight: 3, // 선의 두께입니다
      strokeColor: "#39DE2A", // 선의 색깔입니다
      strokeOpacity: 0.8, // 선의 불투명도 입니다 1에서 0 사이의 값이며 0에 가까울수록 투명합니다
      strokeStyle: "longdash", // 선의 스타일입니다
      fillColor: "#A2FF99", // 채우기 색깔입니다
      fillOpacity: 0.7, // 채우기 불투명도 입니다
    });

    // 지도에 다각형을 표시합니다
    polygon.setMap(map);
  </script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="Horizontal_menu.css" />
  <script src="https://kit.fontawesome.com/2369d49bf3.js" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css2?family=Do+Hyeon&family=Nanum+Myeongjo&family=Source+Sans+Pro:wght@700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <script src="menu.js" defer></script>
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
</body>

</html>
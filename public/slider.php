<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Colored circles slider</title>
  <link rel="stylesheet" href="css/slider.css">
</head>
<body>
<div class="wrapper">
  <section>
    <div id="slider" class="slider">
      <div class="slider-current">
        <img src="img/5ceee8ea1e2a6.png" width="500" height="500" alt="0">
      </div>
      <ul class="slider-previews"></ul>
    </div>
  </section>
</div>
<form id="main" action="handler.php" method="get">
  <input class="main-button button" type="submit" value="Main page">
  <input type="hidden" name="form" value="main">
</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="js/slider.js"></script>
</body>
</html>

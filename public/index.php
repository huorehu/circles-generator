<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/style.css">
  <title>Circles generator</title>
</head>
<body>
<div class="wrapper">
  <form id="image-generator" action="handler.php" method="get">
    <input type="hidden" name="form" value="image-generator">
    <div class="input-item">
      <label for="img-width">Image width</label>
      <input id="img-width" type="text" name="width">
    </div>
    <div class="input-item">
      <label for="img-height">Image height</label>
      <input id="img-height" type="text" name="height">
    </div>
    <div class="input-item">
      <label for="circle-radius">Circle radius</label>
      <input id="circle-radius" type="text" name="radius">
    </div>
    <div class="input-item">
      <span>Amount circles</span>
      <select name="amount" id="amount-circles">
        <option value="-1">Select number</option>
        <option value="5">5</option>
        <option value="10">10</option>
        <option value="20">20</option>
        <option value="50">50</option>
      </select>
    </div>
    <div class="button-wrapper">
      <input class="button" type="submit" value="Generate">
    </div>
  </form>
  <form id="image-slider" action="handler.php" method="get">
    <input class="slider-button button" type="submit" value="Show slider">
    <input type="hidden" name="form" value="slider">
  </form>
</div>
<script src="js/script.js"></script>
</body>
</html>

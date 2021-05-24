<?php

$temperature = "";
$humidity = "";
$windspeed = "";
$city = "";

if(!empty($_GET['city'])){

  $city = $_GET['city'];
  $url = file_get_contents('http://api.openweathermap.org/data/2.5/weather?q='.urlencode($_GET['city']).'uk&appid=9db4229547a2a5e55c0953421f452e0f');


  $dataArray = json_decode($url, true);
  print_r($dataArray);


  $temperature = intval( $dataArray['main']['temp'] - 273 );
  $humidity = ($dataArray['main']['humidity'])."%";
  $windspeed = ($dataArray['wind']['speed'])." mps";


}

 ?>


 <!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="initial-scale=1.0">
  <title>Weather App</title>
  <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700,inherit,400" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/main.css">
</head>
<body>


<!-- Main Page -->
<div class="container">
  <br><br><br>
  <h1 class="text-center text-info">What's the Weather?</h1>
  <br>
  <!-- Weather box -->

    <div class="weather-box col-xs-offset-1 col-xs-10 col-sm-offset-4 col-sm-4">

        <div class="col-sm-12">
          <p class="temperature text-center"><?php echo $temperature; ?>&deg;C</p>
          <p class="location text-center"><?php echo $city; ?></p>
        </div>

        <div class="col-sm-12">
          <div class="col-sm-12 climate-bg">
            <img class="weathericon" align="center" src="images/Sun.svg" class="img-responive">
          </div>

          <div class="col-sm-12 info-bg">

            <div class="row">
              <div class="col-xs-6">
              <img class="dropicon img-responive" src="images/Droplet.svg">
              <p class="humidity text-center"><?php echo $humidity; ?></p>
            </div>
            <div class="col-xs-6">
              <img class="windicon img-responive" src="images/Wind.svg">
              <p class="windspeed text-center"><?php echo $windspeed; ?></p>
            </div>
            </div>

          </div>
        </div>

    </div>
  <div class="row">
    <div class="col-xs-offset-2 col-xs-8 col-sm-offset-4 col-sm-4">
    <br>
      <form action="" method="GET" class="form-horizontal" role="form">

        <div class="form-group">
          <label class="sr-only" for="">label</label>
          <input type="text" class="form-control" name="city" id="city" placeholder="Enter city">
        </div>
        <button type="submit"  class=" btn btn-info ">Submit</button>
      </form>

  </div>
</div>
  </div>


</body>
</html>

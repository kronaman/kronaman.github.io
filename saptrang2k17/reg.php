<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="">
<!--<![endif]-->

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Saptrang | Register</title>
  <meta name="description" content="Saptrang 2017 | Annual Cultural Fest of NIT Delhi">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="apple-touch-icon" href="apple-touch-icon.png">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/bootstrap-theme.min.css">
  <link href="http://fonts.googleapis.com/css?family=Abel" rel="stylesheet" type="text/css">
  <link href="css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/main.css">
  <link href="css/style.css" rel="stylesheet">
  <script type="text/javascript" async="" src="https://www.gstatic.com/recaptcha/api2/r20161004153729/recaptcha__en.js"></script>
  <script type="text/javascript" async="" src="https://www.gstatic.com/recaptcha/api2/r20161004153729/recaptcha__en.js"></script>
  <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
  <script src="js/modernizr.custom.js"></script>

<script src='https://www.google.com/recaptcha/api.js'></script>
  <style type="text/css">
input[type=submit] {
  border-radius: 3px;
  background: #42C0FB;
  color: white;
  text-transform: uppercase;
  letter-spacing: 1px;
  display: inline-block;
  cursor: pointer;
}
input[type=submit]:hover {
  border-radius: 3px;
  background: #000000;
}

     @font-face{
/*  FOX & CAT */
  font-family: fnc;
  src: url('fonts/jose.ttf');
}

    .page-home {
      font-family: fnc;
      height: 100%;
      /*overflow: hidden;*/
      /*background-color: #0e0f11;*/
      background-image: url("images/register.png");
      background-repeat: repeat;
    }

    ::-webkit-scrollbar {
      width: 5px;
    }

    ::-webkit-scrollbar-thumb {
      background-color: #333;
    }
    /* this will style the thumb, ignoring the track */

    ::-webkit-scrollbar-button {
      background-color: #fff;
    }
    /* optionally, you can style the top and the bottom buttons (left and right for horizontal bars) */

    ::-webkit-scrollbar-corner {
      background-color: black;
    }
    /* if both the vertical and the horizontal bars appear, then perhaps the right bottom corner also needs to be styled */

    a {
      color: #42C0FB;
    }

    a:hover {
      color: blue;
      text-decoration: none;
      cursor: pointer;
    }
    .sidebar {
    position: fixed;
    z-index: 21;
    height: 100%;
    background-image: url("images/register.png");
    background-position: center center;
    width: 240px;
}
    /*  Layout  */

.button {
    background-color: teal; /* Green */
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
}

.button10:hover {
    box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
}

  </style>

  <script>
    window.jQuery || document.write('<script src="js/vendor/jquery-3.1.0.min.js"><\/script>')
  </script>
  <script src="js/vendor/jquery-3.1.0.min.js"></script>
  <script src="js/vendor/jquery-3.1.0.min.js"></script>
  <script src="js/vendor/jquery-3.1.0.min.js"></script>
  <script src="js/vendor/jquery-3.1.0.min.js"></script>
  <script src="js/vendor/jquery-3.1.0.min.js"></script>
  <script src="js/vendor/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

  <script src="https://www.google.com/recaptcha/api.js"></script>

</head>

<body>
  <!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

  <!-- The main page  -->
  <div class=" container-fluid page-home">

    <!-- <div class="rocks container">
      <div class="rocks-front" style="background-position: 0.184672px 5.80645px;"></div>
      <div class="rocks-mid" style="background-position: 0.0738689px 2.32258px;"></div>
      <div class="rocks-back"></div>
    </div> -->


    <div class="col-md-2 sidebar" style="margin-left:-15px">
      <div class="col-md-12" align="center">
      <br>
      <br>
        <a href="index.html">
          <img src="images/silver.png" style="width:70%;" > </a>
      </div>

      <div class="col-md-12 " >
        <h2 class="text-center" style="font-weight:700;font-size:35px; color: skyblue;">Registrations</h2>

      </div>
    </div>



  <div id="l_box" class="l_box l_box_large" style="margin-left:225px">

    <!-- start   -->


    <div class="modal-wrap">
      <div class="modal-bodies">
        <div class="modal-body modal-body-step-1 is-showing" id="basic-registration" style="left: 0px; width: 536px;">
          <div class="title">Register</div>
<!--          <div class="description ">Click <a class="text-sucess" href="#campus-ambassador">here</a> to register as Campus Ambassador.</div> -->
          <form action="register.php" method="post" style="margin-left: -38px; width: 409px;">
            <input type="text" placeholder="Name" name="name" required>
            <input type="email" placeholder="Email" name="email"  required>
            <input type="tel" placeholder="Phone" required name="phone" style="width: 196px;">
            <input type="text" placeholder="Age" name="age"  required style="width: 196px;">
	    <input type="text" placeholder="City" required name="city" style="margin-top: -56px; margin-left: 219px; width: 191px;">
            <input type="text" placeholder="College" name="college" required>

            <div class="text-center">
<br>
<input type="submit" style="width: 300px;" value="Register">
            </div>
          </form>
        </div>
        <div class="modal-body modal-body-step-2" id="campus-ambassador">
          <div class="title">Register</div>
          <div class="description ">To register here, You must register as a participant <a class="text-sucess" href="#basic-registration">here</a>.<br> Please use the same email which you used to register as a participant.</div>
          <form>
            <input type="text" placeholder="Name" required>
            <input type="email" placeholder="Email" required>
            <input type="email" placeholder="Phone" required>
            <input type="email" placeholder="College" required>
            <br>
            <div class="text-center">
<br>
              <div class="button button2">Register</div>
            </div>
          </form>
        </div>
        </div>
      </div>
    </div>


    <!-- end-->
  </div>
</div>
  <script>
    window.jQuery || document.write('<script src="js/vendor/jquery-3.1.0.min.js"><\/script>')
  </script>
  <script src="js/vendor/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

</body>

</html>

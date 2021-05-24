<?
session_start();
?>

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
    <link href="http://fonts.googleapis.com/css?family=Abel" rel="stylesheet" type="text/css">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/media.css">
    <script src="js/modernizr.custom.js"></script>
    <style type="text/css">
    @font-face {
        /*  FOX & CAT */
        font-family: fnc;
        src: url('fonts/jose.ttf');
        
    }
    
    body {
        overflow: hidden;
    }
    
    .page-home {
        font-family: fnc;
        height: 100%;
        /*overflow: hidden;*/
        background-color: #172026;
        background-image: url("images/register.png");
        background-repeat: repeat;
    }
    
    ::-moz-selection {
        background: skyblue;
        text-shadow: none;
    }
    
    ::selection {
        background: skyblue;
        text-shadow: none;
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
        background-color: teal;
        /* Green */
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
        -webkit-transition-duration: 0.4s;
        /* Safari */
        transition-duration: 0.4s;
    }
@media screen and (max-width: 768px) {
  .page-home{
    height: 120vh;
  }
  .l_box{
    height: 120vh;
  }
  body{
  overflow: visible;
  }
  .column_line_up_area {
    height: auto;
}
}

    .button10:hover {
        box-shadow: 0 12px 16px 0 rgba(0, 0, 0, 0.24), 0 17px 50px 0 rgba(0, 0, 0, 0.19);
    }
    </style>
</head>

<body>
    <!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
    <!-- The main page  -->
    <div class=" container-fluid page-home">
        <div class="col-md-2 sidebar">
            <div align="center">
                <i class="fa fa-times fa-2x times" aria-hidden="true"></i>
                <br>
                <br>
                <a href="index.html">
                    <img src="images/silver.png" style="width:70%;">
                </a>
            </div>
            <div class="col-md-12 sidebar-content">
                <h2 class="text-center" style="font-weight:700;font-size:30px; color: #42C0FB;">Registrations</h2>
            </div>
        </div>
        <div id="l_box" class="l_box l_box_large">
            <i class="fa fa-bars fa-2x ham" aria-hidden="true"></i>
            <div id="l_page_event" class="l_page">
                <div class="row">
                    <!-- ** Register box ** -->
                    <div id="column_line_up_1" class="col-sm-2 col-sm-offset-1 col-xs-12">
                        <section class="column_line_up_area" style="width:500px;padding:4%;">
                            <div class="row col-xs-12">
                                <h1 class="text-center" style="color: #42C0FB;"><br>Register</h1>
                                <br>
                                <p class="text-inverse text-center">Register here to be a part of Saptrang 2k16</p>
                            </div>
                            <div class="content1" style="padding-left: 4%;">
                                <!-- Form -->
                                <form action="register.php" method="post" class="form-horizontal" role="form">
                                    <div class="form-group">
                                        <div class="col-xs-12">
                                            <input type="text" placeholder="Name" name="name" required class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-xs-12">
                                            <input type="email" placeholder="Email" name="email" required class="form-control">
                                        </div>
                                        <span><p style="color:red; float:right" >
<?php if(isset($_SESSION['email_exist'])) {echo ' Email Already Registered'; session_destroy();} ?></p></span>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-xs-12">
                                            <input type="tel" placeholder="Phone" name="phone" required class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-xs-4 col-sm-6">
                                            <input type="text" placeholder="Age" required name="age" class="form-control">
                                        </div>
                                        <div class="col-xs-8 col-sm-6">
                                            <input type="text" placeholder="City" required name="city" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-xs-12">
                                            <input type="text" placeholder="College" name="college" required class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-xs-12">
                                            <input type="submit" id="submit" value="Register" >
                                        </div>
                                    </div>
                                </form>
                                <br>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
   <script src="js/vendor/jquery-3.1.0.min.js"></script>
    <script src="js/vendor/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>

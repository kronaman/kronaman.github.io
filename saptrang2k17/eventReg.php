<?php

	require('connect.php');
	
	$msg = "";
	$teamNameMsg="";
	$test="";
	$size = 0;
	$event  = 'Event Name';
	$table = "";
    $amount=150;
	$std = "";
	
function payment_done($prid){
       global $mysqli;
	$query= "SELECT * FROM `payment` WHERE `request_id`= '".$prid."'";
	if($query_run = mysqli_query($mysqli, $query)){
		if(mysqli_num_rows($query_run)>=1){
			$row = mysqli_fetch_assoc($query_run);
			$status = $row['status'];
			if($status == 'success')
				return true;
		}
	}
       return false;
}

	function isExist($teamName, $table){
		global $mysqli;
		$query = "SELECT * FROM  ".$table."  WHERE `teamName` ='".$teamName."'";
		if($query_run = mysqli_query($mysqli, $query)){
			if(mysqli_num_rows($query_run) >=1 ){
				$row =  mysqli_fetch_assoc($query_run);
				$prid = $row['request_id'];
				if(payment_done($prid)){
					return true;
				}
				
			}	
		}
		return false;
		
	}
	
	if(isset($_POST['eventReg'])){
		$size =  $_POST['size'];
		$event = $_POST['event'];
		$table = $_POST['table'];
		
		
	}
	$arr = array();
	if(isset($_POST['register'])){
		
		$table  = $_POST['table'];
		$size = $_POST['size'];
		$event = $_POST['event'];
		$std = $_POST['std'];
		$college = $_POST['college'];
		
		
		if($size==1){
			$amount=150;
			$mem = $_POST['id0'];
			//$query = "INSERT INTO ".$table." VALUES ('','".$mem."')";
			$query = "INSERT INTO ".$table."(`id`, `mem1`,`college`) VALUES ('','".$mem."','".$college."')";
			if($query_run = mysqli_query($mysqli, $query)){
				$last_id = mysqli_insert_id($mysqli);
				$msg= '<p style="color:green" >Registration Success</p>';
				
				//name, phone, email, event, type, id, table,payer
				$query1 = "SELECT * FROM `saptrangnitd_user` WHERE `user_id` = '".$mem."' ";
				if($query_run =mysqli_query($mysqli, $query1) ){
					$row = mysqli_fetch_assoc($query_run);
					$name = $row['name'];
					$phone = $row['phone'];
					$email= $row['email'];
					
					if($std == 'no'){
						header("Location: payment/event_payment_request.php?name=$name&phone=$phone&email=$email&event=$event&type=s&id=$last_id&table=$table&payer=$mem");}
				}
				
			}else{
				$msg= '<p style="color:red">Registration Failed</p>';
			}
		}else{
			$amount=600;
			$teamName = $_POST['teamName'];
			if(isExist($teamName, $table)){
				$teamNameMsg = "<p style = 'color:red' >Team Name '".$teamName."'  Already Exist.. Please choose a new one !!</p>";
				
			}
			else{
				for($i=0;$i<$size;$i++){
					$arr[$i] = $_POST['id'.$i];
					//$msg.=' '.$arr[$i];
				}
				$query = "INSERT INTO ".$table." (`id`, `teamName`,`college`) VALUES ('','".$teamName."','".$college."')";
				
				if($query_run = mysqli_query($mysqli, $query)){
					$lastId =  mysqli_insert_id($mysqli);
					for($i=0;$i<count($arr);$i++){
						$query = "UPDATE ".$table." SET mem".($i+1)."='".$arr[$i]."' where `id`=".$lastId;
									if($query_run = mysqli_query($mysqli, $query)){
										$msg= '<p style="color:green" >Registration Success</p>';
										//name, phone, email, event, type, id, table,payer
										
									if($std== "no"){
										header("Location: payment/event_payment_request.php?name=&phone=&email=&event=$event&type=m&id=$lastId&table=$table&payer=$teamName");}
										
									}else{
										$msg= '<p style="color:red">Registration Failed</p>';
									}
					}
					
				}else{
					$msg= 'failed2';
				}
			
			}
		}
	}
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
  <meta name="description" content="Saptrang 2016 | Annual Cultural Fest of NIT Delhi">
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
<script>
	function setReq(){
           $("#idd0").attr('required', 'required');
      }
	function showHint(str, spanId) {
	 // alert('memname'+spanId);
	 spanId = 'memname' + spanId;
	  var xhttp;
	  if (str.length == 0) { 
	    document.getElementById(spanId).innerHTML = "";
	    return;
	  }
	  xhttp = new XMLHttpRequest();
	  xhttp.onreadystatechange = function() {
	    if (this.readyState == 4 && this.status == 200) {
	      document.getElementById(spanId).innerHTML = this.responseText;
	    }
	  };
	  xhttp.open("GET", "hint.php?hint="+str, true);
	  xhttp.send(); 
	}
       function changey(){
              document.getElementById('college').value = "NIT Delhi";
              document.getElementById('college').style.backgroundColor = "transparent";
              document.getElementById('college').style.color = "golden";
              $("#college").attr('readonly', 'readonly');
       }
      function changen(){
            document.getElementById('college').value = "";
            $("#college").removeAttr('readonly');
     }
</script>
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
	
	  #basic-registration{
		  left: 0px; width: 536px;
	  }

     @font-face{
/*  FOX & CAT */
  font-family: fnc;
  src: url('fonts/jose.ttf');
}

    .page-home {
      font-family: fnc;
      height: 100%;
      background-image: url("images/register.png");
      background-repeat: repeat;
      color: lightgreen;
      font-size: 18px;
    }

    ::-webkit-scrollbar {
      width: 7px;
    }

    ::-webkit-scrollbar-thumb {
      background-color: #333;
    }
    /* this will style the thumb, ignoring the track */

    ::-webkit-scrollbar-button {
      background-color: transparent;
    }
    /* optionally, you can style the top and the bottom buttons (left and right for horizontal bars) */

    ::-webkit-scrollbar-corner {
      background-color: transparent;
    }
    /* if both the vertical and the horizontal bars appear, then perhaps the right bottom corner also needs to be styled */

    a {
      color: #42C0FB;
    }

    a:hover {
      color: silver;
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

.registerForm{
        margin-left: -38px; width: 409px;
}
	  @media only screen and (max-width: 768px){
		  #basic-registration{
		  		left: 0px; width: 300px;
		  }
		  
		  .sidebar{
			  display: none;
		  }
		  
		  .l_box_large {
				padding-left: 18px;
				left: -3px;
				top: -15px;
				height: 100vh;
				overflow-x: hidden;
			}
.l_box{
margin-left: 0px
}
                 .registerForm{
        margin-left: -38px; width: 286px;
}
	  }
.heading{
	color: #42C0FB;
	padding-bottom:7px;
}
.heading span{
	border-bottom: 2px solid #42C0FB;
}
  </style>

  <script>
    window.jQuery || document.write('<script src="js/vendor/jquery-3.1.0.min.js"><\/script>')
  </script>
  <script src="js/vendor/jquery-3.1.0.min.js"></script>
  <script src="js/vendor/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

  <script src="https://www.google.com/recaptcha/api.js"></script>

</head>

<body style="color:red;" onload="setReq()">
  <!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

  <!-- The main page  -->
  <div class=" container-fluid page-home">


    <div class="col-md-2 sidebar" style="margin-left:-15px">
      <div class="col-md-12" align="center">
      <br>
      <br>
        <a href="index.html">
          <img src="images/silver.png" style="width:70%;" > </a>
      </div>

      <div class="col-md-12 " >
		<ul class="list-unstyled">
		<li class="sidebar-menu">
          <a class="menu-active text-center" style=" font-size:30px ;color: #42C0FB;"  href="#" >Event Registrations</a><br>
        </li><br>
        <li class="sidebar-menu">
          <a class="menu-inactive text-center" href="about.html" >About Us</a>
        </li>
        <li class="sidebar-menu">
          <a class="menu-inactive text-center"  href="event.php">Events</a>
        </li>
        <li class="sidebar-menu">
          <a class="text-center menu-inactive" href="sponsors.html" target="-blank">Sponsors</a>
        </li>
        <li class="sidebar-menu">
          <a class="text-center menu-inactive" href="contactus.html">Contact Us</a>
        </li>
        <li class="sidebar-menu">
          <a class="text-center menu-inactive" href="starnight.html">Cultural Night</a>
        </li>
      </ul>
      </div>
    </div>



  <div id="l_box" class="l_box l_box_large" style="overflow-y:auto;">

    <!-- start   -->


    <div class="modal-wrap">
      <div class="modal-bodies">
        <div class="modal-body modal-body-step-1 is-showing" id="basic-registration" style="">
          <div class=""><?php echo '<h1 class=" heading"><span>' .$event,"</span></h1>"; ?></div>
			<p style="color:#FFF;">(If you don't have your SPT-ID yet, go to <a class="heading" href="reg_a.php"><span>Register</span></a>)</p>
          <form action="eventReg.php" method="post" class="registerForm" style="">
            
	    <?php 
	    
			if($size>1) {echo '<input  class="form-control" style="border: 1px solid skyblue; color: magenta;" type="text" placeholder="Team Name" name="teamName" required><span>'.$teamNameMsg.'</span>';  $amount=600;}
			for($i=0;$i<$size;$i++){
	    	
			echo  '<br><input class="form-control" type="text" placeholder= "Member '.($i+1).' SPT-ID"  name= "id'.$i.'"  onkeyup="  showHint(this.value, \''.$i.'\' )  " id= "idd'.$i.'"><span id= "memname'.$i.'"  ></span>';
			
			
			}
			echo  '<input type="hidden" name="table" value="'.$table.'" >';
			echo  '<input type="hidden" name="event" value="'.$event.'" >';
			echo  '<input type="hidden" name="size" value="'.$size.'" >';
			echo '<span id="msg">'.$msg.$test.'</span>';
			?>
			

            <div class="text-center">
<br>
<div class="form-group" style="color: light green; font-size:16px;">
	<div class="col-xs-12">
		Student Of NIT Delhi ?<br>
		Yes : <input type="radio" name="std" value="yes" onclick="changey()"/>
		No : <input type="radio" name="std" value="no" checked="checked" onclick="changen()"/><br><br>
		<input class="form-control" type="text" name="college" id="college" placeholder="College" required/><br><br>
                                                          
	</div>
</div>	
				<input  type="submit" name="register" style="width: 250px;" value="Proceed"/>
			

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

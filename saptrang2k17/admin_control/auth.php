<?php
	session_start();
	echo 'hi';
	if(isset($_POST['login'])){ echo 'ener';
		$user = $_POST['user'];
		$pass = $_POST['pass'];
                $type = $_POST['type'];
$event_name = urlencode('Event Name');
if($type == 'breakfree')   {$event_name = urlencode('Break Free'); $size = 20;}
else if($type == 'spotlight') {$event_name = urlencode('Spotlight'); $size = 1;}
else if($type =='aaroh' ) {$event_name = urlencode('Aaroh');$size = 2;}
else if($type == 'razz') {$event_name = urlencode('Razzmate'); $size = 8;}
else if($type == 'mural') {$event_name = urlencode('Mural Painting'); $size = 1;}
else if($type == 'goonj') {$event_name = urlencode('Goonj'); $size = 20;}
else if($type == 'monoact') {$event_name = urlencode('Mono Act'); $size = 1;}
else if($type == 'stroke') {$event_name = urlencode('Strokes'); $size = 1;}
else if($type == 'parallax') {$event_name = urlencode('Parallax'); $size = 1;}
else if($type == 'runway') {$event_name = urlencode('Run Way'); $size = 15;}
 
		if($user == 'saptrang-event' && $pass == 'events@admin'){
			echo $_SESSION['eventAdmin'] = "Admin";
			header("Location: event_db.php?type=$type&size=$size&event_name=$event_name");
		}else{
			echo 'Wrong credentials';
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>User DB</title>
	 <script src="js/jquery.js"></script> 
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

	<style>
			.pos{
				position : absolute;
				top : 20%;
				width :70%;
				left : 15%;
			}
			body{
				background-image : url("10.jpg");
				background-repeat: no-repeat;
				background-attachment: fixed;
			}
	</style>
  </head>
  <body>
    
		<div class="container pos">
			<div class="well" id="table">
				<center>
					<form action="" method="post" >
						User Id : <input type="text" name = "user"/>
						Password : <input type = "password" name = "pass"/>
                                                <br><br>Event :  
<select name="type">
  <option value="breakfree">Break Free</option>
  <option value="spotlight">Spotlight</option>
  <option value="aaroh">Aaroh</option>
  <option value="razz">Razzmatazz</option>
  <option value="goonj">Goonj</option>
  <option value="monoact">Mono Act</option>
  <option value="mural">Mural painting</option>
  <option value="stroke">Strokes</option>
  <option value="parallax">Parallax</option>
  <option value="runway">Run Way</option>
</select> 

                  
						<br><br>
						<input type="submit" value="Login" name="login"/>
					</form>
				</center>
			</div>
		</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
   
  </body>
</html>
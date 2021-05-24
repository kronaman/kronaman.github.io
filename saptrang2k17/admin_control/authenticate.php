<?php
	session_start();
	echo 'hi';
	if(isset($_POST['login'])){ echo 'ener';
		echo $user = $_POST['user'];
		echo $pass = $_POST['pass'];
		if($user == 'saptrangAdmin' && $pass == 'Staprang@auth'){
			echo $_SESSION['admin'] = "Admin";
			header('Location: index.php');
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
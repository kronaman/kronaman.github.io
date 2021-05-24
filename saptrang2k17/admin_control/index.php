<?php
	session_start();
	if(isset($_POST['logout'])){
		session_destroy();
		header('Location: authenticate.php');
	}
	if(!isset($_SESSION['admin'])){
		header('Location: authenticate.php');
	}
//$connection = mysqli_connect('localhost','root','','saptrang');
require_once('../connect.php');
$connection = $mysqli;
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>User DB</title>
	 <script src="js/jquery.js"></script> <script>
    	/*$(document).ready(function(){
			$("#table").hide();
		});*/
    </script>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<style>
			.pos{
				position : absolute;
				top : 20%;
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
			<form action="index.php" method="post">
				<div style="float:right"><input type="submit" value="Logout" name="logout"/></div>
			</form>
				<table class="table table-hover">
					 <tr>
						<td style="width:2%;"><b>S.No</b></td>
					    <td style="width:3%;"><b>User Id</b></td>
					    <td style="width:20%;"><b>Name</b></td>
					    <td style="width:5%;"><b>Age</b></td>
					    <td style="width:10%;"><b>Phone</b></td>
					    <td style="width:10%;"><b>Email</b></td>
					    <td style="width:10%;"><b>College</b></td>
					    <td style="width:10%;"><b>City</b></td>
					   
					  </tr>
					  <?php
					  $sql = "SELECT * FROM `saptrangnitd_user` ORDER BY `id` DESC";
					$result = mysqli_query($connection, $sql);
					
					if (mysqli_num_rows($result) > 0) {
					    // output data of each row
					    $i=1;
					    while($row = mysqli_fetch_assoc($result)) {
					    if($i%2 == 0){ ?>
						  <tr class="info">
							  <td><?php echo $i; ?></td>
							 <td><?php echo $row["user_id"];?></td>
						    <td><?php echo $row["name"];?></td>
						    <td><?php echo $row["age"];?></td>
							<td><?php echo $row["phone"];?></td>
							<td><?php echo $row["email"];?></td>
							<td><?php echo $row["college"];?></td>
							<td><?php echo $row["city"];?></td>
							</tr>
						  
					  <?php $i=$i+1;}else{ ?>
						  <tr class="danger">
							  <td><?php echo $i; ?></td>
						 	 <td><?php echo $row["user_id"];?></td>
						    	<td><?php echo $row["name"];?></td>
						    	<td><?php echo $row["age"];?></td>
							<td><?php echo $row["phone"];?></td>
							<td><?php echo $row["email"];?></td>
							<td><?php echo $row["college"];?></td>
							<td><?php echo $row["city"];?></td>
						  </tr>
						  
					<?php $i=$i+1;}
						 }
					} else {
					    echo "0 results";
					}

					
					?>
				</table>
			</div>
		</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
   
  </body>
</html>
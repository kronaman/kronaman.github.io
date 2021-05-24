<?php
	session_start();
require_once('../connect.php');
	if(isset($_POST['logout'])){
		session_destroy();
		header('Location: auth.php');
	}
	if(!isset($_SESSION['eventAdmin'])){
		header('Location: auth.php');
	}
function paid_status($prid){
     global $mysqli;
      $query = "SELECT * FROM `payment` WHERE `request_id`= '".$prid."' ";
	if($query_run =mysqli_query($mysqli, $query) ){
             if(mysqli_num_rows($query_run)>=1 ){
                    $row = mysqli_fetch_assoc($query_run);
                    if($row['status'] == 'success') return true;
             }
             
     }
    return false;
}

$type = $_GET['type'];
$size = $_GET['size'];
$event_name = $_GET['event_name'];
//$connection = mysqli_connect('localhost','root','','saptrang');

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
                                width:100%;
			}
			body{
				background-image : url("10.jpg");
				background-repeat: no-repeat;
				background-attachment: fixed;
			}
                     @media only screen and (max-width: 768px){
                             .pos{
				position : absolute;
				top : 20%;
                                width:auto;
			}    
                     }
	</style>
  </head>
  <body>
    
		<div class="container pos"> 
                        <center><h2><?echo $event_name;?></h2></center>

			<div class="well" id="table">
			<form action="" method="post">
				<div style="float:right"><input type="submit" value="Logout" name="logout"/></div>
			</form>
				<table class="table table-hover">
					 <tr>
						<td style="width:2%;"><b>S.No</b></td>
					         <?php
                                                       if($size>1) echo "<td><b>Team Name</b></td>";
                                                       for($i=1;$i<$size+1;$i++){
                                                              echo "<td><b>Mem $i</b></td>";
                                                       }
                                                 ?>
					       <td><b>Paid</b></td>
                                                <td><b>College</b></td>
					  </tr>
					  <?php
					  $sql = "SELECT * FROM $type ORDER BY `id` DESC";
					$result = mysqli_query($connection, $sql);
					
					if (mysqli_num_rows($result) > 0) {
					    // output data of each row
					    $i=1;
					    while($row = mysqli_fetch_assoc($result)) {
					    if($i%2 == 0){ ?>
						  <tr class="info">
							  <td><?php echo $i; ?></td>
                                                          

							  <?
                                                                 if($size>1){
                                                                     $n = $row['teamName'];
                                                                     echo "<td> ".$n."</td>";
                                                                  }
                                                                for($j=1;$j<$size+1;$j++){
                                                                   
                                                                          $n = $row['mem'.$j];
                                                                         echo "<td> ".$n."</td>";
                                                                }
                                                          ?>
							<td>
                                                                      <?php   
                                                                $prid = $row['request_id'];
                                                                if(paid_status($prid)){
                                                                       echo 'yes';
                                                                }else{
                                                                        echo 'no';
                                                                }
                                                        ?>
                                                       </td>
                                                       <td><?php echo $row['college']; ?></td>
							</tr>
						  
					  <?php $i=$i+1;}else{ ?>
						  <tr class="danger">
							  <td><?php echo $i; ?></td>
                                                          
							 <?
                                                                if($size>1){
                                                                   $n = $row['teamName'];
                                                                   echo "<td> ".$n."</td>";
                                                               }
                                                                for($j=1;$j<$size+1;$j++){
                                                                          $n = $row['mem'.$j];
                                                                         echo "<td> ".$n."</td>";
                                                                }
                                                          ?>
							<td><?php   
                                                                $prid = $row['request_id'];
                                                                if(paid_status($prid)){
                                                                       echo 'yes';
                                                                }else{
                                                                        echo 'no';
                                                                }
                                                        ?></td>
                                                     <td><?php echo $row['college']; ?></td>
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
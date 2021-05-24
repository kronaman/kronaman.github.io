<?php
require_once('../connect.php');

$name="l";
$phone="p";
$email="";
$amount="";
$purpose="";
$status="";
$msg = "";

function getPrid($pid){
	global $mysqli;
	$query = "SELECT * FROM `payment` WHERE `payment_id`='".$pid."'";
	if($query_run = mysqli_query($mysqli, $query) ){
		if(mysqli_num_rows($query_run)>=1){
			$row = mysqli_fetch_assoc($query_run);
			return $row['request_id'];
		}
	}
        $msg = "Wrong Payment ID";
	return 'w';
}

function setValues($prid, $pid){
         $ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://www.instamojo.com/api/1.1/payment-requests/$prid/$pid/");
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
//curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_HTTPHEADER,
            array("X-Api-Key:255e6ab093ab061ac2acb1450ed2abf8",
                  "X-Auth-Token:8c97377c69976c386e6106b4b99b95e3"));
$payload = Array(
    'purpose' => 'FIFA 16',
    'amount' => '2500',
    'phone' => '9999999999',
    'buyer_name' => 'John Doe',
    'redirect_url' => 'http://www.example.com/redirect/',
    'send_email' => true,
    'webhook' => 'http://www.example.com/webhook/',
    'send_sms' => true,
    'email' => 'foo@example.com',
    'allow_repeated_payments' => false
);
$response = curl_exec($ch);
curl_close($ch); 
$data = json_decode($response,true);
$pay = $data['payment_request']['payment'];

$name = $pay['buyer_name'];
$phone = $pay['buyer_phone'];
$email = $pay['buyer_email'];
$amount = $pay['amount'];
$status = $pay['status'];
$purpose = $data['payment_request']['purpose'];
         
echo "<tr><td>$name</td>";
							echo "<td>$email</td>";
							echo "<td>$phone</td>";
							echo "<td>$amount</td>";
							echo "<td>$purpose</td>";
							echo "<td>$status</td></tr>";
}



?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Payment Status</title>

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
			<div class="well">
				<form action="" method="POST" >
					<input type="text" name="pid" placeholder="Payment ID" />
					<input type="submit" value="Check Status" name="check" />
				</form>
				<table class="table table-hover">
					 <tr>
					    <td><b>Name</b></td>
					    <td><b>Email</b></td>
					    <td><b>Phone</b></td>
					    <td><b>Amount</b></td>
						 <td><b>Purpose</b></td>
						 <td><b>Status</b></td>
					  </tr>

					<?php
					
						if(isset($_POST['check'])){
							$pid = $_POST['pid'];
							$prid = getPrid($pid);
							if($prid== 'w' ){
								echo "<p style='color:red'>Wrong Payment ID</p>";
							}else{
								setValues($prid, $pid);
                                                        
							}
							
						}
							
					?>
                                            
					  <!--tr class="info">
					    <td><?php echo $name; ?></td>
					    <td><?php echo $email; ?></td>
					    <td><?php echo $phone; ?></td>
						<td><?php echo $amount; ?></td>
						<td><?php echo $purspose; ?></td>
						<td><?php echo $status; ?></td>
					  </tr-->
					  

				</table>
			</div>
		</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
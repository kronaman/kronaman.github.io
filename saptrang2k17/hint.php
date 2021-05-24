<?php

	require('connect.php');
	if(isset($_GET['hint'])){
		$hint = $_GET['hint'];
		$query = "select name,email from saptrangnitd_user where user_id=".$hint;
		if($query_run = mysqli_query($mysqli, $query)){
				if(mysqli_num_rows($query_run) >=1){
					while($row = mysqli_fetch_assoc($query_run)){
						$name = $row['name'];
						$email = $row['email'];
						echo '<p style="color: green">'.$name.'    ('.$email.')'.'</p>';
					}
				} else {
					echo '<p style="color: red">user doesn\'t exist.</p>'; 
				}
			}else{
				$msg= '<p style="color:red">failed</p>';
			}
	}

?>
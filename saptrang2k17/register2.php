<?php
require_once('connect.php');
session_start();
function exist_in_db($random){
	global $mysqli;
    $query = "SELECT * from `saptrangnitd_user` where `user_id` = '".$random."'";
    if($query_run = mysqli_query($mysqli, $query)){
        if(mysqli_num_rows($query_run)>=1){
               return true;
        }else return false;
   }else die('Error Occured');
   return false;
}

function exist_email($email){
	global $mysqli;
	
	$query = "SELECT * FROM `saptrangnitd_user` WHERE `email` = '".$email."' ";
	if($query_run = mysqli_query($mysqli, $query)){
		if(mysqli_num_rows($query_run)>=1){
			return true;
		}else return false;
	}else 
	return false;
}


	      $name=$_POST['name'];
              $age=$_POST['age'];
              $phone=$_POST['phone'];
              $email=$_POST['email'];
              $college=$_POST['college'];
              $city=$_POST['city']; 
   
	   if(!exist_email($email)){
		   $random;
	   $flag = true;
	   while($flag){
	      $random=mt_rand(1000,9999);
	       if(!exist_in_db($random)) $flag = false;
	   }   


   
$query1="INSERT INTO `saptrangnitd_user`(`id`, `user_id`, `name`, `age`, `phone`, `email`, `college`, `city`) VALUES ('','$random','$name','$age','$phone','$email','$college','$city')";
          if($exe=mysqli_query($mysqli,$query1)){
                 $formcontent=" From: $name \n Phone Number: $phone \n e-Mail: $email \n $random \n Age: $age \n College: $college \n City: $city";
//$recipient = "harshitmundhra@gmail.com";
$recipient = "sa4420@gmail.com";
$subject = "Saptrang Registration Form";
$mailheader = "From: Saptrang Registration Team (NIT Delhi) <info@saptrangnitd.com>\r\n";
mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");
$formcontent2="Hi $name ,\n

Congratulations! You have been successfully registered for Saptrang, NIT Delhi.\n

Your Registration ID is SPT-".$random." \n

It is advised that you do not reveal this ID to any individual other than your teammate.\n

The registration for specific events will be starting soon.\n
Visit our website or facebook page to stay updated.\n
We are looking forward to your visit to Saptrang 2K16. In case of any queries please mail us at: saptrang@nitdelhi.ac.in.\n

Have a nice day!\n

Regards\n
Saptrang Team
National Institute Of Technology\n
Delhi";
$subject2 = "Form Recieved";
mail($email, $subject2, $formcontent2, $mailheader) or die("Error!");
         

}else{
    echo 'Registeration failed';
}


	   }else {
		   $_SESSION['email_exist'] = true;
		   header('Location: reg_a.php');
	   }
    

?>

<html>
<body>
<script>

alert('<?php echo "You have registered successfully. Your saptrang id is SPT-" . $random . " The same has been mailed to you. Have a nice day!"; ?>');
window.location.assign("index.php");
</script>
</body>
</html>



<?php
if (!@($mysqli = new mysqli("148.72.232.182", "saptrang_user", "Saptrang@123", "saptrang"))||$mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
else
	//echo 'Ok.';
?>
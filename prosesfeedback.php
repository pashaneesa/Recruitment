<?php
include "dbconnect.php";
if(isset($_POST["input"])) {
	$firstname = $_POST['Fname'];
	$lastname = $_POST['Lname'];
	$email = $_POST['email'];
	$subject = $_POST['subject'];
	$message = $_POST['message'];

	$sql_insert=mysqli_query($connect_db, "INSERT INTO `feedback` (`id_feedback`, `firstname`, `lastname`, `email`, `subject`, `message`) VALUES (NULL, '$firstname', '$lastname', '$email', '$subject', '$message');");
}
?>
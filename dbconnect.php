<?php
$user_name='root';
$password='';
$database="recruitment";
$host_name="localhost";
$connect_db=new mysqli($host_name,$user_name,$password,$database);
if($connect_db->connect_error){
die('Maaf'.$connect->connect_eror);
}
?>


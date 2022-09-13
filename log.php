<?php
session_start();
include "dbconnect.php";

$email = $_POST['email'];
$password = md5($_POST['password']);
$op = $_GET['op'];

if($op=='in'){
	$cek = mysqli_query($connect_db, "SELECT * FROM login WHERE email='".$email."' AND password='".$password."'");
	if(mysqli_num_rows($cek)==0)
	{
		echo "<script type='text/javascript'>
	    alert('Login Gagal! Periksa kembali email atau password Anda. ".$email.'/'.$password."'); window.location = 'login.php'</script>";
	}
	else if(mysqli_num_rows($cek)>0){
		$c = mysqli_fetch_array($cek);
		$_SESSION['id_user'] = $c['id_user'];
		$_SESSION['username'] = $c['username'];
		$_SESSION['email'] = $c['email'];
		$_SESSION['level'] = $c['level'];
			if($c['level']=="admin"){
				echo "<script type='text/javascript'>
	        		alert('Anda berhasil login!'); window.location = 'admin/welcomeadmin.php'</script>";
			}

			else if($c['level']=="user"){
				echo "<script type='text/javascript'>
	        		alert('Anda berhasil login!'); window.location = 'user/welcome.php'</script>";
			}
			else if($c['level']=="perusahaan"){
				echo "<script type='text/javascript'>
	        		alert('Anda berhasil login!'); window.location = 'perusahaan/welcomeper.php'</script>";
			}
			else{
			die("password salah");
			}

		}
	}
else if($op=="out"){
	unset($_SESSION['email']);
	unset($_SESSION['level']);
	header("location:index.php");
}
?>
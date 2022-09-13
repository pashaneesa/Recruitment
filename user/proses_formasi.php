<?php
session_start();
include "../dbconnect.php";

$id = $_GET["id_per"];
$var = mysqli_query($connect_db, "SELECT * FROM `perusahaan` WHERE `id_per` = '$id'");
$data = mysqli_fetch_array($var);
$id_per = $data['id_per'];
$nama_per = $data['nama_per'];
$user_per = $data['id_user'];
   

$id_user = $_SESSION['id_user'];
$vara = mysqli_query($connect_db, "SELECT * FROM `profile` WHERE `id_user` = '$id_user'");
$dataa = mysqli_fetch_array($vara);
$id_name = $dataa['id_name'];
$name = $dataa['name'];

$query = mysqli_query($connect_db, "SELECT * FROM `login` WHERE id_user='$id_user'");
while($data = mysqli_fetch_array($query))
    {
		if($data['stat']=='sudah'){
			$sql_insert=mysqli_query($connect_db, "INSERT INTO `ambil_formasi` (`id_formasi`, `id_name`, `name`, `id_per`, `nama_per`, `id_user`, `id_user_2`,`sts_submit`,`kirim_accept`,`kirim_reject`) VALUES (NULL, '$id_name', '$name', '$id_per','$nama_per','$id_user','$user_per',belum','belum','belum');"); 
			echo "<script type='text/javascript'>
           		 alert('Berhasil Mengambil Formasi'); window.location = 'ambil_formasi.php'</script>";  
        }
        else if($data['stat']=='belum'){
          	echo "<script type='text/javascript'>
                 alert('Anda belum mengisi form!'); window.location = 'input.php'</script>";  
        }   
    }

?>

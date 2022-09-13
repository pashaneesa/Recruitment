<?php
session_start();
include "../dbconnect.php";
$id_user = $_SESSION['id_user'];
$vara = mysqli_query($connect_db, "SELECT * FROM `perusahaan` WHERE `id_user` = '$id_user'");
$dataa = mysqli_fetch_array($vara);
$id_per = $dataa['id_per'];
$nama_per = $dataa['nama_per'];

$id = $_GET["id_name"];
$var = mysqli_query($connect_db, "SELECT * FROM `profile` WHERE `id_name` = '$id'");
$data = mysqli_fetch_array($var);
	$id_name = $data['id_name'];
	$user = $data['id_user'];
    $name = $data['name'];
    $email = $data['email'];
 $sql_update=mysqli_query($connect_db, "UPDATE `ambil_formasi` SET `kirim_reject`='sudah' WHERE id_per = '$id_per' AND id_name = '$id_name'");

$now = strtotime(date("d F Y"));
$date = date('d F Y', strtotime('+3 day', $now));

$message  = "Halo <b>".$name."</b>. Terimakasih atas ketertarikan anda untuk bergabung dengan <br>".$nama_per."<br> melalui program <i>recruitment online</i>. Akan tetapi, dengan setelah menimbang dan berdiskusi, mohon maaf kami belum bisa meloloskan anda ke tahap selanjutnya. Besar harapan kami bisa untuk bekerjasama dengan anda di lain kesempatan. Maaf dan Terima Kasih";
 
 $sql_insert=mysqli_query($connect_db, "INSERT INTO `pesan` (`id_pesan`, `id_name`, `id_per`, `id_user`,`pesan`) VALUES (NULL, '$id_name', '$id_per', '$user','$message');");

    echo "<script type='text/javascript'>
           alert('Pesan sudah terkirim!'); window.location = 'tampil_pelamar.php'</script>";
?>
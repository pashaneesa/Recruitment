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

$sql_update=mysqli_query($connect_db, "UPDATE `ambil_formasi` SET `kirim_accept`='sudah' WHERE id_per = '$id_per' AND id_name = '$id_name'");

$now = strtotime(date("d F Y"));
$date = date('d F Y', strtotime('+3 day', $now));

$message  = "Halo <b>".$name."</b>. Selamat! Anda terpilih oleh ".$nama_per." untuk melanjutkan tes tahap kedua, yaitu <i>interview session</i> dan <i>writing test</i>. Silahkan datang ke perusahaan kami di Jalan Danau Ranau nomor 12 Sawojajar 1 Malang dan temui <b>Dini Puji</b> di bagian <i>Human Resource</i>. Batas waktu Anda untuk melalukan tes tahap kedua adalah sampai tanggal <b>".$date."</b>.<br><br>Berkas-berkas yang perlu Anda bawa adalah:<br>1. Surat lamaran kerja.<br>2. Daftar riwayat hidup <i>(Curriculum vitae)</i>.<br>3. Fotokopi Ijazah yang dilegalisir.<br>4. Fotokopy KTP.<br>5. Pas foto 3x4 berwarna.<br>6. Sertifikat Pelatihan/Ketrampilan. <i>(jika ada)</i><br><br>Kedatangan Anda sangat kami tunggu.<br>Atas perhatiannya, kami ucapkan terima kasih.";
 
 $sql_insert=mysqli_query($connect_db, "INSERT INTO `pesan` (`id_pesan`, `id_name`, `id_per`, `id_user`,`pesan`) VALUES (NULL, '$id_name', '$id_per', '$user','$message');");

    echo "<script type='text/javascript'>
           alert('Pesan sudah terkirim!'); window.location = 'tampil_pelamar.php'</script>";

?>

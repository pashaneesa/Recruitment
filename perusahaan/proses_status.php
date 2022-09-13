<?php
session_start();
include "../dbconnect.php";
$id_user = $_SESSION['id_user'];
$vara = mysqli_query($connect_db, "SELECT * FROM `perusahaan` WHERE `id_user` = '$id_user'");
$dataa = mysqli_fetch_array($vara);
$id_per = $dataa['id_per'];
$nama_per = $dataa['nama_per'];

if(isset($_POST["input"])) {
  include "../dbconnect.php";
  $id_name = $_POST['id_name'];
  $user = $_POST['id_user'];
  $dob = $_POST['dob'];
  $religion = $_POST['religion'];
  $address = $_POST['address'];
  $phone = $_POST['phone'];
  $photo = $_POST['photo'];
  $name = $_POST['name'];
  $email = $_POST['email'];
  $w_score = $_POST['w_score'];
  $i_score = $_POST['i_score'];
  $comment = $_POST['comment'];
  $status = $_POST['stat'];

  $sql_insert=mysqli_query($connect_db, "INSERT INTO `recruitment`.`status` (`id_status`,`id_user`,`id_name`,`name`, `email`, `dob`, `religion`, `address`, `phone`, `photo`, `w_score`,`i_score`, `comment`, `status`) VALUES (NULL, '$id_user', '$id_name', '$name', '$email', '$dob', '$religion', '$address', '$phone', '$photo', '$w_score','$i_score', '$comment', '$status');");

  if ($status == 'Diterima'){
      $sql_update=mysqli_query($connect_db, "UPDATE `ambil_formasi` SET `sts_submit`='sudah', `stat`='Diterima' WHERE id_name = $id_name AND id_per= '$id_per'");
  }
  else{
      $sql_update=mysqli_query($connect_db, "UPDATE `ambil_formasi` SET `sts_submit`='sudah', `stat`='Ditolak' WHERE id_name = $id_name AND id_per= '$id_per'");
  }
        
  if ($sql_update){
      $now = strtotime(date("d F Y"));
      $date = date('d F Y', strtotime('+3 day', $now));

      if ($status == 'Diterima'){
          $pesan  = "Halo <b>".$name."</b>. Selamat! Anda terpilih menjadi bagian dari <b>".$nama_per."</b>. Hubungi Kami untuk memulai aktivitas anda sebagai karyawan Kami. Terima Kasih";
          $sql_insert=mysqli_query($connect_db, "INSERT INTO `recruitment`.`pesan` (`id_pesan`,`id_name`,`id_per`,`id_user`, `pesan`) VALUES (NULL, '$id_name', '$id_per', '$user', '$pesan');");
      }
      else{
          $pesan  = "Halo <b>".$name."</b>. Maaf! Setelah melakukan pertimbangan dan diskusi, Anda belum bisa bergabung di perusahaan <b>".$nama_per."</b>. Semoga bisa bekerja sama di lain kesempatan. Maaf dan Terima Kasih ";
          $sql_insert=mysqli_query($connect_db, "INSERT INTO `recruitment`.`pesan` (`id_pesan`,`id_name`,`id_per`,`id_user`, `pesan`) VALUES (NULL, '$id_name', '$id_per', '$user', '$pesan');");
      }
  }
  echo "<script type='text/javascript'>
           alert('Status berhasil!'); window.location = 'tampil_pelamar.php'</script>";                                              
}
?>
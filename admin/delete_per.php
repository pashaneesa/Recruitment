<?php
// buka koneksi dengan MySQL
  include("../dbconnect.php");

  //mengecek apakah di url ada GET id
  if (isset($_GET["id_per"])) {

    // menyimpan variabel id dari url ke dalam variabel $id
    $id_per = $_GET["id_per"];

    //jalankan query DELETE untuk menghapus data
    $query = "DELETE FROM perusahaan WHERE id_per='$id_per' ";
    $hasil_query = mysqli_query($connect_db, $query);

    //periksa query, apakah ada kesalahan
    if(!$hasil_query) {
      die ("Gagal menghapus data: ".mysqli_errno().
           " - ".mysqli_error());
    }
  }
  // melakukan redirect ke halaman index.php
  header("location:tampil_per.php");
?>

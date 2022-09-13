<?php
// buka koneksi dengan MySQL
  include("../dbconnect.php");

  //mengecek apakah di url ada GET id
  if (isset($_GET["id_name"])) {

    // menyimpan variabel id dari url ke dalam variabel $id
    $id_name = $_GET["id_name"];

    //jalankan query DELETE untuk menghapus data
    $query = "DELETE FROM profile WHERE id_name='$id_name' ";
    $hasil_query = mysqli_query($connect_db, $query);

    //periksa query, apakah ada kesalahan
    if(!$hasil_query) {
      die ("Gagal menghapus data: ".mysqli_errno().
           " - ".mysqli_error());
    }
  }
  // melakukan redirect ke halaman index.php
  header("location:tampil.php");
?>

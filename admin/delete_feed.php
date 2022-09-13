<?php
// buka koneksi dengan MySQL
  include("../dbconnect.php");

  //mengecek apakah di url ada GET id
  if (isset($_GET["id_feedback"])) {

    // menyimpan variabel id dari url ke dalam variabel $id
    $id_feedback = $_GET["id_feedback"];

    //jalankan query DELETE untuk menghapus data
    $query = "DELETE FROM feedback WHERE id_feedback='$id_feedback' ";
    $hasil_query = mysqli_query($connect_db, $query);

    //periksa query, apakah ada kesalahan
    if(!$hasil_query) {
      die ("Gagal menghapus data: ".mysqli_error().
           " - ".mysqli_error());
    }
  }
  // melakukan redirect ke halaman index.php
  header("location:tampilfeedback.php");
?>

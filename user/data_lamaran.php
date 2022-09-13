<?php
  session_start();

//cek apakah user sudah login
if(!isset($_SESSION['email'])){
die("Anda belum login");//jika belum login jangan lanjut..
}

//cek level user
if($_SESSION['level']!="user"){
die("Anda bukan admin");//jika bukan admin jangan lanjut
}

$id_user = $_SESSION['id_user'];

?> 

<style type="text/css">
  body{
        background: url(menu_user2.jpg) no-repeat fixed center;
      }
</style>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo "Welcome - ".$_SESSION['email']."";?></title>
<link rel="stylesheet" href="../assets/css/bootstrap.min.css" type="text/css"  />
<link rel="stylesheet" href="../style.css" type="text/css" />
<script>
function myFunction() {
    var x = document.getElementById("Btn");
    x.disabled = true;
}
</script>

</head>
<body>

  <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
         <a class="navbar-brand" href="welcome.php"><img src="../images/logo/logo.png" height="25" width="60"></a>
          <ul class="nav navbar-nav">
              <li><a href="input.php"><b>Isi Form</b></a></li> <!-- 2 -->
              <li><a href="ambil_formasi.php"><b>Formasi</b></a></li> <!-- 3 -->
              <li><a href="data_lamaran.php"><b>Data Lamaran</b></a></li> <!-- 4 -->
               </ul>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            
            <li class="dropdown">
              <a href="../log.php?op=out" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
        <span class="glyphicon glyphicon-user"></span>&nbsp;<?php echo "Halo ' ".$_SESSION['email']."";?>&nbsp;<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="../log.php?op=out"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Keluar</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav> 

  <div id="wrapper">

  <div class="container">
      <div class="page-header text-center">
     <img style="" src="../images/logo/rejobbunder.png" width="100">
      </div>
        
        <div class="row">
        <div class="col-lg-12">
            <head>
            <style>
              table{
                width: 840px;
                margin: auto;
              }
              h1{
                text-align: center;
              }
              td, th{
                text-align: center;
              }
            </style>
          </head>
          <body>
            <h1>Data Lamaran</h1>
            <br>
            <br/>
            <div class="col-md-12" style="text-align: right; padding-bottom: 15px;">
              <a class="btn btn-info" href="pesan.php" role="button" align="left">Pesan</a>
                <a class="btn btn-sm btn-danger" href="welcome.php" role="button">Kembali</a>
            </div>
            
            <br>
             <br>
            <table class="table table-hover">
              <tr>
                <th>Nama Perusahaan</th>
                <th>Status</th>
                <th>Hasil</th>
              </tr>
              <?php
              include "../dbconnect.php";
              $query = mysqli_query($connect_db, "SELECT * FROM `ambil_formasi`, `status` WHERE ambil_formasi.id_user = '$id_user'");
              while($data = mysqli_fetch_array($query))
              {
                echo "<tr>";
                echo "<td>$data[4]</td>"; //menampilkan data nim
                // membuat link untuk mengedit dan menghapus data
                if ($data[8] == 'belum' && $data[9] == 'belum'){
                	 echo '<td><b>Menunggu Konfirmasi</b></td>';
                
                }
                else if ($data[7] == 'belum' && $data[8] == 'sudah' && $data[9] == 'belum'){
                   echo '<td><b>Lihat Pesan untuk Sesi Selanjutnya</b></td>';
                
                }
                else if ($data[7] == 'belum' && $data[8] == 'belum' && $data[9] == 'sudah'){
                   echo '<td><b>Maaf, Anda gagal</b></td>';
                
                }
                else if ($data[10] == 'Diterima'){
                  echo '<td><b>Diterima, Lihat Pesan</b></td>';
                }

                else if ($data[10] == 'Ditolak'){
                  echo '<td><b>Ditolak, Lihat Pesan</b></td>';
                }
                else{
                  echo '<td><b>Lihat Pesan</b></td>';
                }
                //
                if($data[7] == 'sudah') {
                  echo '<td><a href="detail_report.php?id_status='.$data[11].'"><img src="pdf.png" width="35" height="35"></a></td>';
                }
                else {
                  echo '<td>-</td>';
                }
                echo "</tr>";
              }
              ?>
            </table>
              </div>
        </div>
        </div>
    
    </div>
    
    </div>
    
    <script src="assets/jquery-1.11.3-jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</body>
</html>
<?php ob_end_flush(); ?>

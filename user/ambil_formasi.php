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
    <input type="hidden" name="id_user">
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
            <h1>Daftar Formasi</h1>
            <br>
            <br/>
             <div class="col-md-12" style="text-align: right; padding-bottom: 15px;">
                <a class="btn btn-sm btn-danger" href="welcome.php" role="button">Kembali</a>
              </div>
            <table class="table table-hover">
              <tr>
                <th>Nama Perusahaan</th>
                <th>Posisi</th>
                <th>Tanggal Buka</th>
                <th>Tanggal Tutup</th>
                <th>Ambil</th>
              </tr>
              <?php
              include "../dbconnect.php";
              $query = mysqli_query($connect_db, "SELECT * FROM `perusahaan` ORDER BY tgl_tutup ASC");
              while($data = mysqli_fetch_array($query))
              {
                $tgl_buka = date("d F Y", strtotime($data[10]));
                $tgl_tutup = date("d F Y", strtotime($data[11]));
                echo "<tr>";
                echo "<td>$data[2]</td>"; //menampilkan data nim
                echo "<td>$data[9]</td>"; //menampilkan data nama
                echo "<td>$tgl_buka</td>"; //menampilkan data nama
                echo "<td>$tgl_tutup</td>"; //menampilkan data nama
                // membuat link untuk mengedit dan menghapus data
                //
                $status = mysqli_query($connect_db, "SELECT * FROM ambil_formasi WHERE id_user=$id_user AND id_per=$data[id_per]");

                if(mysqli_num_rows($status)>0){
                   echo '<td>Sudah diambil</td>';   
                  
                }
                else{
                   echo '<td><a class="btn btn-info" id="Btn" href="proses_formasi.php?id_per='.$data[0].'" role="button">Ambil</a></td>';  
                }
                echo "</tr>";
                
          // menambah nilai nomor urut
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

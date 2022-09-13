<?php
  session_start();

//cek apakah user sudah login
if(!isset($_SESSION['email'])){
die("Anda belum login");//jika belum login jangan lanjut..
}

//cek level user
if($_SESSION['level']!="perusahaan"){
die("Anda bukan admin");//jika bukan admin jangan lanjut
}

$id_user = $_SESSION['id_user'];
?> 
<style type="text/css">
  body{
        background: url(menu_per2.jpg) no-repeat fixed center;
      }
</style>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo "Welcome - ".$_SESSION['email']."";?></title>
<link rel="stylesheet" href="../assets/css/bootstrap.min.css" type="text/css"  />
<link rel="stylesheet" href="../style.css" type="text/css" />
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
           <a class="navbar-brand" href="welcomeper.php"><img src="../images/logo/logo.png" height="25" width="60"></a>
               <ul class="nav navbar-nav" >
              <li><a href="input_per.php"><b>Formasi</b></a></li> <!-- 2 -->
              <li><a href="tampil_pelamar.php"><b>Data Pelamar</b></a></li> <!-- 3 -->
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
    <br><br>
      <div class="page-header text-center">
     <img style="" id="shaniku" src="../images/logo/rejobbunder.png" width="80" height="80" alt="...">
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
            <form>
            <input class="form-control" type="hidden" name="id_per" id="id_per" value="<?php echo '$id_per';?>">
            </form>
            <h1>Daftar Pelamar Kerja</h1>
            <br>
            <br/>
            <div class="col-md-12" style="text-align: right; padding-bottom: 15px;">
              <a class="btn btn-success" href="reporttampil.php" role="button"><img src="../assets/img/report.png" width="20" height="20" align="left"></a>
              <a class="btn btn-sm btn-danger" href="welcomeper.php" role="button">Kembali</a>
            </div>
            <table class="table table-hover">
              <tr>
                <th>Name</th>
                <th>Address</th>
                <th>Telephone</th>
                 <th>Detail</th>
                 <th>Kirim Pesan</th>
                 <th>Status</th>
              </tr>
              <?php
              include "../dbconnect.php";
              $query = mysqli_query($connect_db, "SELECT profile.id_name, profile.name, profile.address, profile.phone, ambil_formasi.sts_submit, ambil_formasi.kirim_accept, ambil_formasi.kirim_reject, ambil_formasi.stat FROM `profile`, `ambil_formasi` WHERE profile.id_user = ambil_formasi.id_user AND ambil_formasi.id_user_2 = '$id_user';");
              while($data = mysqli_fetch_array($query))
              {
                echo "<tr>";
                echo "<td>$data[1]</td>"; //menampilkan data nim
                echo "<td>$data[2]</td>"; //menampilkan data nama
                echo "<td>$data[3]</td>"; //menampilkan data fakultas
                // membuat link untuk mengedit dan menghapus data
                echo '<td>
                    <a class="btn btn-warning" href="detail_pelamar.php?id_name='.$data[0].'" role="button"><img src="../assets/img/detail.png" width="20" height="20"></a>
                </td>';

                if ($data[5] == 'belum' && $data[6] == 'belum') {
                echo '<td>
                    <a class="btn btn-default" id="Btn" href="sendemail.php?id_name='.$data[0].'" role="button" onclick="this.disabled="disabled";"><img src="../assets/img/send.png" width="20" height="20"></a>
                    <a class="btn btn-danger" id="Btn" href="rejectemail.php?id_name='.$data[0].'" role="button" onclick="this.disabled="disabled";"><img src="../assets/img/send.png" width="20" height="20"></a>
                </td>';
                }
                else if ($data[5] == 'belum' && $data[6] == 'sudah') {
                 echo '<td><b>Gagal</b></td>';
                }

                else if ($data[7] == 'Diterima'){
                  echo '<td><b>Diterima</b></td>';
                }

                 else if ($data[7] == 'Ditolak'){
                  echo '<td><b>Ditolak</b></td>';
                }

                else{
                  echo '<td><b>Sesi Selanjutnya</b></td>';    
                }

                if ($data[4] == 'belum') {
                echo '<td>
                    <a class="btn btn-info" href="status.php?id_name='.$data[0].'" role="button"><img src="../assets/img/status.png" width="20" height="20"></a>
                </td>';                  
                }else{
                  echo '<td><b>Done!</b></td>';    
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

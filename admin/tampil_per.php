<?php
session_start();

//cek apakah user sudah login
if(!isset($_SESSION['email'])){
die("Anda belum login");//jika belum login jangan lanjut..
}

//cek level user
if($_SESSION['level']!="admin"){
die("Anda bukan admin");//jika bukan admin jangan lanjut
}

include "../dbconnect.php";
$curdate=date("Y-m-d");
$var = mysqli_query($connect_db, "SELECT * FROM `perusahaan` WHERE `tgl_tutup` = '$curdate'");
$data = mysqli_fetch_assoc($var);

    $id_user = $data["id_user"];

mysqli_query($connect_db, "DELETE FROM perusahaan WHERE tgl_tutup='$curdate'");
mysqli_query($connect_db, "UPDATE `login` SET `stat`='belum' WHERE id_user = $id_user");

?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo "Welcome - ".$_SESSION['email']."";?></title>
<link rel="stylesheet" href="../assets/css/bootstrap.min.css" type="text/css"  />
<link rel="stylesheet" href="../style.css" type="text/css" />
</head>
<body style=" background: url(menu_admin1.png) no-repeat fixed center;">

  <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href=""><img src="../images/logo/logo.png" height="25" width="60"></a>
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
      <div class="text-center">
        <br/><br/>
     <img style="" src="../images/logo/rejobitem.png" width="100">
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
            <h1>Daftar Perusahaan</h1>
            <br><br>
            <br/>
            <div class="col-md-12" style="text-align: right; padding-bottom: 15px;">
                <a class="btn btn-sm btn-danger" href="welcomeadmin.php" role="button">Kembali</a>
            </div>
            <table class="table table-hover">
              <tr>
                <th>Nama Perusahaan</th>
                <th>Alamat</th>
                <th>Telepon</th>
                 <th>Aksi</th>
              </tr>
              <?php
              include "../dbconnect.php";
              $query = mysqli_query($connect_db, "SELECT * FROM `perusahaan` ORDER BY `perusahaan`.`id_per` ASC");

              while($data = mysqli_fetch_array($query))
              {
                echo "<tr>";
                echo "<td>$data[2]</td>"; //menampilkan data nim
                echo "<td>$data[4]</td>"; //menampilkan data nama
                echo "<td>$data[5]</td>"; //menampilkan data fakultas
                // membuat link untuk mengedit dan menghapus data
                echo '<td>
                  <a class="btn btn-primary" href="edit_per.php?id_per='.$data[0].'" role="button"><img src="../assets/img/edit.png" width="20" height="20"></a>
                  <a class="btn btn-danger" href="delete_per.php?id_per='.$data[0].'"
                    onclick="return confirm(\'Anda yakin akan menghapus data?\')"><img style="" src="../assets/img/delete.png" width="20" height="20"></a>
                    <a class="btn btn-warning" href="detail_per.php?id_per='.$data[0].'" role="button"><img src="../assets/img/detail.png" width="20" height="20"></a>
                </td>';

                

                echo "</tr>";
          // menambah nilai nomor urut
              }
              ?>
            </table>
            <!--<h4>Report</h4>
                  <a class="btn btn-success" href="reporttampil.php" role="button"><img src="../assets/img/report.png" width="20" height="20"></a>-->
              </div>
        </div>
        </div>
    
    </div>
    
    </div>
    
    <script src="../assets/jquery-1.11.3-jquery.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>  
    
</body>
</html>
<?php ob_end_flush(); ?>

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

include "../dbconnect.php";
$id = $_GET["id_status"];

$var = mysqli_query($connect_db, "SELECT * FROM `status` WHERE `id_status` = '$id'");
$data = mysqli_fetch_array($var);

    $id_status = $data['id_status'];
    $name = $data['name'];
    $dob = $data['dob'];
    $religion = $data['religion'];
    $phone = $data['phone'];
    $email = $data['email'];
    $address = $data['address'];
    $photo = $data['photo'];
    $w_score = $data['w_score'];
    $i_score = $data['i_score'];
    $comment = $data['comment'];
    $status = $data['status'];

?>

<style>
      h2, p{
        text-align: center;
      }
      img.kiri {
    float: center;
    
}
body{
        background: url(menu_per5.jpg) no-repeat fixed center;
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
<br><br><br><br>
        <div class="col-md-3">
            <aside class="profile-nav alt blue-border">
                <section class="panel">
                <div class="fh5co-contact-info">
                    <div class="bg-warning text-white">
                        <img style="display: block; margin: 0 auto; text-align: center; width: 200px; height: 200px;" src="../admin/gambar/user/<?php echo $photo; ?>" />
                        <h2><?php echo $name?></h2>
                        <p><?php echo $email?></p>
                    </div>
                    <ul class="nav nav-pills nav-stacked">
                        <li><a> <i class="glyphicon glyphicon-calendar"></i><span> <?php echo $dob?></span></a></li>
                        <li><a> <i class="glyphicon glyphicon-certificate"></i><span> <?php echo $religion?></span></a></li>
                        <li><a> <i class="glyphicon glyphicon-home"></i><span> <?php echo $address?></span></a></li>
                        <li><a> <i class="glyphicon glyphicon-phone"></i><span> <?php echo $phone?></span></a></li>
                    </ul>
                    </div>
                </section>
            </aside>
        </div>
        <div class="col-md-9">
            <section class="panel">
                <header class="panel-heading">
                    History Status 
                    <div class="col-md-12" style="text-align: right; padding-bottom: 15px;">
              <a class="btn btn-sm btn-danger" href="reporttampil.php" role="button">Kembali</a>
            </div>
                </header>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <td>Nilai Tes Tulis</td>
                                <td>Nilai Sesi Interview</td>
                                <td>Komentar</td>
                                <td>Status</td>
                            </tr>
                        </thead>
                        <tbody data-bind='foreach: profile.History'>
                            <tr>
                                <td><?php echo $w_score?></td>
                                <td><?php echo $i_score?></td>
                                <td><?php echo $comment?></td>
                                <td><?php echo $status?></td>
                                
                            </tr>
                        </tbody>                
                    </table>
                </div>
            </section>
        </div>
    </div>

        <script src="assets/jquery-1.11.3-jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    
</body>
</html>
<?php ob_end_flush(); ?>
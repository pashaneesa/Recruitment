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
$id = $_GET["id_per"];

$var = mysqli_query($connect_db, "SELECT * FROM `perusahaan` WHERE `id_per` = '$id'");
$data = mysqli_fetch_assoc($var);

    $id_per = $data["id_per"];
    $nama_per = $data["nama_per"];
    $nama_dir = $data["nama_dir"];
    $alamat = $data["alamat"];
    $no_tlp = $data["no_tlp"];
    $email = $data["email"];
    $deskripsi = $data["deskripsi"];
    $visi_misi = $data["visi_misi"];
    $posisi = $data["posisi"];
    $tgl_buka = date("d F Y", strtotime($data['tgl_buka']));
    $tgl_tutup = date("d F Y", strtotime($data['tgl_tutup']));
    $foto = $data["foto"];
    
?>

<style> 
      h1{
        text-align: center;
      }body{
        background: url(menu_admin1.png) no-repeat fixed center;
      }
      .te{
        text-align: center;
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

    <div>
    <br/><br/><br/><br/><br/>
     <center><img style="" src="../images/logo/rejobitem.png" width="100"></center>
      </div>


            <h1>Detail Data Perusahaan</h1>
            <br>
            <div class="container">
              <form action="proses_inp.php" method="post" enctype="multipart/form-data">
                                <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-12" style="text-align: right; padding-bottom: 15px;">
                                                   <a class="btn btn-sm btn-danger" href="tampil_per.php" role="button">Kembali</a>
                                                </div>
                                                <div class="col-md-12"><h3>Data perusahaan</h3></div>
                                                <br>
                                                <div class="col-md-3">
                                                    <div class="form">
                                                        <div class="form-group">
                                                            <label>Nama Perusahaan</label>
                                                            <h5><?php echo $nama_per?></h5>
                                                        </div>
                                                    </div>
                                                    <div class="form">
                                                        <div class="form-group">
                                                            <label>Nama Direktur</label>
                                                            <h5><?php echo $nama_dir?></h5>
                                                        </div>
                                                    </div>
                                                     <div class="form">
                                                        <div class="form-group">
                                                            <label>Alamat</label>
                                                            <h5><?php echo $alamat?></h5>
                                                        </div>
                                                    </div> 
                                                </div>

                                                <div class="row">                
                                                <div class="col-md-3">
                                                     <div class="form">
                                                        <div class="form-group">
                                                            <label>No. Telp Perusahaan</label>
                                                            <h5><?php echo $no_tlp?></h5>
                                                        </div>
                                                    </div>

                                                    <div class="form">
                                                        <div class="form-group">
                                                            <label>Email Perusahaan</label>
                                                            <h5><?php echo $email?></h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <div class="fileinput-new thumbnail" style="margin-top:20px;">
                                                            <img style="" id="img-ex" src="gambar/perusahaan/<?php echo $foto ?>" alt="...">
                                                        </div>
                                                    </div>
                                                </div>
                                                     
                                                </div>
                                                    <p align="center">------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</p>
                                    <div class="panel-body">
                                            <div class="row">
                                                <h3>Posisi yang dibutuhkan</h3>
                                                <br>
                                                <div class="col-md-3">
                                                    <div class="form">
                                                        <div class="form-group">
                                                            <label>Pilih posisi</label>
                                                                <h5><?php echo $posisi?></h5>
                                                        </div>
                                                    </div>
                                                </div>
                                              </div>
                                            </div>

                                            

                                            <br>
                                             <p align="center">------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</p>
                                    <div class="panel-body">
                                            <div class="row">
                                                <h3>Deskripsi Perusahaan</h3>
                                                <br>
                                                <div class="col-md-9">
                                                    <div class="form-group">
                                                            <label>Deskripsi Perusahaan</label>
                                                            <h5><?php echo $deskripsi?></h5>
                                                        </div>

                                                </div>
                                                 <div class="col-md-9">
                                                    <div class="form-group">
                                                            <label>Visi & Misi Perusahaan</label>
                                                            <h5><?php echo $visi_misi?></h5>
                                                        </div>
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="form-group">
                                                        <label>Tanggal Buka</label><br>
                                                        <h5><?php echo $tgl_buka?></h5>
                                                    </div>
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="form-group">
                                                        <label>Tanggal Tutup</label><br>
                                                        <h5><?php echo $tgl_tutup?></h5>
                                                    </div>
                                                </div>

                                            </div>
                                    </div>

                                    <br>
                                        <input type="submit" name="edit" value="Edit" class="btn btn-sm btn-success">


                </form>

        

<!--  <?php
 if (isset($_POST['save'])){
 $fileName = $_FILES['gambar']['name'];
  // Simpan ke Database
  $sql = "insert into simpan (gambar, keterangan) values ('$fileName', '".$_POST['keterangan']."')";
  mysql_query($sql);
  // Simpan di Folder Gambar
  move_uploaded_file($_FILES['gambar']['tmp_name'], "gambar/".$_FILES['gambar']['name']);
  echo"<script>alert('Gambar Berhasil diupload !');history.go(-1);</script>"; 
 } 
?> -->

            </div>

    <script src="../assets/jquery-1.11.3-jquery.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    
</body>
</html>
<?php ob_end_flush(); ?>
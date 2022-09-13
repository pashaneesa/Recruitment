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
    $posisi = explode(', ', $data["posisi"]);
    $tgl_buka = $data["tgl_buka"];
    $tgl_tutup = $data["tgl_tutup"];
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
    <script type="text/javascript">
        function cekForm(){
            var nama_per = document.getElementById("nama_per").value;
            var nama_dir = document.getElementById("nama_dir").value;
            var alamat = document.getElementById("alamat").value;
            var no_tlp = document.getElementById("no_tlp").value;
            var email = document.getElementById("nationality").value;
            var tinggi = document.getElementById("height").value;
            var berat = document.getElementById("width").value;
            var tlp = document.getElementById("phone").value;
            var gambar = document.getElementById("gambar").value;
            var name_e = document.getElementById("name_e").value;
            var y_start = document.getElementById("y_start").value;
            var y_end = document.getElementById("y_end").value;
            var why_join = document.getElementById("why_join").value;
            var yourself = document.getElementById("yourself").value;
            var reasons = document.getElementById("reasons").value;

            var no="";
            no = tlp.value;
            if((no.length < 6) || (no.length > 8)){
                alert("Panjang no. telepon tidak sesuai");
            }

        }


        function hanyaAngka(evt) {
          var charCode = (evt.which) ? evt.which : event.keyCode
           if (charCode > 31 && (charCode < 48 || charCode > 57))
 
            return false;
          return true;
        }

        function cekuser(a) {
                valid = /^[A-Za-z]{1,}$/;
                return valid.test(a);
            }
    </script>

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

    <div class="text-center">
    <br><br><br><br>
     <img style="" src="../images/logo/rejobitem.png" width="100">
      </div>


            <h1>Edit Data Perusahaan</h1>
            <br>
            <div class="container">
              <form action="proses_editper.php" method="post" enctype="multipart/form-data">
                                <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-12" style="text-align: right; padding-bottom: 15px;">
                                                   <a class="btn btn-sm btn-danger" href="tampil_per.php" role="button">Kembali</a>
                                                </div>
                                                <div class="col-md-12">
                                                <h3>Data Perusahaan</h3>
                                                </div>
                                                <br>
                                                <input class="form-control" type="hidden" name="id_per" id="id_per" value="<?php echo $id_per?>">
                                                <div class="col-md-3">
                                                    <div class="form">
                                                        <div class="form-group">
                                                            <label>Nama Perusahaan</label>
                                                            <input class="form-control" type="text" name="nama_per" id="nama_per" value="<?php echo $nama_per?>" required data-required-msg="Ktp is required">
                                                        </div>
                                                    </div>
                                                    <div class="form">
                                                        <div class="form-group">
                                                            <label>Nama Direktur</label>
                                                            <input class="form-control" type="text" name="nama_dir" id="nama_dir" required data-required-msg="Ktp is required" value="<?php echo $nama_dir?>">
                                                        </div>
                                                    </div>
                                                     <div class="form">
                                                        <div class="form-group">
                                                            <label>Alamat</label>
                                                            <textarea class="form-control" type="text" name="alamat" required data-required-msg="Ktp is required"><?php echo $alamat ?></textarea>
                                                        </div>
                                                    </div>
                                                
                                                    
                                                </div>

                                                 <div class="row">
                                                
                                                
                                                <div class="col-md-3">
                                                     <div class="form">
                                                        <div class="form-group">
                                                            <label>No. Telp Perusahaan</label>
                                                            <input class="form-control" type="text" name="no_tlp" id="no_tlp" required data-required-msg="Ktp is required" onkeypress="return hanyaAngka(event)" maxlength="12" value="<?php echo $no_tlp?>">
                                                            <span data-for="dob" class="k-invalid-msg"></span>
                                                        </div>
                                                    </div>

                                                    <div class="form">
                                                        <div class="form-group">
                                                            <label>Email Perusahaan</label>
                                                            <input class="form-control" type="text" name="email" id="email" required data-required-msg="Ktp is required" value="<?php echo $email?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <div class="fileinput-new thumbnail" style="margin-top:20px;">
                                                            <img style="" id="img-ex" src="gambar/perusahaan/<?php echo $foto ?>" alt="...">
                                                        </div>
                                                        <div class="fileContainer btn btn-sm btn-default"><i class="fa fa-camera"></i> Pilih Gambar
                                                            <input name="gambar" type="file">
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
                                                                <div class="radio" style="padding-bottom:3px;">
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" name="posisi[]" id="optionsRadios3" value="admin" <?php in_array ('admin', $posisi) ? print "checked" : ""; ?>>
                                                                      Admin
                                                                    </label>
                                                                    <br>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" name="posisi[]" id="optionsRadios4" value="marketing" <?php in_array ('marketing', $posisi) ? print "checked" : ""; ?>>
                                                                      Marketing
                                                                    </label>
                                                                    <br>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" name="posisi[]" id="optionsRadios5" value="accounting" <?php in_array ('accounting', $posisi) ? print "checked" : ""; ?>>
                                                                      Accounting
                                                                    </label>
                                                                    <br>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" name="posisi[]" id="optionsRadios6" value="karyawan" <?php in_array ('karyawan', $posisi) ? print "checked" : ""; ?>>
                                                                      Karyawan
                                                                    </label>
                                                                    <br>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" name="posisi[]" id="optionsRadios7" value="security" <?php in_array ('security', $posisi) ? print "checked" : ""; ?>>
                                                                      Security
                                                                    </label>
                                                                </div>
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
                                                            <textarea class="form-control" type="text" name="deskripsi" required data-required-msg="Ktp is required"><?php echo $deskripsi ?></textarea>
                                                        </div>

                                                </div>
                                                 <div class="col-md-9">
                                                    <div class="form-group">
                                                            <label>Visi & Misi Perusahaan</label>
                                                            <textarea class="form-control" type="text" name="visi_misi" required data-required-msg="Ktp is required"><?php echo $visi_misi ?></textarea>
                                                        </div>
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="form-group">
                                                        <label>Tanggal Buka</label><br>
                                                        <input type="date" name="tgl_buka" required data-required-msg="Ktp is required" value="<?php echo $tgl_buka ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="form-group">
                                                        <label>Tanggal Tutup</label><br>
                                                        <input type="date" name="tgl_tutup" required data-required-msg="Ktp is required" value="<?php echo $tgl_tutup ?>">
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
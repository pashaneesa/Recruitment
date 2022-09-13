<?php
 session_start();

//cek apakah user sudah login
if(!isset($_SESSION['email'])){
die("Anda belum login");//jika belum login jangan lanjut..
}

//cek level user
if($_SESSION['level']!="perusahaan"){
die("Anda bukan perusahaan");//jika bukan admin jangan lanjut
}
$user = $_SESSION['id_user'];

$date = date('d F Y');
?>

<style> 
      body{
        background: url(menu_per1.jpg) no-repeat fixed center;
      }
      h1{
        text-align: center;
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

    <div class="page-header text-center">
    <br><br><br><br>
     <img style="" id="shaniku" src="../images/logo/rejobbunder.png" width="80" height="80" >
      </div>


            <h1>Isi Data Perusahaan</h1>
            <br>
            <div class="container">
              <form action="proses_inp.php" method="post" enctype="multipart/form-data">
                <input class="form-control" type="hidden" name="id_user" value="<?php echo $_SESSION['id_user']?>">
                                <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-12" style="text-align: right; padding-bottom: 15px;">
                                                   <a class="btn btn-sm btn-danger" href="welcomeper.php" role="button">Kembali</a>
                                                </div>
                                                <h3>Data Perusahaan</h3>
                                                <br>
                                                <div class="col-md-3">
                                                    <div class="form">
                                                        <div class="form-group">
                                                            <label>Nama Perusahaan</label>
                                                            <input class="form-control" type="text" name="nama_per" id="nama_per" required data-required-msg="Ktp is required">
                                                        </div>
                                                    </div>
                                                    <div class="form">
                                                        <div class="form-group">
                                                            <label>Nama Direktur</label>
                                                            <input class="form-control" type="text" name="nama_dir" id="nama_dir" required data-required-msg="Ktp is required">
                                                        </div>
                                                    </div>
                                                     <div class="form">
                                                        <div class="form-group">
                                                            <label>Alamat</label>
                                                            <textarea class="form-control" type="text" name="alamat" id="alamat" required data-required-msg="Ktp is required"></textarea>
                                                        </div>
                                                    </div>
                                                
                                                    
                                                </div>

                                                 <div class="row">
                                                
                                                
                                                <div class="col-md-3">
                                                     <div class="form">
                                                        <div class="form-group">
                                                            <label>No. Telp Perusahaan</label>
                                                            <div class="input-group">
                                                                <span class="input-group-addon">+62</span>
                                                                <span data-for="height" class="k-invalid-msg"></span>
                                                                <input class="form-control" type="text" name="no_telp" id="no_telp" required data-required-msg="Ktp is required" onkeypress="return hanyaAngka(event)" maxlength="12">
                                                                <span data-for="dob" class="k-invalid-msg"></span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form">
                                                        <div class="form-group">
                                                            <label>Email Perusahaan</label>
                                                            <input class="form-control" type="email" name="email" id="email" required data-required-msg="Ktp is required" value="<?php echo $_SESSION['email']?>" readonly=""/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form">
                                                        <div class="form-group">
                                                            <label>Logo Perusahaan</label>
                                                            <div class="fileContainer btn btn-sm btn-default"><i class="fa fa-camera"></i> Pilih Gambar<br><br>
                                                            <input name="gambar" type="file" required data-required-msg="Ktp is required">
                                                        </div>
                                                        </div>
                                                    </div>                                                    
                                                </div>
                                                     
                                                </div>
                                                    <p align="center">------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</p>
                                    <div class="panel-body">
                                            <div class="row">
                                                <h3>Posisi yang dibutuhkan</h3>
                                                <p>(Jika Pilihan tidak ada dapat dijabarkan di form deskripsi)</p>
                                                <br>
                                                <div class="col-md-3">
                                                    <div class="form">
                                                        <div class="form-group">
                                                            <label>Pilih posisi</label>
                                                                <div class="radio" style="padding-bottom:3px;">
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" name="posisi[]" id="optionsRadios3" value="admin">
                                                                      Admin
                                                                    </label>
                                                                    <br>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" name="posisi[]" id="optionsRadios4" value="marketing">
                                                                      Marketing
                                                                    </label>
                                                                    <br>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" name="posisi[]" id="optionsRadios5" value="accounting">
                                                                      Accounting
                                                                    </label>
                                                                    <br>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" name="posisi[]" id="optionsRadios6" value="karyawan">
                                                                      Karyawan
                                                                    </label>
                                                                    <br>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" name="posisi[]" id="optionsRadios7" value="security" >
                                                                      Security
                                                                    </label>
                                                                </div>
                                                        </div>
                                                    </div>
                                                </div>
                                              </div>
                                            </div>
                                            
                                             <p align="center">------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</p>
                                    <div class="panel-body">
                                            <div class="row">
                                                <h3>Deskripsi Perusahaan</h3>
                                                <br>
                                                <div class="col-md-9">
                                                    <div class="form-group">
                                                            <label>Deskripsi Perusahaan</label>
                                                            <textarea class="form-control" type="text" name="deskripsi" required data-required-msg="Ktp is required"></textarea>
                                                        </div>

                                                </div>
                                                 <div class="col-md-9">
                                                    <div class="form-group">
                                                            <label>Visi & Misi Perusahaan</label>
                                                            <textarea class="form-control" type="text" name="visi" required data-required-msg="Ktp is required"></textarea>
                                                        </div>
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="form-group">
                                                        <label>Tanggal Buka</label><br>
                                                        <h5><?php echo $date?></h5>
                                                    </div>
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="form-group">
                                                        <label>Tanggal Tutup</label><br>
                                                        <input type="date" name="tgl_tutup" required data-required-msg="Ktp is required">
                                                    </div>
                                                </div>

                                            </div>
                                    </div>
                                   
                                             <input type="checkbox" name="correct" required data-required-msg="Email is required"/><b>Saya sudah Mengisi data dengan benar</b>
                                             <br><br>
                                        <?php
                                          include "../dbconnect.php";
                                          $query = mysqli_query($connect_db, "SELECT * FROM `login` WHERE id_user='$user'");
                                          while($data = mysqli_fetch_array($query))
                                          {

                                            if($data['stat']=='sudah'){
                                              echo "<script type='text/javascript'>
                                                    alert('Anda sudah mengisi form!'); window.location = 'welcomeper.php'</script>";  
                                              
                                            }
                                            if($data['stat']=='belum'){
                                                 echo '<input type="submit" name="input" value="Kirim" class="btn btn-sm btn-success">';
                                            }
                                            
                                          }
                                          ?>


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
<?php
session_start();

//cek apakah user sudah login
if(!isset($_SESSION['email'])){
die("Anda belum login");//jika belum login jangan lanjut..
}

//cek level user
if($_SESSION['level']!="user"){
die("Anda bukan user");//jika bukan admin jangan lanjut
}
$user = $_SESSION['id_user'];
?>

<style>
      h1{
        text-align: center;
      }
      .te{
        text-align: center;
      }
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
</head>
<body>
    <script type="text/javascript">
        function cekForm(){
            var ktp = document.getElementById("ktp").value;
            var nama = document.getElementById("name").value;
            var dob = document.getElementById("dob").value;
            var address = document.getElementById("address").value;
            var warga = document.getElementById("nationality").value;
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

    <div class="page-header text-center">
    <br><br><br><br>
     <img style="" src="../images/logo/logo.png" width="200">
      </div>


            <h1>Isi Data Anda</h1>
            <br>
            <div class="container">
              <form action="proses_input.php" method="post" enctype="multipart/form-data">
                <input class="form-control" type="hidden" name="id_user" value="<?php echo $_SESSION['id_user']?>">
                                <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-12" style="text-align: right; padding-bottom: 15px;">
                                                   <a class="btn btn-sm btn-danger" href="welcome.php" role="button">Kembali</a>
                                                </div>
                                                <h3>Personal Data</h3>
                                                <br>
                                                <div class="col-md-3">
                                                    <div class="form">
                                                        <div class="form-group">
                                                            <label>No. KTP</label>
                                                            <input class="form-control" type="text" name="ktp" id="ktp" onkeypress="return hanyaAngka(event)" maxlength="16" required data-required-msg="Ktp is required">
                                                        </div>
                                                    </div>
                                                    <div class="form">
                                                        <div class="form-group">
                                                            <label>Nama Lengkap</label>
                                                            <input class="form-control" type="text" name="name" id="name" required data-required-msg="Name is required">
                                                        </div>
                                                    </div>
                                                    <div class="form">
                                                        <div class="form-group">
                                                            <label>Tanggal Lahir</label>
                                                            <input class="form-control" type="date" name="dob" id="dob" required data-required-msg="Address is required">
                                                            <span data-for="dob" class="k-invalid-msg"></span>
                                                        </div>
                                                    </div>
                                                     <div class="form">
                                                        <div class="form-group">
                                                            <label>Alamat</label>
                                                            <textarea class="form-control" type="text" name="address" required data-required-msg="Address is required"></textarea>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <div class="form">
                                                        <div class="form-group">
                                                            <label>Jenis Kelamin</label>
                                                                <div class="radio" style="padding-bottom:3px;">
                                                                    <label class="checkbox-inline">
                                                                        <input type="radio" name="gender" id="optionsRadios1" value="Pria" required data-required-msg="Address is required">
                                                                      Pria
                                                                    </label>
                                                                    <label class="checkbox-inline">
                                                                        <input type="radio" name="gender" id="optionsRadios2" value="Wanita" required data-required-msg="Address is required">
                                                                      Wanita
                                                                    </label>
                                                                </div>
                                                        </div>
                                                    </div>
                                                    <div class="form">
                                                        <div class="form-group">
                                                            <label>Status</label>
                                                            <select class="form-control" name="status" required data-required-msg="Address is required">
                                                                <option value="" disabled selected style="display: none;">Pilih status...</option>
                                                                <option value="Single" id="single">Single</option>
                                                                <option value="Married" id="married">Menikah</option>
                                                                <option value="Widow" id="widow">Duda</option>
                                                                <option value="Widower" id="widower">Janda</option>
                                                            </select>
                                                            <span data-for="status" class="k-invalid-msg"></span>
                                                        </div>
                                                    </div>
                                                    <div class="form">
                                                        <div class="form-group">
                                                            <label>Agama</label>
                                                            <select class="form-control" name="religion"  required data-required-msg="Address is required">
                                                                <option value="" disabled selected style="display: none;">Pilih agama...</option>
                                                                <option value="Islam" id="">Islam</option>
                                                                <option value="Kristen" id="">Kristen</option>
                                                                <option value="Katolik" id="">Katolik</option>
                                                                <option value="Hindu" id="">Hindu</option>
                                                                <option value="Budha" id="">Budha</option>
                                                                <option value="Konghuchu" id="">Konghuchu</option>
                                                            </select>
                                                            <span data-for="religion" class="k-invalid-msg"></span>
                                                        </div>
                                                    </div>
                                                    <div class="form">
                                                        <div class="form-group">
                                                            <label>Golongan Darah</label>
                                                            <select class="form-control" name="blood" required data-required-msg="Address is required">
                                                                <option value="" disabled selected style="display: none;">Pilih golongan darah...</option>
                                                                <option value="O" id="">O</option>
                                                                <option value="A" id="">A</option>
                                                                <option value="B" id="">B</option>
                                                                <option value="AB" id="">AB</option>
                                                            </select>
                                                            <span data-for="blood" class="k-invalid-msg"></span>
                                                        </div>
                                                    </div>
                                                                
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form">
                                                        <div class="form-group">
                                                            <label>Kewarganegaraan</label>
                                                            <input class="form-control" type="text" name="nationality" id="nationality" required data-required-msg="Kewarganegaraan is required">
                                                        </div>
                                                    </div>
                                                     <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form">
                                                                <div class="form-group">
                                                                    <label>Tinggi</label>
                                                                    <div class="input-group">
                                                                        <input class="form-control" type="text" name="height" id="height" required data-required-msg="Phone is required" onkeypress="return hanyaAngka(event)">
                                                                        <span class="input-group-addon">Cm.</span>
                                                                    </div>
                                                                    <span data-for="height" class="k-invalid-msg"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form">
                                                                <div class="form-group">
                                                                    <label>Berat</label>
                                                                    <div class="input-group">
                                                                        <input class="form-control" type="text" name="weight" id="weight" required data-required-msg="berat is required" onkeypress="return hanyaAngka(event)">
                                                                        <span class="input-group-addon">Kg.</span>
                                                                    </div>
                                                                    <span data-for="weight" class="k-invalid-msg"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form">
                                                        <div class="form-group">
                                                            <label>Nomor Telepon</label>
                                                            <div class="input-group">
                                                                <span class="input-group-addon">+62</span>
                                                                <span data-for="height" class="k-invalid-msg"></span>
                                                                <input class="form-control" type="text" name="phone" id="phone" onkeypress="return hanyaAngka(event)" required data-required-msg="Phone is required" maxlength="11">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form">
                                                        <div class="form-group">
                                                            <label>Email</label>
                                                            <input class="form-control" type="email" name="email" id="email" required data-required-msg="Email is required" value="<?php echo $_SESSION['email']?>" readonly=""/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <div class="te">
                                                            <h5><b>Upload foto Anda</b></h5>
                                                        </div>
                                                        <div class="fileContainer btn btn-sm btn-default"><i class="fa fa-camera"></i> Pilih Gambar<br><br>
                                                            <input name="gambar" type="file" required data-required-msg="Gambar is required">
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                    </div>

                                    <br>
                                    <p align="center">------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</p>
                                    <div class="panel-body">
                                            <div class="row">
                                                <h3>Riwayat Pendidikan</h3>
                                                <br>
                                                <div class="col-md-3">
                                                    <div class="form">
                                                        <div class="form-group">
                                                            <label>Pendidikan Terakhir</label>
                                                                <div class="radio" style="padding-bottom:3px;">
                                                                    <label class="checkbox-inline">
                                                                        <input type="radio" name="education" id="optionsRadios3" value="SMP" required data-required-msg="Address is required">
                                                                      SMP
                                                                    </label>
                                                                    <br>
                                                                    <label class="checkbox-inline">
                                                                        <input type="radio" name="education" id="optionsRadios4" value="SMA" required data-required-msg="Address is required">
                                                                      SMA
                                                                    </label>
                                                                    <br>
                                                                    <label class="checkbox-inline">
                                                                        <input type="radio" name="education" id="optionsRadios5" value="SMK" required data-required-msg="Address is required">
                                                                      SMK
                                                                    </label>
                                                                    <br>
                                                                    <label class="checkbox-inline">
                                                                        <input type="radio" name="education" id="optionsRadios6" value="S1" required data-required-msg="Address is required">
                                                                      S1
                                                                    </label>
                                                                    <br>
                                                                    <label class="checkbox-inline">
                                                                        <input type="radio" name="education" id="optionsRadios7" value="S2" required data-required-msg="Address is required">
                                                                      S2
                                                                    </label>
                                                                </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                <div class="form">
                                                        <div class="form-group">
                                                            <label>Nama Pendidikan</label>
                                                            <input class="form-control" type="text" name="name_e" id="name_e" required data-required-msg="Pendidikan is required">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                <div class="form">
                                                        <div class="form-group">
                                                            <label>Tahun Mulai</label>
                                                            <input class="form-control" type="text" name="y_start" id="y_start" maxlength="4" required data-required-msg="Tahun Mulai is required" onkeypress="return hanyaAngka(event)">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                <div class="form">
                                                        <div class="form-group">
                                                            <label>Tahun Berakhir</label>
                                                            <input class="form-control" type="text" name="y_end" id="y_end" maxlength="4" required data-required-msg="Tahun Berakhir is required" onkeypress="return hanyaAngka(event)">
                                                        </div>
                                                    </div>
                                                </div>

                                                </div>

                                            </div>

                                            <br>

                                             <br>
                                    <p align="center">------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</p>
                                    <div class="panel-body">
                                            <div class="row">
                                                <h3>Pertanyaan</h3>
                                                <br>
                                                <div class="col-md-9">
                                                    <div class="form-group">
                                                            <label>Mengapa Anda ingin bergabung?</label>
                                                            <textarea class="form-control" type="text" name="why_join" required data-required-msg="Why is required"></textarea>
                                                        </div>
                                                </div>
                                                 <div class="col-md-9">
                                                    <div class="form-group">
                                                            <label>Jabarkan tentang diri Anda</label>
                                                            <textarea class="form-control" type="text" name="yourself" required data-required-msg="Yourself is required"></textarea>
                                                        </div>
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="form-group">
                                                            <label>Berikan alasan kepada perusahaan yang Anda inginkan mengapa mereka harus memilih Anda</label>
                                                            <textarea class="form-control" type="text" name="reasons" required data-required-msg="Alasan is required"></textarea>
                                                        </div>
                                                </div>
                                                </div>

                                            </div>
                                             <input type="checkbox" name="correct" required data-required-msg="Ini diisi"/> Saya sudah mengisi data dengan benar
                                             <br><br>
                                         <?php
                                          include "../dbconnect.php";
                                          $query = mysqli_query($connect_db, "SELECT * FROM `login` WHERE id_user='$user'");
                                          while($data = mysqli_fetch_array($query))
                                          {

                                            if($data['stat']=='sudah'){
                                               echo "<script type='text/javascript'>
                                                    alert('Anda sudah mengisi form!'); window.location = 'welcome.php'</script>";  
                                              
                                            }
                                            if($data['stat']=='belum'){
                                                 echo '<input type="submit" name="input" value="Kirim" class="btn btn-sm btn-success">';
                                            }
                                            
                                          }
                                          ?>


                </form>

            </div>


    
    <script src="../assets/jquery-1.11.3-jquery.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    
</body>
</html>
<?php ob_end_flush(); ?>
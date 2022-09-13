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
$id = $_GET["id_name"];

$var = mysqli_query($connect_db, "SELECT * FROM `profile` WHERE `id_name` = '$id'");
$data = mysqli_fetch_assoc($var);

    $id_name = $data["id_name"];
    $id_card = $data["id_card"];
    $name = $data["name"];
    $dob = $data["dob"];
    $religion = $data["religion"];
    $gender = $data["gender"];
    $status = $data["status"];
    $nationality = $data["nationality"];
    $height = $data["height"];
    $weight = $data["weight"];
    $phone = $data["phone"];
    $email = $data["email"];
    $blood = $data["blood"];
    $address = $data["address"];
    
    $education = $data["education"];
    $name_e = $data["name_e"];
    $y_start = $data["y_start"];
    $y_end = $data["y_end"];
    $why_join = $data["why_join"];
    $yourself = $data["yourself"];
    $reasons = $data["reasons"];
    $photo = $data["photo"];
?>

<style>
      h1{
        text-align: center;
      }body{
        background: url(menu_admin1.png) no-repeat fixed center;
      }
      .container{
        width: 400px;
        margin: auto;
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
         
        <div class="container">

         <br>
              <form action="proses_edit.php?id_name=<?php echo $id?>" method="post" enctype="multipart/form-data">
                <fieldset>
                        <div class="col-md-12">
                                        <div id="1" class="tab-pane">
                                            <h1>Edit Data</h1>
                                            <div class="row">
                                                <div class="col-md-12" style="text-align: right; padding-bottom: 15px;">
                                                    <a class="btn btn-sm btn-danger" href="tampil.php" role="button">Kembali</a>
                                                </div>

                                                
                                                <div class="col-md-12">
                                                    <h3>Personal Data</h3>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form">
                                                    <div class="form-group">
                                                            <input class="form-control" type="hidden" name="id_name" id="id_name" value="<?php echo $id_name?>" required data-required-msg="Address is required">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>No. KTP</label>
                                                            <input class="form-control" type="text" name="id_card" id="id_card" value="<?php echo $id_card?>" required data-required-msg="Address is required" onkeypress="return hanyaAngka(event)">
                                                        </div>
                                                    </div>
                                                    <div class="form">
                                                        <div class="form-group">
                                                            <label>Nama Lengkap</label>
                                                            <input class="form-control" type="text" name="name" id="name" value="<?php echo $name?>" required data-required-msg="Address is required">
                                                        </div>
                                                    </div>
                                                    <div class="form">
                                                        <div class="form-group">
                                                            <label>Tanggal Lahir</label>
                                                            <input class="form-control" type="date" name="dob" id="dob" value="<?php echo $dob ?>" required data-required-msg="Address is required">
                                                            <span data-for="dob" class="k-invalid-msg"></span>
                                                        </div>
                                                    </div>
                                                     <div class="form">
                                                        <div class="form-group">
                                                            <label>Alamat</label>
                                                            <textarea class="form-control" type="text" name="address" required data-required-msg="Address is required"><?php echo $address ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="col-md-3">
                                                    <div class="form">
                                                        <div class="form-group">
                                                            <label>Jenis Kelamin</label>
                                                                <div class="radio" style="padding-bottom:3px;">
                                                                    <label class="checkbox-inline">
                                                                        <input type="radio" name="gender" id="optionsRadios1" value="Pria" <?php if($gender=='Pria'){echo 'checked';}?>>
                                                                      Pria
                                                                    </label>
                                                                    <label class="checkbox-inline">
                                                                        <input type="radio" name="gender" id="optionsRadios2" value="Wanita" <?php if($gender=='Wanita'){echo 'checked';}?>>
                                                                      Wanita
                                                                    </label>
                                                                </div>
                                                        </div>
                                                    </div>
                                                    <div class="form">
                                                        <div class="form-group">
                                                            <label>Status</label>
                                                            <select class="form-control" name="status" data-required-msg="Select Status">
                                                                <option value="" disabled selected style="display: none;">Select status...</option>
                                                                <option value="Single" id="single" <?php if($data['status'] == 'Single'){ echo 'selected'; } ?>>Single</option>
                                                                <option value="Married" id="married" <?php if($data['status'] == 'Married'){ echo 'selected'; } ?>>Married</option>
                                                                <option value="Widow" id="widow" <?php if($data['status'] == 'Widow'){ echo 'selected'; } ?>>Widow</option>
                                                                <option value="Widower" id="widower" <?php if($data['status'] == 'Widower'){ echo 'selected'; } ?>>Widower</option>
                                                            </select>
                                                            <span data-for="status" class="k-invalid-msg"></span>
                                                        </div>
                                                    </div>
                                                    <div class="form">
                                                        <div class="form-group">
                                                            <label>Agama</label>
                                                            <select class="form-control" name="religion">
                                                                <option value="" disabled selected style="display: none;">Select religion...</option>
                                                                <option value="Islam" id="" <?php if($data['religion'] == 'Islam'){ echo 'selected'; } ?>>Islam</option>
                                                                <option value="Kristen" id="" <?php if($data['religion'] == 'Kristen'){ echo 'selected'; } ?>>Kristen</option>
                                                                <option value="Katolik" id="" <?php if($data['religion'] == 'Katolik'){ echo 'selected'; } ?>>Katolik</option>
                                                                <option value="Hindu" id="" <?php if($data['religion'] == 'Hindu'){ echo 'selected'; } ?>>Hindu</option>
                                                                <option value="Budha" id="" <?php if($data['religion'] == 'Budha'){ echo 'selected'; } ?>>Budha</option>
                                                                <option value="Konghuchu" id="" <?php if($data['religion'] == 'Konghuchu'){ echo 'selected'; } ?>>Konghuchu</option>
                                                            </select>
                                                            <span data-for="religion" class="k-invalid-msg"></span>
                                                        </div>
                                                    </div>
                                                    <div class="form">
                                                        <div class="form-group">
                                                            <label>Golongan Darah</label>
                                                            <select class="form-control" name="blood" data-required-msg="Select Blood">
                                                                <option value="" disabled selected style="display: none;">Select blood...</option>
                                                                <option value="O" id="" <?php if($data['blood'] == 'O'){ echo 'selected'; } ?>>O</option>
                                                                <option value="A" id="" <?php if($data['blood'] == 'A'){ echo 'selected'; } ?>>A</option>
                                                                <option value="B" id="" <?php if($data['blood'] == 'B'){ echo 'selected'; } ?>>B</option>
                                                                <option value="AB" id="" <?php if($data['blood'] == 'AB'){ echo 'selected'; } ?>>AB</option>
                                                            </select>
                                                            <span data-for="blood" class="k-invalid-msg"></span>
                                                        </div>
                                                    </div>
                                                                
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form">
                                                        <div class="form-group">
                                                            <label>Kewarganegaraan</label>
                                                            <input class="form-control" type="text" name="nationality" id="nationality" required data-required-msg="Address is required" value="<?php echo $nationality ?>">
                                                        </div>
                                                    </div>
                                                     <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form">
                                                                <div class="form-group">
                                                                    <label>Tinggi</label>
                                                                    <div class="input-group">
                                                                        <input class="form-control" type="text" name="height" id="height" required data-required-msg="Address is required" value="<?php echo $height ?>" onkeypress="return hanyaAngka(event)">
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
                                                                        <input class="form-control" type="text" name="weight" id="weight" required data-required-msg="Address is required" value="<?php echo $weight ?>" onkeypress="return hanyaAngka(event)">
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
                                                            <input class="form-control" type="text" name="phone" id="phone" required data-required-msg="Address is required" onkeypress="return hanyaAngka(event)" maxlength="12" value="<?php echo $phone ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form">
                                                        <div class="form-group">
                                                            <label>Email</label>
                                                            <input class="form-control" type="email" name="email" id="email" required data-required-msg="Address is required" value="<?php echo $email ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <div class="fileinput-new thumbnail" style="margin-top:20px;">
                                                            <img style="" id="img-ex" src="gambar/user/<?php echo $photo; ?>" alt="...">
                                                        </div>
                                                        <div class="fileContainer btn btn-sm btn-default"><i class="fa fa-camera"></i> Pilih Gambar
                                                            <input name="gambar" type="file">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                                                            <br>
                                    <p align="center">-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</p>
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
                                                                        <input type="radio" name="education" id="optionsRadios3" value="SMP" <?php if($education=='SMP'){echo 'checked';}?>>
                                                                      SMP
                                                                    </label>
                                                                    <br>
                                                                    <label class="checkbox-inline">
                                                                        <input type="radio" name="education" id="optionsRadios4" value="SMA" <?php if($education=='SMA'){echo 'checked';}?>>
                                                                      SMA
                                                                    </label>
                                                                    <br>
                                                                    <label class="checkbox-inline">
                                                                        <input type="radio" name="education" id="optionsRadios5" value="SMK" <?php if($education=='SMK'){echo 'checked';}?>>
                                                                      SMK
                                                                    </label>
                                                                    <br>
                                                                    <label class="checkbox-inline">
                                                                        <input type="radio" name="education" id="optionsRadios6" value="S1" <?php if($education=='S1'){echo 'checked';}?>>
                                                                      S1
                                                                    </label>
                                                                    <br>
                                                                    <label class="checkbox-inline">
                                                                        <input type="radio" name="education" id="optionsRadios7" value="S2" <?php if($education=='S2'){echo 'checked';}?>>
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
                                                            <input class="form-control" type="text" name="name_e" id="name_e" value="<?php echo $name_e ?>" required data-required-msg="Address is required">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                <div class="form">
                                                        <div class="form-group">
                                                            <label>Tahun Mulai</label>
                                                            <input class="form-control" type="text" name="y_start" id="y_start" value="<?php echo $y_start ?>" required data-required-msg="Address is required" onkeypress="return hanyaAngka(event)">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                <div class="form">
                                                        <div class="form-group">
                                                            <label>Tahun Berakhir</label>
                                                            <input class="form-control" type="text" name="y_end" id="y_end" value="<?php echo $y_end ?>" required data-required-msg="Address is required" onkeypress="return hanyaAngka(event)">
                                                        </div>
                                                    </div>
                                                </div>

                                                </div>

                                            </div>
                                    
                                    <p align="center">-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</p>
                                    <div class="panel-body">
                                            <div class="row">
                                                <h3>Pertanyaan</h3>
                                                <br>
                                                <div class="col-md-9">
                                                    <div class="form-group">
                                                            <label>Mengapa Anda ingin bergabung?</label>
                                                            <textarea class="form-control" type="text" name="why_join" required data-required-msg="Address is required"><?php echo $why_join ?></textarea>
                                                        </div>
                                                </div>
                                                 <div class="col-md-9">
                                                    <div class="form-group">
                                                            <label>Jabarkan tentang diri Anda</label>
                                                            <textarea class="form-control" type="text" name="yourself" required data-required-msg="Address is required"><?php echo $yourself ?></textarea>
                                                        </div>
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="form-group">
                                                            <label>Berikan alasan kepada kami mengapa harus memilih Anda</label>
                                                            <textarea class="form-control" type="text" name="reasons" required data-required-msg="Address is required"><?php echo $reasons ?></textarea>
                                                        </div>
                                                </div>

                                                </div>
                                                

                                            </div>

                                        <input type="submit" name="edit" value="Update Data" class="btn btn-sm btn-success">
                                        </section>
                                        </div>
                                        </fieldset>
                                    </form>
    
    <script src="../assets/jquery-1.11.3-jquery.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    
</body>
</html>
<?php ob_end_flush(); ?>
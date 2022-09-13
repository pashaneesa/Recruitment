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
    $dob = date("d F Y", strtotime($data['dob']));
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
      }

      h5{
        font-family: Arial, Helvetica, sans-serif; 
      }body{
        background: url(menu_admin1.png);
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
    <br/><br>
    <div class="text-center">
     <img style="" src="../images/logo/rejobitem.png" width="100">
      </div>
        
        <div class="row">
        <div class="col-lg-12">
        <h1>Detail Data</h1>
         <br>
<div class="container">
              <form action="" method="post">
                <fieldset>
                        <div class="col-md-12">
                                    <form id="recruitmentForm" class="tab-content" data-role="validator" novalidate="novalidate">
                                        <div id="1" class="tab-pane">
                                            <div class="row">
                                                <div class="col-md-12" style="text-align: right; padding-bottom: 15px;">
                                                    <a class="btn btn-sm btn-danger" href="tampil.php" role="button">Kembali</a>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form">
                                                        <div class="form-group">
                                                            <label>No. KTP</label>
                                                            <h5><?php echo $id_card?></h5>
                                                        </div>
                                                    </div>
                                                    <div class="form">
                                                        <div class="form-group">
                                                            <label>Nama Lengkap</label>
                                                           <h5><?php echo $name?></h5>
                                                        </div>
                                                    </div>
                                                    <div class="form">
                                                        <div class="form-group">
                                                            <label>Tanggal Lahir</label>
                                                            <h5><?php echo $dob?></h5>
                                                        </div>
                                                    </div>
                                                     <div class="form">
                                                        <div class="form-group">
                                                            <label>Alamat</label>
                                                            <h5><?php echo $address?></h5>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <div class="form">
                                                        <div class="form-group">
                                                            <label>Jenis Kelamin</label>
                                                                <h5><?php echo $gender?></h5>
                                                        </div>
                                                    </div>
                                                    <div class="form">
                                                        <div class="form-group">
                                                            <label>Status</label>
                                                            <h5><?php echo $status?></h5>
                                                        </div>
                                                    </div>
                                                    <div class="form">
                                                        <div class="form-group">
                                                            <label>Agama</label>
                                                            <h5><?php echo $religion?></h5>
                                                        </div>
                                                    </div>
                                                    <div class="form">
                                                        <div class="form-group">
                                                            <label>Golongan Darah</label>
                                                            <h5><?php echo $blood?></h5>
                                                        </div>
                                                    </div>
                                                                
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form">
                                                        <div class="form-group">
                                                            <label>Kewarganegaraan</label>
                                                           <h5><?php echo $nationality?></h5>
                                                        </div>
                                                    </div>
                                                     <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form">
                                                                <div class="form-group">
                                                                    <label>Tinggi</label>
                                                                    <div class="input-group">
                                                                        <h5><?php echo $height?> Cm.</h5>
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
                                                                       <h5><?php echo $weight?> Kg.</h5>
                                                                    </div>
                                                                    <span data-for="weight" class="k-invalid-msg"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form">
                                                        <div class="form-group">
                                                            <label>Nomor Telepon</label>
                                                          <h5><?php echo $phone?></h5>
                                                        </div>
                                                    </div>
                                                    <div class="form">
                                                        <div class="form-group">
                                                            <label>Email</label>
                                                           <h5><?php echo $email?></h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <div class="fileinput-new thumbnail" style="margin-top:20px;">
                                                            <img style="" id="img-ex" src="gambar/user/<?php echo $photo; ?>" alt="...">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    <br>
                                    <p align="center">-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</p>
                                    <div class="panel-body">
                                                <h3>Riwayat Pendidikan</h3>
                                                <br>
                                                <div class="col-md-3">
                                                    <div class="form">
                                                        <div class="form-group">
                                                            <label>Pendidikan Terakhir</label>
                                                                <h5><?php echo $education?></h5>
                                                                </div>
                                                        </div>
                                                    </div>
                                                <div class="col-md-3">
                                                <div class="form">
                                                        <div class="form-group">
                                                            <label>Nama Pendidikan</label>
                                                            <h5><?php echo $name_e?></h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                <div class="form">
                                                        <div class="form-group">
                                                            <label>Tahun Mulai</label>
                                                            <h5><?php echo $y_start?></h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                <div class="form">
                                                        <div class="form-group">
                                                            <label>Tahun Berakhir</label>
                                                            <h5><?php echo $y_end?></h5>
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
                                                            <h5><?php echo $why_join?></h5>
                                                        </div>
                                                </div>
                                                 <div class="col-md-9">
                                                    <div class="form-group">
                                                            <label>Jabarkan tentang diri Anda</label>
                                                            <h5><?php echo $yourself?></h5>
                                                        </div>
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="form-group">
                                                            <label>Berikan alasan kepada kami mengapa harus memilih Anda</label>
                                                            <h5><?php echo $reasons?></h5>
                                                        </div>
                                                </div>

                                                </div>

                                            </div>
                                    </form>

    
    <script src="../assets/jquery-1.11.3-jquery.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    
</body>
</html>
<?php ob_end_flush(); ?>
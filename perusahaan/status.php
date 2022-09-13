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

include "../dbconnect.php";
$id = $_GET["id_name"];

$var = mysqli_query($connect_db, "SELECT * FROM `profile` WHERE `id_name` = '$id'");
$data = mysqli_fetch_array($var);
    $id_name = $data['id_name'];
    $id_user = $data['id_user'];
    $name = $data['name'];
    $dob = $data['dob'];
    $religion = $data['religion'];
    $phone = $data['phone'];
    $email = $data['email'];
    $address = $data['address'];
    $photo = $data['photo'];
    $stat = $data['stat'];
?>


<style>
      h1{
        text-align: center;
      }
      .te{
        text-align: center;
      }
      .container{
        width: 500px;
        margin: auto;
      }
     body{
        background: url(menu_per4.jpg) no-repeat fixed center;
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


      <div id="login-form">
      <div class="te">
              <img style="" id="shaniku" src="../images/logo/rejobbunder.png" width="80" height="80" alt="..." position="center">
              <h2>Status</h2>
            </div>
            <div class="col-md-12" style="text-align: right; padding-bottom: 15px;">
              <a class="btn btn-sm btn-danger" href="tampil_pelamar.php" role="button">Kembali</a>
            </div>
    <form method="post" action="proses_status.php">
    
      <div class="col-md-12">
          <div class="form-group">
              <hr />
            </div>
            <input type="hidden" name="id_name" class="form-control" maxlength="50" value="<?php echo $id_name?>" readonly=""/>
            <input type="hidden" name="id_user" class="form-control" maxlength="50" value="<?php echo $id_user?>" readonly=""/>
            <input type="hidden" name="dob" class="form-control" maxlength="50" value="<?php echo $dob?>" readonly=""/>
            <input type="hidden" name="religion" class="form-control" maxlength="50" value="<?php echo $religion?>" readonly=""/>
            <input type="hidden" name="address" class="form-control" maxlength="50" value="<?php echo $address?>" readonly=""/>
            <input type="hidden" name="phone" class="form-control" maxlength="50" value="<?php echo $phone?>" readonly=""/>
            <input type="hidden" name="photo" class="form-control" maxlength="50" value="<?php echo $photo?>" readonly=""/>
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
              <input type="text" name="name" class="form-control" maxlength="50" value="<?php echo $name?>" readonly=""/>
                </div>
            </div>
           
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
              <input type="email" name="email" class="form-control" maxlength="40" value="<?php echo $email?>" readonly=""/>
                </div>
                
            </div>
             <br>
             <div class="form-group">
                <label>Skor (Tes Tulis)</label>
                   <input class="form-control" type="text" name="w_score" required data-required-msg="Ktp is required" onkeypress="return hanyaAngka(event)" maxlength="3"></input>
            </div>

            <div class="form-group">
                <label>Skor (Sesi Interview)</label>
                   <input class="form-control" type="text" name="i_score" required data-required-msg="Ktp is required" onkeypress="return hanyaAngka(event)" maxlength="3"></input>
            </div>

            <div class="form-group">
                <label>Komentar</label>
                   <textarea class="form-control" type="text" name="comment" required data-required-msg="Ktp is required"></textarea>
            </div>

            <div class="form">
             <div class="form-group">
             <label>Status</label>
             <select class="form-control" name="stat" required="required">
              <option value="" disabled selected style="display: none;">Select status...</option>
               <option value="Diterima" id="accepted">Diterima</option>
               <option value="Ditolak" id="rejected">Ditolak</option>
                </select>
                <span data-for="status" class="k-invalid-msg"></span>
                </div>
               </div>
            
            <div class="form-group">
              <hr />
            </div>
            
            <div class="form-group">
              <button type="submit" class="btn btn-block btn-primary" name="input">Submit</button>
            </div>
        
        </div>
   
    </form>
    </div>  



    
    <script src="../assets/jquery-1.11.3-jquery.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    
</body>
</html>
<?php ob_end_flush(); ?>
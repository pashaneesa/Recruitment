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
?>


<style>
      body{
        background: url(menu_per.jpg) no-repeat fixed center;
      }

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
      .wow{
        width: 500;
      background: #E6E6E6;
      opacity: 0.8;
      text-align: center;
      border: 1px solid #fff;
      border-radius: 20px;
      padding: 10px;
      color: black;
      }
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


        <div id="login-form">
    <form action="log.php?op=in" method="post">
    
      <div class="col-md-12">
        
        <br><br><br>
          <div class="form-group">
              <!-- <hr /> -->
              <div align="center"><img src="../images/logo/logo.png" width="200"> </div>
              
            </div>

           
            <center>
            <div class="wow">

                <h4 > Disini kami menyediakan jasa yang dapat memudahkan anda melakukan recruitment dengan mudah.<br>Gunakan jasa kami untuk menemukan karyawan sesuai kriteria anda terlebih dahulu</h4>
                1. Langkah pertama yang harus anda lakukan adalah mengisi form <br>
                2. Kemudian anda dapat melihat siapa saja yang melamar di perusahaan anda pada menu data pelamar <br>
                <br>
                <h5 >Untuk tahap awal, silahkan mengisi data diri pada form yang telah disediakan</h5>

                <br><br><br>
            </div>
            </center>
                

            
            

           
      </div>
        
        </div>
   
    </form>
    </div>  
    
</body>
</html>
<?php ob_end_flush(); ?>
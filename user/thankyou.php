<?php
  session_start();

//cek apakah user sudah login
if(!isset($_SESSION['email'])){
die("Anda belum login");//jika belum login jangan lanjut..
}

//cek level user
if($_SESSION['level']!="user"){
die("Anda bukan admin");//jika bukan admin jangan lanjut
}
?>


<style>
      h1{
        text-align: center;
      }
      h4{
        text-align: center;
      }
      .container{
        width: 500px;
        margin: auto;
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
          <a class="navbar-brand" href="">RUMAH BERSALIN BIDARA MULIA</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            
           <li class="dropdown">
              <a href="../log.php?op=out" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
        <span class="glyphicon glyphicon-user"></span>&nbsp;<?php echo "Halo ' ".$_SESSION['email']."";?>&nbsp;<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="../log.php?op=out"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav> 


    <div id="login-form">
    
      <div class="col-md-12">
        
        <div class="te">
          <div class="form-group">
              <img style="" id="shaniku" src="../assets/img/thankyou.png" width="350" height="100" alt="..." position="center">
            </div>
        </div>
        
          <div class="form-group">
              <hr />
            </div>
            
            <div class="form-group">
              <div class="input-group">
                <h4>Terima kasih telah mengisi data diri Anda. Silahkan tunggu pemberitahuan melalui email Anda paling lama 3 hari setelah Anda mengisi form data diri Anda.</h4>

                <h4>Pastikan Anda memeriksa email Anda setiap hari selama 3 hari setelah Anda mengisi form  untuk mengetahui pemberitahuan kami.</h4>

                <br>
                <br>
                <h4>Terima kasih</h4>
                </div>
            </div>
            
            <div class="form-group">
                <hr />
            </div>


           
      </div>
        
        </div>
    </div>  
    
</body>
</html>
<?php ob_end_flush(); ?>
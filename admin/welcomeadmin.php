<?php
session_start();
  //cek apakah user sudah login
if(!isset($_SESSION['email'])){
  die("Anda belum login");//jika belum login jangan lanjut..
}
  //cek level user
if($_SESSION['level']!="admin"){
  die("Anda bukan user");//jika bukan admin jangan lanjut
}
?>

<style>
  h2,th{
    text-align: center;

  }
  body{
    background: url(menu_admin_cek.png);
    background-repeat: no-repeat;
    position: fixed;
    width: 80%; 
    height:100%;
    background-size: 100%;
  }
  .te{
    text-align: center;
  }
  .container{
    width: 500px;
    margin: auto;
  }
  .wow{
    background: #E6E6E6;
    opacity: 0.8;
    text-align: center;
    border: 1px solid #fff;
    border-radius: 20px;
    padding: auto;
    color: black;
    background-repeat: no-repeat;
    width: 155%;
    height: 75%;
    position: center;
    align-items: center;
  }
}
.te{
  text-align: center;
}
.ghost-button {
  display: inline-block;
  width: 200px;
  padding: 8px;
  color: black;
  background-color: transparent;
  border: 2px solid #fff;
  text-align: center;
  outline: none;
  text-decoration: none;
  transition: color 0.3s ease-out,
  background-color 0.3s ease-out,
  border-color 0.3s ease-out;
  }.ghost-button:hover,
  .ghost-button:active {
  background-color: #9363c4;
  border-color: #9363c4;
  color: white;
  transition: color 0.3s ease-in,
  background-color 0.3s ease-in,
  border-color 0.3s ease-in;
  }
</style>

<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        <a class="navbar-brand" href="welcomeadmin.php"><img src="../images/logo/logo.png" height="25" width="60"></a>
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
    <form action="log.php?op=in" method="post"><br/><br/><br/>   
     <div class="wow">
      <div class="te">
        <center>
          <table>
            <br>
            <img style="" src="../images/logo/rejobitem.png" width="100"><br/>
            <h2>Menu Admin</h2>
            <tr>
              <th><a class="ghost-button" href="tampil.php"><img src="gambar/pelamar.png" height="180" width="180">Data Pelamar</a></th>
              <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
              <th><a class="ghost-button" href="tampil_per.php"><img src="gambar/perusahaan.png" height="185" width="180">Data Perusahaan</a></th>
              <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
              <th><a class="ghost-button" href="tampilfeedback.php"><img src="gambar/feedback.png" height="185" width="180">Feedback</a></th>
            </tr>
            <hr />

          </table>
        </center>
      </div>
    </div>
  </div>
</form>
</div>
</form>
<script src="../assets/jquery-1.11.3-jquery.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>   

</body>
</html>
<?php ob_end_flush(); ?>
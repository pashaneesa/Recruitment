<!DOCTYPE html>
<html>
<head>

<style type="text/css">
	* {
margin: 0;
padding: 0;
}

body, html {
font-family: Calibri, "times new roman", sans-serif;
}

#button {
margin: 5% auto;
width: 100px;
text-align: center;
}

#button a {
background-image: linear-gradient(to bottom,#2a95c5,#21759b);
background-image: -o-linear-gradient(to bottom,#2a95c5,#21759b);
background-image: -ms-linear-gradient(to bottom,#2a95c5,#21759b);
background-image: -moz-linear-gradient(to bottom,#2a95c5,#21759b);
background-image: -webkit-linear-gradient(to bottom,#2a95c5,#21759b);
background-color: #2e9fd2;
width: 86px;
height: 30px;
vertical-align: middle;
padding: 10px;
color: #fff;
text-decoration: none;
border: 1px solid transparent;
border-radius: 5px;
}

#popup {
width: 100%;
height: 100%;
position: fixed;
background: rgba(0,0,0,.7);
top: 0;
left: 0;
z-index: 9999;
visibility: hidden;
}

.window {
width: 400px;
height: 100px;
background: #fff;
border-radius: 10px;
position: relative;
padding: 10px;
box-shadow: 0 0 5px rgba(0,0,0,.4);
text-align: center;
margin: 15% auto;
}

.close-button {
width: 20px;
height: 20px;
background: #000;
border-radius: 50%;
border: 3px solid #fff;
display: block;
text-align: center;
color: #fff;
text-decoration: none;
position: absolute;
top: -10px;
right: -10px;
}

#popup:target {
visibility: visible;
}
</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Recruitment</title>
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
<link rel="stylesheet" href="style.css" type="text/css" />
</head>

<style>
      h1{
        text-align: center;
      }

      h5{
        font-family: Arial, Helvetica, sans-serif; 
      }
      .container{
        width: 500px;
        margin: auto;
      }
      .te{
      	text-align: center;
      }
        body{
            background: url(menu_login.jpg) no-repeat fixed center;
            }

        .wow{
      background: #E6E6E6;
      opacity: 0.8;
      text-align: center;
      border: 1px solid #fff;
      border-radius: 20px;
      padding: 10px;
      color: black;
      }
    </style>
<body>

<div class="container">

	<div id="login-form">
    <form action="log.php?op=in" method="post">
        <br>
        <br>
        <div class="wow"> 
            <div class="te">
            <div class="form-group">
                <img style="" src="images/logo/rejobbunder.png" width="80" height="80" position="center">
                <h2>Login</h2>
            </div>
        </div>
        
        
            <div class="form-group">
                <hr />
            </div>
            
            <div class="form-group">
                <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
                <input type="email" name="email" class="form-control" placeholder="Masukkan Email" maxlength="40" required="required" />
                </div>
            </div>
            
            <div class="form-group">
                <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                <input type="password" name="password" class="form-control" placeholder="Masukkan Password" maxlength="15" required="required" />
                </div>
            </div>
            
            <div class="form-group">
                <hr />
            </div>
            
            <div class="form-group">
                <button type="submit" class="btn btn-block btn-primary">Login</button>
            </div>
            
            <div class="form-group">
                <hr />
            </div>
            
            <div class="form-group">
                <p>Belum punya Akun?</p>
                <a class="btn btn-primary btn-xs" href="register.php" role="button">Register Di sini</a>
                <a class="btn btn-primary btn-xs" href="index.php" role="button">Kembali</a>
            </div>

        </div>
        
        
        </div>
   
    </form>
    </div>	

</div>

</body>
</html>
<?php ob_end_flush(); ?>
<!DOCTYPE html>
<html>
<head>
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
    <form method="post" action="proses_regist.php">
    
    	<div class="col-md-12">
            <br><br>
        <div class="wow">
            <div class="te">
            <div class="form-group">
                <img style="" id="shaniku" src="images/logo/rejobbunder.png" width="80" height="80" alt="..." position="center">
                <h2>Register</h2>
            </div>
        </div>
        
            <div class="form-group">
                <hr />
            </div>
            
            <div class="form-group">
                <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                <input type="text" name="username" class="form-control" placeholder="Masukkan Username Anda" maxlength="50" required="required"/>
                </div>
            </div>
            
            <div class="form-group">
                <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
                <input type="email" name="email" class="form-control" placeholder="Masukkan Email Anda" maxlength="40" required="required"/>
                </div>
                
            </div>
            <div class="form-group">
                <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                <input type="password" name="password" class="form-control" placeholder="Masukkan Passowrd Anda" maxlength="15" required="required"/>
                </div>
                
            </div>

            <div class="form">
                <div class="form-group">
                    <label>Daftar Sebagai</label>
                    <select class="form-control" name="level" data-required-msg="Select Status">
                        <option value="" disabled selected style="display: none;">Pilih level...</option>
                        <option value="perusahaan" id="perusahaan">Perusahaan</option>
                        <option value="user" id="user">Pelamar</option>
                    </select>
                    <span data-for="status" class="k-invalid-msg"></span>
                </div>
            </div>
            
            <div class="form-group">
                <hr />
            </div>
            
            <div class="form-group">
                <button type="submit" class="btn btn-block btn-primary" name="signup">Register</button>
            </div>
            
            <div class="form-group">
                <hr />
            </div>
            
            <div class="form-group">
                <a class="btn btn-primary btn-xs" href="login.php" role="button">Login Di sini</a>
            </div>
        </div>
        	
        
        </div>
   
    </form>
    </div>	

</div>

</body>
</html>
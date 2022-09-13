<?php
  session_start();

include "dbconnect.php";
$id = $_GET["id_per"];

$var = mysqli_query($connect_db, "SELECT * FROM `perusahaan` WHERE `id_per` = '$id'");
$data = mysqli_fetch_assoc($var);

    $id_per = $data["id_per"];
    $nama_per = $data["nama_per"];
    $nama_dir = $data["nama_dir"];
    $alamat = $data["alamat"];
    $no_tlp = $data["no_tlp"];
    $email = $data["email"];
    $deskripsi = $data["deskripsi"];
    $visi_misi = $data["visi_misi"];
    $posisi = $data["posisi"];
    $tgl_buka = date("d F Y", strtotime($data["tgl_buka"]));
    $tgl_tutup = date("d F Y", strtotime($data["tgl_tutup"]));
    $foto = $data["foto"];
    
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<!-- For IE -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<!-- For Resposive Device -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title>ReJob||Recruitment Job</title>

		<!-- Favicon -->
		<link rel="icon" type="image/png" sizes="56x56" href="images/fav-icon/rejobfix.png">


		<!-- Main style sheet -->
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<!-- responsive style sheet -->
		<link rel="stylesheet" type="text/css" href="css/responsive.css">


		<!-- Fix Internet Explorer ______________________________________-->

		<!--[if lt IE 9]>
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
			<script src="vendor/html5shiv.js"></script>
			<script src="vendor/respond.js"></script>
		<![endif]-->
			
	</head>

	<body>
		<div class="main-page-wrapper">

	        <!--
			=====================================================
				About us Section
			=====================================================
			-->
			<div id="about-us" style=" background: #ff5050">
				<a class="btn btn-danger" id="Btn" href="index.php#project-section" role="button" align="right">Kembali</a>
				<div class="container">
					<div class="theme-title">
						<h2><?php echo $nama_per?></h2>
					<br><br>
					</div> <!-- /.theme-title -->
					</div> <!-- /.row -->
				</div> <!-- /.container -->
			</div> <!-- /#about-us -->


			<!--
			=====================================================
				Project Section
			=====================================================
			-->
			<div id="project-section">
				<div class="container">
					
					<div class="project-menu">
						<ul>
	        				<li class="filter active tran3s" data-filter="all">Tentang Kami</li>
	        				<p><?php echo $deskripsi?></p>
<!-- 							<li class="filter tran3s" data-filter=".web">Web Design</li>
<li class="filter tran3s" data-filter=".photo">Photography</li>
<li class="filter tran3s" data-filter=".webd">Web Development</li>
<li class="filter tran3s" data-filter=".om">Online Marketing</li>
<li class="filter tran3s" data-filter=".dmedia">Digital Media</li>
<li class="filter tran3s" data-filter=".support">Support</li> -->
	        			</ul>
					</div>

					<div class="about-content">
				<div class="row animate-box">
					<div class="col-md-6 col-md-push-6">
						<div class="desc">
							<h3>Detail Perusahaan</h3>
							<br>
							<h6>Nama Direktur : <?php echo $nama_dir?></h6>
							<br>
							<h6>Posisi yang dibutuhkan : <?php echo $posisi?></h6>
							<br>
							<h6>Tanggal Buka : <?php echo $tgl_buka?></h6>
							<br>
							<h6>Tanggal Tutup : <?php echo $tgl_tutup?></h6>
						</div>
						<br><br>
						<div class="desc">
							<h3>Visi & Misi</h3>
							<p><?php echo $visi_misi?></p>
						</div>
					</div>
					<div class="col-md-6 col-md-pull-6">
						<img class="img-responsive" src="admin/gambar/perusahaan/<?php echo $foto?>" width="500" height="500" alt="about">
					</div>
					
				</div>
			</div>

						

					</div> <!-- /.project-gallery -->
				</div> <!-- /.container -->
			</div> <!-- /#project-section -->


			<!--
			=====================================================
				Contact Section
			=====================================================
			-->
			<div id="contact-section">
				<div class="container">
					<div class="clear-fix contact-address-content">
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<div class="left-side">
								<h2>Kontak Info</h2>
								<p></p>

								<ul>
									<li>
										<div class="icon tran3s round-border p-color-bg"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
										<h6>Alamat</h6>
										<p><?php echo $alamat?></p>
									</li>
									<li>
										<div class="icon tran3s round-border p-color-bg"><i class="fa fa-phone" aria-hidden="true"></i></div>
										<h6>Telepon</h6>
										<p>+62 <?php echo $no_tlp?></p>
									</li>
									<li>
										<div class="icon tran3s round-border p-color-bg"><i class="fa fa-envelope-o" aria-hidden="true"></i></div>
										<h6>Email</h6>
										<p><?php echo $email?></p>
									</li>
								</ul>
							</div> <!-- /.left-side -->
						</div> <!-- /.col- -->


						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<div class="map-area">
								<h2>Lokasi</h2>
								<div id="map"><img src="images/map.png" alt="#" width="450px;" height="480px;"></div>
							</div> <!-- /.map-area -->
						</div> <!-- /.col- -->
					</div> <!-- /.contact-address-content -->

				</div> <!-- /.container -->
			</div> <!-- /#contact-section -->



			<!--
			=====================================================
				Footer
			=====================================================
			-->
			<footer>
				<div class="container">
					<a href="index.html" class="logo"><img src="images/logo/logo.png" alt="Logo" style="width: 200px;"></a>

					<ul>
						<li><a href="#" class="tran3s round-border"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
						<li><a href="#" class="tran3s round-border"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
						<li><a href="#" class="tran3s round-border"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
<!-- 						<li><a href="#" class="tran3s round-border"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
<li><a href="#" class="tran3s round-border"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
<li><a href="#" class="tran3s round-border"><i class="fa fa-skype" aria-hidden="true"></i></a></li>
<li><a href="#" class="tran3s round-border"><i class="fa fa-flickr" aria-hidden="true"></i></a></li>
<li><a href="#" class="tran3s round-border"><i class="fa fa-rss" aria-hidden="true"></i></a></li> -->
					</ul>
					<p>Copyright @2019 All rights reserved | This is made <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="http://localhost/recruitment/index.html" target="_blank">recruitmentJob</a></p>
				</div>
			</footer>




			<!-- =============================================
				Loading Transition
			============================================== -->
			<div id="loader-wrapper">
				<div id="preloader_1">
	                <span></span>
	                <span></span>
	                <span></span>
	                <span></span>
	                <span></span>
	            </div>
			</div>

			
	        <!-- Scroll Top Button -->
			<button class="scroll-top tran3s p-color-bg">
				<i class="fa fa-long-arrow-up" aria-hidden="true"></i>
			</button>




		<!-- Js File_________________________________ -->

		<!-- j Query -->
		<script type="text/javascript" src="vendor/jquery.2.2.3.min.js"></script>

		<!-- Bootstrap JS -->
		<script type="text/javascript" src="vendor/bootstrap/bootstrap.min.js"></script>

		<!-- Vendor js _________ -->
		
		<!-- revolution -->
		<script src="vendor/revolution/jquery.themepunch.tools.min.js"></script>
		<script src="vendor/revolution/jquery.themepunch.revolution.min.js"></script>
		<script type="text/javascript" src="vendor/revolution/revolution.extension.slideanims.min.js"></script>
		<script type="text/javascript" src="vendor/revolution/revolution.extension.layeranimation.min.js"></script>
		<script type="text/javascript" src="vendor/revolution/revolution.extension.navigation.min.js"></script>
		<script type="text/javascript" src="vendor/revolution/revolution.extension.kenburn.min.js"></script>
		<script type="text/javascript" src="vendor/revolution/revolution.extension.actions.min.js"></script>
		<script type="text/javascript" src="vendor/revolution/revolution.extension.video.min.js"></script>

		<!-- Google map js -->
<!-- 		<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBZ8VrXgGZ3QSC-0XubNhuB2uKKCwqVaD0&callback=goMap" type="text/javascript"></script> Gmap Helper
<script src="vendor/gmaps.min.js"></script> -->
		<!-- owl.carousel -->
		<script type="text/javascript" src="vendor/owl-carousel/owl.carousel.min.js"></script>
		<!-- mixitUp -->
		<script type="text/javascript" src="vendor/jquery.mixitup.min.js"></script>
		<!-- Progress Bar js -->
		<script type="text/javascript" src="vendor/skills-master/jquery.skills.js"></script>
		<!-- Validation -->
		<script type="text/javascript" src="vendor/contact-form/validate.js"></script>
		<script type="text/javascript" src="vendor/contact-form/jquery.form.js"></script>


		<!-- Theme js -->
		<script type="text/javascript" src="js/theme.js"></script>
		<script type="text/javascript" src="js/map-script.js"></script>

		</div> <!-- /.main-page-wrapper -->
	</body>
</html>
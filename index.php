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
			=============================================
				Theme Header
			============================================== 
			-->
			<header class="theme-main-header">
				<div class="container">
					<a href="index.php" class="logo float-left tran4s"><img src="images/logo/logo.png" alt="Logo" style="width: 100px;"></a>
					
					<!-- ========================= Theme Feature Page Menu ======================= -->
					<nav class="navbar float-right theme-main-menu one-page-menu">
					   <!-- Brand and toggle get grouped for better mobile display -->
					   <div class="navbar-header">
					     <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="false">
					       <span class="sr-only">Toggle navigation</span>
					       Menu
					       <i class="fa fa-bars" aria-hidden="true"></i>
					     </button>
					   </div>
					   <!-- Collect the nav links, forms, and other content for toggling -->
					   <div class="collapse navbar-collapse" id="navbar-collapse-1">
					     <ul class="nav navbar-nav">
					       	<li class="active"><a href="#home">HOME</a></li> <!-- 1 -->
							<li><a href="#about-us">ABOUT</a></li> <!-- 2 -->
							<li><a href="#project-section">COMPANY</a></li> <!-- 3 -->
							<li><a href="#our-client">TEAM</a></li> <!-- 4 -->
							<li><a href="#contact-section">CONTACT</a></li> <!-- 5 -->
							<li><a href="login.php">REGISTER</a></li> <!-- 5 -->
					     </ul>
					   </div><!-- /.navbar-collapse -->
					</nav> <!-- /.theme-feature-menu -->
				</div>
			</header> <!-- /.theme-main-header -->


			<!--
			=====================================================
				Theme Main SLider
			=====================================================
			-->
			<div id="home" class="banner">
	        	<div class="rev_slider_wrapper">
					<!-- START REVOLUTION SLIDER 5.0.7 auto mode -->
						<div id="main-banner-slider" class="rev_slider video-slider" data-version="5.0.7">
							<ul>

								<!-- SLIDE1  -->
								<li data-index="rs-280" data-transition="fade" data-slotamount="default" data-easein="default" data-easeout="default" data-masterspeed="default"  data-title="Title Goes Here" data-description="">
									<!-- MAIN IMAGE -->
									<video  width="1350" height="950" controls loop autoplay>
										<source src="Rejob.mp4" type="video/mp4">
									</video>
									<!-- LAYERS -->

									<!-- LAYER NR. 3 -->
									<div class="tp-caption"
										data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
										data-y="['middle','middle','middle','middle']" data-voffset="['52','52','125','80']"
										data-transform_idle="o:1;"
							 
										data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;" 
										data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" 
										data-mask_in="x:0px;y:[100%];" 
										data-mask_out="x:inherit;y:inherit;" 
										data-start="3000" 
										data-splitin="none" 
										data-splitout="none" 
										data-responsive_offset="on">
										<a href="login.php" class="project-button hvr-bounce-to-right">Register Now</a>
									</div>
								
								</li>


								<!-- SLIDE2  -->
								
							</ul>	
						</div>
					</div><!-- END REVOLUTION SLIDER -->
	        </div> <!--  /#banner -->



	        <!--
			=====================================================
				About us Section
			=====================================================
			-->
			<div id="about-us" style=" background: #ff5050 url(images/logo/logopink.jpg)">
				<div class="container">
					<div class="theme-title">
						<h2>ABOUT ReJob</h2>
						<div ><p style="color: white;"><b>ReJob (Recruitment Job) merupakan website yang menyediakan layanan untuk membuka lamaran pekerjaan bagi perusahaan. Tidak hanya itu disini kamu juga bisa melamar pekerjaan sesuai dengan kemampuan kamu dan perusahaan yang tersedia. Jadi tunggu apa lagi? Lets register now!</b></p></div>
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
					<div class="theme-title">
						<h2>THE COMPANY</h2>
						<p>Disini terdapat Daftar Perusahaan yang dapat anda pilih sesuai dengan pilihan anda. Tunggu Apa Lagi!!! AYO JOIN ke Perusahaan yang anda Idamkan</p>
					</div> <!-- /.theme-title -->

					<div class="project-menu">
						<ul>
	        				<li class="filter active tran3s" data-filter="all">All</li>
<!-- 							<li class="filter tran3s" data-filter=".web">Web Design</li>
<li class="filter tran3s" data-filter=".photo">Photography</li>
<li class="filter tran3s" data-filter=".webd">Web Development</li>
<li class="filter tran3s" data-filter=".om">Online Marketing</li>
<li class="filter tran3s" data-filter=".dmedia">Digital Media</li>
<li class="filter tran3s" data-filter=".support">Support</li> -->
	        			</ul>
					</div>

					<div class="project-gallery clear-fix">
						<?php
			              include "dbconnect.php";
			              $query = mysqli_query($connect_db, "SELECT * FROM `perusahaan` ORDER BY `perusahaan`.`id_per` ASC");

			              while($data = mysqli_fetch_array($query))
			              {
			               
			             ?>
						<div class="mix grid-item photo webd dmedia support">
							<div class="single-img">
								<img src="admin/gambar/perusahaan/<?php echo $data[12]?>" alt="Image" width="400" height="260">
								<div class="opacity">
									<div class="border-shape"><div><div>
										<?php echo "<h6>";
										echo '<a href="detail.php?id_per='.$data[0].'">';
										echo "$data[2]";
										echo "</a></h6>";
										?>
										<ul>
											<li>Lihat Detail</li>
										</ul></div></div>
									</div> <!-- /.border-shape -->
								</div> <!-- /.opacity -->
							</div> <!-- /.single-img -->
						</div> <!-- /.grid-item -->
						<?php
						 }
			              ?>

					</div> <!-- /.project-gallery -->
				</div> <!-- /.container -->
			</div> <!-- /#project-section -->

			<!--
			=====================================================
				Page middle banner
			=====================================================
			-->

			<div class="page-middle-banner">
				<div class="opacity">
					<h3>Come <span class="p-color">&amp;</span> Join Us</h3>
					<a href="login.php" class="hvr-bounce-to-right">REGISTER</a>
				</div> <!-- /.opacity -->
			</div> <!-- /.page-middle-banner -->


			<!--
			=====================================================
				Our Team
			=====================================================
			-->
			<div id="our-client" style="background: #ff5050;">
				<div class="container">
					<div class="theme-title">
						<h2>Our Team</h2>
					</div> <!-- /.theme-title -->

					<div class="client-slider">
						<div class="item">
							<img src="images/home/naurah.jpeg" alt="Client">
							<p>Merupakan Orang nomor dua diabsen kelas PTI C yakni naurah Septi anggraini, biasa dipanggil ura ura atau Naurah kata teman teman PTI C. Asli arek ngalam, arek bandulan karena rumah nya difaerah bandulan. Naurah ini merupakan seorang designer dan juga photographer, maka dari itu dialah yang mendesign logo dari platform Rejob ini.</p>
							<h6>- Naurah Septi Anggraini -</h6>
						</div> <!-- /.item -->
						<div class="item">
							<img src="images/home/pasha.jpeg" alt="Client">
							<p>Salah satu orang yang namanya paling panjang di antara teman teman kelas PTI C,yaitu Pasha Anisa Herdwiyanti Ramadhani, biasa dipanggil pas atau sya oleh arek arek PTI C. Asli arek ngalam arek sawojajar. Pasha ini merupakan Salah satu lulusan smk di kota malang yakni smk Telkom dengan jurusan RPL, dia merupakan salah satu backend yang mengembangkan platform ini. </p>
							<h6>- Pasha Anisa Herdwiyanti Ramadhani -</h6>
						</div> <!-- /.item -->
						<div class="item">
							<img src="images/home/rifqi.jpg" alt="Client">
							<p>Bisa Dipanggil dengan Rifqi atau Fadil di kelas PTI C. dengan pembawaan bahasa khas banjar maka tidak muungkin dia berasal Asli dari pulau Kalimantan Selatan. salah satu yang mengembangkan platform ini. Sama Seperti Anggota lainnya dia sedang menempuh studi S1 Pendidikan Teknik Informatika di universitas negeri malang. Hobi dia selain design juga sebagai videografi </p>
							<h6>- Rifqi Fadillah -</h6>
						</div> <!-- /.item -->
						<div class="item">
							<img src="images/home/thomas.jpeg" alt="Client">
							<p>Namanya Thomas salah satu team yang mengembangkan Website ini. sekarang dia sedang menempuh S1 pendidikan teknik informatika di universitas negeri malang. Biasa di panggil thom atau mbaah tom. Sosok pria ini sangat terkenal di kalangan kelas PTI C. Asli anak Lumajang yang terkenal dengan gethang nya. Karena ayahnya juragan gethang maka tidak asing lagi dengan thomas di kelas yang selalu bawa pisang, lalu Salah Satu hobi dia adalah berburu kuliner.</p>
							<h6>- Thomas Andyka Putra -</h6>
						</div><!-- /.item -->
					</div> <!-- /.client-slider -->
				</div> <!-- /.container -->
			</div> <!-- /#our-client -->

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
								<h2>Contact Info</h2>
								<p></p>

								<ul>
									<li>
										<div class="icon tran3s round-border p-color-bg"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
										<h6>Address</h6>
										<p>Jln Semarang No. 05, 65145 Malang, Indonesia </p>
									</li>
									<li>
										<div class="icon tran3s round-border p-color-bg"><i class="fa fa-phone" aria-hidden="true"></i></div>
										<h6>Phone</h6>
										<p>+62 87744554747</p>
									</li>
									<li>
										<div class="icon tran3s round-border p-color-bg"><i class="fa fa-envelope-o" aria-hidden="true"></i></div>
										<h6>Email</h6>
										<p>rejob4group@gmail.com</p>
									</li>
								</ul>
							</div> <!-- /.left-side -->
						</div> <!-- /.col- -->


						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<div class="map-area">
								<h2>Our Location</h2>
								<div id="map"><img src="images/map.png" alt="#" width="450px;" height="480px;"></div>
							</div> <!-- /.map-area -->
						</div> <!-- /.col- -->
					</div> <!-- /.contact-address-content -->



					<!-- Contact Form -->
					<div class="send-message">
						<h2>Kirim Pesan</h2>

						<form action="prosesfeedback.php" class="form-validation" autocomplete="off" method="post">
							<div class="row">
								<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
									<div class="single-input">
										<input type="text" placeholder="Nama Depan*" name="Fname">
									</div> <!-- /.single-input -->
								</div>
								<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
									<div class="single-input">
										<input type="text" placeholder="Nama Belakang" name="Lname">
									</div> <!-- /.single-input -->
								</div>
								<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
									<div class="single-input">
										<input type="email" placeholder="Email Anda*" name="email">
									</div> <!-- /.single-input -->
								</div>
							</div> <!-- /.row -->
							<div class="single-input">
								<input type="text" placeholder="Subject" name="subject">
							</div> <!-- /.single-input -->
							<textarea placeholder="Write Message" name="message"></textarea>


							<button class="tran3s p-color-bg" type="submit" name="input">Kirim Pesan</button>
						</form>


						<!-- Contact Form Validation Markup -->
						<!-- Contact alert -->
						<div class="alert-wrapper" id="alert-success">
							<div id="success">
								<button class="closeAlert"><i class="fa fa-times" aria-hidden="true"></i></button>
								<div class="wrapper">
					               	<p>Pesan Anda telah terkirim.</p>
					             </div>
					        </div>
					    </div> <!-- End of .alert_wrapper -->
					    <div class="alert-wrapper" id="alert-error">
					        <div id="error">
					           	<button class="closeAlert"><i class="fa fa-times" aria-hidden="true"></i></button>
					           	<div class="wrapper">
					               	<p>Maaf! Terjadi kesalahan. Silahkan coba lagi</p>
					            </div>
					        </div>
					    </div> <!-- End of .alert_wrapper -->
					</div> <!-- /.send-message -->
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
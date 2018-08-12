<!DOCTYPE html>
<html lang="zxx">


<!-- Mirrored from idealbrothers.thesoftking.com/html/islam/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 24 Jul 2018 11:04:34 GMT -->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title> <?php echo ucwords($title);?> | KQC</title>

<!--Favicon add-->
<link rel="icon" href="<?php echo  base_url('public/favicon.ico')?>">

<!--bootstrap Css-->
<link
	href="<?php echo base_url(); ?>template/<?php echo template(); ?>/css/bootstrap.min.css"
	rel="stylesheet">
<!--ico font Css-->
<link
	href="<?php echo base_url(); ?>template/<?php echo template(); ?>/css/icofont.css"
	rel="stylesheet">
<!-- magnific-popup Css-->
<link
	href="<?php echo base_url(); ?>template/<?php echo template(); ?>/css/magnific-popup.css"
	rel="stylesheet">
<!--lineProgressbar Css-->
<link
	href="<?php echo base_url(); ?>template/<?php echo template(); ?>/css/jquery.lineProgressbar.css"
	rel="stylesheet">
<!--owl.carousel Css-->
<link
	href="<?php echo base_url(); ?>template/<?php echo template(); ?>/css/owl.carousel.css"
	rel="stylesheet">
<!--jquery ui Css-->
<link
	href="<?php echo base_url(); ?>template/<?php echo template(); ?>/css/jquery-ui.min.css"
	rel="stylesheet">
<!--Slick Nav Css-->
<link
	href="<?php echo base_url(); ?>template/<?php echo template(); ?>/css/slicknav.min.css"
	rel="stylesheet">
<!--Animate Css-->
<link
	href="<?php echo base_url(); ?>template/<?php echo template(); ?>/css/animate.css"
	rel="stylesheet">
<!--Style Css-->
<link
	href="<?php echo base_url(); ?>template/<?php echo template(); ?>/css/style.css"
	rel="stylesheet">
<!--Responsive Css-->
<link
	href="<?php echo base_url(); ?>template/<?php echo template(); ?>/css/responsive.css"
	rel="stylesheet">
<?php include 'css.php';?>
</head>

<body>
	<!--preloader start-->
	<div class="preloader">
		<div class="preloader-wrapper">
			<div class="preloader-img">
				<img
					src="<?php echo base_url(); ?>template/<?php echo template(); ?>/img/preloader.png"
					alt="Preloader Image">
			</div>
		</div>
	</div>
	<!--preloader end-->
	<!--navbar section start-->
	<div class="navbar-section">
		<div class="container">
			<div class="row">
				<div class="col-md-2 col-sm-2">
					<a href="<?php echo base_url()?>" class="logo"> <img
						src="<?php echo base_url(); ?>template/<?php echo template(); ?>/img/logo.png"
						alt="logo image">
					</a>
				</div>
				<div class="col-md-10 col-sm-10">
					<div class="row">
						<div class="col-md-10 col-md-offset-2 col-sm-10">
							<div class="support-bar-wrapper ">
								<a href="#" class="blank-btn" id="azan-btn"
									style="border-color: #fff;">SEDEKAH</a>
								<div class="support-content">
									<a href="mailto:layanan@kampungqurancikarang.com" class="support-email">
										<i class="icofont icofont-email"></i>
										layanan@kampungqurancikarang.com <span class="separetor">&#10072;</span>
									</a> <a href="#" class="support-number"> <i
										class="icofont icofont-phone"></i> 0812-8454-7175 <span
										class="separetor">&#10072;</span></a>
									<div class="support-social ">
										<a href="#"><i class="icofont icofont-social-facebook"></i></a>
										<a href="#"><i class="icofont icofont-social-twitter"></i></a>
										<a href="https://plus.google.com/u/0/105989897581524754331"><i
											class="icofont icofont-social-google-plus"></i></a>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-12 text-right">
							<ul id="main-menu" class="main-menu">
								<li><a href="<?php echo base_url()?>">BERANDA</a></li>
								<li><a href="#">TENTANG KAMI<i class="icofont icofont-thin-down"></i></a>
									<ul class="sub-menu">
										<li><a href="<?php echo base_url('tentang_kami/manajemen')?>">MANAJEMEN</a></li>
										<li><a href="<?php echo base_url('tentang_kami/sejarah')?>">SEJARAH</a></li>
										<li><a href="<?php echo base_url('tentang_kami/visi_misi')?>">VISI
												MISI</a></li>
										<li><a href="<?php echo base_url('tentang_kami/method')?>">KQC
												METHOD</a></li>
										<li><a
											href="<?php echo base_url('tentang_kami/legal_formal')?>">LEGAL
												FORMAL</a></li>
										<li><a
											href="<?php echo base_url('tentang_kami/salam_pimpinan')?>">SALAM
												PIMPINAN</a></li>
									</ul></li>
								<li><a href="#">PROGRAM<i class="icofont icofont-thin-down"></i></a>
									<ul class="sub-menu">
										<li><a
											href="<?php echo base_url('program/pendidikan_dakwah')?>">PENDIDIKAN
												DAN DAKWAH</a></li>
										<li><a href="#">UMROH</a></li>
										<li><a href="#">KANGEN WATER</a></li>
									</ul></li>
								<li><a href="#">SEDEKAH<i class="icofont icofont-thin-down"></i></a>
									<ul class="sub-menu">
										<li><a href="<?php echo base_url('sedekah/rekening')?>">REKENING
												SEDEKAH</a></li>
										<li><a href="#">KONFIRMASI SEDEKAH</a></li>
										<li><a href="#">JEMPUT SEDEKAH</a></li>
									</ul></li>
								<li><a href="#">GALERI<i class="icofont icofont-thin-down"></i></a>
									<ul class="sub-menu">
										<li><a href="<?php echo base_url('galeri/galeri_foto')?>">FOTO</a></li>
										<li><a href="<?php echo base_url('galeri/galeri_video')?>">VIDEO</a></li>
									</ul></li>

								<li><a href="<?php echo base_url('hubungi_kami')?>">HUBUNGI KAMI</a></li>
								<?php if ($this->ion_auth->logged_in()) { ?>
									<li><a href="#"><?php echo ucwords($this->session->userdata ( 'username' ))?><i
										class="icofont icofont-thin-down"></i></a>
									<ul class="sub-menu">
										<li><a href="#">PROFILE</a></li>
										<li><a href="<?php echo base_url('login/logout')?>">LOGOUT</a></li>
									</ul></li>
								<?php }else {?>
								<li><a href="<?php echo base_url('login')?>">LOGIN</a></li>
								<?php }?>
							</ul>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
	<!--navbar section end-->

	<!--azan time start-->
	<div class="azan-time azan-time-bg">
		<div class="azan-time-header">
			<h4>SEDEKAH</h4>

			<h4>No REKENING KQC</h4>
		</div>
		<div class="azan-time-body">
			<table class="">
				<tbody>
					<tr>
						<th>No</th>
						<th>Nama Bank</th>
						<th>No Rekening</th>
					</tr>
					<tr>
						<td width="80px">1</td>
						<td>BNI Syariah</td>
						<td>1699 1699 6</td>

					</tr>
					<tr>
						<td width="80px">2</td>
						<td>Bank Muamalat1</td>
						<td>303 003 36151</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	<!--azan time end-->
	<div class="overlay-bg"></div>
	<?php echo $contents; ?>
	<!--footer area start-->
	<footer class="footer-section">
		<div class="container">
			<div class="row">
				<div class="col-md-3 col-sm-6">
					<div class="widget-one-wrapper">
						<div class="footer-logo">
							<img
								src="<?php echo base_url(); ?>template/<?php echo template(); ?>/img/footer-logo.png"
								alt="footer logo">
						</div>
						<div class="widget-one-body">
							<p>
								<b>PPPA Daarul Qur'an</b> adalah lembaga pengelola sedekah yang
								berkhidmad pada pembangunan masyarakat berbasis tahfizhul Qur'an
								yang dikelola secara profesional dan akuntabel
							</p>
							<div class="footer-social-links">
								<p>
									<b>Head Office</b><br> Jl. Cipaganti Raya No.27, Jatireja,
									Cikarang Tim., Bekasi, Jawa Barat 17530 <br> No HP / WA : <br>0812
									- 8454 - 7175<br> eMail <br>layanan@kampungqurancikarang.com
								</p>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-3 col-sm-7">
					<div class="widget-three-wrapper">
						<div class="widget-title">
							<h4>MODUL</h4>
							<span class="title-separetor"> <img
								src="<?php echo base_url(); ?>template/<?php echo template(); ?>/img/footer-separetor-icon.png"
								alt="separetor image">
							</span>
						</div>
						<div class="widget-three-body">
							<ul>
								<li><a href="event-list.html"><i
										class="icofont icofont-curved-double-right"></i> ARTIKEL</a></li>
								<li><a href="single-cause.html"><i
										class="icofont icofont-curved-double-right"></i> BERITA</a></li>
								<li><a href="donate.html"><i
										class="icofont icofont-curved-double-right"></i> KEGIATAN</a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-3 col-sm-5">
					<div class="widget-four-wrapper">
						<div class="widget-title">
							<h4>Instagram</h4>
							<span class="title-separetor"> <img
								src="<?php echo base_url(); ?>template/<?php echo template(); ?>/img/footer-separetor-icon.png"
								alt="separetor image">
							</span>
						</div>
						<div class="widget-four-body">
							<ul>
								<li><a
									href="<?php echo base_url(); ?>template/<?php echo template(); ?>/img/instagram-1.jpg"
									class="image-popup"> <img
										src="<?php echo base_url(); ?>template/<?php echo template(); ?>/img/instagram-1.jpg"
										alt=""> <span class="hover"> <i class="icofont icofont-plus"></i>
									</span>
								</a></li>
								<li><a
									href="<?php echo base_url(); ?>template/<?php echo template(); ?>/img/instagram-1.jpg"
									class="image-popup"> <img
										src="<?php echo base_url(); ?>template/<?php echo template(); ?>/img/instagram-1.jpg"
										alt=""> <span class="hover"> <i class="icofont icofont-plus"></i>
									</span>
								</a></li>
								<li><a
									href="<?php echo base_url(); ?>template/<?php echo template(); ?>/img/instagram-1.jpg"
									class="image-popup"> <img
										src="<?php echo base_url(); ?>template/<?php echo template(); ?>/img/instagram-1.jpg"
										alt=""> <span class="hover"> <i class="icofont icofont-plus"></i>
									</span>
								</a></li>
								<li><a
									href="<?php echo base_url(); ?>template/<?php echo template(); ?>/img/instagram-1.jpg"
									class="image-popup"> <img
										src="<?php echo base_url(); ?>template/<?php echo template(); ?>/img/instagram-1.jpg"
										alt=""> <span class="hover"> <i class="icofont icofont-plus"></i>
									</span>
								</a></li>
								<li><a
									href="<?php echo base_url(); ?>template/<?php echo template(); ?>/img/instagram-1.jpg"
									class="image-popup"> <img
										src="<?php echo base_url(); ?>template/<?php echo template(); ?>/img/instagram-1.jpg"
										alt=""> <span class="hover"> <i class="icofont icofont-plus"></i>
									</span>
								</a></li>
								<li><a
									href="<?php echo base_url(); ?>template/<?php echo template(); ?>/img/instagram-1.jpg"
									class="image-popup"> <img
										src="<?php echo base_url(); ?>template/<?php echo template(); ?>/img/instagram-1.jpg"
										alt=""> <span class="hover"> <i class="icofont icofont-plus"></i>
									</span>
								</a></li>
								<li><a
									href="<?php echo base_url(); ?>template/<?php echo template(); ?>/img/instagram-1.jpg"
									class="image-popup"> <img
										src="<?php echo base_url(); ?>template/<?php echo template(); ?>/img/instagram-1.jpg"
										alt=""> <span class="hover"> <i class="icofont icofont-plus"></i>
									</span>
								</a></li>
								<li><a
									href="<?php echo base_url(); ?>template/<?php echo template(); ?>/img/instagram-1.jpg"
									class="image-popup"> <img
										src="<?php echo base_url(); ?>template/<?php echo template(); ?>/img/instagram-1.jpg"
										alt=""> <span class="hover"> <i class="icofont icofont-plus"></i>
									</span>
								</a></li>
								<li><a
									href="<?php echo base_url(); ?>template/<?php echo template(); ?>/img/instagram-1.jpg"
									class="image-popup"> <img
										src="<?php echo base_url(); ?>template/<?php echo template(); ?>/img/instagram-1.jpg"
										alt=""> <span class="hover"> <i class="icofont icofont-plus"></i>
									</span>
								</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!--footer area end-->
	<!--copyright area start-->
	<div class="copyright-area">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-sm-6">
					<p>Copyright &copy; Kampung Qur'an Cikarang <?php echo date('Y')?>.All right reserved.</p>
				</div>
				<div class="col-md-6 col-sm-6 ">
					<div class="footer-menu">
						<a href="#">Page rendered in <strong>{elapsed_time}</strong>
							seconds.
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--copyright area end-->

	<div class="scroll-to-top">
		<i class="icofont icofont-rounded-up"></i>
	</div>

	<!--jquery script load-->
	<script
		src="<?php echo base_url(); ?>template/<?php echo template(); ?>/js/jquery.js"></script>
	<!--Isotope script load-->
	<script
		src="<?php echo base_url(); ?>template/<?php echo template(); ?>/js/isotope.pkgd.js"></script>
	<!-- magnific popup script load-->
	<script
		src="<?php echo base_url(); ?>template/<?php echo template(); ?>/js/jquery.magnific-popup.js"></script>
	<!--way point script load-->
	<script
		src="<?php echo base_url(); ?>template/<?php echo template(); ?>/js/waypoints.min.js"></script>
	<!--line progress bar script load-->
	<script
		src="<?php echo base_url(); ?>template/<?php echo template(); ?>/js/jquery.lineProgressbar.js"></script>
	<!-- counter up script load-->
	<script
		src="<?php echo base_url(); ?>template/<?php echo template(); ?>/js/jquery.counterup.min.js"></script>
	<!--count down script load-->
	<script
		src="<?php echo base_url(); ?>template/<?php echo template(); ?>/js/jquery.countdown.js"></script>
	<!--Owl carousel script load-->
	<script
		src="<?php echo base_url(); ?>template/<?php echo template(); ?>/js/owl.carousel.min.js"></script>
	<!--Image load script -->
	<script
		src="<?php echo base_url(); ?>template/<?php echo template(); ?>/js/imagesloaded.pkgd.js"></script>
	<!--Bootstrap v3 script load here-->
	<script
		src="<?php echo base_url(); ?>template/<?php echo template(); ?>/js/bootstrap.min.js"></script>
	<!--Slick Nav Js File Load-->
	<script
		src="<?php echo base_url(); ?>template/<?php echo template(); ?>/js/jquery.slicknav.min.js"></script>
	<!-- jquery ui script load-->
	<script
		src="<?php echo base_url(); ?>template/<?php echo template(); ?>/js/jquery-ui.min.js"></script>
	<!--audio player Js File Load-->
	<script
		src="<?php echo base_url(); ?>template/<?php echo template(); ?>/js/audio-player/audio.min.js"></script>
	<!--Wow Js File Load-->
	<script
		src="<?php echo base_url(); ?>template/<?php echo template(); ?>/js/wow.min.js"></script>
	<!--Main js file load-->
	<script
		src="<?php echo base_url(); ?>template/<?php echo template(); ?>/js/main.js"></script>
</body>
</html>

<!--breadcum start -->
<section class="breadcumb-section breadcumb-bg">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1>Tetang Kami</h1>
				<p>
					<a href="<?php echo base_url()?>">Beranda </a>/ <?php echo ucwords($title)?>
				</p>
			</div>
		</div>
	</div>
</section>
<!--breadcum end-->

<div class="blog-view-page">
	<div class="container">
		<div class="row">

			<div class="col-md-8">
				<div class="single-blog-page">

					<h2><?php echo ucwords($title)?> Kampung Qur'an Cikarang</h2>
					
					<?php echo $isi_tentang_kami; ?>
<!-- 					<div class="cases">Tags: Causes,Donate</div> -->
					<div class="blog-post-share">
						Share: <a href="#"><i class="icofont icofont-social-facebook"></i></a>
						<a href="#"><i class="icofont icofont-social-twitter"></i></a> <a
							href="#"><i class="icofont icofont-social-google-plus"></i></a> <a
							href="#"><i class="icofont icofont-social-instagram"></i></a> <a
							href="#"><i class="icofont icofont-social-linkedin"></i></a>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<?php include 'view_produk_terbaru_kqc_mart.php';?>
			</div>
		</div>
	</div>
</div>


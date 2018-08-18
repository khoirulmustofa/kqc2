<!--breadcum start -->
<section class="breadcumb-section breadcumb-bg">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1>Program</h1>
				<p>
					<a href="<?php echo base_url()?>">Beranda </a>/ <?php echo ucwords($title)?>
				</p>
			</div>
		</div>
	</div>
</section>
<!--breadcum end-->
<!--sermons start-->
<div class="sermons-section">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2 text-center">
				<div class="section-title">
					<h2><?php echo ucwords($title)?></h2>
					<span class="title-separetor"> <img
						src="<?php echo base_url(); ?>template/<?php echo template(); ?>/img/separetor-icon.png" alt="separetor image">
					</span>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="sermons-wrapper"><?php
						foreach ( $pendidikan_dakwah_data as $pendidikan_dakwah ) {
							?>
				<div class="col-md-6 col-sm-6">
					<div class="single-post-wrapper">
						<div class="post-thumb" style="background: url(<?php echo  base_url('public/pendidikan_dakwah/').$pendidikan_dakwah->gambar_pendidikan_dakwah;?>);background-size: cover;
	background-position: center;
	background-repeat: no-repeat;">
						
					</div>
						<div class="post-inner">
							<a href="#">
								<h3>AT TAUBAH</h3>
							</a>
							<div class="port-body">
								<p>1. Freedom from (all) obligations (is declared) from Allah
									and His Messenger () to those of the Mushrikun (polytheists,
									pagans, idolaters, disbelievers in the Oneness of Allah), with
									whom yo</p>
								<a href="#" class="boxed-btn">Read More</a>
							</div>
						</div>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6 col-md-offset-3 text-center">
				<ul class="paginator">
					<li><a href="#"><i class="icofont icofont-long-arrow-left"></i></a></li>
					<li class="active"><a href="#">1</a></li>
					<li><a href="#">2</a></li>
					<li><a href="#">3</a></li>
					<li><a href="#"><i class="icofont icofont-long-arrow-right"></i></a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
<!--sermons end-->

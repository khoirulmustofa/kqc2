<!--breadcum start -->
<section class="breadcumb-section breadcumb-bg">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1>Berita</h1>
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
					<h2>
						<span><?php echo ucwords($title)?></span>
					</h2>
					<span class="title-separetor"> <img
						src="<?php echo base_url(); ?>template/<?php echo template(); ?>/img/separetor-icon.png"
						alt="separetor image">
					</span>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="upcoming-event-wrapper">
<?php
foreach ( $berita_data as $berita ) {
	?>
				<div class="single-event-list-box">
					<div class="row">
						<div class="col-md-5">
							<div class="event-list-post-thumb list-post-thumb-1">
								<span class="post-date"><strong><?php echo tgl_indo($berita->tanggal)?></strong></span>
							</div>
						</div>
						<div class="col-md-7">
							<div class="post-inner">
								<h3>
									<a href="<?php echo base_url('berita/berita_read/').$berita->judul_seo_berita;?>"><?php echo $berita->judul_berita ?></a>
								</h3>
								<div class="post-meta">
									<p class="time">
										<i class="icofont icofont-wall-clock"></i> <?php echo $berita->jam?>
									</p>
									<a href="#" class="user"><i class="icofont icofont-user"></i> <?php echo $berita->username ?></a>
								</div>
								<div class="port-body">
									<?php
			$isi_berita = strip_tags ( $berita->isi_berita );
			$isi_ber = substr ( $isi_berita, 0, 200 );
			$isi_ber = substr ( $isi_berita, 0, strrpos ( $isi_ber, " " ) );
			echo $isi_ber;
			?>
									<a href="<?php echo base_url('berita/berita_read/').$berita->judul_seo_berita;?>" class="boxed-btn">Lanjut Membaca</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6 col-md-offset-3 text-center">
				<?php  echo $pagination; ?>
			</div>
		</div>
	</div>
</div>
<!--sermons end-->

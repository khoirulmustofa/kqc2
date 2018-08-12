<!--breadcum start -->
<section class="breadcumb-section breadcumb-bg">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1>Galeri</h1>
				<p>
					<a href="<?php echo base_url()?>">Beranda</a>/<?php echo ucwords($title)?>
				</p>
			</div>
		</div>
	</div>
</section>
<!--breadcum end-->

<section class="muslim-festival">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3 text-center">
				<div class="section-title">
					<h2><?php echo ucwords($title)?><span> KQC</span>
					</h2>
					<span class="title-separetor"> <img
						src="<?php echo base_url(); ?>template/<?php echo template(); ?>/img/separetor-icon.png"
						alt="separetor image">
					</span>
				</div>
			</div>
		</div>
		<div class="row">
		<?php
		foreach ( $galeri_video_data as $galeri_video ) {
			?>
			<div class="col-md-6">
				<div class="latest-news-left-post">
					<div class="post-thumb">
						<iframe
							style=" top: 0; left: 0; width: 100%; height: 240px;"
							src="<?php echo $galeri_video->link_galeri_video ?>"
							frameborder="0" allowfullscreen></iframe>
					</div>

				</div>
			</div>
			<?php } ?>
		</div>
	</div>

</section>


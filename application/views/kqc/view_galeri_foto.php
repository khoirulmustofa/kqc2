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
	</div>
	<div class="masonary-container">
		<div class="festival-masonary">
		<?php
            foreach ($galeri_foto_data as $galeri_foto)
            {
                ?>
			<div class="grid-item">
				<div class="masonry-image"
					style="background: url(<?php echo base_url('public/galeri_foto/').$galeri_foto->gambar_galeri_foto?>); background-size: cover; background-position: center; background-repeat: no-repeat;">
					<div class="masonry-hover">
						<div class="masonry-hover-content">
							<a class="image-popup" title="<?php echo $galeri_foto->nama_galeri_foto?>"
								href="<?php echo base_url('public/galeri_foto/').$galeri_foto->gambar_galeri_foto?>"><i
								class="icofont icofont-search-alt-1"></i></a>
						</div>
					</div>
				</div>
			</div>
			<?php } ?>
		</div>
		<div class="more-festival-images">
			<a href="#" class="boxed-btn">View More</a>
		</div>
	</div>
</section>


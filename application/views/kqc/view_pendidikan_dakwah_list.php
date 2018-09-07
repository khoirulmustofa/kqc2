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
						src="<?php echo base_url(); ?>template/<?php echo template(); ?>/img/separetor-icon.png"
						alt="separetor image">
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
	background-repeat: no-repeat;"></div>
						<div class="post-inner">

							<h3>
								<a href="<?php echo base_url('program/pendidikan_dakwah_detail/').$pendidikan_dakwah->judul_seo_pendidikan_dakwah;?>"><?php echo $pendidikan_dakwah->nama_pendidikan_dakwah?></a>
							</h3>

							<div class="port-body">
							<?php
			$isi_pendidikan_dakwah = strip_tags ( $pendidikan_dakwah->keterangan_pendidikan_dakwah );
			$isi_pendak = substr ( $isi_pendidikan_dakwah, 0, 200 );
			$isi_pendak = substr ( $isi_pendidikan_dakwah, 0, strrpos ( $isi_pendak, " " ) );
			echo $isi_pendak;
			?>
								<a href="<?php echo base_url('program/pendidikan_dakwah_detail/').$pendidikan_dakwah->judul_seo_pendidikan_dakwah;?>" class="boxed-btn">Baca Selengkapnya</a>
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

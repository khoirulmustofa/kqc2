<!--header section start-->
<header class="header-section">
	<div class="static-header-img">
		<img
			src="<?php echo base_url(); ?>template/<?php echo template(); ?>/img/static-header-img.png"
			alt="static header image">
	</div>
	<div class="header-carousel-active">
		<div class="header-carousel-wrapper header-carousel-bg">
			<div class="single-header-carousel ">
				<div class="container">
					<div class="row">
						<div class="col-md-8">
							<h1>
								nothing is impossible with <strong>allah</strong>
							</h1>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed
								do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
							<a href="#" class="boxed-btn">Read More<i
								class="icofont icofont-curved-double-right"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="header-carousel-wrapper header-carousel-bg-two">
			<div class="single-header-carousel ">
				<div class="container">
					<div class="row">
						<div class="col-md-8">
							<h1>
								nothing is impossible with <strong>allah</strong>
							</h1>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed
								do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
							<a href="#" class="boxed-btn">Read More<i
								class="icofont icofont-curved-double-right"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>
<!--header section end-->
<!--event countdown start-->
<div class="event-counter">
	<div class="container">
		<div class="row">
			<div class="col-md-3 text-left">
				<div class="event-details">
					<h3>
						<i class="icofont icofont-ui-calendar"></i> UPCOMING event
					</h3>
					<span class="sp-line"></span>
					<p>Importance Of Prayer In Islam</p>
					<p>27 th December, 2017</p>
				</div>
			</div>
			<div class="col-md-7 col-sm-9 text-center">
				<div class="row">
					<div class="col-md-12">
						<span class="counter">10d 4h 18m 55s</span>
					</div>
				</div>
			</div>
			<div class="col-md-2 col-sm-3 text-right">
				<div class="event-counter-links">
					<a href="#" class="boxed-btn">Join Now</a>
					<p>
						or <a href="#">View All Events</a><i
							class="icofont icofont-bubble-right"></i>
					</p>
				</div>
			</div>
		</div>
	</div>
</div>
<!--event countdown end-->
<!-- latest event start-->
<section class="latest-event">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2 text-center">
				<div class="section-title">
					<h2>
						Kabar <span>KQC</span>
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
		$start = intval ( $this->input->get ( 'start_berita' ) );
		$config ['per_page'] = 3;
		$config ['query_string_segment'] = 'start_berita';
		$config['base_url'] = base_url() . 'home/';
		$config['first_url'] = base_url() . 'home/';
		$config ['full_tag_open'] = '<div><ul class ="paginator">';
		$config ['next_link'] = '<i class="icofont icofont-long-arrow-right"></i>';
		$config ['prev_link'] = '<i class="icofont icofont-long-arrow-left"></i>';
		$config ['page_query_string'] = TRUE;
		$config ['total_rows'] = $this->Berita_model->total_rows_berita_front ();
		$berita_data = $this->Berita_model->get_limit_data_berita_front ( $config ['per_page'], $start );
		
		$this->load->library ( 'pagination' );
		$this->pagination->initialize ( $config );
		
		$pagination = $this->pagination->create_links ();
		
		foreach ( $berita_data as $berita ) {
			?>
			<div class="col-md-4 col-sm-6">
				<div class="single-post-wrapper">
					<div class="post-thumb" style="background: url(<?php echo  base_url('public/foto_berita/').$berita->gambar;?>);background-size: cover;
	background-position: center;
	background-repeat: no-repeat;">
						<span class="post-date"><strong><?php echo tgl_indo($berita->tanggal)?></strong></span>
					</div>
					<div class="post-inner">						
						<h3><a href="<?php echo  base_url('berita/berita_read/').$berita->judul_seo_berita;?>"><?php echo ucwords($berita->judul_berita) ?></a></h3>
						<div class="post-meta">
							<p class="time">
								<i class="icofont icofont-wall-clock"></i> <?php echo $berita->jam?> WIB
							</p>
							<a href="#" class="user"><i class="icofont icofont-user"></i>
								<?php echo ucwords($berita->username)?></a>
						</div>
						<div class="port-body">
							<?php
			$isi_berita = strip_tags ( $berita->isi_berita );
			$isi_ber = substr ( $isi_berita, 0, 200 );
			$isi_ber = substr ( $isi_berita, 0, strrpos ( $isi_ber, " " ) );
			echo $isi_ber;
			?>
							<a href="<?php echo  base_url('berita/berita_read/').$berita->judul_seo_berita;?>" class="boxed-btn">Lanjut Membaca</a>
						</div>
					</div>
				</div>
			</div>
			<?php } ?>
		</div>
		<br> <br>
		<div class="row">
			<div class="col-md-6 col-md-offset-3 text-center">
                    <?php  echo $pagination; ?>
                </div>
		</div>
	</div>


</section>
<!-- latest event end-->
<!--our lattest news start-->
<section class="latest-news-section">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2 text-center">
				<div class="section-title">
					<h2>
						Artikel <span>Inspirasi</span>
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
		$start = intval ( $this->input->get ( 'start_artikel' ) );
		$config ['per_page'] = 3;
		$config ['query_string_segment'] = 'start_artikel';
		$config['base_url'] = base_url() . 'home/';
		$config['first_url'] = base_url() . 'home/';
		$config ['full_tag_open'] = '<div><ul class ="paginator">';
		$config ['next_link'] = '<i class="icofont icofont-long-arrow-right"></i>';
		$config ['prev_link'] = '<i class="icofont icofont-long-arrow-left"></i>';
		$config ['page_query_string'] = TRUE;
		$config ['total_rows'] = $this->Artikel_model->total_rows_artikel_front ();
		$artikel_data = $this->Artikel_model->get_limit_data_artikel_front ( $config ['per_page'], $start );
		
		$this->load->library ( 'pagination' );
		$this->pagination->initialize ( $config );
		
		$pagination = $this->pagination->create_links ();
		
		foreach ( $artikel_data as $artikel ) {
			?>
			<div class="col-md-4 col-sm-6">
				<div class="single-post-wrapper">
					<div class="post-thumb" style="background: url(<?php echo  base_url('public/foto_artikel/').$artikel->gambar;?>);background-size: cover;
	background-position: center;
	background-repeat: no-repeat;">
						<span class="post-date"><strong><?php echo tgl_indo($artikel->tanggal)?></strong></span>
					</div>
					<div class="post-inner">						
							<h3><a href="<?php echo  base_url('artikel/artikel_read/').$artikel->judul_seo_artikel;?>"><?php echo ucwords($artikel->judul_artikel) ?></a></h3>
						<div class="post-meta">
							<p class="time">
								<i class="icofont icofont-wall-clock"></i> <?php echo $artikel->jam?> WIB
							</p>
							<a href="#" class="user"><i class="icofont icofont-user"></i>
								<?php echo ucwords($artikel->username)?></a>
						</div>
						<div class="port-body">
							<?php
			$isi_artikel = strip_tags ( $artikel->isi_artikel );
			$isi_ber = substr ( $isi_artikel, 0, 200 );
			$isi_ber = substr ( $isi_artikel, 0, strrpos ( $isi_ber, " " ) );
			echo $isi_ber;
			?>
							<a href="<?php echo  base_url('artikel/artikel_read/').$artikel->judul_seo_artikel;?>" class="boxed-btn">Lanjut Membaca</a>
						</div>
					</div>
				</div>
			</div>
			<?php } ?>
		</div>
		<br> <br>
		<div class="row">
			<div class="col-md-6 col-md-offset-3 text-center">
                    <?php  echo $pagination; ?>
                </div>
		</div>
	</div>
</section>
<!--our lattest news end-->
<!--our donator say start-->
<div class="donator-section our-donator-bg">
	<div class="container">

		<div class="row">
			<div class="col-md-8 col-md-offset-2 text-center">
				<div class="section-title">
					<h2>
						Kata Mereka<span> Tentang KQC </span>
					</h2>
					<span class="title-separetor our-donator"> <img
						src="<?php echo base_url(); ?>template/<?php echo template(); ?>/img/footer-separetor-icon.png"
						alt="separetor image">
					</span>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-8 text-center col-md-offset-2">
				<div class="donator-carousel">
				<?php
				$kata_mereka_data = $this->Kata_mereka_model->get_kata_mereka_inview ();
				foreach ( $kata_mereka_data->result () as $kata_mereka ) {
					?>
					<div class="signle-donartor">
						<div class="donator-picture">
							<img
								src="<?php echo base_url('public/kata_mereka/').$kata_mereka->photo_kata_mereka; ?>"
								alt="donator image">
						</div>
						<div class="donator-content">
							<h4><?php echo $kata_mereka->name_kata_mereka ?></h4>
							<p> <?php echo $kata_mereka->quote_kata_mereka?> </p>
						</div>
					</div>
					<?php }?>
				</div>
			</div>
		</div>
	</div>
</div>
<!--our donator say end-->
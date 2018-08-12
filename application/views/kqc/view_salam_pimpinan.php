<!--breadcum start -->
<section class="breadcumb-section breadcumb-bg">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1>Tetang Kami</h1>
				<p>
					<a href="<?php echo base_url()?>">Beranda</a>/<?php echo ucwords($title)?>
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
					<div class="blog-post-thumb">
                       <img src="<?php echo  base_url('public/tentang_kami/').$gambar_tentang_kami;?>" alt=" single blog photos">
                  </div>
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
				<div class="sidebar">
					<div class="recent-new-widget">
						<div class="widget-title">
							<h3>Recent News</h3>
						</div>
						<div class="widget-body">
							<div class="signle-recent-news-wrapper">
								<div class="single-news-items">
									<div class="news-post-thumb">
										<img src="assets/img/single-post.jpg" alt="single post">
									</div>
									<div class="news-post-content">
										<a href="#"><h5>We make the world happy togather</h5></a>
										<div class="news-post-meta">
											<p>
												<i class="icofont icofont-speech-comments"></i> 7
											</p>
											<p>
												<i class="icofont icofont-ui-love"></i> 15
											</p>
										</div>
									</div>
								</div>
								<div class="single-news-items">
									<div class="news-post-thumb">
										<img src="assets/img/single-post-1.jpg" alt="single post">
									</div>
									<div class="news-post-content">
										<a href="#"><h5>We make the world happy togather</h5></a>
										<div class="news-post-meta">
											<p>
												<i class="icofont icofont-speech-comments"></i> 7
											</p>
											<p>
												<i class="icofont icofont-ui-love"></i> 15
											</p>
										</div>
									</div>
								</div>
								<div class="single-news-items">
									<div class="news-post-thumb">
										<img src="assets/img/single-post-2.jpg" alt="single post">
									</div>
									<div class="news-post-content">
										<a href="#"><h5>We make the world happy togather</h5></a>
										<div class="news-post-meta">
											<p>
												<i class="icofont icofont-speech-comments"></i> 7
											</p>
											<p>
												<i class="icofont icofont-ui-love"></i> 15
											</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


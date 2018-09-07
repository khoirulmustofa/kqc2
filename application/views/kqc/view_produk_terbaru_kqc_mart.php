<div class="sidebar">
	<div class="recent-new-widget">
		<div class="widget-title">
			<h3>Produk Terbaru KQC Mart</h3>
		</div>
		<div class="widget-body">
			<div class="signle-recent-news-wrapper">
							<?php
							$kqc_mart_produk_baru_data = $this->Kqc_mart_model->get_limit_data_kqc_mart_Produk_baru ( 5 );
							foreach ( $kqc_mart_produk_baru_data as $kqc_mart_produk_baru ) {
								?>
								<div class="single-news-items">
					<div class="news-post-thumb">
						<img
							src="<?php echo base_url('public/kqc_mart/').$kqc_mart_produk_baru->gambar_kqc_mart ?>"
							width="115px" height="106px" alt="single post">
					</div>
					<div class="news-post-content">
						<a href="#"><h5><?php echo $kqc_mart_produk_baru->nama_kqc_mart ?></h5></a>
						<div class="news-post-meta">
							<p>
												<?php echo tampil_rupiah($kqc_mart_produk_baru->harga_kqc_mart)?>
											</p>
							<div class="product-rating">
								<u><b><?php echo $kqc_mart_produk_baru->kode_kqc_mart ?></b></u>
							</div>
						</div>
					</div>
				</div>
								<?php }?>
								
								
							</div>
		</div>
	</div>
</div>
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

<div class="shop-page">
	<div class="container">

		<div class="row">
			<div class="col-md-12">
				<div class="sorting-area">
					<div class="row">
						<div class="col-md-8 col-sm-8">
							<form action="<?php echo site_url('program/kqc_mart'); ?>">
								<div class="form-element">
									<input type="text" name="q"
										value="<?php echo $q; ?>"> <span class="has-icon">
                            <?php
																												if ($q != '') {
																													?>
                                    <a
										href="<?php echo site_url('program/kqc_mart'); ?>"
										class="btn btn-default">Reset</a>
                                    <?php
																												}
																												?>
                          <button class="btn btn-success" type="submit">Search</button>
									</span>
								</div>
							</form>
						</div>

						<div class="col-md-4 col-sm-4">
							<p class="show-text">
								Menampilkan <b><?php echo $total_rows ?></b> Item
							</p>
						</div>
					</div>
				</div>
			</div>
			<div class="shop-view-page">
				<div class="row">
<?php

foreach ( $kqc_mart_data as $kqc_mart ) {
	?>
						<div class="col-md-4 col-sm-6">
						<div class="single-product-box">
							<div class="product-thumb">
								<img
									src="<?php echo base_url('public/kqc_mart/').$kqc_mart->gambar_kqc_mart ?>"
									alt="product image">
								<div class="product-hover">
									<div class="product-table">
										<div class="product-table-cell">
											<a href="#"><i class="icofont icofont-shopping-cart"></i></a>
											<a href="#"><i class="icofont icofont-eye"></i></a>
										</div>
									</div>
								</div>
							</div>
							<div class="product-details text-center">
								<h4><?php echo $kqc_mart->nama_kqc_mart ?></h4>
								<span class="price"><?php echo tampil_rupiah($kqc_mart->harga_kqc_mart)?></span>
								<div class="product-rating">
									<u><b><?php echo $kqc_mart->kode_kqc_mart ?></b></u>

								</div>
							</div>
						</div>
					</div>
<?php } ?>
					</div>
				<div class="row">
					<div class="col-md-6 col-md-offset-3 text-center">
                    <?php  echo $pagination; ?>
                </div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>

<section class="our-product-section shop-page">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<h4>Produk Terbaru</h4>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="product-carousel">
				<?php
				
				foreach ( $kqc_mart_produk_baru_data as $kqc_mart_produk_baru ) {
					?>
					<div class="single-product-box">
						<div class="product-thumb">
							<img
								src="<?php echo base_url('public/kqc_mart/').$kqc_mart_produk_baru->gambar_kqc_mart ?>"
								alt="product image">
							<div class="product-hover">
								<div class="product-table">
									<div class="product-table-cell">
										<a href="#"><i class="icofont icofont-shopping-cart"></i></a>
										<a href="#"><i class="icofont icofont-eye"></i></a>
									</div>
								</div>
							</div>
						</div>
						<div class="product-details text-center">
							<h4><?php echo $kqc_mart_produk_baru->nama_kqc_mart ?></h4>
							<span class="price"><?php echo tampil_rupiah($kqc_mart_produk_baru->harga_kqc_mart)?></span>
							<div class="product-rating">
								<u><b><?php echo $kqc_mart_produk_baru->kode_kqc_mart ?></b></u>
							</div>
						</div>
					</div>
<?php } ?>
				</div>
			</div>
		</div>
	</div>
</section>

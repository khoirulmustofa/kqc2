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
				<div class="newsletter">
					<!--news letter section-->
					<div class="container">

						<div class="row">
							<div class="col-md-7">
								<form
									action="<?php echo site_url('program/kqc_mart'); ?>">
									<div class="form-element">
										<input type="text" class="form-control" name="q"
												value="<?php echo $q; ?>"> <span class="input-group-btn">
                            <?php
																												if ($q != '') {
																													?>
                                    <a
												href="<?php echo site_url('program/kqc_mart'); ?>"
												class="btn btn-default">Reset</a>
                                    <?php
																												}
																												?>
                          <button class="btn btn-primary" type="submit">Search</button>
											</span>
									</div>
								</form>
							</div>
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

							</div>
						</div>
					</div>
<?php } ?>
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
				
				foreach ( $kqc_mart_data as $kqc_mart ) {
					?>
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

						</div>
					</div>
<?php } ?>
				</div>
			</div>
		</div>
	</div>
</section>

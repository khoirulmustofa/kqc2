<!--breadcum start -->
<section class="breadcumb-section breadcumb-bg">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1>REKENING</h1>
				<p>
					<a href="<?php echo base_url()?>">Beranda </a>/ <?php echo ucwords($title)?>
				</p>
			</div>
		</div>
	</div>
</section>
<!--breadcum end-->

<section class="muslim-festival">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="section-title">
					<h2>
						Daftar Rekening<span> KQC </span>
					</h2>
					<span class="title-separetor"> <img
						src="<?php echo base_url(); ?>template/<?php echo template(); ?>/img/separetor-icon.png" alt="separetor image">
					</span>
				</div>
				<div class="single-service-item">
					<table class="table table-striped table-hover table-bordered">
								<tbody>
									<tr>
										<th>No</th>
										<th>Nama Bank</th>
										<th>No Rekening</th>
									</tr>
									<?php
									foreach ( $rekening_data as $rekening ) {
										?>
                <tr>
										<td width="80px"><?php echo ++$start ?></td>
										<td><?php echo $rekening->nama_bank ?></td>
										<td><?php echo $rekening->no_rekening ?></td>
										
                <?php
									}
									?>
								
								
								
								
								
								
								
								
								</tbody>
							</table>
				</div>
				

			</div>
		</div>
	</div>
</section>


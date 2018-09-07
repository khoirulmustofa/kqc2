<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			<?php echo ucwords($title." ".$button)?>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url('admin')?>"><i
					class="fa fa-dashboard"></i> Beranda</a></li>
			<li class="active"><?php echo ucwords($title." ".$button)?></li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">
		<!-- Default box -->
		<div class="box box-success">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo ucwords($title." ".$button)?></h3>

				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool"
						data-widget="collapse" data-toggle="tooltip" title="Collapse">
						<i class="fa fa-minus"></i>
					</button>

				</div>
			</div>
			<div class="box-body">
			<?php
			$attributes = array (
					'role' => 'form' 
			);
			echo form_open_multipart ( $action, $attributes )?>				
				<div class="box-body">
					<div class="form-group">
						<label for="varchar">Kode Produk Kqc <?php echo form_error('kode_produk_kqc') ?></label>
						<input type="text" class="form-control" name="kode_produk_kqc"
							id="kode_produk_kqc" placeholder="Kode Produk Kqc"
							readonly="readonly" value="<?php echo $kode_produk_kqc; ?>" />
					</div>
					<div class="form-group">
						<label for="varchar">Nama Produk Kqc <?php echo form_error('nama_produk_kqc') ?></label>
						<input type="text" class="form-control" name="nama_produk_kqc"
							id="nama_produk_kqc" placeholder="Nama Produk Kqc"
							value="<?php echo $nama_produk_kqc; ?>" />
					</div>
					<div class="form-group">
						<label for="deskripsi_produk_kqc">Deskripsi Produk Kqc <?php echo form_error('deskripsi_produk_kqc') ?></label>
						<textarea class="form-control" rows="3"
							name="deskripsi_produk_kqc" id="deskripsi_produk_kqc"
							placeholder="Deskripsi Produk Kqc"><?php echo $deskripsi_produk_kqc; ?></textarea>
					</div>
					<div class="form-group">
						<label for="int">Harga Produk Kqc <?php echo form_error('harga_produk_kqc') ?></label>
						<input type="text" class="form-control" name="harga_produk_kqc"
							id="harga_produk_kqc" placeholder="Harga Produk Kqc"
							value="<?php echo $harga_produk_kqc; ?>" />
					</div>
					<div class="form-group">
						<label for="varchar">Gambar Produk Kqc <?php echo form_error('gambar_produk_kqc') ?></label>

						<input type="file" id="gambar_produk_kqc" name="gambar_produk_kqc">
								<?php
								
								if ($gambar_produk_kqc_1 != '') {
									?>
								<a class="label label-success"
							href="<?php echo base_url('public/galeri_foto/').$gambar_produk_kqc_1?>">Gambar yang di pilih  <?php echo $gambar_produk_kqc_1 ?></a>	
								<?php } ?>
						</div>
					<div class="form-group">
						<label for="int">Id Kategori Produk <?php echo form_error('id_kategori_produk') ?></label>
							<?php echo cmb_dinamis('id_kategori_produk', 'kategori_produk', 'nama_kategori_produk', 'id_kategori_produk', $id_kategori_produk,'Pilih Kategory'); ?>
					</div>
				</div>
				<!-- /.box-body -->
				<div class="box-footer">
					<input type="hidden" name="gambar_produk_kqc_1"
						value="<?php echo $gambar_produk_kqc_1; ?>" /> <input
						type="hidden" name="id_produk_kqc"
						value="<?php echo $id_produk_kqc; ?>" />
					<button type="submit" class="btn btn-primary"><?php echo $button ?></button>
					<a href="<?php echo site_url('admin/kqc_mart') ?>"
						class="btn btn-default">Cancel</a>
				</div>
				<!-- /.box-footer-->
			<?php echo form_close();?>
		
			</div>
		</div>
	</section>
	<!-- /.content -->
</div>
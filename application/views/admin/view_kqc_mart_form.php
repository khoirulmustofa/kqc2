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
						<label for="varchar">Nama Kqc Mart <?php echo form_error('nama_kqc_mart') ?></label>
						<input type="text" class="form-control" name="nama_kqc_mart"
							id="nama_kqc_mart" placeholder="Nama Kqc Mart"
							value="<?php echo $nama_kqc_mart; ?>" />
					</div>
					<div class="form-group">
						<label for="int">Harga Kqc Mart <?php echo form_error('harga_kqc_mart') ?></label>
						<input type="text" class="form-control" name="harga_kqc_mart"
							id="harga_kqc_mart" placeholder="Harga Kqc Mart"
							value="<?php echo $harga_kqc_mart; ?>" />
					</div>
					<div class="form-group">
						<label for="int">Jumlah Kqc Mart <?php echo form_error('jumlah_kqc_mart') ?></label>
						<input type="text" class="form-control" name="jumlah_kqc_mart"
							id="jumlah_kqc_mart" placeholder="Jumlah Kqc Mart"
							value="<?php echo $jumlah_kqc_mart; ?>" />
					</div>
					<div class="form-group">
						<label for="varchar">Gambar Galeri Foto <?php echo form_error('gambar_kqc_mart') ?></label>

						<input type="file" id="gambar_kqc_mart" name="gambar_kqc_mart">
								<?php
								
								if ($gambar_kqc_mart_1 != '') {
									?>
								<a class="label label-success"
							href="<?php echo base_url('public/kqc_mart/').$gambar_kqc_mart_1?>">Gambar yang di pilih  <?php echo $gambar_kqc_mart_1 ?></a>	
								<?php } ?>
						</div>
				</div>
				<!-- /.box-body -->
				<div class="box-footer">
					<input type="hidden" name="gambar_kqc_mart_1"
						value="<?php echo $gambar_kqc_mart_1; ?>" /> <input type="hidden"
						name="id_kqc_mart" value="<?php echo $id_kqc_mart; ?>" />
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
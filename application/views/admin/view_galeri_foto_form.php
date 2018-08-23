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
							<label for="varchar">Nama Galeri Foto <?php echo form_error('nama_galeri_foto') ?></label>
							<input type="text" class="form-control" name="nama_galeri_foto"
								id="nama_galeri_foto" placeholder="Nama Galeri Foto"
								value="<?php echo $nama_galeri_foto; ?>" />
						</div>
						<div class="form-group">
							<label for="keterangan_galeri_foto">Keterangan Galeri Foto <?php echo form_error('keterangan_galeri_foto') ?></label>
							<textarea class="form-control" rows="3"
								name="keterangan_galeri_foto" id="keterangan_galeri_foto"
								placeholder="Keterangan Galeri Foto"><?php echo $keterangan_galeri_foto; ?></textarea>
						</div>
						<div class="form-group">
							<label for="varchar">Gambar Galeri Foto <?php echo form_error('gambar_galeri_foto') ?></label>
							
								<input type="file" id="gambar_galeri_foto" name="gambar_galeri_foto">
								<?php
								
								if ($gambar_galeri_foto_1 != '') {
									?>
								<a class="label label-success"
								href="<?php echo base_url('public/galeri_foto/').$gambar_galeri_foto_1?>">Gambar yang di pilih  <?php echo $gambar_galeri_foto_1 ?></a>	
								<?php } ?>
						</div>
				</div>
				<!-- /.box-body -->
				<div class="box-footer">
					<input type="hidden" name="gambar_galeri_foto_1"
								value="<?php echo $gambar_galeri_foto_1; ?>" /> <input type="hidden"
								name="id_galeri_foto" value="<?php echo $id_galeri_foto; ?>" />
							<button type="submit" class="btn btn-primary"><?php echo $button ?></button>
							<a href="<?php echo site_url('admin/galeri_foto') ?>"
								class="btn btn-default">Cancel</a>
				</div>
				<!-- /.box-footer-->
			<?php echo form_close();?>
		
			</div>
		</div>
	</section>
	<!-- /.content -->
</div>
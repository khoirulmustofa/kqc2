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
							<label for="varchar">Nama Pendidikan Dakwah <?php echo form_error('nama_pendidikan_dakwah') ?></label>
							<input type="text" class="form-control"
								name="nama_pendidikan_dakwah" id="nama_pendidikan_dakwah"
								placeholder="Nama Pendidikan Dakwah"
								value="<?php echo $nama_pendidikan_dakwah; ?>" />
						</div>
						<div class="form-group">
							<label for="keterangan_pendidikan_dakwah">Keterangan Pendidikan Dakwah <?php echo form_error('keterangan_pendidikan_dakwah') ?></label>
							<textarea class="form-control" rows="3"
								name="keterangan_pendidikan_dakwah"
								id="keterangan_pendidikan_dakwah"
								placeholder="Keterangan Pendidikan Dakwah"><?php echo $keterangan_pendidikan_dakwah; ?></textarea>
						</div>
						<div class="form-group">
							<label for="varchar">Gambar Pendidikan Dakwah <?php echo form_error('gambar_pendidikan_dakwah') ?></label>

							<input type="file" id="gambar_pendidikan_dakwah"
								name="gambar_pendidikan_dakwah"
								value="<?php echo $gambar_pendidikan_dakwah_1?>">
								<?php
								
								if ($gambar_pendidikan_dakwah_1 != '') {
									?>
								<a class="label label-success"
								href="<?php echo base_url('public/pendidikan_dakwah/').$gambar_pendidikan_dakwah_1?>">Gambar yang di pilih <?php echo $gambar_pendidikan_dakwah_1 ?></a>	
								<?php } ?>
						</div>
				</div>
				<!-- /.box-body -->
				<div class="box-footer">
					<input type="hidden" name="gambar_pendidikan_dakwah_1"
								value="<?php echo $gambar_pendidikan_dakwah_1; ?>" /> <input
								type="hidden" name="id_pendidikan_dakwah"
								value="<?php echo $id_pendidikan_dakwah; ?>" />
							<button type="submit" class="btn btn-primary"><?php echo $button ?></button>
							<a
								href="<?php echo site_url('admin/pendidikan_dakwah') ?>"
								class="btn btn-default">Cancel</a>
				</div>
				<!-- /.box-footer-->
			<?php echo form_close();?>
		
			</div>
		</div>
	</section>
	<!-- /.content -->
</div>
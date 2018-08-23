<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			<?php echo $button." ". $title;?>
		</h1>

	</section>

	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<!-- general form elements -->
				<div class="box box-success">
					
					<?php
					$attributes = array (
							'role' => 'form' 
					);
					echo form_open_multipart ( $action, $attributes )?>
					
						<div class="box-body">
						<div class="form-group">
							<label for="varchar">Nama tentang Kami <?php echo form_error('nama_tentang_kami') ?></label>
							<input type="text" class="form-control" name="nama_tentang_kami"
								id="nama_tentang_kami" placeholder="Nama tentang Kami"
								value="<?php echo $nama_tentang_kami; ?>" />
						</div>
						<div class="form-group">
							<label for="isi_tentang_kami">Isi tentang Kami <?php echo form_error('isi_tentang_kami') ?></label>
							<textarea class="form-control" rows="3" name="isi_tentang_kami"
								id="isi_tentang_kami" placeholder="Isi tentang Kami"><?php echo $isi_tentang_kami; ?></textarea>
						</div>
						<div class="form-group">
							<label for="varchar">Gambar tentang Kami <?php echo form_error('gambar_tentang_kami') ?></label>

							<input type="file" id="gambar_tentang_kami"
								name="gambar_tentang_kami">
								<?php
								if ($button == 'Update') {
									
								
								if ($gambar_tentang_kami1 != '') {
									?>
								<a class="label label-success"
								href="<?php echo base_url('public/tentang_kami/').$gambar_tentang_kami1?>">Gambar yang di pilih <?php echo $gambar_tentang_kami1 ?></a>	
								<?php } } ?>
						</div>
					</div>
					<!-- /.box-body -->

					<div class="box-footer">
						<input type="hidden" name="gambar_tentang_kami1"
							value="<?php if ($button == 'Update') { echo $gambar_tentang_kami1; }?>" /> <input
							type="hidden" name="id_tentang_kami"
							value="<?php echo $id_tentang_kami; ?>" />
						<button type="submit" class="btn btn-primary"><?php echo $button ?></button>
						<a href="<?php echo site_url('admin/tentang_kami') ?>"
							class="btn btn-default">Cancel</a>
					</div>
					
					<?php echo form_close();?>
				</div>
				<!-- /.box -->
			</div>
		</div>
	</section>
	<!-- /.content -->
</div>
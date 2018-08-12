<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			<?php echo $button." ".$title ;?>
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
							<label for="varchar">Nama Carousel <?php echo form_error('nama_carousel') ?></label>
							<input type="text" class="form-control" name="nama_carousel"
								id="nama_carousel" placeholder="Nama Carousel"
								value="<?php echo $nama_carousel; ?>" />
						</div>
						<div class="form-group">
							<label for="varchar">Gambar Carousel <?php echo form_error('gambar_carousel') ?></label>
							<input type="file" id="gambar_carousel" name="gambar_carousel"
								value="<?php echo $gambar_carousel_1?>">
								<?php
								
								if ($gambar_carousel_1 != '') {
									?>
								<a class="label label-success"
								href="<?php echo base_url('public/carousel/').$gambar_carousel_1?>">Gambar yang di pilih <?php echo $gambar_carousel_1 ?></a>	
								<?php } ?>
								
						</div>
						<div class="form-group">
							<label for="keterangan_carousel">Keterangan Carousel <?php echo form_error('keterangan_carousel') ?></label>
							<textarea class="form-control" rows="3"
								name="keterangan_carousel" id="keterangan_carousel"
								placeholder="Keterangan Carousel"><?php echo $keterangan_carousel; ?></textarea>
						</div>
						<div class="form-group">
							<label for="enum">Active Carousel <?php echo form_error('active_carousel') ?></label>
							<label> <input type="checkbox" name="active_carousel" value="active" <?php echo $active_carousel <> '' ? 'checked' : ''; ?>>
							</label>
						</div>
						<!-- /.box-body -->

						<div class="box-footer">
							<input type="hidden" name="gambar_carousel_1"
								value="<?php echo $gambar_carousel_1; ?>" /> <input
								type="hidden" name="id_carousel"
								value="<?php echo $id_carousel; ?>" />
							<button type="submit" class="btn btn-primary"><?php echo $button ?></button>
							<a href="<?php echo site_url('administrator/carousel') ?>"
								class="btn btn-default">Cancel</a>
						</div>
					
					<?php echo form_close();?>
				</div>
					<!-- /.box -->
				</div>
			</div>
		</div>
	</section>
	<!-- /.content -->
</div>
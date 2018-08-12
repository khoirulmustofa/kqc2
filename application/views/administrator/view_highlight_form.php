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
							<label for="varchar">Nama Highlight <?php echo form_error('nama_highlight') ?></label>
							<input type="text" class="form-control" name="nama_highlight"
								id="nama_highlight" placeholder="Nama Highlight"
								value="<?php echo $nama_highlight; ?>" />
						</div>
						<div class="form-group">
							<label for="varchar">Gambar Highlight <?php echo form_error('gambar_highlight') ?></label>					
								<input type="file" id="gambar_highlight" name="gambar_highlight">
								<?php
								
								if ($gambar_highlight_1 != '') {
									?>
								<a class="label label-success"
								href="<?php echo base_url('public/highlight/').$gambar_highlight_1?>">Gambar yang di pilih  <?php echo $gambar_highlight_1 ?></a>	
								<?php } ?>
						</div>
						<div class="form-group">
							<label for="varchar">Link Highlight <?php echo form_error('link_highlight') ?></label>
							<input type="text" class="form-control" name="link_highlight"
								id="link_highlight" placeholder="Link Highlight"
								value="<?php echo $link_highlight; ?>" />
						</div>
						<div class="form-group">
							<label for="enum">Active Carousel <?php echo form_error('active_carousel') ?></label>
								<label> <input type="checkbox" name="active_carousel" value="active" <?php echo $active_carousel <> '' ? 'checked' : ''; ?>>
							</label>
						</div>
					</div>
					<div class="box-footer">
						<input type="hidden" name="gambar_highlight_1"
							value="<?php echo $gambar_highlight_1; ?>"/> <input type="hidden"
							name="id_highlight" value="<?php echo $id_highlight; ?>" />
						<button type="submit" class="btn btn-primary"><?php echo $button ?></button>
						<a href="<?php echo site_url('administrator/highlight') ?>"
							class="btn btn-default">Cancel</a>
					</div>
					<?php echo form_close();?>
				</div>
			</div>
		</div>
	</section>
</div>
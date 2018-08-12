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
					<form action="<?php echo $action; ?>" method="post" role="form">
						<div class="box-body">
							<div class="form-group">
								<label for="varchar">Nama Galeri Video <?php echo form_error('nama_galeri_video') ?></label>
								<input type="text" class="form-control" name="nama_galeri_video"
									id="nama_galeri_video" placeholder="Nama Galeri Video"
									value="<?php echo $nama_galeri_video; ?>" />
							</div>
							<div class="form-group">
								<label for="varchar">Link Galeri Video <?php echo form_error('link_galeri_video') ?></label>
								<input type="text" class="form-control" name="link_galeri_video"
									id="link_galeri_video" placeholder="Link Galeri Video"
									value="<?php echo $link_galeri_video; ?>" />
							</div>

							<div class="box-footer">
								<input type="hidden" name="id_galeri_video"
									value="<?php echo $id_galeri_video; ?>" />
								<button type="submit" class="btn btn-primary"><?php echo $button ?></button>
								<a href="<?php echo site_url('administrator/galeri_video') ?>"
									class="btn btn-default">Cancel</a>
							</div>
						</div>
					</form>
				</div>
				<!-- /.box -->
			</div>
		</div>
	</section>
	<!-- /.content -->
</div>
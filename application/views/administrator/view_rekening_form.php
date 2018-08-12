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
								<label for="varchar">Nama Bank <?php echo form_error('nama_bank') ?></label>
								<input type="text" class="form-control" name="nama_bank"
									id="nama_bank" placeholder="Nama Bank"
									value="<?php echo $nama_bank; ?>" />
							</div>
							<div class="form-group">
								<label for="varchar">No Rekening <?php echo form_error('no_rekening') ?></label>
								<input type="text" class="form-control" name="no_rekening"
									id="no_rekening" placeholder="No Rekening"
									value="<?php echo $no_rekening; ?>" />
							</div>
						</div>
						<!-- /.box-body -->

						<div class="box-footer">
							<input type="hidden" name="id_rekening"
								value="<?php echo $id_rekening; ?>" />
							<button type="submit" class="btn btn-primary"><?php echo $button ?></button>
							<a href="<?php echo site_url('administrator/rekening') ?>"
								class="btn btn-default">Cancel</a>
						</div>
					</form>
				</div>
				<!-- /.box -->
			</div>
		</div>
	</section>
	<!-- /.content -->
</div>
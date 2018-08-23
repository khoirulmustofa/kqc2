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
				<!-- /.box-footer-->
			<?php echo form_close();?>
		
			</div>
		</div>
	</section>
	<!-- /.content -->
</div>
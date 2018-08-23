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
				</div>
				<!-- /.box-body -->
				<div class="box-footer">
					<input type="hidden" name="id_galeri_video"
									value="<?php echo $id_galeri_video; ?>" />
								<button type="submit" class="btn btn-primary"><?php echo $button ?></button>
								<a href="<?php echo site_url('administrator/galeri_video') ?>"
									class="btn btn-default">Cancel</a>
				</div>
				<!-- /.box-footer-->
			<?php echo form_close();?>
		
			</div>
		</div>
	</section>
	<!-- /.content -->
</div>
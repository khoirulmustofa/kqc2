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
						<label for="varchar">Name Kata Mereka <?php echo form_error('name_kata_mereka') ?></label>
						<input type="text" class="form-control" name="name_kata_mereka"
							id="name_kata_mereka" placeholder="Name Kata Mereka"
							value="<?php echo $name_kata_mereka; ?>" />
					</div>
					<div class="form-group">
						<label for="varchar">Photo Kata Mereka <?php echo form_error('photo_kata_mereka') ?></label>
						<input type="file" id="photo_kata_mereka" name="photo_kata_mereka">
								<?php
								
								if ($photo_kata_mereka_1 != '') {
									?>
								<a class="label label-success"
								href="<?php echo base_url('public/kata_mereka/').$photo_kata_mereka_1?>">Gambar yang di pilih  <?php echo $photo_kata_mereka_1 ?></a>	
								<?php } ?>
					</div>
					<div class="form-group">
						<label for="quote_kata_mereka">Quote Kata Mereka <?php echo form_error('quote_kata_mereka') ?></label>
						<textarea class="form-control" rows="3" name="quote_kata_mereka"
							id="quote_kata_mereka" placeholder="Quote Kata Mereka"><?php echo $quote_kata_mereka; ?></textarea>
					</div>
				</div>
				<!-- /.box-body -->
				<div class="box-footer">
				<input type="hidden" name="photo_kata_mereka_1"
								value="<?php echo $photo_kata_mereka_1; ?>" />
					<input type="hidden" name="id_kata_mereka"
						value="<?php echo $id_kata_mereka; ?>" />
					<button type="submit" class="btn btn-primary"><?php echo $button ?></button>
					<a href="<?php echo site_url('admin/kata_mereka') ?>"
						class="btn btn-default">Cancel</a>
				</div>
				<!-- /.box-footer-->
			<?php echo form_close();?>
		
			</div>
		</div>
	</section>
	<!-- /.content -->
</div>
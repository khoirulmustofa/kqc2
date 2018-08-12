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
		<div class="box box-info">
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
						<label for="varchar">Judul Menus <?php echo form_error('judul_menus') ?></label>
						<input type="text" class="form-control" name="judul_menus"
							id="judul_menus" placeholder="Judul Menus"
							value="<?php echo $judul_menus; ?>" />
					</div>
					<div class="form-group">
						<label for="varchar">Link Menus <?php echo form_error('link_menus') ?></label>
						<input type="text" class="form-control" name="link_menus"
							id="link_menus" placeholder="Link Menus"
							value="<?php echo $link_menus; ?>" />
					</div>
					<div class="form-group">
						<label for="varchar">Icon Menus <?php echo form_error('icon_menus') ?></label>
						<input type="text" class="form-control" name="icon_menus"
							id="icon_menus" placeholder="Icon Menus"
							value="<?php echo $icon_menus; ?>" />
					</div>
					<div class="form-group">
						<label for="int">Is Main Menu <?php echo form_error('is_main_menu') ?></label>
						<input type="text" class="form-control" name="is_main_menu"
							id="is_main_menu" placeholder="Is Main Menu"
							value="<?php echo $is_main_menu; ?>" />
					</div>
				</div>
				<!-- /.box-body -->
				<div class="box-footer">
					<input type="hidden" name="id_menus" value="<?php echo $id_menus; ?>" />
					<button type="submit" class="btn btn-primary"><?php echo $button ?></button>
					<a href="<?php echo site_url('admin/menus') ?>"
						class="btn btn-default">Cancel</a>
				</div>
				<!-- /.box-footer-->
			<?php echo form_close();?>
		
			</div>
		</div>
	</section>
	<!-- /.content -->
</div>
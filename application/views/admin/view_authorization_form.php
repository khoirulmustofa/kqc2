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
				<h3 class="box-title">Nama Menu : <?php // echo ucwords( $groups->name);?></h3>

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
						<h3 class="box-title">List Menu Untuk Groups <?php // echo ucwords( $groups->name);?></h3>
						<hr>
						<?php
						foreach ( $data_menus as $menus ) {
							?>
							<?php
							$id_menus = $menus ['id_menus'];
							$checked = null;
							foreach ( $data_current_menu_groups as $current_menu_groups ) {
								if ($id_menus == $current_menu_groups->menu_id) {
									$checked = 'checked="checked"';
								}
							}
							?>
							<div class="checkbox">
							<label> <input type="checkbox" name="menus[]"
								<?php echo $checked;?>> <?php echo $menus['judul_menus']?>
							</label>
						</div>
						<?php
						}
						?>
						</div>
				</div>

			</div>
			<!-- /.box-body -->
			<div class="box-footer">
				<input type="hidden" name="group_id" value="<?php echo $group_id; ?>" />
				<button type="submit" class="btn btn-primary"><?php echo $button ?></button>
				<a href="<?php echo site_url('admin/groups') ?>" class="btn btn-default">Cancel</a>
			</div>
			<!-- /.box-footer-->
			<?php echo form_close();?>
		
			</div>

	</section>
	<!-- /.content -->
</div>
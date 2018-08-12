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
				<h3 class="box-title">Nama Menu : <?php echo ucwords( $groups->name);?></h3>

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
						<h3 class="box-title">List Menu Untuk Groups <?php echo ucwords( $groups->name);?></h3>
						<hr>
						<?php
						foreach ( $menu_data as $menu ) {
							foreach ($menu_groups as $menus){
								echo $menus->menu_id;
								$_ck =  $menu->id_menus == $menus->menu_id  ? '' : 'checked="checked"';
							}
							?>
							<div class="checkbox">
							<label> <input type="checkbox" <?php echo $_ck;?> > <?php echo ucwords( $menu->judul_menus);?>
								</label>
						</div>		
                		<?php } ?>
						</div>
				</div>

			</div>
			<!-- /.box-body -->
			<div class="box-footer"></div>
			<!-- /.box-footer-->
			<?php echo form_close();?>
		
			</div>

	</section>
	<!-- /.content -->
</div>
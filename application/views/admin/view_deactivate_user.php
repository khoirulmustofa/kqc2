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
	<section class="content">

		<!-- Default box -->
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title">User</h3>

				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool"
						data-widget="collapse" data-toggle="tooltip" title="Collapse">
						<i class="fa fa-minus"></i>
					</button>

				</div>
			</div>
			<div class="box-body"><?php
			$attributes = array (
					'role' => 'form' 
			)
			;
			echo form_open_multipart ("admin/deactivate/".$user->id, $attributes )?>	
			<div class="box-body">
					<div class="form-group">
						<h4>
							Are you sure you want to deactivate the user <b><?php echo $user->username;?></b>
						</h4>
						<div class="radio">
							<label> <input type="radio" name="confirm" value="yes"
								checked="checked" /> Yes
							</label> <label> <input type="radio" name="confirm" value="no" />
								No
							</label>
						</div>

					</div>
				</div>
				<div class="box-footer">
<?php echo form_hidden($csrf); ?>
  <?php echo form_hidden(array('id'=>$user->id)); ?>
						<button type="submit" class="btn btn-primary"><?php echo $button ?></button>
					<a href="<?php echo site_url('admin/users') ?>"
						class="btn btn-default">Cancel</a>
				</div>
			</div>
			<?php echo form_close();?>
		</div>
	</section>



	<!-- /.content -->
</div>
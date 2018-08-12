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
				<div class="row">
					<div class="col-sm-5">
						<?php echo anchor(site_url('admin/users_create'),'Create User', 'class="btn btn-success"'); ?>
					</div>

				</div>
				
						<?php
						
						if ($this->session->userdata ( 'message' ) != '') {
							?>
							
						<div class="callout callout-success">
               
                
                <?php echo $this->session->userdata ( 'message' )?>
              </div>
							<?php
						}
						
						?>
			</div>
			<div class="box-body">
				<table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>No</th>
							<th>Awal Nama</th>
							<th>Akhir Nama</th>

							<th>Email</th>
							<th>Groups</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
								<?php $start=0; foreach ($users as $user):?>
		<tr>
							<td><?php echo ++$start ?></td>
							<td><?php echo htmlspecialchars($user->first_name,ENT_QUOTES,'UTF-8');?></td>
							<td><?php echo htmlspecialchars($user->last_name,ENT_QUOTES,'UTF-8');?></td>
							<td><?php echo htmlspecialchars($user->email,ENT_QUOTES,'UTF-8');?></td>
							<td>
				<?php foreach ($user->groups as $group):?>
					<?php echo anchor("admin/groups_update/".$group->id, htmlspecialchars($group->name,ENT_QUOTES,'UTF-8')) ;?><br />
                <?php endforeach?>
			</td>
							<td><?php echo ($user->active) ? anchor("admin/deactivate/".$user->id, lang('index_active_link')) : anchor("admin/activate/". $user->id, lang('index_inactive_link'));?></td>
							<td><?php echo anchor("admin/users_update/".$user->id, 'Edit') ;?></td>
						</tr>
	<?php endforeach;?>
							</tbody>
				</table>
			</div>
			<!-- /.box-body -->

		</div>
		<!-- /.box -->

	</section>
	<!-- /.content -->
</div>
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>Create User</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url('admin')?>"><i
					class="fa fa-dashboard"></i> Beranda</a></li>
			<li class="active">Create User</li>
		</ol>
	</section>

	<!-- Main content -->
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
			);
			echo form_open_multipart ( $action, $attributes )?>				
				<div class="box-body">
					<div class="form-group">
						<label for="varchar">First Name <?php echo form_error('first_name') ?></label>
						<input type="text" class="form-control" name="first_name"
							id="first_name" placeholder="First name"
							value="<?php echo $first_name; ?>" />
					</div>
					<div class="form-group">
						<label for="varchar">Last Name <?php echo form_error('last_name') ?></label>
						<input type="text" class="form-control" name="last_name"
							id="last_name" placeholder="Last name"
							value="<?php echo $last_name; ?>" />
					</div>
					<?php if ($button == 'Create') {?>
					<div class="form-group">
						<label for="varchar">Email <?php echo form_error('email') ?></label>
						<input type="text" class="form-control" name="email" id="email"
							placeholder="Email" value="<?php echo $email; ?>" />
					</div>
					<?php }?>
					<div class="form-group">
						<label for="varchar">Phone <?php echo form_error('phone') ?></label>
						<input type="text" class="form-control" name="phone" id="phone"
							placeholder="Phone" value="<?php echo $phone; ?>" />
					</div>
					<div class="form-group">
						<label for="varchar">Password <?php echo form_error('password') ?></label>
						<?php echo $button == 'Update' ?  '<br><code>Use if changing password</code>' : ''; ?>
						<input type="text" class="form-control" name="password"
							id="password" placeholder="Password"
							value="<?php echo $password; ?>" />
					</div>
					<div class="form-group">
						<label for="varchar">Password Confirm <?php echo form_error('password_confirm') ?></label>
						<?php echo $button == 'Update' ?  '<br><code>Use if changing password</code>' : ''; ?>
						<input type="text" class="form-control" name="password_confirm"
							id="password_confirm" placeholder="Password Confirm"
							value="<?php echo $password_confirm; ?>" />
					</div>
					
					<?php
					if ($button == 'Update') {
						echo form_hidden ( 'id', $user->id );
						echo form_hidden ( $csrf );
						if ($this->ion_auth->is_admin ()) {
							?>
					<div class="form-group">
						<h3>Member of Groups</h3>
						<div class="checkbox">
						<?php
							
							foreach ( $groups as $group ) {
								$gID = $group ['id'];
								$checked = null;
								$item = null;
								foreach ( $currentGroups as $grp ) {
									if ($gID == $grp->id) {
										$checked = ' checked="checked"';
										break;
									}
								}
								?>
			              <label> <input type="checkbox" name="groups[]"
								value="<?php echo $group['id'];?>" <?php echo $checked;?>>
			              <?php echo htmlspecialchars($group['name'],ENT_QUOTES,'UTF-8');?>
			              </label>
						<?php }?>
						</div>
					</div>
					<?php } }?>
				</div>
				<!-- /.box-body -->
				<div class="box-footer">

					<button type="submit" class="btn btn-primary"><?php echo $button ?></button>
					<a href="<?php echo site_url('admin/users') ?>"
						class="btn btn-default">Cancel</a>
				</div>

				<!-- /.box-footer-->
			<?php echo form_close();?>
		
			</div>
		</div>
	</section>
	<!-- /.content -->
</div>
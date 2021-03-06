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
						<?php echo anchor(site_url('admin/pendidikan_dakwah_create'),'Create', 'class="btn btn-success"'); ?>
					</div>
					<div class="col-sm-7 ">
						<form action="<?php echo site_url('admin/pendidikan_dakwah'); ?>"
							class="form-inline pull-right" method="get">
							<div class="input-group">
								<input type="text" class="form-control" name="q"
									value="<?php echo $q; ?>"> <span class="input-group-btn">
                            <?php
																												if ($q != '') {
																													?>
                                    <a
									href="<?php echo site_url('admin/pendidikan_dakwah'); ?>"
									class="btn btn-default">Reset</a>
                                    <?php
																												}
																												?>
                          <button class="btn btn-primary" type="submit">Search</button>
								</span>
							</div>
						</form>

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
			<div class="box-body table-responsive no-padding">
				<table class="table table-bordered table-striped table-hover">
							<thead>
								<tr>
									<th>No</th>
									<th>Nama Pendidikan Dakwah</th>
									<th>Gambar Pendidikan Dakwah</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
							<?php
							foreach ( $pendidikan_dakwah_data as $pendidikan_dakwah ) {
								?>
                <tr>
									<td width="80px"><?php echo ++$start ?></td>
									<td><?php echo $pendidikan_dakwah->nama_pendidikan_dakwah ?></td>
									<td><?php echo $pendidikan_dakwah->gambar_pendidikan_dakwah ?></td>
									<td style="text-align: center" width="200px">
				<?php
								echo anchor ( site_url ( 'admin/pendidikan_dakwah_update/' . $pendidikan_dakwah->id_pendidikan_dakwah ), 'Update' );
								echo ' | ';
								echo anchor ( site_url ( 'admin/pendidikan_dakwah_delete/' . $pendidikan_dakwah->id_pendidikan_dakwah ), 'Delete', 'onclick="javasciprt: return confirm(\'Are You Sure ?\')"' );
								?>
			</td>
								</tr>
                <?php
							}
							?>
							</tbody>
						</table>
			</div>
			<!-- /.box-body -->
			<div class="box-footer">
				<div class="row">
					<div class="col-sm-5">
						<div class="dataTables_info" id="example2_info" role="status"
							aria-live="polite">Total Record : <?php echo $total_rows ?></div>
					</div>
					<div class="col-sm-7 ">
							<?php echo $pagination?>
						
					</div>
				</div>
			</div>
			<!-- /.box-footer-->
		</div>
		<!-- /.box -->

	</section>
	<!-- /.content -->
</div>
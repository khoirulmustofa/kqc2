<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			<?php echo $button." ". $title;?>
		</h1>

	</section>

	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box box-success">
					<div class="box-header">
						<table class="table table-hover">
							<tr>
								<td><?php echo anchor(site_url('admin/tentang_kami_create'),'Create', 'class="btn btn-primary"'); ?></td>
								<td>
									<form
										action="<?php echo site_url('admin/tentang_kami'); ?>"
										class="form-inline pull-right" method="get">
										<div class="input-group">
											<input type="text" class="form-control" name="q"
												value="<?php echo $q; ?>"> <span class="input-group-btn">
                            <?php
																												if ($q != '') {
																													?>
                                    <a
												href="<?php echo site_url('admin/tentang_kami'); ?>"
												class="btn btn-default">Reset</a>
                                    <?php
																												}
																												?>
                          <button class="btn btn-primary" type="submit">Search</button>
											</span>
										</div>
									</form>
								</td>
							</tr>
						</table>
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

					<!-- /.box-header -->
					<div class="box-body table-responsive no-padding">
						<table class="table table-bordered table-striped table-hover">
							<thead>
								<tr>
									<th>No</th>
									<th>Nama tentang Kami</th>
									<th>Gambar tentang Kami</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
							<?php
							foreach ( $tentang_kami_data as $tentang_kami ) {
								?>
                <tr>
									<td width="80px"><?php echo ++$start ?></td>
									<td><?php echo $tentang_kami->nama_tentang_kami ?></td>
									<td><?php echo $tentang_kami->gambar_tentang_kami ?></td>
									<td style="text-align: center" width="200px">
				<?php
								echo anchor ( site_url ( 'admin/tentang_kami_update/' . $tentang_kami->id_tentang_kami ), 'Update' );
								echo ' | ';
								echo anchor ( site_url ( 'admin/tentang_kami_delete/' . $tentang_kami->id_tentang_kami ), 'Delete', 'onclick="javasciprt: return confirm(\'Are You Sure ?\')"' );
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
				</div>
				<div class="row">
					<div class="col-md-6">
						<a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
					</div>
					<div class="col-md-6 text-right">
                <?php echo $pagination?>
            </div>
				</div>
				<!-- /.box -->
			</div>
		</div>
	</section>
	<!-- /.content -->
</div>
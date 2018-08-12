<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			<?php echo $button." ".$title ;?>
		</h1>

	</section>

	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<!-- general form elements -->
				<div class="box box-success">				
					<?php
					$attributes = array (
							'role' => 'form' 
					);
					echo form_open_multipart ( $action, $attributes )?>				
						<div class="box-body">
						<div class="form-group">
							<label for="varchar">Username <?php echo form_error('username') ?></label>
							<input type="text" class="form-control" name="username"
								id="username" placeholder="Username"
								value="<?php echo $username; ?>" />
						</div>
						<div class="form-group">
							<label for="varchar">Judul berita <?php echo form_error('judul_berita') ?></label>
							<input type="text" class="form-control" name="judul_berita"
								id="judul_berita" placeholder="Judul berita"
								value="<?php echo $judul_berita; ?>" />
						</div>
						<div class="form-group">
							<label for="isi_berita">Isi berita <?php echo form_error('isi_berita') ?></label>
							<textarea class="form-control" rows="3" name="isi_berita"
								id="isi_berita" placeholder="Isi berita"><?php echo $isi_berita; ?></textarea>
						</div>
						<div class="form-group">
							<label for="varchar">Gambar <?php echo form_error('gambar') ?></label>

							<input type="file" id="gambar" name="gambar">
								<?php
								
								if ($gambar_1 != '') {
									?>
								<a class="label label-success"
								href="<?php echo base_url('public/foto_berita/').$gambar_1?>">Gambar yang di pilih  <?php echo $gambar_1 ?></a>	
								<?php } ?>
						</div>
						<div class="form-group">
							<label for="varchar">Tag <?php echo form_error('tag') ?></label>
							<select class="form-control select2" multiple="multiple"
								name="tag[]" data-placeholder="Pilih Tag" style="width: 100%;">
								
								<?php
								$_arrNilai = explode ( ',', $tag );
								foreach ( $tag_data as $tag ) {
									$_ck = (array_search ( $tag->tag_seo, $_arrNilai ) === false) ? '' : 'selected="selected"';
									?>
									<option value="<?php echo $tag->tag_seo ?>" <?php echo $_ck;?>><?php echo $tag->nama_tag ?></option>
                				<?php } ?>
							</select>
						</div>
						<div class="box-footer">
							<input type="hidden" name="gambar_1"
								value="<?php echo $gambar_1; ?>" /> <input type="hidden"
								name="id_berita" value="<?php echo $id_berita; ?>" />
							<button type="submit" class="btn btn-primary"><?php echo $button ?></button>
							<a href="<?php echo site_url('administrator/berita') ?>"
								class="btn btn-default">Cancel</a>
						</div>
					<?php echo form_close();?>
				</div>
				</div>
			</div>
		</div>
	</section>
</div>
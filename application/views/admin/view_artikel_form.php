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
						<label for="varchar">Judul Artikel <?php echo form_error('judul_artikel') ?></label>
						<input type="text" class="form-control" name="judul_artikel"
							id="judul_artikel" placeholder="Judul Artikel"
							value="<?php echo $judul_artikel; ?>" />
					</div>
					<div class="form-group">
						<label for="isi_artikel">Isi Artikel <?php echo form_error('isi_artikel') ?></label>
						<textarea class="form-control" rows="3" name="isi_artikel"
							id="isi_artikel" placeholder="Isi Artikel"><?php echo $isi_artikel; ?></textarea>
					</div>
					<div class="form-group">
						<label for="varchar">Gambar <?php echo form_error('gambar') ?></label>

						<input type="file" id="gambar" name="gambar">
								<?php
								
								if ($gambar_1 != '') {
									?>
								<a class="label label-success"
							href="<?php echo base_url('public/foto_artikel/').$gambar_1?>">Gambar yang di pilih  <?php echo $gambar_1 ?></a>	
								<?php } ?>
						</div>
					<div class="form-group">
						<label for="varchar">Tag <?php echo form_error('tag') ?></label> <select
							class="form-control select2" multiple="multiple" name="tag[]"
							data-placeholder="Pilih Tag" style="width: 100%;">
								
								<?php
								$_arrNilai = explode ( ',', $tag );
								foreach ( $tag_data as $tag ) {
									$_ck = (array_search ( $tag->tag_seo, $_arrNilai ) === false) ? '' : 'selected="selected"';
									?>
									<option value="<?php echo $tag->tag_seo ?>" <?php echo $_ck;?>><?php echo $tag->nama_tag ?></option>
                				<?php } ?>
							</select>

					</div>
				</div>
				<!-- /.box-body -->
				<div class="box-footer">
					<input type="hidden" name="gambar_1"
						value="<?php echo $gambar_1; ?>" /> <input type="hidden"
						name="id_artikel" value="<?php echo $id_artikel; ?>" />
					<button type="submit" class="btn btn-primary"><?php echo $button ?></button>
					<a href="<?php echo site_url('admin/artikel') ?>"
						class="btn btn-default">Cancel</a>
				</div>
				<!-- /.box-footer-->
			<?php echo form_close();?>
		
			</div>
		</div>
	</section>
	<!-- /.content -->
</div>
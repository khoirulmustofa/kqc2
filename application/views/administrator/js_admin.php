<?php
if (isset ( $page ) && $page == 'Manajemen') {
	?>
<script
	src="<?php echo base_url('template/admin_lte')?>/bower_components/ckeditor/ckeditor.js"></script>
<script>
  $(function () {
    
    CKEDITOR.replace('isi_manajemen')
  })
</script>
<?php
} elseif (isset ( $page ) && $page == 'Sejarah') {
	?>
<script
	src="<?php echo base_url('template/admin_lte')?>/bower_components/ckeditor/ckeditor.js"></script>
<script>
  $(function () {
    
    CKEDITOR.replace('isi_sejarah')
  })
</script>
<?php
} elseif (isset ( $page ) && $page == 'Visi_misi') {
	?>
<script
	src="<?php echo base_url('template/admin_lte')?>/bower_components/ckeditor/ckeditor.js"></script>
<script>
  $(function () {
    
    CKEDITOR.replace('isi_visi_misi')
  })
</script>
<?php
} elseif (isset ( $page ) && $page == 'Tetang_kami') {
	?>
<script
	src="<?php echo base_url('template/admin_lte')?>/bower_components/ckeditor/ckeditor.js"></script>
<script>
  $(function () {
    
    CKEDITOR.replace('isi_tetang_kami')
  })
</script>
<?php
} elseif (isset ( $page ) && $page == 'berita') {
	?>
<!-- Select2 -->
<script
	src="<?php echo base_url('template/admin_lte')?>/bower_components/select2/dist/js/select2.full.min.js"></script>
<script
	src="<?php echo base_url('template/admin_lte')?>/bower_components/ckeditor/ckeditor.js"></script>
<script>
  $(function () {
	//Initialize Select2 Elements
	    $('.select2').select2()
	    CKEDITOR.replace('isi_berita')
  })
  </script>
<?php
} elseif (isset ( $page ) && $page == 'artikel') {
	?>
<!-- Select2 -->
<script
	src="<?php echo base_url('template/admin_lte')?>/bower_components/select2/dist/js/select2.full.min.js"></script>
<script
	src="<?php echo base_url('template/admin_lte')?>/bower_components/ckeditor/ckeditor.js"></script>
<script>
  $(function () {
	//Initialize Select2 Elements
	    $('.select2').select2()
	    CKEDITOR.replace('isi_artikel')
  })
  </script>
<?php
} elseif (isset ( $page ) && $page == 'carousel') {
	?>
<script
	src="<?php echo base_url('template/admin_lte')?>/bower_components/ckeditor/ckeditor.js"></script>
<script>
  $(function () {
	//Initialize Select2 Elements
	    CKEDITOR.replace('keterangan_carousel')
  })
  </script>
<?php
} elseif (isset ( $page ) && $page == 'pendidikan_dakwah') {
	?>
<script
	src="<?php echo base_url('template/admin_lte')?>/bower_components/ckeditor/ckeditor.js"></script>
<script>
  $(function () {
	//Initialize Select2 Elements
	    CKEDITOR.replace('keterangan_pendidikan_dakwah')
  })
  </script>
<?php
} elseif (isset ( $page ) && $page == 'galeri_foto') {
	?>
<script
	src="<?php echo base_url('template/admin_lte')?>/bower_components/ckeditor/ckeditor.js"></script>
<script>
  $(function () {
	//Initialize Select2 Elements
	    CKEDITOR.replace('keterangan_galeri_foto')
  })
  </script>
<?php
} 
<?php
if (isset ( $page ) && $page == 'berita_list') {
	?>
<script
	src="<?php echo base_url('template/lte/')?>vendors/jquery-1.9.1.js"></script>
<script
	src="<?php echo base_url('template/lte/')?>bootstrap/js/bootstrap.min.js"></script>
<script
	src="<?php echo base_url('template/lte/')?>vendors/datatables/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('template/lte/')?>assets/scripts.js"></script>
<script
	src="<?php echo base_url('template/lte/')?>assets/DT_bootstrap.js"></script>

<?php
}
if (isset ( $page ) && $page == 'berita_form') {
	?>
<!-- Select2 -->
<script
	src="<?php echo base_url('template/lte/')?>bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- CK Editor -->
<script
	src="<?php echo base_url('template/lte/')?>bower_components/ckeditor/ckeditor.js"></script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
    // Replace the <textarea id="editor1">
    CKEDITOR.replace('isi_berita')
  })
 
</script>
<?php
}
if (isset ( $page ) && $page == 'users_list') {
	?>
<!-- DataTables -->
<script
	src="<?php echo base_url('template/lte/')?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script
	src="<?php echo base_url('template/lte/')?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script>
  $(document).ready(function () {
   
    $('#example1').DataTable()
  })
</script>
<?php
}
if (isset ( $page ) && $page == 'tentang_kami_form') {
	?>
<!-- Select2 -->
<script
	src="<?php echo base_url('template/lte/')?>bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- CK Editor -->
<script
	src="<?php echo base_url('template/lte/')?>bower_components/ckeditor/ckeditor.js"></script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
    // Replace the <textarea id="editor1">
    CKEDITOR.replace('isi_tentang_kami')
  })
 
</script>
<?php
}
if (isset ( $page ) && $page == 'artikel_list') {
	?>
<script
	src="<?php echo base_url('template/lte/')?>vendors/jquery-1.9.1.js"></script>
<script
	src="<?php echo base_url('template/lte/')?>bootstrap/js/bootstrap.min.js"></script>
<script
	src="<?php echo base_url('template/lte/')?>vendors/datatables/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('template/lte/')?>assets/scripts.js"></script>
<script
	src="<?php echo base_url('template/lte/')?>assets/DT_bootstrap.js"></script>
<?php
}if (isset ( $page ) && $page == 'artikel_form') {
	?>
<!-- Select2 -->
<script
	src="<?php echo base_url('template/lte/')?>bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- CK Editor -->
<script
	src="<?php echo base_url('template/lte/')?>bower_components/ckeditor/ckeditor.js"></script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
    // Replace the <textarea id="editor1">
    CKEDITOR.replace('isi_artikel')
  })
 
</script>
<?php
}if (isset ( $page ) && $page == 'pendidikan_dakwah_form') {
	?>
<!-- Select2 -->
<script
	src="<?php echo base_url('template/lte/')?>bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- CK Editor -->
<script
	src="<?php echo base_url('template/lte/')?>bower_components/ckeditor/ckeditor.js"></script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
    // Replace the <textarea id="editor1">
    CKEDITOR.replace('keterangan_pendidikan_dakwah')
  })
 
</script>
<?php
}if (isset ( $page ) && $page == 'galeri_foto_form') {
	?>
<!-- Select2 -->
<script
	src="<?php echo base_url('template/lte/')?>bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- CK Editor -->
<script
	src="<?php echo base_url('template/lte/')?>bower_components/ckeditor/ckeditor.js"></script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
    // Replace the <textarea id="editor1">
    CKEDITOR.replace('keterangan_galeri_foto')
  })
 
</script>
<?php
}if (isset ( $page ) && $page == 'carousel_form') {
	?>
<!-- Select2 -->
<script
	src="<?php echo base_url('template/lte/')?>bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- CK Editor -->
<script
	src="<?php echo base_url('template/lte/')?>bower_components/ckeditor/ckeditor.js"></script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
    // Replace the <textarea id="editor1">
    CKEDITOR.replace('keterangan_carousel')
  })
 
</script>
<?php
}if (isset ( $page ) && $page == 'kata_mereka_form') {
	?>
<!-- Select2 -->
<script
	src="<?php echo base_url('template/lte/')?>bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- CK Editor -->
<script
	src="<?php echo base_url('template/lte/')?>bower_components/ckeditor/ckeditor.js"></script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
    // Replace the <textarea id="editor1">
    CKEDITOR.replace('quote_kata_mereka')
  })
 
</script>
<?php
}if (isset ( $page ) && $page == 'kqc_mart_form') {
	?>
<!-- Select2 -->
<script
	src="<?php echo base_url('template/lte/')?>bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- CK Editor -->
<script
	src="<?php echo base_url('template/lte/')?>bower_components/ckeditor/ckeditor.js"></script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
    // Replace the <textarea id="editor1">
    CKEDITOR.replace('deskripsi_produk_kqc')
  })
 
</script>
<?php
}
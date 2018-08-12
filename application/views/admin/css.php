<?php
if (isset ( $page ) && $page == 'berita_list') {
	?>
<?php
}

if (isset ( $page ) && $page == 'berita_form') {
	?>
<!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url('template/lte/')?>bower_components/select2/dist/css/select2.min.css">
  <?php
}if (isset ( $page ) && $page == 'users_list') {
	?>
	<!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url('template/lte/')?>bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<?php
}
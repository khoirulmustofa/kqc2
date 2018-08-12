<?php
if (isset ( $page ) && $page == 'berita') {
	?>
<link rel="stylesheet"
	href="<?php echo base_url('template/admin_lte')?>/bower_components/select2/dist/css/select2.min.css">

<?php
} else if (isset ( $page ) && $page == 'artikel') {
	?>
<link rel="stylesheet"
	href="<?php echo base_url('template/admin_lte')?>/bower_components/select2/dist/css/select2.min.css">
<?php
} else if (isset ( $page ) && $page == 'Tentang_kami') {
	?>
<link rel="stylesheet"
	href="<?php echo base_url(); ?>template/<?php echo template(); ?>/plugins/bootstrap-social-buttons/social-buttons-3.css">
<link rel="stylesheet"
	href="<?php echo base_url(); ?>template/<?php echo template(); ?>/plugins/flex-slider/flexslider.css">
<?php
} 
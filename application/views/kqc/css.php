<?php
if (isset ( $page ) && $page == 'Home') {
	?>
<link rel="stylesheet"
	href="<?php echo base_url(); ?>template/<?php echo template(); ?>/plugins/revolution_slider/rs-plugin/css/settings.css">
<link rel="stylesheet"
	href="<?php echo base_url(); ?>template/<?php echo template(); ?>/plugins/flex-slider/flexslider.css">
<link rel="stylesheet"
	href="<?php echo base_url(); ?>template/<?php echo template(); ?>/plugins/colorbox/example2/colorbox.css">
<?php
} else if (isset ( $page ) && $page == 'Tentang_kami') {
	?>
<link rel="stylesheet"
	href="<?php echo base_url(); ?>template/<?php echo template(); ?>/plugins/bootstrap-social-buttons/social-buttons-3.css">
<link rel="stylesheet"
	href="<?php echo base_url(); ?>template/<?php echo template(); ?>/plugins/flex-slider/flexslider.css">
<?php
} 
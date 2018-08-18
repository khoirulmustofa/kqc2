<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
$CI =& get_instance();

$CI->load->helper('url');
$CI->load->library('session');

$config ['full_tag_open'] = '<div><ul class ="pagination pagination-sm no-margin pull-right">';
$config ['full_tag_close'] = '</ul></div>';

$config ['first_link'] = 'Awal';
$config ['first_tag_open'] = '<li>';
$config ['first_tag_close'] = '</li>';

$config ['last_link'] = 'Akhir';
$config ['last_tag_open'] = '<li>';
$config ['last_tag_close'] = '</li>';

$config ['next_link'] = 'Berikutnya';
$config ['next_tag_open'] = '<li>';
$config ['next_tag_close'] = '</li>';

$config ['prev_link'] = 'Sebelumya';
$config ['prev_tag_open'] = '<li>';
$config ['prev_tag_close'] = '</li>';

$config ['cur_tag_open'] = '<li class="active"><a>';
$config ['cur_tag_close'] = '</a></li>';

$config ['num_tag_open'] = '<li>';
$config ['num_tag_close'] = '</li>';







<li class="header">MAIN NAVIGATION <?php echo $this->session->userdata ( 'group_id' )?></li>
<?php
// data main menu
$main_menu = $this->Menu_groups_model->get_menu_groups_level ( $this->session->userdata ( 'group_id' ) );
foreach ( $main_menu as $main ) {
	// Query untuk mencari data sub menu
	$sub_menu = $this->db->get_where ( 'menus', array (
			'is_main_menu' => $main->id_menus 
	) );
	// periksa apakah ada sub menu
	if ($sub_menu->num_rows () > 0) {
		// main menu dengan sub menu
		echo "<li class='treeview'>" . anchor ( $main->link_menus, '<i class="' . $main->icon_menus . '"></i>' . $main->judul_menus . '<span class="pull-right-container">
                                                <i class="fa fa-angle-left pull-right"></i>
                                            </span>' );
		// sub menu nya disini
		echo "<ul class='treeview-menu'>";
		foreach ( $sub_menu->result () as $sub ) {
			echo "<li>" . anchor ( $sub->link_menus, '<i class="' . $sub->icon_menus . '"></i>' . $sub->judul_menus ) . "</li>";
		}
		echo "</ul></li>";
	} else {
		// main menu tanpa sub menu
		echo "<li>" . anchor ( $main->link_menus, '<i class="' . $main->icon_menus . '"></i>' . $main->judul_menus ) . "</li>";
	}
}
?>
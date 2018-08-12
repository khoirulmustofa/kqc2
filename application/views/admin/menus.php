<aside class="main-sidebar">
	<!-- sidebar: style can be found in sidebar.less -->
	<section class="sidebar">
		<!-- Sidebar user panel -->
		<div class="user-panel">
			<div class="pull-left image">
				<img
					src="<?php echo base_url('template/lte/')?>/dist/img/user2-160x160.jpg"
					class="img-circle" alt="User Image">
			</div>
			<div class="pull-left info">
				<p>Alexander Pierce</p>
				<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
			</div>
		</div>

		<!-- sidebar menu: : style can be found in sidebar.less -->

		<ul class="sidebar-menu" data-widget="tree">
			<li class="header">MAIN NAVIGATION <?php echo $this->session->userdata ( 'group_id' )?></li>
			
				<?php
				// data main menu
				$main_menu = $this->Menu_groups_model->get_all_menu_groups_level ( $this->session->userdata ( 'group_id' ) );
				
				foreach ( $main_menu->result () as $main ) {
					// Query untuk mencari data sub menu
					$sub_menu = $this->Menu_groups_model->get_child_menu_groups_level ( $this->session->userdata ( 'group_id' ), $main->id_menus );
					
					// periksa apakah ada sub menu
					if ($sub_menu->num_rows () > 0) {
						// main menu dengan sub menu
						?>
						<li class="treeview">
				          <a href="#">
				            <i class="<?php echo $main->icon_menus?>"></i> <span><?php echo $main->judul_menus?></span>
				            <span class="pull-right-container">
				              <i class="fa fa-angle-left pull-right"></i>
				            </span>
				          </a>
				          <ul class="treeview-menu">
						<?php 
						foreach ( $sub_menu->result () as $sub ) {
							?>
							<li><a href="<?php echo base_url().$sub->link_menus?>"><i class="<?php echo $sub->icon_menus?>"></i> <?php echo $sub->judul_menus?></a></li>
							<?php 
							
						}
						?> </ul>
       	 				</li><?php 
						
					} else {
						// main menu tanpa sub menu
						?>
						<li><a href="<?php echo base_url().$main->link_menus?>"><i class="<?php echo $main->icon_menus?>"></i> <span><?php echo $main->judul_menus?></span></a></li>
						<?php 
					}
				}
				?>

		</ul>
	</section>
	<!-- /.sidebar -->
</aside>
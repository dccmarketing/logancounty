<?php if ( has_nav_menu( 'homelinks' ) ) {
					
	$menu['theme_location']		= 'homelinks';
	$menu['container'] 			= 'div';
	$menu['container_id']    	= 'menu-homelinks-media';
	$menu['container_class'] 	= 'menu nav-homelinks';
	$menu['menu_id']         	= 'menu-homelinks-media-items';
	$menu['menu_class']      	= 'menu-items';
	$menu['depth']           	= 1;
	$menu['fallback_cb']     	= '';

	wp_nav_menu( $menu );

} ?>
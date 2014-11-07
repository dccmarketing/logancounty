<?php if ( has_nav_menu( 'homeplaces' ) ) {
					
	$menu['theme_location']		= 'homeplaces';
	$menu['container'] 			= 'div';
	$menu['container_id']    	= 'menu-homeplaces-media';
	$menu['container_class'] 	= 'menu nav-homeplaces';
	$menu['menu_id']         	= 'menu-homeplaces-media-items';
	$menu['menu_class']      	= 'menu-items';
	$menu['depth']           	= 1;
	$menu['fallback_cb']     	= '';

	wp_nav_menu( $menu );

} ?>
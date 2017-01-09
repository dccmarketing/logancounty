<?php

if ( has_nav_menu( 'social' ) ) {

	$menu['theme_location']		= 'social';
	$menu['container'] 			= 'div';
	$menu['container_id']    	= 'menu-social-media';
	$menu['container_class'] 	= 'menu nav-social';
	$menu['menu_id']         	= 'menu-social-media-items';
	$menu['menu_class']      	= 'menu-items';
	$menu['depth']           	= 1;
	$menu['fallback_cb']     	= '';

	wp_nav_menu( $menu );

}

printf( __( '<div class="address"> %1$s <address>1555 5th Street, Lincoln, IL 62656</address></div><div class="phone"><a href="tel:2177328687">217.732.8687</a></div>', 'logan-county' ), get_bloginfo( 'name' ) );

?>
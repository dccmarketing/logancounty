<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package Logan County
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?><div id="secondary" class="widget-area sidebar-left" role="complementary"><?php

	dynamic_sidebar( 'sidebar-1' );

?></div><!-- #secondary -->
<?php
/**
 * The homepage template file.
 *
 * @package Logan County
 */

get_header();

	?><div id="primary" class="content-area">
		<main id="main" class="site-main" role="main"><?php

			/**
			 * The logancounty_home_content actino hook
			 *
			 * @hooked 		home_slider 		10
			 * @hooked 		home_adventure 		15
			 * @hooked 		home_connect 		20
			 * @hooekd 		home_events 		25
			 * @hooked 		home_places 		30
			 * @hooked 		home_happenings 	35
			 * @hooked 		home_facebook 		40
			 */
			do_action( 'logancounty_home_content' );

		?></main><!-- #main -->
	</div><!-- #primary --><?php

get_footer();

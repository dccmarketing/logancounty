<?php
/**
 * The homepage template file.
 *
 * @package Logan County
 */

get_header();

	?><div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<div class="home-top">
				<div class="slider-wrap"><?php

					echo get_svg( 'moment' );
				
					if ( function_exists( 'soliloquy' ) ) { soliloquy( '111' ); }

					echo get_svg( 'check' );

				?></div>
			</div>
			<div class="home-adventure">
				<h2>&mdash; Our History. Your Adventure. &mdash;</h2>
				<a href="/things-to-do/">
					<img class="history-img" src="<?php echo get_template_directory_uri(); ?>/images/history_bkgd_all.png" />
				</a>
			</div>
			<div class="home-connect">
				<h2>&mdash; Connect with Us &mdash;</h2><?php

				echo FrmFormsController::get_form_shortcode( array( 'id' => 6, 'title' => false, 'description' => false ) );

				get_template_part( 'menus/menu', 'homelinks' );

			?></div>
			<div class="home-events">
				<h2>&mdash; Upcoming Events &mdash;</h2><?php

				$events = tribe_get_events( array('posts_per_page' => 4 ) );

				if ( empty( $events ) ) {

					echo '<p class="no-events">Check back later for more upcoming events!</p>';

				} else {

					echo '<div class="events-wrap">';

					foreach ( $events as $post ) {

						setup_postdata( $post );

						$thumb_id 		= get_post_thumbnail_id();
						$thumb_array 	= wp_get_attachment_image_src( $thumb_id, 'thumbnail', true );
						$thumb_url 		= $thumb_array[0];

						?><div class="event">
							<div class="event-image"<?php 
								if ( has_post_thumbnail() ) {
									?> style="background-image: url(<?php echo $thumb_url; ?>)"<?php
								} ?>>
								<div class="event-hover">
									<div class="event-date"><?php echo tribe_get_start_date( $post->ID, true, 'M d, Y' ); ?></div><!-- .event-date -->
									<a href="<?php the_permalink(); ?>">More Info</a>
								</div><!-- .event-hover -->
							</div><!-- .event-image -->
							<a href="<?php the_permalink(); ?>">
								<h3 class="event-title"><?php the_title(); ?></h3><!-- .event-title -->
								<div class="event-date"><?php echo tribe_get_start_date( $post->ID, true, 'M d, Y' ); ?></div><!-- .event-date -->
							</a>
						</div><!-- .event --><?php

					} // foreach

					wp_reset_query();

					echo '</div><!-- .events_wrap -->';

				} // enpty check

			?></div>
			<div class="home-places">
				<h2>&mdash; Places to Lay Your Head &mdash;</h2><?php

				get_template_part( 'menus/menu', 'homeplaces' );

			?></div>
			<div class="home-happenings">
				<h2>&mdash; Happenings &mdash;</h2><?php

				if ( have_posts() ) :

					/* Start the Loop */
					while ( have_posts() ) : the_post();

						?><div class="post-container">
							<div class="post-wrapper"><?php

							if ( 'post' == get_post_type() ) :

								?><div class="entry-meta"><?php

									$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

									$time_string = sprintf( $time_string,
										esc_attr( get_the_date( 'c' ) ),
										esc_html( get_the_date( 'j M Y' ) )
									);

									echo '<span class="posted-on">' . $time_string . '</span>';

								?></div><!-- .entry-meta --><?php

							endif;

							the_title( sprintf( '<div class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></div>' );

							?><span class="post-arrows">>></span>
							</div><!-- .post-wrapper -->
						</div><!-- .post-container --><?php

					endwhile;

				endif;

			?></div><!-- .home-happenings -->
		</main><!-- #main -->
	</div><!-- #primary --><?php

get_footer();
?>
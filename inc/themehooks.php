<?php

/**
 * A class of methods using hooks in the theme.
 *
 * @package logan_county
 * @author Slushman <chris@slushman.com>
 */
class logancounty_Themehooks {

	/**
	 * Constructor
	 */
	public function __construct() {

		$this->loader();

	}

	/**
	 * Loads all filter and action calls
	 */
	private function loader() {

		add_action( 'logancounty_home_content', array( $this, 'home_slider' ), 10 );
		add_action( 'logancounty_home_content', array( $this, 'home_adventure' ), 15 );
		add_action( 'logancounty_home_content', array( $this, 'home_connect' ), 20 );
		add_action( 'logancounty_home_content', array( $this, 'home_events' ), 25 );
		add_action( 'logancounty_home_content', array( $this, 'home_places' ), 30 );
		add_action( 'logancounty_home_content', array( $this, 'home_happenings' ), 35 );
		add_action( 'logancounty_home_content', array( $this, 'home_facebook' ), 40 );

	} // loader()

	public function home_adventure() {

		?><div class="home-adventure">
			<h2><?php esc_html_e( get_theme_mod( 'things_to_do_title' ), 'logan-county' ); ?></h2>
			<a href="/attractions/">
				<img class="history-img" src="<?php echo get_template_directory_uri(); ?>/images/history_bkgd_all.png" />
			</a>
		</div><?php

	} // home_adventure()

	public function home_connect() {

		?><div class="home-connect">
			<h2><?php esc_html_e( get_theme_mod( 'connect_title' ), 'logan-county' ); ?></h2><?php

			echo FrmFormsController::get_form_shortcode( array( 'id' => 2, 'title' => false, 'description' => false ) );

		?></div><?php

	} // home_connect()

	public function home_events() {

		if ( ! function_exists( 'tribe_get_events' ) ) { return; }

		?><div class="home-events">
			<h2><?php esc_html_e( get_theme_mod( 'upcoming_events_title' ), 'logan-county' ); ?></h2><?php

			$events = tribe_get_events( array( 'posts_per_page' => 4, 'eventDisplay' => 'list' ) );

			if ( empty( $events ) ) {

				echo '<p class="no-events">Check back later for more upcoming events!</p>';

			} else {

				echo '<div class="events-wrap">';

				foreach ( $events as $event ) {

					//echo '<pre>'; print_r( $event ); echo '</pre>';

					$thumb_id 		= get_post_thumbnail_id( $event->ID );
					$thumb_array 	= wp_get_attachment_image_src( $thumb_id, 'thumbnail', true );
					$thumb_url 		= $thumb_array[0];

					?><div class="event">
						<div class="event-image"<?php

							if ( has_post_thumbnail( $event->ID ) ) {

								?> style="background-image: url(<?php echo $thumb_url; ?>)"<?php

							} ?>>
							<div class="event-hover">
								<div class="event-date"><?php echo tribe_get_start_date( $event->ID, true, 'M d, Y' ); ?></div><!-- .event-date -->
								<a href="<?php echo esc_url( get_permalink( $event->ID ) ); ?>">More Info</a>
							</div><!-- .event-hover -->
						</div><!-- .event-image -->
						<a href="<?php echo esc_url( get_permalink( $event->ID ) ); ?>">
							<h3 class="event-title"><?php echo esc_html( $event->post_title ); ?></h3><!-- .event-title -->
							<div class="event-date"><?php echo tribe_get_start_date( $event->ID, true, 'M d, Y' ); ?></div><!-- .event-date -->
						</a>
					</div><!-- .event --><?php

				} // foreach

				echo '</div><!-- .events_wrap -->';

			} // enpty check

		?></div><?php

	} // home_events()

	public function home_facebook() {

		?><div class="home-facebook">
			<h2><?php esc_html_e( get_theme_mod( 'friend_us_title' ), 'logan-county' ); ?></h2><?php

			echo do_shortcode('[custom-facebook-feed]');

		?></div><!-- .home-facebook --><?php

	} // home_facebook()

	public function home_happenings() {

		?><div class="home-happenings">
			<h2><?php esc_html_e( get_theme_mod( 'happenings_title' ), 'logan-county' ); ?></h2><?php

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

		?></div><!-- .home-happenings --><?php

	} // home_happenings()

	public function home_places() {

		?><div class="home-places">
			<h2><?php esc_html_e( get_theme_mod( 'places_to_stay_title' ), 'logan-county' ); ?></h2><?php

			get_template_part( 'menus/menu', 'homeplaces' );

		?></div><?php

	} // home_places()

	public function home_slider() {

		?><div class="home-top">
			<div class="slider-wrap"><?php

				if ( function_exists( 'soliloquy' ) ) { soliloquy( 'home-top', 'slug' ); }

			?></div>
		</div><?php

	} // home_slider()

} // class

/**
 * Make an instance so its ready to be used
 */
$logancounty_themehooks = new logancounty_Themehooks();


<?php

/**
 * A class of helpful theme functions
 *
 * @package logan_county
 * @author Slushman <chris@slushman.com>
 */
class logancounty_Actions_and_Filters {

	/**
	 * Constructor
	 */
	public function __construct() {

		$this->loader();

	}

	/**
	 * Loads all filter and action calls
	 *
	 * @return [type] [description]
	 */
	private function loader() {

		add_action( 'init', array( $this, 'disable_emojis' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'more_scripts_and_styles' ) );
		add_filter( 'post_mime_types', array( $this, 'add_mime_types' ) );
		add_filter( 'upload_mimes', array( $this, 'custom_upload_mimes' ) );
		add_filter( 'mce_buttons_2', array( $this, 'add_editor_buttons' ) );
		add_filter( 'walker_nav_menu_start_el', array( $this, 'menu_svgs' ), 10, 4 );
		add_filter( 'walker_nav_menu_start_el', array( $this, 'menu_caret' ), 10, 4 );
		add_filter( 'get_search_form', array( $this, 'change_search_placeholder_text' ) );
		add_action( 'pre_get_posts', array( $this, 'get_home_posts' ) );
		add_action( 'wp_head', array( $this, 'background_images' ) );
		add_action( 'wp_head', array( $this, 'header_bg_img' ) );

	} // loader()

	/**
	 * Enqueues additional scripts and styles
	 *
	 * @return 	void
	 */
	public function more_scripts_and_styles() {

		wp_enqueue_style( 'dashicons' );
		wp_enqueue_style( 'dpd-2015-fonts', $this->fonts_url(), array(), null );

	} // more_scripts_and_styles()

	/**
	 * Add core editor buttons that are disabled by default
	 */
	function add_editor_buttons( $buttons ) {

		$buttons[] = 'superscript';
		$buttons[] = 'subscript';

		return $buttons;

	} // add_editor_buttons()

	/**
	 * Adds PDF as a filter for the Media Library
	 *
	 * @param 	array 		$post_mime_types 		The current MIME types
	 * @return 	array 								The modified MIME types
	 */
	public function add_mime_types( $post_mime_types ) {

	    $post_mime_types['application/pdf'] = array( esc_html__( 'PDFs', 'logan-county' ), esc_html__( 'Manage PDFs', 'logan-county' ), _n_noop( 'PDF <span class="count">(%s)</span>', 'PDFs <span class="count">(%s)</span>' ) );
	    $post_mime_types['text/x-vcard'] = array( esc_html__( 'vCards', 'logan-county' ), esc_html__( 'Manage vCards', 'logan-county' ), _n_noop( 'vCard <span class="count">(%s)</span>', 'vCards <span class="count">(%s)</span>' ) );

	    return $post_mime_types;

	} // add_mime_types

	function change_search_placeholder_text( $form ) {

		 $form = '<form role="search" method="get" class="search-form" action="' . esc_url( home_url( '/' ) ) . '">
		 		<label><span class="screen-reader-text">' . _x( 'Search for:', 'label' ) . '</span>
		 			<input type="search" class="search-field" placeholder="' . esc_attr_x( 'Search', 'placeholder' ) . '" value="' . get_search_query() . '" name="s" title="' . esc_attr_x( 'Search for:', 'label' ) . '" />
		 		</label>
		 		<input type="submit" class="search-submit" value="'. esc_attr_x( 'Search', 'submit button' ) .'" />
		 	</form>';

	    return $form;

	} // change_search_placeholder_text()

	/**
	 * Creates a style tag in the header with the background image
	 *
	 * @return 		mixed 		HTML style markup
	 */
	public function background_images() {

		$slider_img = logancounty_get_customizer_media_info( 'slider_bg' );

		if ( empty( $slider_img ) ) { return; }

		?><style>
			.home-top{background-image:url(<?php echo esc_url( $slider_img['sizes']['medium']['url'] ); ?>);
			@media screen and (min-width:768px){
				.home-top{background-image:url(<?php echo esc_url( $slider_img['sizes']['full']['url'] ); ?>);
			}
		</style><!-- Home Top BG --><?php

	} // background_images()

	/**
	 * Adds support for additional MIME types to WordPress
	 *
	 * @param 		array 		$existing_mimes 			The existing MIME types
	 * @return 		array 									The modified MIME types
	 */
	public function custom_upload_mimes( $existing_mimes = array() ) {

		// add your extension to the array
		$existing_mimes['vcf'] = 'text/x-vcard';

		return $existing_mimes;

	} // custom_upload_mimes()

	/**
	 * Removes WordPress emoji support everywhere
	 */
	function disable_emojis() {

		remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
		remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
		remove_action( 'wp_print_styles', 'print_emoji_styles' );
		remove_action( 'admin_print_styles', 'print_emoji_styles' );
		remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
		remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
		remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );

	} // disable_emojis()

	/**
	 * Properly encode a font URLs to enqueue a Google font
	 *
	 * @return 	mixed 		A properly formatted, translated URL for a Google font
	 */
	public function fonts_url() {

		$return 	= '';
		$families 	= '';
		$fonts[] 	= array( 'font' => 'Lato', 'weights' => '400,700', 'translate' => esc_html_x( 'on', 'Lato font: on or off', 'logan-county' ) );

		foreach ( $fonts as $font ) {

			if ( 'off' == $font['translate'] ) { continue; }

			$families[] = $font['font'] . ':' . $font['weights'];

		}

		if ( ! empty( $families ) ) {

			$query_args['family'] 	= urlencode( implode( '|', $families ) );
			$query_args['subset'] 	= urlencode( 'latin' );
			$return 				= add_query_arg( $query_args, '//fonts.googleapis.com/css' );

		}

		return $return;

	} // fonts_url()

	/**
	 * Alters the WP_Query for the home page
	 *
	 * @param 	string 		$query 		The WP_Query object
	 *
	 * @uses 	is_home()
	 * @uses 	is_main_query()
	 * @uses 	set()
	 *
	 * @return  object 					A modified query object
	 */
	function get_home_posts( $query ) {

		if ( $query->is_home() && $query->is_main_query() ) {

			$query->set( 'posts_per_page', 5 );
			return;

		}

	} // get_home_posts()

	public function header_bg_img() {

		$bg_img = logancounty_get_thumbnail_url( get_the_ID() );

		if ( empty( $bg_img ) ) {

			$bg_img = logancounty_get_customizer_media_info( 'default_header_image');

		}

		if ( empty( $bg_img ) ) { return; }

		?><style>
			.featured-image{background-image:url(<?php echo esc_url( $bg_img['sizes']['medium']['url'] ); ?>);
			@media screen and (min-width:768px){
				.featured-image{background-image:url(<?php echo esc_url( $bg_img['sizes']['full']['url'] ); ?>);
			}
		</style><!-- Default Header BG --><?php

	} // header_bg_img()

	/**
	 * Add Caret to Menus with Children
	 *
	 * @author Bill Erickson
	 * @link http://www.billerickson.net/customizing-wordpress-menus/
	 *
	 * @param 	string 		$item_output		//
	 * @param 	object 		$item				//
	 * @param 	int 		$depth 				//
	 * @param 	array 		$args 				//
	 *
	 * @return 	string 							modified menu
	 */
	function menu_caret( $item_output, $item, $depth, $args ) {

		if ( 'primary' !== $args->theme_location ) { return $item_output; }

		if ( ! in_array( 'menu-item-has-children', $item->classes ) ) { return $item_output; }

		$output = '<a href="' . $item->url . '">';
		$output .= $item->title;
		$output .= '<span class="children">' . logancounty_get_svg( 'caret-right' ) . '</span>';
		$output .= '</a>';

		return $output;

	} // menu_caret()

	/**
	 * Add Extra Code to a Menu
	 *
	 * @author Bill Erickson
	 * @link http://www.billerickson.net/customizing-wordpress-menus/
	 *
	 * @param 	string 		$item_output		//
	 * @param 	object 		$item				//
	 * @param 	int 		$depth 				//
	 * @param 	array 		$args 				//
	 *
	 * @return 	string 							modified menu
	 */
	function menu_svgs( $item_output, $item, $depth, $args ) {

		if ( 'social' !== $args->theme_location && 'homelinks' !== $args->theme_location && 'homeplaces' !== $args->theme_location ) { return $item_output; }

		$host 	= parse_url( $item->url, PHP_URL_HOST );
		$output = '<a href="' . $item->url . '" class="icon-menu">';
		$class 	= logancounty_get_svg_by_class( $item->classes );

		if ( ! empty( $class ) ) {

			$output .= $class;

		} else {

			if ( $host !== parse_url( get_site_url(), PHP_URL_HOST ) ) {

				$output .= logancounty_get_svg_by_url( $item->url );

			} else {

				$output .= logancounty_get_svg_by_pageID( $item->object_id );

			}

		} // class check

		if ( 'social' !== $args->theme_location ) {

			$output .= '<div class="menu-icon-label">' . $item->title . '</div>';

		}

		$output .= '</a>';

		return $output;

	} // menu_svgs()


} // class

/**
 * Make an instance so its ready to be used
 */
$logancounty_actions_and_filters = new logancounty_Actions_and_Filters();


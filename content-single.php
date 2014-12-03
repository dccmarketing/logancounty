<?php
/**
 * @package Logan County
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header"><?php

		$image = get_thumbnail_url( get_the_ID(), 'large' );

		if ( ! $image ) {

			$bg_image = get_field( 'default_header_image', 316 );;

		} else {

			$bg_image = $image;

		}

		?><div class="featured-image" style="background-image:url(<?php echo $bg_image; ?>);"></div><?php
		
		the_title( '<h1 class="entry-title">', '</h1>' );

		?><div class="entry-meta"><?php
	
			logancounty_posted_on();
	
		?></div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content"><?php
	
		the_content();
		
		wp_link_pages( array(
			'before' => '<div class="page-links">' . __( 'Pages:', 'logan-county' ),
			'after'  => '</div>',
		) );
	
	?></div><!-- .entry-content -->

	<footer class="entry-footer"><?php

		logancounty_entry_footer();
	
	?></footer><!-- .entry-footer -->
</article><!-- #post-## -->
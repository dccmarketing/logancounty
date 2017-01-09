<?php
/**
 * @package Logan County
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header"><?php

		echo logancounty_page_header_image( get_the_ID() );

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
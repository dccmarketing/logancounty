<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Logan County
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<div class="featured-image"<?php

			$image = get_thumbnail_url( get_the_ID(), 'large' );

			if ( FALSE !== $image ) {

				echo ' style="background-image:url(' . $image . ')"';

			}

		 ?>></div><?php

		the_title( '<h1 class="entry-title">', '</h1>' );
	
	?></header><!-- .entry-header -->

	<div class="entry-content"><?php
		
		the_content();
		
		wp_link_pages( array(
			'before' => '<div class="page-links">' . __( 'Pages:', 'logan-county' ),
			'after'  => '</div>',
		) );
	
	?></div><!-- .entry-content -->

	<footer class="entry-footer"><?php

		edit_post_link( __( 'Edit', 'logan-county' ), '<span class="edit-link">', '</span>' );
	
	?></footer><!-- .entry-footer -->
</article><!-- #post-## -->
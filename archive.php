<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package DocBlock
 */

get_header(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main"><?php

		if ( have_posts() ) :

			?><header class="page-header">
				<h1 class="page-title"><?php

						if ( is_category() ) :
							single_cat_title();

						elseif ( is_tag() ) :
							single_tag_title();

						elseif ( is_author() ) :
							printf( __( 'Author: %s', 'text-domain' ), '<span class="vcard">' . get_the_author() . '</span>' );

						elseif ( is_day() ) :
							printf( __( 'Day: %s', 'text-domain' ), '<span>' . get_the_date() . '</span>' );

						elseif ( is_month() ) :
							printf( __( 'Month: %s', 'text-domain' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'text-domain' ) ) . '</span>' );

						elseif ( is_year() ) :
							printf( __( 'Year: %s', 'text-domain' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'text-domain' ) ) . '</span>' );

						elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
							_e( 'Asides', 'text-domain' );

						elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
							_e( 'Galleries', 'text-domain' );

						elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
							_e( 'Images', 'text-domain' );

						elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
							_e( 'Videos', 'text-domain' );

						elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
							_e( 'Quotes', 'text-domain' );

						elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
							_e( 'Links', 'text-domain' );

						elseif ( is_tax( 'post_format', 'post-format-status' ) ) :
							_e( 'Statuses', 'text-domain' );

						elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :
							_e( 'Audios', 'text-domain' );

						elseif ( is_tax( 'post_format', 'post-format-chat' ) ) :
							_e( 'Chats', 'text-domain' );

						else :
							_e( 'Archives', 'text-domain' );

						endif;

				?></h1><?php

				// Show an optional term description.
				$term_description = term_description();
				if ( ! empty( $term_description ) ) :
					printf( '<div class="taxonomy-description">%s</div>', $term_description );
				endif;
			
			?></header><!-- .page-header --><?php

			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/* Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'content', get_post_format() );

			endwhile;

			function_names_paging_nav();

		else :

			get_template_part( 'content', 'none' );

		endif;

		?></main><!-- #main -->
	</section><!-- #primary --><?php

get_sidebar();
get_footer();
?>
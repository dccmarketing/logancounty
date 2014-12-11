<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Logan County
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="tourism_wrap"><a href="http://www.enjoyillinois.com/"><?php echo logancounty_get_svg( 'tourism' ); ?></a></div><?php

		get_template_part( 'menus/menu', 'social' );

		?><div class="footer-wrap">

			<div class="site-info"><?php

				do_action( 'site_info' );

			?></div><!-- .site-info -->

		</div><!-- .footer-wrap -->

	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
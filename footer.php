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
		<div class="footer-wrap">

			<div class="tourism_wrap"><a href="http://www.enjoyillinois.com/"><?php echo logancounty_get_svg( 'tourism' ); ?></a></div><?php

			get_template_part( 'partial', 'flexi' );

			?><div class="site-info">
				<div class="copyright">&copy <?php echo date( 'Y' ); ?><a href="<?php esc_url( get_admin_url() ); ?>" title="Login"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a></div>
				<div class="credits" rel="author">Site designed and developed by <a href="http://dccmarketing.com">DCC Marketing</a></div>			
			</div><!-- .site-info -->

		</div><!-- .footer-wrap -->

	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
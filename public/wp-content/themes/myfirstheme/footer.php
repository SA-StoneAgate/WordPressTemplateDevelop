<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package myfirstheme
 */

?>

</div><!-- #content -->
</div><!-- #page -->
</div><!-- .container -->
<div class="container">
	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'myfirstheme' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'myfirstheme' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'myfirstheme' ), 'myfirstheme', '<a href="http://seegatesite.com" rel="designer">seegatesite</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #container -->

<?php wp_footer(); ?>

</body>
</html>

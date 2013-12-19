<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package receptes
 */
?>

			</div><!-- #main -->

			<footer id="colophon" class="site-footer" role="contentinfo">
				<div class="site-info">
					<?php do_action( 'receptes_credits' ); ?>
					<a href="http://wordpress.org/" title="<?php esc_attr_e( 'A Semantic Personal Publishing Platform', 'receptes' ); ?>" rel="generator"><?php printf( __( 'Proudly powered by %s', 'receptes' ), 'WordPress' ); ?></a>
					<span class="sep"> | </span>
					<?php printf( __( 'Theme: %1$s by %2$s.', 'receptes' ), 'receptes', '<a href="http://underscores.me/" rel="designer">Underscores.me</a>' ); ?>
				</div><!-- .site-info -->
			</footer><!-- #colophon -->
		</div><!-- #page -->
	</div> <!-- grid -->
</div> <!-- container -->


<?php wp_footer(); ?>

</body>
</html>
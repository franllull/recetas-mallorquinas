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
					<a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/4.0/"><img alt="Creative Commons License" style="border-width:0" src="http://i.creativecommons.org/l/by-nc-sa/4.0/88x31.png" /></a><br /><span xmlns:dct="http://purl.org/dc/terms/" property="dct:title">Recetas Mallorquinas</span> por <a xmlns:cc="http://creativecommons.org/ns#" href="http://www.recetasmallorquinas.com" property="cc:attributionName" rel="cc:attributionURL">Francisca Llinàs</a> usa la licencia <a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/4.0/">Creative Commons Attribution-NonCommercial-ShareAlike 4.0 International License</a>.
					<div>Gràcies dineta, això és mel d'abella peluda, <?php echo date('Y'); ?>. </div>


				</div><!-- .site-info -->
			</footer><!-- #colophon -->
		</div><!-- #page -->
	</div> <!-- grid -->
</div> <!-- container -->


<?php wp_footer(); ?>

</body>
</html>
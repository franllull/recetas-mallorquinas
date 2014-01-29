<?php
/**
 * @package receptes
 */
?>

<?php 
//variables to show custom fields
$post_meta_data = get_post_custom($post->ID);
$dificulty = get_post_meta($post->ID, 'custom_dificulty', true); 
$time = get_post_meta($post->ID, 'custom_time', true); 
$advice = get_post_meta($post->ID, 'custom_advice', true); 
$servings = get_post_meta($post->ID, 'custom_servings', true); 
$image = get_post_meta($post->ID, 'custom_image', true); 
$ingredientes = unserialize($post_meta_data['custom_ingredientes'][0]);
$postid = get_the_ID();
$idserving = "serving-".$postid."";
$idprevious = "previous-".$postid."";
$idlist = "list-".$postid."";

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header grid">
		<div class="entry-title unit-fluid three-of-four">
			<h1><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
			<h2 class="sub-author"> por <?php the_author_posts_link(); ?></h2>
		</div>
		<?php if ( 'post' == get_post_type() ) : ?>
			<div class="entry-meta unit-fluid one-of-four">
				<span class="time"><?php echo $time ?>&#39;</span><span class="icon-rellotge"></span><br />
				<span class="dificulty"><?php echo $dificulty ?></span>
				
				<?php 
				//displaying tomatoes for dificulty
				$char = substr($dificulty, 0, 1);
				if ($char == "f" ) {echo "<span class='icon-domatiga ple'><span class='icon-domatiga buid'><span class='icon-domatiga buid'>";} 
				elseif ($char == "m") {echo "<span class='icon-domatiga ple'><span class='icon-domatiga ple'><span class='icon-domatiga buid'>";} 
				else {echo "<span class='icon-domatiga ple'><span class='icon-domatiga ple'><span class='icon-domatiga ple'>";}
				?>

			</div><!-- entry-meta ends -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php if ( is_search() ) : // Only display Excerpts for Search ?>
		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->
	<?php else : ?>

	<!-- 1. extended picture before padded content -->
	<a href="<?php the_permalink(); ?>">
		<?php  echo wp_get_attachment_image($image, 'full');  ?>
	</a>

	<div class="entry-content">
	
		<!-- 2. ingredients -->
		<div class="ingredient-box entry-block">
			<h2>Ingredientes</h2>
			<div class="grid">
				<?php
					echo '<ul id="'.$idlist.'" class="ingredients unit three-of-four">';  
					foreach ($ingredientes as $string) {  
					    echo '<li class="ingredient"><input type="checkbox" /> '.$string.'</li>';  
					}  
					echo '</ul>';  
				?>
				<div class="mesures unit one-of-four">
					<input type="text" id="<?= $idserving ?>" class="serving" name="servings" maxlength="2" value="<?= $servings ?>" />
					<input type="hidden" id="<?= $idprevious ?>" value="5"/>
					<span class="icon-bol"></span>
				</div>
			</div>
		</div>
		<script type="text/javascript">
			jQuery(function() {
			    jQuery("#<?= $idserving ?>").bind('keyup', function(event) {
			        var previousValue = parseFloat(jQuery("#<?= $idprevious ?>").val());
			        var newValue = parseFloat(jQuery(event.target).val());
			        if (previousValue && newValue) {
			            jQuery("#<?= $idlist ?> .ingredient").each(function(index, elem) {
			                var ingredientNow = jQuery('i', elem);
			                var oldIngredientAmount = ingredientNow.text();
			                var newIngredientAmount = (oldIngredientAmount * newValue / previousValue).toFixed(1);
			                ingredientNow.text(newIngredientAmount);
			             });
			            jQuery("#<?= $idprevious ?>").val(newValue);
			        }
			    });
				jQuery("#<?= $idserving ?>").on('input', function (event) { 
				    this.value = this.value.replace(/[^0-9]/g, '');
				});
			});
		</script>

		<!-- 3. Preparation -->
		<div class="preparation-box entry-block">
			<h2>Preparación</h2>
			<?php the_content( __( 'Ver toda la receta <span class="meta-nav">&rarr;</span>', 'receptes' ) ); ?>
			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'receptes' ),
					'after'  => '</div>',
				) );
			?>
		</div>
		<?php if (!empty($advice)) { ?>
			<div class="advice entry-block">
				<h2>Consejos</h2>
				<?php echo $advice ?>	
			</div>
		<?php } ?>
	
	</div><!-- .entry-content -->
	
	<?php endif; ?>

	<footer class="entry-meta">


		<div class="grid">
			<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
			<span class="comments-link unit one-of-two"><?php comments_popup_link( __( '<span class="icon-comment"></span> Escribe un comentario', 'receptes' ), __( '<span class="icon-comment"></span> Ver 1 comentario', 'receptes' ), __( '% comentarios', 'receptes' ) ); ?></span>
			<?php endif; ?>

			<div class="like-link unit one-of-two">
				<?php if(function_exists('like_counter_p')) { like_counter_p('Mel de abella peluda'); } ?>
			</div>
		</div>	
	
		<?php edit_post_link( __( 'editar receta', 'receptes' ), '<div class="edit-link">', '</div>' ); ?>

	</footer><!-- .entry-meta -->
</article><!-- #post-## -->

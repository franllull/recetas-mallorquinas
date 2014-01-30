<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package receptes
 */
?><!DOCTYPE html>
<html style="margin-top: 0!important" <?php language_attributes(); ?>>
<head>
	<meta name="description" content="<?php bloginfo( 'description' ); ?>">
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width" />
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />
	<script type="text/javascript">
	  (function() {
	    var config = {
	      kitId: 'sku3ytw',
	      scriptTimeout: 3000
	    };
	    var h=document.getElementsByTagName("html")[0];h.className+=" wf-loading";var t=setTimeout(function(){h.className=h.className.replace(/(\s|^)wf-loading(\s|$)/g," ");h.className+=" wf-inactive"},config.scriptTimeout);var tk=document.createElement("script"),d=false;tk.src='//use.typekit.net/'+config.kitId+'.js';tk.type="text/javascript";tk.async="true";tk.onload=tk.onreadystatechange=function(){var a=this.readyState;if(d||a&&a!="complete"&&a!="loaded")return;d=true;clearTimeout(t);try{Typekit.load(config)}catch(b){}};var s=document.getElementsByTagName("script")[0];s.parentNode.insertBefore(tk,s)
	  })();

	</script>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<?php do_action( 'before' ); ?>
		<header id="masthead" class="site-header container" role="banner">
			<div class="grid">
				<a class="linkblock" href="<?php echo esc_url( home_url( '/' ) ); ?>">
					<div class="unit one-of-four molinet">
						<div class="molinet-inner"></div>
					</div>
				</a>
				<div class="site-branding unit two-of-four text-center">
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<p class="site-description hidden"><?php bloginfo( 'description' ); ?></p>
					<h2 class="site-subtitle"></h2><a href="#" class="boto-random"><span class="icon-mallorca"></span></a>
				</div>
				<a class="linkblock" href="<?php echo esc_url( home_url( '/' ) ); ?>">
					<div class="unit one-of-four tomatigues"></div>
				</a>
			</div>
		</header><!-- #masthead -->
<script type="text/javascript">
	var randomDites = function(){
		var dites = new Array();
		dites[0] = '"Saps que és de guapo això."'; 
		dites[1] = '"No hi ha cosa més sabrosa que una panada ben grossa"'; 
		dites[2] = '"No seràs tan jove mai"'; 
		dites[3] = '"Qui pixa clar no ha de menester mà de metge"'; 
		dites[4] = '"Des teu pa faràs sopes"'; 
		dites[5] = '"Festes passades, coques menjades"'; 
		dites[6] = '"Es tests, assemblen a ses olles"'; 
		dites[7] = '"Cadescú a ca seva i Déu en la de tots"'; 
		dites[8] = '"Cada olleta té la seva tapadoreta"'; 
		dites[9] = '"Això fa oi an el rei porc"'; 
		dites[10] = '"Mai ha passat es febrer, sense vestir s’ametler"'; 
		dites[11] = '"No mesclis ous amb caragols"'; 
		dites[12] = '"No hi ha juny sense sol, ni nit sense mussol"'; 

		var randomitzador = Math.floor(Math.random()*dites.length); 
		jQuery('.site-subtitle').html(dites[randomitzador]);
	}
	jQuery(document).ready(function() {
		randomDites();
		jQuery('.boto-random').click(function() {
			randomDites();
		});
	});
</script>
	<div id="main" class="site-main">
		<div class="container">
			<div class="grid">


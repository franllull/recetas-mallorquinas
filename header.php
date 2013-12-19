<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package receptes
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/normalize.css" media="screen" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/toast/toast.css" media="screen" />

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
					<div class="unit one-of-four molinet"></div>
				</a>
				<div class="site-branding unit two-of-four text-center">
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<h2 class="site-subtitle">por Francisca Llinàs</h2>
					<h2 class="site-description hidden"><?php bloginfo( 'description' ); ?></h2>
				</div>
				<a class="linkblock" href="<?php echo esc_url( home_url( '/' ) ); ?>">
					<div class="unit one-of-four tomatigues hidden-mobile"></div>
				</a>

			<nav id="site-navigation" class="navigation-main" role="navigation">
				<h1 class="menu-toggle"><?php _e( 'Menu', 'receptes' ); ?></h1>
				<div class="screen-reader-text skip-link"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'receptes' ); ?>"><?php _e( 'Skip to content', 'receptes' ); ?></a></div>

				<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
			</nav><!-- #site-navigation -->
			</div>
		</header><!-- #masthead -->

	<div id="main" class="site-main">
		<div class="container">
			<div class="grid">


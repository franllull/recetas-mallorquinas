<?php
/**
 * receptes functions and definitions
 *
 * @package receptes
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 640; /* pixels */

if ( ! function_exists( 'receptes_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function receptes_setup() {

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on receptes, use a find and replace
	 * to change 'receptes' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'receptes', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for Post Thumbnails on posts and pages
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'receptes' ),
	) );

	/**
	 * Enable support for Post Formats
	 */
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );
}
endif; // receptes_setup
add_action( 'after_setup_theme', 'receptes_setup' );

/**
 * Setup the WordPress core custom background feature.
 *
 * Use add_theme_support to register support for WordPress 3.4+
 * as well as provide backward compatibility for WordPress 3.3
 * using feature detection of wp_get_theme() which was introduced
 * in WordPress 3.4.
 *
 * @todo Remove the 3.3 support when WordPress 3.6 is released.
 *
 * Hooks into the after_setup_theme action.
 */
function receptes_register_custom_background() {
	$args = array(
		'default-color' => 'ffffff',
		'default-image' => '',
	);

	$args = apply_filters( 'receptes_custom_background_args', $args );

	if ( function_exists( 'wp_get_theme' ) ) {
		add_theme_support( 'custom-background', $args );
	} else {
		define( 'BACKGROUND_COLOR', $args['default-color'] );
		if ( ! empty( $args['default-image'] ) )
			define( 'BACKGROUND_IMAGE', $args['default-image'] );
		add_custom_background();
	}
}
add_action( 'after_setup_theme', 'receptes_register_custom_background' );

/**
 * Register widgetized area and update sidebar with default widgets
 */
function receptes_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'receptes' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'receptes_widgets_init' );

/**
 * Enqueue scripts and styles
 */

add_action( 'wp_enqueue_scripts', 'receptes_scripts' );

function receptes_scripts() {
	wp_enqueue_style( 'receptes-style', get_stylesheet_uri() );
	wp_enqueue_script( 'receptes-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
	wp_enqueue_script( 'receptes-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
	wp_enqueue_script('jquery', get_template_directory_uri() . '/js/jquery-1.10.2.min.js', array('jquery') );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'receptes-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
	}
}

add_action('admin_enqueue_scripts', 'receptes_admin_scripts');

function receptes_admin_scripts() {
	wp_enqueue_script('jquery', get_template_directory_uri() . '/js/jquery-1.10.2.min.js', array('jquery') );
	wp_enqueue_script( 'jquery-ui' , 'http://code.jquery.com/ui/1.10.3/jquery-ui.js' );
	wp_enqueue_script('custom-js', get_template_directory_uri().'/js/custom-js.js'); 
}

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

// Add the Meta Box
function add_custom_meta_box() {
    add_meta_box(
		'custom_meta_box', // $id
		'Otros datos sobre la receta', // $title 
		'show_custom_meta_box', // $callback
		'post', // $page
		'normal', // $context
		'high'); // $priority
}
add_action('add_meta_boxes', 'add_custom_meta_box');

// Field Array
$prefix = 'custom_';
$custom_meta_fields = array(
	array(
		'label'=> 'Dificultad',
		'desc'	=> 'Cómo de difícil es la receta?',
		'id'	=> $prefix.'dificulty',
		'type'	=> 'select',
		'options' => array (
			'one' => array (
				'label' => 'Fácil',
				'value'	=> 'fácil'
			),
			'two' => array (
				'label' => 'Media',
				'value'	=> 'media'
			),
			'three' => array (
				'label' => 'Difícil',
				'value'	=> 'difícil'
			)
		)
	),

	array(
		'label'=> 'Tiempo de la Receta',
		'desc'	=> 'Cuántos minutos se tarda en cocinar?',
		'id'	=> $prefix.'time',
		'type'	=> 'text'
	),

	array(
		'label'=> 'Personas',
		'desc'	=> 'Para cuántas personas son las cantidades?',
		'id'	=> $prefix.'servings',
		'type'	=> 'text'
	),

	array(  
    'name'  => 'Image',  
    'desc'  => 'Una pinta impresionante!',  
    'id'    => $prefix.'image',  
    'type'  => 'image'  
	), 

	array(
	'label'	=> 'Ingredientes',
	'desc'	=> 'Anyade los ingredientes de la receta.',
	'id'	=> $prefix.'ingredientes',
	'type'	=> 'repeatable'
	),

	array(
		'label'=> 'Consejos',
		'desc'	=> 'Un consejo especial de la autora.',
		'id'	=> $prefix.'advice',
		'type'	=> 'textarea'
	)
);

// The Callback
function show_custom_meta_box() {
global $custom_meta_fields, $post;
// Use nonce for verification
echo '<input type="hidden" name="custom_meta_box_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';
	
	// Begin the field table and loop
	echo '<table class="form-table">';
	foreach ($custom_meta_fields as $field) {
		// get value of this field if it exists for this post
		$meta = get_post_meta($post->ID, $field['id'], true);
		// begin a table row with
		echo '<tr>
				<th><label for="'.$field['id'].'">'.$field['label'].'</label></th>
				<td>';
				switch($field['type']) {
					// text
					case 'text':
						echo '<input type="text" name="'.$field['id'].'" id="'.$field['id'].'" value="'.$meta.'" size="30" />
							<br /><span class="description">'.$field['desc'].'</span>';
					break;

					// textarea
					case 'textarea':
						echo '<textarea name="'.$field['id'].'" id="'.$field['id'].'" cols="60" rows="4">'.$meta.'</textarea>
							<br /><span class="description">'.$field['desc'].'</span>';
					break;

					// checkbox
					case 'checkbox':
						echo '<input type="checkbox" name="'.$field['id'].'" id="'.$field['id'].'" ',$meta ? ' checked="checked"' : '','/>
							<label for="'.$field['id'].'">'.$field['desc'].'</label>';
					break;
					
					// select
					case 'select':
						echo '<select name="'.$field['id'].'" id="'.$field['id'].'">';
						foreach ($field['options'] as $option) {
							echo '<option', $meta == $option['value'] ? ' selected="selected"' : '', ' value="'.$option['value'].'">'.$option['label'].'</option>';
						}
						echo '</select><br /><span class="description">'.$field['desc'].'</span>';
					break;

					// image
					case 'image':
						$image = get_template_directory_uri().'/images/image.png';	
						echo '<span class="custom_default_image" style="display:none">'.$image.'</span>';
						if ($meta) { $image = wp_get_attachment_image_src($meta, 'medium');	$image = $image[0]; }				
						echo	'<input name="'.$field['id'].'" type="hidden" class="custom_upload_image" value="'.$meta.'" />
									<img src="'.$image.'" class="custom_preview_image" alt="" /><br />
										<input class="custom_upload_image_button button" type="button" value="Escoge una Imagen" />
										<small> <a href="#" class="custom_clear_image_button">Borra la imagen</a></small>
										<br clear="all" /><span class="description">'.$field['desc'].'';
					break;


					// repeatable
					case 'repeatable':
						echo '<a class="repeatable-add button" href="#">+</a>
								<ul id="'.$field['id'].'-repeatable" class="custom_repeatable">';
						$i = 0;
						if ($meta) {
							foreach($meta as $row) {
								echo '<li><span class="sort hndle">|||</span>
											<input type="text" name="'.$field['id'].'['.$i.']" id="'.$field['id'].'" value="'.$row.'" size="30" />
											<a class="repeatable-remove button" href="#">-</a></li>';
								$i++;
							}
						} else {
							echo '<li><span class="sort hndle">|||</span>
										<input type="text" name="'.$field['id'].'['.$i.']" id="'.$field['id'].'" value="" size="30" />
										<a class="repeatable-remove button" href="#">-</a></li>';
						}
						echo '</ul>
							<span class="description">'.$field['desc'].'</span>';
					break;

				} //end switch
		echo '</td></tr>';
	} // end foreach
	echo '</table>'; // end table
}


// Save the Data
function save_custom_meta($post_id) {
    global $custom_meta_fields;
	
	// verify nonce
	if ( 
    !isset( $_POST['custom_meta_box_nonce'] ) 
    || !wp_verify_nonce( $_POST['custom_meta_box_nonce'], basename(__FILE__) ) ) 
		return $post_id;
		
	// check autosave
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
		return $post_id;
	// check permissions
	if ('page' == $_POST['post_type']) {
		if (!current_user_can('edit_page', $post_id))
			return $post_id;
		} elseif (!current_user_can('edit_post', $post_id)) {
			return $post_id;
	}

	// loop through fields and save the data
	foreach ($custom_meta_fields as $field) {
		$old = get_post_meta($post_id, $field['id'], true);
		$new = $_POST[$field['id']];
		if ($new && $new != $old) {
			update_post_meta($post_id, $field['id'], $new);
		} elseif ('' == $new && $old) {
			delete_post_meta($post_id, $field['id'], $old);
		}
	} // end foreach
}
add_action('save_post', 'save_custom_meta');  


// "Otras Recetas"
function wpapi_more_from_cat( $title = "También puedes cocinar" ) {
    global $post;
    // We should get the first category of the post
    $categories = get_the_category( $post->ID );
    $first_cat = $categories[0]->cat_ID;
    // Let's start the $output by displaying the title and opening the <ul>
    $output = '<h3>' . $title . '</h3>';
    // The arguments of the post list!
    $args = array(
        // It should be in the first category of our post:
        'category__in' => array( $first_cat ),
        // Our post should NOT be in the list:
        'post__not_in' => array( $post->ID ),
        // ...And it should fetch 5 posts - you can change this number if you like:
        'posts_per_page' => 5
    );
    // The get_posts() function
    $posts = get_posts( $args );
    if( $posts ) {
        $output .= '<ul class="related-by-cat grid">';
        // Let's start the loop!
        foreach( $posts as $post ) {
            setup_postdata( $post );
            $post_title = get_the_title();
            $permalink = get_permalink();
            $image = get_post_meta($post->ID, 'custom_image', true);
            $imagecall = wp_get_attachment_image($image, 'full');
            $output .= '<li class="unit one-of-three"><a href="' . $permalink . '" title="' . esc_attr( $post_title ) . '">' . $post_title . '' . $imagecall . '</a></li>';
        }
        $output .= '</ul>';
    } else {
        // If there are no posts, we should return something, too!
        $output .= '<p>Sorry, this category has just one post and you just read it!</p>';
    }
    echo $output;
}



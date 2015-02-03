<?php
/**
 * xFolio functions and definitions
 *
 * @package xFolio
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'xfolio_setup' ) ) :

add_filter('show_admin_bar', '__return_false');
define('EDD_SLUG', 'items'); 
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function xfolio_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on xFolio, use a find and replace
	 * to change 'xfolio' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'xfolio', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'xfolio' ),
	) );

	// Enable support for Post Thumbnails, and declare two sizes.
	add_theme_support( 'post-thumbnails' );
	// Add notice on featured image meta box
	add_filter( 'admin_post_thumbnail_html', 'add_featured_image_instruction');
	
	// set_post_thumbnail_size( 672, 372, true );
	add_image_size( 'xfolio-homepage-thumb', 730, 400, array( 'left', 'top' ));

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'xfolio_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // xfolio_setup
add_action( 'after_setup_theme', 'xfolio_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function xfolio_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'xfolio' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );

	register_sidebar( array(
		'name'          => __( 'Item Sidebar', 'xfolio' ),
		'id'            => 'sidebar-item',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 1', 'xfolio' ),
		'id'            => 'footer-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer 2', 'xfolio' ),
		'id'            => 'footer-2',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer 3', 'xfolio' ),
		'id'            => 'footer-3',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

}
add_action( 'widgets_init', 'xfolio_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function xfolio_scripts() {
	wp_enqueue_style( 'xfolio-style', get_stylesheet_uri() );
	
	wp_enqueue_style( 'xfolio-bootstrap-css', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css');
	wp_enqueue_style( 'xfolio-bootswatch', '//maxcdn.bootstrapcdn.com/bootswatch/3.3.2/sandstone/bootstrap.min.css');
	wp_enqueue_style( 'xfolio-animate-css', get_template_directory_uri() .'/css/animate.css');
	wp_enqueue_style( 'xfolio-theme-css', get_template_directory_uri() .'/css/theme.css');
	wp_enqueue_style( 'font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css');

	wp_enqueue_script( 'xfolio-bootstrap-js', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js' );
	wp_enqueue_script( 'xfolio-theme-js', get_template_directory_uri() . '/js/theme.min.js', array(), '', true );
	

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'xfolio_scripts' );


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

// Bootstrap Navwalker
require get_template_directory() . '/inc/bootstrap-navwalker.php';

// Bootstrap Pagination
require get_template_directory() . '/inc/bootstrap-pagination.php';

function add_featured_image_instruction( $content ) {
    return $content .= '<p style="color: #b71c1c;">Image size must be: <strong>1180x660</strong></p>';
}

// remove the standard button that shows after the download's content
remove_action( 'edd_after_download_content', 'edd_append_purchase_link' );

function xfolio_edd_hide_payment_icons() {
	$cart_total = edd_get_cart_total();

	if ( $cart_total )
		return;

	remove_action( 'edd_payment_mode_top', 'edd_show_payment_icons' );
	remove_action( 'edd_checkout_form_top', 'edd_show_payment_icons' );
}
add_action( 'template_redirect', 'xfolio_edd_hide_payment_icons' );


/**
 * Get the bootstrap! of CMB2
 */
if ( file_exists(  __DIR__ . '/cmb2/init.php' ) ) {
  require_once  __DIR__ . '/cmb2/init.php';
} elseif ( file_exists(  __DIR__ . '/CMB2/init.php' ) ) {
  require_once  __DIR__ . '/CMB2/init.php';
}

add_filter( 'cmb2_meta_boxes', 'xfolio_download_meta' );
/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */
function xfolio_download_meta( array $meta_boxes ) {

    // Start with an underscore to hide fields from custom fields list
    $prefix = '_tx_';

    /**
     * Download Post type meta box
     */
    $meta_boxes['xfolio_download_meta'] = array(
        'id'            => 'xfolio_download_meta',
        'title'         => __( 'Theme Info', 'cmb2' ),
        'object_types'  => array( 'download', ), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
        // 'cmb_styles' => false, // false to disable the CMB stylesheet
        // 'closed'     => true, // Keep the metabox closed by default
        'fields'        => array(
            array(
                'name'       => __( 'Demo Url', 'cmb2' ),
                'desc'       => __( 'Direct link to your demo, no iframe url.', 'cmb2' ),
                'id'         => $prefix . 'demo_url',
                'type'       => 'text_url',
                // 'show_on_cb' => 'cmb2_hide_if_no_cats', // function should return a bool value
                // 'sanitization_cb' => 'my_custom_sanitization', // custom sanitization callback parameter
                // 'escape_cb'       => 'my_custom_escaping',  // custom escaping callback parameter
                // 'on_front'        => false, // Optionally designate a field to wp-admin only
                // 'repeatable'      => true,
            ),
            array(
                'name' => __( 'Compatible With', 'cmb2' ),
                // 'desc' => __( 'Release Version', 'cmb2' ),
                'id'   => $prefix . 'compatible',
                'type' => 'multicheck',
                'options' => array(
			        'Bootstrap 2.x' => __( 'Bootstrap 2.x', 'cmb' ),
			        'Bootstrap 3.x' => __( 'Bootstrap 3.x', 'cmb' ),
			        'Wordpress 3.9' => __( 'Wordpress 3.9', 'cmb' ),
			        'Wordpress 4.x' => __( 'Wordpress 4.x', 'cmb' ),
			        'WooCommerce' => __( 'WooCommerce', 'cmb' ),
			        'Gravity Form' => __( 'Gravity Form', 'cmb' ),
			        'Joomla 2.5.x' => __( 'Joomla 2.5.x', 'cmb' ),
			        'Joomla 3.x' => __( 'Joomla 3.x', 'cmb' ),
			    ),
            ),
            array(
                'name' => __( 'Files Included', 'cmb2' ),
                // 'desc' => __( 'field description (optional)', 'cmb2' ),
                'id'   => $prefix . 'files_included',
                'type' => 'multicheck',
			    'options' => array(
			        'HTML' => 'HTML',
			        'CSS' => 'CSS',
			        'Images' => 'Images',
			        'Javascript' => 'Javascript',
			        'PHP' => 'PHP',
			        'PSD' => 'PSD',
			    )
            ),
            array(
                'name'       => __( 'Support Url', 'cmb2' ),
                'desc'       => __( 'Your support website url', 'cmb2' ),
                'id'         => $prefix . 'support_url',
                'type'       => 'text_url',
            ),
            array(
                'name'       => __( 'Paypal Email', 'cmb2' ),
                'desc'       => __( 'Your Paypal email to receive donation', 'cmb2' ),
                'id'         => $prefix . 'paypal',
                'type'       => 'text_email',
            ),
        ),
    );

    // Add other metaboxes as needed

    return $meta_boxes;
}
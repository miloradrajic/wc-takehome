<?php
/**
 * starter functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package starter
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function starter_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on starter, use a find and replace
		* to change 'starter' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'wc-takehome', get_template_directory() . '/languages' );

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
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'wc-takehome' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'starter_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'starter_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function starter_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'starter_content_width', 640 );
}
add_action( 'after_setup_theme', 'starter_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function starter_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'wc-takehome' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'wc-takehome' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'starter_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function starter_scripts() {
	wp_enqueue_style( 'starter-style', get_stylesheet_uri(), array(), filectime(get_stylesheet_directory().'/style.css') );
	wp_style_add_data( 'starter-style', 'rtl', 'replace' );

	wp_enqueue_script( 'starter-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_style( 'dashicons' );

	// Add bootstrap CSS
	wp_register_style( 'bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css', false, NULL, 'all' );
	wp_enqueue_style( 'bootstrap-css' );


	// Add bootstrap JS
	wp_register_script( 'bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js', ['jquery'], NULL, 'true' );
	wp_enqueue_script( 'bootstrap-css' );
}
add_action( 'wp_enqueue_scripts', 'starter_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


add_theme_support( 'woocommerce' );

function custom_shop_page_template($template) {
	if (class_exists('WooCommerce')){
		if (is_shop()) {
			// Set the path to your custom template file
			$custom_template = locate_template('shop-page-template.php');
			// Use the custom template if found, otherwise use the default template
			$template = $custom_template ? $custom_template : $template;
		}
		if (is_cart()) {
			// Set the path to your custom template file
			$custom_template = locate_template('shop-cart-template.php');
			// Use the custom template if found, otherwise use the default template
			$template = $custom_template ? $custom_template : $template;
		}
		if (is_checkout()) {
			// Set the path to your custom template file
			$custom_template = locate_template('shop-checkout-template.php');
			// Use the custom template if found, otherwise use the default template
			$template = $custom_template ? $custom_template : $template;
		}
		if ( is_wc_endpoint_url( 'order-received' ) ) {
			// Set the path to your custom template file
			$custom_template = locate_template('shop-thankyou-template.php');
			// Use the custom template if found, otherwise use the default template
			$template = $custom_template ? $custom_template : $template;
		}
	}
	return $template;
}

add_filter('template_include', 'custom_shop_page_template', 99);



function custom_login_link() {
	if (is_user_logged_in()) {
		// User is logged in
		global $current_user;

		echo __('Welcome', 'wc-takehome'). ', ' . esc_html($current_user->display_name) . ' | ';
		echo '<a href="' . wp_logout_url(home_url()) . '">'.__('Logout', 'wc-takehome').'</a>';
	} else {
		// User is not logged in
		echo '<a href="' . wp_login_url() . '">'.__('Login', 'wc-takehome').'</a>';
	}
}
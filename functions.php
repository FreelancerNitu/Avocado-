<?php
/**
 * Avocado functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Avocado
 */

if ( ! function_exists( 'avocado_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function avocado_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Avocado, use a find and replace
		 * to change 'avocado' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'avocado', get_template_directory() . '/languages' );

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
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'avocado' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'avocado_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'avocado_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function avocado_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'avocado_content_width', 640 );
}
add_action( 'after_setup_theme', 'avocado_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function avocado_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'avocado' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'avocado' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Product Archive Sidebar', 'avocado' ),
		'id'            => 'avocado_woocommerce',
		'description'   => esc_html__( 'Add widgets here.', 'avocado' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	// register_sidebar( array(
	// 	'name'          => esc_html__( 'Footer widgets', 'avocado' ),
	// 	'id'            => 'footer',
	// 	'description'   => esc_html__( 'Add footer widgets here.', 'avocado' ),
	// 	'before_widget' => '<section id="%1$s" class="col widget %2$s">',
	// 	'after_widget'  => '</section>',
	// 	'before_title'  => '<h2 class="widget-title">',
	// 	'after_title'   => '</h2>',
	// ) );
	register_sidebar(array(
    'name' => esc_html__('Footer 1', 'avocado'),
    'id' => 'footer-1',
    'description' =>esc_html__('Apperas in the sidebar in blog page and other page', 'avocado'),
    'before_widget' => '<div class="child-sidebar">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="title">',
    'after_title' => '</h2>',
  ));
	register_sidebar(array(
    'name' => esc_html__('Footer 2', 'avocado'),
    'id' => 'footer-2',
    'description' =>esc_html__('Apperas in the sidebar in blog page and other page', 'avocado'),
    'before_widget' => '<div class="child-sidebar">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="title">',
    'after_title' => '</h2>',
  ));
	register_sidebar(array(
    'name' => esc_html__('Footer 3', 'avocado'),
    'id' => 'footer-3',
    'description' =>esc_html__('Apperas in the sidebar in blog page and other page', 'avocado'),
    'before_widget' => '<div class="child-sidebar">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="title">',
    'after_title' => '</h2>',
  ));
}
add_action( 'widgets_init', 'avocado_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function avocado_scripts() {
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '20151215' );
	wp_enqueue_style( 'slick', get_template_directory_uri() . '/assets/css/slick.css', array(), '1.0.0' );
	wp_enqueue_style( 'main', get_template_directory_uri() . '/assets/css/main.css', array(), '1.0.0' );
	wp_enqueue_style( 'avocado-style', get_stylesheet_uri() );

	wp_enqueue_script( 'font-awesome', 'https://use.fontawesome.com/7c13097494.js', array(), '20151215', true );

	wp_enqueue_script( 'jquery');

	wp_enqueue_script( 'popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js', array(), '20151215', true );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(), '20151215', true );
	wp_enqueue_script( 'slick', get_template_directory_uri() . '/assets/js/slick.min.js', array(), '1.0.0', true );
	

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'avocado_scripts' );


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
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
	

}
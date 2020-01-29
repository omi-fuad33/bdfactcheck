<?php
/**
 * Anannya functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Anannya
 */

if ( ! function_exists( 'anannya_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function anannya_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Anannya, use a find and replace
		 * to change 'anannya' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'anannya', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'anannya' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
        function register_my_menus() {
              register_nav_menus(
                array(
                  'main-menu' => __( 'Main Menu' ),
                )
              );
            }
            add_action( 'init', 'register_my_menus' );

		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'anannya_custom_background_args', array(
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
add_action( 'after_setup_theme', 'anannya_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function anannya_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'anannya_content_width', 640 );
}
add_action( 'after_setup_theme', 'anannya_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function anannya_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'anannya' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'anannya' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'anannya_widgets_init' );

/**
 * function for excerpt
 */

function get_excerpt($limit, $source = null){

    if($source == "content" ? ($excerpt = get_the_content()) : ($excerpt = get_the_excerpt()));
    $excerpt = preg_replace(" (\[.*?\])",'',$excerpt);
    $excerpt = strip_shortcodes($excerpt);
    $excerpt = strip_tags($excerpt);
    $excerpt = substr($excerpt, 0, $limit);
    $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
    $excerpt = trim(preg_replace( '/\s+/', ' ', $excerpt));
    $excerpt = $excerpt.'... <a href="'.get_permalink($post->ID).'">more</a>';
    return $excerpt;
}

function wpdocs_custom_excerpt_length( $length ) {

		return 15;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );


function wpdocs_excerpt_more( $more ) {
	return '<a class="btn_2" href="'.get_the_permalink().'" rel="nofollow"> ..আরও পড়ুন</a>';
    return sprintf( '<a class="read-more" href="%1$s">%2$s</a>',
        get_permalink( get_the_ID() ),
        __( 'Read More', 'textdomain' )
    );

}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );

/**
 * Pagination starts.
 */

 function wpbeginner_numeric_posts_nav() {

     if( is_singular() )
         return;

     global $wp_query;

     /** Stop execution if there's only 1 page */
     if( $wp_query->max_num_pages <= 1 )
         return;

     $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
     $max   = intval( $wp_query->max_num_pages );

     /** Add current page to the array */
     if ( $paged >= 1 )
         $links[] = $paged;

     /** Add the pages around the current page to the array */
     if ( $paged >= 3 ) {
         $links[] = $paged - 1;
         $links[] = $paged - 2;
     }

     if ( ( $paged + 2 ) <= $max ) {
         $links[] = $paged + 2;
         $links[] = $paged + 1;
     }

     echo '<div class="navigation"><ul>' . "\n";

     /** Previous Post Link */
     if ( get_previous_posts_link() )
         printf( '<li>%s</li>' . "\n", get_previous_posts_link() );

     /** Link to first page, plus ellipses if necessary */
     if ( ! in_array( 1, $links ) ) {
         $class = 1 == $paged ? ' class="active"' : '';

         printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

         if ( ! in_array( 2, $links ) )
             echo '<li>…</li>';
     }

     /** Link to current page, plus 2 pages in either direction if necessary */
     sort( $links );
     foreach ( (array) $links as $link ) {
         $class = $paged == $link ? ' class="active"' : '';
         printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
     }

     /** Link to last page, plus ellipses if necessary */
     if ( ! in_array( $max, $links ) ) {
         if ( ! in_array( $max - 1, $links ) )
             echo '<li>…</li>' . "\n";

         $class = $paged == $max ? ' class="active"' : '';
         printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
     }

     /** Next Post Link */
     if ( get_next_posts_link() )
         printf( '<li>%s</li>' . "\n", get_next_posts_link() );

     echo '</ul></div>' . "\n";

 }
/**
 * Enqueue scripts and styles.
 */
function anannya_scripts() {
	wp_enqueue_style( 'anannya-style', get_stylesheet_uri() );

    wp_enqueue_style ('omi-style', get_template_directory_uri().'/css/omi.css');

    wp_enqueue_style ('naeeb-style', get_template_directory_uri().'/css/naeeb.css');

    wp_enqueue_style ('dhrubo-style', get_template_directory_uri().'/css/dhrubo.css');

    wp_enqueue_style ('bootstrap-style', "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css");

		wp_enqueue_style ('font-awesome', "https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css");

	wp_enqueue_script( 'anannya-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'anannya-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

    wp_enqueue_script( 'jquerry-library', get_template_directory_uri() . '/js/jquerry.js');

    wp_enqueue_script('popper-js', "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js");

    wp_enqueue_script( 'bootstrap-js', "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js");

		wp_enqueue_script( 'dhrubo-js', get_template_directory_uri() . '/js/dhrubo.js' );

    wp_enqueue_script( 'omi-js', get_template_directory_uri() . '/js/omi.js' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'anannya_scripts' );

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

	register_sidebar( array(
		'name'          => 'Login',
		'id'            => 'login',

	) );

add_action('after_setup_theme', 'remove_admin_bar');

function remove_admin_bar() {
if (!current_user_can('administrator') && !is_admin()) {
  show_admin_bar(false);
}
}

add_image_size( 'slider-thumbnail', 825, 480, true);
add_image_size( '2nd-row-thumbnail', 200, 120, true);

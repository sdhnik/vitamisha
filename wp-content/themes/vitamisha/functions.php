<?php
/**
 * vitamisha functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package vitamisha
 */

if ( ! function_exists( 'vitamisha_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function vitamisha_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on vitamisha, use a find and replace
		 * to change 'vitamisha' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'vitamisha', get_template_directory() . '/languages' );

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

	}
endif;
add_action( 'after_setup_theme', 'vitamisha_setup' );

function theme_register_nav_menu() {
	register_nav_menu( 'header', 'Header Menu' );
	register_nav_menu( 'footer', 'Footer Menu' );
}
add_action( 'after_setup_theme', 'theme_register_nav_menu' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function vitamisha_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'vitamisha' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'vitamisha' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	$widget_cart = array(
		'name'          => __('Cart Widget', 'vitamisha'),
		'id'            => 'cart_widget',
		'class'         => '',
		'description'   => __('Widget added here are displayed in footer', 'vitamisha'),
		'before_widget' => '<div id="%1$s" class="cart %2$s"><div class="cart--body">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<button class="cart--close"></button><h2 class="cart--title">',
		'after_title'   => '</h2>'
	);

	register_sidebar($widget_cart);

	$widget_beststayler = array(
		'name'          => __('Beststayler', 'vitamisha'),
		'id'            => 'beststayler',
		'class'         => '',
		'description'   => __('Widget added here are displayed in home page', 'vitamisha'),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => ''
	);

	register_sidebar($widget_beststayler);

	$widget_shop_filter = array(
		'name'          => __('Shop Filter', 'vitamisha'),
		'id'            => 'shop_filter',
		'class'         => '',
		'description'   => __('Widget added here are displayed in sidebar', 'vitamisha'),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => ''
	);

	register_sidebar($widget_shop_filter);
}
add_action( 'widgets_init', 'vitamisha_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function vitamisha_scripts() {
	wp_enqueue_style( 'vitamisha-style', get_stylesheet_uri() );

	wp_enqueue_script( 'vitamisha-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'vitamisha-slider', get_template_directory_uri() . '/js/glide.min.js', array(), '20151216', true );
	wp_enqueue_script( 'vitamisha-scripts', get_template_directory_uri() . '/js/main.js', array(), '20151217', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'vitamisha_scripts' );

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
 * Disable the emoji's
**/
function disable_emojis() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );	
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );	
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	

}
add_action( 'init', 'disable_emojis' );

add_filter('show_admin_bar', '__return_false');

add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

/*add_action( 'wp_enqueue_scripts', 'your_theme_woocommerce_scripts' );
function your_theme_woocommerce_scripts() {
  wp_enqueue_style( 'custom-woocommerce-style', get_template_directory_uri() . '/css/woocommerce.css' );
}*/

add_filter( 'woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment', 10, 1 );
function woocommerce_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;
	ob_start(); ?>
	<a href="#" class="header--button header--buttons__cart"><i></i> <?php echo WC()->cart->get_cart_contents_count()>0 ? sprintf ( _n( '<span>%d</span>', '<span>%d</span>', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ) : ''; ?></a>
	<?php $fragments['a.header--buttons__cart'] = ob_get_clean();
	return $fragments;
}

function build_menu( $theme_location ) {
    if ( ($theme_location) && ($locations = get_nav_menu_locations()) && isset($locations[$theme_location]) ) {

		global $wp;
		$current_url = home_url(add_query_arg(array(), $wp->request)); 
        $menu = get_term( $locations[$theme_location], 'nav_menu' );
        $menu_items = wp_get_nav_menu_items($menu->term_id);

        $menu_list .= '<ul>' ."\n";
        $menu_list .= '<li><a href="' . esc_url( home_url( '/' ) ) . '"' . (substr(esc_url( home_url( '/' ) ), 0, -1)===$current_url?' class="active"':'') . '>Главная</a></li>' ."\n";

        foreach( $menu_items as $menu_item ) {
            if( $menu_item->menu_item_parent == 0 ) {

                $parent = $menu_item->ID;
                $menu_array = array();

                foreach( $menu_items as $submenu ) {
                    if( $submenu->menu_item_parent == $parent ) {
                        $bool = true;
                        $menu_array[] = '<li><a href="' . $submenu->url . '"' . (substr($menu_item->url, 0, -1)===$current_url?' class="active"':'') . '>' . $submenu->title . '</a></li>' ."\n";
                    }
                }

                if( $bool == true && count( $menu_array ) > 0 ) {

                    $menu_list .= '<li>' ."\n";
                    $menu_list .= '<a href="' . $menu_item->url . '"' . (substr($menu_item->url, 0, -1)===$current_url?' class="active"':'') . '>' . $menu_item->title . ' <i class="caret"></i></a>' ."\n";

                    $menu_list .= '<ul class="submenu">' ."\n";
                    $menu_list .= implode( "\n", $menu_array );
                    $menu_list .= '</ul>' ."\n";

                } else {

                    $menu_list .= '<li>' ."\n";
                    $menu_list .= '<a href="' . $menu_item->url . '"' . (substr($menu_item->url, 0, -1)===$current_url?' class="active"':'') . '>' . $menu_item->title . '</a>' ."\n";
                }
            }

            $menu_list .= '</li>' ."\n";
        }

        $menu_list .= '</ul>' ."\n";

    } else {
        $menu_list = '<!-- no menu defined in location "'.$theme_location.'" -->';
    }

    echo $menu_list;
}


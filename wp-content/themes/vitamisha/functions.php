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
		'before_widget' => '<div id="%1$s" class="cart dialog_shopping_cart %2$s"><div class="cart--body">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<button class="cart--close">×</button><h2 class="cart--title">',
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
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="h h--pink"><span>',
		'after_title'   => '</span></h3>'
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

add_filter( 'get_the_archive_title', function ($title) {    
    if ( is_category() ) {    
            $title = single_cat_title( '', false );    
        } elseif ( is_tag() ) {    
            $title = single_tag_title( '', false );    
        } elseif ( is_author() ) {    
            $title = '<span class="vcard">' . get_the_author() . '</span>' ;    
        } elseif ( is_tax() ) { //for custom post types
            $title = sprintf( __( '%1$s' ), single_term_title( '', false ) );
        } elseif (is_post_type_archive()) {
            $title = post_type_archive_title( '', false );
        }
    return $title;    
});

remove_action( 'woocommerce_widget_shopping_cart_buttons', 'woocommerce_widget_shopping_cart_button_view_cart', 10 );
remove_action( 'woocommerce_widget_shopping_cart_buttons', 'woocommerce_widget_shopping_cart_proceed_to_checkout', 20 );

function my_woocommerce_widget_shopping_cart_button_view_cart() {
    echo '<span class="button__wrapper"><a href="' . esc_url( wc_get_cart_url() ) . '" class="button wc-forward">' . esc_html__( 'View cart', 'woocommerce' ) . '</a><svg class="wgl-dashes" width="100%" height="100%"><rect x="5" y="5" rx="25" ry="25" width="calc(100% - 10px)" height="calc(100% - 10px)"></rect></svg></span>';
}
function my_woocommerce_widget_shopping_cart_proceed_to_checkout() {
    echo '<span class="button__wrapper"><a href="' . esc_url( wc_get_checkout_url() ) . '" class="button checkout wc-forward">' . esc_html__( 'Checkout', 'woocommerce' ) . '</a><svg class="wgl-dashes" width="100%" height="100%"><rect x="5" y="5" rx="25" ry="25" width="calc(100% - 10px)" height="calc(100% - 10px)"></rect></svg></span>';
}
add_action( 'woocommerce_widget_shopping_cart_buttons', 'my_woocommerce_widget_shopping_cart_button_view_cart', 10 );
add_action( 'woocommerce_widget_shopping_cart_buttons', 'my_woocommerce_widget_shopping_cart_proceed_to_checkout', 20 );

add_filter('loop_shop_columns', 'loop_columns', 999);
if (!function_exists('loop_columns')) {
	function loop_columns() { return 3; }
}

add_filter( 'woocommerce_output_related_products_args', 'jk_related_products_args', 20 );
  function jk_related_products_args( $args ) {
	$args['posts_per_page'] = 3;
	$args['columns'] = 3;
	return $args;
}

add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 70 );

function cs_woocommerce_remote_billing_fields( $fields ) {
	unset( $fields['billing_company'] );
	return $fields;
}

add_filter( 'woocommerce_billing_fields', 'cs_woocommerce_remote_billing_fields' );

add_filter( 'woocommerce_account_menu_items', 'remove_my_account_dashboard' );
function remove_my_account_dashboard( $menu_links ){
 
	unset( $menu_links['dashboard'] );
	unset( $menu_links['downloads'] );
	return $menu_links;
 
}

add_action('template_redirect', 'redirect_to_orders_from_dashboard' );
 
function redirect_to_orders_from_dashboard(){
 
	if( is_account_page() ){
		wp_safe_redirect( home_url() );
		exit;
	}
 
}

add_filter('woocommerce_login_redirect', 'login_redirect');
function login_redirect($redirect_to) {
    return home_url();
}

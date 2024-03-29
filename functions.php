<?php

/**
 * _tk functions and definitions
 *
 * @package _tk
 */
// Create a helper function for easy SDK access.
function tk_larry_fs()
{
    global  $tk_larry_fs ;
    
    if ( !isset( $tk_larry_fs ) ) {
        // Include Freemius SDK.
        require_once dirname( __FILE__ ) . '/includes/resources/freemius/start.php';
        $tk_larry_fs = fs_dynamic_init( array(
            'id'               => '1300',
            'slug'             => 'larry',
            'type'             => 'theme',
            'public_key'       => 'pk_39a4c071e43fb863bb2dfb8eda7c7',
            'is_premium'       => true,
            'is_premium_only'  => true,
            'has_addons'       => true,
            'has_paid_plans'   => true,
            'is_org_compliant' => false,
            'trial'            => array(
            'days'               => 30,
            'is_require_payment' => true,
        ),
            'menu'             => array(
            'slug'           => 'larry',
            'override_exact' => true,
            'support'        => false,
            'parent'         => array(
            'slug' => 'themes.php',
        ),
        ),
            'is_live'          => true,
        ) );
    }
    
    return $tk_larry_fs;
}

// Init Freemius.
tk_larry_fs();
// Signal that SDK was initiated.
do_action( 'tk_larry_fs_loaded' );
function tk_larry_fs_settings_url()
{
    return admin_url( 'themes.php?page=larry' );
}

tk_larry_fs()->add_filter( 'connect_url', 'tk_larry_fs_settings_url' );
tk_larry_fs()->add_filter( 'after_skip_url', 'tk_larry_fs_settings_url' );
tk_larry_fs()->add_filter( 'after_connect_url', 'tk_larry_fs_settings_url' );
tk_larry_fs()->add_filter( 'after_pending_connect_url', 'tk_larry_fs_settings_url' );
/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( !isset( $content_width ) ) {
    $content_width = 750;
}
/* pixels */
if ( !function_exists( '_tk_setup' ) ) {
    /**
     * Set up theme defaults and register support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which runs
     * before the init hook. The init hook is too late for some features, such as indicating
     * support post thumbnails.
     */
    function _tk_setup()
    {
        global  $cap, $content_width ;
        // This theme styles the visual editor with editor-style.css to match the theme style.
        add_editor_style();
        // Add default posts and comments RSS feed links to head
        add_theme_support( 'automatic-feed-links' );
        // Enable support for post thumbnails on posts and pages
        add_theme_support( 'post-thumbnails' );
        // Enable support for title-tag options
        add_theme_support( 'title-tag' );
        /**
         * Make theme available for translation
         * Translations can be filed in the /languages/ directory
         * If you're building a theme based on _tk, use a find and replace
         * to change 'larry' to the name of your theme in all the template files
         */
        load_theme_textdomain( 'larry', get_template_directory() . '/languages' );
        /**
         * This theme uses wp_nav_menu() in three locations.
         */
        register_nav_menus( array(
            'primary'    => __( 'Top Nav - Large Screen', 'larry' ),
            'slide-nav'  => __( 'Sliding Nav - Mobile', 'larry' ),
            'footer-nav' => __( 'Footer Menu', 'larry' ),
        ) );
    }

}
// _tk_setup
add_action( 'after_setup_theme', '_tk_setup' );
/**
 * Register widgetized area and update sidebar with default widgets
 */
function _tk_widgets_init()
{
    // sidebar
    register_sidebar( array(
        'name'          => __( 'Sidebar', 'larry' ),
        'description'   => __( 'This is the sidebar used by default.', 'larry' ),
        'id'            => 'sidebar-1',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
    // sidebar products
    register_sidebar( array(
        'name'          => __( 'Sidebar Products', 'larry' ),
        'description'   => __( 'This is the sidebar used for the products single view.', 'larry' ),
        'id'            => 'sidebar-product',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
    // sidebar shop
    register_sidebar( array(
        'name'          => __( 'Sidebar Shop', 'larry' ),
        'description'   => __( 'This is the sidebar used for the WooCommerce shop home, category and tag views.', 'larry' ),
        'id'            => 'sidebar-shop',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
    // footer widgetareas
    register_sidebar( array(
        'name'          => __( 'Footer Full Width', 'larry' ),
        'id'            => 'footer-full-width',
        'description'   => __( 'The footer full width widget area.', 'larry' ),
        'before_widget' => '<div id="%1$s" class="footer-column-widget %2$s">',
        'after_widget'  => '</div><div class="clear"></div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
    // footer widgetareas
    register_sidebar( array(
        'name'          => 'Footer Column 1',
        'id'            => 'footer-column-1',
        'description'   => 'The footer columns widgetarea',
        'before_widget' => '<div id="%1$s" class="footer-column-widget %2$s">',
        'after_widget'  => '</div><div class="clear"></div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
    register_sidebar( array(
        'name'          => 'Footer Column 2',
        'id'            => 'footer-column-2',
        'description'   => 'The footer columns widgetarea',
        'before_widget' => '<div id="%1$s" class="footer-column-widget %2$s">',
        'after_widget'  => '</div><div class="clear"></div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
    register_sidebar( array(
        'name'          => 'Footer Column 3',
        'id'            => 'footer-column-3',
        'description'   => 'The footer columns widgetarea',
        'before_widget' => '<div id="%1$s" class="footer-column-widget %2$s">',
        'after_widget'  => '</div><div class="clear"></div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
    register_sidebar( array(
        'name'          => 'Footer Column 4',
        'id'            => 'footer-column-4',
        'description'   => 'The footer columns widgetarea',
        'before_widget' => '<div id="%1$s" class="footer-column-widget %2$s">',
        'after_widget'  => '</div><div class="clear"></div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
}

add_action( 'widgets_init', '_tk_widgets_init' );
/**
 * Enqueue scripts and styles
 */
function _tk_scripts()
{
    // load bootstrap css
    wp_enqueue_style( '_tk-bootstrap', get_template_directory_uri() . '/includes/resources/bootstrap/css/bootstrap.min.css' );
    // Import the necessary TK Bootstrap WP CSS additions
    wp_enqueue_style( '_tk-bootstrap-wp', get_template_directory_uri() . '/includes/css/bootstrap-wp.css' );
    // load font awesome icons
    wp_enqueue_style( 'tk-font-awesome', get_template_directory_uri() . '/includes/resources/font-awesome/css/font-awesome.min.css' );
    // load the tk styles
    wp_enqueue_style( 'tk-style', get_stylesheet_uri() );
    
    
    // load flamboya css
    wp_enqueue_style( 'flamboya_css', get_template_directory_uri() . '/flamboya.css' );
    
    
    // load bootstrap js
    wp_enqueue_script(
        '_tk-bootstrapjs',
        get_template_directory_uri() . '/includes/resources/bootstrap/js/bootstrap.min.js',
        array( 'jquery' ),
        true
    );
    // load bootstrap wp js
    wp_enqueue_script(
        '_tk-bootstrapwp',
        get_template_directory_uri() . '/includes/js/bootstrap-wp.js',
        array( 'jquery' ),
        true
    );
    wp_enqueue_script(
        '_tk-skip-link-focus-fix',
        get_template_directory_uri() . '/includes/js/skip-link-focus-fix.js',
        array(),
        '20130115',
        true
    );
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
    if ( is_singular() && wp_attachment_is_image() ) {
        wp_enqueue_script(
            '_tk-keyboard-image-navigation',
            get_template_directory_uri() . '/includes/js/keyboard-image-navigation.js',
            array( 'jquery' ),
            '20120202'
        );
    }

    // load windowscrollnav.js
    wp_enqueue_script(
        '_tk-windowscrollnav',
        get_template_directory_uri() . '/includes/js/windowscrollnav.js',
        array( 'jquery' ),
        true
    );
    
    // load soundcloud_toggle.js
    wp_enqueue_script(
        '_tk-soundcloud_toggle',
        get_template_directory_uri() . '/includes/js/soundcloud_toggle.js',
        array( 'jquery' ),
        true
    );

}

add_action( 'wp_enqueue_scripts', '_tk_scripts', 880 );
// Add CSS to WP Admin
function larry_admin_css()
{
    wp_enqueue_style( 'larry_admin_css', get_template_directory_uri() . '/includes/css/admin.css' );
}

add_action( 'admin_enqueue_scripts', 'larry_admin_css' );
/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/includes/template-tags.php';
/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/includes/extras.php';
/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/includes/jetpack.php';
/**
 * Load custom WordPress nav walker.
 */
require get_template_directory() . '/includes/bootstrap-wp-navwalker.php';
/**
 * Load larry's theme options.
 */
require get_template_directory() . '/includes/admin/settings.php';
require get_template_directory() . '/includes/admin/page-options.php';
require get_template_directory() . '/includes/admin/customizer-options.php';
// Load CSS styles from customizer options for front end
require get_template_directory() . '/style.php';
//require get_template_directory() . '/includes/resources/merlin/merlin.php';
//require get_parent_theme_file_path( '/includes/resources/merlin/merlin.php' );
//require get_parent_theme_file_path( '/includes/merlin-config.php' );
// Disable Comments on Media Attachments
function filter_media_comment_status( $open, $post_id )
{
    $post = get_post( $post_id );
    if ( $post->post_type == 'attachment' || $post->post_type == 'product' || $post->post_type == 'page' ) {
        return false;
    }
    return $open;
}

add_filter(
    'comments_open',
    'filter_media_comment_status',
    10,
    2
);
// allow SVG in media library
function cc_mime_types( $mimes )
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}

add_filter( 'upload_mimes', 'cc_mime_types' );
// replaces the _tk_posted_on() function in includes/template-tags.php
function tk_posted_on()
{
    $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
    $time_string = sprintf( $time_string, esc_attr( get_the_date( 'c' ) ), esc_html( get_the_date() ) );
    $time_string = sprintf( '%1$s', $time_string );
    printf( __( '<span class="posted-on"><small><i class="fa fa-calendar"></i>&nbsp;&nbsp;%1$s</small></span>', 'larry' ), $time_string );
}

// if on frontpage, add class "front-page" to body
add_filter( 'body_class', 'add_body_class_names' );
function add_body_class_names( $classes )
{
    if ( is_front_page() ) {
        $classes[] = 'front-page';
    }
    if ( is_category() ) {
        $classes[] = 'blog';
    }
    return $classes;
}

// Add Google Fonts
add_action( 'wp_enqueue_scripts', 'oa_add_google_fonts', 0 );
function oa_add_google_fonts()
{
    
    if ( get_theme_mod( 'larry_disable_google_fonts' ) != true ) {
        wp_register_style( 'oa-google-fonts-source-sans-pro', 'https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,600' );
        wp_enqueue_style( 'oa-google-fonts-source-sans-pro' );
        wp_register_style( 'oa-google-fonts-oswald', 'https://fonts.googleapis.com/css?family=Oswald' );
        wp_enqueue_style( 'oa-google-fonts-oswald' );
    }

}

/**
 * WooCommerce Setup
 ****************************************/

if ( class_exists( 'WooCommerce' ) ) {
    // Adding WooCommerce Support
    add_action( 'after_setup_theme', 'woocommerce_support' );
    function woocommerce_support()
    {
        add_theme_support( 'woocommerce' );
    }
    
    // remove_action( 'woocommerce_before_main_content','woocommerce_breadcrumb', 20, 0);
    remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
    remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );
    // always remove sidebars // sidebars added via theme templates! relax guys
    remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
    add_action( 'woocommerce_before_main_content', 'tk_theme_wrapper_start', 10 );
    add_action( 'woocommerce_after_main_content', 'tk_theme_wrapper_end', 10 );
    function tk_theme_wrapper_start()
    {
        
        if ( is_product() ) {
            echo  '<div class="main-content"><div class="container"><div class="row"><div class="main-content-inner col-xs-12">' ;
        } else {
            if ( get_theme_mod( 'larry_wc_archive_sidebars' ) == true ) {
                $add_classes = 'col-md-8';
            }
            echo  '<div class="col-xs-12 ' . $add_classes . '">' ;
            // echo '<div class="main-content"><div class="container"><div class="row"><div class="main-content-inner col-xs-12 col-md-8">';
        }
    
    }
    
    function tk_theme_wrapper_end()
    {
        echo  '' ;
    }
    
    // Product Categories
    remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
    // Remove Heading "Product Description"
    add_filter( 'woocommerce_product_description_heading', 'remove_product_description_heading' );
    function remove_product_description_heading()
    {
        return '';
    }
    
    // Redirect to checkout when adding to cart
    
    if ( get_theme_mod( 'larry_wc_redirect_to_checkout' ) == true ) {
        add_filter( 'woocommerce_add_to_cart_redirect', 'redirect_to_checkout' );
        function redirect_to_checkout()
        {
            global  $woocommerce ;
            $checkout_url = $woocommerce->cart->get_checkout_url();
            return $checkout_url;
        }
    
    }
    
    // Add category name to product loop item
    add_action( 'woocommerce_shop_loop_item_title', 'tk_add_cat_to_loop' );
    function tk_add_cat_to_loop()
    {
        global  $woocommerce, $product, $post ;
        $categ = $product->get_categories();
        echo  '<small class="larry-wc-loop-cats">' . $categ . '</small>' ;
    }
    
    // Redirect to Thank You page after payment successful
    // add_action( 'woocommerce_thankyou', function(){
    //     global $woocommerce;
    //     $order = new WC_Order();
    //        if ( $order->status != 'failed' ) {
    //         wp_redirect( home_url().'/thank-you' ); exit;
    //        }
    // });
    // Change number or products per row to 3
    add_filter( 'loop_shop_columns', 'loop_columns' );
    if ( !function_exists( 'loop_columns' ) ) {
        function loop_columns()
        {
            return 4;
            // 3 products per row
        }
    
    }
}

/**
 * BuddyPress Setup
 ****************************************/

if ( class_exists( 'BuddyPress' ) ) {
    // Register Menu for BuddyPress Profile Drop Down Nav
    function larry_bp_nav_setup()
    {
        register_nav_menus( array(
            'bp-topnav' => __( 'BuddyPress - Top Nav Profile Drop Down', 'larry' ),
        ) );
    }
    
    add_action( 'after_setup_theme', 'larry_bp_nav_setup' );
    // Member profiles - change cropping size of cover image
    function tk_cover_image( $settings = array() )
    {
        $settings['width'] = 1168;
        $settings['height'] = 400;
        return $settings;
    }
    
    add_filter(
        'bp_before_xprofile_cover_image_settings_parse_args',
        'tk_cover_image',
        10,
        1
    );
    // Set default member component to profile page instead of activity page
    define( 'BP_DEFAULT_COMPONENT', 'profile' );
    // BuddyPress Nav & Subnav Changes
    function tk_rename_profile_tabs()
    {
        buddypress()->members->nav->edit_nav( array(
            'name' => 'Profile',
        ), 'public', 'profile' );
        buddypress()->members->nav->edit_nav( array(
            'name' => 'Edit Profile',
        ), 'edit', 'profile' );
        buddypress()->members->nav->edit_nav( array(
            'name' => 'Profile Image',
        ), 'change-avatar', 'profile' );
        buddypress()->members->nav->edit_nav( array(
            'name' => 'Background Image',
        ), 'change-cover-image', 'profile' );
    }
    
    add_action( 'bp_setup_nav', 'tk_rename_profile_tabs', 100 );
    // BuddyPress Site-Wide Activity Stream - Change Title to the Page Title that was setup for the actual page
    add_filter(
        'bp_get_directory_title',
        'buddypress_sitewide_activity_title',
        10,
        2
    );
    function buddypress_sitewide_activity_title( $title )
    {
        
        if ( !bp_is_active( 'notifications' ) ) {
            return;
        } else {
            global  $post ;
            global  $bp ;
            $title = $post->post_title;
            return $title;
        }
    
    }

}

// Lifter LMS theme compatibility

if ( class_exists( 'LifterLMS' ) ) {
    /**
     * Display LifterLMS Course and Lesson sidebars
     * on courses and lessons in place of the sidebar returned by
     * this function
     * @param    string     $id    default sidebar id (an empty string)
     * @return   string
     */
    function lifter_lms_sidebar_function( $id )
    {
        $my_sidebar_id = 'sidebar-1';
        return $my_sidebar_id;
    }
    
    add_filter( 'llms_get_theme_default_sidebar', 'lifter_lms_sidebar_function' );
    /**
     * Declare explicit theme support for LifterLMS course and lesson sidebars
     * @return   void
     */
    function my_llms_theme_support()
    {
        add_theme_support( 'lifterlms-sidebars' );
    }
    
    add_action( 'after_setup_theme', 'my_llms_theme_support' );
    /**
     * Display lesson and course custom sidebars on the appropriate LifterLMS pages
     *
     * @param  array $sidebars_widgets  array of registered sidebars
     * @return array
     */
    function lifterlms_sidebar_compatibility( $sidebars_widgets )
    {
        // replace the widgets in the primary sidebar with LifterLMS Course sidebar on Course Pages
        
        if ( is_singular( 'course' ) && array_key_exists( 'llms_course_widgets_side', $sidebars_widgets ) ) {
            // replace "sidebar-1" with your theme's sidebar id
            $sidebars_widgets['sidebar-1'] = $sidebars_widgets['llms_course_widgets_side'];
        } elseif ( is_singular( 'lesson' ) && array_key_exists( 'llms_lesson_widgets_side', $sidebars_widgets ) ) {
            // replace "sidebar-1" with your theme's sidebar id
            $sidebars_widgets['sidebar-1'] = $sidebars_widgets['llms_lesson_widgets_side'];
        }
        
        return $sidebars_widgets;
    }
    
    add_filter( 'sidebars_widgets', 'lifterlms_sidebar_compatibility' );
}

// cool color adjust function
function adjustBrightness( $hex, $steps )
{
    // Steps should be between -255 and 255. Negative = darker, positive = lighter
    $steps = max( -255, min( 255, $steps ) );
    // Normalize into a six character long hex string
    $hex = str_replace( '#', '', $hex );
    if ( strlen( $hex ) == 3 ) {
        $hex = str_repeat( substr( $hex, 0, 1 ), 2 ) . str_repeat( substr( $hex, 1, 1 ), 2 ) . str_repeat( substr( $hex, 2, 1 ), 2 );
    }
    // Split into three parts: R, G and B
    $color_parts = str_split( $hex, 2 );
    $return = '#';
    foreach ( $color_parts as $color ) {
        $color = hexdec( $color );
        // Convert to decimal
        $color = max( 0, min( 255, $color + $steps ) );
        // Adjust color
        $return .= str_pad(
            dechex( $color ),
            2,
            '0',
            STR_PAD_LEFT
        );
        // Make two char hex code
    }
    return $return;
}

// get the right template style for the blog archives depending on sidebar
function blog_template_style()
{
    
    if ( get_theme_mod( 'larry_blog_archive_sidebars' ) == true ) {
        $template_style = 'content-2-col';
    } else {
        $template_style = 'content-1-col';
    }
    
    return $template_style;
}







/*
CHANGE SLUGS OF CUSTOM POST TYPES
*/
function change_post_types_slug( $args, $post_type ) {

	/*item post type slug*/
	if ( 'track' === $post_type ) {
		$args['rewrite']['slug'] = 'music';
	}

	return $args;
}
add_filter( 'register_post_type_args', 'change_post_types_slug', 10, 2 );

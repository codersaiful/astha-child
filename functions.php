<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( !function_exists( 'chld_thm_cfg_locale_css' ) ):
    function chld_thm_cfg_locale_css( $uri ){
        if ( empty( $uri ) && is_rtl() && file_exists( get_template_directory() . '/rtl.css' ) )
            $uri = get_template_directory_uri() . '/rtl.css';
        return $uri;
    }
endif;
add_filter( 'locale_stylesheet_uri', 'chld_thm_cfg_locale_css' );

// END ENQUEUE PARENT ACTION

function astha_child_custm_error_404_top_content(){

}
add_action( 'astha_404_page_top', 'astha_child_custm_error_404_top_content' );

//include_once 'astha-demo-site-functions.php';



/**
 * Following two functions and hook has used
 * for showing menu at Footer Socket.
 * 
 * By Default it's disabled. you able to enable it.
 * 
 * @since 1.0.2.0
 */

if ( !function_exists( 'astha_child_footer_socket_menu' ) ):
    
    /**
     * Displaying Footer menu.
     * confirm that: footer-socket-menu is already registered
     * we did it using bottom function of this function
     * 
     * @since 1.0.2.0
     */
    function astha_child_footer_socket_menu(){

            wp_nav_menu(
                array(
                    'theme_location'    => 'footer-socket-menu',
                    'container_id'      => 'footer-socket-menu',
                    'menu_class'        => 'menu nav-menu',
                    'depth'             => 1,
                )
            );
    }
endif;
//add_action( 'astha_socket_area', 'astha_child_footer_socket_menu', 999 );

if ( !function_exists( 'astha_child_footer_socket_menu_reg' ) ):
    
    /**
     * Register footer-socket-menu menu for Footer Socket
     * 
     * @since 1.0.2.0
     */
    function astha_child_footer_socket_menu_reg(){
            register_nav_menus(
                array(
                        'footer-socket-menu' => esc_html__( 'Footer Socket Menu', 'astha' ),
                )
            );
    }
endif;
//add_action( 'after_setup_theme', 'astha_child_footer_socket_menu_reg', 999 );

if ( !function_exists( 'astha_child_social_links_anywhere' ) ):
    
    /**
     * Displaying selected social link
     * which is already selected in Customizer.
     * 
     * @since 1.0.2.0
     */
    function astha_child_social_links_anywhere(){
        $social_network = astha_option( 'astha_social' );
	astha_social_links( $social_network );
    }
endif;
add_shortcode( 'astha_social_links', 'astha_child_social_links_anywhere' );


if ( !function_exists( 'astha_child_header_custom_top_reg' ) ):
    
    /**
     * Register Custom Topbar
     * 
     * @since 1.0.2.0
     */
    function astha_child_header_custom_top_reg(){
        register_sidebar(
		array(
			'name'          => esc_html__( 'Custom Topbar', 'astha' ),
			'id'            => 'custom-topbar',
			'description'   => esc_html__( 'Add widgets here.', 'astha' ),
			'before_widget' => '<section id="%1$s" class="widget widget-general %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
 	);
    }
endif;
//add_action( 'after_setup_theme', 'astha_child_header_custom_top_reg', 999 );

if ( ! function_exists( 'astha_child_header_custom_top' ) ):
    /**
     * Displaying custom Topbar
     */
    function astha_child_header_custom_top(){
	//if( get_the_id() != 3091 ) return;
		
        dynamic_sidebar( 'custom-topbar' );
    }
endif;

//add_action( 'astha_before_header', 'astha_child_header_custom_top' );
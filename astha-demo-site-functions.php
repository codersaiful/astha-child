<?php
/**
 * Additional Functions file.
 * **************************
 * Not for customer live site, Only for Astha Demo site
 * **************************
 * 
 * What will be added to this page:
 * NORMALLY WE WILL ADD ACTION AND FILTER HOOK
 * WHICH NEED FOR ASTHA DEMO.
 * 
 * When we will upload to ThemeForest or for Our Customer, we have to remove this file
 * 
 * @since 1.0.0.1
 */

/**
 * UltraAddons Default category goes to basic for now
 * 
 * 
 * @param type $columns
 * @return type
 */
function astha_child_ultraaddons_cat_basic( $cat ){
    return [ 'basic', 'ultraaddons' ];
}
add_filter( 'ultraaddons_widget_category', 'astha_child_ultraaddons_cat_basic' );


/**
 * Actually this is for management shop page 
 * Such: 
 * with side bar, 
 * without sidebar
 * no sidebar
 * 
 * we will handle this based on get var of link
 * 
 * we will use astha_option filter.
 * 
 * filter loc: lib/top-functions.php
 * function: astha_option()
 * 
 * ### USED ####
 * apply_filters( 'astha_option', $theme_mod, $keyword, $post_ID, $sufix );//get_theme_mod( $keyword );
 * apply_filters( 'astha_option', $cmb2, $keyword, $post_ID, $sufix );
 * 
 */
function astha_childshop_page_manage_by_get_var( $theme_mod, $keyword, $post_ID, $sufix  ){
    //astha_blog_layout
    //var_dump($_GET,array_keys(get_theme_mods()));
    //$post_ID == $shop_page_id && 
    if( $keyword == 'layout_sidebar' && isset( $_GET['layout_sidebar'] ) && ! empty( $_GET['layout_sidebar'] ) ){

        return $_GET['layout_sidebar'];
    }else{
//        $supported_options = array_keys(get_theme_mods());
//        if( ! is_array( $supported_options ) ){
//            $supported_options = array();
//        }
        foreach($_GET as $each_option => $each_option_value ){
            if( $each_option == $keyword ){
                return $each_option_value;
            }
        }
    }
    
    return $theme_mod;
}
add_filter( 'astha_option', 'astha_childshop_page_manage_by_get_var', 10, 4 );


/**
 * To change shop page's Column for shop page,
 * We will use this filter.
 * 
 * @param type $columns
 * @return Int Number
 */
function astha_childshop_column_manage_by_get_var( $columns ){
    
    if( isset( $_GET['shop_column'] ) && ! empty( $_GET['shop_column'] ) && is_numeric( $_GET['shop_column'] ) ){
        $col = (int) $_GET['shop_column'];
        return $col;
    }
    
    return $columns;
}
add_filter( 'loop_shop_columns', 'astha_childshop_column_manage_by_get_var', 10, 4 );

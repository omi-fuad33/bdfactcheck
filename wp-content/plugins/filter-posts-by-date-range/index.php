<?php
/*
Plugin Name: Filter Posts By Date Range
Plugin URI: http://www.nikunjsoni.co.in/
Description: Filter your WordPress posts by date range
Version: 1.2
Author: Nikunj Soni
Author URI: https://profiles.wordpress.org/nikunjsoni
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed this file directly
}

if ( ! defined( 'FPBDR_PLUGIN_URL' ) ) { 
    
    // define the url of this plugin
    $FPBDR_plugins_url = plugin_dir_url( __FILE__ );
    define( FPBDR_PLUGIN_URL , $FPBDR_plugins_url );
}

// adding authors to filter  
add_action('restrict_manage_posts', 'FPBDR_filter_by_the_author');
function FPBDR_filter_by_the_author() {

    $params = array(    'name'              => 'author', 
                        'show_option_all'   => 'All authors' );
    
    $user   =   sanitize_text_field( $_GET['user'] );
    if ( isset( $user ) )
        $params['selected'] = $user; 
        wp_dropdown_users( $params ); // print the ready author list
}


add_filter( 'post_row_actions', 'FPBDR_rys_remove_row_actions', 10, 1 );
function FPBDR_rys_remove_row_actions($actions) {
    unset( $actions['view'] );	
    unset( $actions['inline hide-if-no-js'] );
    unset( $actions['edit'] );	
    unset( $actions['trash'] );
    return $actions;
}

// remove monthly date filters
add_filter('months_dropdown_results', 'FPBDR_default_return_empty_array');
function FPBDR_default_return_empty_array(){
    return array();
}

// adding filter
include_once('filter-posts-by-daterange.php');

new FPBDR_DateRange();

?>
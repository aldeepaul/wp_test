<?php
/*
Plugin Name: SB Popular Events
Plugin URI: http://pi2.kutimoy.com
Description: This is a test plugin for displaying popular events.
Version: 1.01.01
Author: Aldee 
Author URI: http://pi2.kutimoy.com
License: 
*/


/**
 * Check for function, class and constant definition confilcts
 * and only load the rest of the plugin if no conflicts are found
 */
$sb_popular_events_widgets_functions_used = array();
$sb_popular_events_widgets_classes_used = array('Sb_Popular_Events');
$sb_popular_events_widgets_constants_used = array();

$sb_popular_events_widgets_errors = array();

// check for wp version >= 2.8
global $wp_version;
$sb_popular_events_widgets_wp_min_version = '3.0';
if ( version_compare( $wp_version, $sb_popular_events_widgets_wp_min_version, '<' ) ) {
    $sb_popular_events_widgets_errors[] = __( 'Odds Widgets plugin only works on WordPress' ) . ' ' . $sb_popular_events_widgets_wp_min_version . '+<br />' . __( 'You need to upgrade your blog to use this plugin!' );
}

// check for curl php extension
$loaded_extensions = get_loaded_extensions();
if ( !in_array( 'curl', $loaded_extensions ) ) {
    $sb_popular_events_widgets_errors[] = __( 'SB Popular Widgets plugin requires CURL PHP extension to be installed' );
}

// check for function names conflicts
foreach ( $sb_popular_events_widgets_functions_used as $f_name ) {
    if ( function_exists( $f_name ) ) {
        $sb_popular_events_widgets_errors[] = __( 'Function already defined: ' ) . $f_name;
    }
}

// check for class names conflicts
foreach ( $sb_popular_events_widgets_classes_used as $cl_name ) {
    if ( class_exists( $cl_name ) ) {
        $sb_popular_events_widgets_errors[] = __( 'Class already defined: ' ) . $cl_name;
    }
}

// check for constant names conflicts
foreach ( $sb_popular_events_widgets_constants_used as $c_name ) {
    if ( defined( $c_name ) ) {
        $sb_popular_events_widgets_errors[] = __( 'Constant already defined: ' ) . $c_name;
    }
}

if ( !empty( $sb_popular_events_widgets_errors ) ) {
    add_action( 'admin_notices', 'sb_popular_events_widgets_show_errors' );
} else {
    // Load the plugin
    include_once( 'sb-popular-events-loader.php' );
}

/**
 * Show the odds widgets errors if any
 */
function sb_popular_events_widgets_show_errors() {
    global $sb_popular_events_widgets_errors;

    if ( !empty( $sb_popular_events_widgets_errors ) ) {
        print '<div class="error"><p><strong>'
            .__('The &quot;Odds Widgets&quot; plugin cannot load correctly due to following errors:')
            .'</strong></p><ul>'
            .implode('</li><li>', $sb_popular_events_widgets_errors)
            .'</ul></div>';
    }
}
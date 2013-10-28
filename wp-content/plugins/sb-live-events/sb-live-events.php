<?php
/*
Plugin Name: SB Live Events
Plugin URI: http://pi.kutimoy.com
Description: This is a test plugin for displaying live events.
Version: 1.01
Author: Aldee 
Author URI: http://pi.kutimoy.com
License: 
*/


/**
 * Check for function, class and constant definition confilcts
 * and only load the rest of the plugin if no conflicts are found
 */
$sb_live_events_widgets_functions_used = array();
$sb_live_events_widgets_classes_used = array('Sb_Live_Events');
$sb_live_events_widgets_constants_used = array();

$sb_live_events_widgets_errors = array();

// check for wp version >= 2.8
global $wp_version;
$sb_live_events_widgets_wp_min_version = '3.0';
if ( version_compare( $wp_version, $sb_live_events_widgets_wp_min_version, '<' ) ) {
    $sb_live_events_widgets_errors[] = __( 'Odds Widgets plugin only works on WordPress' ) . ' ' . $sb_live_events_widgets_wp_min_version . '+<br />' . __( 'You need to upgrade your blog to use this plugin!' );
}

// check for curl php extension
$loaded_extensions = get_loaded_extensions();
if ( !in_array( 'curl', $loaded_extensions ) ) {
    $sb_live_events_widgets_errors[] = __( 'SB Live Widgets plugin requires CURL PHP extension to be installed' );
}

// check for function names conflicts
foreach ( $sb_live_events_widgets_functions_used as $f_name ) {
    if ( function_exists( $f_name ) ) {
        $sb_live_events_widgets_errors[] = __( 'Function already defined: ' ) . $f_name;
    }
}

// check for class names conflicts
foreach ( $sb_live_events_widgets_classes_used as $cl_name ) {
    if ( class_exists( $cl_name ) ) {
        $sb_live_events_widgets_errors[] = __( 'Class already defined: ' ) . $cl_name;
    }
}

// check for constant names conflicts
foreach ( $sb_live_events_widgets_constants_used as $c_name ) {
    if ( defined( $c_name ) ) {
        $sb_live_events_widgets_errors[] = __( 'Constant already defined: ' ) . $c_name;
    }
}

if ( !empty( $sb_live_events_widgets_errors ) ) {
    add_action( 'admin_notices', 'sb_live_events_widgets_show_errors' );
} else {
    // Load the plugin
    include_once( 'sb-live-events-loader.php' );
}

/**
 * Show the odds widgets errors if any
 */
function sb_live_events_widgets_show_errors() {
    global $sb_live_events_widgets_errors;

    if ( !empty( $sb_live_events_widgets_errors ) ) {
        print '<div class="error"><p><strong>'
            .__('The &quot;Odds Widgets&quot; plugin cannot load correctly due to following errors:')
            .'</strong></p><ul>'
            .implode('</li><li>', $sb_live_events_widgets_errors)
            .'</ul></div>';
    }
}


/*
if(class_exists('Sb_Live_Events')) { // Installation and uninstallation hooks
	register_activation_hook(__FILE__, array('Sb_Live_Events', 'activate'));
	register_deactivation_hook(__FILE__, array('Sb_Live_Events', 'deactivate')); // instantiate the plugin class
	$Sb_Live_Events = new Sb_Live_Events();
	if(isset($Sb_Live_Events)) { // Add the settings link to the plugins page
		function plugin_settings_link($links) {
			$settings_link = '<a href="options-general.php?page=sb-live-events">Settings</a>';
			array_unshift($links, $settings_link);
			return $links;
		}
		$plugin = plugin_basename(__FILE__);
		add_filter("plugin_action_links_$plugin", 'plugin_settings_link');
	}
}
*/

<?php
require_once( 'includes/Sb_Popular_Widget.php' );

add_action( 'admin_menu', 'sb_popular_widgets_add_menu_item' );

add_action( 'widgets_init', 'Sb_Popular_Events::register_this_widget' );

add_action( 'admin_enqueue_scripts', 'sb_popular_events_widgets_admin_register_head' );

add_action( 'admin_init', 'sb_popular_widgets_init' );

function sb_popular_events_widgets_admin_register_head() {
    //wp_enqueue_style( 'odds_widgets_css', plugins_url( 'css/odds-widgets.css', __FILE__ ) );
    //wp_enqueue_script( 'odds_widgets_js', plugins_url( 'js/odds-widgets.js', __FILE__ ), array('jquery') );
}

function sb_popular_widgets_add_menu_item() {
    add_options_page(
        'SB Popular Events Settings',
        'SB Popular Events',
        'manage_options',
        'sb-popular-events',
        'sb_popular_events_widgets_admin_page'
    );
}

function sb_popular_widgets_init(){
    register_setting('sb-popular-events-group', 'sb_popular_endpoint_name');
    register_setting('sb-popular-events-group', 'sb_popular_number_of_events');
}

function sb_popular_events_widgets_admin_page() {
    if(!current_user_can('manage_options')) {
        wp_die(__('You do not have sufficient permissions to access this page.'));
    } // Render the settings template
    //include(sprintf("%s/includes/settings.php", dirname(__FILE__)));
    include('includes/settings.php');
}
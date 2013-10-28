<?php
class Sb_Live_Events extends WP_Widget{
    public function __construct() {
        parent::WP_Widget(false, $name = __('SB Live Events Widget', 'sb-live-events'));
        //add_action( 'wp_enqueue_scripts', array(&$this,'fetch_live_script'));
    }

    public function add_menu() {
        add_options_page('SB Live Events Settings', 'SB Live Events', 'manage_options', 'sb-live-events', array(&$this, 'plugin_settings_page'));
    }

    public function plugin_settings_page() {
        if(!current_user_can('manage_options')) {
            wp_die(__('You do not have sufficient permissions to access this page.'));
        } // Render the settings template
        include(sprintf("%s/settings.php", dirname(__FILE__)));
    }

    public function form($instance) {
        if( $instance) {
            $title = esc_attr($instance['title']);
        } else {
            $title = '';
        }
        include("widget_form.php");
    }

    public function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        return $instance;
    }

    public function widget($args, $instance) {
        $this->fetch_live_script();
        include("live_events.php");
    }

    public function add_widget(){
        register_widget("Sb_Live_Events");
    }

    /** * Activate the plugin */
    public static function activate() {

    }

    /** * Deactivate the plugin */
    public static function deactivate() {

    }

    public function fetch_live_script(){
        wp_enqueue_script( 'ajax-script', plugins_url( '../js/fetch_live_events.js', __FILE__ ), array('jquery'));
        wp_localize_script( 'ajax-script', 'ajax_object',array( 'ajax_url' => get_option('endpoint_name'), 'we_value' => 1234 ));
    }

    public static function register_this_widget() {
        register_widget( __CLASS__ );
    }

}
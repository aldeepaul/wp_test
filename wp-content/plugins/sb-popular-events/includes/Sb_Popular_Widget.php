<?php
class Sb_Popular_Events extends WP_Widget{
    public function __construct() {
        parent::WP_Widget(false, $name = __('SB Popular Events Widget', 'sb-popular-events'));
        //add_action( 'wp_enqueue_scripts', array(&$this,'fetch_script'));
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
        $this->fetch_script();
        include("popular_events.php");
    }

    public function add_widget(){
        register_widget("Sb_Popular_Events");
    }

    /** * Activate the plugin */
    public static function activate() {

    }

    /** * Deactivate the plugin */
    public static function deactivate() {

    }

    public function fetch_script(){
        wp_enqueue_script( 'sb-popular-ajax-script', plugins_url( '../js/fetch_popular_events.js', __FILE__ ), array('jquery'));
        wp_localize_script( 'sb-popular-ajax-script', 'sb_popular_ajax_object',array( 'sb_popular_ajax_url' => get_option('sb_popular_endpoint_name')));
    }

    public static function register_this_widget() {
        register_widget( __CLASS__ );
    }

}
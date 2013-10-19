<?php
/*
Plugin Name: SB Live Events
Plugin URI: http://pi.kutimoy.com
Description: This is a test plugin for displaying live events.
Version: .01
Author: Aldee 
Author URI: http://pi.kutimoy.com
License: 
*/

if(!class_exists('Sb_Live_Events')) { 
	class Sb_Live_Events extends WP_Widget{ /** * Construct the plugin object */ 

		public function __construct() { // register actions 
			add_action('admin_init', array(&$this, 'admin_init')); 
			add_action('admin_menu', array(&$this, 'add_menu'));
			parent::WP_Widget(false, $name = __('SB Live Events Widget', 'sb-live-events')); 
			add_action('widgets_init',array(&$this, 'add_widget'));
			add_action( 'wp_enqueue_scripts', array(&$this,'fetch_live_script'));
		} 

		// widget form creation
		public function form($instance) {	
			if( $instance) {
		 	    $title = esc_attr($instance['title']);	    	
			} else {
			     $title = '';		     
			}
			include(sprintf("%s/templates/widget_form.php", dirname(__FILE__)));
		}

		// widget update
		public function update($new_instance, $old_instance) {
			$instance = $old_instance;      
	      	$instance['title'] = strip_tags($new_instance['title']);
	     	return $instance;
		}

		// widget display
		public function widget($args, $instance) {
			/* ... */
			echo "<h3>".$instance['title']."</h3>";
		}

		public function add_widget(){
			register_widget("Sb_Live_Events");
		}

		/** * Activate the plugin */ 
		public static function activate() {

		} // END public static function activate 

		/** * Deactivate the plugin */ 
		public static function deactivate() {

		} // END	public static function deactivate 

		public function admin_init() { // Set up the settings for this plugin 
			$this->init_settings(); // Possibly do additional admin_init tasks 
		} 

		public function init_settings() { // register the settings for this plugin 
			register_setting('sb-live-events-group', 'setting_a'); 
			register_setting('sb-live-events-group', 'setting_b'); 
		}
		/** * add a menu */ 
		public function add_menu() { 
			add_options_page('SB Live Events Settings', 'SB Live Events', 'manage_options', 'sb-live-events', array(&$this, 'plugin_settings_page')); 
		} // END public function add_menu() 

		/** * Menu Callback */ 
		public function plugin_settings_page() { 			
			if(!current_user_can('manage_options')) { 
				wp_die(__('You do not have sufficient permissions to access this page.')); 
			} // Render the settings template 
			include(sprintf("%s/templates/settings.php", dirname(__FILE__))); 
		} 

		public function get_events($no_of_events = 3){
			return get_option('setting_a') . " : " . get_option('setting_b');
		}

		public function fetch_live_script(){			
			wp_enqueue_script( 'ajax-script', plugins_url( '/js/fetch_live_events.js', __FILE__ ), array('jquery'));
			wp_localize_script( 'ajax-script', 'ajax_object',array( 'ajax_url' => 'https://sbfacade.bpsgameserver.com/PlayableMarketService/PlayableMarketServicesV2.svc/json2/FetchOngoingLiveEvents?segmentId=601&languageCode=en&timeZoneStandardName=GMT%20Standard%20Time', 'we_value' => 1234 ));
		}



	}
}


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


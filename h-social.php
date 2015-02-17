<?php
    /* 
    Plugin Name: H-Social 
    Plugin URI: http://heraldsolutions.in
    Description: Plugin for social intrigation
    Author: Herald Solutions 
    Version: 1.0 
    Author URI: http://www.heraldsolutions.in
    */

add_action( 'admin_init', 'in_stylesheet' );
add_action( 'admin_menu', 'my_plugin_menu' );
add_action('login_form','myplugin_add_login_fields');
function myplugin_add_login_fields() {
	  include('gplus_login.php');
}
function my_plugin_menu(){
    add_menu_page('social', 'social ','manage_options', 'social', 'form_display','',81);
    add_submenu_page('social','Google client guide','Google client guide','manage_options','google_client_guide','google_client_guide');
}
function form_display(){
    include('g-form.php');
}
function in_stylesheet(){
       wp_enqueue_style( 'social_css1',  plugins_url('css/bootstrap.min.css', __FILE__) );
}
function google_client_guide(){
    include('g-guide.php');
}
<?php
/*
Plugin Name: HK Button Contact
Plugin URI: https://huykira.net
Description: Show Button Contact
Author: Huy Kira
Version: 1.0
Author URI: http://www.huykira.net
*/
if ( !function_exists( 'add_action' ) ) {
  echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
  exit;
}

define('HK_BUTTON_CONTACT_PLUGIN_URL', plugin_dir_url(__FILE__));
define('HK_BUTTON_CONTACT_PLUGIN_RIR', plugin_dir_path(__FILE__));

// add css
wp_enqueue_style( 'button-contact', HK_BUTTON_CONTACT_PLUGIN_URL . 'css/button-contact.css',false, '1.0','all');

require_once(HK_BUTTON_CONTACT_PLUGIN_RIR . 'include/class.hk-contact-button-option.php');
require_once(HK_BUTTON_CONTACT_PLUGIN_RIR . 'include/class.button.php');
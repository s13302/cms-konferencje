<?php
/**
* @package Konferencje
*/
/*
Plugin Name: Konferencje Plugin
Description: A plugin for creating, managing and displaying conferences info
Version: 0.0.1a
Author: Rafał Podkoński, Rafał Klicki, Tomasz Orzeł, Jakub Micek
*/

if ( ! function_exists( 'add_action' ) ) {
  echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
  exit;
}

define( 'KONFERENCJE_DIR_PATH', plugin_dir_path( __FILE__ ) );
define( 'KONFERENCJE_URL_PATH', plugin_dir_url( __FILE__ ) );

require_once( KONFERENCJE_DIR_PATH . 'konferencje-cpt.php' );
require_once( KONFERENCJE_DIR_PATH . 'konferencje-fields.php' );

function konferencje_enqueue_admin_scripts() {
  global $post_type;
  if ( $post_type == 'conference' ) {
    wp_enqueue_script( 'konferencje-script-1', KONFERENCJE_URL_PATH . 'res/js/konferencje-script.js', array( 'jquery', 'jquery-ui-core', 'jquery-ui-datepicker' ), '20180101', true );
    wp_enqueue_style( 'konferencje-jquery-ui-style-1', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css' );
  }
}

add_action( 'admin_enqueue_scripts', 'konferencje_enqueue_admin_scripts' );

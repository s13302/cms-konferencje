<?php

class ConferenceCPT {

  private static $cpt_name = 'cms_conference';

  function __construct() {

    add_action('init', array($this, 'initCPT'));

    add_action('add_meta_boxes', array($this, 'customMetaboxes'));

    add_action('save_post', array($this, 'saveMetadata'));

  }

  function initCPT() {
    $args = array(
      'labels' => array(
        'name' => __('Conferences'),
        'singular_name' => __('Conference'),
        'archives' => __('Conferences')
      ),
      'public' => true,
      'menu_icon' => 'dashicons-welcome-learn-more',
      'has_archive' => true,
      'supports' => array(
        'title', 'editor', 'thumbnail', 'excerpt'
      )
    );

    register_post_type(static::$cpt_name, $args);
  }

  function saveMetadata($post_id) {
    $is_autosave = wp_is_post_autosave($post_id);
    $is_revision = wp_is_post_revision($post_id);
    $is_valid_nonce = (isset($_POST['cms_conference_nonce']) && wp_verify_nonce($_POST['cms_conference_nonce'], 'cms_konferencje_save_post')) ? true : false;

    if ($is_autosave || $is_revision || ! $is_valid_nonce) {
      return;
    }

    if (isset($_POST['cms_konferencje_speaker'])) {
      update_post_meta($post_id, 'cms_konferencje_speaker', $_POST['cms_konferencje_speaker']);
    }
    if (isset($_POST['cms_konferencje_places'])) {
      update_post_meta($post_id, 'cms_konferencje_places', $_POST['cms_konferencje_places']);
    }
    if (isset($_POST['cms_konferencje_price'])) {
      update_post_meta($post_id, 'cms_konferencje_price', $_POST['cms_konferencje_price']);
    }
    if (isset($_POST['cms_konferencje_start_date'])) {
      update_post_meta($post_id, 'cms_konferencje_start_date', $_POST['cms_konferencje_start_date']);
    }
  }

  function customMetaboxes() {
    require_once CMS_CONFERENCES_DIR_PATH . 'templates/conference-metadata.php';
    add_meta_box(
      'conference_meta',
      __('Conferences'),
      'cms_conferences_metadata_template',
      static::$cpt_name
    );
  }

}

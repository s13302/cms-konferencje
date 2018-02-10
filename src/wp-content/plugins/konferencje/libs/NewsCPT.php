<?php

class NewsCPT {

  private static $cpt_name = 'cms_conference_news';

  function __construct() {

    add_action('init', array($this, 'initCPT'));

    add_action('add_meta_boxes', array($this, 'customMetaboxes'));

    add_action('save_post', array($this, 'saveMetadata'));

  }

  function initCPT() {
    $args = array(
      'labels' => array(
        'name' => __('News'),
        'singular_name' => __('News')
      ),
      'public' => true,
      'supports' => array(
        'title', 'editor'
      )
    );

    register_post_type(static::$cpt_name, $args);
  }

  function saveMetadata($post_id) {
    $is_autosave = wp_is_post_autosave($post_id);
    $is_revision = wp_is_post_revision($post_id);
    $is_valid_nonce = (isset($_POST['cms_news_nonce']) && wp_verify_nonce($_POST['cms_news_nonce'], 'cms_news_save_post')) ? true : false;

    if ($is_autosave || $is_revision || ! $is_valid_nonce) {
      return;
    }

    if (isset($_POST['cms_news_conference_id'])) {
      update_post_meta($post_id, 'cms_news_conference_id', $_POST['cms_news_conference_id']);
    }

  }

  function customMetaboxes() {
    require_once CMS_CONFERENCES_DIR_PATH . 'templates/news-metadata.php';
    add_meta_box(
      'news_meta',
      __('News'),
      'cms_news_template',
      static::$cpt_name,
      'side'
    );
  }

}

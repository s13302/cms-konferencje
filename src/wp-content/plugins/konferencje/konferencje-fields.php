<?php

function konferencje_meta_save( $post_id ) {
  $is_autosave = wp_is_post_autosave( $post_id );
  $is_revision = wp_is_post_revision( $post_id );
  $is_valid_nonce = ( isset( $_POST[ 'konferencje_nonce' ] ) && wp_verify_nonce( $_POST[ 'konferencje_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';

  if ( $is_autosave || $is_revision || ! $is_valid_nonce ) {
    return;
  }

  if ( isset( $_POST[ 'konferencje_sits' ] ) ) {
    update_post_meta( $post_id, 'konferencje_sits', sanitize_text_field( $_POST[ 'konferencje_sits' ] ) );
  }
  if ( isset( $_POST[ 'konferencje_start_date' ] ) ) {
    update_post_meta( $post_id, 'konferencje_start_date', sanitize_text_field( $_POST[ 'konferencje_start_date' ] ) );
  }
  if ( isset( $_POST[ 'konferencje_agenda' ] ) ) {
    update_post_meta( $post_id, 'konferencje_agenda', sanitize_text_field( $_POST[ 'konferencje_agenda' ] ) );
  }
  if ( isset( $_POST[ 'price' ] ) ) {
    update_post_meta( $post_id, 'price', sanitize_text_field( $_POST[ 'price' ] ) );
  }
}
add_action( 'save_post' , 'konferencje_meta_save' );

function konferencje_custom_metabox() {
  require_once KONFERENCJE_DIR_PATH . 'views/konferencje_additional_metadata.php';
  add_meta_box(
    'konferencje_meta',
    'Konferencje',
    'konferencje_meta_callback',
    'conference'
  );
}
add_action( 'add_meta_boxes', 'konferencje_custom_metabox' );

<?php

function konferencje_init() {
  konferencje_register_post_types();
}

function konferencje_register_post_types() {
  konferencje_register_conference_post_type();
}

function konferencje_register_conference_post_type() {
  $singular = 'Konferencja';
  $plural = 'Konferencje';

  $labels = array(
    'name' => $plural,
    'singular' => $singular
  );

  $args = array(
    'public'             => true,
    'labels'             => $labels,
    'menu_icon'          => 'dashicons-calendar-alt',
    'capability_type'    => 'post',
    'show_in_nav_menus'  => true,
    'show_in_admin_bar'  => true,
    'can_export'         => true,
    'delete_with_user'   => false,
    'hierarchical'       => false,
    'has_archive'        => true,
    'query_var'          => true,
    'supports'           => array(
      'title', 'editor', 'comments'
    ),
    'rewrite'            => array(
      'slug' => 'conference'
    )
  );

  register_post_type( 'conference', $args );
}

add_action( 'init', 'konferencje_init' );

function konferencje_shortcode() {

  $args = array(
    'post_status' => 'publish',
    'post_type' => 'conference'
  );

  $recent = new WP_Query( $args );

  $out = '<ul>';
  while ( $recent->have_posts() ) {
    $recent->the_post();
    $out .= '<li><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></li>';
  }
  $out .= '</ul>';
  wp_reset_query();
  return $out;

}
add_shortcode( 'konferencje', 'konferencje_shortcode' );

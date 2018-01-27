<?php
function konferencje_meta_callback( $post ) {
  wp_nonce_field( basename( __FILE__ ), 'konferencje_nonce' );
  $konferencje_stored_meta = get_post_meta( $post->ID );
  ?>

<div>
  <div class="meta-th">
    <label for="konferencje-sits">Liczba Miejsc</label>
  </div>
  <div class="meta-td">
    <input type="number" min="1" name="konferencje_sits" id="konferencje-sits" value="<?php if ( ! empty( $konferencje_stored_meta['konferencje_sits'] ) ) echo esc_attr( $konferencje_stored_meta['konferencje_sits'][0] ) ?>" required="required">
  </div>
    <div class="meta-th">
      <label for="konferencje-price">Cena</label>
    </div>
    <div class="meta-td">
      <input type="text" name="konferencje_price" id="konferencje-price" value="<?php if ( ! empty( $konferencje_stored_meta['konferencje_price'] ) ) echo esc_attr( $konferencje_stored_meta['konferencje_price'][0] ) ?>" required="required">
    </div>
  <div class="meta-th">
    <label for="konferencje_start_date">Data Rozpoczęcia</label>
  </div>
  <div class="meta-td">
    <input type="text" class="datepicker" name="konferencje_start_date" id="konferencje_start_date" value="<?php if ( ! empty( $konferencje_stored_meta['konferencje_start_date'] ) ) echo esc_attr( $konferencje_stored_meta['konferencje_start_date'][0] ) ?>" required="required">
  </div>
  <div class="meta-th">
    <label for="konferencje-agenda">Agenda</label>
  </div>
  <div class="meta-td meta-editor">
    <?php
      $content = get_post_meta( $post->ID, 'konferencje_agenda', true );
      $editor = 'konferencje_agenda';
      $settings = array(
        'textarea_rows' => 10,
        'media_buttons' => true
      );

      wp_editor( $content, $editor, $settings );
    ?>
  </div>
</div>

  <?php
}

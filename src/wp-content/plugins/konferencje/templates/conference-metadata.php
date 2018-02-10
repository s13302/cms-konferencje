<?php

function cms_conferences_metadata_template($post) {
  wp_nonce_field('cms_konferencje_save_post', 'cms_conference_nonce');
  $stored_meta = get_post_meta($post->ID);
  $users = get_users();
?>
<div>
  <div class="meta-th">
    <label for="cms_konferencje_speaker"><?php echo __('Speaker') ?></label>
  </div>
  <div class="meta-td">
    <select id="cms_konferencje_speaker" name="cms_konferencje_speaker" required="required">
      <option></option>
      <?php
        foreach ($users as $user) {
          $selected = ($stored_meta['cms_konferencje_speaker'][0] == $user->data->ID) ? 'selected="selected"' : '';
          echo '<option value="' . $user->data->ID . '" ' . $selected . '>' . $user->data->display_name . '</option>';
        }
      ?>
    </select>
  </div>
  <div class="meta-th">
    <label for="cms_konferencje_places"><?php echo __('Places') ?></label>
  </div>
  <div class="meta-td">
    <input type="number" min="0" id="cms_konferencje_places" name="cms_konferencje_places" value="<?php if ( ! empty($stored_meta['cms_konferencje_places'])) echo $stored_meta['cms_konferencje_places'][0] ?>" required="required" />
  </div>
  <div class="meta-th">
    <label for="cms_konferencje_price"><?php echo __('Price') ?></label>
  </div>
  <div class="meta-td">
    <input type="number" min="0" step="0.01" id="cms_konferencje_price" name="cms_konferencje_price" value="<?php if ( ! empty($stored_meta['cms_konferencje_price'])) echo $stored_meta['cms_konferencje_price'][0] ?>" required="required" />
  </div>
  <div class="meta-th">
    <label for="cms_konferencje_start_date"><?php echo __('Start date') ?></label>
  </div>
  <div class="meta-td">
    <input type="date" id="cms_konferencje_start_date" name="cms_konferencje_start_date" value="<?php if ( ! empty($stored_meta['cms_konferencje_start_date'])) echo $stored_meta['cms_konferencje_start_date'][0] ?>" required="required" />
  </div>
</div>
<?php
}

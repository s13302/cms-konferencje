<?php

function cms_news_template($post) {
  wp_nonce_field('cms_news_save_post', 'cms_news_nonce');
  $stored_meta = get_post_meta($post->ID);

  $conferences = get_posts(array(
    'numberposts' => -1,
    'post_status' => 'publish',
    'post_type' => 'cms_conference'
  ));
  // echo '<pre>' . print_r($conferences, true) . '</pre>';
?>
<div>
  <div class="meta-th">
    <label for="cms_news_conference_id"><?php echo __('Conference') ?></label>
  </div>
  <div class="meta-td">
    <select id="cms_news_conference_id" name="cms_news_conference_id" required="required">
      <option></option>
      <?php
        $selected = ($stored_meta['cms_news_conference_id'][0] == $conference->ID) ? 'selected="selected"' : '';
        foreach ($conferences as $conference) {
          echo '<option value="' . $conference->ID . '" ' . $selected . '>' . $conference->post_title . '</oprtion>';
        }
      ?>
    </select>
  </div>
</div>
<?php
}

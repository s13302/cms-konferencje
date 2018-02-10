<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

 global $post_type;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
		// Post thumbnail.
		if ( $post_type != 'conference' ) {
			twentyfifteen_post_thumbnail();
		}
	?>

	<header class="entry-header">
		<?php
			if ( is_single() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
			endif;
		?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php

    $speaker = get_users( array(
      'include' => array(get_post_meta( $post->ID, 'cms_konferencje_speaker', true ) ) )
    )[0];

				echo "<p>Liczba miejsc: " . get_post_meta( $post->ID, 'cms_konferencje_places', true ) . "</p>";
				echo "<p>Speaker: " . $speaker->data->display_name . "</p>";
				echo "<p>Data rozpoczęcia: " . get_post_meta( $post->ID, 'cms_konferencje_start_date', true ) . "</p>";
				echo "<p>Cena dla uczestnika: " . get_post_meta( $post->ID, 'cms_konferencje_price', true ) . "</p>";

			/* translators: %s: Name of current post */
			the_content( sprintf(
				__( 'Continue reading %s', 'twentyfifteen' ),
				the_title( '<span class="screen-reader-text">', '</span>', false )
			) );

			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentyfifteen' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'twentyfifteen' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );

      $newsWhere = array(
        'post_type' => 'cms_conference_news',
        'meta_key' => 'cms_news_conference_id',
        'meta_value' => $post->ID,
        'post_status' => 'publish'
      );
      $news = get_posts($newsWhere);
      foreach ($news as $info) {
        echo '<a href="' . $info->guid . '">' . $info->post_title . '</a><br>';
      }
		?>
	</div><!-- .entry-content -->

	<?php
		// Author bio.
		if ( is_single() && get_the_author_meta( 'description' ) ) :
			get_template_part( 'author-bio' );
		endif;
	?>

	<footer class="entry-footer">
		<?php twentyfifteen_entry_meta(); ?>
		<?php edit_post_link( __( 'Edit', 'twentyfifteen' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->

</article><!-- #post-## -->

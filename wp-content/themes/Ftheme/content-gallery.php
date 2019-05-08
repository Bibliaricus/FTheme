<?php
/**
 * content-gallery.php
 * 
 * The default template for displaying content with Gallery post format.
 */
 ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>> 
  <header class="entry-header"> <?php
      // If single page, display the title
      // Else, we display the title in a link
      if ( is_single() ) : ?>
        <h1><?php the_title(); ?></h1>
      <?php else : ?>
        <h1><a href="<?php the_permalink();?>" rel="bookmark"><?php the_title(); ?></a></h1>
      <?php endif; ?>
      <p class="enty-meta">
        <?php
          // Display the meta information
          ftheme_post_meta();
        ?>
      </p>
  </header> <!-- end enty-header -->

  <!-- Article content -->
  <div class="entry-content">
    <?php
        the_content( __( 'Continue reading &rarr;', 'ftheme' ) );

        wp_link_pages();
    ?>
  </div>

  <!-- Article footer -->
  <footer class="entry-footer">
      <?php
        // If we have a single page and the author bio exists, display it
        if ( is_single() && get_the_author_meta( 'description' ) ) {
          echo '<h2>' . __( 'Written by ', 'ftheme' ) . get_the_author() . '</h2>';
          echo '<p>' . the_author_meta( 'description' ) . '</p>';
        }
      ?>
  </footer> <!-- end entry-footer -->
</article>
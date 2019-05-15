<?php 
/**
 * sidebar.php
 * 
 * The primary sidebar.
 */
?>

<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
  <aside class="sidebar col-md-4" role="complementory">
    <?php dynamic_sidebar( 'sidebar-1' ); ?>
  </aside> <!-- end sidebar -->
<?php endif; ?>
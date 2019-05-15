<?php 
/**
 * footer.php
 * 
 * The template for displaying footer.
 */
?>

      </div><!-- end row -->
    </div><!-- container -->
    <!-- FOOTER -->
    <footer class="site-footer">
      <div class="container">
        <?php get_sidebar( 'footer' ); ?>
        <div class="copyright">
          <p>
          &copy; <?php echo date( 'Y' ); ?>
          <a href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a>
          <?php _e( 'All right reserved.', 'ftheme' ); ?>
          </p>
        </div>
      </div>  
    </footer>

    <?php wp_footer(); ?>
  </body>
</html>
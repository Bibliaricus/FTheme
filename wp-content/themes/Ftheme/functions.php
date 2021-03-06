<?php
/*
functions.php

The theme's functions and definitions.
*/

/***********************************************************
1.0 - Define constants.
***********************************************************/

define( 'THEMEROOT', get_stylesheet_directory_uri() );
define( 'IMAGES', THEMEROOT . '/images');
define( 'SCRIPTS', THEMEROOT . '/js');
define( 'FRAMEWORK', get_template_directory() . '/framework');
define( 'STYLES', THEMEROOT . '/css');

/**
 * ----------------------------------------------------
 * 2.0 - Load the framework.
 * -------------------------------------------
 */
require_once( FRAMEWORK . '/init.php');

/**
 * -------------------------------------------------------
 * 3.0 - Set up the content value based on theme's design.
 * -------------------------------------------------------
 */
if ( !isset( $content_width ) ) {
  $content_width = 800;
}

/**
 * -------------------------------------------------------
 * 4.0 - Set up theme default and register various supported features.
 * -------------------------------------------------------
 */
if ( ! function_exists( 'ftheme_setup' ) ) {
  function ftheme_setup() {
    /**
     * Make the theme available for translation.
     */
    $lang_dir = THEMEROOT . '/languages';
    load_theme_textdomain( 'ftheme', $lang_dir );
  }

  /**
   * Add support for post formats.
   */
  add_theme_support( 'post-formats',
    array(
      'gallery',
      'link',
      'image',
      'quote',
      'video',
      'audio'
    )
  );

  /**
   * Add support for automatic feed links.
   */
  add_theme_support( 'automatic-feed-links' );

  /**
   * Add support for post thumbnails.
   */
  add_theme_support( 'post-thumbnails' );

  /**
   * Register nav menus.
   */
  register_nav_menus(
    array(
      'main-menu' => __( 'Main Menu', 'ftheme' )
    )
  );
  
  add_action( 'after_theme_setup', 'ftheme_setup' );
}

/**
 * 5.0 - Display meta information for a specific post.
 */
if ( ! function_exists( 'ftheme_post_meta' ) ) {
  function ftheme_post_meta() {
    echo '<ul class="list-inline entry-meta">';

    if ( get_post_type() === 'post' ) {
      // If the post is sticky, mark it.
      if ( is_sticky() ) {
        echo '<li class="meta-featured-post"><i class="fa fa-thumb-tack"></i>' . __( 'Sticky', 'ftheme' ) . '</li>';
      }

      // Get the post author.
      printf(
        '<li class="meta-author"><a href="%1s" rel="author">%2s</a></li>',
        esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
        get_the_author()
      );

      // Get the date.
      echo '<li class="meta-data"> ' . get_the_date() . ' </li>';

      // Get the categories.
      $category_list = get_the_category_list(', ');
      if ( $category_list ) {
        echo '<li class="meta-categories"> ' . $category_list . ' </li>';
      }

      // Get the tags.
      $tag_list = get_the_tag_list('', ', ');
      if ( $tag_list ) {
        echo '<li class="meta-tags"> ' . $tag_list . ' </li>';
      }

      // Comments link.
      if ( comments_open() ) {
        echo '<li><span class="meta-reply">';
        comments_popup_link( __( 'Leave a comment', 'ftheme' ), __( 'One comment so far', 'alpha' ), __( 'View all % commets', 'alpha' ) );
        echo '</span></li>';
      }

      // Edit link.
      if ( is_user_logged_in() ) {
        echo '<li>';
        edit_post_link( __( 'Edit', 'ftheme' ), '<span class="meta-edit">', '</span>' );
        echo '</li>';
      }
    }
  }
}

  /** 
   * 6.0 - Display navigation to the next/previous set of posts.
   */
  if ( ! function_exists( 'ftheme_paging_nav' ) ) {
    function ftheme_paging_nav() { ?>
    <ul>
      <?php
        if ( get_previous_posts_link() ) : ?>
        <li class="next">
          <?php previous_posts_link( __('Newer Posts &rarr;', 'ftheme' ) ); ?>
        </li>
        <?php endif; ?>
        <?php
        if ( get_next_posts_link() ) : ?>
        <li class="previous">
          <?php next_posts_link( __('&larr; Older Posts', 'ftheme' ) ); ?>
        </li>
        <?php endif; ?>
    </ul> <?php
    }    
  }
  
  /**
   * 7.0 - Register the widget areas.  
   */
   if ( ! function_exists( 'ftheme_widget_init' ) ) {
     function ftheme_widget_init() {
      if ( function_exists( 'register_sidebar' ) ) {
        register_sidebar(
          array(
            'name' => __( 'Main Widget Area', 'ftheme' ),
            'id' => 'sidebar-1',
            'description' => __( 'Appears on posts and pages', 'ftheme' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'aftet_widget' => '</div> <!-- end widget -->',
            'before_title' => '<h5 class="widget-title">',
            'after_title' => '</h5>',
          )
        );
        register_sidebar(
          array(
            'name' => __( 'Footer Widget Area', 'ftheme' ),
            'id' => 'sidebar-2',
            'description' => __( 'Appears on the footer', 'ftheme' ),
            'before_widget' => '<div id="%1$s" class="widget col-sm-3 %2$s">',
            'aftet_widget' => '</div> <!-- end widget -->',
            'before_title' => '<h5 class="widget-title">',
            'after_title' => '</h5>',
          )
        );
      }
     }
     add_action( 'widgets_init', 'ftheme_widget_init' );
   }

  /**
  * 8.0 - Include the generated CSS in the page header. 
  */
  if ( ! function_exists( 'ftheme_load_wp_head' ) ) {
    function ftheme_load_wp_head() {
      // Get the logo
      $logo = IMAGES . '/logo.png';

      $logo_size = getimagesize( $logo );
      ?>
        <!-- Logo CSS -->
        <style>
          .site-logo a {
            background: transparent url( <?php echo $logo; ?> ) 0 0 no-repeat;
            width: <?php echo $logo_size[0] ?>px;
            height: <?php echo $logo_size[1] ?>px;
            display: inline-block;
          }          
        </style>
      <?php
    }
    add_action( 'wp_head', 'ftheme_load_wp_head' );
  }

  /**
   * 9.0 - Load the custom scripts for the theme.
   */

   if ( ! function_exists( 'ftheme_scripts' ) ) {
     function ftheme_scripts() {
      //  Adds support for pages with threaded comments
      if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
      }

      // Register scripts
      wp_register_script( 'bootstrap-min-js', SCRIPTS . '/bootstrap.min.js', array( 'jquery' ), false, true );
      wp_register_script( 'ftheme-custom-scripts', SCRIPTS . '/script.js', array( 'jquery' ), false, true );
     }

      // Load the custom scripts
      wp_enqueue_script( 'bootstrap-min-js' );
      wp_enqueue_script( 'ftheme-custom-scripts' );

      //  Load the stylesheets
      wp_enqueue_style( 'bootstrap-min-css', STYLES . '/bootstrap.min.css' );
      wp_enqueue_style( 'animate-min-css', STYLES . '/animate.min.css' );
      wp_enqueue_style( 'style-css', THEMEROOT );

     add_action( 'wp_enqueue_scripts', 'ftheme_scripts' );
   }
  ?>
<?php
/**
 * header.php
 * 
 * The header for the theme.
 */
?>

<!-- Favicons -->

<?php 
  // Get the favicon
  $favicon = IMAGES . '/icons/favicon-16x16.png';

  // Get the custom touch icon
  $touch_icon = IMAGES . '/icons/apple-touch-icon.png';
?>

<!DOCTYPE html> 
<!--[if IE 8]> <html <?php language_attributes(); ?> class="ie8"> <![endif]-->
<!--[if !IE 8]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <title><?php wp_title( '|', true, 'right' ); ?><?php bloginfo( 'name' ); ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="description" content="<?php bloginfo( 'description' ); ?>">

  <!-- Stylesheets -->
  <link rel="stylesheet" href="css/style.css">

  <!--[if it IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->

  <!-- Favicon and Apple Icons -->
  <link rel="shortcut icon" href="<?php echo $favicon ?>">
  <link rel="apple-touch-icon-precomposed" size="180x180" href="<?php echo $touch_icon; ?>">

  <?php wp_head(); ?>
</head>
<body>
  
</body>
</html>
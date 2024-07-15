<?php
/**
 * The header
 */
?>
<!DOCTYPE html>
<html <?php language_attributes() ?> class="no-js font-sans" >
<head>
  <meta charset=<?php bloginfo("charset"); ?>>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>WP</title>

  <meta name="description" content="">

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a href="#main-content" class="visually-hidden focusable">Skip to main content</a>
<header class="wrapper">
  <h1><a href="/">Berk Özbalcı</a></h1>
</header>

<?php

if (!defined("_BB_VERSION")) {
  define("_BB_VERSION", "1.0.0");
}

function bb_enqueue_scripts() {
  wp_enqueue_style("bb_styles", get_stylesheet_uri());
  wp_enqueue_style("bb_font_charter", get_template_directory_uri() . "/font-charter.css");
  wp_enqueue_script("bb_scripts", get_template_directory_uri() . "/js/index.js", array(), _BB_VERSION, true);
}
add_action("wp_enqueue_scripts", "bb_enqueue_scripts");
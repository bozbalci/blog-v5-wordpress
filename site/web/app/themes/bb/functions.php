<?php // phpcs:ignore PSR1.Files.SideEffects.FoundWithSymbols

define("BB_RENDER_START", hrtime(true));

/**
 * ABSPATH is /bedrock/web/wp, dirname takes us back to /bedrock/web
 */
define("THEME_ABSOLUTE_PATH", dirname(__FILE__));

/**
 * Relative path of the theme directory from the server root.
 *
 * THEME_RELATIVE_PATH can also be computed by the following snippet:
 *
 * define("BEDROCK_WEB_ROOT", dirname(ABSPATH));
 * define("THEME_RELATIVE_PATH", str_replace(BEDROCK_WEB_ROOT, "",
 *     THEME_ABSOLUTE_PATH));
 *
 * However, I am hardcoding this because local development with
 * Bedrock is both supported on Trellis and LocalWP, both using
 * different path structures. On my machine the theme directory
 * is symlinked.
 */
const THEME_RELATIVE_PATH = "app/themes/bb";

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| our theme. We will simply require it into the script here so that we
| don't have to worry about manually loading any of our classes later on.
|
*/

if (!file_exists($composer = __DIR__ . '/vendor/autoload.php')) {
    wp_die(__('Error locating autoloader. Please run <code>composer install</code>.', 'sage'));
}

require $composer;

/*
|--------------------------------------------------------------------------
| Register The Bootloader
|--------------------------------------------------------------------------
|
| The first thing we will do is schedule a new Acorn application container
| to boot when WordPress is finished loading the theme. The application
| serves as the "glue" for all the components of Laravel and is
| the IoC container for the system binding all the various parts.
|
*/

if (!function_exists('\Roots\bootloader')) {
    wp_die(
        __('You need to install Acorn to use this theme.', 'sage'),
        '',
        [
            'link_url'  => 'https://roots.io/acorn/docs/installation/',
            'link_text' => __('Acorn Docs: Installation', 'sage'),
        ]
    );
}

\Roots\bootloader()->boot();

/**
 * Register the initial theme setup.
 */
add_action('after_setup_theme', function () {
    /**
     * 1. Disable full-site editing support.
     * 2. Disable the default block patterns.
     * 3. Enable plugins to manage the document title.
     * 4. Enable post thumbnail support.
     * 5. Enable responsive embed support.
     * 6. Enable HTML5 markup support.
     * 7. Enable selective refresh for widgets in customizer.
     */
    remove_theme_support('block-templates');  /* 1 */
    remove_theme_support('core-block-patterns');  /* 2 */
    add_theme_support('title-tag');  /* 3 */
    add_theme_support('post-thumbnails');  /* 4 */
    add_theme_support('responsive-embeds'); /* 5 */
    add_theme_support('html5', [
        'caption',
        'comment-form',
        'comment-list',
        'gallery',
        'search-form',
        'script',
        'style',
    ]);  /* 6 */
    add_theme_support('customize-selective-refresh-widgets'); /* 7 */
}, 20);

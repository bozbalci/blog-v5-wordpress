<?php // phpcs:ignore PSR1.Files.SideEffects.FoundWithSymbols

define("BB_RENDER_START", hrtime(true));

define('BB_VERSION', '0.1.1');

/**
 * ABSPATH is /bedrock/web/wp, dirname takes us back to /bedrock/web
 */
define("BEDROCK_WEB_ROOT", dirname(ABSPATH));
define("BEDROCK_WP_CONTENT_ROOT", BEDROCK_WEB_ROOT . "/app");
define("THEME_ABSOLUTE_PATH", dirname(__FILE__));
define(
    "THEME_RELATIVE_PATH",
    str_replace(BEDROCK_WEB_ROOT, "", THEME_ABSOLUTE_PATH)
);

define('BB_URI', home_url(THEME_RELATIVE_PATH));
define('BB_HMR_HOST', 'http://localhost:5173');
define('BB_HMR_URI', BB_HMR_HOST);
define('BB_ASSETS_PATH', THEME_ABSOLUTE_PATH . '/dist');
define('BB_ASSETS_URI', BB_URI . '/dist');

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
| the IoC container for the system binding all of the various parts.
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

/*
|--------------------------------------------------------------------------
| Register Sage Theme Files
|--------------------------------------------------------------------------
|
| Out of the box, Sage ships with categorically named theme files
| containing common functionality and setup to be bootstrapped with your
| theme. Simply add (or remove) files from the array below to change what
| is registered alongside Sage.
|
*/

collect(['setup', 'filters'])
    ->each(function ($file) {
        if (!locate_template($file = "app/{$file}.php", true, true)) {
            wp_die(
            /* translators: %s is replaced with the relative file path */
                sprintf(__('Error locating <code>%s</code> for inclusion.', 'sage'), $file)
            );
        }
    });

if (!function_exists('bb')) {
    function bb(): \App\BB\BB {
        return \App\BB\BB::get();
    }
}

bb();

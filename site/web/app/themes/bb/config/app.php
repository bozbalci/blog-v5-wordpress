<?php

use Illuminate\Support\Env;
use Illuminate\Support\Facades\Facade;
use Roots\Acorn\ServiceProvider;

const BB_VERSION = "1.0.0";

return [
    'name'            => Env::get('APP_NAME', 'Acorn'),
    'env'             => defined('WP_ENV') ? WP_ENV : Env::get('WP_ENV', 'production'),
    'version'         => wp_get_environment_type() === "development" ? time() : BB_VERSION,
    'debug'           => WP_DEBUG && WP_DEBUG_DISPLAY,
    'url'             => Env::get('APP_URL', home_url()),
    'asset_url'       => Env::get('ASSET_URL'),
    'timezone'        => get_option('timezone_string') ?: 'UTC',
    'locale'          => get_locale(),
    'fallback_locale' => 'en',
    'faker_locale'    => 'en_US',
    'key'             => Env::get('APP_KEY'),
    'cipher'          => 'AES-256-CBC',

    /*
    |--------------------------------------------------------------------------
    | Maintenance Mode Driver
    |--------------------------------------------------------------------------
    |
    | These configuration options determine the driver used to determine and
    | manage Laravel's "maintenance mode" status. The "cache" driver will
    | allow maintenance mode to be controlled across multiple machines.
    |
    | Supported drivers: "file", "cache"
    |
    */

    'maintenance' => [
        'driver' => 'file',
        // 'store' => 'redis',
    ],

    /*
    |--------------------------------------------------------------------------
    | Autoloaded Service Providers
    |--------------------------------------------------------------------------
    |
    | The service providers listed here will be automatically loaded on the
    | request to your application. Feel free to add your own services to
    | this array to grant expanded functionality to your applications.
    |
    */

    'providers' => ServiceProvider::defaultProviders()->merge([
        /*
         * Package Service Providers...
         */

        /*
         * Application Service Providers...
         */
        App\Providers\ThemeServiceProvider::class,
//        App\Providers\ViteAssetsServiceProvider::class,
//        App\Providers\ViteHmrServiceProvider::class,
        App\Providers\ExifServiceProvider::class
    ])->toArray(),

    /*
    |--------------------------------------------------------------------------
    | Class Aliases
    |--------------------------------------------------------------------------
    |
    | This array of class aliases will be registered when this application
    | is started. However, feel free to register as many as you wish as
    | the aliases are "lazy" loaded so they don't hinder performance.
    |
    */

    'aliases' => Facade::defaultAliases()->merge([
        // 'Example' => App\Facades\Example::class,
    ])->toArray(),
];

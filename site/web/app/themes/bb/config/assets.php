<?php

return [
    'default' => 'theme',

    /*
    |--------------------------------------------------------------------------
    | Assets Manifests
    |--------------------------------------------------------------------------
    |
    | Manifests contain lists of assets that are referenced by static keys that
    | point to dynamic locations, such as a cache-busted location. We currently
    | support two types of manifest:
    |
    | assets: key-value pairs to match assets to their revved counterparts
    |
    | bundles: a series of entrypoints for loading bundles
    |
    */

    'manifests' => [
        'theme' => [
            'path'    => get_theme_file_path('dist'),
            'url'     => get_theme_file_uri('dist'),
            'assets'  => get_theme_file_path('dist/manifest.json'),
            'bundles' => get_theme_file_path('dist/entrypoints.json'),
        ],
    ],
];

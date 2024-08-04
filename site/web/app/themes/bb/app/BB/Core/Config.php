<?php

namespace App\BB\Core;

class Config
{
    private array $config = [];

    public function __construct()
    {
        $this->config = [
        "version" => wp_get_environment_type() === "development" ? time() : BB_VERSION,
        "env" => [
        "type" => wp_get_environment_type(),
        "mode" => "theme",
        ],
        "hmr" => [
        "uri" => BB_HMR_HOST,
        "client" => BB_HMR_URI . "/@vite/client",
        "sources" => BB_HMR_URI . "/resources",
        "active" => wp_get_environment_type() === "development" && !is_wp_error(wp_remote_get(BB_HMR_URI)),
        ],
        "manifest" => [
        "path" => BB_ASSETS_PATH . "/manifest.json"
        ],
        "cache" => [
        "path" => wp_upload_dir()["basedir"] . "/cache/bb",
        ],
        "resources" => [
        "path" => THEME_ABSOLUTE_PATH . "/resources"
        ],
        "views" => [
        "path" => THEME_ABSOLUTE_PATH . "/resources/views"
        ]
        ];
    }

    public function get(string $key): mixed
    {

        $value = $this->config;

        foreach (explode('.', $key) as $key) {
            if (isset($value[$key])) {
                $value = $value[$key];
            } else {
                return null;
            }
        }

        return $value;
    }
}

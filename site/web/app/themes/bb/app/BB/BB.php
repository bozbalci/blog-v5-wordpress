<?php

namespace App\BB;

use App\BB\Bundle\EnqueueBundle;
use App\BB\Bundle\ViteIntegration;
use App\BB\Core\Config;
use App\BB\Core\Hooks;
use App\BB\Features\Features;

class BB
{
    private Config $config;

    private function __construct()
    {
        $this->config = Hooks::apply(new Config());

        Hooks::apply(new EnqueueBundle());
        Hooks::apply(new Features());

        if ($this->config()->get("hmr.active")) {
            Hooks::apply(new ViteIntegration());
        }
    }

    public function config()
    {
        return $this->config;
    }

    /**
     * Singleton
     */

    public static function get(): BB
    {
        if (empty(self::$instance)) {
            self::$instance = new BB();
        }

        return self::$instance;
    }

    private static ?BB $instance = null;
}

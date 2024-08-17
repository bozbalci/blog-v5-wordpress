<?php

namespace App\View\Composers;

use Illuminate\Foundation\Vite;
use Roots\Acorn\View\Composer;

class App extends Composer
{
    protected static $views = [
        '*',
    ];

    public function with(): array {
        return [
            'siteName' => $this->siteName(),
            'isRunningHot' => app(Vite::class)->isRunningHot(),
        ];
    }

    public function siteName(): string {
        return get_bloginfo('name', 'display');
    }
}

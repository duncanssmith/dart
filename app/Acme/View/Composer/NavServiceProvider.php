<?php namespace Acme\View\Composer;

use Illuminate\Support\ServiceProvider;

class NavServiceProvider extends ServiceProvider
{

    public function register()
    {
        \View::composer('partials.nav', 'Acme\View\Composer\NavigationComposer');
    }

    public function boot() {}

}


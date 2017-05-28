<?php

/*
 * This file is part of consoletvs/profanity.
 *
 * (c) Erik Campobadal <soc@erik.cat>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ConsoleTVs\Profanity;

use Illuminate\Support\ServiceProvider;

/**
 * This is the profanity service provider class.
 *
 * @author Erik Campobadal <soc@erik.cat>
 */
class ProfanityServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton(Builder::class, function ($app) {
            return new Builder();
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [Builder::class];
    }
}

<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Repositories\Contracts\ArticleRepositoryInterface',
            'App\Repositories\Eloquent\ArticleRepository',
        );
        // if ($this->app->environment() == 'local') {
        //     $this->app->register(Flipbox\LumenGenerator\LumenGeneratorServiceProvider::class);
        // }
    }
}

<?php

namespace App\Repositories\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Repositories\Contracts\ArticleRepositoryInterface',
            'App\Repositories\Eloquent\ArticleRepository',

        );
        $this->app->bind(

            'App\Repositories\Contracts\TagRepositoryInterface',
            'App\Repositories\Eloquent\TagRepository',
        );
        $this->app->bind(

            'App\Repositories\Contracts\CommentRepositoryInterface',
            'App\Repositories\Eloquent\CommentRepository',
        );
    }
}
